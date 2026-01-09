<footer class="text-white" style="background-color:#1a4d7a;">
    <div class="container py-5">

        {{-- TOP GRID --}}
        <div class="row g-4 mb-4">

            {{-- Productos --}}
            <div class="col-md-6 col-lg-3">
                <h6 class="fw-semibold mb-3">Productos</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Cuentas</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Tarjetas</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Préstamos</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none hover-gold">Inversiones</a></li>
                </ul>
            </div>

            {{-- Servicios --}}
            <div class="col-md-6 col-lg-3">
                <h6 class="fw-semibold mb-3">Servicios</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Banca en Línea</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Banca Móvil</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Asesoría</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none hover-gold">Seguros</a></li>
                </ul>
            </div>

            {{-- Acerca de --}}
            <div class="col-md-6 col-lg-3">
                <h6 class="fw-semibold mb-3">Acerca de</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Nuestra Historia</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Carreras</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Responsabilidad</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none hover-gold">Noticias</a></li>
                </ul>
            </div>

            {{-- Soporte --}}
            <div class="col-md-6 col-lg-3">
                <h6 class="fw-semibold mb-3">Soporte</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Centro de Ayuda</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Contacto</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-gold">Sucursales</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none hover-gold">Seguridad</a></li>
                </ul>
            </div>

        </div>

        {{-- DIVIDER --}}
        <hr class="border-secondary">

        {{-- BOTTOM }}
        <div class="row align-items-center gy-3 mt-4">

            {{-- Logo }}
            <div class="col-md-6 d-flex align-items-center gap-3">
                <img src="{{ asset('financebank-logo.png') }}"
                     alt="FinanceBank"
                     height="48"
                     class="img-fluid"
                     >
            </div>

            {{-- Legal }}
            <div class="col-md-6 text-md-end small text-secondary">
                <p class="mb-0">© 2025 FinanceBank. Todos los derechos reservados.</p>
                <p class="mb-0">Miembro FDIC. Equal Housing Lender. NMLS #381076.</p>
            </div>

        </div> --}}

        {{-- BOTTOM --}}
        <div class="row mt-5">

            {{-- Logo --}}
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <img src="{{ asset('financebank-logo.png') }}"
                    alt="FinanceBank"
                    width="100"
                    class="img-fluid">
            </div>

            {{-- Legal --}}
            <div class="col-md-12 text-center small text-secondary">
                <p class="mb-1">© 2026 FinanceBank. Todos los derechos reservados.</p>
                <p class="mb-0">Miembro FDIC. Equal Housing Lender. NMLS #381076.</p>
            </div>

        </div>


        {{-- LEGAL LINKS --}}
        <div class="d-flex flex-wrap justify-content-center gap-2 small text-secondary mt-4">
            <a href="#" class="text-decoration-none hover-gold">Privacidad</a>
            <span>•</span>
            <a href="#" class="text-decoration-none hover-gold">Términos de Uso</a>
            <span>•</span>
            <a href="#" class="text-decoration-none hover-gold">Seguridad</a>
            <span>•</span>
            <a href="#" class="text-decoration-none hover-gold">Accesibilidad</a>
        </div>

    </div>
</footer>