@extends('layouts.app.banking')

@section('title', 'Aviso de comisión')

@section('content')

@if($message)

@php
    $commission = $message->amount;
@endphp

<section class="col-md-6 col-lg-5 mx-auto d-flex flex-column gap-4">

    <div class="alert alert-warning shadow-sm rounded-4">
        <div class="d-flex align-items-center mb-2">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
            <h5 class="mb-0 fw-semibold">{{ $message->title }}</h5>
        </div>

        <p class="mb-3">
            {!! nl2br(e($message->message)) !!}
        </p>

        <div class="bg-light rounded p-3 mb-3 small">
            <div class="d-flex justify-content-between">
                <span>{{ auth()->user()->name }}</span>
                <span class="fw-semibold">
                    $ {{ number_format($commission, 0, ',', '.') }}
                </span>
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

@else

{{-- Si no hay mensaje activo --}}
<section class="col-md-6 col-lg-5 mx-auto">
    <div class="alert alert-success shadow-sm rounded-4 text-center">
        <h5 class="fw-semibold mb-2">No hay comisiones pendientes</h5>
        <p class="mb-0">Puedes continuar con tu operación normalmente.</p>
    </div>

    <a href="{{ route('banking.dashboard') }}"
       class="btn btn-primary w-100 mt-3">
        Volver al dashboard
    </a>
</section>

@endif

@endsection