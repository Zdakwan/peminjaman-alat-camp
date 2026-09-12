<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product['name'] }} - CampRent</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('partials.navbar')

    <section class="catalog">
        <div class="container">
            <a href="{{ route('home') }}" class="btn btn--outline" style="margin-bottom: 32px;">&larr; Kembali ke Katalog</a>

            <h2 class="section-title">{{ $product['name'] }}</h2>
            <p class="section-subtitle">{{ $product['category'] }}</p>

            <p style="color: var(--text-secondary); max-width: 560px; margin: 20px 0;">
                {{ $product['description'] }}
            </p>

            <p class="product-card__price" style="font-size: 1.4rem;">
                Rp {{ number_format($product['price'], 0, ',', '.') }}<span>/hari</span>
            </p>

            <p class="section-subtitle">
                Status saat ini:
                <strong>{{ $product['status'] === 'tersedia' ? 'Tersedia' : 'Sedang Disewa' }}</strong>
            </p>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
