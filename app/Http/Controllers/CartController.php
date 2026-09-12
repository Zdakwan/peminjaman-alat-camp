<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    /**
     * Tambahkan produk ke keranjang (session-based, contoh sederhana).
     */
    public function add(int $productId): RedirectResponse
    {
        $cart = session('cart', []);
        $cart[] = $productId;
        session(['cart' => $cart]);

        return back()->with('success', 'Alat berhasil ditambahkan ke keranjang.');
    }
}
