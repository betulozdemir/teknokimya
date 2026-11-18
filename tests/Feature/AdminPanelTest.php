<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_admin_login_when_visiting_admin_dashboard(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_login_page_is_accessible(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Hoş Geldiniz');
    }

    public function test_admin_can_login_with_valid_credentials_and_view_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@teknokimya.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/admin/login', [
            'email' => 'admin@teknokimya.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_authenticated_admin_can_create_slider_service_and_product(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.sliders.store'), [
                'subtitle' => 'Welcome',
                'title' => 'Reliable',
                'highlight_text' => 'Laboratory',
                'description' => 'High precision lab',
                'button_text' => 'Explore',
                'button_url' => '#contact',
                'background_image' => 'assets/images/bg/banner-bg-09.png',
                'sort_order' => 1,
                'is_active' => 1,
            ])
            ->assertRedirect(route('admin.sliders.index'));

        $this->assertDatabaseHas((new Slider)->getTable(), [
            'title' => 'Reliable',
            'highlight_text' => 'Laboratory',
        ]);

        $this->actingAs($user)
            ->post(route('admin.services.store'), [
                'title' => 'Chemical Testing',
                'description' => 'Industrial analysis',
                'image' => 'assets/images/services/services-thumb-17.png',
                'url' => '#services',
                'sort_order' => 1,
                'is_active' => 1,
            ])
            ->assertRedirect(route('admin.services.index'));

        $this->assertDatabaseHas((new Service)->getTable(), [
            'title' => 'Chemical Testing',
        ]);

        $this->actingAs($user)
            ->post(route('admin.products.store'), [
                'title' => 'Spectrometer X1',
                'category' => 'Laboratory',
                'description' => 'Precision optical spectrometer',
                'image' => 'assets/images/portfolio/portfolio-thumb-21.png',
                'is_featured' => 1,
                'sort_order' => 1,
                'is_active' => 1,
            ])
            ->assertRedirect(route('admin.products.index'));

        $this->assertDatabaseHas((new Product)->getTable(), [
            'title' => 'Spectrometer X1',
            'is_featured' => 1,
        ]);
    }

    public function test_authenticated_admin_can_upload_photo_for_slider(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $slider = Slider::factory()->create();

        $file = UploadedFile::fake()->image('new-banner.jpg', 1200, 600);

        $this->actingAs($user)
            ->put(route('admin.sliders.update', $slider), [
                'subtitle' => 'Updated Subtitle',
                'title' => 'Updated Title',
                'highlight_text' => 'Laboratory',
                'description' => 'Updated description',
                'button_text' => 'Explore',
                'button_url' => '#contact',
                'background_image_file' => $file,
                'sort_order' => 1,
                'is_active' => 1,
            ])
            ->assertRedirect(route('admin.sliders.index'));

        $slider->refresh();
        $this->assertStringStartsWith('storage/uploads/sliders/', $slider->background_image);
        Storage::disk('public')->assertExists(str_replace('storage/', '', $slider->background_image));
    }

    public function test_multilingual_translations_and_locale_switcher_work_on_homepage(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.sliders.store'), [
                'subtitle' => 'Hoş Geldiniz',
                'title' => 'Tekno Kimya',
                'highlight_text' => 'Kaplama Kimyasalları',
                'background_image' => 'assets/images/bg/banner-bg-09.png',
                'sort_order' => 1,
                'is_active' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Tekno Chemistry',
                        'highlight_text' => 'Coating Chemicals',
                    ],
                    'ar' => [
                        'title' => 'تكنو كيميا',
                        'highlight_text' => 'كيماويات الطلاء',
                    ],
                ],
            ])
            ->assertRedirect(route('admin.sliders.index'));

        $this->get(route('locale.switch', 'en'))->assertRedirect();
        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee('Tekno Chemistry')
            ->assertSee('Coating Chemicals');

        $this->get(route('locale.switch', 'ar'))->assertRedirect();
        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee('تكنو كيميا')
            ->assertSee('كيماويات الطلاء')
            ->assertSee('dir="rtl"', false);
    }
}
