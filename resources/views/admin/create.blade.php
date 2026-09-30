<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pesanan Baru | ABS Apparel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { maroon: '#800000', dark: '#121212' } } } }
    </script>
</head>
<body class="bg-dark text-white font-sans antialiased">
    <nav class="bg-black py-4 border-b border-maroon">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold italic tracking-widest">
                <span class="text-maroon">ABS</span> APPAREL
            </h1>
            <a href="/admin" class="border border-gray-700 px-4 py-2 rounded text-sm text-gray-300 hover:text-white transition">&larr; Kembali ke Dashboard</a>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto px-4 py-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-200">Buat Pesanan PO Custom Baru</h2>

        <form action="/admin/tambah" method="POST" class="bg-black/40 border border-gray-800 p-6 rounded-xl space-y-5 shadow-xl">
            @csrf

            <div>
                <label class="block text-sm text-gray-400 mb-1 font-semibold">Nama Pemesan / Komunitas / Tim</label>
                <input type="text" name="customer_name" required placeholder="Contoh: FC Barcelona Fans Club" class="w-full bg-dark border border-gray-700 rounded p-3 text-white focus:outline-none focus:border-maroon transition">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-1 font-semibold">Nomor WhatsApp / HP</label>
                <input type="text" name="customer_phone" required placeholder="Contoh: 08123456789" class="w-full bg-dark border border-gray-700 rounded p-3 text-white focus:outline-none focus:border-maroon transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-1 font-semibold">Pilih Jenis Produk</label>
                    <select id="select_product" class="w-full bg-dark border border-gray-700 rounded p-3 text-white focus:outline-none focus:border-maroon transition">
                        @if(isset($products) && count($products) > 0)
                            @foreach($products as $p)
                                <option value="{{ $p->base_price }}">{{ $p->product_name }} - Rp {{ number_format($p->base_price, 0, ',', '.') }}</option>
                            @endforeach
                        @else
                            <option value="0">Belum ada produk di katalog</option>
                        @endif
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1 font-semibold">Jumlah (Pcs)</label>
                    <input type="number" id="qty_input" min="1" value="12" class="w-full bg-dark border border-gray-700 rounded p-3 text-white focus:outline-none focus:border-maroon transition">
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-1 font-semibold">Total Harga Pesanan (Rp)</label>
                <input type="number" id="total_price_input" name="total_price" required readonly class="w-full bg-black/60 border border-gray-800 rounded p-3 text-maroon font-black text-xl focus:outline-none cursor-not-allowed">
            </div>

            <button type="submit" class="w-full bg-maroon hover:bg-red-800 text-white py-3 rounded-lg font-bold text-base transition shadow-lg">
                Simpan Pesanan & Generate Resi
            </button>
        </form>
    </main>

    <script>
        const selectProduct = document.getElementById('select_product');
        const qtyInput = document.getElementById('qty_input');
        const totalPriceInput = document.getElementById('total_price_input');

        function hitungTotalAdmin() {
            let price = parseInt(selectProduct.value) || 0;
            let qty = parseInt(qtyInput.value) || 0;
            totalPriceInput.value = price * qty;
        }

        selectProduct.addEventListener('change', hitungTotalAdmin);
        qtyInput.addEventListener('input', hitungTotalAdmin);
        
        // Jalankan hitung otomatis pertama kali
        hitungTotalAdmin();
    </script>
</body>
</html>