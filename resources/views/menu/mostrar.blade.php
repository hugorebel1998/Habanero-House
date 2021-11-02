@extends('layouts.master')
@section('title', 'Sobre nosotros')
@section('content')

    <div class="menu-box">


        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="heading-title text-center">
                        <h2>Menú</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Todos</button>
                            <button data-filter=".antojitos-reguinales">Antojitos regionales</button>
                            <button data-filter=".sopas">Sopas</button>
                            <button data-filter=".ensaladas">Ensaladas</button>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button data-filter=".antojitos-reguinales">Antojitos regionales</button>
                            <button data-filter=".sopas">Sopas</button>
                            <button data-filter=".ensaladas">Ensaladas</button>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="row special-list">
                @foreach ($productosAntojitos as $productosAntojito)

                    <div class="col-lg-4 col-md-6 special-grid antojitos-reguinales">
                        <div class="gallery-single fix">
                            <img src="{{ asset('img/products/' . $productosAntojito->imagen_producto) }}"
                                class="img-fluid" alt="{{ $productosAntojito->nmbre }}">
                            <div class="why-text">
                                <h4>{{ $productosAntojito->nombre }}</h4>
                                <p>{{ $productosAntojito->descripcion }}</p>
                                <h5> $ {{ $productosAntojito->precio }}</h5>
                            </div>
                        </div>
                    </div>

                @endforeach

                @foreach ($productosSopas as $productosSopa)

                    <div class="col-lg-4 col-md-6 special-grid sopas">
                        <div class="gallery-single fix">
                            <img src="{{ asset('img/products/' . $productosSopa->imagen_producto) }}"
                                class="img-fluid" alt="{{ $productosSopa->nmbre }}">
                            <div class="why-text">
                                <h4>{{ $productosSopa->nombre }}</h4>
                                <p>{{ $productosSopa->descripcion }}</p>
                                <h5> $ {{ $productosSopa->precio }}</h5>
                            </div>
                        </div>
                    </div>

                @endforeach

                @foreach ($productosEnsaladas as $productosEnsalada)

                    <div class="col-lg-4 col-md-6 special-grid ensaladas">
                        <div class="gallery-single fix">
                            <img src="{{ asset('img/products/' . $productosEnsalada->imagen_producto) }}"
                                class="img-fluid" alt="{{ $productosEnsalada->nmbre }}">
                            <div class="why-text">
                                <h4>{{ $productosEnsalada->nombre }}</h4>
                                <p>{{ $productosEnsalada->descripcion }}</p>
                                <h5> $ {{ $productosEnsalada->precio }}</h5>
                            </div>
                        </div>
                    </div>

                @endforeach



            </div>

        </div>
    </div>


@endsection
