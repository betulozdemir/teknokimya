<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the menu items.
     */
    public function index(): View
    {
        return view('admin.menu-items.index', [
            'menuItems' => MenuItem::query()->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new menu item.
     */
    public function create(): View
    {
        return view('admin.menu-items.form', [
            'menuItem' => new MenuItem([
                'target' => '_self',
                'sort_order' => MenuItem::query()->max('sort_order') + 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created menu item in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'target' => ['required', 'in:_self,_blank'],
            'sort_order' => ['required', 'integer'],
            'translations' => ['nullable', 'array'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        MenuItem::create($validated);

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Menü öğesi başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified menu item.
     */
    public function edit(MenuItem $menuItem): View
    {
        return view('admin.menu-items.form', [
            'menuItem' => $menuItem,
        ]);
    }

    /**
     * Update the specified menu item in storage.
     */
    public function update(Request $request, MenuItem $menuItem): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'target' => ['required', 'in:_self,_blank'],
            'sort_order' => ['required', 'integer'],
            'translations' => ['nullable', 'array'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $menuItem->update($validated);

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Menü öğesi başarıyla güncellendi.');
    }

    /**
     * Remove the specified menu item from storage.
     */
    public function destroy(MenuItem $menuItem): RedirectResponse
    {
        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')
            ->with('success', 'Menü öğesi başarıyla silindi.');
    }
}
