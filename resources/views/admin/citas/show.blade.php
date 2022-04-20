@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
           

            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Pistas</h5>
                    <span>Seleccionar horario de citas</span>
                    
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pista</a></li>
                <li class="breadcrumb-item active" aria-current="page">Horario </li>
            </ol>
        </nav>
    </div>
    </div>
</div>

 
 <div class="card">
     <div class="card-header">
     
        
         
        
     </div>
     <form action="{{route('todas')}}" method="post">@csrf
      
      <div class="card">
         
         <div class="col-lg-6">
                         <label for="">Elegir pista</label>
                         <select class="form-control @error('pista') is-invalid @enderror" name="pista">
                             @foreach($pistas as $pista)
                             <option value="{{$pista->id}}"> {{$pista->id}}</option>
                             @endforeach
                         </select>
                          @error('pista')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                             <br>
                             <button type="submit" class="btn btn-primary btn-sm">Ver Citas</button>
         </div>
      </form>
     
 </div>

 @if(Route::is('todas'))
 <h3>Lista de citas para Pista {{$pista_id}}: {{$todas->count()}}</h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Hora</th>
              <th scope="col">Fecha</th>
              <th scope="col">View/Update</th>
            </tr>
          </thead>
          <tbody>

            @foreach($todas as $cita)
            <tr>
            
            
              <td>{{$cita->id}}</td>
              <td>{{$cita->time}}</td>
              <td>{{$cita->date}}</td>
              <td>
                    <form action="{{route('citas.check')}}" method="post">@csrf
                        <input type="hidden" name="date" value="{{$cita->date}}">
                        <input type="hidden" name="pista" value="{{$pista_id}}">
                    <button type="submit" class="btn btn-primary">View/Update</button>


                    </form>


              </td>
            </tr>
            @endforeach
          </tbody>
        </table>



@endif
 @endsection