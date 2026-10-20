@php $c = config('site.contact'); @endphp
<header class="site-header">
    <nav class="container h-100 d-flex align-items-center justify-content-between gap-3" aria-label="Navigation principale">
        <a href="{{ route('home') }}" class="brand d-inline-flex align-items-center" aria-label="Le Roi Mongin — accueil">
            <img src="{{ asset('images/brand/logo.webp') }}" alt="Le Roi Mongin" width="200" height="132">
        </a>

        <ul class="navbar-nav flex-row d-none d-lg-flex">
            @foreach (config('site.nav') as $item)
                @php $active = request()->routeIs($item['route'], str_replace('.index', '.*', $item['route'])); @endphp
                <li class="nav-item">
                    <a class="nav-link @if ($active) active @endif" href="{{ route($item['route']) }}" @if ($active) aria-current="page" @endif>{{ $item['label'] }}</a>
                </li>
            @endforeach
        </ul>

        <div class="d-flex align-items-center gap-2">
            <a href="tel:{{ $c['phone_link'] }}" class="header-phone d-none d-xl-inline-flex align-items-center gap-2 me-2">
                <i class="bi bi-telephone-fill text-ocean" aria-hidden="true"></i> {{ $c['phone'] }}
            </a>
            <a href="{{ route('reservation') }}" class="btn btn-sun d-none d-sm-inline-flex">Réserver</a>
            <button class="btn btn-outline-primary d-lg-none px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Ouvrir le menu">
                <i class="bi bi-list fs-4" aria-hidden="true"></i>
            </button>
        </div>
    </nav>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <p class="offcanvas-title h5 mb-0" id="mobileMenuLabel">Menu</p>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fermer le menu"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <ul class="navbar-nav">
            @foreach (config('site.nav') as $item)
                <li class="nav-item"><a class="nav-link @if (request()->routeIs($item['route'], str_replace('.index', '.*', $item['route']))) active @endif" href="{{ route($item['route']) }}">{{ $item['label'] }}</a></li>
            @endforeach
            <li class="nav-item"><a class="nav-link @if (request()->routeIs('reservation')) active @endif" href="{{ route('reservation') }}">Réservation & contact</a></li>
        </ul>
        <div class="mt-auto pt-4 d-grid gap-2">
            <a href="{{ route('reservation') }}" class="btn btn-sun btn-lg">Réserver ma sortie</a>
            <a href="https://wa.me/{{ $c['whatsapp'] }}" class="btn btn-whatsapp" target="_blank" rel="noopener"><i class="bi bi-whatsapp" aria-hidden="true"></i> WhatsApp</a>
            <a href="tel:{{ $c['phone_link'] }}" class="btn btn-outline-primary"><i class="bi bi-telephone" aria-hidden="true"></i> {{ $c['phone'] }}</a>
        </div>
    </div>
</div>
