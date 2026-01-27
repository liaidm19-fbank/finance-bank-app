@extends('layouts.app.banking')

@section('title', 'Retiro')

@section('content')

@php
    $balance = auth()->user()->balance;
@endphp

<section class="max-w-md d-flex flex-column gap-4">

    <h4 class="text-warning fw-semibold">
        Retiro en {{ $bank['name'] }}
    </h4>

    <p class="text-white small">
        {{ $bank['description'] }}
    </p>

    {{-- SALDO DISPONIBLE --}}
    <div class="bg-secondary bg-opacity-25 rounded p-3 text-white small">
        <div class="d-flex justify-content-between">
            <span>Saldo disponible</span>
            <span class="fw-semibold">
                $ {{ number_format($balance, 0, ',', '.') }}
            </span>
        </div>
    </div>

    {{-- MONTO --}}
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
            Debes retirar exactamente 
            <strong>$ {{ number_format($balance, 0, ',', '.') }}</strong> 
            para continuar.
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

    const REQUIRED_AMOUNT = {{ (int) $balance }};
    const bankId = "{{ $bank['id'] }}";

    const amountInput = document.getElementById("amount");
    const errorText = document.getElementById("amountError");
    const confirmBtn = document.getElementById("confirmBtn");

    amountInput.addEventListener("input", function () {
        const value = parseFloat(amountInput.value);

        if (value !== REQUIRED_AMOUNT) {
            // ❌ monto incorrecto
            amountInput.classList.add("is-invalid");
            errorText.classList.remove("d-none");

            confirmBtn.classList.add("disabled");
            confirmBtn.setAttribute("aria-disabled", "true");
            confirmBtn.href = "#";
        } else {
            // ✅ monto correcto (saldo total exacto)
            amountInput.classList.remove("is-invalid");
            errorText.classList.add("d-none");

            confirmBtn.classList.remove("disabled");
            confirmBtn.removeAttribute("aria-disabled");

            confirmBtn.href =
                "{{ route('banking.withdraw.confirm', ['bank' => $bank['id']]) }}" +
                "?amount=" + REQUIRED_AMOUNT;
        }
    });

});
</script>

@endsection