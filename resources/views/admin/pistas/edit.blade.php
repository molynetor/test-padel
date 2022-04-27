@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Pista</h5>
                    <span>Actualizar Pista</span>
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
                <li class="breadcrumb-item active" aria-current="page">Create</li>
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
	<div class="card-header"><h3>Actualizar  Pista</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('pistas.update',[$pista->id])}}" method="post" enctype="multipart/form-data"  >@csrf
            @method('PUT')
			<div class="row">
				<div class="col-lg-6">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" value="{{$pista->name}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				<div class="col-lg-6">
					<label for="">Type</label>
					<input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="type"value="{{$pista->type}}">
                     @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
                <div class="col-lg-6">
                        <div class="form-group">
                    <label>Image</label>
                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                        <span class="input-group-append">
                       
                        </span>
                         @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
			</div>

			
            
              <button type="submit" class="btn btn-primary mr-2 mt-3">Submit</button>
               <button class="btn btn-light mt-3">Cancel</button>


		</form>
			
		</div>
	</div>
</div>


@endsection