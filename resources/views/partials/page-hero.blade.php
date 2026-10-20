{{-- Bandeau des pages intérieures : $title, $lead, $image, $eyebrow, $crumb, $parent --}}
<section class="page-hero">
    @isset($image)
        <div class="page-hero-bg"><x-photo :src="$image" alt="" :eager="true" /></div>
    @endisset
    <div class="container">
        <nav aria-label="Fil d’Ariane">
            <ol class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                @isset($parent)<li class="breadcrumb-item"><a href="{{ $parent['url'] }}">{{ $parent['label'] }}</a></li>@endisset
                <li class="breadcrumb-item active" aria-current="page">{{ $crumb ?? $title }}</li>
            </ol>
        </nav>
        @isset($eyebrow)<p class="eyebrow on-dark">{{ $eyebrow }}</p>@endisset
        <h1 class="mb-3">{{ $title }}</h1>
        @isset($lead)<p class="lead mb-0">{{ $lead }}</p>@endisset
    </div>
    <div class="wave-bottom">@include('partials.wave')</div>
</section>
