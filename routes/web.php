<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/excursions', [PageController::class, 'excursions'])->name('excursions.index');
Route::get('/excursions/{slug}', [PageController::class, 'excursion'])->name('excursions.show');
Route::get('/notre-histoire', [PageController::class, 'history'])->name('histoire');
Route::get('/galerie', [PageController::class, 'gallery'])->name('galerie');
Route::get('/infos-pratiques', [PageController::class, 'infos'])->name('infos');

Route::get('/reservation', [PageController::class, 'booking'])->name('reservation');
Route::post('/reservation', [BookingController::class, 'store'])
    ->middleware('throttle:5,10')->name('reservation.store');

Route::get('/mentions-legales', [PageController::class, 'legal'])->name('legal');
Route::get('/politique-de-confidentialite', [PageController::class, 'privacy'])->name('privacy');
Route::get('/sitemap.xml', [PageController::class, 'sitemapXml'])->name('sitemap.xml');
Route::get('/robots.txt', [PageController::class, 'robots'])->name('robots');

// Anciennes URL du site WordPress → nouvelles pages (301, conservation du référencement)
foreach (config('site.legacy_redirects') as $from => $to) {
    if ($from !== $to) {
        Route::permanentRedirect("/{$from}", "/{$to}");
    }
}
