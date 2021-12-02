@extends('layouts.home')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="small-box bg-rojo">
                    <div class="small-box bg-rojo shadow">
                        <div class="inner">
                            @if (Auth::check())
                                
                            <h6>{{ auth()->user()->rol }}</h6>
                            <h4 id="tittlehome" class="mt-4">Bienvenido <b
                                id="tittlehomesub">{{ auth()->user()->name }}
                                    {{ auth()->user()->apellido_paterno }}</b></h4>
                                    <h4 id="tittledescripcion" class="mt-4 mb-4">Que haremos HOY !!!</h4>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie mt-4"></i>
                        </div>
                        {{-- <a href="{{ url('/') }}" class="small-box-footer"><i class="fas fa-pepper-hot"></i></i></a> --}}
                        <a href="#" class="small-box-footer"><i class="fas fa-pepper-hot"></i></i></a>
                        @endif
                    </div>

                    {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Que aremos HOY !!') }}
                </div> --}}
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-rojo">
                            <div class="inner">
                                <h3>{{ $productoCount }}</h3>
                                <p>Nuevo platillo</p>
                            </div>
                            <div class="icon">
                                {{-- <i class="ion ion-bag"></i> --}}
                                <i class="fas fa-utensils"></i>
                            </div>
                            <a href="{{ route('admin.productos.create') }}" class="small-box-footer">Ir <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-rojo">
                            <div class="inner">
                                <h3>{{ $categoriaCount }}</h3>
                                <p>Nueva categoria</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.categorias.index')}}" class="small-box-footer">Ir <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-rojo">
                            <div class="inner">
                                <h3>{{ $usuarioCount }}</h3>
                                <p>Nuevo usuario</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            @can('read usuario')
                                <a href="{{ route('admin.usuarios.create') }}" class="small-box-footer">Ir <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endcan
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-rojo">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Ordenes</p>
                            </div>
                            <div class="icon">
                                <i class="fab fa-first-order-alt"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-rojo">
                            <div class="inner">
                                <h3>0</h3>

                                <p>Reportes</p>
                            </div>
                            <div class="icon">
                                <i class="fab fa-accusoft"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-rojo">
                            <div class="inner">
                                <h3>{{ $coverageCount }}</h3>

                                <p>Coverturas ordenes</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <a href="{{ route('admin.covertura.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
