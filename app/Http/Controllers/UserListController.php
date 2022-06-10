<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Horas;
use App\Models\User;
use Datetime;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(Request $request){
         $users = User::latest()->get();
        $bookings = Booking::latest()->get();
        date_default_timezone_set('Europe/Madrid');
    	if($request->date){
    		$bookings = Booking::latest()->where('date',$request->date)->get();
    		return view('admin.userlist.index',compact('bookings','users'));
    	}
    	$bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
    	return view('admin.userlist.index',compact('bookings','users'));
    }

    public function toggleStatus($id)
    {
        $booking  = Booking::find($id);
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back();

    }
    public function allReservas()
    {
        $users = User::latest()->get();
        $bookings = Booking::latest()->paginate(20);
        $orders = Booking::latest()->paginate(20);
        return view('admin.userlist.index',compact('bookings','users'));
    }

   public function ReportByMonth(Request $request){
    $users = User::latest()->get();
       $bookings = Booking::select('bookings.*')
       ->join('orders', 'bookings.order_id', '=', 'orders.id')
       ->where('orders.order_month',$request->month)
       ->where('orders.order_year',$request->year_name)->latest()->get();
       
       return view('admin.userlist.index',compact('bookings','users'));
       
    }   
    
    public function ReportByUser(Request $request){
        $users = User::latest()->get();
        $bookings = Booking::where('user_id',$request->user_id)->get();
        
        
    return view('admin.userlist.index',compact('bookings','users'));
    } 

public function cancelStatus($id)
{
    //sin completar
    $booking  = Booking::find($id);
  
    $hora = Horas::with('bookings','citas')
    ->where('bookings.time','=','horas.time')
    ->where('bookings.id','=',$id)
    ->where('citas.id','=','horas.citas_id')
    ->update(['horas.status'=>1]);
    dd($hora);
  
    $booking->delete();
    
          
          return redirect()->back()->with('message','Su reserva se ha cancelado');

         
}

}
