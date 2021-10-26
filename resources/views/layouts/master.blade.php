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
    background: url({{ asset('img/home/qt-bg.jpg')}}) no-repeat;
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
        

</style>
</head>
<body>

    <header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href=""><i class="fas fa-home"></i> Inicio</a></li>
						<li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-utensils"></i> Menú</a></li>
						<li class="nav-item"><a class="nav-link" href="#"> <i class="fas fa-anchor"></i> N osotros</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.html"><i class="far fa-id-badge"></i>Contacto</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"><i class="fas fa-sign-in-alt"></i> Login</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#"> Inisiar sesión</a>
								<a class="dropdown-item" href="#">Registrarse</a>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
	</header>



    <main class="login">
        @yield('content')
    </main>

 <!-- Start Contact info -->
    <div class="contact-imfo-box">
        <div class="container">
            <div class="row">
                <!--Linea de color-->
            </div>
        </div>
    </div>
    <!-- End Contact info -->

	<div class="container">
        <div id="button-up">
            <i class="fal fa-long-arrow-up"></i>
        </div>
        <div id="button-whatsaap">
        <a href="https://api.whatsapp.com/send?phone=525560685209&text=Me%20interesa%20más%20información" target="_blank"><i class="fab fa-whatsapp"></i></a>            
        </div>
    </div>


    <!-- Start Footer -->
    <footer class="footer-area bg-f">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h3>Sobre nosotros</h3>
                    <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta,
                        ac eleifend arcu ultrices.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Horario de apertura</h3>
                    <p><span class="text-color">Monday: </span>Closed</p>
                    <p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
                    <p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
                    <p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Contacto</h3>
                    <p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
                    <p class="lead"><a href="#">+01 2000 800 9999</a></p>
                    <p><a href="#"> info@admin.com</a></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3>Redes sociales</h3>
                    <div class="subscribe_form">
                        {{-- <form class="subscribe_form">
                            <input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
                            <button type="submit" class="submit">SUBSCRIBE</button>
                            <div class="clearfix"></div>
                        </form> --}}
                    </div>
                    <ul class="list-inline f-social">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Yamifood Restaurant</a> Design By :
                            <a href="https://html.design/">html design</a></p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

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