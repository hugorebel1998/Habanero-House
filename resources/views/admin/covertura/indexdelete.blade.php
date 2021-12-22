@extends('layouts.home')
@section('content')
@section('title', 'Gestión de coverturas eliminadas')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card card-danger card-outline shadow transparente">
                <div class="card-header">
                    <b class="lead font-weight-bold"> <i class="fas fa-archway"></i> Municipios / Delegaciones eliminadas</b>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="text-center">Administrador</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($coverturas as $covertura)
                                <tr @if ($covertura->deleted_at) class="table-danger" @endif>

                                    <td>
                                        @if ($covertura->status == 1)
                                        <span class="badge badge-pill badge-info p-2"
                                            style="font-size: .8rem">Activo</span>
                                    @else
                                        <span class="badge badge-pill badge-danger p-2"
                                            style="font-size: .8rem">No activo</span>
                                    @endif
                                    </td>
                                    <td>{{ $covertura->nombre }}</td>                                    
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
