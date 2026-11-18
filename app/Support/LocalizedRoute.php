<?php

namespace App\Support;

use App\Models\BlogPost;
use App\Models\Product;
use App\Models\Service;

class LocalizedRoute
{
    /**
     * Map of logical page keys to locale-specific URI paths.
     *
     * @var array<string, array<string, string>>
     */
    public const PAGES = [
        'home' => [
            'tr' => '/',
            'en' => '/',
            'ar' => '/',
        ],
        'about' => [
            'tr' => '/hakkimizda',
            'en' => '/about',
            'ar' => '/من-نحن',
        ],
        'services' => [
            'tr' => '/hizmetlerimiz',
            'en' => '/services',
            'ar' => '/خدماتنا',
        ],
        'products' => [
            'tr' => '/urunler',
            'en' => '/products',
            'ar' => '/منتجاتنا',
        ],
        'contact' => [
            'tr' => '/iletisim',
            'en' => '/contact',
            'ar' => '/اتصل-بنا',
        ],
        'blog' => [
            'tr' => '/blog',
            'en' => '/blog',
            'ar' => '/مدونة',
        ],
    ];

    /**
     * Map of homepage section keys to locale-specific anchor IDs.
     *
     * @var array<string, array<string, string>>
     */
    public const SECTIONS = [
        'about' => [
            'tr' => 'hakkimizda',
            'en' => 'about',
            'ar' => 'من-نحن',
        ],
        'services' => [
            'tr' => 'hizmetlerimiz',
            'en' => 'services',
            'ar' => 'خدماتنا',
        ],
        'products' => [
            'tr' => 'urunler',
            'en' => 'products',
            'ar' => 'منتجاتنا',
        ],
        'team' => [
            'tr' => 'ekibimiz',
            'en' => 'team',
            'ar' => 'فريقنا',
        ],
        'blog' => [
            'tr' => 'blog',
            'en' => 'blog',
            'ar' => 'المدونة',
        ],
    ];

    /**
     * Get the localized URL for a named page ('home', 'about', 'services', 'contact').
     */
    public static function page(string $page, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $path = self::PAGES[$page][$locale] ?? self::PAGES[$page]['tr'] ?? '/';

        return url($path);
    }

    /**
     * Get the localized URL for a specific Service detail page.
     */
    public static function serviceShow(Service $service, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $basePath = self::PAGES['services'][$locale] ?? self::PAGES['services']['tr'];

        return url($basePath.'/'.$service->slug($locale));
    }

    /**
     * Get the localized URL for a specific Product detail page.
     */
    public static function productShow(Product $product, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $basePath = self::PAGES['products'][$locale] ?? self::PAGES['products']['tr'];

        return url($basePath.'/'.$product->slug($locale));
    }

    /**
     * Get the localized URL for a specific Blog detail page.
     */
    public static function blogShow(BlogPost $post, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $basePath = self::PAGES['blog'][$locale] ?? self::PAGES['blog']['tr'];

        return url($basePath.'/'.$post->slug($locale));
    }

    /**
     * Get the localized anchor ID (without '#') for a homepage section.
     */
    public static function sectionId(string $section, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();

        return self::SECTIONS[$section][$locale] ?? self::SECTIONS[$section]['tr'] ?? $section;
    }

    /**
     * Get the full localized URL with anchor for a homepage section.
     */
    public static function sectionUrl(string $section, ?string $locale = null): string
    {
        return url('/#'.self::sectionId($section, $locale));
    }

    /**
     * Convert any internal URL/path (e.g. '/about', '/hakkimizda', '/contact', '/#services')
     * into the equivalent URL for the target locale.
     */
    public static function localizeUrl(string $rawUrl, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $trimmed = trim($rawUrl);

        if ($trimmed === '' || $trimmed === '#') {
            return '#';
        }

        if (str_starts_with($trimmed, 'http://') || str_starts_with($trimmed, 'https://')) {
            $appUrl = rtrim(config('app.url'), '/');
            if (! str_starts_with($trimmed, $appUrl)) {
                return $trimmed;
            }
            $trimmed = substr($trimmed, strlen($appUrl)) ?: '/';
        }

        $decoded = rawurldecode($trimmed);

        // Check if it matches any page path in any locale
        foreach (self::PAGES as $pageKey => $localePaths) {
            foreach ($localePaths as $path) {
                if ($decoded === $path || rtrim($decoded, '/') === rtrim($path, '/')) {
                    return self::page($pageKey, $locale);
                }
            }
        }

        // Check if it matches a service detail URL in any locale (e.g. /hizmetlerimiz/{slug}, /services/{slug}, /خدماتنا/{slug})
        foreach (self::PAGES['services'] as $serviceBasePath) {
            $prefix = rtrim($serviceBasePath, '/').'/';
            if (str_starts_with($decoded, $prefix)) {
                $slugPart = substr($decoded, strlen($prefix));
                if ($slugPart !== '') {
                    $service = Service::findBySlug($slugPart);
                    if ($service) {
                        return self::serviceShow($service, $locale);
                    }
                }
            }
        }

        // Check if it matches a product detail URL in any locale (e.g. /urunler/{slug}, /products/{slug}, /منتجاتنا/{slug})
        foreach (self::PAGES['products'] as $productBasePath) {
            $prefix = rtrim($productBasePath, '/').'/';
            if (str_starts_with($decoded, $prefix)) {
                $slugPart = substr($decoded, strlen($prefix));
                if ($slugPart !== '') {
                    $product = Product::findBySlug($slugPart);
                    if ($product) {
                        return self::productShow($product, $locale);
                    }
                }
            }
        }

        // Check if it matches a blog detail URL in any locale (e.g. /blog/{slug}, /مدونة/{slug})
        foreach (self::PAGES['blog'] as $blogBasePath) {
            $prefix = rtrim($blogBasePath, '/').'/';
            if (str_starts_with($decoded, $prefix)) {
                $slugPart = substr($decoded, strlen($prefix));
                if ($slugPart !== '') {
                    $post = BlogPost::findBySlug($slugPart);
                    if ($post) {
                        return self::blogShow($post, $locale);
                    }
                }
            }
        }

        // Check if it matches any section anchor (e.g. '#services', '/#services', '#hizmetlerimiz')
        foreach (self::SECTIONS as $sectionKey => $localeAnchors) {
            foreach ($localeAnchors as $anchor) {
                if ($decoded === '#'.$anchor || $decoded === '/#'.$anchor) {
                    if (isset(self::PAGES[$sectionKey])) {
                        return self::page($sectionKey, $locale);
                    }

                    return self::sectionUrl($sectionKey, $locale);
                }
            }
        }

        if (str_starts_with($trimmed, '#')) {
            return url('/').$trimmed;
        }

        return url($trimmed);
    }
}
