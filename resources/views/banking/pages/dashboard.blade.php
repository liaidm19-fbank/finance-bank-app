<x-layouts.app.banking title="Dashboard">

    <section class="d-flex flex-column gap-5">

        {{-- Acciones --}}
        <div>
            <h5 class="text-white fw-semibold mb-3">
                Transacciones más usadas
            </h5>

            <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-5">
                <div class="col">
                    @include('banking.components.action-card', ['title' => 'Transferir'])
                </div>

                <div class="col">
                    @include('banking.components.action-card', ['title' => 'Editar topes'])
                </div>

                <div class="col">
                    @include('banking.components.action-card', ['title' => 'Pagar facturas'])
                </div>

                <div class="col">
                    @include('banking.components.action-card', ['title' => 'Bolsillos'])
                </div>

                <div class="col">
                    @include('banking.components.action-card', ['title' => 'Extractos'])
                </div>

                <div class="col">
                    @include('banking.components.action-card', [
                        'title' => 'Retirar dinero',
                        'href' => route('banking.withdraw')
                    ])
                </div>
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

</x-layouts.app.banking>