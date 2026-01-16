{{--<x-layouts.app :title="'Confirmar retiro'"> --}}

@extends('layouts.app.banking')

@section('title', 'Confirmar Retiro')

@section('content')

@php
$withdrawBanks = [
    ['id' => 'chase', 'name' => 'Chase', 'fee' => 350],
    ['id' => 'wells-fargo', 'name' => 'Wells Fargo', 'fee' => 250],
    ['id' => 'bank-of-america', 'name' => 'Bank of America', 'fee' => 350],
    ['id' => 'td-bank', 'name' => 'TD Bank', 'fee' => 250],
];

$bank = collect($withdrawBanks)->firstWhere('id', $bankId);
@endphp


@if(!$bank)
    <p class="text-danger">Banco no encontrado</p>
@else
@php
$total = $amount + $bank['fee'];
@endphp

<section class="col-md-6 col-lg-4 mx-auto d-flex flex-column gap-4">
    <h1 class="text-warning pt-4 text-center fs-4 fw-semibold">Confirmar retiro</h1>

    <div class="card bg-secondary text-white">
        <div class="card-body d-flex flex-column gap-2 small">
            <div class="d-flex justify-content-between">
                <span>Banco</span><span>{{ $bank['name'] }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Monto</span><span>$ {{ number_format($amount, 0, ',', '.') }}</span>
            </div>
            {{--<div class="d-flex justify-content-between">
                <span>CDT</span><span>$ {{ number_format($bank['fee'], 0, ',', '.') }}</span>
            </div> --}}
            <div class="d-flex justify-content-between">
                <span>Comisión</span><span>$ 350</span>
            </div>
            
            <hr>

            <div class="d-flex justify-content-between fw-semibold">
                <span>Total a debitar</span>
                <span>$ 2.754.817</span>
                {{--<span>$ {{ number_format($total, 0, ',', '.') }}</span> --}}
            </div>
        </div>
    </div>

   {{-- <a href="{{ route('banking.withdraw.success', ['bank' => $bankId, 'amount' => $amount]) }}"
       class="btn btn-warning fw-semibold">
        Confirmar retiro
    </a> --}}

    <a href="{{ route('banking.withdraw.commission-alert', [
            'bank' => $bankId,
            'amount' => $amount
        ]) }}"
    class="btn btn-warning fw-semibold">
        Confirmar retiro
    </a>


    <a href="{{ route('banking.dashboard') }}" class="btn btn-outline-secondary">
        Cancelar
    </a>
</section>
@endif

@endsection

{{-- </x-layouts.app>  --}}