@php
    if(auth()->user()->isAdmin()) {
        // Menú ADMIN
        $menu = [
            ['label' => 'Dashboard', 'route' => 'admin.dashboard'],
            ['label' => 'Inicio', 'route' => 'banking.dashboard'], // Banking Inicio
            ['label' => 'Cuentas', 'route' => 'banking.account'],   //Banking Cuentas
            ['label' => 'Transacciones', 'route' => 'banking.transactions'],    //Banking Transacciones
        ];
    } else {
        // Menú USUARIO NORMAL
        $menu = [
            ['label' => 'Inicio', 'route' => 'banking.dashboard'],
            ['label' => 'Cuentas', 'route' => 'banking.account'],
            ['label' => 'Transacciones', 'route' => 'banking.transactions'],
            //['label' => 'Documentos', 'route' => 'banking.documents'],
            //['label' => 'Ajustes', 'route' => 'banking.settings'],
        ];
    }
@endphp

<aside class="border-end border-secondary" style="width:260px; background:#facc15;">
    <div class="p-4 fw-bold fs-5">
        Finance Bank
        @if(auth()->user()->isAdmin())
            <div class="small text-danger">ADMIN</div>
        @endif
    </div>

    <nav class="px-3">
        @foreach($menu as $item)
            <a href="{{ route($item['route']) }}"
               class="d-block rounded px-3 py-2 mb-1 text-decoration-none text-black hover-bg">
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>
</aside>