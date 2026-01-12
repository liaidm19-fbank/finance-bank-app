<header class="h-14 d-flex align-items-center justify-content-between border-bottom px-4 bg-white">

    {{-- Saludo --}}
    <span class="fw-medium">
        Hola, {{ auth()->user()->name }} 👋 
    </span>

    {{-- Fecha y hora --}}
    <span class="text-muted small" id="topbar-date"></span>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" data-test="logout-button">
            {{ __('Salir') }}
        </flux:menu.item>
    </form>

</header>

<script>
    function updateTopbarDate() {
        const el = document.getElementById('topbar-date');
        if (!el) return;

        el.textContent = new Date().toLocaleString('es-CO', {
            dateStyle: 'medium',
            timeStyle: 'short'
        });
    }

    // Inicial
    updateTopbarDate();

    // Actualiza cada minuto
    setInterval(updateTopbarDate, 60_000);
</script>