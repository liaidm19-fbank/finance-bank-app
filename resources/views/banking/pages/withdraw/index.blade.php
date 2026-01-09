<x-layouts.app.banking :title="'Seleccionar Banco'">

<section class="d-flex flex-column gap-4">

    <div>
        <h4 class="text-warning fw-semibold">
            ¿Dónde deseas retirar tu dinero?
        </h4>
        <p class="text-white small mb-0">
            Selecciona un banco aliado para continuar
        </p>
    </div>

    <div class="row g-3 row-cols-1 row-cols-sm-2 row-cols-lg-4">

        @foreach ($banks as $bank)
            <div class="col">
                <a
                    href="{{ route('banking.withdraw.amount', $bank['id']) }}"
                    class="d-block bg-dark text-white rounded-4 p-4 text-decoration-none h-100 hover-shadow"
                >
                    {{-- Icon --}}
                    <div
                        class="rounded-3 d-flex align-items-center justify-content-center fw-bold text-black mb-3"
                        style="width:48px;height:48px;"
                    >

                    <img
                        src="{{ asset('images/' . $bank['logo']) }}"
                        alt="{{ $bank['name'] }} logo"
                        class="img-fluid rounded-2"
                        style="max-width:32px; max-height:32px;"
                    >

                        {{-- strtoupper(substr($bank['name'], 0, 1)) --}}
                    </div>

                    <h6 class="fw-semibold mb-1">
                        {{ $bank['name'] }}
                    </h6>

                    <p class="small text-secondary mb-2">
                        {{ $bank['description'] }}
                    </p>

                    @if ($bank['fee'] > 0)
                        <span class="small text-warning">
                            Comisión: $ {{ number_format($bank['fee'], 0, ',', '.') }}
                        </span>
                    @endif
                </a>
            </div>
        @endforeach

    </div>

</section>

</x-layouts.app.banking>