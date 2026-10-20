@extends('layouts.app')

@section('title', 'Mentions légales')
@section('description', 'Mentions légales du site Le Roi Mongin, édité par la SAS EGE-MM, Le François, Martinique.')

@section('content')
    @php $co = config('site.company'); $c = config('site.contact'); @endphp
    @include('partials.page-hero', ['title' => 'Mentions légales'])

    <section class="section pt-4">
        <div class="container legal-content max-w-760">
            <h2>Éditeur du site</h2>
            <p>
                <strong>{{ $co['legal_name'] }}</strong>, exploitant la marque « Le Roi Mongin »<br>
                {{ $co['form'] }} au capital de {{ $co['capital'] }}<br>
                Siège social : {{ $co['head_office'] }}<br>
                SIREN : {{ $co['siren'] }} — {{ $co['rcs'] }}<br>
                Code NAF : {{ $co['naf'] }}<br>
                N° TVA intracommunautaire : {{ $co['tva'] }}<br>
                Téléphone : <a href="tel:{{ $c['phone_link'] }}">{{ $c['phone'] }}</a> — E-mail : <a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a>
            </p>
            <p>Directrice de la publication : {{ $co['president'] }}, présidente.</p>

            <h2>Conception et réalisation</h2>
            <p>Conception : <strong>NJIEZM.FR</strong> — N’jie ZAMON, développeur web, Le Robert, Martinique — <a href="https://www.njiezm.fr" target="_blank" rel="noopener">www.njiezm.fr</a> — contact@njiezm.fr — +596 696 70 39 22.</p>

            <h2>Hébergement</h2>
            <p>[À compléter : nom, adresse et téléphone de l’hébergeur retenu lors de la mise en ligne.]</p>

            <h2>Propriété intellectuelle</h2>
            <p>Les textes, photographies, logos et éléments graphiques du site sont la propriété de la société EGE-MM ou de leurs auteurs, sauf mention contraire. Toute reproduction sans autorisation est interdite.</p>
            <p>Certaines photographies d’illustration proviennent de Wikimedia Commons et sont publiées sous licence Creative Commons BY-SA 4.0 :</p>
            <ul>
                <li>Vue aérienne des îlets — Mickaël Bruno, <a href="https://commons.wikimedia.org/wiki/File:Baignoire_de_Josephine.jpg" target="_blank" rel="noopener">Wikimedia Commons</a>, CC BY-SA 4.0 (recadrée et compressée).</li>
                <li>Baignoire de Joséphine — Patrifor, <a href="https://commons.wikimedia.org/wiki/File:Baignoire_de_Jos%C3%A9phine.jpg" target="_blank" rel="noopener">Wikimedia Commons</a>, CC BY-SA 4.0 (compressée).</li>
            </ul>
            <p>Fond de carte © contributeurs <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a>.</p>

            <h2>Responsabilité</h2>
            <p>Les informations (programmes, horaires, tarifs) sont données à titre indicatif et peuvent évoluer selon la saison et les conditions météorologiques. Seule la confirmation de réservation adressée par l’équipe fait foi.</p>

            <h2>Conditions de vente</h2>
            <p>[À compléter : conditions générales de vente (acompte, annulation, report en cas de mauvaise météo).]</p>
        </div>
    </section>
@endsection
