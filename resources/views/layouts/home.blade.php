<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @section('title', 'Habanero House')
    <title> @yield('title') - CMS</title>

    <!--Fuentes -->
    <link rel="stylesheet" href="{{ asset('css/fuente.css') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }} ">

    <style>
        /* .portada {
            background: url({{ asset('img/logohabanero.jpeg') }} ) no-repeat fixed center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        } */
        .custom-file-input~.custom-file-label::after {
            content: "Subir"
        }

        .bg-rojo {
            background: #C62828;
            color: white;
        }

        .sidebar-dark-danger .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-danger .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #C62828;
            color: #ffffff;
        }

    </style>
</head>

<body class="hold-transition sidebar-collapsed">
    <div class="wrapper">
        @include('sweetalert::alert')

        <nav class="main-header navbar navbar-expand navbar-dark bg-rojo">

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('admin.home') }}" class="nav-link text-white"><i class="fas fa-home"></i>
                        Inicio</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" data-toggle="dropdown" href="#">
                        <span class="mr-2"><b>|</b></span><span class="mr-2"><b>Perfil</b></span><i
                            class="fas fa-user"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <p class="text-center"> <b>{{ auth()->user()->name }}
                                {{ auth()->user()->apellido_paterno }}</b></p>
                        <span class="dropdown-header">{{ auth()->user()->email }}</span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.usuarios.edit', auth()->user()->id) }}" class="dropdown-item">
                            <i class="fas fa-user-edit mr-2"></i> Editar información
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.usuarios.contraseña', auth()->user()->id) }}"
                            class="dropdown-item">
                            <i class="fas fa-unlock-alt mr-2"></i> Cambiar contraseña
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                            class="fas fa-th-large"></i></a>
                </li> --}}
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-danger navbar-light elevation-4">
            <a href="{{ route('admin.home') }}" class="brand-link navbar-white pl-3">
                <img class="mx-auto d-block" src="{{ asset('img/logohabanero.jpeg') }}" alt="Habanero House"
                    width="170">
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin-lte/dist/img/user.jpg') }}" alt="User Image"
                            class="img-circle elevation-4" style="opacity: .9; height:50px; width:50px">
                    </div>
                    <div class="info mt-2">
                        <a href="{{ route('admin.usuarios.show', auth()->user()->id) }}"
                            class="text-danger">{{ auth()->user()->name }}
                            {{ auth()->user()->apellido_paterno }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Categorias
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categorias.index') }}" class="nav-link text-secondary">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p class="text-black">Gestión de categorias</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    {{-- <a href="#" class="nav-link text-secondary">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Crear categoria</p>
                                    </a> --}}
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Productos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.productos.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Gestión de productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.productos.create') }}" class="nav-link text-secondary">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Crear producto</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fab fa-first-order-alt"></i>
                                <p>
                                    Ordenes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Gestión de ordenes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Crear orden</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item ">
                            <a href="#" class="nav-link active">

                                <i class="nav-icon fab fa-accusoft"></i>
                                <p>
                                    Reportes
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p class="text-black">Gestión de reportes</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Crear reporte</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @can('read usuario')
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{ route('admin.usuarios.index') }}" class="nav-link text-secondary">
                                            <i class="far fa-list-alt nav-icon"></i>
                                            <p class="text-black">Gestión de usuarios</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('admin.usuarios.create') }}" class="nav-link text-secondary">
                                            <i class="fas fa-plus nav-icon"></i>
                                            <p>Crear usuario</p>
                                        </a>
                                    </li>

                                    {{-- <li class="nav-item">
                                    <a href="{{ route('usuarios.indexdelete') }}" class="nav-link text-secondary">
                                        <i class="fas fa-users-slash nav-icon"></i>
                                        <p>Usuarios eliminados</p>
                                    </a>
                                </li> --}}

                                </ul>
                            </li>
                        @endcan
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-mail-bulk"></i>
                                <p>
                                    Mensajes
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('admin.mensajes.index') }}" class="nav-link text-secondary">
                                        <i class="fas fa-envelope-open-text"></i>
                                        <p class="text-black">Gestion de mensajes </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Configuraciones
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('admin.ajustes.index') }}" class="nav-link text-secondary">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p class="text-black">Configurar página</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        <div class="content-wrapper portada">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Laboratorio</h1>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar sidebar-dark-info navbar-danger elevation-2">
            <div class="p-3">
                <h5 class="text-center text-white"><i class="nav-icon fas fa-users"></i> Usuarios</h5>
                <a href="{{ route('usuarios.index') }}" class="nav-link active text-white"><i
                        class="fas fa-user-friends"></i> Lista de usuarios</a>
                <a href="{{ route('usuarios.create') }}" class="nav-link active text-white"><i
                        class="fas fa-user-friends"></i> Crear usuario</a>
                <a href="{{ route('usuarios.indexdelete') }}" class="nav-link active text-white"><i
                        class="fas fa-user-times"></i> Usuarios
                    eliminados</a>
            </div>
        </aside> --}}

        <footer class="main-footer">

            <div class="text-center">
                <p>&copy; <?= date('Y') ?> <strong>Habanero House </strong> .</p>
            </div>
        </footer>
    </div>


    <!-- jQuery -->
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }} "></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    <!-- TableJS -->
    <script src="{{ asset('js/table.js') }}"></script>
    <!--Select2JS-->
    <script src="{{ asset('js/select2.js') }}"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <!-- Page specific script -->
<script>
    $(function () {
      //Enable check and uncheck all functionality
      $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
          //Uncheck all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
          //Check all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
      })
  
      
    })
  </script>

    {{-- AlertConfirmt --}}
    @yield('alerta')

</body>

</html>
