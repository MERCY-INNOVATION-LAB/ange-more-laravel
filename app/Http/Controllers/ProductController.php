<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Shop;

class ProductController extends Controller
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
    
        return view('products', compact('shops', 'shop'));
    }


    public function create(){

        
    }
}
