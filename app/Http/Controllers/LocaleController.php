<?php

namespace App\Http\Controllers;

use App\Support\LocalizedRoute;
use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * Switch the active application locale and redirect to the localized equivalent URL.
     */
    public function __invoke(string $locale): RedirectResponse
    {
        if (in_array($locale, ['tr', 'en', 'ar'], true)) {
            session(['locale' => $locale]);
        } else {
            $locale = 'tr';
        }

        $previousUrl = url()->previous();
        $targetUrl = LocalizedRoute::localizeUrl($previousUrl, $locale);

        return redirect()->to($targetUrl);
    }
}
