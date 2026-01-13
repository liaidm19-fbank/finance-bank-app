{{--  <x-layouts.app :title="'Transacciones'"> --}}

@extends('layouts.app.banking')

@section('title', 'Transacciones')

@section('content')

<section class="d-flex flex-column gap-4">
    <h1 class="text-white fs-4 fw-semibold">Historial de transacciones</h1>

    @include('banking.components.transaction-row', [
        'label' => 'Transferencia recibida - Bancolombia',
        'amount' => '$2,754,233.00'
    ])
</section>

@endsection

{{-- </x-layouts.app>--}}