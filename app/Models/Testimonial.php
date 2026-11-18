<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use Database\Factories\TestimonialFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /** @use HasFactory<TestimonialFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'comment',
        'client_name',
        'client_designation',
        'avatar',
        'rating',
        'sort_order',
        'is_active',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
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
