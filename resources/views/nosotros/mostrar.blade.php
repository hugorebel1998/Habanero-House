@extends('layouts.master')
@section('title', 'Sobre nosotros')
@section('content')

    <div class="about-section-box">
        <div class="container mt-5">
            <br>
            <div class="card card-dark card-outline shadow">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('img/home/nosotros.jpg') }}" alt="" class="img-fluid shadow">
                    </div>
                    <div class="col-lg-6 col-md-6 text-center">
                        <div class="inner-column">
                            <h1>Acerca de nosotros</span></h1>
                            <h4>Pequeña historia</h4>
                            <p>Habanero house empezo abriendo sus puertas en el año 2015 en un pequeño local ubicado en
                                Sindicato Nacional de Electricistas. </p>
                            <p>De la mano de <strong>Jorge Senderos Hernandez</strong> el cual tenia la ilución de llevar su
                                comida Yucateca, pero todo parecio mal al no irle bien como el esperaba.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
        </div>
    </div>

@endsection
