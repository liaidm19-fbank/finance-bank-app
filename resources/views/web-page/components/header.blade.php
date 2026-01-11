{{-- Barra superior FDIC --}}
<div class="bg-success text-white py-2 px-3 text-center small" style="background-color:#1a5f4a !important;">
    <span class="d-inline-flex align-items-center gap-2">
        <strong>FDIC</strong>
        <span>FDIC-Insured - Backed by the full faith and credit of the U.S. Government</span>
    </span>
</div>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark"
     style="background: linear-gradient(to right, #1a4d7a, #1e5a8c, #1a4d7a);">

    <div class="container">

        {{-- Left menu --}}
        <div class="navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-4">
                <li class="nav-item">
                    <a class="nav-link" href="/">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/business">Negocios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/commercial">Comercial</a>
                </li>
            </ul>
        </div>

        {{-- Logo centrado --}}
        <a class="navbar-brand position-absolute start-50 translate-middle-x" href="/">
            <img src="{{ asset('financebank-logo.png') }}"
                 alt="FinanceBank"
                 
                 width="54"
                 >
        </a>

        {{-- Right actions (desktop) --}}
        <div class="d-none d-lg-flex align-items-center gap-2 ms-auto">

           {{-- <a href="{{ route('login') }}" class="btn btn-link text-white text-decoration-none d-flex align-items-center gap-2">
                <span class="bg-white text-primary px-2 py-1 rounded small">🔒</span>
                Iniciar Sesión
            </a> --}}

            @auth
                <a href="{{ route('banking.dashboard') }}" class="btn btn-link text-white text-decoration-none d-flex align-items-center gap-2">
                    Ir al dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-link text-white text-decoration-none d-flex align-items-center gap-2">
                    <span class="bg-white text-primary px-2 py-1 rounded small">🔒</span>
                    Iniciar Sesión
                </a>
            @endauth


            <button class="btn btn-link text-white" title="Idioma">
                <i class="bi bi-globe"></i>
            </button>

            <button class="btn btn-link text-white" title="Ayuda">
                <i class="bi bi-question-circle"></i>
            </button>

            <button class="btn btn-link text-white" title="Sucursales">
                <i class="bi bi-geo-alt"></i>
            </button>

            <button class="btn btn-link text-white" title="Buscar">
                <i class="bi bi-search"></i>
            </button>

            <button class="btn btn-link text-white" title="Menú">
                <i class="bi bi-list"></i>
            </button>
        </div>

        {{-- Mobile toggle --}}
        <button class="navbar-toggler text-white border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target=".navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>