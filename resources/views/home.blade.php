@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="small-box bg-danger">
                
                <div class="small-box bg-danger">
                    <div class="inner">
                      <h4>Bienvenido <b>{{ auth()->user()->name }}</b></h4>
                      <p>Que haremos HOY !!!</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-tie"></i>
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
