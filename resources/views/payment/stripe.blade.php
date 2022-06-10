@extends('layouts.app')

@section('content')


@section('title')
Stripe Payment Page
@endsection


<div class="body-content">
    <div class="container margen">
        <div class="checkout-box ">
            <div class="row margen">

                <div class="col-md-3">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading d-flex align-items-center pagar mb-3">
                                <div class="basket me-2 mb-2"> <i class="fas fa-shopping-cart titular fa-2x"></i></div>
                                    <h3 class="unicase-checkout-title texto">TU CESTA </h3>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">


                                        <hr>
                                        <li>
                                            @if(Session::has('coupon'))

                                            <strong class="texto fs-4 fw-bold">SUB TOTAL: </strong> <span class="texto fs-4"> {{ $cartTotal }}€</span>
                                            <hr>

                                            <strong class="texto fs-4 fw-bold">NOMBRE CUPÓN : </strong>
                                            <span class="texto fs-4">  {{ session()->get('coupon')['coupon_name'] }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                            </span>
                                           
                                           
                                            <hr>

                                            <strong class="texto fs-4 fw-bold">DESCUENTO : </strong>
                                            <span class="texto fs-4">  {{ session()->get('coupon')['discount_amount'] }}€</span>
                                           
                                            <hr>

                                            <strong class="texto fs-4 fw-bold">TOTAL : </strong>
                                            <span class="texto fs-4">  {{ session()->get('coupon')['total_amount'] }}€</span>
                                           
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
                    <!-- checkout-progress-sidebar -->
                </div> <!--  // end col md 6 -->







                <div class="col-md-8 ms-3">

              

                   
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table">
                                    <div class="row display-tr mb-3">
                                        <h4 class="panel-title display-td fs-3 uppercase">DETALLES DEL PAGO</h4>
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
                                                <label class='control-label label texto fs-6'>Nombre en la tarjeta</label> <input
                                                    class='form-control input' size='4' type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group  required'>
                                                <label class='control-label label texto fs-6'>Número de tarjeta</label> <input
                                                    autocomplete='off' class='form-control card-number input' 
                                                    type='text'>
                                            </div>
                                        </div>

                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <label class='control-label label texto fs-6'>CVC</label> <input autocomplete='off'
                                                    class='form-control card-cvc input' placeholder='ex. 311' size='4'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label label texto fs-6'>Mes caducidad</label> <input
                                                    class='form-control card-expiry-month input' placeholder='MM' size='2'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <label class='control-label label texto fs-6'>Año caducidad</label> <input
                                                    class='form-control card-expiry-year input' placeholder='YYYY' size='4'
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
										
      

                                        <div class="row pagar">
                                            <div class="cart-checkout-btn pull-right col-md-6">
                                                <button type="submit"
                                                    class="btn-upper btn btn-brand checkout-page-button">Pagar Ahora</button>

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

<style>
    .hide{
        display:none;
    }
</style>