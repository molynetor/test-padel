@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 bg2">
            <div class="card bg2">
                <div class="card-header bg2">Reservas hoy({{$bookings->count()}})</div>
                <div class="row">
                    <div class="col-4">
                        <h3 class="box-title">Buscar por fecha </h3>

                        <form action="{{route('usuarios')}}" method="GET">
                            <div class="card-header">
                                Filtrar:
                                <div class="row">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="controls bg">
                                            <input type="date" name="date" class="form-control bg"
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                        </div>

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-brand "
                                                style="width: 80px !important; font-size: 14px !important; color: #babfe0 !important;height:40px !important;padding:5px !important;">Buscar</button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Buscar por mes </h3>
                            </div>

                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('search-by-month') }}">
                                        @csrf


                                        <div class="form-group">
                                            <h5>Seleccionar mes <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <select name="month" class="form-control">
                                                    <option label="Choose One"></option>
                                                    <option value="January">Enero</option>
                                                    <option value="February">Febrero</option>
                                                    <option value="March">Marzo</option>
                                                    <option value="April">Abril</option>
                                                    <option value="May">Mayo</option>
                                                    <option value="June">Junio</option>
                                                    <option value="July">Julio</option>
                                                    <option value="August">Agosto</option>
                                                    <option value="September">Septiembre</option>
                                                    <option value="October">Octubre</option>
                                                    <option value="November">Noviembre</option>
                                                    <option value="December">Diciembre</option>


                                                </select>

                                                @error('month')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <h5>Seleccionar año <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <select name="year_name" class="form-control">
                                                    <option label="Choose One"></option>

                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                </select>

                                                @error('year_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-brand "
                                                style="width: 80px !important; font-size: 14px !important; color: #babfe0 !important;height:40px !important;padding:5px !important;">Buscar</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
           
                        </div>
         
                    </div>

                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Buscar por usuario </h3>
                            </div>
                   
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('search-by-user') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                                <h5>Seleccionar Usuario <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="user_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Seleccionar Usuario<a href="http://" target="_blank" rel="noopener noreferrer"></a>
                                                        </option>
                                                        @foreach($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->name }} {{$user->surname}} {{$user->phone_number}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-brand "
                                                style="width: 80px !important; font-size: 14px !important; color: #babfe0 !important;height:40px !important;padding:5px !important;">Buscar</button>
                                        </div>
                                    </form>


                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11 max-auto">
            <div class="card bg">

                <div class="card-body bg">
                    <table class="table table-striped">
                        <thead class="text-white">

                        <tr class=" bg2 align-items-center">
                            <th class="text-white" scope="col">#</th>
                            <th class="text-white" scope="col">Foto</th>
                            <th class="text-white" scope="col">Usuario</th>
                            <th class="text-white" scope="col">Hora</th>
                            <th class="text-white" scope="col">Fecha</th>
                            <th class="text-white" scope="col">Pista</th>
                            <th class="text-white" scope="col">Email</th>
                            <th class="text-white" scope="col">Teléfono</th>
                            <th class="text-white" scope="col">Reservada el día</th>
                            <th class="text-white" scope="col">Estado</th>
                            <th class="text-white" scope="col">Edición</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $key=>$booking)
                            <tr>
                                <td class="texto2 fs-4" scope="row">{{$key+1}}</td>
                                @if(!$user->image)
                                <td>  <img class="img-fluid ms-2 foto mb-1" src="/images/0809-250x250.jpg" </td>
                                        >
                                    @else
                                    <td>  <img class="img-fluid ms-2 foto mb-1" src="/profile/{{$booking->order->users->image}}"></td>
                                    @endif
                              
                                <td class="texto2 fs-4">{{$booking->order->name}}</td>
                                <td class="texto2 fs-4">{{$booking->time}}</td>
                                <td class="texto2 fs-4">{{formatDate($booking->date, $format = 'd-m-Y')}}</td>
                                <td class="texto2 fs-4">Pista {{$booking->pista_id}}</td>
                                <td class="texto2 fs-4">{{$booking->order->email}}</td>
                                <td class="texto2 fs-4">{{$booking->order->phone_number}}</td>
                                <td class="texto2 fs-4">{{formatDate($booking->created_at, $format = 'd-m-Y H:i:s')}}</td>
                                <td>
                                    @if($booking->status==0)
                                    <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-info">
                                            Pediente</button></a>
                                    @else
                                    <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success">
                                            Pagada</button></a>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{route('cancel.status',[$booking->id])}}"><button class="btn btn-danger">
                                            Cancelar</button></a>


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
<style>
.datepicker {
    position: relative;
}

.datepicker .datepicker-picker {
    position: absolute;
    opacity: 0
}
</style>