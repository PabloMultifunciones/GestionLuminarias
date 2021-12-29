@extends('layouts.app')

@push('nav-info-user')
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link disabled">{{Auth::user()->name}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled">{{Auth::user()->dni}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled">
            @if(Auth::user()->role->role == 'admin')
                Administrador
            @else
                Usuario
            @endif     
        </a>
    </li>
</ul>
@endpush

@push('nav-items')

<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('changepassword') }}">Cambiar Contraseña</a>
    </li>
</ul>

<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesion</a>
    </li>
</ul>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-center">{{ __('Tareas') }}</div>

                <div class="card-body">

                    @if($role == 'admin')
                       @include('layouts.admin')
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    @if($role == 'user')
                        @foreach($tasks as $task)
                           @include('layouts.user')
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
