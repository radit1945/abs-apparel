<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | ABS Apparel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { maroon: '#800000', dark: '#121212' } } } }
    </script>
</head>
<body class="bg-dark text-white font-sans antialiased">
    <nav class="bg-black py-4 border-b border-maroon">
        <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold italic tracking-widest">
                <span class="text-maroon">ABS</span> ADMIN DASHBOARD
            </h1>
            <div class="flex gap-4 items-center">
                <a href="/admin/products" class="bg-gray-800 hover:bg-gray-700 border border-gray-700 px-4 py-2 rounded font-bold text-sm transition">Kelola Katalog Produk</a>
                <a href="/admin/tambah" class="bg-maroon hover:bg-red-800 px-4 py-2 rounded font-bold text-sm transition">＋ Buat Pesanan Baru</a>
                <a href="/" class="border border-gray-700 px-4 py-2 rounded text-sm text-gray-300 hover:text-white">Ke Website Utama</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-10">
        @if(session('success'))
            <div class="bg-green-900/50 border border-green-500 text-green-200 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <h2 class="text-xl font-bold text-gray-300">Daftar Pesanan Masuk (PO Custom)</h2>
            
            <!-- Form Search & Filter -->
            <form action="/admin" method="GET" class="flex flex-wrap gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / Resi..." class="bg-black border border-gray-800 rounded px-3 py-2 text-xs text-white focus:outline-none focus:border-maroon">
                
                <select name="payment_status" class="bg-black border border-gray-800 rounded px-3 py-2 text-xs text-white focus:outline-none focus:border-maroon">
                    <option value="">Semua Status Bayar</option>
                    <option value="Menunggu DP" {{ request('payment_status') == 'Menunggu DP' ? 'selected' : '' }}>Menunggu DP</option>
                    <option value="Lunas" {{ request('payment_status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                </select>

                <button type="submit" class="bg-maroon hover:bg-red-800 text-xs px-4 py-2 rounded font-bold transition">Cari</button>
                @if(request('search') || request('payment_status'))
                    <a href="/admin" class="bg-gray-800 hover:bg-gray-700 text-xs px-3 py-2 rounded transition flex items-center">Reset</a>
                @endif
            </form>
        </div>

        <div class="bg-black/40 border border-gray-800 rounded-lg overflow-hidden shadow-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-black border-b border-gray-800 text-gray-400 text-sm">
                        <th class="p-4">No. Resi & Pemesan</th>
                        <th class="p-4">Total Harga</th>
                        <th class="p-4">Status Pembayaran</th>
                        <th class="p-4">Status Produksi Terkini</th>
                        <th class="p-4">Aksi Update Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800 text-sm">
                    @forelse($orders as $o)
                        @php 
                            $latestTrack = $o->trackings->sortByDesc('created_at')->first(); 
                        @endphp
                        <tr class="hover:bg-gray-900/40 transition">
                            <td class="p-4">
                                <p class="font-bold text-white">{{ $o->order_number }}</p>
                                <p class="text-gray-400 text-xs">{{ $o->customer_name }} ({{ $o->customer_phone }})</p>
                            </td>
                            <td class="p-4 font-semibold text-maroon">Rp {{ number_format($o->total_price, 0, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded text-xs {{ $o->payment_status == 'Lunas' ? 'bg-green-900/40 text-green-300 border border-green-700' : 'bg-yellow-900/40 text-yellow-300 border border-yellow-700' }}">
                                    {{ $o->payment_status }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="font-bold text-blue-400">{{ $latestTrack ? $latestTrack->status_nama : 'Belum ada' }}</span>
                            </td>
                            <td class="p-4">
                                <form action="/admin/tracking/{{ $o->id }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <select name="status_nama" class="bg-dark border border-gray-700 text-xs rounded px-2 py-1 text-white focus:outline-none focus:border-maroon">
                                        <option value="Design Validation">1. Design Validation</option>
                                        <option value="Payment Confirmed">2. Payment Confirmed</option>
                                        <option value="Sublim Printing">3. Sublim Printing</option>
                                        <option value="Cutting & Sewing">4. Cutting & Sewing</option>
                                        <option value="Quality Control">5. Quality Control</option>
                                        <option value="Packing">6. Packing</option>
                                        <option value="Ready to Ship">7. Ready to Ship</option>
                                    </select>
                                    <button type="submit" class="bg-gray-800 hover:bg-maroon text-xs px-3 py-1 rounded transition">Update</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500 italic">Data pesanan tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>