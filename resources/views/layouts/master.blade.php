<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Habanero House </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('css/master/style.css') }}" rel="stylesheet" >
	<link href="{{ asset('css/master/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('css/master/custom.css') }}" rel="stylesheet">
    
<style>
   .qt-background {
    background: url("{{ asset('img/home/qt-bg.jpg')}}") no-repeat;
    background-size: cover;
    padding: 100px 0;
    background-attachment: fixed;
    background-position: center center;
    position: relative;
}
.qt-background p {
        font-size: 40px;
        font-weight: 300;
        line-height: 44px;
        color: #fff;
        font-family: 'Arbutus Slab', serif;
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
            background:#EF5350;
            display: flex;
            justify-content: center;
            align-items: center;
            color:white;
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
        #button-whatsaap{
            width: 60px;
            height: 60px;
            background-color:#00bb2d;
            color:grey;
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
        background-image: url("{{ asset('img/home/footer.jpg')}}");
        background-attachment: scroll;
        background-clip: initial;
        background-color: rgba(0, 0, 0, 0);
        background-origin: initial;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }
    .navbar-brand img{
        width:120px;
    }
     .custom-file-input~.custom-file-label::after {
            content: "Subir"
        }

</style>
</head>
<body>
    @include('sweetalert::alert')
    <header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="{{ route('home')}}">
					<img src="{{ asset('img/logohabanero.jpeg')}}" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="{{ route('home')}}"><i class="fas fa-home"></i> Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-utensils"></i> Menú</a></li>
						<li class="nav-item"><a class="nav-link" href="#"> <i class="fas fa-anchor"></i> Nosotros</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.html"><i class="far fa-id-badge"></i> Contacto</a></li>
						@guest
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fas fa-sign-in-alt"></i> Login</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="{{ route('login')}}"> Iniciar sesión</a>
								@if(Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register')}}">Registrarse</a>
                                @endif
							</div>
  
						</li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('usuario.edit.perfil', auth()->user()->id )}}">
                                       <i class="fas fa-user-edit"></i> {{ __('Editar indormación') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('usuario.contraseña.perfile', auth()->user()->id )}}">
                                        <i class="fas fa-unlock-alt"></i> {{ __('Cambiar contraseña') }}
                                     </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-in-alt"></i> {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        
        
    


    

    <script src="{{ asset('js/master/jquery-3.2.1.min.js')}} "></script> 
	<script src="{{ asset('js/master/popper.min.js')}} "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- ALL PLUGINS -->
	<script src="{{ asset('js/master/jquery.superslides.min.js')}} "></script>
	<script src="{{ asset('js/master/images-loded.min.js')}}"></script>
	<script src="{{ asset('js/master/isotope.min.js')}} "></script>
	<script src="{{ asset('js/master/baguetteBox.min.js')}} "></script>
	<script src="{{ asset('js/master/form-validator.min.js')}} "></script>
    <script src="{{ asset('js/master/contact-form-script.js')}} "></script>
    <script src="{{ asset('js/master/custom.js')}} "></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }} "></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

     <script>
      
      document.getElementById("button-up").addEventListener('click', scrollUp);
      function scrollUp(){
        const $scroll = document.documentElement.scrollTop;
        
        if($scroll > 0 ){
          window.requestAnimationFrame(scrollUp);
          window.scrollTo(0,$scroll - ($scroll/13));
        }
      }
      const $buton = document.getElementById("button-up");
      window.onscroll = function(){
        
        const $scrollDos = document.documentElement.scrollTop;
        if($scrollDos > 200){
          
          $buton.style.transform="scale(1)";
        }else if($scrollDos < 200){
          $buton.style.transform="scale(0)";
        }
      }
    </script>
    
</body>

</html>