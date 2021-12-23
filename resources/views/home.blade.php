@extends('layouts.master')
@section('title', 'Inicio')
@section('content')


<div id="slides" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="{{ asset('img/home/slider-01.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bienvenido a <br> Habanero House</strong></h1>
                        <p class="m-b-40">AUTENTICA COMIDA YUCATECA.</p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('img/home/slider-02.jpg')}}" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bienvenido a <br> Habanero House</strong></h1>
                        <p class="m-b-40">AUTENTICA COMIDA YUCATECA.</p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('img/home/slider-03.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Bienvenido a <br> Habanero House</strong></h1>
                        <p class="m-b-40">AUTENTICA COMIDA YUCATECA.</p>
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
						<h4>Edward Stanley</h4>
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
					<p>
						"Cualquiera puede hacerte disfrutar del primer bocado de un plato, pero sólo un verdadero chef puede hacerte disfrutar del último"
					</p>
					<span class="lead">- Francois Minot</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

  

    <!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h1>Degustaciones de la casa</h1>
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


	
@endsection