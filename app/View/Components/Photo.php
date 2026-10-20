<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Image WebP responsive : <x-photo src="photos/ilet-oscar" alt="…" />
 * Utilise la version « -sm » (800 px) et la version pleine taille en srcset,
 * avec largeur / hauteur réelles (anti-CLS) et lazy loading par défaut.
 */
class Photo extends Component
{
    public array $full;

    public array $small;

    /** Cache des dimensions mesurées (distinct de la propriété $sizes de l'attribut HTML). */
    private static array $measured = [];

    public function __construct(
        public string $src,
        public string $alt = '',
        public string $sizes = '100vw',
        public bool $eager = false,
    ) {
        $this->full = self::measure("images/{$src}.webp");
        $this->small = self::measure("images/{$src}-sm.webp");
    }

    private static function measure(string $path): array
    {
        if (! isset(self::$measured[$path])) {
            $info = @getimagesize(public_path($path));
            self::$measured[$path] = ['url' => asset($path), 'w' => $info[0] ?? 1200, 'h' => $info[1] ?? 800];
        }

        return self::$measured[$path];
    }

    public function render(): View
    {
        return view('components.photo');
    }
}
