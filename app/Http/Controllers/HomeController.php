<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the landing page with dynamic content.
     */
    public function __invoke(): View
    {
        return view('home', [
            'sliders' => Slider::active()->get(),
            'features' => Feature::active()->get(),
            'services' => Service::active()->get(),
            'products' => Product::active()->get(),
            'teamMembers' => TeamMember::active()->get(),
            'testimonials' => Testimonial::active()->get(),
            'blogPosts' => BlogPost::active()->get(),
            'settings' => Setting::allLocalized(),
        ]);
    }
}
