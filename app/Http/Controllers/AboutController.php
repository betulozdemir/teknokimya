<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * Display the About Us page.
     */
    public function __invoke(): View
    {
        return view('about', [
            'settings' => Setting::allLocalized(),
        ]);
    }
}
