<article class="excursion-card position-relative">
    <div class="media">
        <x-photo :src="$e['image']" :alt="$e['image_alt']" sizes="(min-width: 1200px) 380px, (min-width: 768px) 50vw, 100vw" />
        <span class="kicker">{{ $e['kicker'] }}</span>
        <span class="price-badge">@if ($e['from_price'])<small>dès</small> {{ $e['from_price'] }} €@else Sur demande @endif</span>
    </div>
    <div class="body">
        <p class="meta mb-1"><i class="bi bi-clock me-1" aria-hidden="true"></i>{{ $e['duration'] }}</p>
        <h3 class="h4 mb-2"><a href="{{ route('excursions.show', $slug) }}">{{ $e['name'] }}</a></h3>
        <p class="text-muted mb-3">{{ $e['summary'] }}</p>
        <ul class="check-list small mb-4">
            @foreach (array_slice($e['highlights'], 0, 3) as $h)<li>{{ $h }}</li>@endforeach
        </ul>
        <div class="actions">
            <span class="link-arrow text-ocean">Voir le programme <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
        </div>
    </div>
</article>
