<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - CAMPRENT</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#0D1424] text-white min-h-screen flex flex-col justify-between">

    <!-- Navbar Header -->
    <header class="w-full px-8 py-6 flex justify-between items-center max-w-7xl mx-auto">
        <!-- Logo -->
        <a href="/" class="text-2xl font-extrabold tracking-wide">
            <span class="text-[#22C55E]">CAMP</span><span class="text-white">RENT</span>
        </a>
        <!-- Nav Link -->
        <a href="/" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">
            Kembali ke Beranda
        </a>
    </header>

    <!-- Main Content -->
    <main class="flex-1 max-w-5xl w-full mx-auto px-6 pt-12 pb-24">
        <!-- Judul Halaman -->
        <h1 class="text-2xl md:text-3xl font-bold text-white mb-2 text-left">
            Hubungi Kami
        </h1>
        
        <!-- Subtitle -->
        <p class="text-slate-400 text-sm mb-8 text-left">
            Punya pertanyaan seputar ketersediaan alat atau kerja sama? Hubungi tim kami melalui kontak di bawah ini.
        </p>

        <!-- Grid Cards Container -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Card 1: Basecamp Utama -->
            <div class="bg-[#131C31] rounded-2xl p-6 md:p-8 border border-slate-800/60 shadow-lg flex flex-col justify-between">
                <div>
                    <h2 class="text-[#22C55E] font-semibold text-lg mb-4">
                        Basecamp Utama
                    </h2>
                    <p class="text-slate-300 text-sm mb-2">
                        Jl. Pendaki No. 45, Malang, Jawa Timur
                    </p>
                </div>
                <p class="text-slate-400 text-sm mt-4">
                    WhatsApp: <span class="text-slate-300">+62 812-3456-7890</span>
                </p>
            </div>

            <!-- Card 2: Jam Operasional -->
            <div class="bg-[#131C31] rounded-2xl p-6 md:p-8 border border-slate-800/60 shadow-lg flex flex-col justify-between">
                <div>
                    <h2 class="text-[#22C55E] font-semibold text-lg mb-4">
                        Jam Operasional
                    </h2>
                    <p class="text-slate-300 text-sm mb-2">
                        Senin - Minggu: 08.00 - 21.00 WIB
                    </p>
                </div>
                <p class="text-slate-400 text-sm mt-4">
                    Email: <span class="text-slate-300">support@camprent.test</span>
                </p>
            </div>

        </div>
    </main>

    <div></div>

</body>
</html>