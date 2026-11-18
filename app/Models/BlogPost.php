<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use App\Support\LocalizedRoute;
use Database\Factories\BlogPostFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    /** @use HasFactory<BlogPostFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'category',
        'author',
        'published_date',
        'excerpt',
        'content',
        'tags',
        'image',
        'is_featured',
        'sort_order',
        'is_active',
        'translations',
    ];

    protected function casts(): array
    {
        return [
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
     * Generate the localized slug for this blog post.
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
     * Get the localized detail page URL for this blog post.
     */
    public function detailUrl(?string $locale = null): string
    {
        return LocalizedRoute::blogShow($this, $locale);
    }

    /**
     * Resolve a blog post from a localized slug or ID.
     */
    public static function findBySlug(string $slug): ?self
    {
        $decoded = rawurldecode(trim($slug));

        if (ctype_digit($decoded)) {
            return self::query()->find((int) $decoded);
        }

        if (preg_match('/-(\d+)$/', $decoded, $matches)) {
            $post = self::query()->find((int) $matches[1]);
            if ($post) {
                return $post;
            }
        }

        $posts = self::query()->get();
        foreach ($posts as $post) {
            foreach (['tr', 'en', 'ar'] as $lang) {
                $titleSlug = Str::slug((string) $post->t('title', $lang));
                if ($titleSlug !== '' && $titleSlug === $decoded) {
                    return $post;
                }
            }
        }

        return null;
    }

    /**
     * Get tags as an array.
     *
     * @return array<int, string>
     */
    public function getTagsArrayAttribute(): array
    {
        $raw = (string) ($this->tags ?: '');
        if (trim($raw) === '') {
            return ['Kimya', 'Galvano', 'Kaplama', 'Sanayi', 'Yüzey İşlem'];
        }

        return array_map('trim', explode(',', $raw));
    }
}
