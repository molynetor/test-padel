@extends('layouts.app')

@section('content')

<div class="body-content margen">
    <div class="container">
        <div class="row margen">
            <div class="col-md-3 col-lg-2">

                @include('perfil.user_sidebar')

            </div>
            <div class="col-md-5 col-lg-6 ms-2 bg">
                <div class="card bg pagar">
                    <div class="card-header bg py-3 ">
                        <h4 class="texto2">DETALLES DE LA RESERVA</h4>
                    </div>
                    <hr style="background:#573dff;">
                    <div class="card-body bg p-0 mb-0" style="background: #E9EBEC;">
                        <table class="table bg mb-0 ">
                            <tr>
                                <th class="fw-bold"> Nombre : </th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr>
                                <th class="fw-bold"> Teléfono : </th>
                                <th> {{ $order->phone_number }} </th>
                            </tr>

                            <tr>
                                <th class="fw-bold"> Email : </th>
                                <th> {{ $order->email }} </th>
                            </tr>


                            <th class="fw-bold"> Fecha transación: </th>
                            <th> {{Carbon\Carbon::parse($order->order_date)->formatLocalized('%d %B %Y') }} </th>
                            </tr>
                            <tr>
                                <th class="fw-bold"> Tipo de pago : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>
                            @if(isset($order->transaction_id ))
                            <tr>
                                <th class="fw-bold"> ID Tansación : </th>
                                <th> {{ $order->transaction_id }} </th>
                            </tr>
                            @else
                            <tr>
                                <th class="fw-bold"> ID Tansación : </th>
                                <th> Ver en PayPal</th>
                            </tr>
                            <tr>

                                @endif
                                <th class="fw-bold"> Nº Factura : </th>
                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                            </tr>
                            @if($order->discount > 0)
                            <tr>
                                <th class="fw-bold"> Descuento: </th>
                                <th class="text-primary fw-bold">-{{ $order->discount }}€ </th>
                            </tr>
                            @endif
                            <tr>
                                <th class="fw-bold"> Total factura: </th>
                                <th class="fw-bold ">{{ $order->amount }}€ </th>
                            </tr>
                        </table>


                    </div>

                </div>

            </div> 
            
            <div class="row mt-4">



                <div class="col-md-8 mx-auto">

                    <div class="table-responsive">
                        <table class="table bg">
                            <tbody>

                                <tr class="bg2 text-white">
                                    <td class="col-md-1">
                                        <label for=""> Reserva </label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> Nombre </label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for=""> Fecha reserva de pista</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> Hora </label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""> Precio </label>
                                    </td>

                                </tr>

                                @foreach($bookings as $key=>$booking)
                                <tr>


                                <tr>
                                    <td scope="row" class="text-center">{{$key+1}}</th>
                                    <td class="col-md-1">
                                        <label for="">Pista {{ $booking->pista_id }}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> {{formatDate($booking->date, $format = 'd-m-Y ')}}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> {{ $booking->time }}</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for=""> {{ $booking->price }}€</label>
                                    </td>



                                </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>
@endsection