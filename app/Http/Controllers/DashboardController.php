<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){

        //dd(Auth::user()->role->name);
        if(Auth::user()->role->name=='user'){
            return view('welcome');
        }
        return view('dashboard');

    }
}
