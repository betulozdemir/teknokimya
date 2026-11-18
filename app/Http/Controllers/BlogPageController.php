<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
     * Display the inner Blog listing page.
     */
    public function __invoke(Request $request): View
    {
        $query = BlogPost::where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->orderByDesc('id');

        // Optional search filter
        if ($search = trim((string) $request->input('s', ''))) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Optional category filter
        if ($category = trim((string) $request->input('category', ''))) {
            $query->where('category', $category);
        }

        // Optional tag filter
        if ($tag = trim((string) $request->input('tag', ''))) {
            $query->where('tags', 'like', "%{$tag}%");
        }

        $blogPosts = $query->paginate(6)->withQueryString();

        $allPosts = BlogPost::where('is_active', true)->get();
        $categories = $allPosts->groupBy('category')->map->count();
        $recentPosts = BlogPost::where('is_active', true)->orderByDesc('id')->take(4)->get();

        $tags = collect(['Kimya', 'Galvano', 'Kaplama', 'Sanayi', 'Yüzey İşlem', 'Bakır', 'Nikel', 'Krom']);

        return view('blog', [
            'blogPosts' => $blogPosts,
            'recentPosts' => $recentPosts,
            'categories' => $categories,
            'popularTags' => $tags,
            'activeCategory' => $category,
            'activeSearch' => $search,
            'activeTag' => $tag,
            'settings' => Setting::allLocalized(),
        ]);
    }

    /**
     * Display the Blog Details page.
     */
    public function show(string $slug): View
    {
        $post = BlogPost::findBySlug($slug);

        abort_if(! $post || ! $post->is_active, 404);

        $allPosts = BlogPost::where('is_active', true)->get();
        $categories = $allPosts->groupBy('category')->map->count();
        $recentPosts = BlogPost::where('is_active', true)
            ->where('id', '!=', $post->id)
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $tags = collect(['Kimya', 'Galvano', 'Kaplama', 'Sanayi', 'Yüzey İşlem', 'Bakır', 'Nikel', 'Krom']);

        return view('blog-details', [
            'post' => $post,
            'recentPosts' => $recentPosts,
            'categories' => $categories,
            'popularTags' => $tags,
            'settings' => Setting::allLocalized(),
        ]);
    }
}
