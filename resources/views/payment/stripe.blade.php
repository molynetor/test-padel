@extends('layouts.app')

@section('content')


@section('title')
Stripe Payment Page
@endsection





<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Stripe</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">

                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Shopping Amount </h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">


                                        <hr>
                                        <li>
                                            @if(Session::has('coupon'))

                                            <strong>SubTotal: </strong> ${{ $cartTotal }}
                                            <hr>

                                            <strong>Coupon Name : </strong>
                                            {{ session()->get('coupon')['coupon_name'] }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                            <hr>

                                            <strong>Coupon Discount : </strong>
                                            ${{ session()->get('coupon')['discount_amount'] }}
                                            <hr>

                                            <strong>Grand Total : </strong>
                                            ${{ session()->get('coupon')['total_amount'] }}
                                            <hr>


                                            @else

                                            <strong>SubTotal: </strong> ${{ $cartTotal }}
                                            <hr>

                                            <strong>Grand Total : </strong> ${{ $cartTotal }}
                                            <hr>


                                            @endif

                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div> <!--  // end col md 6 -->







                <div class="col-md-8">

              

                   
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table">
                                    <div class="row display-tr">
                                        <h3 class="panel-title display-td">Detalles del pago</h3>
                                        <div class="display-td">
										<i class="fa-solid fa-circle-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                    @endif

                                    <form role="form" action="{{ route('stripe.order') }}" method="post"
                                        class="require-validation" data-cc-on-file="false"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                        @csrf

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <label class='control-label'>Nombre en la tarjeta</label> <input
                                                    class='form-control' size='4' type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group card required'>
                                                <label class='control-label'>Número de tarjeta</label> <input
                                                    autocomplete='off' class='form-control card-number' size='20'
                                                    type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Mes caducidad</label> <input
                                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label'>Año caducidad</label> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                    type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-danger alert'>Corrija los errores y vuelva a introducir los datos</div>
                                            </div>
                                        </div>
										<input type="hidden" name="name" value="{{ $data['name'] }}">
										<input type="hidden" name="email" value="{{ $data['email'] }}">
										<input type="hidden" name="phone" value="{{ $data['phone'] }}">
										
      

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" >Pagar Ahora
                                                   </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                   

                </div>


            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->








        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->








@endsection