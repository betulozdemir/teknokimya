<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of sliders.
     */
    public function index(): View
    {
        return view('admin.sliders.index', [
            'sliders' => Slider::query()->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create(): View
    {
        return view('admin.sliders.form', [
            'slider' => new Slider([
                'background_image' => 'assets/images/bg/banner-bg-09.png',
                'button_text' => 'Explore More - Explore More -',
                'button_url' => '#contact',
                'sort_order' => 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subtitle' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'highlight_text' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'background_image' => ['required_without:background_image_file', 'nullable', 'string', 'max:255'],
            'background_image_file' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('background_image_file')) {
            $path = $request->file('background_image_file')->store('uploads/sliders', 'public');
            $validated['background_image'] = 'storage/'.$path;
        }

        unset($validated['background_image_file']);
        $validated['is_active'] = $request->boolean('is_active');

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit(Slider $slider): View
    {
        return view('admin.sliders.form', [
            'slider' => $slider,
        ]);
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, Slider $slider): RedirectResponse
    {
        $validated = $request->validate([
            'subtitle' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'highlight_text' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'background_image' => ['nullable', 'string', 'max:255'],
            'background_image_file' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('background_image_file')) {
            $path = $request->file('background_image_file')->store('uploads/sliders', 'public');
            $validated['background_image'] = 'storage/'.$path;
        } elseif (empty($validated['background_image'])) {
            $validated['background_image'] = $slider->background_image;
        }

        unset($validated['background_image_file']);
        $validated['is_active'] = $request->boolean('is_active');

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider başarıyla güncellendi.');
    }

    /**
     * Remove the specified slider from storage.
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        $slider->delete();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider silindi.');
    }
}
