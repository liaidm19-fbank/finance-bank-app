@extends('web-page.layouts.main')

@section('title', 'Banca Negocios')

@section('content')

{{-- HERO --}}
<section class="text-white position-relative"
         style="background: linear-gradient(90deg,#1a4d7a,#236b9e,#1a4d7a);">

    <div class="container py-5 py-lg-6">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <p class="text-warning text-uppercase small fw-semibold">
                    Cuenta corriente esencial para negocios
                </p>

                <h1 class="display-5 fw-light mb-3">
                    Hágalo oficial — Abra su cuenta de negocios hoy
                </h1>

                <p class="lead opacity-90">
                    Abra una Cuenta Corriente Esencial para Negocios en línea.
                    No se requiere visita a sucursal. Sencilla, conveniente y hecha para su negocio.
                </p>

                <a href="#" class="btn btn-success btn-lg px-4 py-3">
                    Comenzar →
                </a>
            </div>

            <div class="col-lg-6">
                <div class="rounded shadow overflow-hidden" style="height:400px">
                    <img src="{{ asset('professional-businesswoman-smiling-confidently-in-.jpg') }}"
                         class="w-100 h-80 object-fit-cover"
                         alt="Profesional de negocios">
                </div>
            </div>

        </div>
    </div>

    <div class="position-absolute bottom-0 start-0 end-0"
         style="height:4px;background:linear-gradient(90deg,#d4af37,#f1c40f,#d4af37)">
    </div>
</section>

{{-- SERVICES --}}
<section class="py-5 bg-light">
    <div class="container">

        <h2 class="display-6 fw-light text-primary mb-2">
            Banca diseñada para negocios
        </h2>

        <p class="text-muted mb-5">
            Explore productos y servicios diseñados para ayudar a su negocio a alcanzar sus metas.
        </p>

        <div class="row g-4">

            @php
                $services = [
                    ['icon'=>'check-circle','title'=>'Cuentas Corrientes para Negocios'],
                    ['icon'=>'currency-dollar','title'=>'Gestión de Efectivo'],
                    ['icon'=>'graph-up','title'=>'Financiamiento para Negocios'],
                    ['icon'=>'credit-card','title'=>'Tarjetas de Crédito para Negocios'],
                    ['icon'=>'phone','title'=>'Banca Digital'],
                    ['icon'=>'bar-chart','title'=>'Servicios para Comerciantes'],
                    ['icon'=>'building','title'=>'Préstamos SBA'],
                    ['icon'=>'piggy-bank','title'=>'Ahorros para Negocios'],
                ];
            @endphp

            @foreach($services as $service)
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <i class="bi bi-{{ $service['icon'] }} text-success fs-2 mb-3"></i>
                            <h6 class="fw-medium">{{ $service['title'] }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5 bg-white">
    <div class="container text-center">

        <h2 class="display-6 fw-light text-primary mb-3">
            ¿Listo para hacer crecer su negocio?
        </h2>

        <p class="text-muted mb-4">
            Nuestro equipo de especialistas en negocios está listo para ayudarle.
        </p>

        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
            <a href="#" class="btn btn-primary btn-lg px-4 py-3">
                Abrir una Cuenta
            </a>

            <a href="#" class="btn btn-outline-primary btn-lg px-4 py-3">
                Contactar un Especialista
            </a>
        </div>

    </div>
</section>

@endsection