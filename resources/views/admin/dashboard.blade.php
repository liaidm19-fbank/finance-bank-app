@extends('layouts.app.banking')

@section('content')

<h1 class="text-white mb-4">Panel de Administración</h1>

<table class="table table-dark table-striped align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Balance</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge bg-{{ $user->role === 'admin' ? 'success' : 'warning' }}">
                        {{ $user->role }}
                    </span>
                </td>
                <td class="fw-semibold text-success">
                    $ {{ number_format($user->balance, 2, ',', '.') }}
                </td>
                <td>
                    <a href="{{ route('admin.users.show', $user) }}"
                       class="btn btn-sm btn-primary">
                        Gestionar
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection