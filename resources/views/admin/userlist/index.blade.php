@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">Reservas ({{$bookings->count()}})</div>
                <div class="row">


                    <div class="col-4">


                        <h3 class="box-title">Buscar por fecha </h3>

                        <form action="{{route('usuarios')}}" method="GET">
                            <div class="card-header">
                                Filtrar:
                                <div class="row">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="controls ">
                                            <input type="date" name="date" class="form-control"
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                                        </div>

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">Buscar</button>

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
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('search-by-month') }}">
                                        @csrf


                                        <div class="form-group">
                                            <h5>Seleccionar mes <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <select name="month" class="form-control">
                                                    <option label="Choose One"></option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>


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
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="Buscar">
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>





                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Buscar por usuario </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">


                                    <form method="post" action="{{ route('search-by-year') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <h5>Seleccionar Usuario <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <select name="year" class="form-control">
                                                    <option label="Choose One"></option>

                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                </select>

                                                @error('year')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="Buscar">
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11 max-auto">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Pista</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Reservada el día</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Edición</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $key=>$booking)
                            <tr>
                                <td scope="row">{{$key+1}}</td>
                                <td><img src="/profile/{{$booking->user->image}}" width="60"
                                        style="border-radius: 50%;">
                                <td>{{$booking->order->name}}</td>
                                <td>{{$booking->time}}</td>
                                <td>{{formatDate($booking->date, $format = 'd-m-Y')}}</td>
                                <td>Pista {{$booking->pista_id}}</td>
                                <td>{{$booking->order->email}}</td>
                                <td>{{$booking->order->phone_number}}</td>
                                <td>{{formatDate($booking->created_at, $format = 'd-m-Y H:i:s')}}</td>
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