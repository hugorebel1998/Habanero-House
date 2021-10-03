<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Habanero House</title>
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
    <!-- SweetAlert2 -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
    @include('sweetalert::alert')

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
            <!-- Left navbar links -->
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span class="mr-2"><b>|</b></span><span class="mr-2"><b>Perfil</b></span><i
                            class="fas fa-user"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <p class="text-center">{{ auth()->user()->name }}</p>
                        <span class="dropdown-header">{{ auth()->user()->email }}</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-edit mr-2"></i> Editar información
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
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
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                            class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-danger navbar-light elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link navbar-white pl-3">
                <img class="mx-auto d-block" src="{{ asset('img/habanero-logo.png') }}" alt="Habanero House"
                    width="100">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin-lte/dist/img/user.jpg') }}" alt="User Image"
                            class="img-circle elevation-4" style="opacity: .9;">
                    </div>
                    <div class="info">
                        <a href="#" class="text-danger">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Empresas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-dark">
                                        <!-- <i class="fas fa-list-ul"></i> -->
                                        <img src="{{ asset('img/Botones/12.png') }}" height="20"
                                            alt="Gestion de empresas">
                                        <p>&nbsp;Gestiónar empresas</p>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider text-dark"></div>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-dark">
                                        <i class="fas fa-plus"></i>
                                        <p>&nbsp;Agregar empresa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link active ">
                                <img src="{{ asset('img/Botones/8.png') }}" height="20" alt="importar">
                                <p>
                                    Importar
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-dark">
                                        <img src="#" height="20" alt="">
                                        <p>Colaboradores Corporativo</p>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider text-dark"></div>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-dark">
                                        <img src="{{ asset('img/Botones/9.png') }}" height="20" alt="">
                                        <p>Colaboradores Sucursal</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper portada">
            <!-- Content Header (Page header) -->
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
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar sidebar-dark-info navbar-light elevation-2">
            <div class="p-3">
                <h5 class="text-center text-gray"><i class="nav-icon fas fa-users"></i> Usuarios</h5>
                <a href="{{ route('usuarios.index') }}" class="nav-link active text-gray"><i
                        class="fas fa-user-friends"></i> Lista de usuarios</a>
                <a href="#" class="nav-link active text-gray"><i class="fas fa-user-friends"></i> Crear usuario</a>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">

            <div class="text-center">
                <p>&copy; <?= date('Y') ?> <strong>Life in Genomics </strong> .</p>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example3').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": [
                    [0, 'desc']
                ],
                language: {
                    search: "Buscar:",
                    "lengthMenu": "Recorrer _MENU_ registros por página",
                    "zeroRecords": "No hay resultados",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    paginate: {
                        first: "Primera",
                        previous: "Primera",
                        next: "Última",
                        last: "Último"
                    },
                }
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": [
                    [0, 'desc']
                ],
                language: {
                    search: "Buscar:",
                    "lengthMenu": "Recorrer _MENU_ registros por página",
                    "zeroRecords": "No hay resultados",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    paginate: {
                        first: "Primera",
                        previous: "Primera",
                        next: "Última",
                        last: "Último"
                    },
                }
            });
        });
    </script>


</body>

</html>
