@extends('layouts.master')
@section('title', 'Contacto')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5"><br>
            @if (count(collect($items)) == "0")
            <div class="card mt-5 shadow-lg">
                <img src="{{ asset('img/sin-carrito-de-compras.png')}}" class="rounded mx-auto d-block"  width="30%" height="30%">
                <div class="card-body">
                  <p class="card-text" id="no-card-text">Hola <b>{{ Auth::user()->name}} {{ Auth::user()->apellido_paterno}}</b>, Aun no tienes nada en tu carrito de compra,
                   animate a agregar uno de nuestros increibles platillos. <i class="fas fa-utensils"></i>
                </p>
                <div class="text-center">
                    <a href="{{ route('usuario.mostrar.menu')}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Ir al menú</a>

                </div>
                </div>
              </div>     
            @endif

        </div>
    </div><br><br>
</div>

@endsection