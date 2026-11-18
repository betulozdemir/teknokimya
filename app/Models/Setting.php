<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Retrieve all settings as a key-value associative array.
     *
     * @return array<string, string|null>
     */
    public static function allAsArray(): array
    {
        return static::query()->pluck('value', 'key')->all();
    }

    /**
     * Retrieve all settings with active locale overrides applied.
     *
     * @return array<string, string|null>
     */
    public static function allLocalized(?string $locale = null): array
    {
        $settings = static::allAsArray();
        $locale = $locale ?? app()->getLocale();

        if ($locale !== 'tr') {
            $suffix = '_'.$locale;
            foreach ($settings as $key => $value) {
                if (str_ends_with($key, $suffix)) {
                    $baseKey = substr($key, 0, -strlen($suffix));
                    if (is_string($value) && trim($value) !== '') {
                        $settings[$baseKey] = $value;
                    }
                }
            }
        }

        return $settings;
    }
}
