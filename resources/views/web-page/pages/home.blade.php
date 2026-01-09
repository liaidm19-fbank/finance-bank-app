{{--<x-web-page.main title="Inicio">--}}

    {{--@include('web-page.components.hero-section')--}}
    {{--<x-web-page.components.hero-section>--}}
    {{-- aquí luego puedes agregar services, features, etc --}}

{{--</x-web-page.main>--}}

@extends('web-page.layouts.main')

@section('title', 'Inicio')

@section('content')
    @include('web-page.components.hero-section')
    @include('web-page.components.services-grid')
@endsection

