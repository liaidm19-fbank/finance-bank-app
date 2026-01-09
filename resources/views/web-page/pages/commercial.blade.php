@extends('web-page.layouts.main')

@section('title', 'Banca Comercial')

@section('content')

{{-- HERO --}}
<section class="text-white position-relative"
         style="background: linear-gradient(to right, #1a4d7a, #236b9e, #1a4d7a);">
    <div class="container py-5 py-lg-6">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <p class="text-warning text-uppercase small fw-semibold">
                    Banca Comercial
                </p>

                <h1 class="display-5 fw-light mb-3">
                    Compromiso con los Clientes
                </h1>

                <p class="lead opacity-90">
                    Apoyamos a nuestros clientes con asesoramiento proactivo y soluciones financieras estratégicas
                    para crecer juntos.
                </p>

                <a href="#" class="btn btn-success btn-lg mt-3">
                    Conocer más →
                </a>
            </div>

            <div class="col-lg-6">
                <div class="rounded shadow overflow-hidden" style="height: 400px;">
                    <img
                        src="/modern-glass-office-building-architecture-business.jpg"
                        alt="Edificio comercial moderno"
                        class="img-fluid w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>

    <div style="height:4px;
                background: linear-gradient(to right, #d4af37, #f5c542, #d4af37);">
    </div>
</section>

{{-- SERVICIOS COMERCIALES --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="col-lg-9">
            <h2 class="display-6 fw-light text-primary mb-3">
                Entendemos las necesidades cambiantes de nuestros clientes comerciales
            </h2>

            <p class="lead text-muted mb-5">
                Productos y servicios diseñados para empresas como la suya.
            </p>

            <div class="row g-4">
                @foreach ([
                    'Depósitos',
                    'Soluciones de Financiamiento',
                    'Gestión de Tesorería',
                    'Servicios para Comerciantes',
                    'Tarjeta Comercial',
                    'Banca de Inversión',
                    'Préstamos Inmobiliarios',
                    'Trust Wilmington'
                ] as $service)
                    <div class="col-md-6 col-lg-3">
                        @include('web-page.components.service-card', [
                            'title' => $service
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- INDUSTRIAS --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="col-lg-9">
            <h2 class="display-6 fw-light text-primary mb-3">
                Soluciones por Industria
            </h2>

            <p class="lead text-muted mb-5">
                Experiencia especializada en los sectores que mejor conocemos.
            </p>

            <div class="row g-4">
                @foreach ([
                    ['Bienes Raíces Comerciales', 'Financiamiento flexible para propiedades comerciales'],
                    ['Manufactura', 'Soluciones financieras para empresas manufactureras'],
                    ['Tecnología', 'Apoyo financiero para empresas tecnológicas en crecimiento'],
                    ['Salud', 'Servicios especializados para el sector salud'],
                    ['Educación', 'Soluciones bancarias para instituciones educativas'],
                    ['Gobierno', 'Servicios financieros para entidades gubernamentales'],
                ] as [$title, $description])
                    <div class="col-md-4">
                        @include('web-page.components.industry-card', [
                            'title' => $title,
                            'description' => $description
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5 text-white"
         style="background: linear-gradient(to bottom right, #1a4d7a, #15395f);">
    <div class="container text-center">
        <div class="col-lg-8 mx-auto">
            <h2 class="display-6 fw-light mb-3">
                ¿Listo para llevar su empresa al siguiente nivel?
            </h2>

            <p class="lead opacity-90 mb-4">
                Nuestro equipo de banca comercial está listo para ayudarle.
            </p>

            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="#" class="btn btn-light btn-lg text-primary">
                    Contactar un Banquero
                </a>

                <a href="#" class="btn btn-outline-light btn-lg">
                    Ver Nuestros Servicios
                </a>
            </div>
        </div>
    </div>
</section>

@endsection