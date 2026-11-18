<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class ProductPageController extends Controller
{
    /**
     * Display the inner Products page.
     */
    public function __invoke(): View
    {
        $products = Product::where('is_active', true)->orderBy('sort_order')->get();

        $activeProduct = $products->firstWhere(function ($p) {
            $slugTr = Str::slug($p->title);
            $slugEn = Str::slug((string) $p->t('title', 'en'));

            return Str::contains($slugTr, 'bakir') || Str::contains($slugEn, 'copper');
        }) ?: $products->first();

        return view('products', [
            'products' => $products,
            'activeProduct' => $activeProduct,
            'product' => $activeProduct,
            'settings' => Setting::allLocalized(),
        ]);
    }

    /**
     * Display the Product Details / Category page.
     */
    public function show(string $slug): View
    {
        $product = Product::findBySlug($slug);

        abort_if(! $product, 404);

        $products = Product::where('is_active', true)->orderBy('sort_order')->get();

        if (! $products->contains('id', $product->id)) {
            $products->prepend($product);
        }

        return view('products', [
            'products' => $products,
            'activeProduct' => $product,
            'product' => $product,
            'settings' => Setting::allLocalized(),
        ]);
    }
}
