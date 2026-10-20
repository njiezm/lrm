@extends('layouts.app')

@section('title', 'Page introuvable')

@section('content')
    <section class="section text-center">
        <div class="container max-w-640">
            <p class="display-1 fw-800 text-ocean mb-0">404</p>
            <h1 class="h2 mb-3">Cette page a pris le large</h1>
            <p class="text-muted mb-4">La page demandée n’existe pas ou a été déplacée. Les excursions, elles, partent toujours à 9 h de la marina du François.</p>
            <div class="d-flex flex-wrap gap-2 justify-content-center">
                <a href="{{ route('home') }}" class="btn btn-primary">Retour à l’accueil</a>
                <a href="{{ route('excursions.index') }}" class="btn btn-sun">Voir les excursions</a>
            </div>
        </div>
    </section>
@endsection
