<x-layouts.app.banking :title="'Mis cuentas'">

    <section class="d-flex flex-column gap-4">
        <h1 class="text-white fs-4 fw-semibold">Mis cuentas</h1>

        @include('banking.components.account-card', [
            'name' => 'Cuenta de Ahorros',
            'balance' => '$ 2,755,167.00 USD'
        ])

        {{-- @include('banking.components.account-card', [
            'name' => 'Cuenta Corriente',
            'balance' => '$ 12,300 USD'
        ]) --}}

        {{-- @include('banking.components.account-card', [
            'name' => 'Daños y perjuicios',
            'balance' => '$ 10,800 USD'
        ]) --}}
    </section>

</x-layouts.app.banking>
