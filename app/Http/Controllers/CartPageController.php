<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Horas;
use App\Models\Pista;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function MyCart(){
    	return view('cart.mycart');

    }


    public function GetCartProduct(){
        $pistas = Pista::get();
        $carts = Cart::getContent();
    	$qty = Cart::getContent()->count();
        $total = Cart::getTotal();
        $subtotal= Cart::getSubTotal();

    	return response()->json(array(
    		'carts' => $carts,
            'total' =>$total,
            'quantity'=>$qty,
            'pistas'=>$pistas,
            'subtotal'=>$subtotal
    		

    	));

    } //end method 

    public function RemoveCartProduct($rowId){
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            Session::forget('coupon');
         }
        return response()->json(['success' => 'Eliminado del carrito']);
    }

}
