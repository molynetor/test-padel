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

<div class="container">
         @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('errmessage'))
            <div class="alert bg-danger alert-success text-white" role="alert">
                {{Session::get('errmessage')}}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
                
            </div>
                
        @endforeach
    
        
    <form action="{{route('citas.check')}}" method="post">@csrf
 
    <div class="card">
        <div class="card-header">
            Escoger Fecha
            <br>
            
            @if(isset($date))
                Horario para el día: 
                {{formatDate($date, $format = 'd-m-Y')}}
            
         
            @endif
        </div>
      
        <div class="card-body">
                  <div class="datepicker">

                      <input type="text" class="datepicker-picker" id="datepicker" name="date" class="date">
                       <input type="text" id="datepickerAlt" class="date" >

                  </div>


        </div>
    </div>
    <div class="col-lg-6">
					<label for="">Pista</label>
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
@if(Route::is('citas.check'))
<form action="{{route('update')}}" method="post">@csrf
    <div class="card">
        <div class="card-header">
           Mañana
           <span style="margin-left: 700px">De/Seleccionar todas
               <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked" >
           </span>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
                
            <input type="hidden" name="cita_id" value="{{$cita_id}}">
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><input type="checkbox" name="time[]" @if(isset($times)){{$times->contains('time','9:30')?'checked':''}}@endif  value="9:30">9:30</td>
                        <td><input type="checkbox" name="time[]"  value="11:00" @if(isset($times)){{$times->contains('time','11:00')?'checked':''}}@endif>11:00</td>
                        <td><input type="checkbox" name="time[]"  value="12:30" @if(isset($times)){{$times->contains('time','12:30')?'checked':''}}@endif>12:30</td>
                    </tr>
                    
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            Tarde/Noche
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
                
                
                <tbody>
                    <tr>
                        <th scope="row">2</th>
                        <td><input type="checkbox" name="time[]"  value="16:00"@if(isset($times)){{$times->contains('time','16:00')?'checked':''}}@endif>16:00</td>
                        <td><input type="checkbox" name="time[]"  value="17:30" @if(isset($times)){{$times->contains('time','17:30')?'checked':''}}@endif>17:30</td>
                        <td><input type="checkbox" name="time[]"  value="19:00" @if(isset($times)){{$times->contains('time','19:00')?'checked':''}}@endif>19:00</td>
                        <td><input type="checkbox" name="time[]"  value="20:30" @if(isset($times)){{$times->contains('time','20:30')?'checked':''}}@endif>20:30</td>
                        
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
    
</div>
</form>






@endif
<style type="text/css">
    input[type="checkbox"]{
        zoom:1.1;
        margin-right:5px;
   
    }
    body{
        font-size: 18px;
    }
   
    .datepicker {
    position: relative;
}
.datepicker .datepicker-picker {
    position: absolute;
    opacity: 0
}

</style>



@endsection