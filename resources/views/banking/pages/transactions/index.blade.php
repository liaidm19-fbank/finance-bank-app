<x-layouts.app.banking :title="'Transacciones'">

<section class="d-flex flex-column gap-4">
    <h1 class="text-white fs-4 fw-semibold">Historial de transacciones</h1>

    @include('banking.components.transaction-row', [
        'label' => 'Transferencia recibida - 08/01/26',
        'amount' => '$2,755,167.00'
    ])
</section>

</x-layouts.app.banking>