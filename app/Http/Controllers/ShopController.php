<?php

namespace App\Http\Controllers;

use App\Models\Shop;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function store(Request $request){

        $user=Auth::user();

       $shop=Shop::create([
            'nom' => $request->name,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'user_id' => $user->id,
        ]);

        return redirect('/boutique-create')->with('success','Boutique creer avec success');
    }
}
