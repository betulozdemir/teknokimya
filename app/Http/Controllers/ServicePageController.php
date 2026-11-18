<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use Illuminate\Contracts\View\View;

class ServicePageController extends Controller
{
    /**
     * Display the inner Services page.
     */
    public function __invoke(): View
    {
        return view('services', [
            'services' => Service::active()->get(),
            'settings' => Setting::allLocalized(),
        ]);
    }

    /**
     * Display the Service Details page.
     */
    public function show(string $slug): View
    {
        $service = Service::findBySlug($slug);

        abort_if(! $service, 404);

        return view('service-details', [
            'service' => $service,
            'services' => Service::active()->get(),
            'settings' => Setting::allLocalized(),
        ]);
    }
}
