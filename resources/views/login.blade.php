<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMPRENT - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#0b0f19] text-gray-200 min-h-screen flex items-center justify-center p-4">

    <!-- Card Login Container -->
    <div class="bg-[#1e2638] rounded-2xl p-8 md:p-10 w-full max-max-w-[420px] shadow-2xl border border-gray-800/40">
        
        <!-- Header / Logo -->
        <div class="text-center mb-8">
            <h1 class="text-2xl md:text-3xl font-extrabold tracking-wide mb-1">
                <span class="text-[#00a86b]">CAMP</span><span class="text-white">RENT</span>
            </h1>
            <p class="text-xs md:text-sm text-gray-400 font-medium">Masuk ke akun peminjaman Anda</p>
        </div>

        <!-- Form Login -->
        <form action="#" method="POST" class="space-y-5">
            @csrf

            <!-- Input Email -->
            <div class="space-y-2">
                <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-wider">EMAIL</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="nama@email.com" 
                    required
                    class="w-full bg-[#121824] text-gray-200 placeholder-gray-500 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent transition duration-200"
                >
            </div>

            <!-- Input Password -->
            <div class="space-y-2">
                <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider">PASSWORD</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="••••••••" 
                    required
                    class="w-full bg-[#121824] text-gray-200 placeholder-gray-500 text-sm rounded-xl px-4 py-3.5 focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent transition duration-200"
                >
            </div>

            <!-- Tombol Masuk -->
            <button 
                type="submit" 
                class="w-full bg-[#00a86b] hover:bg-[#008f5b] text-white font-semibold text-sm rounded-xl py-3.5 transition duration-200 shadow-lg shadow-[#00a86b]/20 mt-2"
            >
                Masuk
            </button>
        </form>

        <!-- Footer Link -->
        <div class="text-center mt-6">
            <p class="text-xs text-gray-400">
                Belum punya akun? 
                <a href="/register" class="text-[#00a86b] hover:underline font-semibold ml-1">Daftar sekarang</a>
            </p>
        </div>

    </div>

</body>
</html>