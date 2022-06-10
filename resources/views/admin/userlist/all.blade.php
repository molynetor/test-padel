@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center bg">
        <div class=" col-md-12 bg">
            <div class="card bg">
                <div class="card-header bg2">Reservas ({{$bookings->count()}})</div>



                <div class="card-body ">
                    <table class="table table-striped">@csrf
                        <thead>
                            <tr >
                                <th class="text-white" scope="col">#</th>
                                <th class="text-white" scope="col">Foto</th>
                                <th class="text-white" scope="col">Usuario</th>
                                <th class="text-white" scope="col">Fecha</th>
                                <th class="text-white" scope="col">Hora</th>
                                <th class="text-white" scope="col">Pista</th>
                                <th class="text-white" scope="col">Email</th>
                                <th class="text-white" scope="col">Teléfono</th>
                                <th class="text-white" scope="col">Reservada el día</th>
                                <th class="text-white" scope="col">Estado</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $key=>$booking)
                            <tr>
                                <td scope="row">{{$key+1}}</td>
                                <td>
                                    < @if(!auth()->user()->image)
                                        <img class="img-fluid ms-2" src="/images/0809-250x250.jpg" width="35">
                                        @else
                                        <img class="img-fluid ms-2" src="/profile/{{auth()->user()->image}}" width="35" style="border-radius: 50%;">
                                        @endif
                                <td> {{$booking->order->email}}

                                </td>
                                <td>{{$booking->time}}</td>
                                <td>{{formatDate($booking->date, $format = 'd-m-Y')}}</td>
                                <td>{{$booking->pista_id}}</td>
                                <td>{{$booking->order->email}}</td>
                                <td>{{$booking->order->phone_number}}</td>
                                <td>{{formatDate($booking->created_at, $format = 'd-m-Y H:i:s')}}</td>
                                <td>
                                    @if($booking->status==1)
                                    <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-danger">
                                            Pediente</button></a>
                                    @else
                                    <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success">
                                            Pagada</button></a>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <td>No tienes reservas</td>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection