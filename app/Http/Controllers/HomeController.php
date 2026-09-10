<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Daftar kategori untuk filter pills.
     * Key = slug (dipakai di query string), Value = label tampilan.
     */
    private array $categories = [
        'semua'       => 'Semua',
        'tenda'       => 'Tenda',
        'carrier'     => 'Carrier',
        'alat-masak'  => 'Alat Masak',
        'sleeping-bag'=> 'Sleeping Bag',
    ];

    /**
     * Data alat camping.
     * NOTE: pada aplikasi nyata, data ini diambil dari model Eloquent, mis. Product::query()...
     */
    private function allProducts(): array
    {
        return [
            [
                'id' => 1,
                'category' => 'Tenda',
                'category_slug' => 'tenda',
                'name' => 'Tenda Great Outdoor 4P',
                'description' => 'Kapasitas 4 orang, double layer, anti badai dan embun. Cocok untuk pendakian keluarga.',
                'price' => 45000,
                'status' => 'tersedia',
                'media' => 'tenda',
            ],
            [
                'id' => 2,
                'category' => 'Carrier',
                'category_slug' => 'carrier',
                'name' => 'Eiger Eliptic 60L',
                'description' => 'Tas gunung kapasitas besar dengan backsystem nyaman untuk trekking.',
                'price' => 35000,
                'status' => 'disewa',
                'media' => 'carrier',
            ],
            [
                'id' => 3,
                'category' => 'Alat Masak',
                'category_slug' => 'alat-masak',
                'name' => 'Cooking Set (Nesting)',
                'description' => 'Panci set isi 4. Ringan, anti lengket, sudah termasuk spons cuci dan tas.',
                'price' => 15000,
                'status' => 'tersedia',
                'media' => 'plain',
            ],
            [
                'id' => 4,
                'category' => 'Penerangan',
                'category_slug' => 'penerangan',
                'name' => 'Lampu Tenda LED',
                'description' => 'Lampu gantung terang dengan baterai cas ulang (USB). Awet hingga 20 jam.',
                'price' => 10000,
                'status' => 'tersedia',
                'media' => 'plain',
            ],
        ];
    }

    /**
     * Halaman beranda.
     */
    public function index(Request $request)
    {
        $activeCategory = $request->query('kategori', 'semua');

        $products = collect($this->allProducts())
            ->when($activeCategory !== 'semua', fn ($items) => $items->where('category_slug', $activeCategory))
            ->values()
            ->all();

        return view('home', [
            'products' => $products,
            'categories' => $this->categories,
            'activeCategory' => $activeCategory,
        ]);
    }

    /**
     * Endpoint pencarian/filter katalog (dipanggil dari form hero & filter pills).
     */
    public function search(Request $request)
    {
        return $this->index($request);
    }

    /**
     * Halaman detail produk (placeholder — untuk tombol "Info").
     */
    public function show(int $id)
    {
        $product = collect($this->allProducts())->firstWhere('id', $id);

        abort_if(! $product, 404);

        return view('produk.show', compact('product'));
    }
}