<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Feature;
use App\Models\MenuItem;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard summary.
     */
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'menuCount' => MenuItem::query()->count(),
            'sliderCount' => Slider::query()->count(),
            'featureCount' => Feature::query()->count(),
            'serviceCount' => Service::query()->count(),
            'productCount' => Product::query()->count(),
            'teamCount' => TeamMember::query()->count(),
            'testimonialCount' => Testimonial::query()->count(),
            'blogCount' => BlogPost::query()->count(),
            'unreadMessageCount' => ContactMessage::query()->where('is_read', false)->count(),
            'recentProducts' => Product::query()->latest()->limit(5)->get(),
            'recentServices' => Service::query()->latest()->limit(5)->get(),
        ]);
    }
}
