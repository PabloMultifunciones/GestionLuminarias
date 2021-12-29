@extends('layouts.app')

@push('nav-items')
<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesion</a>
    </li>
</ul>

<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('changepassword') }}">Cambiar Contraseña</a>
    </li>
</ul>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cambiar Contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('changepassword') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Actual') }}</label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="current-password">

                                @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="newpassword" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña Nueva') }}</label>

                            <div class="col-md-6">
                                <input id="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" required autocomplete="current-password">

                                @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Cambiar') }}
                        </button>
                    </form>
                </div>
            </div>
            @if(Session::has('message_success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{Session('message_success')}}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
