<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Alat Camping - CAMPRENT</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkbg: '#0f172a',
                        cardbg: '#1e293b',
                        cardborder: '#334155',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#0b0f19] text-slate-100 min-h-screen font-sans">

    <!-- NAVBAR -->
    <header class="border-b border-slate-800 bg-[#0b0f19]/80 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <span class="text-2xl font-black tracking-wider text-white">CAMP<span class="text-emerald-500">RENT</span></span>
            </div>
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-300">
                <a href="#" class="hover:text-emerald-400 transition">Beranda</a>
                <a href="#" class="text-emerald-400 font-semibold">Eksplorasi</a>
                <a href="#" class="hover:text-emerald-400 transition">Cara Sewa</a>
                <a href="#" class="hover:text-emerald-400 transition">Bantuan</a>
            </nav>
            <div>
                <a href="#" class="bg-emerald-500 hover:bg-emerald-600 text-slate-950 font-semibold px-6 py-2.5 rounded-lg text-sm transition shadow-lg shadow-emerald-500/20">
                    Masuk
                </a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-6 py-10">
        <!-- Header Judul -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">Katalog Alat Camping</h1>
            <p class="text-slate-400 text-sm mt-1">Temukan perlengkapan petualangan terbaik untuk pendakian dan kamping Anda.</p>
        </div>

        <!-- Layout Grid: Filter & List Produk -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- SIDEBAR FILTER -->
            <aside class="lg:col-span-1 bg-[#131b2e] border border-slate-800/80 rounded-2xl p-6 h-fit">
                <h2 class="text-base font-bold text-white mb-4">Filter Kategori</h2>
                <div class="space-y-3 text-sm text-slate-300">
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" checked class="rounded border-slate-700 bg-slate-900 text-emerald-500 focus:ring-emerald-500 w-4 h-4">
                        <span class="text-emerald-400 font-medium">Semua Alat</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-700 bg-slate-900 text-emerald-500 focus:ring-emerald-500 w-4 h-4">
                        <span>Tenda & Flysheet</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-700 bg-slate-900 text-emerald-500 focus:ring-emerald-500 w-4 h-4">
                        <span>Tas Carrier</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-700 bg-slate-900 text-emerald-500 focus:ring-emerald-500 w-4 h-4">
                        <span>Sleeping Bag & Matras</span>
                    </label>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" class="rounded border-slate-700 bg-slate-900 text-emerald-500 focus:ring-emerald-500 w-4 h-4">
                        <span>Alat Masak & Nesting</span>
                    </label>
                </div>
            </aside>

            <!-- KONTEN UTAMA (SEARCH & GRID PRODUK) -->
            <div class="lg:col-span-3 space-y-6">

                <!-- BARIS PENCARIAN & URUTKAN -->
                <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                    <div class="w-full sm:w-2/3 relative">
                        <input type="text" placeholder="Cari tenda, carrier, kompor..." class="w-full bg-[#131b2e] border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition">
                    </div>
                    <div class="w-full sm:w-auto flex items-center justify-end space-x-2 text-sm text-slate-400">
                        <span>Urutkan:</span>
                        <select class="bg-[#131b2e] border border-slate-800 text-slate-200 rounded-xl px-3 py-2.5 focus:outline-none focus:border-emerald-500">
                            <option>Terbaru</option>
                            <option>Harga Terendah</option>
                            <option>Harga Tertinggi</option>
                        </select>
                    </div>
                </div>

                <!-- GRID KARTU PRODUK -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Item 1: Tenda (Tersedia) -->
                    <div class="bg-[#131b2e] border border-slate-800/80 rounded-2xl overflow-hidden flex flex-col justify-between group hover:border-slate-700 transition">
                        <div>
                            <div class="relative h-48 overflow-hidden bg-slate-800">
                                <img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&q=80&w=600" alt="Tenda" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <span class="absolute top-3 right-3 bg-emerald-500/20 border border-emerald-500/40 text-emerald-400 text-xs font-semibold px-2.5 py-1 rounded-full backdrop-blur-md">Tersedia</span>
                            </div>
                            <div class="p-5">
                                <span class="text-xs font-semibold tracking-wider text-emerald-500 uppercase">Tenda</span>
                                <h3 class="font-bold text-white text-base mt-1">Tenda Dome Consina Magnum 4</h3>
                            </div>
                        </div>
                        <div class="p-5 pt-0 flex items-center justify-between mt-4">
                            <div>
                                <span class="text-xs text-slate-400 block">Harga Sewa</span>
                                <span class="text-emerald-400 font-bold text-sm">Rp 45.000<span class="text-xs text-slate-400 font-normal">/hari</span></span>
                            </div>
                            <button class="bg-emerald-500/10 hover:bg-emerald-500 text-emerald-400 hover:text-slate-950 border border-emerald-500/30 text-xs font-semibold px-4 py-2 rounded-lg transition">
                                Sewa
                            </button>
                        </div>
                    </div>

                    <!-- Item 2: Carrier (Disewa) -->
                    <div class="bg-[#131b2e] border border-slate-800/80 rounded-2xl overflow-hidden flex flex-col justify-between group hover:border-slate-700 transition">
                        <div>
                            <div class="relative h-48 overflow-hidden bg-slate-800">
                                <img src="https://images.unsplash.com/photo-1622383563227-04401ab4e5ea?auto=format&fit=crop&q=80&w=600" alt="Carrier" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <span class="absolute top-3 right-3 bg-rose-500/20 border border-rose-500/40 text-rose-400 text-xs font-semibold px-2.5 py-1 rounded-full backdrop-blur-md">Disewa</span>
                            </div>
                            <div class="p-5">
                                <span class="text-xs font-semibold tracking-wider text-emerald-500 uppercase">Carrier</span>
                                <h3 class="font-bold text-white text-base mt-1">Carrier Deuter Aircontact 65+10L</h3>
                            </div>
                        </div>
                        <div class="p-5 pt-0 flex items-center justify-between mt-4">
                            <div>
                                <span class="text-xs text-slate-400 block">Harga Sewa</span>
                                <span class="text-emerald-400 font-bold text-sm">Rp 35.000<span class="text-xs text-slate-400 font-normal">/hari</span></span>
                            </div>
                            <button disabled class="bg-slate-800 text-slate-500 text-xs font-semibold px-4 py-2 rounded-lg cursor-not-allowed">
                                Habis
                            </button>
                        </div>
                    </div>

                    <!-- Item 3: Carrier (Disewa) -->
                    <div class="bg-[#131b2e] border border-slate-800/80 rounded-2xl overflow-hidden flex flex-col justify-between group hover:border-slate-700 transition">
                        <div>
                            <div class="relative h-48 overflow-hidden bg-slate-800">
                                <img src="https://images.unsplash.com/photo-1622383563227-04401ab4e5ea?auto=format&fit=crop&q=80&w=600" alt="Carrier" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <span class="absolute top-3 right-3 bg-rose-500/20 border border-rose-500/40 text-rose-400 text-xs font-semibold px-2.5 py-1 rounded-full backdrop-blur-md">Disewa</span>
                            </div>
                            <div class="p-5">
                                <span class="text-xs font-semibold tracking-wider text-emerald-500 uppercase">Carrier</span>
                                <h3 class="font-bold text-white text-base mt-1">Carrier Deuter Aircontact 30-50L</h3>
                            </div>
                        </div>
                        <div class="p-5 pt-0 flex items-center justify-between mt-4">
                            <div>
                                <span class="text-xs text-slate-400 block">Harga Sewa</span>
                                <span class="text-emerald-400 font-bold text-sm">Rp 15.000<span class="text-xs text-slate-400 font-normal">/hari</span></span>
                            </div>
                            <button disabled class="bg-slate-800 text-slate-500 text-xs font-semibold px-4 py-2 rounded-lg cursor-not-allowed">
                                Habis
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

</body>
</html>
