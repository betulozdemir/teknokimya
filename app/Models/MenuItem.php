<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use App\Support\LocalizedRoute;
use Database\Factories\MenuItemFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /** @use HasFactory<MenuItemFactory> */
    use HasFactory;

    use HasTranslations;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'url',
        'target',
        'sort_order',
        'is_active',
        'translations',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
            'translations' => 'array',
        ];
    }

    /**
     * Scope active menu items ordered by sort_order.
     */
    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Get the localized URL for the active or specified locale.
     */
    public function localizedUrl(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $rawUrl = (string) ($this->t('url', $locale) ?? $this->url);

        return LocalizedRoute::localizeUrl($rawUrl, $locale);
    }
}
