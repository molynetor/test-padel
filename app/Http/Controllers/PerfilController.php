<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class PerfilController extends Controller
{
    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        $this->validate($request,[
    		'name'=>'required',
    		'gender'=>'required'
    	]);
    	User::where('id',auth()->user()->id)
    		->update($request->except('_token'));
    	return redirect()->back()->with('message','Datos actualizados');
        
    }

    public function perfilFoto(Request $request)
    {
    	$this->validate($request,['file'=>'required|image|mimes:jpeg,jpg,png']);
    	if($request->hasFile('file')){
    		$image = $request->file('file');
    		$name = time().'.'.$image->getClientOriginalExtension();
    		$destination = public_path('/profile');
    		$image->move($destination,$name);
    		
    		$user = User::where('id',auth()->user()->id)->update(['image'=>$name]);
    		
    		return redirect()->back()->with('message','Datos actualizados');


    	}
    }
}
