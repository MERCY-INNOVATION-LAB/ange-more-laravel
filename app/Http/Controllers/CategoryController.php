<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {

        $cat = Category::create([
            'nom' => $request->nom,
        ]);

        return redirect()->back()->with('success', 'categorie ajoutee avec success');
    }
}
