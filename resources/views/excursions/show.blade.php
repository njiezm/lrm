@extends('layouts.app')

@section('title', $excursion['name'].' — excursion îlet Oscar & Baignoire de Joséphine')
@section('description', $excursion['summary'].' Départ de la marina du François, Martinique.')
@section('og_image', 'images/'.$excursion['image'].'.webp')
@section('book_slug', $slug)

@push('head')
    <script type="application/ld+json">
        {!! json_encode(array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'TouristTrip',
            'name' => $excursion['name'].' — Le Roi Mongin',
            'description' => $excursion['intro'],
            'image' => asset('images/'.$excursion['image'].'.webp'),
            'touristType' => ['Familles', 'Groupes', 'Couples'],
            'provider' => ['@id' => url('/').'#business'],
            'itinerary' => [
                '@type' => 'ItemList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'item' => ['@type' => 'TouristAttraction', 'name' => 'Baignoire de Joséphine']],
                    ['@type' => 'ListItem', 'position' => 2, 'item' => ['@type' => 'TouristAttraction', 'name' => 'Îlet Oscar']],
                ],
            ],
            'offers' => $excursion['from_price'] ? [
                '@type' => 'Offer', 'price' => $excursion['from_price'], 'priceCurrency' => 'EUR',
                'url' => route('excursions.show', $slug),
            ] : null,
        ]), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
    @php $c = config('site.contact'); @endphp
    @include('partials.page-hero', [
        'title' => $excursion['name'],
        'eyebrow' => $excursion['kicker'],
        'lead' => $excursion['summary'],
        'image' => $excursion['image'],
        'parent' => ['url' => route('excursions.index'), 'label' => 'Excursions'],
    ])

    <section class="section pt-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <ul class="hero-chips mb-4" style="--x:0">
                        <li class="bg-foam text-deep border-0"><i class="bi bi-clock me-1" aria-hidden="true"></i>{{ $excursion['duration'] }}</li>
                        <li class="bg-foam text-deep border-0"><i class="bi bi-geo-alt me-1" aria-hidden="true"></i>Départ : {{ $c['meeting_short'] }}</li>
                    </ul>
                    <p class="fs-5 mb-4">{{ $excursion['intro'] }}</p>

                    <ul class="check-list mb-5 row row-cols-sm-2 g-0">
                        @foreach ($excursion['highlights'] as $h)<li class="col">{{ $h }}</li>@endforeach
                    </ul>

                    @if (! empty($excursion['formulas']))
                        <h2 class="h3 mb-3">Deux formules au choix</h2>
                        <div class="row g-3 mb-4">
                            @foreach ($excursion['formulas'] as $f)
                                <div class="col-sm-6">
                                    <div class="why-card">
                                        <p class="h2 text-ocean mb-1">{{ $f['price'] }}</p>
                                        <h3>{{ $f['name'] }}</h3>
                                        <p>{{ $f['text'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-muted">Rendez-vous à 9 h à la marina du François. Retour : {{ $excursion['return'] }}</p>
                    @endif

                    @if ($excursion['programme'] || ! empty($excursion['steps']))
                        <h2 class="h3 mb-4">Le programme de la journée</h2>
                        <ol class="timeline mb-5">
                            @foreach ($excursion['steps'] ?? config('site.day_programme') as $step)
                                <li>
                                    <span class="dot" aria-hidden="true"><i class="bi bi-water"></i></span>
                                    <span class="time">{{ $step['time'] }}</span>
                                    <h3>{{ $step['title'] }}</h3>
                                    @if ($step['text'])<p>{{ $step['text'] }}</p>@endif
                                    @if ($loop->index === 2 && ! empty($excursion['activity']))
                                        <p class="mt-2"><span class="badge text-bg-warning">Au programme</span> {{ $excursion['activity'] }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    @endif

                    @if ($excursion['programme'])
                        <h2 class="h3 mb-3">Au menu sur l’îlet Oscar</h2>
                        @if ($excursion['lunch_extra'])
                            <p class="fw-bold text-ocean mb-2"><i class="bi bi-star-fill text-sun me-1" aria-hidden="true"></i>{{ $excursion['lunch_extra'] }}</p>
                        @endif
                        <ul class="menu-chips mb-3">
                            @foreach (config('site.creole_menu') as $dish)<li>{{ $dish }}</li>@endforeach
                        </ul>
                        <p class="mb-2"><strong>Dessert :</strong> {{ config('site.creole_dessert') }}</p>
                        <p class="mb-2"><strong>Goûter (16 h) :</strong> chocolat créole et pain au beurre</p>
                        <p class="mb-4"><strong>Boissons :</strong> {{ config('site.drinks') }}</p>
                        <p class="note-todo mb-0"><strong>Options sur demande :</strong> {{ config('site.extras') }}</p>
                    @endif

                    @isset($excursion['note'])
                        <p class="note-todo mt-4 mb-0">{{ $excursion['note'] }}</p>
                    @endisset
                </div>

                <aside class="col-lg-5">
                    <div class="sticky-aside">
                        <div class="price-table mb-3">
                            <div class="head"><i class="bi bi-tag me-2" aria-hidden="true"></i>Tarifs</div>
                            @foreach ($excursion['prices'] as $p)
                                <div class="row-price"><span>{{ $p['label'] }}</span><span class="p">{{ $p['price'] }}</span></div>
                            @endforeach
                        </div>
                        <p class="small text-muted">{{ config('site.prices_note') }}</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('reservation') }}?excursion={{ $slug }}" class="btn btn-sun btn-lg"><i class="bi bi-calendar2-check" aria-hidden="true"></i> Réserver cette excursion</a>
                            <a href="https://wa.me/{{ $c['whatsapp'] }}?text={{ rawurlencode('Bonjour, je souhaite réserver « '.$excursion['name'].' ». Pour quelle date avez-vous de la place ?') }}" target="_blank" rel="noopener" class="btn btn-whatsapp"><i class="bi bi-whatsapp" aria-hidden="true"></i> Demander sur WhatsApp</a>
                            <a href="tel:{{ $c['phone_link'] }}" class="btn btn-outline-primary"><i class="bi bi-telephone" aria-hidden="true"></i> {{ $c['phone'] }}</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <section class="section bg-foam">
        <div class="container">
            <h2 class="mb-4">Les autres excursions</h2>
            <div class="row g-4">
                @foreach ($others->take(3) as $oSlug => $o)
                    <div class="col-md-6 col-lg-4 reveal">@include('partials.excursion-card', ['slug' => $oSlug, 'e' => $o])</div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.cta-band', ['slug' => $slug])
@endsection
