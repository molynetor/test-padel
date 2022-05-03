@extends('admin.layouts.master')

@section('content')

<div class="page-header">
<div class="row align-items-end">
    <div class="col-lg-7">
        <div class="page-header-title">
            <i class="ik ik-inbox bg-blue"></i>
            <div class="d-inline">
                <h5>Pistas</h5>
                <span>Listado de pistas</span>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Pistas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>
    </div>
</div>
</div>


<div class="row">
<div class="col-md-11 mx-auto">
       @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
    <div class="card">
        <div class="card-header"><h3>Data Table</h3>

        </div>
        <div class="card-body">
            <table id="data_table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>  
                        <th >Imagen</th>
                        <th>Name</th>          
                        <th>Type</th>
                        <th class="nosort">&nbsp;</th>
                        <th class="nosort">&nbsp;</th>
                        
                    </tr>
                </thead>
                <tbody>
                @if(count($pistas)>0)
                    @foreach($pistas as $pista)
                    <tr>
                        <td>{{$pista->id}}</td>
                       
                        <td><img src="{{asset('images')}}/{{$pista->image}}" class="table-user-thumb" ></td>
                        <td>{{$pista->name}}</td>
                        <td>{{$pista->type}}</td>    
                        <td>
                            <div class="table-actions">
                                <a href="#" data-toggle="modal" data-target="#exampleModal{{$pista->id}}">
                                <i class="ik ik-eye text-primary"></i>
                                </a>
                                <a href="{{route('pistas.edit',[$pista->id])}}"><i class="ik ik-edit-2 text-success"></i></a>
                                
                                <a href="{{route('pistas.show',[$pista->id])}}">
                                    <i class="ik ik-trash-2 text-danger"></i>
                                </a>

                            </div>
                        </td>
                        <td>x</td>
                    </tr>
            <!-- View Modal -->
            @include('admin.pistas.modal')


                    @endforeach
                   
                    @else 
                    <td>No hay pistas que mostrar</td>
                    @endif
                
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection