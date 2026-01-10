{{--  <x-layouts.app title="Dashboard"> --}}

@extends('components.layouts.app.banking')

@section('title', 'Dashboard')

@section('content')

<section class="d-flex flex-column gap-5">

    {{-- Acciones --}}
    <div>
        <h5 class="text-white fw-semibold mb-3">
            Transacciones más usadas
        </h5>

        @php
            $actions = [
                ['title' => 'Transferir'],
                ['title' => 'Editar topes'],
                ['title' => 'Pagar facturas'],
                ['title' => 'Bolsillos'],
                ['title' => 'Extractos'],
                [
                    'title' => 'Retirar dinero',
                    'href' => route('banking.withdraw')
                ],
            ];
        @endphp

        <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-5">
            @foreach ($actions as $action)
                <div class="col">
                    @include('banking.components.action-card', $action)
                </div>
            @endforeach
        </div>
    </div>

    {{-- Productos --}}
    <div>
        <h5 class="text-white fw-semibold mb-3">
            Tus productos
        </h5>

        @include('banking.components.account-card', [
            'name' => 'Cuenta de Ahorros',
            'balance' => '$ 2,755,167.00 USD' 
        ])
    </div>

</section>

@endsection

{{--</x-layouts.app> --}}