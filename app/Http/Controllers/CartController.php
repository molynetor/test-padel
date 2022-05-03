<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use App\Models\Booking;

class CartController extends Controller
{
    public function shop()
    {
        $citas = Citas::all();
       //dd($products);
        return view('/welcome')->withTitle('E-COMMERCE STORE | SHOP')->with(['citas' => $citas]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request){
      
        
        Booking::create([
            'user_id'=>3,
            'pista_id'=>$request->pista_id,
            'time'=>$request->time,
            'date'=>$request->date,
            'status'=>0,
            'price'=>$request->price
        ]);
          
        
        return response()->json(['success' => 'Successfully Added on Your Cart']);
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

 

}
