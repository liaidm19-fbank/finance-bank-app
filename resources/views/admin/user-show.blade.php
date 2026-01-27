@extends('layouts.app.banking')

@section('content')

<h2 class="text-white mb-4">Usuario: {{ $user->name }}</h2>

{{-- MENSAJES DE CONFIRMACIÓN --}}
@if(session('success'))
    <div class="alert alert-success shadow-sm mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger shadow-sm mb-4">
        {{ session('error') }}
    </div>
@endif

<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);
</script>

{{-- TRANSACCIONES DEL USUARIO --}}
<div class="card mt-4">
    <div class="card-header fw-semibold d-flex justify-content-between align-items-center">
        <span>Historial de Transacciones</span>
        <span class="text-muted small">
            Total: {{ $user->transactions->count() }}
        </span>
    </div>

    <div class="card-body p-0">

        @if($user->transactions->isEmpty())
            <div class="p-3 text-muted text-center small">
                Este usuario no tiene transacciones registradas.
            </div>
        @else
            <table class="table table-sm table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th class="text-end">Monto</th>
                        <th class="text-center">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->transactions->sortByDesc('created_at') as $tx)
                        <tr>
                            <td class="small text-muted">
                                {{ $tx->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                {{ $tx->description }}
                            </td>
                            <td class="text-end fw-semibold 
                                {{ $tx->amount < 0 ? 'text-danger' : 'text-success' }}">
                                {{ $tx->amount < 0 ? '-' : '+' }}
                                $ {{ number_format(abs($tx->amount), 2, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <span class="badge 
                                    {{ $tx->type === 'withdraw' ? 'bg-danger' : 'bg-success' }}">
                                    {{ ucfirst($tx->type) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>

{{-- AGREGAR TRANSACCIÓN --}}
<div class="card mt-3">
    <div class="card-header fw-semibold">
        Agregar Transacción Manual
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.transactions', $user) }}">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <select name="type" class="form-select" required>
                        <option value="">Tipo</option>
                        <option value="deposit">Depósito</option>
                        <option value="withdraw">Retiro</option>
                        <option value="transfer">Transferencia</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <input type="number"
                        step="0.01"
                        name="amount"
                        class="form-control"
                        placeholder="Monto"
                        required>
                </div>

                <div class="col-md-4">
                    <input type="text"
                        name="description"
                        class="form-control"
                        placeholder="Descripción"
                        required>
                </div>
            </div>

            <button class="btn btn-secondary">
                Agregar transacción
            </button>
        </form>
    </div>
</div>


{{-- BALANCE --}}
<div class="card mb-4">
    <div class="card-header fw-semibold">Actualizar Balance</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.balance', $user) }}">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <input type="number" step="0.01" name="balance"
                           class="form-control"
                           value="{{ $user->balance }}">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- CAMBIAR CONTRASEÑA --}}
<div class="card mb-4">
    <div class="card-header fw-semibold">Cambiar Contraseña</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.password', $user) }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="password" name="password" class="form-control" placeholder="Nueva contraseña">
                </div>
                <div class="col-md-4">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-warning">Cambiar</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- CREAR MENSAJE --}}
<div class="card">
    <div class="card-header fw-semibold">Mensaje de Alerta para el Usuario</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.message', $user) }}">
            @csrf

            <div class="row g-3 mb-3">
                <input type="hidden" name="type" value="alert">

                <div class="col-md-5">
                    <input type="text"
                        name="title"
                        class="form-control"
                        placeholder="Título (opcional)"
                        value="{{ old('title', $alert->title ?? 'Aviso importante') }}">
                </div>

                <div class="col-md-4">
                    <input type="number"
                        step="0.01"
                        name="amount"
                        class="form-control"
                        placeholder="Monto"
                        value="{{ old('amount', $alert->amount ?? '') }}">
                </div>

            </div>

            <div class="mb-3">
                <textarea name="message" rows="4" class="form-control" placeholder="Mensaje que verá el usuario...">{{ old('message', $alert->message ?? '') }}</textarea>
            </div>

            <button class="btn btn-primary">Crear mensaje</button>
        </form>
    </div>
</div>

@endsection