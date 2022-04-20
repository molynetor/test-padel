@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Todas tus reservas ({{$reservas->count()}})</div>
                

                <div class="card-body ">
                <table class="table table-striped">@csrf
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Pista</th>
                          <th scope="col">Hora</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Reservada el día</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($reservas as $key=>$reserva)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$reserva->pista_id}}</td>
                          <td>{{$reserva->time}}</td>
                          <td>{{formatDate($reserva->date, $format = 'd-m-Y')}}</td>
                          <td>{{formatDate($reserva->created_at,$format = 'd-m-Y')}}</td>
                         
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
