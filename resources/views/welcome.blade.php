@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="/banner/banner-padel.jpg" class="img-fluid" style="border:1px solid #ccc; height:500px;">

        </div>   
        <div class="col-sm-6 my-auto px-0">
            <h2>Crear una cuenta para reservar pista</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            <div class="mt-5">
            @if(Auth::check())
      
                @else 
                    <p>Por favor inicia sesión para reservar</p>
                   <a href="{{ route('register') }}"><button class="btn btn-success"  >Registrarse</button></a>
                   <a href="{{ route('login') }}"><button class="btn btn-secondary" >Acceder</button></a>
                    @endif
        </div>
        </div>
        
    </div>
    <hr>
   <!-- DatePicker VueJs -->
    <!--date picker component-->
  <find-pista></find-pista>
</div>    
@endsection
