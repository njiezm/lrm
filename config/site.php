<?php

/*
|--------------------------------------------------------------------------
| Contenus du site Le Roi Mongin
|--------------------------------------------------------------------------
| Tous les textes, tarifs et coordonnées sont ici : pas de back-office pour
| la maquette. Sources : ancien site leroimongin.com (archives web.archive.org
| 2021-2023), fiche Martinique Tourisme (martinique.org), annuaire-entreprises.
| Les mentions « [À compléter] » signalent les informations à faire valider.
*/

return [

    'name' => 'Le Roi Mongin',
    'tagline' => 'Excursions en mer aux îlets du François',
    // Version de démonstration : ne pas indexer (SITE_NOINDEX=true dans le .env)
    'noindex' => (bool) env('SITE_NOINDEX', false),
    'description' => 'Journées en bateau à la Baignoire de Joséphine et sur l’îlet Oscar au François (Martinique) : baptême du rhum les pieds dans l’eau, déjeuner créole sur l’îlet, animation. Le pionnier des îlets depuis plus de 40 ans.',
    'founded_text' => 'plus de 40 ans',

    'company' => [
        'legal_name' => 'EGE-MM (Excursion Gastronomique Écologique Margaret Mongin)',
        'form' => 'SAS à associé unique (SASU)',
        'siren' => '879 662 252',
        'naf' => '50.10Z — Transports maritimes et côtiers de passagers',
        'rcs' => 'RCS Fort-de-France 879 662 252',
        'capital' => '[À compléter]',
        'tva' => '[À compléter]',
        'president' => 'Margaret Mongin',
        'head_office' => '34 rue Elphège Mélan, 97240 Le François, Martinique',
        'created' => '2019',
    ],

    'contact' => [
        'phone' => '0696 35 03 52',
        'phone_intl' => '+596 696 35 03 52',
        'phone_link' => '+596696350352',
        'whatsapp' => '596696350352',
        'email' => 'roimongin@gmail.com',
        'meeting_point' => 'Port de pêche (ponton D6), presqu’île du François',
        'meeting_short' => 'Marina du François',
        'street' => 'Port de pêche D6, presqu’île du François',
        'postcode' => '97240',
        'city' => 'Le François',
        'region' => 'Martinique',
        'geo' => ['lat' => 14.61952283, 'lng' => -60.8900703],
        'hours' => 'Tous les jours, 8 h – 18 h',
        'languages' => ['Français', 'Anglais'],
        'payments' => ['Carte bancaire', 'Espèces', 'Virement'],
        'facebook' => 'https://www.facebook.com/Leroimongin',
        'instagram' => 'https://www.instagram.com/leroimonginmartinique',
    ],

    // Destinataire des demandes de réservation (mail en log pour la maquette)
    'mail_to' => env('BOOKING_MAIL_TO', 'roimongin@gmail.com'),

    'nav' => [
        ['route' => 'home', 'label' => 'Accueil'],
        ['route' => 'excursions.index', 'label' => 'Excursions'],
        ['route' => 'histoire', 'label' => 'Notre histoire'],
        ['route' => 'galerie', 'label' => 'Galerie'],
        ['route' => 'infos', 'label' => 'Infos pratiques'],
    ],

    'prices_note' => 'Tarifs relevés sur l’ancien site leroimongin.com (saison 2023), donnés à titre indicatif : [À compléter : tarifs de la saison en cours à confirmer].',

    /*
    | Programme commun des journées sur l’îlet Oscar (ancien site, 2023)
    */
    'day_programme' => [
        ['time' => '9 h', 'title' => 'Rendez-vous à la marina du François', 'text' => 'Accueil à bord et « décollage » : jus, planteur, ti-punch, accras de morue et pain.'],
        ['time' => 'Matinée', 'title' => 'La Baignoire de Joséphine', 'text' => 'Bain dans l’eau turquoise des fonds blancs et baptême du rhum, les pieds dans le sable, au milieu de la mer.'],
        ['time' => 'Fin de matinée', 'title' => 'Arrivée sur l’îlet Oscar', 'text' => 'Plage, farniente, animation musicale, démonstration de paréo…'],
        ['time' => '13 h', 'title' => 'Déjeuner créole sur l’îlet', 'text' => 'Un vrai repas antillais préparé sur place, boissons servies à volonté.'],
        ['time' => '16 h', 'title' => 'Le goûter', 'text' => 'Chocolat créole et pain au beurre, la tradition maison.'],
        ['time' => '16 h 30', 'title' => 'Retour à la marina', 'text' => 'Des souvenirs plein la tête… et du sable dans les sandales.'],
    ],

    'creole_menu' => [
        'Soupe de poissons', 'Crudités', 'Colombo de poulet', 'Poisson frit mariné', 'Poulet grillé', 'Ribs',
        'Riz safrané et riz blanc', 'Gratin selon la saison', 'Haricots rouges', 'Lentilles',
    ],
    'creole_dessert' => 'Sorbet local, glace, café, thé — digestif : rhum vieux Clément',
    'drinks' => 'Bar ouvert : eau, sodas, jus, rhum blanc, planteur, liqueur, Martini ; vin rouge, rosé et blanc au verre pendant le repas. Bières, whisky et champagne à la carte.',

    /*
    | Excursions (ancien site, pages 2023 « La Kréole », « L’Otantik »,
    | « Initiation Yole », « Balade demi-journée » ; page 2021 « Lune de miel »)
    */
    'excursions' => [
        'la-kreole' => [
            'name' => 'La Kréole',
            'kicker' => 'La journée signature',
            'summary' => 'La journée complète qui a fait la réputation du Roi Mongin : Baignoire de Joséphine, baptême du rhum et déjeuner créole sur l’îlet Oscar.',
            'intro' => 'Embarquez pour la journée qui a fait la réputation du Roi Mongin. Cap sur la Baignoire de Joséphine pour un bain dans une eau limpide et le fameux baptême du rhum au milieu de la mer, puis direction l’îlet Oscar : plage, musique, démonstration de paréo et un vrai déjeuner antillais préparé sur place.',
            'duration' => 'Journée · 9 h – 16 h 30',
            'image' => 'photos/grand-groupe-baignoire',
            'image_alt' => 'Un groupe de passagers du Roi Mongin dans l’eau turquoise de la Baignoire de Joséphine',
            'from_price' => 60,
            'programme' => true,
            'lunch_extra' => null,
            'highlights' => ['Baptême du rhum dans la Baignoire de Joséphine', 'Déjeuner créole sur l’îlet Oscar', 'Bar ouvert toute la journée', 'Animation musicale et paréo'],
            'prices' => [
                ['label' => 'Adulte (dès 15 ans)', 'price' => '60 €'],
                ['label' => 'Enfant 13 – 14 ans', 'price' => '35 €'],
                ['label' => 'Enfant 6 – 12 ans', 'price' => '25 €'],
                ['label' => 'Enfant 3 – 5 ans', 'price' => '15 €'],
                ['label' => 'Groupe (à partir de 25 adultes)', 'price' => '55 € / adulte'],
            ],
        ],
        'l-otantik' => [
            'name' => 'L’Otantik',
            'kicker' => 'La journée langouste',
            'summary' => 'Le programme de La Kréole, avec une langouste grillée de 250 g pour chaque adulte au déjeuner sur l’îlet.',
            'intro' => 'Tout le programme de La Kréole, avec en plus une langouste grillée (250 g) servie à chaque adulte au déjeuner sur l’îlet Oscar. Pour ceux qui veulent vivre la journée en version gourmande.',
            'duration' => 'Journée · 9 h – 16 h 30',
            'image' => 'photos/cuisine-creole',
            'image_alt' => 'Préparation des accras dans la cuisine créole de l’îlet',
            'from_price' => 80,
            'programme' => true,
            'lunch_extra' => 'Langouste grillée 250 g (adultes)',
            'highlights' => ['Langouste grillée 250 g au déjeuner', 'Baptême du rhum dans la Baignoire de Joséphine', 'Bar ouvert toute la journée', 'Animation musicale et paréo'],
            'prices' => [
                ['label' => 'Adulte (dès 15 ans)', 'price' => '80 €'],
                ['label' => 'Enfant 13 – 14 ans', 'price' => '35 €'],
                ['label' => 'Enfant 6 – 12 ans', 'price' => '25 €'],
                ['label' => 'Enfant 3 – 5 ans', 'price' => '15 €'],
            ],
        ],
        'initiation-yole' => [
            'name' => 'Initiation Yole',
            'kicker' => 'Journée découverte & patrimoine',
            'summary' => 'La journée sur l’îlet Oscar, avec une initiation à la yole ronde, l’embarcation traditionnelle de la Martinique.',
            'intro' => 'La yole ronde est l’emblème de la Martinique. Cette journée réunit le programme complet sur l’îlet Oscar et une initiation à la navigation sur cette embarcation traditionnelle : de quoi repartir avec un vrai souvenir martiniquais.',
            'duration' => 'Journée · 9 h – 16 h 30',
            'image' => 'photos/yole-ronde',
            'image_alt' => 'Une yole ronde voile hissée sur les fonds blancs du François',
            'from_price' => 95,
            'programme' => true,
            'lunch_extra' => null,
            'activity' => 'Initiation à la yole ronde traditionnelle',
            'highlights' => ['Initiation à la yole ronde', 'Baptême du rhum dans la Baignoire de Joséphine', 'Déjeuner créole sur l’îlet Oscar', 'Accessible dès 12 ans'],
            'prices' => [
                ['label' => 'Adulte', 'price' => '95 €'],
                ['label' => 'Enfant 12 – 14 ans', 'price' => '70 €'],
            ],
        ],
        'balade-demi-journee' => [
            'name' => 'Balade demi-journée',
            'kicker' => 'La matinée aux fonds blancs',
            'summary' => 'Une matinée en mer pour découvrir les îlets et la Baignoire de Joséphine, apéritif compris. Deux formules.',
            'intro' => 'Peu de temps, mais envie de mer turquoise ? La balade demi-journée vous emmène découvrir les îlets et les fonds blancs, avec un apéritif servi en mer. Deux formules au choix.',
            'duration' => 'Matinée · départ 9 h',
            'image' => 'photos/baignoire-turquoise',
            'image_alt' => 'Baigneurs souriants dans l’eau translucide de la Baignoire de Joséphine',
            'from_price' => 38,
            'programme' => false,
            'formulas' => [
                ['name' => 'Petite balade', 'price' => '38 €', 'text' => 'Découverte des îlets du François et de la Baignoire de Joséphine, apéritif.'],
                ['name' => 'Grande balade', 'price' => '50 €', 'text' => 'Découverte des fonds blancs du François (Baignoire de Joséphine) et du Robert (îlet aux iguanes), apéritif.'],
            ],
            'highlights' => ['Rendez-vous 9 h à la marina du François', 'Baignade aux fonds blancs', 'Apéritif en mer', 'Idéal pour une première découverte'],
            'prices' => [
                ['label' => 'Petite balade (par personne)', 'price' => '38 €'],
                ['label' => 'Grande balade (par personne)', 'price' => '50 €'],
                ['label' => 'Tarif enfant', 'price' => '[À compléter]'],
            ],
            'return' => '[À compléter : heure de retour]',
        ],
        'lune-de-miel' => [
            'name' => 'Journée VIP Lune de miel',
            'kicker' => 'En amoureux, en yole privatisée',
            'summary' => 'Yole privatisée, espace réservé sur l’îlet, langouste de 500 g et bouteille de champagne : la journée pensée pour deux.',
            'intro' => 'Une journée rien que pour vous deux : départ en yole privatisée à la découverte des îlets du François et du Robert, baptême du rhum à la Baignoire de Joséphine, puis un espace réservé sur l’îlet Oscar, une langouste grillée et une bouteille de champagne au goûter.',
            'duration' => 'Journée · 9 h – 16 h',
            'image' => 'photos/ilet-oscar',
            'image_alt' => 'L’îlet Oscar, verdoyant, posé sur une mer turquoise',
            'from_price' => null,
            'programme' => false,
            'steps' => [
                ['time' => '9 h', 'title' => 'Départ en yole privatisée', 'text' => 'Découverte des îlets du François et du Robert (îlet Chancel, aux iguanes). Décollage : jus, planteur, ti-punch, verrine de ti-nain, salade de fruits frais.'],
                ['time' => 'Matinée', 'title' => 'Baignoire de Joséphine', 'text' => 'Bain, baptême du rhum, accras de morue et apéritif au milieu de la mer.'],
                ['time' => '13 h', 'title' => 'Déjeuner sur l’îlet Oscar', 'text' => 'Espace réservé VIP. Langouste grillée (500 g) sur lit de crudités, sauce créole, colombo de poulet ou poisson frit mariné, riz safrané, gratin, glace locale, café, thé.'],
                ['time' => 'Après-midi', 'title' => 'Goûter', 'text' => 'Gâteau local et une bouteille de champagne.'],
                ['time' => '16 h', 'title' => 'Retour à la marina', 'text' => ''],
            ],
            'highlights' => ['Yole privatisée', 'Espace réservé sur l’îlet Oscar', 'Langouste grillée 500 g', 'Bouteille de champagne'],
            'prices' => [
                ['label' => 'Par couple', 'price' => '[À compléter] (380 € en 2021)'],
            ],
            'note' => '[À compléter : formule toujours proposée ? Elle figurait sur l’ancien site en 2021.]',
        ],
    ],

    'extras' => 'Sur demande et sur réservation : champagne, gâteaux d’anniversaire, kayak, cours de zumba ou de fitness, initiation à la yole, karaoké, DJ, massage. [À compléter : tarifs des options en vigueur]',

    'why' => [
        ['icon' => 'bi-award', 'title' => 'Le pionnier des îlets', 'text' => 'Le Roi Mongin a été le premier à emmener les visiteurs à la Baignoire de Joséphine pour le baptême du rhum. Une histoire de famille depuis plus de 40 ans.'],
        ['icon' => 'bi-emoji-smile', 'title' => 'Un accueil exceptionnel', 'text' => 'Margaret et son équipe vous reçoivent comme à la maison, avec une ambiance festive du départ jusqu’au retour.'],
        ['icon' => 'bi-egg-fried', 'title' => 'Un vrai repas antillais', 'text' => 'Déjeuner créole préparé sur l’îlet, sans oublier le traditionnel chocolat et pain au beurre du goûter.'],
        ['icon' => 'bi-music-note-beamed', 'title' => 'Convivialité', 'text' => 'Baptême du rhum dans la Baignoire de Joséphine, démonstration de paréo, initiation au zouk.'],
        ['icon' => 'bi-compass', 'title' => 'Découvertes', 'text' => 'Visite commentée des îlets du François, baignade aux fonds blancs, anecdotes et histoires de l’îlet Oscar.'],
    ],

    'faq' => [
        ['q' => 'Où se trouve le point de rendez-vous ?', 'a' => 'Au port de pêche (ponton D6) de la presqu’île du François, à la marina du François. Le rendez-vous est fixé à 9 h pour les journées et les balades. Une carte est disponible plus bas sur cette page.'],
        ['q' => 'Que faut-il apporter ?', 'a' => 'Maillot de bain, serviette, chapeau ou casquette, lunettes de soleil et une crème solaire respectueuse des récifs. Prévoyez des affaires que vous ne craignez pas de mouiller : on descend du bateau directement dans l’eau à la Baignoire de Joséphine. Les boissons et le repas sont compris dans les journées.'],
        ['q' => 'Les enfants peuvent-ils venir ?', 'a' => 'Oui, la journée est familiale. Des tarifs enfants existent dès 3 ans (selon la formule). L’Initiation Yole est accessible à partir de 12 ans. [À compléter : conditions pour les moins de 3 ans, gilets de sauvetage enfants.]'],
        ['q' => 'Quelle est la profondeur à la Baignoire de Joséphine ?', 'a' => 'L’eau y a une profondeur de 50 cm à 1,50 m environ, sur un fond de sable blanc : on a le plus souvent pied, avec de l’eau à la taille.'],
        ['q' => 'Et si la météo n’est pas au rendez-vous ?', 'a' => 'Les sorties en mer dépendent de la météo et de l’état de la mer. En cas de conditions défavorables, l’équipe vous contacte pour reporter votre journée. [À compléter : politique de report / remboursement.]'],
        ['q' => 'Quand partir ?', 'a' => 'Les excursions sont proposées toute l’année. La saison sèche (le « carême », de décembre à mai) offre le plus de soleil ; pendant l’hivernage (juin à novembre), la mer reste chaude et les averses sont souvent brèves. [À compléter : jours de sortie selon la saison.]'],
        ['q' => 'Comment réserver et payer ?', 'a' => 'Envoyez une demande par le formulaire de réservation, par WhatsApp ou par téléphone au 0696 35 03 52. Paiement par carte bancaire, espèces ou virement. [À compléter : acompte demandé à la réservation ?]'],
        ['q' => 'Proposez-vous des sorties pour les groupes et les événements ?', 'a' => 'Oui : un tarif de groupe existe à partir de 25 adultes sur La Kréole, et de nombreuses options sont possibles (anniversaire, DJ, karaoké, massage…). Contactez-nous pour un devis.'],
        ['q' => 'Les personnes à mobilité réduite peuvent-elles participer ?', 'a' => '[À compléter : accessibilité du bateau et de l’îlet.]'],
        ['q' => 'Quelles langues parle l’équipe ?', 'a' => 'Français et anglais.'],
    ],

    'gallery' => [
        ['file' => 'photos/grand-groupe-baignoire', 'alt' => 'Grand groupe de passagers dans l’eau à la Baignoire de Joséphine', 'cat' => 'mer', 'w' => 1800, 'h' => 1013],
        ['file' => 'photos/ilet-oscar', 'alt' => 'L’îlet Oscar vu depuis la mer', 'cat' => 'ilet', 'w' => 1800, 'h' => 1350],
        ['file' => 'photos/service-baignoire', 'alt' => 'Un membre de l’équipe apporte les boissons sur une bouée au milieu de la mer', 'cat' => 'mer', 'w' => 1036, 'h' => 1210],
        ['file' => 'photos/cuisine-creole', 'alt' => 'Cuisson des accras sur l’îlet Oscar', 'cat' => 'saveurs', 'w' => 1800, 'h' => 1201],
        ['file' => 'photos/baignoire-turquoise', 'alt' => 'Baigneurs dans l’eau turquoise des fonds blancs', 'cat' => 'mer', 'w' => 1800, 'h' => 1013],
        ['file' => 'photos/demonstration-pareo', 'alt' => 'Démonstration de paréo et danse sous le carbet de l’îlet', 'cat' => 'ambiance', 'w' => 1800, 'h' => 1350],
        ['file' => 'photos/embarquement-margaret', 'alt' => 'Embarquement à bord du bateau Margaret', 'cat' => 'ambiance', 'w' => 1800, 'h' => 1201],
        ['file' => 'photos/zouk-dans-l-eau', 'alt' => 'Initiation au zouk les pieds dans l’eau', 'cat' => 'ambiance', 'w' => 1440, 'h' => 1440],
        ['file' => 'photos/accras-ilet', 'alt' => 'Assiette d’accras et de crudités face à la mer', 'cat' => 'saveurs', 'w' => 1800, 'h' => 1350],
        ['file' => 'photos/arrivee-ponton', 'alt' => 'Arrivée des passagers sur le ponton de l’îlet Oscar', 'cat' => 'ilet', 'w' => 1800, 'h' => 1201],
        ['file' => 'photos/ti-punch-baignoire', 'alt' => 'Service du ti-punch au milieu de la Baignoire de Joséphine', 'cat' => 'mer', 'w' => 960, 'h' => 720],
        ['file' => 'photos/pareo-plage', 'alt' => 'Paréo noué sous les cocotiers de la plage', 'cat' => 'ilet', 'w' => 768, 'h' => 768],
        ['file' => 'photos/bateau-mongin', 'alt' => 'La proue du bateau Margaret Mongin à quai', 'cat' => 'ambiance', 'w' => 540, 'h' => 960],
        ['file' => 'photos/dejeuner-creole', 'alt' => 'Assiette du déjeuner créole servie sur l’îlet', 'cat' => 'saveurs', 'w' => 540, 'h' => 960],
        ['file' => 'photos/bapteme-rhum-groupe', 'alt' => 'Groupe trinquant lors du baptême du rhum dans l’eau', 'cat' => 'mer', 'w' => 960, 'h' => 540],
        ['file' => 'photos/ambiance-ilet', 'alt' => 'Ambiance dansante sous le carbet de l’îlet', 'cat' => 'ambiance', 'w' => 1800, 'h' => 1201],
        ['file' => 'photos/ponton-ilet', 'alt' => 'Le ponton couvert de l’îlet Oscar', 'cat' => 'ilet', 'w' => 528, 'h' => 960],
        ['file' => 'photos/groupe-fonds-blancs', 'alt' => 'Groupe de baigneurs bras levés sur les fonds blancs', 'cat' => 'mer', 'w' => 960, 'h' => 540],
        ['file' => 'photos/animation-bateau', 'alt' => 'Animation au micro à bord du bateau', 'cat' => 'ambiance', 'w' => 540, 'h' => 960],
        ['file' => 'photos/yole-ronde', 'alt' => 'Yole ronde sous voile sur les fonds blancs', 'cat' => 'mer', 'w' => 1280, 'h' => 720],
        ['file' => 'photos/ilet-oscar-rivage', 'alt' => 'Le rivage boisé de l’îlet Oscar', 'cat' => 'ilet', 'w' => 960, 'h' => 540],
    ],

    'gallery_categories' => [
        'mer' => 'La Baignoire de Joséphine',
        'ilet' => 'L’îlet Oscar',
        'ambiance' => 'Ambiance',
        'saveurs' => 'Saveurs créoles',
    ],

    // Anciennes URL WordPress (indexées par Google) → nouvelles pages, en 301
    'legacy_redirects' => [
        'nos-prestations-excursions-baignoire-de-josephine-journee-ilet-oscar' => 'excursions',
        'la-kreole' => 'excursions/la-kreole',
        'l0tantik' => 'excursions/l-otantik',
        'initiation-yole-2' => 'excursions/initiation-yole',
        'balade-demi-journee' => 'excursions/balade-demi-journee',
        'prestation/journee-detente-ilet-oscar' => 'excursions/la-kreole',
        'prestation/journee-detente-ilet-oscar-2' => 'excursions/balade-demi-journee',
        'prestation/journee-menue-otantik' => 'excursions/l-otantik',
        'prestation/journee-menu-vip' => 'excursions',
        'prestation/journee-vip-lune-de-miel' => 'excursions/lune-de-miel',
        'prestation/journee-initation-yole' => 'excursions/initiation-yole',
        'histoire-du-roi-mongin-et-la-baignoire-de-josephine' => 'notre-histoire',
        'lexperience-inoubliable-du-roi-mongin' => 'notre-histoire',
        'la-baignoire-de-josephine' => 'notre-histoire',
        'excursion-ilet-oscar-martinique-roi-mongin' => 'notre-histoire',
        'blog/les-ilets-proteges-du-francois' => 'notre-histoire',
        'reservation-journee-baignoire-de-josephine' => 'reservation',
        'contact' => 'reservation',
        'galerie' => 'galerie',
        'mentions-legales' => 'mentions-legales',
        'politique-de-confidentialite' => 'politique-de-confidentialite',
    ],
];
