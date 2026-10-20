@extends('layouts.app')

@section('title', 'Infos pratiques & FAQ')
@section('description', 'Point de rendez-vous à la marina du François, quoi apporter, météo, enfants, paiement : toutes les infos pratiques pour votre excursion avec le Roi Mongin.')

@push('head')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect(config('site.faq'))->reject(fn ($f) => str_starts_with($f['a'], '[À compléter'))->map(fn ($f) => [
                '@type' => 'Question', 'name' => $f['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => trim(preg_replace('/\[À compléter[^\]]*\]/u', '', $f['a']))],
            ])->values(),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
    @php
        $c = config('site.contact');
        $lat = $c['geo']['lat']; $lng = $c['geo']['lng'];
        $bbox = implode(',', [$lng - 0.012, $lat - 0.007, $lng + 0.012, $lat + 0.007]);
    @endphp
    @include('partials.page-hero', [
        'title' => 'Infos pratiques',
        'eyebrow' => 'Bien préparer sa journée',
        'lead' => 'Rendez-vous, affaires à prévoir, météo, enfants, paiement : tout ce qu’il faut savoir avant d’embarquer.',
        'image' => 'photos/ponton-ilet',
    ])

    <section class="section pt-4">
        <div class="container">
            <div class="row g-3 mb-5">
                <div class="col-sm-6 col-lg-3"><div class="why-card"><div class="icon"><i class="bi bi-alarm" aria-hidden="true"></i></div><h3>9 h</h3><p>Rendez-vous à la marina du François pour les journées et les balades.</p></div></div>
                <div class="col-sm-6 col-lg-3"><div class="why-card"><div class="icon"><i class="bi bi-sunset" aria-hidden="true"></i></div><h3>16 h 30</h3><p>Retour à la marina pour les journées complètes.</p></div></div>
                <div class="col-sm-6 col-lg-3"><div class="why-card"><div class="icon"><i class="bi bi-telephone" aria-hidden="true"></i></div><h3>8 h – 18 h</h3><p>Joignable tous les jours par téléphone et WhatsApp.</p></div></div>
                <div class="col-sm-6 col-lg-3"><div class="why-card"><div class="icon"><i class="bi bi-credit-card" aria-hidden="true"></i></div><h3>Paiement</h3><p>{{ implode(', ', $c['payments']) }}.</p></div></div>
            </div>

            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="sticky-aside">
                        <p class="eyebrow">Ma valise pour la journée</p>
                        <h2 class="mb-3">Quoi apporter ?</h2>
                        <ul class="check-list mb-4">
                            <li>Maillot de bain (on descend directement dans l’eau)</li>
                            <li>Serviette et paréo</li>
                            <li>Chapeau ou casquette, lunettes de soleil</li>
                            <li>Crème solaire respectueuse des récifs</li>
                            <li>Sac étanche pour le téléphone</li>
                            <li>Masque et tuba si vous en avez</li>
                            <li>Bonne humeur (indispensable !)</li>
                        </ul>
                        <p class="text-muted small mb-0">Repas, boissons et goûter sont compris dans les journées : inutile de prévoir un pique-nique.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="eyebrow">Questions fréquentes</p>
                    <h2 class="mb-4">FAQ</h2>
                    <div class="accordion" id="faq">
                        @foreach (config('site.faq') as $i => $f)
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button {{ $i ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq-{{ $i }}" aria-expanded="{{ $i ? 'false' : 'true' }}" aria-controls="faq-{{ $i }}">{{ $f['q'] }}</button>
                                </h3>
                                <div id="faq-{{ $i }}" class="accordion-collapse collapse {{ $i ? '' : 'show' }}" data-bs-parent="#faq">
                                    <div class="accordion-body">{{ $f['a'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-foam" id="acces">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-4">
                    <p class="eyebrow">Plan d’accès</p>
                    <h2 class="mb-3">Le point de rendez-vous</h2>
                    <p class="fs-5 mb-2"><strong>{{ $c['meeting_point'] }}</strong><br>{{ $c['postcode'] }} {{ $c['city'] }}, {{ $c['region'] }}</p>
                    <p class="text-muted">Sur la presqu’île du François, côte atlantique de la Martinique. [À compléter : stationnement, repère visuel du ponton.]</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-primary" href="https://www.openstreetmap.org/directions?to={{ $lat }}%2C{{ $lng }}#map=16/{{ $lat }}/{{ $lng }}" target="_blank" rel="noopener"><i class="bi bi-signpost-split" aria-hidden="true"></i> Itinéraire</a>
                        <a class="btn btn-outline-primary" href="https://www.google.com/maps/dir/?api=1&destination={{ $lat }},{{ $lng }}" target="_blank" rel="noopener">Google Maps</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <iframe class="map-frame" title="Carte : point de rendez-vous du Roi Mongin au port de pêche du François" loading="lazy"
                            src="https://www.openstreetmap.org/export/embed.html?bbox={{ $bbox }}&amp;layer=mapnik&amp;marker={{ $lat }}%2C{{ $lng }}"></iframe>
                    <p class="small text-muted mt-2 mb-0">Carte © contributeurs OpenStreetMap. Coordonnées issues de la fiche Martinique Tourisme.</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.cta-band')
@endsection
