@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8 ">
           

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

 
 <div class="card col-lg-8 bg mx-auto">
     <div class="card-header">
     
        
         
        
     </div>
     <form action="{{route('todas')}}" method="post">@csrf
      
      <div class="card bg">
         
         <div class="col-lg-4 bg">
                         <label class="texto2 fs-5">Elegir pista</label>
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
                             <button type="submit" class="btn btn-brand " style="width: 100px !important; font-size: 14px !important; color: #babfe0 !important;height:32px  !important;">Ver Citas</button>
         </div>
      </form>
     
 </div>

 @if(Route::is('todas'))
 <h3 class="texto2 fs-5">Lista de Horas creadas para la Pista {{$pista_id}}: {{$todas->count()}}</h3>

 <table id="data_table" class="table">
          <thead>
            <tr class="bg2">
              <th scope="col" class="text-white fs-5">Cita_id</th>
              <th scope="col" class="text-white fs-5">Hora</th>
              <th scope="col" class="text-white fs-5">Fecha</th>
              <th scope="col" class="text-white fs-5">Ver/Actualizar</th>
              <th class="nosort">&nbsp;</th>
              <th class="nosort">&nbsp;</th>
            </tr>
          </thead>
          <tbody>

            @foreach($todas as $cita)
            <tr>
            
            
              <td class="texto2 fs-5">{{$cita->id}}</td>
              <td class="texto2 fs-5">{{$cita->time}}</td>
              <td class="texto2 fs-5">{{formatDate($cita->date, $format = 'd-m-Y')}}</td>
              <td>
                    <form action="{{route('citas.check')}}" method="post">@csrf
                        <input type="hidden" name="date" value="{{$cita->date}}">
                        <input type="hidden" name="pista" value="{{$pista_id}}">
                        <button type="submit" class="btn btn-brand " style="width: 120px !important; font-size: 13px !important; color: #babfe0 !important;height:32px  !important;">Ver/Actualizar</button>


                    </form>


              </td>
              
            </tr>
            @endforeach
          </tbody>
        </table>



@endif


 @endsection