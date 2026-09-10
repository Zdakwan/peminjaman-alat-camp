@extends('layouts.app')

@section('title', 'CampRent - Eksplorasi Alam Tanpa Ribet')

@section('content')
    @include('partials.hero')
    @include('partials.catalog', [
        'products' => $products,
        'categories' => $categories,
        'activeCategory' => $activeCategory,
    ])
@endsection
