<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda - CampRent</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('partials.navbar')

    <section class="catalog">
        <div class="container" style="padding-top: 50px; padding-bottom: 50px; text-align: center;">
            <h2 class="section-title">Selamat Datang di CampRent!</h2>
            <p class="section-subtitle" style="margin-top: 10px;">Kamu sudah berhasil login.</p>

            <a href="#" class="btn btn--primary" style="margin-top: 20px;">Lihat Katalog Alat Camp</a>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
