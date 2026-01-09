@props(['label', 'amount'])

<div class="card bg-primary-subtle text-white mb-3">
    <div class="card-body d-flex justify-content-between text-black small">
        <span>{{ $label }}</span>
        <span class="text-success">{{ $amount }}</span>
    </div>
</div>