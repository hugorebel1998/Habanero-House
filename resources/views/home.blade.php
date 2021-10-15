@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="small-box bg-danger">
                
                <div class="small-box bg-danger shadow">
                    <div class="inner">
                      <h4 id="tittlehome" class="mt-4">Bienvenido <b id="tittlehomesub">{{ auth()->user()->cargo }}</b></h4>
                      <h4 id="tittledescripcion" class="mt-4 mb-4">Que haremos HOY !!!</h4>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-tie mt-4"></i>
                    </div>
                    <a href="{{ url('/')}}" class="small-box-footer"><i class="fas fa-pepper-hot"></i></i></a>
                  </div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Que aremos HOY !!') }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
