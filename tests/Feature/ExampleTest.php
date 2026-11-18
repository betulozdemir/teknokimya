<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_contact_page_loads_and_stores_message(): void
    {
        $service = Service::create([
            'title' => 'Elektrolitik Çinko Kaplama',
            'description' => 'Korozyon direnci yüksek kaplama.',
            'sort_order' => 1,
            'is_active' => true,
            'translations' => [
                'en' => [
                    'title' => 'Electrolytic Zinc Plating',
                    'description' => 'High corrosion resistance plating.',
                ],
                'ar' => [
                    'title' => 'الطلاء الكهربائي بالزنك',
                    'description' => 'طلاء مقاوم للتآكل.',
                ],
            ],
        ]);

        $product = Product::create([
            'title' => 'Alkali Çinko Parlatıcı',
            'category' => 'Yüzey Kaplama',
            'description' => 'Yüksek parlaklık sağlayan katkı.',
            'image' => 'assets/images/portfolio/portfolio-thumb-41.png',
            'sort_order' => 1,
            'is_active' => true,
            'translations' => [
                'en' => [
                    'title' => 'Alkaline Zinc Brightener',
                    'category' => 'Surface Coating',
                ],
                'ar' => [
                    'title' => 'ملمع الزنك القلوي',
                    'category' => 'طلاء الأسطح',
                ],
            ],
        ]);

        $blogPost = BlogPost::create([
            'title' => 'Yeni Nesil Bakır Kaplama Prosesleri',
            'category' => 'Kaplama',
            'author' => 'Teknokimya',
            'published_date' => 'May 20, 2024',
            'excerpt' => 'Modern yüzey işlem dünyasında bakır kaplamanın rolü.',
            'content' => '<p>Detaylı bakır kaplama analizi ve kimyasal çözümler.</p>',
            'image' => 'assets/images/blog/blog-thumb-11.png',
            'sort_order' => 1,
            'is_active' => true,
            'translations' => [
                'en' => [
                    'title' => 'Next Generation Copper Plating Processes',
                    'category' => 'Plating',
                ],
            ],
        ]);

        $this->get('/hakkimizda')->assertStatus(200);
        $this->get('/hizmetlerimiz')->assertStatus(200);
        $this->get('/hizmetlerimiz/'.$service->slug('tr'))->assertStatus(200)->assertSee('Elektrolitik Çinko Kaplama');
        $this->get('/urunler')->assertStatus(200);
        $this->get('/urunler/'.$product->slug('tr'))->assertStatus(200)->assertSee('Alkali Çinko Parlatıcı');
        $this->get('/iletisim')->assertStatus(200);
        $this->get('/about')->assertStatus(200);
        $this->get('/services')->assertStatus(200);
        $this->get('/services/'.$service->slug('en'))->assertStatus(200)->assertSee('Electrolytic Zinc Plating');
        $this->get('/products')->assertStatus(200);
        $this->get('/products/'.$product->slug('en'))->assertStatus(200)->assertSee('Alkaline Zinc Brightener');
        $this->get('/contact')->assertStatus(200);
        $this->get('/blog')->assertStatus(200)->assertSee('Yeni Nesil Bakır Kaplama Prosesleri');
        $this->get('/blog/'.$blogPost->slug('tr'))->assertStatus(200)->assertSee('Detaylı bakır kaplama');

        $this->from('/hakkimizda')
            ->get('/locale/en')
            ->assertRedirect(url('/about'));

        $this->from('/hizmetlerimiz/'.$service->slug('tr'))
            ->get('/locale/en')
            ->assertRedirect(url('/services/'.$service->slug('en')));

        $this->from('/urunler/'.$product->slug('tr'))
            ->get('/locale/en')
            ->assertRedirect(url('/products/'.$product->slug('en')));

        $response = $this->post('/iletisim', [
            'name' => 'Ahmet Yılmaz',
            'email' => 'ahmet@example.com',
            'phone' => '+90 555 111 22 33',
            'message' => 'Kaplama kimyasalları hakkında bilgi almak istiyorum.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Ahmet Yılmaz',
            'email' => 'ahmet@example.com',
        ]);
    }
}
