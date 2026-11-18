<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use Database\Factories\SliderFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /** @use HasFactory<SliderFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'subtitle',
        'title',
        'highlight_text',
        'description',
        'button_text',
        'button_url',
        'background_image',
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
}
