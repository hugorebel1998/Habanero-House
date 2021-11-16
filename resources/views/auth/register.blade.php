@extends('layouts.app')

@section('content')

<div class="hold-transition register-page portada">
    <div class="register-box">
        <div class="register-logo">
            <img src="{{ asset('img/habanero-logo.png')}}" alt="Habanero House" width="250">
        </div>

        <div class="card mt-4">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrarse</p>

                <form method="POST" action="{{ route('register')}}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nombre">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                         name="email" value="{{ old('email') }}" required autocomplete="email"
                         placeholder="Correo electrónico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                         name="password" required autocomplete="new-password"
                         placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                         required autocomplete="new-password" placeholder="Confirmar contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary cold-md-2 bg-boton"><i
                                class="fas fa-sign-out-alt"></i> Registrar</button>
                    </div>
                </form>
                <!-- <a href="{{ route('login') }}" class="text-center mt-4">Tengo una cuenta</a> -->
            </div>

        </div>
    </div>
</div>
@endsection