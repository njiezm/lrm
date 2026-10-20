@extends('layouts.app')

@section('title', 'Politique de confidentialité')
@section('description', 'Comment Le Roi Mongin (SAS EGE-MM) traite les données personnelles transmises via le formulaire de réservation.')

@section('content')
    @php $co = config('site.company'); $c = config('site.contact'); @endphp
    @include('partials.page-hero', ['title' => 'Politique de confidentialité'])

    <section class="section pt-4">
        <div class="container legal-content max-w-760">
            <h2>Responsable du traitement</h2>
            <p>{{ $co['legal_name'] }} (« Le Roi Mongin »), {{ $co['head_office'] }}, représentée par {{ $co['president'] }}. Contact : <a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a>.</p>

            <h2>Données collectées</h2>
            <p>Lorsque vous envoyez une demande de réservation, nous recevons : l’excursion et la date souhaitées, le nombre d’adultes et d’enfants (et leur âge si vous l’indiquez), vos nom, e-mail, téléphone et votre message. Votre adresse IP est enregistrée pour lutter contre les envois abusifs.</p>

            <h2>Finalité et base légale</h2>
            <p>Ces données servent uniquement à répondre à votre demande et à organiser votre excursion (mesures précontractuelles, article 6.1.b du RGPD). Elles ne sont ni vendues ni utilisées à des fins publicitaires.</p>

            <h2>Durée de conservation</h2>
            <p>Les demandes sont conservées 3 ans à compter du dernier contact, puis supprimées. [À compléter : durée à valider par le responsable du traitement.]</p>

            <h2>Destinataires</h2>
            <p>Seule l’équipe du Roi Mongin a accès à vos données, ainsi que l’hébergeur du site dans le cadre de sa mission technique.</p>

            <h2>WhatsApp, carte et réseaux sociaux</h2>
            <p>Si vous choisissez d’écrire via WhatsApp, votre message est traité par WhatsApp (Meta) selon ses propres conditions. La carte de la page « Infos pratiques » est fournie par OpenStreetMap ; les liens vers Facebook et Instagram ouvrent ces services, qui appliquent leur propre politique. Le site n’utilise aucun cookie publicitaire ni outil de mesure d’audience ; seul un cookie technique de session (sécurité du formulaire) est déposé.</p>

            <h2>Vos droits</h2>
            <p>Vous disposez d’un droit d’accès, de rectification, d’effacement, de limitation et d’opposition. Pour l’exercer, écrivez à <a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a>. Vous pouvez aussi saisir la CNIL (www.cnil.fr).</p>
        </div>
    </section>
@endsection
