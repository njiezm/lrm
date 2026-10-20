@extends('layouts.app')

@section('title', 'Notre histoire, la Baignoire de Joséphine et l’îlet Oscar')
@section('description', 'Albert Mongin, pionnier des excursions aux îlets du François et du baptême du rhum ; Margaret Mongin a pris la relève. Découvrez la Baignoire de Joséphine et l’îlet Oscar, site protégé.')

@section('content')
    @include('partials.page-hero', [
        'title' => 'Le Roi Mongin, une histoire de famille',
        'crumb' => 'Notre histoire',
        'eyebrow' => 'Depuis plus de 40 ans',
        'lead' => 'À tout seigneur tout honneur : le Roi Mongin est le pionnier des excursions sur les îlets du François et des « baptêmes du rhum » dans la Baignoire de Joséphine.',
        'image' => 'photos/groupe-fonds-blancs',
    ])

    <section class="section pt-4">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <p class="eyebrow">Les débuts</p>
                    <h2 class="mb-3">Albert Mongin, le restaurateur devenu roi</h2>
                    <p>Il y a plus de 40 ans, <strong>Albert Mongin</strong> tenait le restaurant Le Bon Blaff, au François. À la demande de clients habitués, il organise un déjeuner sur l’îlet Oscar et les y conduit avec sa yole de pêcheur.</p>
                    <p>Après le repas vient le moment de détente : le bain à la Baignoire de Joséphine, un lieu qui n’était connu, à l’époque, que des pêcheurs et de leurs familles. L’idée lui vient alors de faire découvrir ce magnifique patrimoine des îlets et des fonds blancs du François aux touristes, mais aussi aux Martiniquais.</p>
                    <p class="mb-0">Avec son baptême du rhum et son authenticité, il devient <strong>« le Roi Mongin »</strong>, un nom connu bien au-delà de la Martinique.</p>
                </div>
                <div class="col-lg-6 reveal">
                    <x-photo src="photos/yole-ronde" alt="Une yole ronde sous voile sur les fonds blancs du François" class="w-100 rounded-5" sizes="(min-width: 992px) 540px, 100vw" />
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-sand">
        <div class="container">
            <div class="row g-5 align-items-center flex-lg-row-reverse">
                <div class="col-lg-6 reveal">
                    <p class="eyebrow">La relève</p>
                    <h2 class="mb-3">Margaret Mongin a repris la barre</h2>
                    <p>Aujourd’hui, la relève est assurée par sa fille, <strong>Margaret</strong>. Elle fait vivre la tradition de son père avec le même enthousiasme et le même dévouement, et sait tenir une ambiance de fête du départ jusqu’au retour à la marina.</p>
                    <p class="mb-0">En 2019, elle crée la société EGE-MM, pour <em>Excursion Gastronomique Écologique Margaret Mongin</em> : tout un programme, entre mer, cuisine créole et respect des îlets.</p>
                    <p class="note-todo mt-3 mb-0">[À compléter : photo de Margaret et de l’équipe, quelques mots de Margaret.]</p>
                </div>
                <div class="col-lg-6 reveal">
                    <div class="row g-3">
                        <div class="col-6"><x-photo src="photos/bateau-mongin" alt="La proue du bateau Margaret, aux couleurs du Roi Mongin" class="w-100 rounded-4" sizes="(min-width: 992px) 260px, 48vw" /></div>
                        <div class="col-6"><x-photo src="photos/animation-bateau" alt="Animation au micro à bord du bateau" class="w-100 rounded-4" sizes="(min-width: 992px) 260px, 48vw" /></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="baignoire-de-josephine">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 reveal">
                    <x-photo src="illustrations/baignoire-josephine" alt="Baigneurs et bateaux sur les fonds blancs de la Baignoire de Joséphine, au large du François" class="w-100 rounded-5 mb-2" sizes="(min-width: 992px) 540px, 100vw" />
                    <p class="photo-credit mb-0">Photo d’illustration : Patrifor, Wikimedia Commons, CC BY-SA 4.0</p>
                </div>
                <div class="col-lg-6 reveal">
                    <p class="eyebrow">Le site</p>
                    <h2 class="mb-3">La Baignoire de Joséphine</h2>
                    <p>Sur la côte atlantique, entre Le François et Le Robert, des îlets font le bonheur des habitants. Au large, accessibles uniquement par la mer, s’étendent les <strong>fonds blancs</strong> : des bancs de sable de différentes profondeurs.</p>
                    <p>Le plus célèbre est sans conteste la Baignoire de Joséphine, entre l’îlet Thierry et l’îlet Oscar, bordée par la barrière de corail. L’eau y a une profondeur de 50 cm à 1,50 m : on se baigne avec de l’eau à la taille, en pleine mer, dans une eau limpide.</p>
                    <h3 class="h5 mt-4">D’où vient son nom ?</h3>
                    <p>Plusieurs versions circulent. La plus connue en fait le lieu de baignade préféré de l’impératrice Joséphine de Beauharnais, première épouse de Napoléon — peu probable, sa résidence des Trois-Îlets étant à quelque 25 km. Une autre explication évoque un bateau dragueur, « La Joséphine », qui venait s’y approvisionner en sable.</p>
                    <p class="mb-0">Une chose est sûre : savourer un planteur, voire passer son baptême du rhum, au beau milieu de l’océan reste une expérience unique.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-deep text-white" id="ilet-oscar">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <p class="eyebrow on-dark">L’îlet Oscar</p>
                    <h2 class="text-white mb-3">Un îlet protégé, au cœur de la baie du François</h2>
                    <p>De forme ovale, l’îlet Oscar s’élève à 40 mètres au-dessus de la mer sur 5,7 hectares, entre falaises, anses de galets et anses de sable. Il serait issu d’une coulée de lave.</p>
                    <p>Il fait l’objet d’un arrêté de protection de biotope depuis avril 2003 et est « site inscrit » depuis le 28 juillet 2007. Poiriers, mancenilliers et fourrés y abritent de nombreux oiseaux protégés : tourterelle à queue carrée, colibri huppé, paruline jaune…</p>
                    <p class="mb-0 text-white-50 small">Source : brochure de la DEAL Martinique sur l’îlet Oscar, citée par l’ancien site du Roi Mongin.</p>
                </div>
                <div class="col-lg-6 reveal">
                    <x-photo src="photos/arrivee-ponton" alt="Arrivée des passagers sur le ponton de l’îlet Oscar" class="w-100 rounded-5" sizes="(min-width: 992px) 540px, 100vw" />
                </div>
            </div>
            <div class="row g-3 mt-4">
                <div class="col-md-4"><div class="why-card featured"><div class="icon"><i class="bi bi-tree" aria-hidden="true"></i></div><h3>8 îlets au François</h3><p>Sur 68 hectares au total. Les îlets Frégate, Lavigne, Long, Oscar et Thierry sont protégés par arrêté de biotope depuis 2003.</p></div></div>
                <div class="col-md-4"><div class="why-card featured"><div class="icon"><i class="bi bi-feather" aria-hidden="true"></i></div><h3>Une faune fragile</h3><p>Colibris, sucriers, pipiris, anolis et tortues marines : des espèces protégées qui trouvent refuge sur les îlets.</p></div></div>
                <div class="col-md-4"><div class="why-card featured"><div class="icon"><i class="bi bi-heart" aria-hidden="true"></i></div><h3>Respecter les îlets</h3><p>La dégradation de ces milieux est interdite : on profite de la plage, on remporte ses déchets, on laisse coraux et coquillages en place.</p></div></div>
            </div>
        </div>
    </section>

    @include('partials.cta-band', ['title' => 'Vivez la tradition du Roi Mongin', 'text' => 'Baignade aux fonds blancs, baptême du rhum et déjeuner créole sur l’îlet Oscar : réservez votre journée.'])
@endsection
