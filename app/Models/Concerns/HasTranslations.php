<?php

namespace App\Models\Concerns;

trait HasTranslations
{
    /**
     * Get the translated value of an attribute for the active locale, falling back to default.
     */
    public function t(string $field, ?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $translations = $this->translations ?? [];

        if ($locale !== 'tr') {
            $translatedValue = $translations[$locale][$field] ?? null;

            if (is_string($translatedValue) && trim($translatedValue) !== '') {
                return $translatedValue;
            }
        }

        $attributeValue = $this->getAttribute($field);
        if (is_string($attributeValue) && trim($attributeValue) !== '') {
            return $attributeValue;
        }

        $trTranslated = $translations['tr'][$field] ?? null;
        if (is_string($trTranslated) && trim($trTranslated) !== '') {
            return $trTranslated;
        }

        return $attributeValue;
    }

    /**
     * Get the translation for a specific locale and field (used in admin forms).
     */
    public function getTranslation(string $locale, string $field): string
    {
        $translations = $this->translations ?? [];

        return (string) ($translations[$locale][$field] ?? '');
    }
}
