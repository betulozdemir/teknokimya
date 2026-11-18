<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use Database\Factories\TeamMemberFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    /** @use HasFactory<TeamMemberFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'designation',
        'image',
        'twitter_url',
        'facebook_url',
        'linkedin_url',
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
