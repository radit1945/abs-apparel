<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan Baru | ABS Apparel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { maroon: '#800000', dark: '#0a0a0a' } } } }
    </script>
</head>
<body class="bg-dark text-white font-sans antialiased py-10 px-4">
    <div class="max-w-xl mx-auto bg-neutral-900/80 border border-neutral-800 p-8 rounded-2xl shadow-2xl">
        <div class="flex justify-between items-center border-b border-neutral-800 pb-4 mb-6">
            <h2 class="text-xl font-bold text-gray-100">＋ Tambah Pesanan Baru</h2>
            <a href="/admin" class="text-xs text-gray-400 hover:text-white transition">&larr; Batal</a>
        </div>

        <!-- Notifikasi Sukses Jika Lanjut Input Pesanan Berikutnya -->
        @if(session('success'))
            <div class="mb-5 bg-emerald-950/80 border border-emerald-500 text-emerald-200 px-4 py-3 rounded-xl text-xs flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        @endif

        <form id="orderForm" action="/admin/orders" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">Nomor Resi / Pesanan</label>
                <input type="text" name="order_number" placeholder="Contoh: 1000/ABS/2026" required class="w-full bg-black border border-neutral-700 rounded-lg p-3 text-sm text-white focus:outline-none focus:border-maroon">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">Nama Pelanggan</label>
                <input type="text" name="customer_name" placeholder="Nama Pemesan" required class="w-full bg-black border border-neutral-700 rounded-lg p-3 text-sm text-white focus:outline-none focus:border-maroon">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">No. HP / WhatsApp Pelanggan</label>
                <input type="text" name="customer_phone" placeholder="Contoh: 081234567890 (Opsional)" class="w-full bg-black border border-neutral-700 rounded-lg p-3 text-sm text-white focus:outline-none focus:border-maroon">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">Status Utama</label>
                <select name="status" class="w-full bg-black border border-neutral-700 rounded-lg p-3 text-sm text-white focus:outline-none focus:border-maroon">
                    <option value="Menunggu DP">⏳ Menunggu DP</option>
                    <option value="Sedang Diproses" selected>⚡ Sedang Diproses</option>
                    <option value="Selesai">✅ Selesai</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">Detail Tahapan PO</label>
                <select name="production_step" class="w-full bg-black border border-neutral-700 rounded-lg p-3 text-sm text-white focus:outline-none focus:border-maroon">
                    <option value="1. Konfirmasi Pembayaran">1. Konfirmasi Pembayaran</option>
                    <option value="2. Desain Final">2. Desain Final</option>
                    <option value="3. Proses Printing">3. Proses Printing</option>
                    <option value="4. Press & Cutting">4. Press & Cutting</option>
                    <option value="5. Proses Jahit">5. Proses Jahit</option>
                    <option value="6. Quality Control (QC)">6. Quality Control (QC)</option>
                    <option value="7. Siap Kirim / Selesai">7. Siap Kirim / Selesai</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-maroon hover:bg-red-800 text-white font-bold py-3 rounded-lg text-sm transition shadow-lg">
                Simpan Pesanan
            </button>
        </form>
    </div>

    <!-- Script Mencegah Enter Mengirim Form & Otomatis Pindah Kolom -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('orderForm');
            const inputs = form.querySelectorAll('input');

            inputs.forEach((input, index) => {
                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault(); // Matikan fungsi submit bawaan Enter
                        const nextInput = inputs[index + 1];
                        if (nextInput) {
                            nextInput.focus(); // Pindah kursor ke input selanjutnya (misal: ke No WA)
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>