<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use App\Support\LocalizedRoute;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    /** @use HasFactory<ServiceFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
        'sort_order',
        'is_active',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'translations' => 'array',
        ];
    }

    #[Scope]
    protected function active(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Generate the localized slug for this service.
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
     * Get the localized detail page URL for this service.
     */
    public function detailUrl(?string $locale = null): string
    {
        return LocalizedRoute::serviceShow($this, $locale);
    }

    /**
     * Resolve a service from a localized slug or ID.
     */
    public static function findBySlug(string $slug): ?self
    {
        $decoded = rawurldecode(trim($slug));

        if (ctype_digit($decoded)) {
            return self::query()->find((int) $decoded);
        }

        if (preg_match('/-(\d+)$/', $decoded, $matches)) {
            $service = self::query()->find((int) $matches[1]);
            if ($service) {
                return $service;
            }
        }

        $services = self::query()->get();
        foreach ($services as $service) {
            foreach (['tr', 'en', 'ar'] as $lang) {
                $titleSlug = Str::slug((string) $service->t('title', $lang));
                if ($titleSlug !== '' && $titleSlug === $decoded) {
                    return $service;
                }
            }
        }

        return null;
    }
}
