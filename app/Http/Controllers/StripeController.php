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
use Illuminate\Support\Facades\Mail;
use App\Mail\MailBooking;


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
          'amount' => $total_amount*100,
          "currency"=>"eur",
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
        'currency' => $data->currency,
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
          'date' =>  $cart->attributes[0],
          'price' => $cart->price,
          'created_at' => Carbon::now(),
          
        ]);
        
        
      }
      
     
        $cita = $this->updateHoras($carts,$order_id,$request);
      
      
    
         
      if (Session::has('coupon')) {
        Session::forget('coupon');
      }
      
      Cart::clear();
 
      $notification = array(
       'message' => 'Your Order Place Successfully',
       'alert-type' => 'success'
     );
 
     return redirect()->route('welcome')->with($notification);
  
 
     } // end method 
    public function updateHoras($carts,$order_id,$request){
      
      $pistas= array();
      $horas= array();
      $dias= array();
      foreach ($carts as $cart) {
        $pistas[]=$cart->conditions;
        $horas[]=$cart->name;
        $dias[]= $cart->attributes;
        
        $horas_ac= Horas::where('id',$cart->id)
         ->where('time',$cart->name)
         ->update(['status'=>1]);



      }
      $invoice = Order::findOrFail($order_id);
     	$data = [
     		'invoice_no' => $invoice->invoice_no,
     		'amount' => $invoice->amount,
     		'name' => $invoice->name,
     	    'email' => $invoice->email,
           'pista_id' => $pistas,
          'time' => $horas,
          'date' => $dias,
     	];
     
   
     	Mail::to($request->email)->send(new MailBooking($data));
      
  
    }
    public function checkBookingTimeInterval($fecha)
    {
        return Booking::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->whereDate('date',$fecha)
            ->exists();
    }            
    
    
       
}
