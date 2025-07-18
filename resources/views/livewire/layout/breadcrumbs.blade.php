@php
try {
    $paramTipo = Route::current()->parameter('tipo');
    $breadcrumbs = Breadcrumbs::generate(Route::currentRouteName(), $paramTipo);
} catch (\Exception $e) {
    // Handle the case where breadcrumbs cannot be generated
    $breadcrumbs = collect();
}
@endphp
<div class="app-title">
@if (count($breadcrumbs))
    <div>
        <h1>
            <i class="{{ $breadcrumbs->last()->icon }}"></i>
            {{ $breadcrumbs->last()->title }}
        </h1>
        <p>{{ $breadcrumbs->last()->text }}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-house-door fs-6"></i>
            </a>
        </li>
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item">
                <a href="{{ $breadcrumb->url }}">
                    {{ $breadcrumb->title }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <div>
        <h1>
            <i class="bi-ticket-perforated"></i>
            Tickets
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-house-door fs-6"></i>
            </a>
        </li>
    </ul>
@endif
</div>


