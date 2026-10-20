<?php

namespace Tests\Feature;

use App\Mail\BookingRequestReceived;
use App\Models\BookingRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    public static function pages(): array
    {
        return [
            ['/'], ['/excursions'], ['/excursions/la-kreole'], ['/excursions/l-otantik'],
            ['/excursions/initiation-yole'], ['/excursions/balade-demi-journee'], ['/excursions/lune-de-miel'],
            ['/notre-histoire'], ['/galerie'], ['/infos-pratiques'], ['/reservation'],
            ['/mentions-legales'], ['/politique-de-confidentialite'], ['/sitemap.xml'], ['/robots.txt'],
        ];
    }

    #[DataProvider('pages')]
    public function test_public_pages_render(string $uri): void
    {
        $this->get($uri)->assertOk();
    }

    public function test_home_shows_real_content_and_whatsapp(): void
    {
        $this->get('/')
            ->assertSee('Baignoire de Joséphine')
            ->assertSee('https://wa.me/596696350352', false)
            ->assertSee('Maquette réalisée par', false)
            ->assertSee('application/ld+json', false);
    }

    public function test_unknown_excursion_is_404(): void
    {
        $this->get('/excursions/inconnue')->assertNotFound();
    }

    public function test_sitemap_uses_app_url(): void
    {
        config(['app.url' => 'http://le-roi-mongin.test']);
        \Illuminate\Support\Facades\URL::forceRootUrl('http://le-roi-mongin.test');

        $this->get('/sitemap.xml')->assertOk()
            ->assertSee('http://le-roi-mongin.test/excursions/la-kreole', false);
    }

    public function test_legacy_urls_are_permanently_redirected(): void
    {
        $this->get('/la-kreole')->assertStatus(301)->assertRedirect('/excursions/la-kreole');
        $this->get('/histoire-du-roi-mongin-et-la-baignoire-de-josephine')->assertRedirect('/notre-histoire');
        $this->get('/prestation/journee-vip-lune-de-miel')->assertRedirect('/excursions/lune-de-miel');
    }

    private function guard(int $secondsAgo = 10): array
    {
        return ['_started' => Crypt::encryptString((string) (now()->timestamp - $secondsAgo)), 'website' => ''];
    }

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'excursion' => 'la-kreole', 'date' => now()->addDays(10)->toDateString(),
            'adults' => 2, 'children' => 1, 'children_ages' => '8 ans',
            'name' => 'Jeanne Test', 'email' => 'jeanne@example.com', 'phone' => '0696 00 00 00',
            'message' => 'Anniversaire', 'consent' => '1',
        ], $overrides);
    }

    public function test_booking_request_is_stored_and_mailed(): void
    {
        Mail::fake();

        $this->post('/reservation', $this->guard() + $this->payload())
            ->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseHas('booking_requests', ['email' => 'jeanne@example.com', 'excursion' => 'la-kreole', 'adults' => 2, 'children' => 1]);
        Mail::assertSent(BookingRequestReceived::class);
    }

    public function test_booking_rejects_bots_and_too_fast_submissions(): void
    {
        Mail::fake();

        $this->post('/reservation', ['website' => 'spam'] + $this->guard() + $this->payload())->assertSessionHasErrors('form');
        $this->post('/reservation', $this->guard(0) + $this->payload())->assertSessionHasErrors('form');

        $this->assertSame(0, BookingRequest::count());
        Mail::assertNothingSent();
    }

    public function test_booking_validation(): void
    {
        $this->post('/reservation', $this->guard() + $this->payload([
            'date' => now()->subDay()->toDateString(), 'adults' => 0, 'excursion' => 'inexistante', 'consent' => null,
        ]))->assertSessionHasErrors(['date', 'adults', 'excursion', 'consent']);
    }

    public function test_booking_is_throttled(): void
    {
        Mail::fake();
        for ($i = 0; $i < 5; $i++) {
            $this->post('/reservation', $this->guard() + $this->payload());
        }
        $this->post('/reservation', $this->guard() + $this->payload())->assertStatus(429);
    }

    public function test_demo_noindex_ferme_le_site_aux_moteurs(): void
    {
        $this->get('/robots.txt')->assertSee("Disallow: \n", false);
        $this->get('/')->assertDontSee('noindex', false);

        config(['site.noindex' => true]);
        $this->get('/robots.txt')->assertSee('Disallow: /', false);
        $this->get('/')->assertSee('<meta name="robots" content="noindex, nofollow">', false);
    }
}
