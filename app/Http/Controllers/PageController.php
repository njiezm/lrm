<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', ['excursions' => config('site.excursions')]);
    }

    public function excursions(): View
    {
        return view('excursions.index', ['excursions' => config('site.excursions')]);
    }

    public function excursion(string $slug): View
    {
        $excursions = config('site.excursions');
        abort_unless(isset($excursions[$slug]), 404);

        return view('excursions.show', [
            'slug' => $slug,
            'excursion' => $excursions[$slug],
            'others' => collect($excursions)->except($slug),
        ]);
    }

    public function history(): View
    {
        return view('pages.histoire');
    }

    public function gallery(): View
    {
        return view('pages.galerie');
    }

    public function infos(): View
    {
        return view('pages.infos');
    }

    public function booking(): View
    {
        return view('pages.reservation');
    }

    public function legal(): View
    {
        return view('pages.mentions-legales');
    }

    public function privacy(): View
    {
        return view('pages.confidentialite');
    }

    public function sitemapXml(): Response
    {
        $urls = collect(['home', 'excursions.index', 'histoire', 'galerie', 'infos', 'reservation', 'legal', 'privacy'])
            ->map(fn ($r) => route($r))
            ->merge(collect(array_keys(config('site.excursions')))->map(fn ($s) => route('excursions.show', $s)));

        return response()->view('sitemap-xml', ['urls' => $urls])->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        // Démo (SITE_NOINDEX=true) : tout le site est fermé aux moteurs de recherche
        $disallow = config('site.noindex') ? '/' : '';

        return response("User-agent: *\nDisallow: {$disallow}\n\nSitemap: ".route('sitemap.xml')."\n")
            ->header('Content-Type', 'text/plain');
    }
}
