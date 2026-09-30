<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderTracking;
use App\Models\Setting;

class AdminController extends Controller
{
    // SEMUA DATA DISATUKAN KE 1 HALAMAN INDEX
public function index(Request $request)
{
    $products = Product::orderBy('created_at', 'desc')->get();
    
    // Ambil kata kunci dari form pencarian
    $search = $request->input('search');

    // Filter pesanan berdasarkan No. Resi, Nama Pelanggan, atau No. Telepon
    $orders = Order::when($search, function ($query, $search) {
        return $query->where('order_number', 'LIKE', "%{$search}%")
                     ->orWhere('customer_name', 'LIKE', "%{$search}%")
                     ->orWhere('customer_phone', 'LIKE', "%{$search}%");
    })->orderBy('created_at', 'desc')->get();

    return view('admin.index', compact('products', 'orders', 'search'));
}

    // Tampilkan Form Tambah Pesanan Baru
    public function createOrder()
    {
        return view('admin.create_order');
    }

    // Simpan Data Pesanan Baru ke Database
    public function storeOrder(Request $request)
{
    $request->validate([
        'order_number'    => 'required|unique:orders,order_number',
        'customer_name'   => 'required',
        'status'          => 'required',
        'production_step' => 'required',
    ]);

    Order::create([
        'order_number'    => $request->order_number,
        'customer_name'   => $request->customer_name,
        'customer_phone'  => $request->customer_phone ?? '-',
        'total_price'     => $request->total_price ?? 0,
        'status'          => $request->status,
        'production_step' => $request->production_step,
    ]);

    // UBAH DARI '/admin' MENJADI '/admin/tambah' AGAR BISA LANGSUNG INPUT LAGI
    return redirect('/admin/tambah')->with('success', 'Pesanan ' . $request->order_number . ' berhasil disimpan! Silakan tambah pesanan berikutnya.');
}

    // Fungsi simpan produk
    public function productsStore(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'base_price'   => 'required|numeric',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:64000',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->extension();
            
            $destinationPath = public_path('images/products');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $file->move($destinationPath, $imageName);
        }

        Product::create([
            'product_name' => $request->product_name,
            'base_price'   => $request->base_price,
            'image'        => $imageName,
        ]);

        return redirect('/admin')->with('success', 'Produk baru berhasil ditambahkan ke katalog!');
    }

    // Fungsi hapus produk
    public function productsDestroy($id)
    {
        $product = Product::findOrFail($id);
        
        if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
            unlink(public_path('images/products/' . $product->image));
        }

        $product->delete();

        return redirect('/admin')->with('success', 'Produk berhasil dihapus dari katalog.');
    }

    // Fungsi update banner
    public function updateHeroBanner(Request $request)
    {
        $request->validate([
            'hero_banner' => 'required|image|mimes:jpeg,png,jpg,webp|max:64000',
        ]);

        if ($request->hasFile('hero_banner')) {
            $file = $request->file('hero_banner');
            $imageName = 'hero_banner_' . time() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $file->move($destinationPath, $imageName);

            Setting::updateOrCreate(
                ['key' => 'hero_banner'],
                ['value' => $imageName]
            );
        }

        return redirect('/admin')->with('success_banner', 'Background Hero Banner berhasil diperbarui!');
    }

    // Update Status Utama & 7 Tahapan Produksi
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        // Update status utama jika dikirim dari form
        if ($request->has('status')) {
            $order->status = $request->status;
        }

        // Update detail 7 tahapan produksi jika dikirim dari form
        if ($request->has('production_step')) {
            $order->production_step = $request->production_step;
        }

        $order->save();

        return redirect('/admin')->with('success', 'Proses pesanan ' . $order->order_number . ' berhasil diperbarui!');
    }

    // Hapus Pesanan
    public function destroyOrder($id)
    {
        $order = Order::findOrFail($id);
        $orderNumber = $order->order_number;
        $order->delete();

        return redirect('/admin')->with('success', 'Pesanan ' . $orderNumber . ' berhasil dihapus dari sistem.');
    }
}