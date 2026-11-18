<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use App\Support\LocalizedRoute;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        return view('contact', [
            'settings' => Setting::allLocalized(),
        ]);
    }

    /**
     * Store a newly submitted contact form message.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        ContactMessage::create($validated);

        return redirect()
            ->to(LocalizedRoute::page('contact').'#contact-form-section')
            ->with('contact_success', __('Your message has been sent successfully. We will get back to you soon.'));
    }
}
