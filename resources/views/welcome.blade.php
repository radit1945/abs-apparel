<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABS APPAREL | Premium Sportswear Vendor</title>
    
    <!-- Google Fonts: Montserrat & Oswald -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,800;0,900;1,900&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        display: ['Oswald', 'sans-serif'],
                    },
                    colors: {
                        maroon: {
                            DEFAULT: '#800000',
                            light: '#a00000',
                            dark: '#500000',
                        },
                        dark: '#0a0a0a',
                        card: '#121212',
                        cardHover: '#181818'
                    }
                }
            }
        }
    </script>
    <style>
        .glow-maroon {
            box-shadow: 0 0 35px -5px rgba(128, 0, 0, 0.45);
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(128, 0, 0, 0.6);
        }
    </style>
</head>
<body class="bg-dark text-white font-sans antialiased selection:bg-maroon selection:text-white tracking-tight">


    <!-- Header / Navbar Sticky Glassmorphism -->
    <nav class="bg-dark/85 backdrop-blur-md py-4 border-b border-neutral-800/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="#" class="flex items-center gap-3 group">
    <!-- Panggilan Gambar Logo ABS -->
    <img src="{{ asset('images/logo-abs.png') }}" alt="Logo ABS Apparel" class="h-10 w-auto object-contain transition duration-300 group-hover:scale-105 drop-shadow-md">
    
    <!-- Teks Pendamping (Opsional: Hapus div ini jika hanya ingin menampilkan gambar logo saja) -->
    <span class="font-display text-2xl font-bold italic tracking-wider">
        <span class=<span class="text-white">APPAREL</span>
    </span>
</a>
            
            <div class="hidden md:flex items-center gap-8 text-xs font-extrabold uppercase tracking-widest text-neutral-300">
                <a href="#katalog" class="hover:text-maroon transition">Katalog </a>
                <a href="#size-chart" class="hover:text-maroon transition">Size Chart</a>
                <a href="#keunggulan" class="hover:text-maroon transition">Keunggulan</a>
                <a href="#alur" class="hover:text-maroon transition">Alur PO</a>
                <a href="#kalkulator" class="hover:text-maroon transition">Harga</a>
            </div>

            <div>
                <a href="/cek-pesanan" class="bg-neutral-900 hover:bg-maroon border border-neutral-700 hover:border-maroon text-white transition duration-300 px-5 py-2.5 rounded-full font-bold text-xs uppercase tracking-wider inline-block shadow-lg">
                    Cek Tracking PO
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Dinamis membaca background dari Admin Dashboard) -->
    <section class="relative bg-dark py-24 md:py-32 overflow-hidden border-b border-neutral-800/60 flex items-center justify-center">
        
        <!-- Layer Background Gambar Dinamis (Diterangkan) -->
        <div class="absolute inset-0 z-0">
            @if(isset($heroBanner) && $heroBanner != '')
                <!-- Opacity dinaikkan ke 80% agar gambar jauh lebih terang dan jelas -->
                <img src="{{ asset('images/' . $heroBanner) }}" alt="ABS Apparel Background" class="w-full h-full object-cover object-center opacity-80">
            @else
                <img src="{{ asset('images/hero_banner_1790086801.jpg') }}" alt="ABS Apparel Background" class="w-full h-full object-cover object-center opacity-80">
            @endif
            
            <!-- Dark Overlay ditipiskan tipis saja (from-dark/50) agar tulisan tetap terbaca tapi gambar di belakangnya terang -->
            <div class="absolute inset-0 bg-gradient-to-b from-dark/60 via-dark/30 to-dark/90"></div>
        </div>
        
        <!-- Konten Teks & Tombol -->
        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 bg-neutral-900/90 border border-neutral-800 px-4 py-1.5 rounded-full mb-8 shadow-inner backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-neutral-300">Custom Sportswear Manufacturer</span>
            </div>

            <h1 class="font-display text-5xl md:text-8xl font-extrabold uppercase tracking-normal leading-none mb-6 drop-shadow-2xl">
                JERSEY CUSTOM <br>
                <span class="text-maroon text-glow italic">LEVEL PROFESSIONAL</span>
            </h1>

            <p class="text-neutral-300 text-sm md:text-base max-w-2xl mx-auto mb-10 leading-relaxed font-normal drop-shadow">
                Vendor konveksi jersey buatan lokal kualitas standar liga. Menggunakan bahan Drifit Airflow anti-bakteri, teknik Fullprint Sublimasi HD, serta jahitan rantai presisi.
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#kalkulator" class="w-full sm:w-auto bg-maroon hover:bg-maroon-light text-white font-extrabold text-xs uppercase tracking-widest px-8 py-4 rounded-full transition duration-300 glow-maroon">
                    Hitung Simulasi Harga
                </a>
                <a href="#katalog" class="w-full sm:w-auto bg-neutral-900/90 hover:bg-neutral-800 border border-neutral-700 text-white font-extrabold text-xs uppercase tracking-widest px-8 py-4 rounded-full transition duration-300 backdrop-blur-sm">
                    Eksplor Katalog
                </a>
            </div>
        </div>
    </section>

    <!-- Stat Pillars / Trust Indicators -->
     <section id="keunggulan" class="scroll-mt-28 py-16 bg-dark text-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold text-center mb-10">Keunggulan Kami</h2>
    <section class="border-b border-neutral-800/60 bg-black/60 py-12" id="keunggulan">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="border-r border-neutral-800/60 last:border-0">
                <p class="font-display text-4xl md:text-5xl font-bold text-maroon">1.000+</p>
                <p class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mt-1">Jersey Diproduksi</p>
            </div>
            <div class="border-r border-neutral-800/60 last:border-0">
                <p class="font-display text-4xl md:text-5xl font-bold text-white">100%</p>
                <p class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mt-1">Drifit Anti-UV</p>
            </div>
            <div class="border-r border-neutral-800/60 last:border-0">
                <p class="font-display text-4xl md:text-5xl font-bold text-maroon">6 PCS</p>
                <p class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mt-1">Minimal Order</p>
            </div>
            <div>
                <p class="font-display text-4xl md:text-5xl font-bold text-white">7 HARI</p>
                <p class="text-[11px] font-bold text-neutral-400 uppercase tracking-wider mt-1">Estimasi Selesai</p>
            </div>
        </div>
    </section>

    <!-- Katalog Lookbook Section -->
    <section class="max-w-7xl mx-auto px-6 py-24" id="katalog">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-maroon block mb-1">// Product Catalog</span>
                <h2 class="font-display text-4xl md:text-5xl font-bold uppercase tracking-wide">
                    KATALOG 
                </h2>
            </div>
            <p class="text-neutral-400 text-xs md:text-sm max-w-md">
                Klik kartu produk untuk melihat detail rincian bahan, teknologi sablon, dan konsultasi desain gratis.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(isset($products) && count($products) > 0): ?>
                <?php foreach($products as $p): ?>
                    <div onclick="bukaModal('<?php echo e($p->product_name); ?>', '<?php echo e(number_format($p->base_price, 0, ',', '.')); ?>', '<?php echo e(!empty($p->image) ? asset('images/products/' . $p->image) : ''); ?>')" 
                         class="bg-card border border-neutral-800/80 rounded-2xl overflow-hidden hover:border-maroon/80 hover:bg-cardHover transition duration-500 group cursor-pointer flex flex-col justify-between shadow-xl hover:-translate-y-1">
                        
                        <div>
                            <!-- Aspect ratio 4:5 Portrait -->
                            <div class="aspect-[4/5] bg-neutral-900 relative overflow-hidden flex items-center justify-center">
                                <span class="absolute top-4 left-4 z-10 bg-maroon/90 backdrop-blur-md text-white text-[10px] font-extrabold uppercase px-3 py-1 rounded-full tracking-wider shadow-md">
                                    AUTHENTIC
                                </span>
                                
                                <?php if(!empty($p->image)): ?>
                                    <img src="<?php echo e(asset('images/products/' . $p->image)); ?>" alt="<?php echo e($p->product_name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out">
                                <?php else: ?>
                                    <div class="text-center p-6">
                                        <span class="font-display text-2xl font-bold italic tracking-widest text-neutral-700 block">ABS APPAREL</span>
                                        <span class="text-[10px] text-neutral-600 uppercase tracking-widest mt-1 block">Custom Sportswear</span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-6">
                                    <span class="text-xs font-bold uppercase tracking-wider text-white bg-maroon px-4 py-2 rounded-lg w-full text-center shadow-lg">
                                        Lihat Detail Spesifikasi
                                    </span>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <h3 class="font-display text-xl font-bold uppercase tracking-wide text-white group-hover:text-maroon transition duration-300 mb-2">
                                    <?php echo e($p->product_name); ?>

                                </h3>
                                <p class="text-xs text-neutral-400 leading-relaxed line-clamp-2">
                                    Kain Drifit Premium, cetak Sublimasi Fullprint HD anti luntur, gratis custom logo & atribut tim.
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-0 flex justify-between items-center border-t border-neutral-800/50 mt-auto">
                            <div class="pt-4">
                                <span class="text-[10px] uppercase font-bold text-neutral-500 block">Harga Dasar</span>
                                <span class="font-display text-2xl font-bold text-maroon">Rp <?php echo e(number_format($p->base_price, 0, ',', '.')); ?></span>
                            </div>
                            <div class="pt-4">
                                <span class="text-xs font-bold uppercase tracking-wider text-neutral-400 group-hover:text-white transition flex items-center gap-1">
                                    Detail &rarr;
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 text-center py-16 bg-card border border-neutral-800 rounded-2xl">
                    <p class="text-neutral-500 text-sm italic">Belum ada produk jersey di dalam katalog.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

<!-- Section Size Chart / Panduan Ukuran -->
<section id="size-chart" class="space-y-8 pt-8 scroll-mt-24">
    <div class="text-center space-y-2">
        <h2 class="text-3xl font-extrabold italic uppercase tracking-wider">Panduan <span class="text-maroon">Ukuran (Size Chart)</span></h2>
        <p class="text-gray-400 text-sm">Pastikan memilih ukuran jersey yang pas sesuai dengan standar ABS Apparel (Toleransi ± 1 cm).</p>
    </div>

    <div class="bg-black/50 border border-gray-800 rounded-2xl p-6 md:p-8 shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-maroon bg-maroon/20 text-white text-sm uppercase tracking-wider">
                        <th class="p-4 rounded-tl-lg">Size</th>
                        <th class="p-4">Lebar Dada (cm)</th>
                        <th class="p-4">Panjang Badan (cm)</th>
                        <th class="p-4 rounded-tr-lg">Rekomendasi Postur</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800 text-sm font-medium">
                    <tr class="hover:bg-neutral-900/50 transition">
                        <td class="p-4 font-bold text-maroon font-mono text-base">S</td>
                        <td class="p-4 text-gray-300">48 cm</td>
                        <td class="p-4 text-gray-300">68 cm</td>
                        <td class="p-4 text-gray-400 text-xs">BB 45 - 55 kg | TB 155 - 165 cm</td>
                    </tr>
                    <tr class="hover:bg-neutral-900/50 transition">
                        <td class="p-4 font-bold text-maroon font-mono text-base">M</td>
                        <td class="p-4 text-gray-300">50 cm</td>
                        <td class="p-4 text-gray-300">70 cm</td>
                        <td class="p-4 text-gray-400 text-xs">BB 55 - 65 kg | TB 160 - 170 cm</td>
                    </tr>
                    <tr class="hover:bg-neutral-900/50 transition">
                        <td class="p-4 font-bold text-maroon font-mono text-base">L</td>
                        <td class="p-4 text-gray-300">52 cm</td>
                        <td class="p-4 text-gray-300">72 cm</td>
                        <td class="p-4 text-gray-400 text-xs">BB 65 - 75 kg | TB 165 - 175 cm</td>
                    </tr>
                    <tr class="hover:bg-neutral-900/50 transition">
                        <td class="p-4 font-bold text-maroon font-mono text-base">XL</td>
                        <td class="p-4 text-gray-300">54 cm</td>
                        <td class="p-4 text-gray-300">74 cm</td>
                        <td class="p-4 text-gray-400 text-xs">BB 75 - 85 kg | TB 170 - 180 cm</td>
                    </tr>
                    <tr class="hover:bg-neutral-900/50 transition">
                        <td class="p-4 font-bold text-maroon font-mono text-base">XXL</td>
                        <td class="p-4 text-gray-300">56 cm</td>
                        <td class="p-4 text-gray-300">76 cm</td>
                        <td class="p-4 text-gray-400 text-xs">BB 85 - 95 kg | TB 175 - 185 cm</td>
                    </tr>
                    <tr class="hover:bg-neutral-900/50 transition">
                        <td class="p-4 font-bold text-maroon font-mono text-base">3XL</td>
                        <td class="p-4 text-gray-300">58 cm</td>
                        <td class="p-4 text-gray-300">78 cm</td>
                        <td class="p-4 text-gray-400 text-xs">BB > 95 kg | TB > 180 cm</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 pt-4 border-t border-gray-800 text-center">
            <p class="text-xs text-gray-500 italic">*Lebar dada diukur dari ketiak kiri ke ketiak kanan. Panjang diukur dari bahu ke bawah.</p>
        </div>
    </div>
</section>

    <!-- 7 Step Pre-Order Flow -->
    <section class="max-w-7xl mx-auto px-6 py-24 border-t border-neutral-800/60" id="alur">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-maroon block mb-1">// Production Standard</span>
            <h2 class="font-display text-4xl font-bold uppercase tracking-wide">
                7 TAHAPAN <span class="text-maroon italic">PRODUKSI PO</span>
            </h2>
            <p class="text-neutral-400 text-xs md:text-sm mt-2">Transparansi penuh dari tahap validasi desain hingga pengiriman paket.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-card border border-neutral-800 p-6 rounded-2xl relative overflow-hidden group hover:border-maroon/60 transition duration-300">
                <span class="font-display text-6xl font-bold text-neutral-800/30 absolute -right-2 -bottom-2 group-hover:text-maroon/20 transition">01</span>
                <span class="text-[10px] font-bold text-maroon uppercase tracking-widest">Tahap 01</span>
                <h4 class="font-bold text-sm mt-1 text-white uppercase">Design Validation</h4>
                <p class="text-neutral-400 text-xs mt-2 leading-relaxed">Pengecekan mock-up, tata letak logo, nomor punggung, dan size chart.</p>
            </div>

            <div class="bg-card border border-neutral-800 p-6 rounded-2xl relative overflow-hidden group hover:border-maroon/60 transition duration-300">
                <span class="font-display text-6xl font-bold text-neutral-800/30 absolute -right-2 -bottom-2 group-hover:text-maroon/20 transition">02</span>
                <span class="text-[10px] font-bold text-maroon uppercase tracking-widest">Tahap 02</span>
                <h4 class="font-bold text-sm mt-1 text-white uppercase">Payment Confirmed</h4>
                <p class="text-neutral-400 text-xs mt-2 leading-relaxed">Konfirmasi DP masuk dan antrean bahan kain resmi dibuka.</p>
            </div>

            <div class="bg-card border border-neutral-800 p-6 rounded-2xl relative overflow-hidden group hover:border-maroon/60 transition duration-300">
                <span class="font-display text-6xl font-bold text-neutral-800/30 absolute -right-2 -bottom-2 group-hover:text-maroon/20 transition">03</span>
                <span class="text-[10px] font-bold text-maroon uppercase tracking-widest">Tahap 03</span>
                <h4 class="font-bold text-sm mt-1 text-white uppercase">Sublim Printing</h4>
                <p class="text-neutral-400 text-xs mt-2 leading-relaxed">Pencetakan tinta sublimasi ke kertas transfer lalu di-press ke kain high-temp.</p>
            </div>

            <div class="bg-card border border-neutral-800 p-6 rounded-2xl relative overflow-hidden group hover:border-maroon/60 transition duration-300">
                <span class="font-display text-6xl font-bold text-neutral-800/30 absolute -right-2 -bottom-2 group-hover:text-maroon/20 transition">04</span>
                <span class="text-[10px] font-bold text-maroon uppercase tracking-widest">Tahap 04</span>
                <h4 class="font-bold text-sm mt-1 text-white uppercase">Cutting & Sewing</h4>
                <p class="text-neutral-400 text-xs mt-2 leading-relaxed">Pemotongan pola presisi dan penjahitan benang ganda standar apparel.</p>
            </div>

            <div class="bg-card border border-neutral-800 p-6 rounded-2xl relative overflow-hidden group hover:border-maroon/60 transition duration-300">
                <span class="font-display text-6xl font-bold text-neutral-800/30 absolute -right-2 -bottom-2 group-hover:text-maroon/20 transition">05</span>
                <span class="text-[10px] font-bold text-maroon uppercase tracking-widest">Tahap 05</span>
                <h4 class="font-bold text-sm mt-1 text-white uppercase">Quality Control</h4>
                <p class="text-neutral-400 text-xs mt-2 leading-relaxed">Pemeriksaan kualitas jahitan, kecocokan nama, dan ukuran per jersey.</p>
            </div>

            <div class="bg-card border border-neutral-800 p-6 rounded-2xl relative overflow-hidden group hover:border-maroon/60 transition duration-300">
                <span class="font-display text-6xl font-bold text-neutral-800/30 absolute -right-2 -bottom-2 group-hover:text-maroon/20 transition">06</span>
                <span class="text-[10px] font-bold text-maroon uppercase tracking-widest">Tahap 06</span>
                <h4 class="font-bold text-sm mt-1 text-white uppercase">Packing</h4>
                <p class="text-neutral-400 text-xs mt-2 leading-relaxed">Pembersihan sisa benang dan pengemasan ke plastik ziplock eksklusif.</p>
            </div>

            <div class="bg-maroon/10 border border-maroon/40 p-6 rounded-2xl lg:col-span-2 relative overflow-hidden group">
                <span class="font-display text-6xl font-bold text-maroon/20 absolute -right-2 -bottom-2">07</span>
                <span class="text-[10px] font-bold text-maroon uppercase tracking-widest">Tahap Final</span>
                <h4 class="font-bold text-sm mt-1 text-white uppercase">Ready to Ship</h4>
                <p class="text-neutral-300 text-xs mt-2 leading-relaxed">Pelunasan tagihan sisa dan pengiriman paket via kurir pilihan pemesan.</p>
            </div>
        </div>
    </section>

    <!-- Pricing Calculator Section -->
    <section class="max-w-4xl mx-auto px-6 py-24 border-t border-neutral-800/60" id="kalkulator">
        <div class="bg-card border border-neutral-800 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
            <div class="text-center mb-10">
                <span class="text-xs font-bold uppercase tracking-widest text-maroon block mb-1">// Instant Estimator</span>
                <h3 class="font-display text-3xl md:text-4xl font-bold uppercase tracking-wide">KALKULATOR HARGA & ORDER</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-400 mb-2">Pilih Model Jersey</label>
                    <select id="produk" class="w-full bg-dark border border-neutral-700 text-white rounded-xl px-4 py-3.5 focus:outline-none focus:border-maroon transition text-xs font-semibold">
                        <?php if(isset($products) && count($products) > 0): ?>
                            <?php foreach($products as $p): ?>
                                <option value="<?php echo e($p->base_price); ?>"><?php echo e($p->product_name); ?> - Rp <?php echo e(number_format($p->base_price, 0, ',', '.')); ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="0">Tidak ada produk tersedia</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-neutral-400 mb-2">Jumlah Order (Min. 6 Pcs)</label>
                    <input type="number" id="jumlah" min="6" value="12" class="w-full bg-dark border border-neutral-700 text-white rounded-xl px-4 py-3.5 focus:outline-none focus:border-maroon transition text-xs font-bold">
                </div>
            </div>

            <div class="mt-8 bg-dark p-6 rounded-2xl border border-neutral-800 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-center md:text-left">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-neutral-500">Estimasi Total Biaya</p>
                    <p class="font-display text-4xl font-bold text-maroon mt-1" id="total_harga">Rp 0</p>
                </div>
                <button onclick="pesanWa()" class="w-full md:w-auto bg-emerald-600 hover:bg-emerald-500 text-white px-8 py-4 rounded-xl font-extrabold text-xs uppercase tracking-widest transition duration-300 flex items-center justify-center gap-2 shadow-lg">
                    Konsultasi & Order via WhatsApp
                </button>
            </div>
        </div>
    </section>

    <!-- Modal Detail Produk -->
    <div id="productModal" class="fixed inset-0 bg-black/85 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
        <div class="bg-card border border-neutral-800 rounded-3xl max-w-lg w-full p-6 md:p-8 relative shadow-2xl">
            <button onclick="tutupModal()" class="absolute top-5 right-5 text-neutral-400 hover:text-white font-bold text-2xl">&times;</button>
            
            <div id="modalImageContainer" class="aspect-[4/3] bg-neutral-900 rounded-2xl mb-6 flex items-center justify-center border border-neutral-800 overflow-hidden">
                <!-- Foto dimuat dinamis via JS -->
            </div>

            <h3 id="modalTitle" class="font-display text-2xl font-bold uppercase tracking-wide text-white mb-1">Nama Produk</h3>
            <p id="modalPrice" class="font-display text-2xl font-bold text-maroon mb-6">Rp 0</p>
            
            <div class="border-t border-neutral-800 pt-4 mb-6 space-y-2.5 text-xs text-neutral-300">
                <p class="flex justify-between"><strong class="text-neutral-500 uppercase">Bahan Utama:</strong> <span>Drifit Airflow Premium</span></p>
                <p class="flex justify-between"><strong class="text-neutral-500 uppercase">Metode Cetak:</strong> <span>Fullprint Sublimasi HD</span></p>
                <p class="flex justify-between"><strong class="text-neutral-500 uppercase">Min. Order:</strong> <span>6 Pcs (Bisa Campur Size)</span></p>
                <p class="flex justify-between"><strong class="text-neutral-500 uppercase">Bonus:</strong> <span>Free Custom Logo & Nameset</span></p>
            </div>

            <div class="flex gap-3">
                <button onclick="tutupModal()" class="w-1/2 bg-neutral-800 hover:bg-neutral-700 py-3.5 rounded-xl font-extrabold text-xs uppercase tracking-wider transition">Tutup</button>
                <a href="#kalkulator" onclick="tutupModal()" class="w-1/2 bg-maroon hover:bg-maroon-light text-center py-3.5 rounded-xl font-extrabold text-xs uppercase tracking-wider transition">Order Sekarang</a>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
<footer class="bg-black border-t border-neutral-800 text-gray-400 py-12">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        
        <!-- Kolom 1: Tentang Brand -->
        <div>
            <h3 class="text-xl font-extrabold italic tracking-widest text-white mb-3">
                <span class="text-maroon">ABS</span> APPAREL
            </h3>
            <p class="text-xs text-gray-400 leading-relaxed">
                Pusat pembuatan jersey custom pre-order berkualitas tinggi dengan desain eksklusif dan material pilihan terbaik.
            </p>
        </div>

        <!-- Kolom 2: Kontak & Media Sosial (Bisa Dipencet) -->
        <div>
            <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-neutral-800 pb-2">Hubungi Kami</h4>
            <ul class="space-y-3 text-xs">
                <!-- WhatsApp Link (Ganti nomor di belakang wa.me/ dengan nomor HP kamu, awalin pakai 62 tanpa angka 0 di depan) -->
                <li>
                    <a href="https://wa.me/628131850077?text=Halo%20ABS%20Apparel,%20saya%20ingin%20tanya%20pemesanan%20jersey" 
                       target="_blank" 
                       class="flex items-center gap-2.5 hover:text-white transition group">
                        <span class="p-2 bg-neutral-900 border border-neutral-800 rounded-lg text-emerald-400 group-hover:border-emerald-500 transition">
                            <!-- Icon WhatsApp -->
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </span>
                        <span>+62 812-3456-7890</span>
                    </a>
                </li>

                <!-- Instagram Link (Ganti username/link dengan IG kamu) -->
                <li>
                    <a href="https://instagram.com/abs.apparels" 
                       target="_blank" 
                       class="flex items-center gap-2.5 hover:text-white transition group">
                        <span class="p-2 bg-neutral-900 border border-neutral-800 rounded-lg text-pink-400 group-hover:border-pink-500 transition">
                            <!-- Icon Instagram -->
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </span>
                        <span>@abs.apparels</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Kolom 3: Lokasi / Alamat (Bisa Dipencet Buka Google Maps) -->
        <div>
            <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-neutral-800 pb-2">Lokasi Workshop / Store</h4>
            <!-- Link Google Maps (Ganti link href dengan titik koordinat maps kamu) -->
            <a href="https://l.instagram.com/?u=https%3A%2F%2Fmaps.app.goo.gl%2FiNtNxGLKTgUUwARQ9%3Futm_source%3Dig%26utm_medium%3Dsocial%26utm_content%3Dlink_in_bio%26fbclid%3DPAcGRvZgJleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA85MzY2MTk3NDMzOTI0NTkAAadGOlEnaAg6M6L3mzziIQ9G0NXBOm0Qn81FmShx9A5W1317wy4_m-ABN4epOQ_aem_OS9MYgCquZtrL5W-lUb3Kw&e=AUAIi4emE6mSYn7g58dTzdfSvJtQMhTHCjHAJppECiSUlZAl2KPmFVkHis4Fi_unbjtDsol0m62a8EU5RtaxQ3HRbHod2adQw4yu92wegqeVTmhiEI794LcowKCGy3CDZd9M4z8" 
               target="_blank" 
               class="flex items-start gap-2.5 text-xs hover:text-white transition group">
                <span class="p-2 bg-neutral-900 border border-neutral-800 rounded-lg text-red-500 group-hover:border-red-600 transition flex-shrink-0 mt-0.5">
                    <!-- Icon Location Marker -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </span>
                <span>
                    <strong class="text-white block mb-1">ABS Apparel Store</strong>
                    Jalan permata raya Block G1 No.25 TM royal 1, RT.004/RW.016, Tanah Tinggi, Kec. Tangerang, Kota Tangerang, Banten 15141<br>
                    <span class="text-[10px] text-maroon font-bold underline mt-1 block">Buka di Google Maps &rarr;</span>
                </span>
            </a>
        </div>

    </div>

    <!-- Copyright Bawah -->
    <div class="max-w-7xl mx-auto px-4 pt-8 border-t border-neutral-900 text-center text-xs text-neutral-500">
        &copy; 2026 ABS Apparel. All rights reserved.
    </div>
</footer>

    <!-- Script Logic -->
    <script>
        const formatRupiah = (angka) => {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);
        };

        const produkSelect = document.getElementById('produk');
        const jumlahInput = document.getElementById('jumlah');
        const totalHargaText = document.getElementById('total_harga');

        function hitungTotal() {
            let harga = parseInt(produkSelect.value) || 0;
            let jumlah = parseInt(jumlahInput.value) || 6;
            
            if(jumlah < 6) {
                jumlah = 6;
                jumlahInput.value = 6;
            }

            let total = harga * jumlah;
            totalHargaText.innerText = formatRupiah(total);
        }

        function pesanWa() {
            let selectedOption = produkSelect.options[produkSelect.selectedIndex];
            let namaProduk = selectedOption ? selectedOption.text.split(' - ')[0] : 'Custom Jersey';
            let jumlah = jumlahInput.value;
            let total = formatRupiah(parseInt(produkSelect.value) * jumlah);
            
            let noWa = "628131850077"; 
            let pesan = `Halo ABS Apparel!\n\nSaya ingin konsultasi PO Custom Jersey:\n\nProduk: *${namaProduk}*\nJumlah: *${jumlah} pcs*\nEstimasi Total: *${total}*\n\nMohon info selengkapnya mengenai proses desain dan pembayaran DP. Terima kasih!`;
            
            let linkWa = `https://wa.me/${noWa}?text=${encodeURIComponent(pesan)}`;
            window.open(linkWa, '_blank');
        }

        produkSelect.addEventListener('change', hitungTotal);
        jumlahInput.addEventListener('input', hitungTotal);
        hitungTotal();

        // Modal Logic
        const modal = document.getElementById('productModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalPrice = document.getElementById('modalPrice');
        const modalImageContainer = document.getElementById('modalImageContainer');

        function bukaModal(nama, harga, foto) {
            modalTitle.innerText = nama;
            modalPrice.innerText = "Rp " + harga + " /pcs";
            
            if(foto) {
                modalImageContainer.innerHTML = `<img src="${foto}" alt="${nama}" class="w-full h-full object-cover">`;
            } else {
                modalImageContainer.innerHTML = `<span class="font-display font-bold text-neutral-700 italic tracking-widest text-xl">ABS APPAREL</span>`;
            }
            
            modal.classList.remove('hidden');
        }

        function tutupModal() {
            modal.classList.add('hidden');
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                tutupModal();
            }
        }
    </script>
</body>
</html>