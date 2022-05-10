@extends('layouts.app')

@section('content')

@section('title')
My Cart Page
@endsection

@if(Auth::check())
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="/">Home</a></li>
                <li class='active'>MyCart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart col-md-8 mx-auto">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Imagen</th>
                                    <th class="cart-edit item">Pista</th>
                                    <th class="cart-description item">Hora</th>
                                    <th class="cart-product-name item">Día</th>
                                    <th class="cart-qty item">Precio</th>

                                    <th class="cart-total last-item">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cartPage">


                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="vacio" class="text-center "></div>
                <div class="row justify-content-between" id="pago">
				<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
		@csrf
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        @if(Session::has('coupon'))

                        @else
                        <table class="table" id="couponField">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Descuento</span>
                                        <p>Ingresa un cupón válido</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input"
                                                placeholder="Tu cupón..." id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right ">
                                            <button type="submit" class="btn-upper btn btn-primary "
                                                onclick="applyCoupon()">APLICAR CUPÓN</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                        @endif
                    </div><!-- /.estimate-ship-tax -->







                    <div class="col-md-6 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead id="couponCalField">

                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
<td>
                          <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Seleccionar forma de pago</h4>
                                </div>


                                <div class="row">
									<div class="d-flex">



										<div class="col-md-3">
											<label for="">Paypal</label>
											<input type="radio" name="payment_method" value="stripe">
											<div class="d-flex">
											<img src="{{ asset('/images/1.png') }}">
											</div>
										</div> <!-- end col md 4 -->
	
										<div class="col-md-4">
											<label for="">Card</label>
											<input type="radio" name="payment_method" value="card">
											<div class="d-flex">
												<img src="{{ asset('/images/3.png') }}">
												<img src="{{ asset('/images/4.png') }}">
	
	
											</div>
										</div> <!-- end col md 4 -->
                                        @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                        <div class="col-md-2 d-flex">
											<label for="">Cash</label>
											<input type="radio" name="payment_method" value="cash">
											<div >
                                            <img src="{{ asset('/images/cash.png') }}" style="width:50px;">
												
	
	
											</div>
										</div> <!-- end col md 4 -->
                                        @endif
									</div>



                                </div>
</td>
</tr>
<tr>


                                    <td>
									<div class="row">
                                        <div class="cart-checkout-btn pull-right col-md-6">
										<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Proceder al pago</button>

</form>                                 </div>
</div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->










                </div><!-- /.row -->
            </div><!-- /.sigin-in-->



            <br>

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
                    <div class="form-group mx-sm-4 mb-1 pb-0">
                        <input type="submit" class="btn d-block w-100 ingresar" value="INGRESAR">
                    </div>


                    <div class="form-group mx-sm-4  pb-3 pt-0 mt-0">


                        @if (Route::has('password.request'))
                        <a class="btn btn-link d-flex justify-content-end" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif


                        <p><a href="{{route('register')}} " class="olvide1 text-center d-block w-100">Registrarse</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endif

<script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>

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