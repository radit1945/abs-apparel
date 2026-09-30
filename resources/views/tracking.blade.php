<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Pesanan | ABS Apparel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { maroon: '#800000', dark: '#121212' } } } }
    </script>
</head>
<body class="bg-dark text-white font-sans antialiased">
    <!-- Navigasi -->
    <nav class="bg-black py-4 border-b border-maroon">
        <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
            <a href="/" class="text-3xl font-extrabold italic tracking-widest">
                <span class="text-maroon">A</span>BS
            </a>
            <a href="/" class="text-gray-400 hover:text-white text-sm">Kembali ke Beranda</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-16">
        <div class="bg-black/50 border border-gray-800 rounded-xl p-8 shadow-xl">
            <h2 class="text-2xl font-bold mb-6 text-center border-b border-gray-800 pb-4">Lacak Pesanan Anda</h2>
            
            <!-- Kotak Pencarian -->
            <form action="{{ url('/cek-pesanan') }}" method="POST" class="flex flex-col md:flex-row gap-4 mb-8">
                @csrf
                <input type="text" name="order_number" placeholder="Contoh: 001/ABS/2026" required
                    class="flex-1 bg-dark border border-gray-700 text-white rounded-md px-4 py-3 focus:outline-none focus:border-maroon">
                <button type="submit" class="bg-maroon hover:bg-red-800 text-white px-6 py-3 rounded-md font-bold transition shadow-lg">
                    Cek Status
                </button>
            </form>

            <!-- Pesan Error jika tidak ketemu -->
            @if(session('error'))
                <div class="bg-red-900/50 border border-red-500 text-red-200 p-4 rounded-md mb-6 text-center text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Hasil Pencarian -->
            @if(isset($order))
                <div class="border border-gray-700 rounded-xl p-6 bg-dark space-y-6">
                    <!-- Header Info Pesanan -->
                    <div class="flex justify-between items-center border-b border-gray-800 pb-4">
                        <div>
                            <p class="text-gray-400 text-xs uppercase tracking-wider">Nomor Pesanan</p>
                            <p class="text-xl font-bold font-mono text-maroon">{{ $order->order_number }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-400 text-xs uppercase tracking-wider">Nama Pemesan</p>
                            <p class="text-base font-semibold text-white">{{ $order->customer_name ?? 'Pelanggan' }}</p>
                        </div>
                    </div>

                    <!-- Status Utama (Warna Badge Dinamis) -->
                    <div class="flex justify-between items-center bg-black/40 border border-gray-800 p-4 rounded-lg">
                        <span class="text-gray-400 text-sm font-semibold">Status Utama Pesanan:</span>
                        @php
                            $status = $order->status ?? 'Menunggu DP';
                            if ($status == 'Selesai') {
                                $badgeStyle = 'bg-emerald-950 text-emerald-300 border-emerald-500';
                            } elseif ($status == 'Sedang Diproses') {
                                $badgeStyle = 'bg-amber-950 text-amber-300 border-amber-500';
                            } else {
                                $badgeStyle = 'bg-neutral-800 text-neutral-300 border-neutral-600';
                            }
                        @endphp
                        <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider border {{ $badgeStyle }}">
                            {{ $status }}
                        </span>
                    </div>
                    
                    <!-- Detail 7 Tahapan Progres PO -->
                    <div>
                        <h3 class="font-bold text-maroon mb-3 text-sm uppercase tracking-wider">Progres Pengerjaan Saat Ini:</h3>
                        <div class="p-4 rounded-xl border border-indigo-900/50 bg-indigo-950/40 flex items-center justify-between shadow-inner">
                            <div class="flex items-center gap-3">
                                <span class="w-3 h-3 rounded-full bg-indigo-500 animate-pulse"></span>
                                <span class="font-bold text-white text-base">{{ $order->production_step ?? '1. Konfirmasi Pembayaran' }}</span>
                            </div>
                            <span class="text-xs text-gray-400">Update Terakhir</span>
                        </div>
                    </div>

                    <div class="text-center pt-2">
                        <p class="text-[11px] text-gray-500 italic">Pesanan pre-order jersey dikerjakan sesuai standar kualitas ABS Apparel.</p>
                    </div>
                </div>
            @endif
        </div>
    </main>
</body>
</html>