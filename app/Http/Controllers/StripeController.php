<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Horas;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){
     

if (Session::has('coupon')) {
  $total_amount = Session::get('coupon')['total_amount'];
}else{
  $total_amount = round(Cart::getTotal());
}
      $charge =  \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $data = \Stripe\Charge::create([
          "amount"=>200*100,
          'amount' => $total_amount*100,
          "currency"=>"usd",
          "source"=>$request->stripeToken,
	         'metadata' => ['order_id' => uniqid()],
      ]);

      $order_id = Order::insertGetId([
        'user_id' => Auth::id(),
       
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone,
        
        'payment_type' => 'Stripe',
        
        'payment_method' => 'Stripe',
        'payment_type' => $data->payment_method,
        'transaction_id' => $data->balance_transaction,
        'currency' => 'eur',
        'amount' => $total_amount,
        'order_number' => $data->metadata->order_id,
 
        'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
        'order_date' => Carbon::now()->format('d F Y'),
        'order_month' => Carbon::now()->format('F'),
        'order_year' => Carbon::now()->format('Y'),
        'status' => 'Pending',
        'created_at' => Carbon::now(),	 
 
      ]);
      
      $carts = Cart::getContent();
     foreach ($carts as $cart) {
     	Booking::insert([
     		'order_id' => $order_id, 
     		'user_id' => Auth::id(),
     		'pista_id' => $cart->conditions,
     		'time' => $cart->name,
     		'date' =>  $cart->attributes,
     		'price' => $cart->price,
     		'created_at' => Carbon::now(),

       ]);
     
      }

      
      if (Session::has('coupon')) {
        Session::forget('coupon');
      }
 
      foreach ($carts as $cart) {
        Horas::where('cita_id',$cart->id)
        ->where('time',$cart->name)
        ->update(['status'=>1]);
        
        
      }
      Cart::clear();
 
      $notification = array(
       'message' => 'Your Order Place Successfully',
       'alert-type' => 'success'
     );
 
     return redirect()->route('dashboard')->with($notification);
  
 
     } // end method 

                   
    
    
       
}
