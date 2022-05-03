@extends('layouts.app')

@section('content')
<div class="mt-5">
    @if(Auth::check())


    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body fw-bold">
                        <h4 class="text-center fs-4 fw-bold ">Información de la pista</h4>

                        <br>
                        <p class="lead"> Nombre:{{$citas->pistas->name}}</p>
                        <p class="lead"> Tipo:{{$citas->pistas->type}}</p>
                        <p class="lead"> Fecha: {{formatDate($date, $format = 'd-m-Y')}}</p>
                        @foreach($times as $time)
                        <p class="lead"> Hora: {{$time->time}}</p>



                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
                @endforeach

                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
                @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
                @endif
                <form action="{{route('booking.cita')}}" method="post">@csrf
                    <div class="card">

                        @foreach($times as $time)


                        <input type="hidden" name="time" value="{{$time->time}}" checked>




                        <input type="hidden" name="pistaId" value="{{$pista_id}}">
                        <input type="hidden" name="citaId" value="{{$time->cita_id}}">
                        <input type="hidden" name="date" value="{{$date}}">


                        @endforeach

                        <div class="card-footer text-end">

                            <button type="submit" class="btn btn-success">Reservar Pista</button>

                        </div>
                        <div class="cart-checkout-btn pull-right">
                            <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                            <a href="" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>

                        </div>
                </form>


            </div>




        </div>
    </div>
    @else 
 
    <div class="container-fluid content ">
        <div class="row justify-content-center pt-5">
            <div class="col-md-3 formulario mt-4">
                <form method="POST" action="{{ route('login') }}" class="formu">
                    @csrf
                    <div class="form-group text-center mb-0 p-0">
                        <h1 class="text-white fs-2 fw-bold">Iniciar Sesión</h1>
                    </div>


                    <div class="form-group mx-sm-4 pb-3 mb-0">
                        <label for="username" class="fs-6 fw-bold">Correo</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="form-group mx-sm-4 mb-0 pb-3">
                        <label for="password" class="fs-6 fw-bold">Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">


                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="form-group  d-flex justify-content-start  p-0 my-0 ms-4">
                        <div class="form-check">
                            <input class="form-check-input ms-auto" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label ms-auto" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group mx-sm-4 mb-0 pb-0">
                        <input type="submit" class="btn d-block w-100 ingresar" value="INGRESAR">
                    </div>


                    <div class="form-group mx-sm-4  pb-3 pt-0 mt-0">
                  

                        @if (Route::has('password.request'))
                        <a class="btn btn-link d-flex justify-content-end" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif


                        <p><a href="# " class="olvide1 text-center d-block w-100 register_button">Registrarse</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endif


@if (count($errors) > 0)
<script type="text/javascript">
$(document).ready(function() {
    $('#loginModal').modal('show');
});
</script>
@endif
@include('partials.modals.login')
@include('partials.modals.register')
<script>
    $(function() {
	'use strict';
	
  $('.form-control').on('input', function() {
	  var $field = $(this).closest('.form-group');
	  if (this.value) {
	    $field.addClass('field--not-empty');
	  } else {
	    $field.removeClass('field--not-empty');
	  }
	});

});
</script>
@endsection