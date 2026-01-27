@extends('layouts.app.banking')

@section('title', 'Transacciones')

@section('content')

<section class="d-flex flex-column gap-4">
    <h1 class="text-white fs-4 fw-semibold">
        Historial de transacciones
    </h1>

    @forelse(auth()->user()->transactions()->latest()->get() as $tx)
        @include('banking.components.transaction-row', [
            'label' => $tx->description . ' - ' . $tx->created_at->format('d/m/Y'),
            'amount' => ($tx->amount < 0 ? '-' : '+') .
                        '$' . number_format(abs($tx->amount), 2, ',', '.')
        ])
    @empty
        <p class="text-muted small">
            No tienes transacciones aún.
        </p>
    @endforelse
</section>

@endsection