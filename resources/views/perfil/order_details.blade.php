@extends('layouts.app')

@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
            <div class="col-md-3">

                @include('perfil.user_sidebar')

            </div>
            <div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>Detalles de la Factura</h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> Nombre : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Teléfono : </th>
               <th> {{ $order->phone_number }} </th>
            </tr>

             <tr>
              <th> Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

           
              <th> Fecha transación: </th>
               <th> {{ $order->order_date }} </th>
            </tr>
            <tr>
              <th> Tipo de pago : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> ID Tansación : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Nº Factura  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Total factura: </th>
               <th>{{ $order->amount }}€ </th>
            </tr>

            

           </table>


         </div> 

        </div>

      </div> <!-- // end col md -5 -->
      <div class="row">



<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>

              <tr style="background: #e2e2e2;">
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





       </div> <!-- / end col md 8 -->












      </div> <!-- // END ORDER ITEM ROW -->



		</div> <!-- // end row -->

	</div>

</div>
@endsection 