<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use App\Support\LocalizedRoute;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'category',
        'description',
        'process_groups',
        'image',
        'is_featured',
        'sort_order',
        'is_active',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'process_groups' => 'array',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'translations' => 'array',
        ];
    }

    #[Scope]
    protected function active(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order');
    }

    /**
     * Get localized process groups for this product category.
     *
     * @return array<int, array{title: string, items: array<int, array{code: string, description: string}>}>
     */
    public function getLocalizedProcessGroups(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        $translations = $this->translations ?? [];

        if ($locale !== 'tr' && ! empty($translations[$locale]['process_groups']) && is_array($translations[$locale]['process_groups'])) {
            return $translations[$locale]['process_groups'];
        }

        if (! empty($this->process_groups) && is_array($this->process_groups)) {
            return $this->process_groups;
        }

        if (! empty($translations['tr']['process_groups']) && is_array($translations['tr']['process_groups'])) {
            return $translations['tr']['process_groups'];
        }

        if ($this->description || $this->t('description', $locale)) {
            return [
                [
                    'title' => (string) ($this->t('title', $locale) ?: $this->title),
                    'items' => [
                        [
                            'code' => (string) ($this->t('category', $locale) ?: 'PROSES'),
                            'description' => (string) ($this->t('description', $locale) ?: $this->description),
                        ],
                    ],
                ],
            ];
        }

        return [];
    }

    /**
     * Generate the localized slug for this product.
     */
    public function slug(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $title = (string) ($this->t('title', $locale) ?: $this->title);

        if ($locale === 'ar') {
            $slug = (string) preg_replace('/[^\p{L}\p{N}]+/u', '-', trim($title));
            $slug = trim($slug, '-');
        } else {
            $slug = Str::slug($title);
        }

        return ($slug !== '' ? $slug.'-' : '').$this->id;
    }

    /**
     * Get the localized detail page URL for this product.
     */
    public function detailUrl(?string $locale = null): string
    {
        return LocalizedRoute::productShow($this, $locale);
    }

    /**
     * Resolve a product from a localized slug or ID.
     */
    public static function findBySlug(string $slug): ?self
    {
        $decoded = rawurldecode(trim($slug));

        if (ctype_digit($decoded)) {
            return self::query()->find((int) $decoded);
        }

        if (preg_match('/-(\d+)$/', $decoded, $matches)) {
            $product = self::query()->find((int) $matches[1]);
            if ($product) {
                return $product;
            }
        }

        $products = self::query()->get();
        foreach ($products as $product) {
            foreach (['tr', 'en', 'ar'] as $lang) {
                $titleSlug = Str::slug((string) $product->t('title', $lang));
                if ($titleSlug !== '' && $titleSlug === $decoded) {
                    return $product;
                }
            }
        }

        return null;
    }
}
