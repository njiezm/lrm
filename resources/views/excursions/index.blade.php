@extends('layouts.app')

@section('title', 'Excursions aux îlets du François')
@section('description', 'Journée La Kréole, journée langouste L’Otantik, Initiation Yole, balade demi-journée, journée Lune de miel : toutes les excursions du Roi Mongin à la Baignoire de Joséphine et sur l’îlet Oscar.')

@section('content')
    @include('partials.page-hero', [
        'title' => 'Nos excursions',
        'eyebrow' => 'Baignoire de Joséphine · îlet Oscar',
        'lead' => 'Une journée complète sur l’îlet Oscar, une version gourmande avec langouste, une initiation à la yole ronde ou une simple matinée aux fonds blancs : choisissez votre sortie.',
        'image' => 'photos/baignoire-turquoise',
    ])

    <section class="section pt-4">
        <div class="container">
            <div class="row g-4">
                @foreach ($excursions as $slug => $e)
                    <div class="col-md-6 col-lg-4 reveal">@include('partials.excursion-card', ['slug' => $slug, 'e' => $e])</div>
                @endforeach
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="why-card featured h-100 d-flex flex-column">
                        <div class="icon"><i class="bi bi-people" aria-hidden="true"></i></div>
                        <h3 class="h4">Groupes, CE, anniversaires</h3>
                        <p class="mb-3">Tarif de groupe dès 25 adultes sur La Kréole, et des options à la carte : gâteau, champagne, DJ, karaoké, zumba, massage, kayak…</p>
                        <a href="{{ route('reservation') }}?excursion=groupe" class="btn btn-sun mt-auto align-self-start">Demander un devis</a>
                    </div>
                </div>
            </div>
            <p class="small text-muted mt-4 mb-0">{{ config('site.prices_note') }}</p>
        </div>
    </section>

    <section class="section bg-foam">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-5">
                    <p class="eyebrow">Compris dans les journées</p>
                    <h2 class="mb-3">Tout est prévu, il ne reste qu’à se baigner</h2>
                    <p class="text-muted">Pour La Kréole, L’Otantik et l’Initiation Yole, le transport en bateau, le décollage, le baptême du rhum, le déjeuner créole, le bar et le goûter sont inclus.</p>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        <div class="col-sm-6"><div class="why-card"><div class="icon"><i class="bi bi-cup-straw" aria-hidden="true"></i></div><h3>Décollage & bar ouvert</h3><p>Jus, planteur, ti-punch, accras ; eau, sodas, rhum, planteur, liqueur et Martini toute la journée.</p></div></div>
                        <div class="col-sm-6"><div class="why-card"><div class="icon"><i class="bi bi-egg-fried" aria-hidden="true"></i></div><h3>Déjeuner créole</h3><p>Soupe de poissons, colombo, poisson frit mariné, ribs, riz, haricots rouges… et vin au verre.</p></div></div>
                        <div class="col-sm-6"><div class="why-card"><div class="icon"><i class="bi bi-music-note-beamed" aria-hidden="true"></i></div><h3>Animation</h3><p>Musique, démonstration de paréo, initiation au zouk, ambiance festive.</p></div></div>
                        <div class="col-sm-6"><div class="why-card"><div class="icon"><i class="bi bi-cup-hot" aria-hidden="true"></i></div><h3>Goûter maison</h3><p>Chocolat créole et pain au beurre, la tradition du Roi Mongin.</p></div></div>
                    </div>
                    <p class="note-todo mt-3 mb-0"><strong>Options sur demande :</strong> {{ config('site.extras') }}</p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.cta-band')
@endsection
