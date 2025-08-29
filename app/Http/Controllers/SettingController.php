<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Shop;

class SettingController extends Controller
{
    public function index( Request $request){

        $shops = Auth::user()->shops;

        $shop_id = $request->input('boutique_id', session('shop_id'));
    
        if ($shop_id) {
            $shop = Shop::with(['products'])
                        ->where('user_id', Auth::id())
                        ->findOrFail($shop_id);
    
            session(['shop_id' => $shop->id]);
        } else {
            $shop = null;
        }
    
        return view('settings', compact('shops', 'shop'));
    }
}
