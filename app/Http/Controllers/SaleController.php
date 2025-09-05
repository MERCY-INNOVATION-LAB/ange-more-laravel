<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $shops = Auth::user()->shops;

        $shop_id = $request->input('shop_id', session('shop_id'));

        if ($shop_id) {
            $shop = Shop::with(['products'])
                ->where('user_id', Auth::id())
                ->findOrFail($shop_id);

            session(['shop_id' => $shop->id]);
        } else {
            $shop = null;
        }

        // $cats = Category::all();

        $prods = Product::where('shop_id', $shop_id)->get();

        $nbprods = Product::where('shop_id', $shop_id)->count();

        return view('sales', compact('nbprods', 'prods'));
    }
}
