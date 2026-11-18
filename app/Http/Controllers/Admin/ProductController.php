<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::query()->orderByDesc('is_featured')->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        return view('admin.products.form', [
            'product' => new Product([
                'category' => 'Laboratory',
                'image' => 'assets/images/portfolio/portfolio-thumb-22.png',
                'is_featured' => false,
                'sort_order' => 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'process_groups' => ['nullable'],
            'image' => ['required_without:image_file', 'nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->has('process_groups')) {
            $validated['process_groups'] = $this->cleanProcessGroups($request->input('process_groups'));
        }

        if (isset($validated['translations']) && is_array($validated['translations'])) {
            foreach (['en', 'ar'] as $lang) {
                if (isset($validated['translations'][$lang]['process_groups'])) {
                    $validated['translations'][$lang]['process_groups'] = $this->cleanProcessGroups(
                        $validated['translations'][$lang]['process_groups']
                    );
                }
            }
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/products', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Ürün başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        return view('admin.products.form', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'process_groups' => ['nullable'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->has('process_groups')) {
            $validated['process_groups'] = $this->cleanProcessGroups($request->input('process_groups'));
        }

        if (isset($validated['translations']) && is_array($validated['translations'])) {
            foreach (['en', 'ar'] as $lang) {
                if (isset($validated['translations'][$lang]['process_groups'])) {
                    $validated['translations'][$lang]['process_groups'] = $this->cleanProcessGroups(
                        $validated['translations'][$lang]['process_groups']
                    );
                }
            }
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/products', 'public');
            $validated['image'] = 'storage/'.$path;
        } elseif (empty($validated['image'])) {
            $validated['image'] = $product->image;
        }

        unset($validated['image_file']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Ürün başarıyla güncellendi.');
    }

    /**
     * Remove the specified product from storage.
     */
    /**
     * Clean and normalize nested process groups array.
     *
     * @return array<int, array{title: string, items: array<int, array{code: string, description: string}>}>
     */
    private function cleanProcessGroups(mixed $rawGroups): array
    {
        if (is_string($rawGroups)) {
            $decoded = json_decode($rawGroups, true);
            $rawGroups = is_array($decoded) ? $decoded : [];
        }

        if (! is_array($rawGroups)) {
            return [];
        }

        $clean = [];
        foreach ($rawGroups as $grp) {
            if (! is_array($grp)) {
                continue;
            }

            $title = trim((string) ($grp['title'] ?? ''));
            $items = [];

            foreach ($grp['items'] ?? [] as $item) {
                if (! is_array($item)) {
                    continue;
                }

                $code = trim((string) ($item['code'] ?? ''));
                $desc = trim((string) ($item['description'] ?? ''));

                if ($code !== '' || $desc !== '') {
                    $items[] = [
                        'code' => $code,
                        'description' => $desc,
                    ];
                }
            }

            if ($title !== '' || ! empty($items)) {
                $clean[] = [
                    'title' => $title,
                    'items' => $items,
                ];
            }
        }

        return $clean;
    }
}
