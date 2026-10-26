<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        return view('posts.index', [
            'heading' => 'Tous les articles',
            'posts' => Post::latest('id')->paginate(4),
        ]);
    }

    public function archive(string $year): View
    {
        return view('posts.index', [
            'heading' => 'Articles de '.$year,
            'posts' => Post::published()->whereYear('published_at', $year)->latest('published_at')->paginate(4),
        ]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:posts,slug'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        $post = Post::create($validated);

        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:posts,slug,'.$post->id],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published'] && ! $post->published_at) {
            $validated['published_at'] = now();
        } elseif (! $validated['is_published']) {
            $validated['published_at'] = null;
        }

        $post->update($validated);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
