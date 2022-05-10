@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
      <div class="col-md-2">
        @include('perfil.user_sidebar')

      </div>
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Todas tus reservas ({{$bookings->count()}})</div>
                

                <div class="card-body ">
                <table class="table table-striped">@csrf
                      <thead>
                      <tr style="background: #e2e2e2;">
                      <td class="col-md-1">
                  <label for=""> Número</label>
                </td>
               
                <td class="col-md-2">
                  <label for=""> Pista</label>
                </td>

                <td class="col-md-2">
                  <label for=""> Día</label>
                </td>

                <td class="col-md-1">
                  <label for=""> Hora</label>
                </td>


                <td class="col-md-1">
                  <label for=""> Precio</label>
                </td>

                 <td class="col-md-2 text-center">
                  <label for=""> Factura</label>
                </td>

              

              </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <td scope="row" class="text-center">{{$key+1}}</th>
                       
                          <td class="col-md-1">
                  <label for="">Pista {{ $booking->pista_id }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{formatDate($booking->date, $format = 'd-m-Y')}}</label>
                </td>


                 <td class="col-md-2">
                  <label for=""> {{ $booking->time }}</label>
                </td>
                <td class="col-md-2">
                  <label for=""> {{ $booking->price }}€</label>
                </td>


              

                 

         <td class="col-md-2 text-center">
         <a href="{{ url('/order_details/'.$booking->order_id ) }}" class="btn btn-sm btn-primary btn-block w-75 my-1"><i class="fa fa-eye"></i>Detalle</a>

           <a href="{{ url('/invoice_download/'.$booking->order_id ) }}" class="btn btn-sm btn-danger btn-block w-75 my-1"><i class="fa fa-download " style="color: white;"></i>Descargar</a>

        </td>

              </tr>
                        @empty
                        <td>No tienes reservas</td>
                        @endforelse
                       
                      </tbody>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
