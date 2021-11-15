@extends('layouts.home')
@section('content')
@section('title', 'Inventario producto')
<div class="container-fluid">
    <h4 class="text-right text-white"> <i class="fas fa-utensils"></i> {{ ucfirst($inventario->nombre) }}</h4>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-danger shadow">
                        <div class="card-header">
                            <div class="card-tittle"><i class="fas fa-clipboard-check"></i> Crear variante</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.producto.variante.store', $inventario->id)}}" method="POST"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12 mt-1">
                                        <label for="nombre">Nombre</label>
                                        {{-- <input type="hidden" name="product_id" value="{{ $variante->product_id}}">
                                        <input type="hidden" name="inventory_id" value="{{ $variante->inventory_id}}"> --}}
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-save"></i>
                                        Guardar variante</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <b class="lead font-weight-bold"> Variantes</b>
                        </div>
                        <div class="card-body">
                            <table class="order-table table table-hover" cellspacing="0" width="100%" id="example4">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>

                                        <th scope="col" class="text-center">Administrador</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variantes as $variante)
                                    <tr>
                                        <td>{{ $variante->id}}</td>
                                        <td>{{ $variante->nombre}}</td>

                                        <td class="text-center">
                                            <form action="{{ route('admin.productos.variante.delete', $variante->id)}}"
                                                method="POST" class="eliminar_variante">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-sm btn-danger"
                                                    href="{{ route('admin.productos.variante.delete', $variante->id)}}"><i class="far fa-trash-alt"></i> Eliminar</button>
                                            </form>
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
    $('.eliminar_variante').submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Estas seguro de eliminar?',
            text: `Esta vvariante sera eliminada`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Eliminado',
                    'Haz eliminado esta variante.',
                    'success'
                )
                this.submit();

            }
        })
    });
</script>
@endsection

@endsection