@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif
    <div class="row ">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Perfil de usuario</div>

                <div class="card-body">
                    <p>Nombre: {{auth()->user()->name}}</p>
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Dirección: {{auth()->user()->address}}</p>
                    <p>Teléfono: {{auth()->user()->phone_number}}</p>
                    <p>Género: {{auth()->user()->gender}}</p>


                </div>
                <div class="card-footer">

                   @include('perfil.user_sidebar')

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Actualizar Información</div>

                <div class="card-body">
                    <form action="{{route('perfil.store')}}" method="post">@csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{auth()->user()->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}">

                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="phone_number" class="form-control"
                                value="{{auth()->user()->phone_number}}">

                        </div>
                        <div class="form-group">
                            <label>Género</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Seleccione género</option>
                                <option value="No-Definido" @if(auth()->user()->gender==='all')selected @endif >Prefiero
                                    no decirlo</option>
                                <option value="Masculino" @if(auth()->user()->gender==='masculino')selected @endif
                                    >Masculino</option>
                                <option value="Femenino" @if(auth()->user()->gender==='femenino')selected
                                    @endif>Femenino</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <div class="form-group">

                                <button class="btn btn-primary mt-3" type="submit">Actualizar</button>

                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Update Image</div>
                <form action="{{route('perfil.foto')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        @if(!auth()->user()->image)
                        <img src="/images/0809-250x250.jpg" width="120">
                        @else
                        <img src="/profile/{{auth()->user()->image}}" width="120">
                        @endif
                        <br>
                        <input type="file" name="file" class="form-control mt-3" required="">
                        <br>
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-3">Update</button>

                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection