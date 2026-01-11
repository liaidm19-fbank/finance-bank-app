<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'FinanceBank - Banking')</title>

    <link rel="icon" type="image/png" href="{{ asset('financebank-logo.png') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Livewire --}}
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-body-secondary">

    {{-- Topbar 
    @include('banking.components.topbar') --}}

    <div class="d-flex">

        {{-- Sidebar 
        @include('banking.components.sidebar')--}}

        {{-- Main content 
        <main class="flex-fill p-4 body">
            {{ $slot }}
        </main>--}}

        <main class="flex-fill p-4 body">
            @yield('content')
        </main>

    </div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Livewire --}}
    @livewireScripts
    @fluxScripts
    @stack('scripts')
</body>
</html>
