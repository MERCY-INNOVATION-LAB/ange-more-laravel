<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function store(Request $request)
    {

        $user = Auth::user();

        $shop = Shop::create([
            'nom' => $request->name,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'user_id' => $user->id,
        ]);

        return redirect('/dashboard');
    }

    public function index()
    {

        $shops = Shop::where('user_id', auth()->id())->get();

        return view('dashboard', compact('shops'));

    }

    public function select()
    {
        if (! auth()->check()) {
            return redirect()->route('login-register');
        }

        // $shops = auth()->user()->shops ?? collect();
        $shops = Shop::where('user_id', auth()->id())->get();

        return view('select', compact('shops'));
    }

    // public function selected(Request $request)
    // {
    //     $request->validate([

    //         'shop_id' => 'required|exists:shops,id'
    //     ]);

    //     // $shops = Shop::where('user_id', auth()->id())->get();

    //     // $shop = auth()->user()->shops->findOrFail($request->shop_id);

    //     // $shopId = $request->shop_id;

    //     // session(['shop_id' => $shop->id]);

    //     $shop = Shop::where('id', $request->shop_id)
    //                 ->where('user_id', auth()->id())
    //                 ->firstOrFail();

    //     session(['shop_id' => $shop->id]);

    //     return redirect()->route('dashboard')->with('success', 'Boutique sélectionnée : ' . $shop->nom);
    // }

    public function selected(Request $request)
    {
        // Valider que shop_id est bien envoyé et existe
        $request->validate([
            'shop_id' => 'required|exists:shops,id',
        ]);

        // Récupérer la boutique correspondant à l'utilisateur
        $shop = Shop::where('id', $request->shop_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Stocker l'ID de la boutique en session
        session(['shop_id' => $shop->id]);

        // Rediriger vers le dashboard avec un message de succès
        return redirect()->route('dashboard')
            ->with('success', 'Boutique sélectionnée : ');
    }
}
