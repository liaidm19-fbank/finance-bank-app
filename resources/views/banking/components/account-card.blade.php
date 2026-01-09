@props(['name', 'balance'])

<div class="card bg-secondary border-secondary text-white">
    <div class="card-body">
        <h6 class="fw-bold">{{ $name }}</h6>
        <h4 class="fw-bold">{{ $balance }}</h4>
    </div>
</div>