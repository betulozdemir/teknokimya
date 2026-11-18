<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ServicePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

// Localized About Us routes (TR, EN, AR)
Route::get('/hakkimizda', AboutController::class)->name('about.tr');
Route::get('/about', AboutController::class)->name('about');
Route::get('/من-نحن', AboutController::class)->name('about.ar');

// Localized Services routes (TR, EN, AR)
Route::get('/hizmetlerimiz', ServicePageController::class)->name('services.tr');
Route::get('/hizmetlerimiz/{slug}', [ServicePageController::class, 'show'])->name('services.show.tr');

Route::get('/services', ServicePageController::class)->name('services');
Route::get('/services/{slug}', [ServicePageController::class, 'show'])->name('services.show');

Route::get('/خدماتنا', ServicePageController::class)->name('services.ar');
Route::get('/خدماتنا/{slug}', [ServicePageController::class, 'show'])->name('services.show.ar');

// Localized Products routes (TR, EN, AR)
Route::get('/urunler', ProductPageController::class)->name('products.tr');
Route::get('/urunler/{slug}', [ProductPageController::class, 'show'])->name('products.show.tr');

Route::get('/products', ProductPageController::class)->name('products');
Route::get('/products/{slug}', [ProductPageController::class, 'show'])->name('products.show');

Route::get('/منتجاتنا', ProductPageController::class)->name('products.ar');
Route::get('/منتجاتنا/{slug}', [ProductPageController::class, 'show'])->name('products.show.ar');

// Localized Contact routes (TR, EN, AR)
Route::get('/iletisim', [ContactController::class, 'index'])->name('contact.tr');
Route::post('/iletisim', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.submit.tr');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.submit');

Route::get('/اتصل-بنا', [ContactController::class, 'index'])->name('contact.ar');
Route::post('/اتصل-بنا', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.submit.ar');

// Localized Blog routes (TR, EN, AR)
Route::get('/blog', BlogPageController::class)->name('blog');
Route::get('/blog/{slug}', [BlogPageController::class, 'show'])->name('blog.show');

Route::get('/مدونة', BlogPageController::class)->name('blog.ar');
Route::get('/مدونة/{slug}', [BlogPageController::class, 'show'])->name('blog.show.ar');

Route::get('/locale/{locale}', LocaleController::class)->name('locale.switch');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');

    Route::middleware('auth')->group(function (): void {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('menu-items', MenuItemController::class)->except(['show']);
        Route::resource('sliders', SliderController::class)->except(['show']);
        Route::resource('features', FeatureController::class)->except(['show']);
        Route::resource('services', ServiceController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('team-members', TeamMemberController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('blog-posts', BlogPostController::class)->except(['show']);
        Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'destroy']);

        Route::get('/about', [AboutPageController::class, 'edit'])->name('about.edit');
        Route::put('/about', [AboutPageController::class, 'update'])->name('about.update');

        Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
