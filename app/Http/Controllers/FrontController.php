<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product; 
use App\Models\Setting;

class FrontController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        
        $heroBannerSetting = Setting::where('key', 'hero_banner')->first();
        $heroBanner = $heroBannerSetting ? $heroBannerSetting->value : null;

        return view('welcome', compact('products', 'heroBanner'));
    }

    public function tracking()
    {
        return view('tracking');
    }

    public function cekTracking(Request $request)
    {
        $searchKey = $request->input('order_number') ?? $request->input('resi');
        
        $order = Order::where('order_number', $searchKey)->first();
        
        if(!$order) {
            return back()->with('error', 'Nomor Pesanan / Resi tidak ditemukan!');
        }

        return view('tracking', compact('order'));
    }
}