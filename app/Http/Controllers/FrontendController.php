<?php

namespace App\Http\Controllers;
use App\Models\Citas;
use App\Models\Horas;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingMail;
use App\Models\Coupon;
use App\Models\Order;
use PDF;
use Auth;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
public function index(){
    
    if(request('date')){
    //comprobar que llega la fecha que buscamos
       // dd($this->findPistaOnDate(request('date')));

      $pistas = $this->findPistaOnDate(request('date'));
      return view('welcome',compact('pistas'));
    }
    $pistas = Citas::where('date',date('Y-m-d'))->get();
    
    return view('welcome',compact('pistas'));
}

public function show($pistaId, $date, $time){
    $citas = Citas::where('pista_id',$pistaId)
              ->where('date',$date)
              ->first();

    $times = Horas::where('cita_id',$citas->id)->where('status',0)
    ->where('time',$time)->get();
   
    $pista_id = $pistaId;
    return view('admin.citas.citas',compact('times','date','citas','pista_id'));

}
public function findPistaOnDate($date){
$pistas = Citas::where('date',$date)->get();
return $pistas;



}

public function store(Request $request){
  
    $request->validate(['time'=>'required']);
    $fecha = $request->date;
    $hora = $request->time;
    //dd($precio);
    $check = $this->checkBookingTimeInterval($fecha);
    $precio = $this->calcPrecio($fecha,$hora);
    if($check){
        return redirect()->back()->with('errmessage','Ya tienes reserva para este día');
    }
    Booking::create([
        'user_id'=>auth()->user()->id,
        'pista_id'=>$request->pistaId,
        'time'=>$request->time,
        'date'=>$request->date,
        'status'=>0,
        'price'=>$precio
    ]);
    Horas::where('cita_id',$request->citaId)
          ->where('time',$request->time)
          ->update(['status'=>1]);
          return redirect()->back()->with('message','Su pista se ha reservado');

          $Nombre_pista= Pista::where('id',$request->pistaId)->first();
          //correo
          $mail_data = [
              'name'=>auth()->user()->name,
              'time'=>$hora,
              'date'=>$fecha,
              'pista_name'=>$Nombre_pista->name,
              'price'=>$precio
          ];
          try{
              \Mail::to(auth()->user()->email)->send(new BookingMail($mail_data));
            }
              catch(\Exception $e){
          }
}
public function checkBookingTimeInterval($fecha)
    {
        return Booking::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->whereDate('date',$fecha)
            ->exists();
    }
  public function calcPrecio($fecha,$hora){
     
    $dia_fecha=date('w', strtotime($fecha));
  // dd($dia_fecha);
      
   if($hora=='19:00'|| $hora=='20:30'){
       $precio =20;
   }elseif ($dia_fecha==0) {
       $precio =20;
   }else{
       $precio =12;
   }
   return $precio;

  }
  public function myBookings()
    {
        $bookings = Booking::where('user_id',Auth::id())->orderBy('id','DESC')->get();
     
    
        return view('booking.index',compact('bookings'));
    }

    public function OrderDetails($order_id){

    	$order = Order::where('id',$order_id)->where('user_id',Auth::id())->first();
    	$bookings = Booking::where('order_id',$order_id)->orderBy('id','DESC')->get();
       
    	return view('perfil.order_details',compact('order','bookings'));

    }
    public function InvoiceDownload($order_id){
        $orders = Order::where('id',$order_id)->where('user_id',Auth::id())->first();
        $bookings = Booking::where('order_id',$order_id)->orderBy('id','DESC')->get();
    	$pdf = PDF::loadView('order.order_invoice',compact('orders','bookings'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
    ]);
    return $pdf->download('invoice.pdf');
    }

    public function pistaHoy(Request $request){
        
       $pistas = Citas::with('pistas','horas')
        ->whereDate('date',date('Y-m-d')
        )->get();
 
        return response()->json($pistas);
    }
    public function findPista(Request $request){
        $pistas = Citas::with('pistas','horas')  
        ->whereDate('date',$request->date)->get();
        return response()->json($pistas);
        
    }
    public function storeCita(Request $request){
        
        $fecha = $request->date;
        $hora = $request->time;
        //dd($precio);
        $user_id = $request->session()->get('user')[''];
        return response()->json($user_id);
      
    }
    public function CouponApply(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100) 
            ]);

            return response()->json(array(

                'success' => 'Coupon Applied Successfully'
            ));

        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        } 
    }

}
