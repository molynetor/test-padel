<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(Request $request){


        $bookings = Booking::latest()->get();

        date_default_timezone_set('Europe/Madrid');
    	if($request->date){
    		$bookings = Booking::latest()->where('date',$request->date)->get();
    		return view('admin.userlist.index',compact('bookings'));
    	}
    	$bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
    	return view('admin.userlist.index',compact('bookings'));
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
        $bookings = Booking::latest()->paginate(20);
        return view('admin.userlist.index',compact('bookings'));
    }
}
