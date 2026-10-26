<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $latestPosts = Post::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('latestPosts'));
    }

    public function about(): View
    {
        return view('a-propos', [
            'auteur' => 'Prenom Nom',
            'groupe' => 'MDW32',
        ]);
    }

    public function time(): View
    {
        return view('heure', [
            'heure' => now()->format('H:i'),
            'date' => now()->format('d/m/Y'),
        ]);
    }
}
