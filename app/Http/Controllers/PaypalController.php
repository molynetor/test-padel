<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Auth\OAuthTokenCredential;
use Paypal\Rest\ApiContext;
use App\Models\Booking;
use App\Models\Horas;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailBooking;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaypalController extends Controller
{

   public function createpaypal()
   {
   
    $notification = array(
        'message' => 'Tu reserva se ha completado con exito',
        'alert-type' => 'success'
      );
  
      return redirect()->route('welcome')->with($notification);
   }


public function processPaypal(Request $request)
{
    if (Session::has('coupon')) {
        $total_amount = Session::get('coupon')['total_amount'];
        $discount = Session::get('coupon')['discount_amount'];
    }else{
        $total_amount = round(Cart::getTotal());
    }
  
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $paypalToken = $provider->getAccessToken();
    
    $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context" => [
            "return_url" => route('processSuccess'),
            "cancel_url" => route('processCancel'),
        ],
        "purchase_units" => [
            0 => [
                "amount" => [
                    "currency_code" => "EUR",
                    "value" => $total_amount
                    ]
                    ]
                    ]
                ]);
                
                if (isset($response['id']) && $response['id'] != null) {
                $order_id = Order::insertGetId([
                'user_id' => Auth::id(),                  
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone,                  
                'payment_type' => 'Paypal',                  
                'payment_method' => 'Paypal',
                'payment_type' => $request->payment_method,                   
                'currency' => 'EUR',
                'amount' => $total_amount,  
                'discount'=>$discount,                             
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
                'status' =>1,
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
             'message' => 'Tu reserva se ha realizado correctamente',
             'alert-type' => 'success'
           );

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createpaypal')
                ->with('error', 'Algo fue mal');

        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', $response['message'] ?? 'Algo fue mal');
        }
}
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


public function processSuccess(Request $request)
{

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
          
            return redirect()
                ->route('createpaypal')
                ->with('success', 'Transaction completada');
        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', $response['message'] ?? 'Algo fue mal');
        }

}

 public function processCancel(Request $request)
    {
        return redirect()
            ->route('createpaypal')
            ->with('error', $response['message'] ?? 'Has cancelado la transacción');
    }

}
