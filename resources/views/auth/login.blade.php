@extends('layouts.app')

@section('content')
<div class="container margen">
    <div class="row justify-content-center">
        <div class="col-md-8  margen">

            <div class="login-wrap">
                <div class="login-html">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                        class="tab">ENTRAR
                    </label>
                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">REGISTRARSE
                    </label>
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="sign-in-htm">
                                <div class="mb-3 group">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end label">{{ __('Email') }}</label>


                                    <input id="user" type="email"
                                        class="form-control @error('email') is-invalid @enderror input" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="group mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end label">{{ __('Contraseña') }}</label>


                                    <input id="pass" type="password"
                                        class="form-control @error('password') is-invalid @enderror input"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="group">
                                    <input class="form-check-input check" type="checkbox" name="remember" id="check"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="check"><span class="icon"></span> Recuérdame</label>
                                </div>
                                <div class="group">
                                    <button type="submit" class="button">
                                        {{ __('Entrar') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                    <div class="foot-lnk">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Has olvidado la contraseña?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="hr"></div>

                        </form>




                    </div>

                    <div class="sign-up-htm">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="group">
                                <label for="user" class="label">Nombre</label>
                                <input id="name" type="text"
                                    class="form-control input r @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="group">
                                <label for="surname" class="label">Apellidos</label>
                                <input id="surname" type="text"
                                    class="form-control input r @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="group">
                                <label for="email" class="label">{{ __('Email') }}</label>


                                <input id="email" type="email"
                                    class="form-control input r @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="group">
                                <label for="password" class="label">{{ __('Contraseña') }}</label>


                                <input id="password" type="password"
                                    class="form-control input r @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="group">
                                <label for="password-confirm" class="label">{{ __('Confirmar Contraseña') }}</label>


                                <input id="password-confirm" type="password" class="form-control input r" name="password_confirmation"
                                    required autocomplete="new-password">

                            </div>
                            <div class="group">

                                <label for="address" class="label">{{ __('Dirección') }}</label>


                                <input id="address" type="text"
                                    class="form-control input r @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                            <div class="group">
                                <label for="phone_number" class="label">{{ __('Teléfono') }}</label>


                                <input id="phone_number" type="text"
                                    class="form-control input r @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ old('phone_number') }}" required
                                    autocomplete="address" autofocus>

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="group">
                            <label for="gender" class="label">{{ __('Género *(opcional)') }}</label>

                           
                                <select name="gender" class="form-control input r @error('gender') is-invalid @enderror">
                                    <option value="">Seleccione género</option>
                                    <option value="all">Prefiero no decirlo</option>
                                    <option value="male">Masculino</option>
                                    <option value="female">Femenino</option>
                                </select>
                            

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                            <div class="group">
                                <input type="submit" class="button " value="Registrarse">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1">Ya eres miembro?</a>
                            </div>
                    </div>
                </div>

            </div>




        </div>
    </div>
    @endsection