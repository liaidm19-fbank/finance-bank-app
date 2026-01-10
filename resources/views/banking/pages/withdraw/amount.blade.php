{{--<x-layouts.app title="Retiro">  --}}

@extends('components.layouts.app.banking')

@section('title', 'Retiro')

@section('content')

<section class="max-w-md d-flex flex-column gap-4">

    <h4 class="text-warning fw-semibold">
        Retiro en {{ $bank['name'] }}
    </h4>

    <p class="text-white small">
        {{ $bank['description'] }}
    </p>

    <div class="bg-dark rounded p-3">
        <label class="text-white form-label small">
            Monto a retirar
        </label>

        <input
            type="number"
            id="amount"
            name="amount"
            class="form-control bg-black text-white border-secondary"
            placeholder="$ 0"
        >

        <small id="amountError" class="text-danger d-none">
            El valor a retirar debe de ser de $2,755,167 USD
        </small>
    </div>

    @if ($bank['fee'] > 0)
        <p class="text-warning small">
            Costo: $ {{ number_format($bank['fee'], 0, ',', '.') }}
        </p>
    @endif

    <a
        id="confirmBtn"
        href="#"
        class="btn btn-warning fw-semibold py-2 disabled"
        aria-disabled="true"
    >
        Confirmar retiro
    </a>

</section>


<script>
document.addEventListener("DOMContentLoaded", function () {

    const REQUIRED_AMOUNT = 2755167;

    const amountInput = document.getElementById("amount");
    const errorText = document.getElementById("amountError");
    const confirmBtn = document.getElementById("confirmBtn");

    amountInput.addEventListener("input", function () {
        const value = parseInt(amountInput.value, 10);

        if (value !== REQUIRED_AMOUNT) {
            // ❌ inválido
            amountInput.classList.add("is-invalid");
            errorText.classList.remove("d-none");

            confirmBtn.classList.add("disabled");
            confirmBtn.setAttribute("aria-disabled", "true");
            confirmBtn.href = "#";
        } else {
            // ✅ válido
            amountInput.classList.remove("is-invalid");
            errorText.classList.add("d-none");

            confirmBtn.classList.remove("disabled");
            confirmBtn.removeAttribute("aria-disabled");

            confirmBtn.href = "{{ route('banking.withdraw.confirm', ['bank' => $bank['id']]) }}?amount=" + REQUIRED_AMOUNT;
        }
    });

});
</script>

@endsection


{{--</x-layouts.app> --}}