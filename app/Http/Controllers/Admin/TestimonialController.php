<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index(): View
    {
        return view('admin.testimonials.index', [
            'testimonials' => Testimonial::query()->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create(): View
    {
        return view('admin.testimonials.form', [
            'testimonial' => new Testimonial([
                'title' => 'Best Company!',
                'avatar' => 'assets/images/user/user-thumb-01.png',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_designation' => ['required', 'string', 'max:255'],
            'avatar' => ['required_without:avatar_file', 'nullable', 'string', 'max:255'],
            'avatar_file' => ['nullable', 'image', 'max:5120'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('avatar_file')) {
            $path = $request->file('avatar_file')->store('uploads/testimonials', 'public');
            $validated['avatar'] = 'storage/'.$path;
        }

        unset($validated['avatar_file']);
        $validated['is_active'] = $request->boolean('is_active');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Müşteri yorumu başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', [
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_designation' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'string', 'max:255'],
            'avatar_file' => ['nullable', 'image', 'max:5120'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('avatar_file')) {
            $path = $request->file('avatar_file')->store('uploads/testimonials', 'public');
            $validated['avatar'] = 'storage/'.$path;
        } elseif (empty($validated['avatar'])) {
            $validated['avatar'] = $testimonial->avatar;
        }

        unset($validated['avatar_file']);
        $validated['is_active'] = $request->boolean('is_active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Müşteri yorumu başarıyla güncellendi.');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Müşteri yorumu silindi.');
    }
}
