<?php

namespace Tests\Feature;

use App\Mail\NewEnquiry;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
        $this->withoutVite();
    }

    protected function admin(): User
    {
        $user = User::factory()->create();
        $user->forceFill(['is_admin' => true])->save();

        return $user;
    }

    public function test_home_page_shows_the_3hds_site(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Software your business can run on.')
            ->assertSee('Ashiq Hussein Maither')
            ->assertSee('Zareef Hussain')
            ->assertSee('£5,000')
            ->assertDontSee('iWebCircle');
    }

    public function test_legal_pages_load(): void
    {
        $this->get('/privacy')->assertOk()->assertSee('Privacy policy');
        $this->get('/terms')->assertOk()->assertSee('Terms of service');
        $this->get('/risk-disclosure')->assertOk()->assertSee('Trading software risk disclosure');
    }

    public function test_sitemap_and_robots(): void
    {
        $this->get('/sitemap.xml')->assertOk()->assertSee('<urlset', false);
        $this->get('/robots.txt')->assertOk()->assertSee('Disallow: /admin');
    }

    public function test_unknown_page_shows_the_3hds_404(): void
    {
        $this->get('/no-such-page')->assertNotFound()->assertSee("This page doesn't exist.", false);
    }

    public function test_contact_form_saves_and_emails_the_enquiry(): void
    {
        Mail::fake();
        Setting::set('site_email', 'team@example.com');

        $this->post('/contact', [
            'name' => 'Sara Khan',
            'email' => 'sara@example.com',
            'need' => 'Mobile app',
            'message' => 'We need a delivery app.',
        ])->assertRedirect(route('home').'#contact');

        $this->assertDatabaseHas('contacts', ['email' => 'sara@example.com', 'subject' => 'Mobile app']);
        Mail::assertSent(NewEnquiry::class, fn ($mail) => $mail->hasTo('team@example.com'));
    }

    public function test_contact_form_rejects_missing_fields(): void
    {
        $this->post('/contact', ['name' => '', 'email' => 'not-an-email', 'need' => 'Mobile app', 'message' => ''])
            ->assertRedirect(route('home').'#contact')
            ->assertSessionHasErrors(['name', 'email', 'message']);

        $this->assertSame(0, Contact::count());
    }

    public function test_contact_form_honeypot_blocks_bots(): void
    {
        $this->post('/contact', [
            'name' => 'Bot', 'email' => 'bot@example.com', 'need' => 'Mobile app',
            'message' => 'Spam', 'website' => 'http://spam.example',
        ])->assertRedirect(route('home').'#contact');

        $this->assertSame(0, Contact::count());
    }

    public function test_public_registration_is_switched_off(): void
    {
        $this->get('/register')->assertNotFound();
    }

    public function test_admin_pages_need_an_admin_login(): void
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');

        $this->actingAs(User::factory()->create())
            ->get('/admin/dashboard')->assertForbidden();

        $this->actingAs($this->admin())
            ->get('/admin/dashboard')->assertOk();
    }

    public function test_admin_screens_load(): void
    {
        $admin = $this->admin();

        foreach (['/admin/settings/general', '/admin/settings/pricing', '/admin/settings/offices',
                  '/admin/team', '/admin/team/create', '/admin/products', '/admin/testimonials',
                  '/admin/posts', '/admin/contacts'] as $url) {
            $this->actingAs($admin)->get($url)->assertOk();
        }
    }

    public function test_admin_can_change_prices(): void
    {
        $data = [];
        foreach (array_keys(config('site.regions')) as $region) {
            foreach (config('site.price_items') as $item => $details) {
                $data["price_{$region}_{$item}"] = $details['defaults'][$region];
            }
        }
        $data['price_uk_business'] = 7500;

        $this->actingAs($this->admin())
            ->put('/admin/settings/pricing', $data)
            ->assertRedirect(route('admin.settings.pricing'));

        $this->get('/')->assertSee('£7,500');
    }

    public function test_admin_can_edit_contact_details_shown_on_the_site(): void
    {
        $admin = $this->admin();
        $data = [];
        foreach (array_keys(config('site.regions')) as $region) {
            foreach (['city', 'address', 'phone', 'whatsapp', 'email'] as $field) {
                $data["office_{$region}_{$field}"] = '';
            }
        }
        $data['office_au_phone'] = '+61 400 000 000';

        $this->actingAs($admin)->put('/admin/settings/offices', $data)->assertRedirect(route('admin.settings.offices'));
        $this->get('/')->assertSee('+61 400 000 000');
    }

    public function test_create_admin_command(): void
    {
        $this->artisan('app:create-admin', ['email' => 'ali@example.com', '--name' => 'Ali'])
            ->expectsQuestion('Password (at least 12 characters)', 'a-long-password-123')
            ->expectsQuestion('Type the password again', 'a-long-password-123')
            ->assertExitCode(0);

        $this->assertTrue(User::where('email', 'ali@example.com')->first()->is_admin);
    }
}
