@php
    $siteName = config('site.name');
    $pageTitle = html_entity_decode(trim($__env->yieldContent('title')), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $fullTitle = $pageTitle ? "{$pageTitle} | {$siteName}" : "{$siteName} — Excursion Baignoire de Joséphine & îlet Oscar, Le François";
    $metaDescription = html_entity_decode(trim($__env->yieldContent('description')), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?: config('site.description');
    $ogImage = asset(trim($__env->yieldContent('og_image')) ?: 'images/og-image.jpg');
    $c = config('site.contact');
    $bookSlug = trim($__env->yieldContent('book_slug'));
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    @if (config('site.noindex'))<meta name="robots" content="noindex, nofollow">@endif
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="theme-color" content="#062b4d">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/brand/favicon-32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/brand/favicon-180.png') }}">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            '@id' => url('/').'#business',
            'name' => $siteName,
            'description' => config('site.description'),
            'url' => url('/'),
            'logo' => asset('images/brand/favicon-512.png'),
            'image' => asset('images/og-image.jpg'),
            'telephone' => $c['phone_link'],
            'email' => $c['email'],
            'priceRange' => '38 € – 95 €',
            'paymentAccepted' => implode(', ', $c['payments']),
            'knowsLanguage' => ['fr', 'en'],
            'openingHoursSpecification' => [[
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'opens' => '08:00', 'closes' => '18:00',
            ]],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $c['street'],
                'postalCode' => $c['postcode'],
                'addressLocality' => $c['city'],
                'addressRegion' => $c['region'],
                'addressCountry' => 'MQ',
            ],
            'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $c['geo']['lat'], 'longitude' => $c['geo']['lng']],
            'sameAs' => [$c['facebook'], $c['instagram']],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @stack('head')

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="@yield('body_class')">
    <a href="#contenu" class="skip-link">Aller au contenu</a>

    @include('partials.header')

    <main id="contenu">
        @yield('content')
    </main>

    @include('partials.footer')

    <a class="wa-float" href="https://wa.me/{{ $c['whatsapp'] }}?text={{ rawurlencode('Bonjour Le Roi Mongin, je souhaite des informations sur vos excursions.') }}"
       target="_blank" rel="noopener" aria-label="Écrire au Roi Mongin sur WhatsApp">
        <i class="bi bi-whatsapp" aria-hidden="true"></i>
    </a>

    @unless (request()->routeIs('reservation'))
        <nav class="mobile-book-bar d-lg-none" aria-label="Réservation rapide">
            <a href="tel:{{ $c['phone_link'] }}" class="btn btn-outline-primary btn-call" aria-label="Appeler le {{ $c['phone'] }}"><i class="bi bi-telephone-fill" aria-hidden="true"></i></a>
            <a href="{{ route('reservation') }}{{ $bookSlug ? '?excursion='.$bookSlug : '' }}" class="btn btn-sun"><i class="bi bi-calendar2-check" aria-hidden="true"></i> Réserver ma sortie</a>
        </nav>
    @endunless

    @stack('scripts')
</body>
</html>
