{{--<x-layouts.app :title="'Aviso de comisión'">--}}

@extends('layouts.app.banking')

@section('title', 'Aviso de comisión')

@section('content')

@php
    $commission = 1575;
@endphp

<section class="col-md-6 col-lg-5 mx-auto d-flex flex-column gap-4">

    <div class="alert alert-warning shadow-sm rounded-4">
        <div class="d-flex align-items-center mb-2">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
            <h5 class="mb-0 fw-semibold">Aviso importante</h5>
        </div>

        <p class="mb-3">
            Para continuar con el <strong>retiro de fondos</strong>, es necesario completar el valor pendiente asociado al proceso de validación financiera.
            Actualmente, su <strong>CDT ya cuenta con un abono de 3,850 USD </strong><strong>queda un saldo pendiente de 1,575 USD</strong> correspondiente a cargos administrativos y de habilitación.
            Una vez se realice el pago del valor restante, el proceso de retiro podrá continuar con normalidad.
        </p>

        <div class="bg-light rounded p-3 mb-3 small">
            <div class="d-flex justify-content-between">
                <span>Yeni Garcia Ramos</span>
                <span class="fw-semibold">$ {{ number_format($commission, 0, ',', '.') }}</span>
            </div>
        </div>

        <p class="text-muted small mb-0">
            Una vez confirmes el pago de la comisión, el retiro se procesará de forma inmediata.
        </p>
    </div>

    {{-- Acciones --}}
    <a href="{{ route('banking.withdraw.success', [
            'bank' => $bankId,
            'amount' => $amount
        ]) }}"
    class="btn btn-warning fw-semibold">
        Aceptar y pagar comisión
    </a>


    <a href="{{ route('banking.dashboard') }}"
       class="btn btn-outline-secondary">
        Cancelar
    </a>

</section>
@endsection
{{--</x-layouts.app>--}}