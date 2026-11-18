<?php

namespace App\Http\Middleware;

use App\Support\LocalizedRoute;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = (string) session('locale', 'tr');

        $decodedPath = '/'.ltrim(rawurldecode($request->path()), '/');
        if ($decodedPath !== '/') {
            foreach (LocalizedRoute::PAGES as $pageKey => $localePaths) {
                if ($pageKey === 'home') {
                    continue;
                }
                foreach ($localePaths as $lang => $path) {
                    if ($decodedPath === $path || str_starts_with($decodedPath, $path.'/')) {
                        $locale = $lang;
                        session(['locale' => $locale]);
                        break 2;
                    }
                }
            }
        }

        if (! in_array($locale, ['tr', 'en', 'ar'], true)) {
            $locale = 'tr';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
