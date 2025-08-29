<?php

namespace App\Http\Controllers;

use App\Models\Shop;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request){

        // dd(Shop::where('user_id', Auth::id())->toSql());
        
        // $shops=Shop::find()->where('user_id', Auth::id())->first();

        // $shops = Auth::id()->shop;

        // dd($shops);
      //   return view('dashboard', compact('shops'));
      if (!session()->has('shop_id')) {
        return redirect()->route('shop-selected')
                         ->with('error', 'Veuillez sélectionner une boutique.');
    }

    $shop = Shop::with(['products'])
                ->findOrFail(session('shop_id'));

    return view('dashboard', compact('shop'));
   }
}
