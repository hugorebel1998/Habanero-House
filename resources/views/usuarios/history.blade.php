@extends('layouts.master')

@section('content')
@section('title', 'Historial de compras')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5 mb-5"> <br>
            <div class="card  shadow mt-5 mb-5">
                <div class="card-header bg-negro">
                    <b class="lead font-weight-bold"> <i class="fas fa-history"></i> Historial de ordenes</b>
                </div>
                <div class="card-body">
                    <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tipo de orden</th>
                                <th scope="col">Método de pago</th>
                                <th scope="col">Total pagado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach (Auth::user()->getOrders as $orden)
                                 
                                <tr>
                                    <td>{{ $orden->numero_orden }}</td>
                                    <td>
                                        @if ($orden->status == 0)
                                            <span class="badge badge-warning">En proceso</span>
                                        @elseif($orden->status == 1)
                                            <h5><span class="badge badge-primary">Pago pendiente de confirmación</span>
                                            </h5>
                                        @elseif($orden->status == 2)
                                            <span class="badge badge-primary">Pago recibido</span>
                                        @elseif($orden->status == 3)
                                            <span class="badge badge-primary">Procesando la orden</span>
                                        @elseif($orden->status == 4)
                                            <span class="badge badge-success">Orden enviada</span>
                                        @elseif($orden->status == 5)
                                            <span class="badge badge-success">Orden entregada</span>
                                        @elseif($orden->status == 100)
                                            <span class="badge badge-danger">Orden rechazada</span>

                                        @endif
                                    </td>
                                    <td>
                                        @if ($orden->orden_tipo == 0)
                                            Entrega a domicilio
                                        @elseif($orden->orden_tipo == 1)
                                            Entrega en el restaurante
                                        @endif
                                    </td>

                                    <td>
                                        @if ($orden->metodo_pago == 0)
                                            Pago en efectivo
                                        @elseif($orden->metodo_pago == 1)
                                            Transferencia bancaria
                                        @elseif($orden->metodo_pago == 2)
                                            PayPal
                                        @elseif($orden->metodo_pago == 3)
                                            Tarjeta de credito
                                        @endif
                                    </td>
                                    <td> $ {{ $orden->total }} MNX</td>
                                    <td class="text-center">

                                        <a href="{{ route('usuario.ver.orden', $orden->id) }}"
                                            class="btn btn-primary"><i class="far fa-file-alt"></i> Ver
                                            orden</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br>
</div>

@include('components.buscador')

@section('alerta')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.eliminar_usuario').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro de eliminar?',
                text: `Este usuario sera eliminado`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'Haz eliminado este usuario.',
                        'success'
                    )
                    this.submit();

                }
            })
        });
    </script>
@endsection
@endsection
