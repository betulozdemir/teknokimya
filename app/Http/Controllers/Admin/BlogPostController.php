<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(): View
    {
        return view('admin.blog-posts.index', [
            'blogPosts' => BlogPost::query()->orderByDesc('is_featured')->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create(): View
    {
        return view('admin.blog-posts.form', [
            'blogPost' => new BlogPost([
                'category' => 'Company',
                'author' => 'Admin',
                'published_date' => 'Feb 8, 2024',
                'image' => 'assets/images/blog/blog-thumb-12.png',
                'is_featured' => false,
                'sort_order' => 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'published_date' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'image' => ['required_without:image_file', 'nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/blog', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        BlogPost::create($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog yazısı başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(BlogPost $blogPost): View
    {
        return view('admin.blog-posts.form', [
            'blogPost' => $blogPost,
        ]);
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, BlogPost $blogPost): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'published_date' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/blog', 'public');
            $validated['image'] = 'storage/'.$path;
        } elseif (empty($validated['image'])) {
            $validated['image'] = $blogPost->image;
        }

        unset($validated['image_file']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        $blogPost->update($validated);

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog yazısı başarıyla güncellendi.');
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog yazısı silindi.');
    }
}
