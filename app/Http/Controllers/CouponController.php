<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Auth;


class CouponController extends Controller
{
    public function index(){
    	$coupons = Coupon::orderBy('id','DESC')->get();
    	return view('admin.coupon.view_coupon',compact('coupons'));

    }
}
