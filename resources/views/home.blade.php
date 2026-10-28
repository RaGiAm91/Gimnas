@extends('layouts.master')

@section('titulo', 'Home')

@section('content')

<div class="container mt-4">

    @auth
        @if (Auth::user()->email == 'admin@admin.cat')

<div class="card shadow border-0 mb-3">
    <div class="card-body text-center">
        <img src="{{ asset('img/minilogo.png') }}" alt="logo">
        <h2>Panel administrador</h2>
        <p>Gestión de categorías y ejercicios</p>

        <div class="row justify-content-center">

                <div class="col-md-6 col-lg-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ asset('img/categorias.jpg') }}" alt="logo">
                    <div class="card-body">
                        <a href="{{ route('categorias.index') }}" class="btn btn-primary m-2">
                            Gestionar categorías
                        </a>
                    </div>
                 </div>
                </div>

              <div class="col-md-6 col-lg-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ asset('img/exercicis.png') }}" alt="logo">
                    <div class="card-body">
                        <a href="{{ route('exercicis.index') }}" class="btn btn-primary m-2">
                            Gestionar ejercicios
                        </a>
                    </div>
                </div>
                </div>

          </div>
    </div>
</div>
            
        @else
<div class="card shadow border-0 mb-3">
    <div class="card-body text-center">
        <img src="{{ asset('img/minilogo.png') }}" alt="logo">
        <h2>Bienvenido cliente</h2>
        <p>Accede a tus rutinas o explora ejercicios</p>

        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ asset('img/categorias.jpg') }}" alt="logo">
                    <div class="card-body">
                        <a href="{{ route('categorias.index') }}" class="btn btn-success m-2">
                            Ver categorías
                        </a>
                    </div>
                </div>
            </div>

                <div class="col-md-6 col-lg-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ asset('img/rutinas.jpg') }}" alt="logo">
                    <div class="card-body">
                    <a href="{{ route('rutinas.index') }}" class="btn btn-success m-2">
                    Mis rutinas
                    </a>
                    </div>
                </div>
            </div>

                        <div class="col-md-6 col-lg-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="{{ asset('img/exercicis.png') }}" alt="logo">
                    <div class="card-body">
                        <a href="{{ route('exercicis.index') }}" class="btn btn-primary m-2">
                            Ver ejercicios
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

        @endif

    @endauth

    @guest
        <div class="text-center">
            <h2>Bienvenido al gimnasio</h2>
            <p>Inicia sesión o regístrate para continuar</p>

            <a href="{{ route('login') }}" class="btn btn-primary m-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary m-2">Registro</a>
        </div>
    @endguest

</div>

@endsection