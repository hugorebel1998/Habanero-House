@extends('layouts.home')
@section('content')
@section('title', 'Gestión de coverturas eliminadas')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card shadow transparente">
                <div class="card-header">
                    <b class="lead font-weight-bold">Coverturas eliminadas</b>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="categoria">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio de envío</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($coverturas as $covertura)
                                <tr @if ($covertura->deleted_at) class="table-danger" @endif>

                                    <td>{{ $covertura->status }}</td>
                                    <td>{{ $covertura->nombre }}</td>
                                    <td>{{ $covertura->precio }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.covertura.index.restore', $covertura->id) }}"
                                            class="btn btn-sm btn-info restablecer_covertura">
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
        $(".restablecer_covertura").click(function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Estas seguro de querer restablecerlo?',
                text: `Esta covertura sera restablecida`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, restablecer!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Éxito',
                        'Restableciste esta covertura.',
                        'success'
                    )
                    document.location.href = href;
                }
            })
        })
    </script>
@endsection

@endsection
