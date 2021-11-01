@extends('layouts.master')
@section('title', 'Contacto')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 mt-5">
                        <br><br><br>
                        <div class="card shadow mt-5">
                            <div class="body text-center">
                             <h2 class="mt-3 text-danger">Habanero house</h2>
                             <p>Sindicato Nacional de Electricistas 16, Hab Electra, 54060 Tlalnepantla de Baz, Méx.</p>
                             <b>Desatunos:</b>
                             <p>Miércoles a domingo de 9:00 a 11:30 hr.</p>
                             <b>Comidas y cenas:</b>
                             <p>Lunes a sábados de 13:00 a 22:00 hr. <br>
                                Domingo 13:00 a 17:30 hr.
                            </p>
                            <a href="tel:+525560685209" class="btn btn-danger mb-4 mt-2 "><i class="fas fa-phone"></i> Llámanos</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8 mt-5"><br>
                        <h3 class="mt-5 mb-3">Envíenos sus dudas y comentarios, nos pondremos en contacto con usted
                        </h3>
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-tittle"><i class="fas fa-envelope-open-text"></i> Contáctanos</div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('usuario.contacto.sotre') }}" method="post" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                value="{{ old('nombre') }}">
                                            @error('nombre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="correo_electrónico">Correo electrónico</label>
                                            <input type="email" name="correo_electrónico"
                                                class="form-control @error('correo_electrónico') is-invalid @enderror"
                                                value="{{ old('correo_electrónico') }}">
                                            @error('correo_electrónico')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for="descripción">Mensaje</label>
                                            <textarea name="descripción"
                                                class="form-control @error('descripción') is-invalid @enderror"
                                                rows="3"></textarea>
                                            @error('descripción')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-paper-plane"></i>
                                            Enviar mensaje</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
