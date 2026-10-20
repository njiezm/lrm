# Le Roi Mongin — maquette du futur site

Maquette fonctionnelle réalisée par **NJIEZM.FR** (N'jie ZAMON, Le Robert — www.njiezm.fr) pour **Le Roi Mongin**,
excursions en bateau à la Baignoire de Joséphine et sur l'îlet Oscar (Le François, Martinique) — SAS EGE-MM, SIREN 879 662 252.

Stack : Laravel 13 + Blade, Bootstrap 5 (Sass) + bootstrap-icons via Vite, polices auto-hébergées (DM Sans, Bricolage Grotesque — @fontsource), SQLite.

## Lancer le projet

```powershell
$env:Path="C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64;C:\laragon\bin\composer;C:\laragon\bin\nodejs\node-v22;$env:Path"
cd C:\laragon\www\prospects\projets\le-roi-mongin
composer install          # déjà fait
npm install               # déjà fait
php artisan migrate --force
npm run build
php artisan serve --port=8101   # http://127.0.0.1:8101
```

Avec Laragon : http://le-roi-mongin.test (APP_URL dans `.env`).
Tests : `php artisan test`.

## Pages

| URL | Contenu |
|---|---|
| `/` | Accueil : hero, réservation rapide, excursions phares, journée type, pourquoi nous, histoire, photos, infos clés |
| `/excursions` | Toutes les excursions + groupes + ce qui est inclus |
| `/excursions/{slug}` | La Kréole, L'Otantik, Initiation Yole, Balade demi-journée, Lune de miel : programme, menu, tarifs, réservation |
| `/notre-histoire` | Albert puis Margaret Mongin, Baignoire de Joséphine, îlet Oscar (site protégé) |
| `/galerie` | 21 photos filtrables + visionneuse (clavier, balayage) |
| `/infos-pratiques` | Quoi apporter, FAQ, carte OpenStreetMap du point de rendez-vous |
| `/reservation` | Formulaire de demande (date, adultes/enfants, excursion) + envoi WhatsApp pré-rempli |
| `/mentions-legales`, `/politique-de-confidentialite` | Pages légales |
| `/sitemap.xml`, `/robots.txt` | SEO (URL générées depuis APP_URL) |

Les anciennes URL WordPress de leroimongin.com (`/la-kreole/`, `/histoire-du-roi-mongin-…`, `/prestation/…`) sont redirigées en 301.

## Où modifier quoi

- **Tous les contenus** (coordonnées, excursions, tarifs, programme, menu, FAQ, galerie, redirections) : `config/site.php`.
- Mise en page : `resources/views/` (`layouts/app.blade.php`, `partials/`, `pages/`, `excursions/`).
- Styles : `resources/scss/_variables.scss` (couleurs du logo) et `resources/scss/app.scss`.
- JS (galerie, formulaire, WhatsApp) : `resources/js/app.js`.
- Images : `public/images/photos` (photos du Roi Mongin), `public/images/illustrations` (photos libres, voir `docs/CREDITS.md`), `public/images/brand` (logo, favicons). Chaque image existe en `.webp` (1800 px max) et `-sm.webp` (800 px), utilisées via le composant `<x-photo>`.
- Demandes de réservation : table `booking_requests` (SQLite) + e-mail (en log : `storage/logs/laravel.log`, destinataire `BOOKING_MAIL_TO` ou roimongin@gmail.com). Anti-spam : champ piège, délai minimal de 3 s, 5 envois / 10 min par IP.

## Éléments [À compléter]

- Tarifs de la saison en cours (ceux affichés sont ceux de l'ancien site, saison 2023).
- Balade demi-journée : heure de retour et tarifs enfants.
- Journée VIP Lune de miel : formule toujours proposée ? tarif actuel (380 €/couple en 2021).
- Tarifs des options (langouste, champagne, gâteau, DJ, massage…).
- Enfants de moins de 3 ans, gilets enfants ; accessibilité PMR.
- Politique de report / remboursement en cas de mauvaise météo, acompte, conditions générales de vente.
- Jours de sortie selon la saison.
- Stationnement et repère visuel au port de pêche.
- Photo et mot de Margaret, photos récentes HD (bateau, équipe), éventuelle vidéo.
- Avis clients : à intégrer uniquement avec accord (aucun avis n'est affiché dans la maquette).
- Mentions légales : capital social, n° TVA, hébergeur ; durée de conservation des données à valider.
