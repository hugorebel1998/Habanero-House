@extends('layouts.home')
@section('content')
@section('title', 'Inventario producto')
<div class="container-fluid">
    <h4 class="text-right text-white"> <i class="fas fa-utensils"></i> {{ ucfirst($productoInven->nombre) }}</h4>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-danger shadow">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-clipboard-check"></i> Crear inventario</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.productos.inventario.store', $productoInven->id) }}"
                                method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12 mt-1">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="cantidad">Cantidad de inventario</label>
                                        <input type="number" name="cantidad"
                                        min="1" class="form-control @error('cantidad') is-invalid @enderror"
                                            value="1" >
                                        @error('cantidad')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-12 mt-3">
                                        <label for="precio">Precio</label>
                                        <input type="number" name="precio"
                                            class="form-control @error('precio') is-invalid @enderror" min="1"
                                            step="any" value="{{ old('precio') }}" placeholder="0.00">
                                        @error('precio')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Limite de inventario</label>
                                            <select name="limitado"
                                                class="custom-select select2bs4 @error('limitado') is-invalid @enderror"
                                                style="width: 100%;">
                                                {{-- <option value="" selected>-- Selecciona una opción--</option> --}}
                                                <option value="0" @if (old('limitado') == '0') selected="selected" @endif }}>Limitado</option>
                                                <option value="1" @if (old('limitado') == '1') selected="selected" @endif }}>Ilimitado</option>
                                            </select>
                                            @error('limitado')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label for="minimo">Inventario minimo</label>
                                        <input type="number" name="minimo"
                                            class="form-control @error('minimo') is-invalid @enderror" min="1"
                                            value="1">
                                        @error('minimo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                        Guardar inventario</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <b class="lead font-weight-bold"> Inventario</b>
                        </div>
        
                        <div class="d-flex flex-row-reverse mr-4">
                            <div class="p-2">
                                @can('delete producto')
                                <div class="dropdown dropleft">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sort-amount-up-alt"></i> Filtrar por
                                    </a>
        
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('admin.productos.inventario.indexDelete') }}">
                                            <i class="fas fa-ban"></i>
                                            Inventarios eliminados
                                        </a>
                                    </div>
                                </div>
                                @endcan
                            </div>
                            <div class="p-2">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="order-table table table-hover" cellspacing="0" width="100%" id="example4">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Existencia</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col" class="text-center">Administrador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productoInven->getInventary as $inventario)
                                        
                                    <tr>
                                        <td>{{ $inventario->id}}</td>
                                        <td>{{ $inventario->nombre}}</td>
                                            <td>
                                                @if ($inventario->limitado_inventario == "1")
                                                    Ilimitada
                                                @else
                                                    {{$inventario->cantidad_inventario}}
                                                @endif
                                            </td>
                                            <td>$ {{ $inventario->precio }} MXN</td>
                                            
                                            <td class="text-center">
                                        @can('update producto')
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-cogs"></i> Acciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.productos.inventario.edit',$inventario->id)}}"><i class="fas fa-edit"></i> 
                                                                Editar</a>
                                                                <a class="dropdown-item"
                                                                href="{{ route('admin.producto.variante', $inventario->id)}}"><i class="fas fa-box-open"></i>
                                                                    Variantes</a>
                                                                
                                                       @can('delete producto')
                                                        <form action="{{ route('admin.productos.inventario.delete', $inventario->id)}}"
                                                            method="POST" class="eliminar_inventario">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="dropdown-item"
                                                                href="{{ route('admin.productos.inventario.delete', $inventario->id)}}"><i
                                                                    class="far fa-trash-alt"></i> Eliminar</button>
                                                        </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            @endcan
                                            </td>
                                        </tr>
                                    
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.eliminar_inventario').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Este inventario sera eliminado`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado',
                        'Haz eliminado este inventario.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection

@endsection
