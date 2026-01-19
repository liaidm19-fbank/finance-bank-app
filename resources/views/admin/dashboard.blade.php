@extends('layouts.app.banking')

@section('content')
<h1 class="text-white">Usuarios</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Models\User::all() as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
