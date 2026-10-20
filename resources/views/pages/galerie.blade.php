@extends('layouts.app')

@section('title', 'Galerie photos')
@section('description', 'Les photos des journées du Roi Mongin : Baignoire de Joséphine, îlet Oscar, ambiance à bord et cuisine créole au François, Martinique.')

@section('content')
    @include('partials.page-hero', [
        'title' => 'Galerie',
        'eyebrow' => 'Le Roi Mongin en photos',
        'lead' => 'Eau turquoise, baptême du rhum, paréos, accras et éclats de rire : un aperçu de ce qui vous attend.',
        'image' => 'photos/zouk-dans-l-eau',
    ])

    <section class="section pt-4">
        <div class="container">
            <div class="gallery-filters mb-4" role="group" aria-label="Filtrer les photos">
                <button type="button" class="btn btn-outline-primary" data-filter="all" aria-pressed="true">Toutes</button>
                @foreach (config('site.gallery_categories') as $key => $label)
                    <button type="button" class="btn btn-outline-primary" data-filter="{{ $key }}" aria-pressed="false">{{ $label }}</button>
                @endforeach
            </div>

            <div class="gallery-grid">
                @foreach (config('site.gallery') as $photo)
                    <figure data-cat="{{ $photo['cat'] }}">
                        <button type="button" data-full="{{ asset('images/'.$photo['file'].'.webp') }}" aria-label="Agrandir : {{ $photo['alt'] }}">
                            <x-photo :src="$photo['file']" :alt="$photo['alt']" sizes="(min-width: 1200px) 290px, (min-width: 768px) 33vw, 50vw" />
                        </button>
                    </figure>
                @endforeach
            </div>
            <p class="note-todo mt-4 mb-0">Photos récupérées de l’ancien site leroimongin.com. [À compléter : photos récentes en haute définition (bateau, équipe, îlet), éventuellement une courte vidéo drone.]</p>
        </div>
    </section>

    <dialog id="lightbox" class="lightbox" aria-label="Visionneuse de photos">
        <button type="button" class="lb-btn lb-close" aria-label="Fermer"><i class="bi bi-x-lg" aria-hidden="true"></i></button>
        <button type="button" class="lb-btn lb-prev" aria-label="Photo précédente"><i class="bi bi-chevron-left" aria-hidden="true"></i></button>
        <figure class="m-0">
            <img src="" alt="">
            <figcaption></figcaption>
        </figure>
        <button type="button" class="lb-btn lb-next" aria-label="Photo suivante"><i class="bi bi-chevron-right" aria-hidden="true"></i></button>
    </dialog>

    @include('partials.cta-band')
@endsection
