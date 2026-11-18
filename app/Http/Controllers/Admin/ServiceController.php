<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index(): View
    {
        return view('admin.services.index', [
            'services' => Service::query()->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new service.
     */
    public function create(): View
    {
        return view('admin.services.form', [
            'service' => new Service([
                'image' => 'assets/images/services/services-thumb-17.png',
                'url' => '#services',
                'sort_order' => 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/services', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);
        $validated['is_active'] = $request->boolean('is_active');

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Hizmet başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.form', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/services', 'public');
            $validated['image'] = 'storage/'.$path;
        } elseif (empty($validated['image'])) {
            $validated['image'] = $service->image;
        }

        unset($validated['image_file']);
        $validated['is_active'] = $request->boolean('is_active');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Hizmet başarıyla güncellendi.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Hizmet silindi.');
    }
}
