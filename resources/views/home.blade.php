<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CampRent - Eksplorasi Alam Tanpa Ribet</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('partials.navbar')
    @include('partials.hero')
    @include('partials.catalog', [
        'products' => $products,
        'categories' => $categories,
        'activeCategory' => $activeCategory,
    ])
    @include('partials.footer')
</body>
</html>
