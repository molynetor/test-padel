@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">Reservas ({{$bookings->count()}})</div>
                
          

                <div class="card-body ">
                <table class="table table-striped">@csrf
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Usuario</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Hora</th>
                          <th scope="col">Pista</th>
                          <th scope="col">email</th>
                          <th scope="col">Teléfono</th>
                          <th scope="col">Reservada el día</th>
                          <th scope="col">Estado</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;">
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->time}}</td>
                          <td>{{$booking->date}}</td>
                          <td>{{$booking->pista_id}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{formatDate($booking->created_at, $format = 'd-m-Y')}}</td>
                          <td>
                              @if($booking->status==0)
                              <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-primary"> Pending</button></a>
                              @else 
                               <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success"> Cheked</button></a>
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
