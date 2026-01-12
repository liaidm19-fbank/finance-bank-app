{{-- Barra FDIC --}}
<div class="text-white py-2 text-center small" style="background:#1a5f4a">
    <strong>FDIC</strong> FDIC-Insured - Backed by the full faith and credit of the U.S. Government
</div>

<nav class="navbar navbar-expand-lg navbar-dark"
     style="background: linear-gradient(to right, #1a4d7a, #1e5a8c, #1a4d7a);">

    <div class="container position-relative">

        {{-- Logo móvil --}}
        <a class="navbar-brand d-lg-none" href="/">
            <img src="{{ asset('financebank-logo.png') }}" width="42">
        </a>

        {{-- Toggle --}}
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMain"
                aria-controls="navbarMain"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Logo desktop centrado --}}
        <a class="navbar-brand position-absolute top-50 start-50 translate-middle d-none d-lg-block"
           href="/">
            <img src="{{ asset('financebank-logo.png') }}" width="54">
        </a>

        {{-- CONTENIDO (ESTO NO DEBE FALTAR) --}}
        <div class="collapse navbar-collapse" id="navbarMain">

            {{-- Menú izquierdo --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-4">
                <li class="nav-item"><a class="nav-link" href="/">Personal</a></li>
                <li class="nav-item"><a class="nav-link" href="/business">Negocios</a></li>
                <li class="nav-item"><a class="nav-link" href="/commercial">Comercial</a></li>
            </ul>

            {{-- Acciones derecha --}}
            <div class="d-flex flex-column flex-lg-row gap-3">

                @auth
                    <a href="{{ route('banking.dashboard') }}" class="nav-link text-white">
                        Ir al dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="nav-link text-white">
                        🔒 Iniciar sesión
                    </a>
                @endauth

                <div class="d-flex gap-3 fs-5">
                    <i class="bi bi-globe"></i>
                    <i class="bi bi-question-circle"></i>
                    <i class="bi bi-geo-alt"></i>
                    <i class="bi bi-search"></i>
                </div>

            </div>
        </div>
    </div>
</nav>