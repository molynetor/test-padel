<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
use Auth;
class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request){
        
   
        $user = User::where('id',auth()->user()->id)->first();
        $data = [
            
            'name' =>auth()->user()->name,
            'email' =>auth()->user()->email,
            'phone' =>auth()->user()->phone_number,
            'address' =>auth()->user()->address,
            
        ];
        $cartTotal = Cart::getTotal();   
    	
    

    	if ($request->payment_method == 'stripe') {
    		return view('payment.stripe',compact('data','cartTotal'));
    	}elseif ($request->payment_method == 'paypal') {
            return view('payment.paypal',compact('data','cartTotal'));
    	}else{
           
            return view('payment.cash',compact('data','cartTotal'));
    	}
}
}
