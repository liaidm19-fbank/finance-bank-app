{{--<x-layouts.app :title="'Mis cuentas'"> --}}

@extends('layouts.app.banking')

@section('title', 'Mis cuentas')

@section('content')

<section class="d-flex flex-column gap-4">
    <h1 class="text-white fs-4 fw-semibold">Mis cuentas</h1>

    {{--@include('banking.components.account-card', [
        'name' => 'Cuenta de Ahorros',
        'balance' => '$ 2,755,167.00 USD'
    ]) --}}

    @php
        $user = auth()->user();
    @endphp

    @include('banking.components.account-card', [
        'name' => 'Cuenta de Ahorros',
        'balance' => '$ ' . number_format($user->balance, 2, ',', '.') . ' USD'
    ])
</section>

@endsection
{{-- </x-layouts.app> --}}
