<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeName" content="{{ Route::currentRouteName() }}">
    <title>@yield('title') - Habanero House </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('css/master/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master/custom.css') }}" rel="stylesheet">
    <!--Fuentes -->
    <link rel="stylesheet" href="{{ asset('css/fuente.css') }}">

    @yield('custom_meta')


    <style>
        .qt-background {
            background: url("{{ asset('img/home/qt-bg.jpg') }}") no-repeat;
            background-size: cover;
            padding: 100px 0;
            background-attachment: fixed;
            background-position: center center;
            position: relative;
        }

        .qt-background:before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);

        }

        .qt-background p {
            font-size: 40px;
            font-weight: 300;
            line-height: 44px;
            color: #fff;
            font-family: 'Karla', sans-serif;
            margin-bottom: 20px;
        }

        .qt-background span {
            color: #fff;
            font-size: 30px;
            font-weight: 500;
        }

        #button-up {
            width: 50px;
            height: 50px;
            background: #EF5350;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 27px;
            border-radius: 50%;
            position: fixed;
            bottom: 50px;
            right: 50px;
            cursor: pointer;
            border: 1px solid #EF5350;
            transition: all 300ms ease;
            transform: scale(0);
            z-index: 10;
        }

        #button-up:hover {
            transform: scale(1.1);
            border-color: rgba(0, 0, 0, 0.808)
        }

        #button-whatsaap {
            width: 60px;
            height: 60px;
            background-color: #00bb2d;
            color: grey;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            border-radius: 50%;
            position: fixed;
            bottom: 50px;
            left: 50px;
            cursor: pointer;
            border: 4px solid transparent;
            transition: all 300ms ease;
            z-index: 10;
        }

        #button-whatsaap:hover {
            transform: scale(1.1);
            border-color: rgba(0, 0, 0, 0.1)
        }

        #button-whatsaap a {
            color: white;
            text-decoration: none;
        }

        .bg-f {
            background-image: url("{{ asset('img/home/footer.jpg') }}");
            background-attachment: scroll;
            background-clip: initial;
            background-color: rgba(0, 0, 0, 0);
            background-origin: initial;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .navbar-brand img {
            width: 120px;
        }

        .custom-file-input~.custom-file-label::after {
            content: "Subir"
        }

        .page-breadcrumb {
            padding: 250px 0 150px;
            background: url("{{ asset('img/home/fondo-rojo.jpg') }}") no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: 0 0;
            position: relative;
        }

        #add_to_cart {
            display: block;
            width: 100px;
            height: calc(1.5em + 0.3rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

    </style>
</head>

<body>

    <div class="loader" id="loader">
        <div class="box">
            <div class="car">
                <img src="{{ asset('img/bandeja.png') }}">
            </div>
            <div class="load">
                <img src="{{ asset('img/loader.svg') }}">
            </div>
        </div>

    </div>
    @include('sweetalert::alert')
    <header id="navbar-scroll" class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('img/logohabanero.jpeg') }}" alt="Habanero House" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}"><i
                                    class="fas fa-home"></i> Inicio</a></li>
                        <li class="nav-item "><a class="nav-link"
                                href="{{ route('usuario.mostrar.menu') }}"><i class="fas fa-utensils"></i> Menú</a>
                        </li>
                        <li class="nav-item "><a class="nav-link"
                                href="{{ route('usuario.about.nosotros') }}"> <i class="fas fa-anchor"></i>
                                Nosotros</a></li>
                        <li class="nav-item "><a class="nav-link"
                                href="{{ route('usuario.mostrar.contacto') }}"><i class="far fa-id-badge"></i>
                                Contacto</a></li>
                        {{-- <li class="nav-item dropdown">
                        
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cart-plus"></i></i> 0
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">
                                    <img src="{{ asset('img/products/panuchos.png') }}"
                                        class="rounded mx-auto img-thumbnail" width="80">
                                    
                                </a>
                            </div>
                        </li> --}}
                        @guest
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i
                                        class="fas fa-sign-in-alt"></i> Login</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                    <a class="dropdown-item" href="{{ route('login') }}"> Iniciar sesión</a>
                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                                    @endif
                                </div>

                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                    {{ Auth::user()->apellido_paterno }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('usuario.edit.perfil', auth()->user()->id) }}">
                                        <i class="fas fa-user-edit"></i> {{ __('Editar indormación') }}
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ route('usuario.contraseña.perfile', auth()->user()->id) }}">
                                        <i class="fas fa-unlock-alt"></i> {{ __('Cambiar contraseña') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-in-alt"></i> {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>



    {{-- <main class="login">
        @yield('content')
    </main> --}}


    <main class="master">
        @yield('content')
    </main>




    <!-- Start Footer -->
    <footer class="footer-area bg-f">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h3><i class="fas fa-calendar-week"></i> Horario</h3>
                    <p>Lunes: 11:00 - 19:00</p>
                    <p>Martes: 11:00 - 19:00</p>
                    <p>Miércoles: 11:00 - 19:00</p>
                    <p>Jueves: 11:00 - 19:00</p>
                    <p>Viernes: 11:00 - 19:00</p>
                    <p>Sábado: 11:00 - 19:00</p>
                    <p>Domingo: 11:00 - 19:00</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3><i class="fas fa-map-marker-alt"></i> Dirección</h3>
                    <p> <a href="https://www.google.com.mx/maps/place/Sindicato+Nacional+de+Electricistas+16,+Hab+Electra,+54060+Tlalnepantla+de+Baz,+M%C3%A9x./@19.5277411,-99.2224059,17z/data=!3m1!4b1!4m5!3m4!1s0x85d21d33ca85b037:0x5cef53018627ccfe!8m2!3d19.5277361!4d-99.2202172"
                            target="_black">Sindicato Nacional de Electricistas 16, Hab Electra, 54060 Tlalnepantla de
                            Baz, Méx</a></p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3><i class="fas fa-retweet"></i> Redes sociales</h3>
                    <ul class="list-inline f-social">
                        <li class="list-inline-item"><a href="https://www.facebook.com/HabaneroHouse" target="_blank"><i
                                    class="fab fa-facebook-square test-white"></i></a></li>
                        <li class="list-inline-item"><a
                                href="https://www.google.com/search?q=habanero+house+&sxsrf=AOaemvIkeYptiEKGvtFafRsEXUfZk7s31A%3A1635294742924&ei=Fp54YdnpN-e5qtsP3sWU-Ao&ved=0ahUKEwjZzITSq-nzAhXnnGoFHd4iBa8Q4dUDCA4&uact=5&oq=habanero+house+&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECc6CggjELACELADECc6BwgjEOoCECc6DQguEMcBEKMCEOoCECc6BAguEEM6CAgAEIAEELEDOg4ILhCABBCxAxDHARCjAjoICAAQsQMQgwE6DgguEIAEELEDEMcBENEDOgsILhCABBDHARCjAjoECAAQQzoKCC4QxwEQrwEQJzoHCC4QsQMQQzoLCAAQgAQQsQMQgwE6EAguEIAEEIcCEMcBEK8BEBQ6CAguEIAEELEDOgUIABCABDoGCAAQChATOgYILhAKEBM6CAgAEAoQHhATOgYIABAeEBNKBAhBGAFQ3lhYt5EBYK6UAWgEcAB4AIABkweIAcovkgENMC4yLjIuMi4xLjIuM5gBAKABAbABCsgBAcABAQ&sclient=gws-wiz"
                                target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/habanero_house_oficial/"
                                target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="derechos-autor">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p><?= date('Y') ?> | Habanero House </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->



    
    <script src="{{ asset('js/master/jquery-3.2.1.min.js') }} "></script>
    <script src="{{ asset('js/master/popper.min.js') }} "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <!-- ALL PLUGINS -->
    <script src="{{ asset('js/master/jquery.superslides.min.js') }} "></script>
    <script src="{{ asset('js/master/images-loded.min.js') }}"></script>
    <script src="{{ asset('js/master/isotope.min.js') }} "></script>
    <script src="{{ asset('js/master/baguetteBox.min.js') }} "></script>
    {{-- <script src="{{ asset('js/master/form-validator.min.js') }} "></script>
    <script src="{{ asset('js/master/contact-form-script.js') }} "></script> --}}
    <script src="{{ asset('js/master/custom.js') }} "></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }} "></script>
    <!--slider-->
    <script src="{{ asset('js/sitio.js') }}"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        document.getElementById("button-up").addEventListener('click', scrollUp);

        function scrollUp() {
            const $scroll = document.documentElement.scrollTop;

            if ($scroll > 0) {
                window.requestAnimationFrame(scrollUp);
                window.scrollTo(0, $scroll - ($scroll / 13));
            }
        }
        const $buton = document.getElementById("button-up");
        window.onscroll = function() {

            const $scrollDos = document.documentElement.scrollTop;
            if ($scrollDos > 200) {

                $buton.style.transform = "scale(1)";
            } else if ($scrollDos < 200) {
                $buton.style.transform = "scale(0)";
            }
        }
    </script>

    {{-- <script>
        let preScroll = window.pageYOffset;
        window.onscroll = function(){
            let currentScroll = window.pageYOffset;
            if(preScroll > currentScroll ){
                document.getElementById('navbar-scroll').style.top = "0";
            }else{
                document.getElementById('navbar-scroll').style.top = "-120px"; 
            }
            preScroll = currentScroll;
        }
    </script> --}}
</body>

</html>
