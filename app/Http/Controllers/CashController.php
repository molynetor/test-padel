<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\Booking;
use App\Models\Horas;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon; 

use Illuminate\Support\Facades\Mail;
use App\Mail\MailBooking;

class CashController extends Controller
{
    public function CashOrder(Request $request){




    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::getTotal());
    	}



	  // dd($charge);

     $order_id = Order::insertGetId([
     	'user_id' => Auth::id(),
     	'name' => $request->name,
     	'phone_number' => $request->phone_number,
         'email'=>'user@gmail.com',
     	

     	'payment_type' => 'Pago en local',
     	'payment_method' => 'Pago en local',

     	'currency' =>  'eur',
     	'amount' => $total_amount,


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
             'status'=>0,
             'created_at' => Carbon::now(),
             
           ]);
           
           
         }
         
        
           $cita = $this->updateHoras($carts,$order_id,$request);
         
         

     if (Session::has('coupon')) {
     	Session::forget('coupon');
     }

     Cart::clear();

     $notification = array(
			'message' => 'Tu reserva se ha realizado correctamente',
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
               'email' =>'user@gmail.com',
             'pista_id' => $pistas,
            'time' => $horas,
            'date' => $dias,
            'status'=>1,
           ];
       

        
    
      }
}
