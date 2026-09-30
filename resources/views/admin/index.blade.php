<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Terpadu | ABS Apparel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { maroon: '#800000', dark: '#0a0a0a' } } } }
    </script>
</head>
<body class="bg-dark text-white font-sans antialiased pb-20">
    
    <!-- Navbar Admin -->
<nav class="bg-black py-4 border-b border-maroon sticky top-0 z-50 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
        <!-- Logo ABS Apparel & Tulisan ADMIN -->
        <a href="/admin" class="flex items-center gap-3 group">
            <!-- Gambar Logo ABS Apparel (Pastikan file ditaruh di public/images/logo.png atau storage) -->
            @if(file_exists(public_path('images/logo-abs.png')))
                <img src="{{ asset('images/logo-abs.png') }}" alt="ABS Apparel Logo" class="h-9 w-auto object-contain">
            @else
                <!-- Fallback jika file gambar logo belum dipasang -->
                <span class="bg-maroon text-white font-black italic px-2.5 py-1 rounded-lg text-xl tracking-wider">ABS</span>
            @endif

            <span class="text-2xl font-black italic tracking-widest text-gray-100 group-hover:text-white transition">
                ADMIN
            </span>
        </a>

        <a href="/" target="_blank" class="border border-gray-700 px-5 py-2 rounded-xl text-xs font-bold text-gray-300 hover:text-white hover:bg-neutral-800 transition">
            Lihat Web Utama &rarr;
        </a>
    </div>
</nav>

    <main class="max-w-7xl mx-auto px-4 py-8 space-y-12">
        
        <!-- Notifikasi -->
        @if(session('success'))
            <div class="bg-emerald-950/80 border border-emerald-500 text-emerald-200 px-6 py-4 rounded-xl text-sm shadow-xl flex items-center gap-3">
                <span class="text-xl">✅</span> {{ session('success') }}
            </div>
        @endif
        @if(session('success_banner'))
            <div class="bg-emerald-950/80 border border-emerald-500 text-emerald-200 px-6 py-4 rounded-xl text-sm shadow-xl flex items-center gap-3">
                <span class="text-xl">✅</span> {{ session('success_banner') }}
            </div>
        @endif

        <!-- ================= SECTION: KELOLA PESANAN ================= -->
        <section class="bg-neutral-900/60 border border-neutral-800 p-6 rounded-2xl shadow-2xl">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-neutral-800 pb-4 mb-6 gap-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-100 flex items-center gap-2">
                        📦 Kelola Status Utama & Progres Produksi PO
                    </h3>
                    <p class="text-xs text-gray-400 mt-1">Status Utama menentukan warna badge pesanan, sedangkan 7 Tahapan merekam posisi detail pengerjaan.</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="bg-neutral-800 text-gray-300 px-3 py-2 rounded-xl text-xs font-bold border border-neutral-700">
                        Total: {{ count($orders ?? []) }} Order
                    </span>
                    <a href="/admin/tambah" class="bg-maroon hover:bg-red-800 text-white px-4 py-2 rounded-xl font-bold text-xs transition shadow-lg flex items-center gap-1.5">
                        <span class="text-base leading-none">＋</span> Tambah Pesanan
                    </a>
                </div>
            </div>

            <!-- FORM PENCARIAN (Cari No. Resi, Nama, atau No. WA) -->
            <div class="mb-6">
                <form action="/admin" method="GET" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="🔍 Cari No. Resi, Nama Pelanggan, atau No. WA..." 
                               class="w-full bg-black border border-neutral-700 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-maroon transition shadow-inner">
                    </div>
                    <div class="flex items-center gap-2">
                        <button type="submit" class="bg-neutral-800 hover:bg-neutral-700 border border-neutral-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition shadow-md">
                            Cari
                        </button>
                        @if(request('search'))
                            <a href="/admin" class="bg-red-950/60 hover:bg-red-900 border border-red-800 text-red-300 px-4 py-2.5 rounded-xl text-xs font-bold transition">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            
            <!-- Wrapper Pembatas Tinggi & Scrollbar Internal -->
            <div class="rounded-xl border border-neutral-800 overflow-hidden bg-black/40">
                <div class="max-h-80 overflow-y-auto">
                    <table class="w-full text-left text-sm text-gray-300">
                        <thead class="bg-black text-gray-400 uppercase text-[10px] font-bold tracking-widest border-b border-neutral-800 sticky top-0 z-10">
                            <tr>
                                <th class="p-4 bg-black">No. Resi / Order</th>
                                <th class="p-4 bg-black">Pelanggan</th>
                                <th class="p-4 bg-black">No. Telp / WA</th>
                                <th class="p-4 text-center bg-black">Status Utama (Warna Badge)</th>
                                <th class="p-4 text-center bg-black">Detail 7 Tahapan PO (Progres)</th>
                                <th class="p-4 text-right bg-black">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-800/80 bg-neutral-900/30">
                            @if(isset($orders) && count($orders) > 0)
                                @foreach($orders as $o)
                                    <tr class="hover:bg-neutral-800/50 transition duration-200 align-top">
                                        <td class="p-4">
                                            <div class="font-mono text-maroon font-bold text-base">{{ $o->order_number }}</div>
                                            <div class="text-[10px] text-gray-500 mt-0.5">{{ $o->created_at ? $o->created_at->format('d M Y, H:i') : '-' }}</div>
                                        </td>
                                        
                                        <td class="p-4 font-bold text-gray-200">{{ $o->customer_name ?? 'Pelanggan' }}</td>
                                        
                                        <!-- KOLOM NO TELP / WA PELANGGAN -->
                                        <td class="p-4 font-mono text-xs text-gray-300">
                                            @if(!empty($o->customer_phone) && $o->customer_phone != '-')
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $o->customer_phone) }}" target="_blank" class="text-emerald-400 hover:underline flex items-center gap-1">
                                                    <span>💬</span> {{ $o->customer_phone }}
                                                </a>
                                            @else
                                                <span class="text-gray-500 italic">-</span>
                                            @endif
                                        </td>
                                        
                                        <!-- 1. KOTAK PILIHAN STATUS UTAMA -->
                                        <td class="p-4 text-center">
                                            @php 
                                                $status = $o->status ?? 'Menunggu DP';
                                                
                                                if ($status == 'Selesai') {
                                                    $mainStyle = 'bg-emerald-950 text-emerald-300 border-emerald-500 font-extrabold';
                                                } elseif ($status == 'Sedang Diproses') {
                                                    $mainStyle = 'bg-amber-950 text-amber-300 border-amber-500 font-extrabold';
                                                } else {
                                                    $mainStyle = 'bg-neutral-800 text-neutral-300 border-neutral-600 font-semibold';
                                                }
                                            @endphp
                                            <form action="/admin/orders/{{ $o->id }}/status" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()" 
                                                        class="cursor-pointer px-3 py-2 rounded-xl text-xs uppercase tracking-wider border-2 focus:outline-none shadow-md transition-all {{ $mainStyle }}">
                                                    <option value="Menunggu DP" class="bg-neutral-900 text-white" {{ ($status == 'Menunggu DP') ? 'selected' : '' }}>⏳ Menunggu DP</option>
                                                    <option value="Sedang Diproses" class="bg-neutral-900 text-white" {{ ($status == 'Sedang Diproses') ? 'selected' : '' }}>⚡ Sedang Diproses</option>
                                                    <option value="Selesai" class="bg-neutral-900 text-white" {{ ($status == 'Selesai') ? 'selected' : '' }}>✅ Selesai</option>
                                                </select>
                                            </form>
                                        </td>

                                        <!-- 2. KOTAK PILIHAN 7 TAHAPAN PRODUKSI -->
                                        <td class="p-4 text-center">
                                            @php 
                                                $step = $o->production_step ?? '1. Konfirmasi Pembayaran';
                                            @endphp
                                            <form action="/admin/orders/{{ $o->id }}/status" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="production_step" onchange="this.form.submit()" 
                                                        class="cursor-pointer px-3 py-2 rounded-xl text-xs uppercase tracking-wider border border-indigo-700/50 bg-indigo-950/60 text-indigo-200 focus:outline-none shadow-md">
                                                    <option value="1. Konfirmasi Pembayaran" class="bg-neutral-900 text-white" {{ ($step == '1. Konfirmasi Pembayaran') ? 'selected' : '' }}>1. Konfirmasi Pembayaran</option>
                                                    <option value="2. Desain Final" class="bg-neutral-900 text-white" {{ ($step == '2. Desain Final') ? 'selected' : '' }}>2. Desain Final</option>
                                                    <option value="3. Proses Printing" class="bg-neutral-900 text-white" {{ ($step == '3. Proses Printing') ? 'selected' : '' }}>3. Proses Printing</option>
                                                    <option value="4. Press & Cutting" class="bg-neutral-900 text-white" {{ ($step == '4. Press & Cutting') ? 'selected' : '' }}>4. Press & Cutting</option>
                                                    <option value="5. Proses Jahit" class="bg-neutral-900 text-white" {{ ($step == '5. Proses Jahit') ? 'selected' : '' }}>5. Proses Jahit</option>
                                                    <option value="6. Quality Control (QC)" class="bg-neutral-900 text-white" {{ ($step == '6. Quality Control (QC)') ? 'selected' : '' }}>6. Quality Control (QC)</option>
                                                    <option value="7. Siap Kirim / Selesai" class="bg-neutral-900 text-white" {{ ($step == '7. Siap Kirim / Selesai') ? 'selected' : '' }}>7. Siap Kirim / Selesai</option>
                                                </select>
                                            </form>
                                        </td>

                                        <td class="p-4 text-right">
                                            <form action="/admin/orders/{{ $o->id }}" method="POST" onsubmit="return confirm('Hapus permanen data pesanan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs bg-red-950/60 hover:bg-red-600 border border-red-800 text-red-300 hover:text-white px-3 py-2 rounded-lg transition shadow-md">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="p-12 text-center text-gray-500 italic text-sm">
                                        @if(request('search'))
                                            Pesanan dengan kata kunci "<span class="text-maroon font-bold">{{ request('search') }}</span>" tidak ditemukan.
                                        @else
                                            Belum ada pesanan masuk.
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- ================= SECTION: KELOLA KATALOG & BANNER ================= -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Kolom Kiri: Form Input -->
            <div class="space-y-8">
                <!-- Tambah Produk -->
                <div class="bg-neutral-900/60 border border-neutral-800 p-6 rounded-2xl shadow-2xl">
                    <h3 class="text-lg font-bold mb-4 text-gray-200 border-b border-neutral-800 pb-2">＋ Tambah Katalog</h3>
                    <form action="/admin/products" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-[11px] font-bold text-gray-400 mb-1 uppercase tracking-wider">Nama Artikel</label>
                            <input type="text" name="product_name" required class="w-full bg-black border border-neutral-700 rounded-lg p-3 text-sm text-white focus:outline-none focus:border-maroon">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-400 mb-1 uppercase tracking-wider">Harga (Rp)</label>
                            <input type="number" name="base_price" required class="w-full bg-black border border-neutral-700 rounded-lg p-3 text-sm text-white focus:outline-none focus:border-maroon">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-400 mb-1 uppercase tracking-wider">Foto Jersey</label>
                            <input type="file" name="image" accept="image/*" class="w-full bg-black border border-neutral-700 rounded-lg p-2 text-xs text-gray-300 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:bg-neutral-800 file:text-white cursor-pointer">
                        </div>
                        <button type="submit" class="w-full bg-maroon hover:bg-red-800 text-white font-bold py-3 rounded-lg text-sm transition">Simpan Produk</button>
                    </form>
                </div>

                <!-- Update Banner -->
                <div class="bg-neutral-900/60 border border-neutral-800 p-6 rounded-2xl shadow-2xl">
                    <h3 class="text-lg font-bold mb-4 text-gray-200 border-b border-neutral-800 pb-2">🖼️ Ubah Hero Banner</h3>
                    <form action="/admin/settings/hero-banner" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="file" name="hero_banner" accept="image/*" required class="w-full bg-black border border-neutral-700 rounded-lg p-2 text-xs text-gray-300 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:bg-neutral-800 file:text-white cursor-pointer">
                        <button type="submit" class="w-full border border-gray-600 hover:bg-gray-800 text-white font-bold py-3 rounded-lg text-sm transition">Update Banner</button>
                    </form>
                </div>
            </div>

            <!-- Kolom Kanan: Daftar Katalog -->
            <div class="lg:col-span-2 bg-neutral-900/60 border border-neutral-800 p-6 rounded-2xl shadow-2xl">
                <h3 class="text-lg font-bold mb-4 text-gray-200 border-b border-neutral-800 pb-2">Daftar Katalog Jersey</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-h-96 overflow-y-auto pr-1">
                    @if(isset($products) && count($products) > 0)
                        @foreach($products as $p)
                            <div class="bg-black border border-neutral-800 rounded-xl p-4 flex gap-4 items-center justify-between hover:border-neutral-600 transition group">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-20 bg-neutral-900 rounded-lg border border-neutral-800 overflow-hidden">
                                        @if(!empty($p->image))
                                            <img src="{{ asset('images/products/' . $p->image) }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-sm text-gray-200 line-clamp-1">{{ $p->product_name }}</h4>
                                        <p class="text-maroon font-bold text-sm mt-1">Rp {{ number_format($p->base_price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <form action="/admin/products/{{ $p->id }}" method="POST" onsubmit="return confirm('Hapus produk ini dari web?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-500 hover:text-red-400 bg-red-950/30 hover:bg-red-900/50 p-2.5 rounded-lg transition" title="Hapus Produk">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-2 text-center text-gray-500 text-sm py-10">Katalog masih kosong.</div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>
</html>