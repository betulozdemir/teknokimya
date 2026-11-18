<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show the site settings form.
     */
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'settings' => Setting::allAsArray(),
        ]);
    }

    /**
     * Update site settings in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $rules = [
            'site_title' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'contact_schedule' => ['nullable', 'string', 'max:255'],
            'contact_address' => ['nullable', 'string', 'max:500'],
            'about_subtitle' => ['nullable', 'string', 'max:255'],
            'about_title' => ['nullable', 'string', 'max:500'],
            'about_description' => ['nullable', 'string'],
            'about_history' => ['nullable', 'string'],
            'about_mission' => ['nullable', 'string'],
            'about_vision' => ['nullable', 'string'],
            'about_check_1' => ['nullable', 'string', 'max:255'],
            'about_check_2' => ['nullable', 'string', 'max:255'],
            'breadcrumb_bg_image' => ['nullable', 'string', 'max:255'],
            'breadcrumb_bg_image_file' => ['nullable', 'image', 'max:4096'],
            'about_image_large' => ['nullable', 'string', 'max:255'],
            'about_image_small' => ['nullable', 'string', 'max:255'],
            'about_image_large_file' => ['nullable', 'image', 'max:4096'],
            'about_image_small_file' => ['nullable', 'image', 'max:4096'],
            'footer_description' => ['nullable', 'string'],
            'social_twitter' => ['nullable', 'string', 'max:255'],
            'social_facebook' => ['nullable', 'string', 'max:255'],
            'social_linkedin' => ['nullable', 'string', 'max:255'],
            'social_instagram' => ['nullable', 'string', 'max:255'],
        ];

        $translatableFields = [
            'site_title',
            'contact_schedule',
            'contact_address',
            'about_subtitle',
            'about_title',
            'about_description',
            'about_history',
            'about_mission',
            'about_vision',
            'about_check_1',
            'about_check_2',
            'footer_description',
        ];

        foreach (['en', 'ar'] as $locale) {
            foreach ($translatableFields as $field) {
                $rules[$field.'_'.$locale] = ['nullable', 'string'];
            }
        }

        $validated = $request->validate($rules);

        if ($request->hasFile('breadcrumb_bg_image_file')) {
            $path = $request->file('breadcrumb_bg_image_file')->store('uploads/breadcrumb', 'public');
            $validated['breadcrumb_bg_image'] = 'storage/'.$path;
        }
        if ($request->hasFile('about_image_large_file')) {
            $path = $request->file('about_image_large_file')->store('uploads/about', 'public');
            $validated['about_image_large'] = 'storage/'.$path;
        }
        if ($request->hasFile('about_image_small_file')) {
            $path = $request->file('about_image_small_file')->store('uploads/about', 'public');
            $validated['about_image_small'] = 'storage/'.$path;
        }

        unset(
            $validated['breadcrumb_bg_image_file'],
            $validated['about_image_large_file'],
            $validated['about_image_small_file']
        );

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Genel site ve Hakkımızda ayarları (TR / EN / AR) başarıyla kaydedildi.');
    }
}
