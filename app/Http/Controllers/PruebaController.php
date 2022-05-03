<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Auth;

class PruebaController extends Controller
{
    public function index(){
    	$coupons = Coupon::orderBy('id','DESC')->get();
		
    	return view('admin.coupon.view_coupon',compact('coupons'));
    }

    public function store(Request $request){
		$this->validateStore($request);
    		



	Coupon::insert([
		'coupon_name' => strtoupper($request->coupon_name),
		'coupon_discount' => $request->coupon_discount, 
		'coupon_validity' => $request->coupon_validity,
		'created_at' => Carbon::now(),

    	]);

	    return redirect()->back()->with('message','Cupón añadido correctamente');

    
    }
	public function validateStore($request){
        return $this->validate($request,[
            'coupon_name'=>'required|unique:coupons',
            'coupon_discount'=>'required|numeric',
            'coupon_validity'=>'required'
        ]);
    }

	public function edit($id){
		$coupons = Coupon::findOrFail($id);
		   return view('admin.coupon.edit_coupon',compact('coupons'));
	   }

	   public function update(Request $request, $id){

		Coupon::findOrFail($id)->update([
		  'coupon_name' => strtoupper($request->coupon_name),
		  'coupon_discount' => $request->coupon_discount, 
		  'coupon_validity' => $request->coupon_validity,
		  'created_at' => Carbon::now(),
  
		  ]);
  
		
  
		  return redirect()->route('cupones')->with('message','Cupón actualizado correctamente');
		}
		public function delete($id){

			Coupon::findOrFail($id)->delete();
			$notification = array(
				'message' => 'Coupon Deleted Successfully',
				'alert-type' => 'info'
			);
	
			return redirect()->back()->with($notification);
	
		}
}
