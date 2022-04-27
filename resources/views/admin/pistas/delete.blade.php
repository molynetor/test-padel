@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Pista</h5>
                    <span>Borrar Pista</span>
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
                <li class="breadcrumb-item active" aria-current="page">Borrar</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
       
	<div class="card">
	<div class="card-header"><h3>Confirmar borrado</h3></div>
	<div class="card-body">
        <img src="{{asset('images')}}/{{$pista->image}}" width="120">
        <h2>{{$pista->name}}</h2>
		<form class="forms-sample" action="{{route('pistas.destroy',[$pista->id])}}" method="post" >@csrf
            @method('DELETE')
			
            <div class="card-footer">
                <button type="submit" class="btn btn-danger mr-2">Confrim</button>
                <a href="{{route('pistas.index')}}" class="btn btn-secondary">
                    Cancel
                  
                </a>
            </div>
           


				</form>
			</div>
		</div>
	</div>
</div>


@endsection