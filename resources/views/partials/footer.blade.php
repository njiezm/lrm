@php $c = config('site.contact'); @endphp
<footer class="site-footer">
    <div class="wave-top bg-white" style="color:#062b4d">@include('partials.wave')</div>
    <div class="container pt-4 pb-5">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="footer-logo mb-3"><img src="{{ asset('images/brand/logo.webp') }}" alt="Le Roi Mongin" width="200" height="132" loading="lazy"></a>
                <p class="mb-3">Excursions en mer à la Baignoire de Joséphine et sur l’îlet Oscar, au François. Le pionnier du baptême du rhum depuis {{ config('site.founded_text') }}.</p>
                <div class="social d-flex gap-2">
                    <a href="{{ $c['facebook'] }}" target="_blank" rel="noopener" aria-label="Le Roi Mongin sur Facebook"><i class="bi bi-facebook" aria-hidden="true"></i></a>
                    <a href="{{ $c['instagram'] }}" target="_blank" rel="noopener" aria-label="Le Roi Mongin sur Instagram"><i class="bi bi-instagram" aria-hidden="true"></i></a>
                    <a href="https://wa.me/{{ $c['whatsapp'] }}" target="_blank" rel="noopener" aria-label="Le Roi Mongin sur WhatsApp"><i class="bi bi-whatsapp" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h2>Excursions</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    @foreach (config('site.excursions') as $slug => $e)
                        <li><a href="{{ route('excursions.show', $slug) }}">{{ $e['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6 col-lg-2">
                <h2>Le site</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    <li><a href="{{ route('histoire') }}">Notre histoire</a></li>
                    <li><a href="{{ route('galerie') }}">Galerie</a></li>
                    <li><a href="{{ route('infos') }}">Infos pratiques</a></li>
                    <li><a href="{{ route('reservation') }}">Réservation</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2>Contact</h2>
                <ul class="list-unstyled d-grid gap-2 mb-0">
                    <li><i class="bi bi-geo-alt me-2" aria-hidden="true"></i>{{ $c['meeting_point'] }}, {{ $c['postcode'] }} {{ $c['city'] }}</li>
                    <li><i class="bi bi-telephone me-2" aria-hidden="true"></i><a href="tel:{{ $c['phone_link'] }}">{{ $c['phone'] }}</a></li>
                    <li><i class="bi bi-envelope me-2" aria-hidden="true"></i><a href="mailto:{{ $c['email'] }}">{{ $c['email'] }}</a></li>
                    <li><i class="bi bi-clock me-2" aria-hidden="true"></i>{{ $c['hours'] }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container py-3 d-flex flex-column flex-md-row gap-2 justify-content-between">
            <p class="mb-0">© {{ date('Y') }} Le Roi Mongin — EGE-MM · <a href="{{ route('legal') }}">Mentions légales</a> · <a href="{{ route('privacy') }}">Confidentialité</a></p>
            <p class="mb-0">Maquette réalisée par <a href="https://www.njiezm.fr" target="_blank" rel="noopener">NJIEZM.FR</a> — www.njiezm.fr</p>
        </div>
    </div>
</footer>
