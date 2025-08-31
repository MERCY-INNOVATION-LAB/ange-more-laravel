<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Category;

class CategoryController extends Controller
{
    
    public function store(Request $request){

        $cat=Category::create([
            'nom'=>$request->nom,
        ]);
        return redirect()->back()->with('success', 'categorie ajoutee avec success');
    }
}
