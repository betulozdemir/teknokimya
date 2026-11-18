<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of features.
     */
    public function index(): View
    {
        return view('admin.features.index', [
            'features' => Feature::query()->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new feature.
     */
    public function create(): View
    {
        return view('admin.features.form', [
            'feature' => new Feature([
                'sort_order' => 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created feature in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Feature::create($validated);

        return redirect()->route('admin.features.index')
            ->with('success', 'Özellik başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified feature.
     */
    public function edit(Feature $feature): View
    {
        return view('admin.features.form', [
            'feature' => $feature,
        ]);
    }

    /**
     * Update the specified feature in storage.
     */
    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $feature->update($validated);

        return redirect()->route('admin.features.index')
            ->with('success', 'Özellik başarıyla güncellendi.');
    }

    /**
     * Remove the specified feature from storage.
     */
    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return redirect()->route('admin.features.index')
            ->with('success', 'Özellik silindi.');
    }
}
