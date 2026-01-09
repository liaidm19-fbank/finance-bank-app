@props(['title', 'href' => '#'])

<a href="{{ $href }}"
   class="card bg-secondary text-white text-center text-decoration-none h-100">
    <div class="card-body d-flex align-items-center justify-content-center">
        <span class="fw-semibold">{{ $title }}</span>
    </div>
</a>