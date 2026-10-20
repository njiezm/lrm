@php $c = config('site.contact'); @endphp
<section class="section-sm">
    <div class="container">
        <div class="cta-band reveal">
            <div class="cta-bg"><x-photo src="photos/ti-punch-baignoire" alt="" sizes="(min-width: 1200px) 1140px, 100vw" /></div>
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <h2 class="display-6 fw-800 mb-2">{{ $title ?? 'Prêt pour le baptême du rhum ?' }}</h2>
                    <p class="mb-0 fs-5">{{ $text ?? 'Indiquez votre date et le nombre de personnes : Margaret et son équipe vous confirment la disponibilité rapidement.' }}</p>
                </div>
                <div class="col-lg-5 d-flex flex-wrap gap-2 justify-content-lg-end">
                    <a href="{{ route('reservation') }}{{ isset($slug) ? '?excursion='.$slug : '' }}" class="btn btn-sun btn-lg">Demander une réservation</a>
                    <a href="https://wa.me/{{ $c['whatsapp'] }}" target="_blank" rel="noopener" class="btn btn-glass btn-lg"><i class="bi bi-whatsapp" aria-hidden="true"></i> WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</section>
