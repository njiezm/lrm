<img src="{{ $small['url'] }}"
     srcset="{{ $small['url'] }} {{ $small['w'] }}w, {{ $full['url'] }} {{ $full['w'] }}w"
     sizes="{{ $sizes }}" width="{{ $full['w'] }}" height="{{ $full['h'] }}" alt="{{ $alt }}"
     @if ($eager) fetchpriority="high" @else loading="lazy" @endif decoding="async" {{ $attributes }}>
