@extends('layouts.app')

@section('description', 'Excursion en bateau à la Baignoire de Joséphine et sur l’îlet Oscar au François, Martinique : baptême du rhum, déjeuner créole sur l’îlet, animation. Le Roi Mongin, le pionnier depuis plus de 40 ans. Réservation par WhatsApp.')

@push('head')
    <link rel="preload" as="image" href="{{ asset('images/illustrations/ilets-vue-aerienne-sm.webp') }}" imagesrcset="{{ asset('images/illustrations/ilets-vue-aerienne-sm.webp') }} 800w, {{ asset('images/illustrations/ilets-vue-aerienne.webp') }} 1800w" imagesizes="100vw">
@endpush

@section('content')
    @php $c = config('site.contact'); $kreole = $excursions['la-kreole']; @endphp

    {{-- Hero immersif --}}
    <section class="hero">
        <div class="hero-bg">
            <x-photo src="illustrations/ilets-vue-aerienne" alt="Vue aérienne des îlets et des fonds blancs turquoise de la côte atlantique de la Martinique" :eager="true" />
        </div>
        <div class="container">
            <p class="eyebrow on-dark mb-3">Le François · Martinique</p>
            <h1 class="mb-4">La Martinique en bateau,<br> les pieds dans la <span class="text-sun">Baignoire de Joséphine</span></h1>
            <p class="lead mb-4">Baptême du rhum au milieu de la mer, plage et farniente sur l’îlet Oscar, vrai déjeuner créole : la journée authentique du Roi Mongin, le pionnier des îlets du François.</p>
            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="{{ route('reservation') }}" class="btn btn-sun btn-lg"><i class="bi bi-calendar2-check" aria-hidden="true"></i> Réserver ma journée</a>
                <a href="{{ route('excursions.index') }}" class="btn btn-glass btn-lg">Voir les excursions</a>
            </div>
            <ul class="hero-chips mb-0">
                <li><i class="bi bi-clock me-1" aria-hidden="true"></i> Départ 9 h, marina du François</li>
                <li><i class="bi bi-cup-straw me-1" aria-hidden="true"></i> Repas & boissons inclus</li>
                <li><i class="bi bi-award me-1" aria-hidden="true"></i> Depuis {{ config('site.founded_text') }}</li>
            </ul>
        </div>
        <p class="hero-credit d-none d-md-block mb-0">Photo d’illustration : Mickaël Bruno, CC BY-SA 4.0</p>
        <div class="wave-bottom">@include('partials.wave')</div>
    </section>

    {{-- Réservation rapide --}}
    <div class="container">
        <form class="quick-book reveal" action="{{ route('reservation') }}" method="get" aria-label="Préparer ma réservation">
            <div class="row g-3 align-items-end">
                <div class="col-12 col-md-4">
                    <label class="form-label" for="qb-excursion">Excursion</label>
                    <select class="form-select" id="qb-excursion" name="excursion">
                        @foreach ($excursions as $slug => $e)
                            <option value="{{ $slug }}">{{ $e['name'] }}@if ($e['from_price']) — dès {{ $e['from_price'] }} €@endif</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-md-3">
                    <label class="form-label" for="qb-date">Date</label>
                    <input type="date" class="form-control" id="qb-date" name="date" min="{{ now()->toDateString() }}">
                </div>
                <div class="col-6 col-md-2">
                    <label class="form-label" for="qb-adults">Adultes</label>
                    <input type="number" class="form-control" id="qb-adults" name="adults" value="2" min="1" max="200">
                </div>
                <div class="col-12 col-md-3 d-grid">
                    <button class="btn btn-sun" type="submit">Vérifier la disponibilité</button>
                </div>
            </div>
        </form>
    </div>

    {{-- Excursions phares --}}
    <section class="section" id="excursions">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 section-head mw-100">
                <div class="max-w-640">
                    <p class="eyebrow">Nos sorties en mer</p>
                    <h2 class="mb-2">Choisissez votre journée aux îlets</h2>
                    <p class="text-muted mb-0">Toutes les journées partent à 9 h de la marina du François, avec bain et baptême du rhum à la Baignoire de Joséphine.</p>
                </div>
                <a href="{{ route('excursions.index') }}" class="link-arrow">Toutes les excursions <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="row g-4">
                @foreach (array_slice($excursions, 0, 3, true) as $slug => $e)
                    <div class="col-md-6 col-lg-4 reveal">@include('partials.excursion-card', ['slug' => $slug, 'e' => $e])</div>
                @endforeach
            </div>
            <p class="small text-muted mt-3 mb-0">{{ config('site.prices_note') }}</p>
        </div>
    </section>

    {{-- La journée type --}}
    <section class="section bg-deep text-white position-relative on-dark">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <p class="eyebrow on-dark">Une journée avec le Roi Mongin</p>
                    <h2 class="text-white mb-4">De la Baignoire de Joséphine à l’îlet Oscar</h2>
                    <ol class="timeline">
                        @foreach (config('site.day_programme') as $i => $step)
                            <li>
                                <span class="dot" aria-hidden="true"><i class="bi {{ ['bi-sun', 'bi-water', 'bi-tree', 'bi-egg-fried', 'bi-cup-hot', 'bi-sunset'][$i] ?? 'bi-dot' }}"></i></span>
                                <span class="time">{{ $step['time'] }}</span>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['text'] }}</p>
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="col-lg-6 reveal">
                    <div class="row g-3">
                        <div class="col-7"><x-photo src="photos/service-baignoire" alt="Un membre de l’équipe sert les boissons sur une bouée au milieu de la Baignoire de Joséphine" class="rounded-4 w-100 h-100 object-fit-cover" sizes="(min-width: 992px) 330px, 58vw" /></div>
                        <div class="col-5 d-flex flex-column gap-3">
                            <x-photo src="photos/accras-ilet" alt="Assiette d’accras et de crudités face à la mer sur l’îlet Oscar" class="rounded-4 w-100" sizes="(min-width: 992px) 230px, 40vw" />
                            <x-photo src="photos/ilet-oscar" alt="L’îlet Oscar, verdoyant, au milieu d’une mer turquoise" class="rounded-4 w-100" sizes="(min-width: 992px) 230px, 40vw" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Pourquoi nous --}}
    <section class="section bg-foam">
        <div class="container">
            <div class="section-head text-center">
                <p class="eyebrow">Pourquoi le Roi Mongin</p>
                <h2>Une tradition martiniquaise, <span class="wave-underline">transmise en famille</span></h2>
            </div>
            @php $why = config('site.why'); $first = array_shift($why); @endphp
            <div class="row g-3 g-lg-4">
                <div class="col-lg-4 reveal">
                    <div class="why-card featured d-flex flex-column justify-content-end">
                        <div class="icon"><i class="bi {{ $first['icon'] }}" aria-hidden="true"></i></div>
                        <h3 class="h2">{{ $first['title'] }}</h3>
                        <p class="fs-5">{{ $first['text'] }}</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-3 g-lg-4">
                        @foreach ($why as $w)
                            <div class="col-sm-6 reveal">
                                <div class="why-card">
                                    <div class="icon"><i class="bi {{ $w['icon'] }}" aria-hidden="true"></i></div>
                                    <h3>{{ $w['title'] }}</h3>
                                    <p>{{ $w['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Histoire --}}
    <section class="section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <div class="story-media">
                        <x-photo src="photos/embarquement-margaret" alt="Les passagers embarquent à bord du bateau Margaret du Roi Mongin" class="w-100" sizes="(min-width: 992px) 540px, 100vw" />
                        <div class="story-badge"><strong>+ de 40 ans</strong><span>de baptêmes du rhum</span></div>
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <p class="eyebrow">Notre histoire</p>
                    <h2 class="mb-3">D’un restaurant du François à la Baignoire de Joséphine</h2>
                    <p>Tout commence avec <strong>Albert Mongin</strong>, restaurateur au François (Le Bon Blaff). À la demande de clients fidèles, il organise un déjeuner sur l’îlet Oscar et les y conduit avec sa yole de pêcheur. Après le repas : détente et bain à la Baignoire de Joséphine, un lieu alors connu des seuls pêcheurs et de leurs familles.</p>
                    <p>L’idée est née : faire découvrir aux visiteurs comme aux Martiniquais ce patrimoine des îlets et des fonds blancs. Avec son baptême du rhum, il devient « le Roi Mongin ». Aujourd’hui, <strong>sa fille Margaret</strong> a repris la barre, avec la même énergie et une ambiance de folie toute la journée.</p>
                    <a href="{{ route('histoire') }}" class="link-arrow">Lire notre histoire <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Galerie --}}
    <section class="section pt-0">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
                <div>
                    <p class="eyebrow">En images</p>
                    <h2 class="mb-0">Le Roi Mongin en photos</h2>
                </div>
                <a href="{{ route('galerie') }}" class="link-arrow">Toute la galerie <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="mosaic reveal">
                <a class="wide tall" href="{{ route('galerie') }}"><x-photo src="photos/grand-groupe-baignoire" alt="Grand groupe de passagers dans l’eau à la Baignoire de Joséphine" sizes="(min-width: 768px) 50vw, 100vw" /></a>
                <a href="{{ route('galerie') }}"><x-photo src="photos/zouk-dans-l-eau" alt="Initiation au zouk les pieds dans l’eau" sizes="(min-width: 768px) 25vw, 50vw" /></a>
                <a class="tall" href="{{ route('galerie') }}"><x-photo src="photos/ponton-ilet" alt="Le ponton couvert de l’îlet Oscar" sizes="(min-width: 768px) 25vw, 50vw" /></a>
                <a href="{{ route('galerie') }}"><x-photo src="photos/cuisine-creole" alt="Cuisson des accras sur l’îlet" sizes="(min-width: 768px) 25vw, 50vw" /></a>
                <a class="wide" href="{{ route('galerie') }}"><x-photo src="photos/demonstration-pareo" alt="Démonstration de paréo sous le carbet de l’îlet" sizes="(min-width: 768px) 50vw, 100vw" /></a>
                <a href="{{ route('galerie') }}"><x-photo src="photos/pareo-plage" alt="Paréo noué sous les cocotiers de la plage" sizes="(min-width: 768px) 25vw, 50vw" /></a>
                <a href="{{ route('galerie') }}"><x-photo src="photos/ti-punch-baignoire" alt="Service du ti-punch au milieu de la mer" sizes="(min-width: 768px) 25vw, 50vw" /></a>
            </div>
        </div>
    </section>

    {{-- Infos clés --}}
    <section class="section-sm bg-sand">
        <div class="container">
            <div class="info-strip">
                <div class="item"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i><div><strong>Rendez-vous</strong><span>{{ $c['meeting_point'] }}</span></div></div>
                <div class="item"><i class="bi bi-calendar-week" aria-hidden="true"></i><div><strong>Joignable</strong><span>{{ $c['hours'] }}</span></div></div>
                <div class="item"><i class="bi bi-translate" aria-hidden="true"></i><div><strong>Langues</strong><span>{{ implode(' · ', $c['languages']) }}</span></div></div>
                <div class="item"><i class="bi bi-credit-card" aria-hidden="true"></i><div><strong>Paiement</strong><span>{{ implode(' · ', $c['payments']) }}</span></div></div>
            </div>
            <p class="text-center mt-4 mb-0"><a href="{{ route('infos') }}" class="link-arrow">Infos pratiques, FAQ et plan d’accès <i class="bi bi-arrow-right" aria-hidden="true"></i></a></p>
        </div>
    </section>

    @include('partials.cta-band')
@endsection
