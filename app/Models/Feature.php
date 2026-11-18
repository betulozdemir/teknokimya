<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use Database\Factories\FeatureFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /** @use HasFactory<FeatureFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
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
