<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    /**
     * Show the About Us management form.
     */
    public function edit(): View
    {
        return view('admin.about.edit', [
            'settings' => Setting::allAsArray(),
        ]);
    }

    /**
     * Update the About Us page settings and images.
     */
    public function update(Request $request): RedirectResponse
    {
        $rules = [
            'about_subtitle' => ['required', 'string', 'max:255'],
            'about_title' => ['required', 'string', 'max:500'],
            'about_description' => ['nullable', 'string'],
            'about_tab_1_title' => ['nullable', 'string', 'max:255'],
            'about_history' => ['nullable', 'string'],
            'about_tab_2_title' => ['nullable', 'string', 'max:255'],
            'about_mission' => ['nullable', 'string'],
            'about_tab_3_title' => ['nullable', 'string', 'max:255'],
            'about_vision' => ['nullable', 'string'],
            'about_check_1' => ['nullable', 'string', 'max:255'],
            'about_check_2' => ['nullable', 'string', 'max:255'],
            'about_button_text' => ['nullable', 'string', 'max:255'],
            'about_button_url' => ['nullable', 'string', 'max:255'],
            'about_image_large' => ['nullable', 'string', 'max:255'],
            'about_image_small' => ['nullable', 'string', 'max:255'],
            'about_home_image' => ['nullable', 'string', 'max:255'],
            'about_image_large_file' => ['nullable', 'image', 'max:4096'],
            'about_image_small_file' => ['nullable', 'image', 'max:4096'],
            'about_home_image_file' => ['nullable', 'image', 'max:4096'],
        ];

        $translatableFields = [
            'about_subtitle',
            'about_title',
            'about_description',
            'about_tab_1_title',
            'about_history',
            'about_tab_2_title',
            'about_mission',
            'about_tab_3_title',
            'about_vision',
            'about_check_1',
            'about_check_2',
            'about_button_text',
        ];

        foreach (['en', 'ar'] as $locale) {
            foreach ($translatableFields as $field) {
                $rules[$field.'_'.$locale] = ['nullable', 'string'];
            }
        }

        $validated = $request->validate($rules);

        $fileMappings = [
            'about_image_large_file' => 'about_image_large',
            'about_image_small_file' => 'about_image_small',
            'about_home_image_file' => 'about_home_image',
        ];

        foreach ($fileMappings as $fileInput => $settingKey) {
            if ($request->hasFile($fileInput)) {
                $path = $request->file($fileInput)->store('uploads/about', 'public');
                $validated[$settingKey] = 'storage/'.$path;
            }
            unset($validated[$fileInput]);
        }

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.about.edit')
            ->with('success', 'Hakkımızda sayfası görselleri ve içerikleri (TR / EN / AR) başarıyla güncellendi.');
    }
}
