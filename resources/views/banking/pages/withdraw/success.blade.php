{{--<x-layouts.app :title="'Retiro Exitoso'">--}}

@extends('layouts.app.banking')

@section('title', 'Retiro Exitoso')

@section('content')

@php
$reference = 'RET-' . strtoupper(Str::random(6));
@endphp

<section class="bg-white border-2 rounded-xl col-md-6 col-lg-4 mx-auto p-4 text-center d-flex flex-column gap-4">

    <div class="rounded-circle bg-success text-dark fw-bold fs-3 mx-auto"
         style="width:64px;height:64px;line-height:64px;">
        ✓
    </div>

    <h1 class="fs-4 fw-semibold">¡Retiro exitoso!</h1>

    <p class="text-secondary small">
        Tu solicitud de retiro fue procesada correctamente.
    </p>

    <div class="card bg-secondary text-white text-start">
        <div class="card-body small d-flex flex-column gap-2">
            <div class="d-flex justify-content-between">
                <span>Monto retirado</span>
                <span>$ 2.753.883</span>
                {{-- <span>$ {{ number_format($amount, 0, ',', '.') }}</span> --}}
            </div>
            <div class="d-flex justify-content-between">
                <span>Referencia</span>
                <span class="fw-semibold">{{ $reference }}</span>
            </div>
        </div>
    </div>

    <p class="text-muted small">
        Guarda este código de referencia para cualquier consulta.
    </p>

    <a href="{{ route('banking.dashboard') }}" class="btn btn-warning">
        Volver al inicio
    </a>

    <a href="{{ route('banking.transactions') }}" class="btn btn-outline-secondary">
        Ver movimientos
    </a>

</section>
@endsection

{{--</x-layouts.app>--}}