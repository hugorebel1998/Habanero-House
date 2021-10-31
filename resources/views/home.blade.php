@extends('layouts.master')
@section('title', 'Inicio')
@section('content')



<!-- Start slides -->
<div id="slides" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="{{ asset('img/home/slider-01.jpg')}} " alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bienvenido a <br> Habanero House</strong></h1>
                        <p class="m-b-40">AUTENTICA COMIDA YUCATECA.</p>
                        {{-- <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p> --}}
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('img/home/slider-02.jpg')}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bienvenido a <br> Habanero House</strong></h1>
                        <p class="m-b-40">AUTENTICA COMIDA YUCATECA.</p>
                        {{-- <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p> --}}
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('img/home/slider-03.jpg')}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bienvenido a <br> Habanero House</strong></h1>
                        <p class="m-b-40">AUTENTICA COMIDA YUCATECA.</p>
                        {{-- <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p> --}}
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End slides -->

<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="{{ asset('img/home/nosotros.jpg')}}" alt="" class="img-fluid shadow">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Bienvenido a <span>Habanero House</span></h1>
						<h2>Edward Stanley</h2>
						<p>!Aquellos que piensan que no tienen tiempo para una alimentación saludable tarde o temprano encontrarán tiempo para la enfermedad. </p>
						
						{{-- <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

    <!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					<p class="lead ">
						"Cualquiera puede hacerte disfrutar del primer bocado de un plato, pero sólo un verdadero chef puede hacerte disfrutar del último"
					</p>
					<span class="lead">-Francois Minot</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

   <!-- Start Menu -->
	{{-- <div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Menú</h2>
						<p>Especialidad de la casa</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">Todo</button>
							<button data-filter=".drinks">Bebidas</button>
							<button data-filter=".lunch">Comidas</button>
							
						</div>
					</div>
				</div>
			</div>
				
			<div class="row special-list">
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-01.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Drinks 1</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $7.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-02.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Drinks 2</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $9.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-03.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Drinks 3</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $10.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-04.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Lunch 1</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $15.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-05.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Lunch 2</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $18.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-06.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Lunch 3</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $20.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-07.jpg') }}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Dinner 1</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $25.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-08.jpg') }}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Dinner 2</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $22.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="{{ asset('img/home/img-09.jpg') }}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Special Dinner 3</h4>
							<p>Sed id magna vitae eros sagittis euismod.</p>
							<h5> $24.79</h5>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div> --}}
	<!-- End Menu -->

    <!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Degustaciones de la casa</h2>
						{{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p> --}}
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-01.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-01.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-02.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-02.jpg')}}" alt="Gallery Images" >
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-03.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-03.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-04.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-04.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-05.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-05.jpg')}}" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-06.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-06.jpg')}}" alt="Gallery Images">
						</a>
					</div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-07.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-07.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-08.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-08.jpg')}}" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{ asset('img/home/gallery-img-09.jpg')}}">
							<img class="img-fluid" src="{{ asset('img/home/gallery-img-09.jpg')}}" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
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
                {{-- <div class="col-lg-3 col-md-6">
                    <h3>Sobre nosotros</h3>
                    <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta,
                        ac eleifend arcu ultrices.</p>
                </div> --}}
                <div class="col-lg-4 col-md-4">
                    <h3>Horario</h3>
                    <p>Domingo: 11:00 - 19:00</p>
                    <p>Lunes: 11:00 - 19:00</p>
                    <p>Martes: 11:00 - 19:00</p>
                    <p>Miercoles: 11:00 - 19:00</p>
                    <p>Jueves: 11:00 - 19:00</p>
                    <p>Viernes: 11:00 - 19:00</p>
                    <p>Sábado: 11:00 - 19:00</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3>Dirección</h3>
                    <p class="lead">Sindicato Nacional de Electricistas 16, Hab Electra, 54060 Tlalnepantla de Baz, Méx</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3>Redes sociales</h3>
                    <ul class="list-inline f-social">
                        <li class="list-inline-item"><a href="https://www.facebook.com/HabaneroHouse" target="_blank"><i class="fab fa-facebook-square test-white"></i></a></li>
                        {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-twitter-square"></i></a></li> --}}
                        {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li> --}}
                        <li class="list-inline-item"><a href="https://www.google.com/search?q=habanero+house+&sxsrf=AOaemvIkeYptiEKGvtFafRsEXUfZk7s31A%3A1635294742924&ei=Fp54YdnpN-e5qtsP3sWU-Ao&ved=0ahUKEwjZzITSq-nzAhXnnGoFHd4iBa8Q4dUDCA4&uact=5&oq=habanero+house+&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECc6CggjELACELADECc6BwgjEOoCECc6DQguEMcBEKMCEOoCECc6BAguEEM6CAgAEIAEELEDOg4ILhCABBCxAxDHARCjAjoICAAQsQMQgwE6DgguEIAEELEDEMcBENEDOgsILhCABBDHARCjAjoECAAQQzoKCC4QxwEQrwEQJzoHCC4QsQMQQzoLCAAQgAQQsQMQgwE6EAguEIAEEIcCEMcBEK8BEBQ6CAguEIAEELEDOgUIABCABDoGCAAQChATOgYILhAKEBM6CAgAEAoQHhATOgYIABAeEBNKBAhBGAFQ3lhYt5EBYK6UAWgEcAB4AIABkweIAcovkgENMC4yLjIuMi4xLjIuM5gBAKABAbABCsgBAcABAQ&sclient=gws-wiz" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/habanero_house_oficial/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="derechos-autor">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p><?= date('Y')?> | Habanero House:
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
	
@endsection