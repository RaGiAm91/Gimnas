<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt">&#128170;</span> Gimnasio</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
        @if (Auth::user()->email == 'admin@admin.cat')
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item {{ Request::is('gimnas/categorias/index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a>
                </li>

                <li class="nav-item {{ Request::is('gimnas/exercicis/index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('exercicis.index') }}">Ejercicios</a>
                </li>
            </ul>
        @elseif( true || Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item {{ Request::is('gimnas') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('exercicis.index') }}">Ejercicios</a>
                </li>

                <li class="nav-item {{ Request::is('gimnas/rutinas/index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rutinas.index') }}">Mis Rutinas</a>
                    
                </li>

                <li class="nav-item {{ Request::is('gimnas/rutinas/create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rutinas.create') }}">Añadir rutina</a>
                </li>
            </ul>
            @endauth

        @auth
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        Perfil
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            Desconectarse
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    @endauth
</div>
        @endif
    </div>
</nav>