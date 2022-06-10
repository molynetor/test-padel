@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Cash On Delivery
@endsection


<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">


				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default margen">
			<div class="panel-heading margen">
		    	<h4 class="unicase-checkout-title texto fs-3 fw-bold">PAGO EN LOCAL </h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">


<hr>
		 <li>
		 @if(Session::has('coupon'))

<strong class="texto fs-4 fw-bold">SUB TOTAL: </strong> <span class="texto fs-4">
	{{ $cartTotal }}€</span>
<hr>

<strong class="texto fs-4 fw-bold">NOMBRE CUPÓN : </strong>
<span class="texto fs-4"> {{ session()->get('coupon')['coupon_name'] }}
	( {{ session()->get('coupon')['coupon_discount'] }} % )
</span>


<hr>

<strong class="texto fs-4 fw-bold">DESCUENTO : </strong>
<span class="texto fs-4"> {{ session()->get('coupon')['discount_amount'] }}€</span>

<hr>

<strong class="texto fs-4 fw-bold">TOTAL : </strong>
<span class="texto fs-4"> {{ session()->get('coupon')['total_amount'] }}€</span>

<hr>


@else

<strong class="texto fs-4 fw-bold">SubTotal: </strong>
<span class="texto fs-4"> {{ $cartTotal }}€</span>
<hr>

<strong class="texto fs-4 fw-bold">Total : </strong>
<span class="texto fs-4"> {{ $cartTotal }}€</span>
<hr>


@endif

		 </li>



				</ul>		
			</div>
		</div>
	</div>
</div> 

 </div> 

	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar margen">
	<div class="panel-group">
		<div class="panel panel-default margen">
			<div class="panel-heading margen">
		    	<h4 class="unicase-checkout-title texto fs-3 fw-bold">Datos para la reserva</h4>
		    </div>

<form action="{{ route('cash.order') }}" method="post" id="payment-form">
                            @csrf
        <div class="form-row">

      

            <label for="card-element">

            <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end texto fs-4 fw-bold">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                      
                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end texto fs-4 fw-bold">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="address" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  

            </label>




        </div>
        <br>
        <button class="btn btn-outline-brand">CREAR RESERVA</button>
        </form>



		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->







</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->








<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->








@endsection 