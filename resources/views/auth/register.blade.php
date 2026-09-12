<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMPRENT - Register</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-4 text-sm text-red-400">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Input Nama Lengkap -->
           <div>
                <label for="name" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-2">
                    NAMA LENGKAP
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus
                class="w-full bg-[#0f172a] text-gray-200 placeholder-gray-500 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent">
            </div>

            <!-- Input Email -->
            <div>
                <label for="email" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-2">
                    EMAIL
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
                    class="w-full bg-[#0f172a] text-gray-200 placeholder-gray-500 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent">
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-2">
                    PASSWORD
                </label>
                <input type="password" id="password" name="password" placeholder="••••••••" required
                    class="w-full bg-[#0f172a] text-gray-200 placeholder-gray-500 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#00a86b] border border-transparent">
            </div>

            <!-- Input Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-2">
                    KONFIRMASI PASSWORD
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required
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
                <a href="{{ route('login') }}" class="text-[#00a86b] hover:underline font-semibold">Masuk</a>
            </p>

        </form>
    </div>

</body>
</html>
