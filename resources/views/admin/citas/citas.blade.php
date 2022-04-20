@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Información de la pista</h4>
                    
                    <br>
                   <p class="lead"> Nombre:{{$citas->pistas->name}}</p>
                   <p class="lead"> Tipo:{{$citas->pistas->type}}</p>
                   <p class="lead"> Fecha: {{formatDate($date, $format = 'd-m-Y')}}</p>
                </div>
            </div>    
        </div>
   <div class="col-md-9">
       @foreach($errors->all() as $error)
       <div class="alert alert-danger">{{$error}}</div>
       @endforeach

       @if(Session::has('message'))
       <div class="alert alert-success">
           {{Session::get('message')}}
       </div>
       @endif
       @if(Session::has('errmessage'))
       <div class="alert alert-danger">
           {{Session::get('errmessage')}}
       </div>
       @endif
   <form action="{{route('booking.cita')}}" method="post">@csrf
   <div class="card">
                <div class="card-header lead">{{formatDate($date, $format = 'd-m-Y')}}</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($times as $time)
                        <div class="col-md-3">
                            <label class="btn btn-outline-primary mb-3">
                                <input type="radio" name="time" value="{{$time->time}}" >
                                <span>{{$time->time}}
                                    </span>
                            </label>
                        </div>
<input type="hidden" name="pistaId" value="{{$pista_id}}">
<input type="hidden" name="citaId" value="{{$time->cita_id}}">
<input type="hidden" name="date" value="{{$date}}">


                        @endforeach
                    </div>
                </div>
               </div>
               <div class="card-footer">
                @if(Auth::check())
                <button type="submit" class="btn btn-success" >Reservar Pista</button>
                @else 
                    <p>Por favor inicia sesión para reservar</p>
                    <a href=""></a>
                    <a href="/register" class="btn btn-success btn-lg "style="width:100px;" role="button" aria-disabled="true">Registrarse</a>
                    <a href="/login" class="btn btn-info btn-lg "style="width:100px;" role="button" aria-disabled="true">Login</a>
                   
                    
                @endif

                   
               </div>
</form>


   </div>




    </div>
</div>
@endsection
