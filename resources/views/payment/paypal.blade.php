@extends('layouts.app')

@section('content')

Paypal

<div class="row margen">

    <div class="col-md-3 margen">
        <!-- checkout-progress-sidebar -->
        <div class="checkout-progress-sidebar ">
            <div class="panel-group">
                <div class="panel panel-default ms-3">
                    <div class="panel-heading d-flex align-items-center pagar mb-3">
                        <div class="basket me-2 mb-2"> <i class="fas fa-shopping-cart titular fa-2x"></i></div>
                        <h3 class="unicase-checkout-title texto">TU CESTA </h3>
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




    <div class="col-6 margen mx-auto">
        <form role="form" action="{{route('processPaypal')}}" method="get" id="payment-form">
            @csrf
            <input type="hidden" name="name" value="{{ $data['name'] }}">
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="phone" value="{{ $data['phone'] }}">
            <input type="hidden" name="payment_method" value="PayPal">
            <div class="col-md-3 ">

                <button type="submit" class="btn btn-primary ">Ir a Paypal</button>

            </div>
        </form>
        @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
        @endif


        @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
        @endif

    </div>
</div>


@endsection