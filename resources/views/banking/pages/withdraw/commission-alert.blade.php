{{--<x-layouts.app :title="'Aviso de comisión'">--}}

@extends('layouts.app.banking')

@section('title', 'Aviso de comisión')

@section('content')

@php
    $commission = 5425;
@endphp

<section class="col-md-6 col-lg-5 mx-auto d-flex flex-column gap-4">

    <div class="alert alert-warning shadow-sm rounded-4">
        <div class="d-flex align-items-center mb-2">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
            <h5 class="mb-0 fw-semibold">Aviso importante</h5>
        </div>

        <p class="mb-3">
            Para continuar con el <strong>retiro de fondos</strong>, es obligatorio
            <strong>realizar el pago de la apertura del CDT</strong> ya que el dinero que se ha remitido supera los limites de ganancia ocasional, <strong> el costo del CDT para su cuenta está por 5,425 USD</strong>
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