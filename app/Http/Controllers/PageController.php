<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('a-propos', [
            'auteur' => 'Prenom Nom',
            'groupe' => 'MDW32',
        ]);
    }
}
