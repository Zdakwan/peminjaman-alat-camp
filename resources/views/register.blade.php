<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMPRENT - Register</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#0b1329] min-h-screen flex items-center justify-center p-4">

    <!-- Card Container -->
    <div class="bg-[#1c2536] text-white w-full max-w-md rounded-2xl p-8 shadow-2xl border border-gray-800">
        
        <!-- Header / Logo -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold tracking-wide">
                <span class="text-[#00a86b]">CAMP</span><span class="text-white">RENT</span>
            </h1>
            <p class="text-gray-400 text-sm mt-2">Buat akun baru penyewa</p>
        </div>

        <!-- Form -->
        <form action="#" method="POST" class="space-y-4">
            
            <!-- Input Nama Lengkap -->
            <div>
                <label class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-2">
                    NAMA LENGKAP
                </label>
                <input type="text" placeholder="John Doe" 
                    class="w-full bg-[#0f172a] text-gray-200 placeholder-gray-500 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent">
            </div>

            <!-- Input Email -->
            <div>
                <label class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-2">
                    EMAIL
                </label>
                <input type="email" placeholder="nama@email.com" 
                    class="w-full bg-[#0f172a] text-gray-200 placeholder-gray-500 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent">
            </div>

            <!-- Input Password -->
            <div>
                <label class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-2">
                    PASSWORD
                </label>
                <input type="password" placeholder="••••••••" 
                    class="w-full bg-[#0f172a] text-gray-200 placeholder-gray-500 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent">
            </div>

            <!-- Tombol Daftar -->
            <button type="submit" 
                class="w-full bg-[#00a86b] hover:bg-[#008f5a] text-white font-medium py-3 rounded-lg transition duration-200 shadow-md mt-2">
                Daftar
            </button>

            <!-- Footer Link -->
            <p class="text-center text-xs text-gray-400 mt-6">
                Sudah punya akun? 
                <a href="#" class="text-[#00a86b] hover:underline font-semibold">Masuk</a>
            </p>

        </form>
    </div>

</body>
</html>