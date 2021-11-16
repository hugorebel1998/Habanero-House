@extends('layouts.home')
@section('content')
@section('title', 'Gestión categorias eliminadas')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card shadow transparente">
                <div class="card-header">
                    <b class="lead font-weight-bold">Categorias eliminadas</b>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="categoria">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categorias as $categoria)
                                <tr @if ($categoria->deleted_at) class="table-danger" @endif>

                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td style="font-size: 30px">{!! $categoria->icono !!}</td>
                                    <td>{{ $categoria->descripcion }}</td>
                                    <td>{{ $categoria->created_at }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.categorias.categoriarestore', $categoria->id) }}"
                                            class="btn btn-sm btn-info restablecer_categoria">
                                            <i class="fas fa-trash-restore"></i> Restablecer</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@include('components.buscador')

@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".restablecer_categoria").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Esta categoria sera restablecida`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, restablecer!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Éxito',
                        'Restableciste esta categoria.',
                        'success'
                    )
                    document.location.href = href;
                }
            })
        })
    </script>
@endsection

@endsection
