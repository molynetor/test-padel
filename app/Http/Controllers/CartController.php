<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use App\Models\Horas;
use App\Models\Pista;
use App\Models\Coupon;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
class CartController extends Controller
{
    public function AddToCart(Request $request){
        if (Session::has('coupon')) {
            Session::forget('coupon');
         }
      
        $id = Horas::find($request->id);

        if(Cart::get($id->id)){
            return response()->json(['error' => 'Ya tienes esta hora en el carrito']); 
        }else{


            $items = Cart::getContent();
            foreach($items as $item)
            {
                $item->attributes; // the attributes
                
                // Note that attribute returns ItemAttributeCollection object that extends the native laravel collection
                // so you can do things like below:
                
                if( $item->attributes[0]==($request->date) )
                {
                    
                    return response()->json(['error' => 'Ya tienes una hora para este día, borra antes la del carrito']); 
                }
                
            }
        }
        Cart::add($id->id, $id->time,$request->price,1,$request->date,$request->pista_id
    );
 
    
 
    return response()->json(['success' => 'Añadido al carrito']);
    //return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }
     
     public function AddMiniCart(){
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
    } 
    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Borrado del carrito']);

    } 
    public function CouponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::getTotal() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::getTotal() - Cart::getTotal() * $coupon->coupon_discount/100)  
            ]);
 
            return response()->json(array(
                'validity' => true,
                'success' => 'El cupón ha sido aplicado'
            ));
            
        }else{
            return response()->json(['error' => 'El cupón no es válido']);
        }

    } // end method 

    public function CouponCalculation(){

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::getTotal(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::getTotal(),
            ));

        }
    } 
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Se ha eliminado el cupón']);
    }

    public function CheckoutCreate(){

        if (Auth::check()) {
            if (Cart::getTotal() > 0) {
        $pistas = Pista::get();
        $carts = Cart::getContent();
    	$qty = Cart::getContent()->count();
        $cartTotal = Cart::getTotal();
        $subtotal= Cart::getSubTotal();

    	

        return view('checkout.mycheckout',compact('carts','qty','cartTotal','pistas'));

            }else{

            $notification = array(
            'message' => 'Shopping At list One Product',
            'alert-type' => 'error'
        );

        return redirect()->to('/')->with($notification);

            }


        }else{

             $notification = array(
            'message' => 'Necesitas iniciar sesión',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification);

        }

    } // end method 

 
}
