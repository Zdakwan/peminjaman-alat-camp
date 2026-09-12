<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // DATA ALAT
        // =========================

        // Total seluruh unit alat
        $totalStok = Barang::sum('stok');

        // Total unit alat yang tersedia
        $alatTersedia = Barang::sum('stok_tersedia');

        // Total unit alat yang sedang disewa
        $alatDisewa = $totalStok - $alatTersedia;


        return view('admin.dashboard', compact(
            'alatTersedia',
            'alatDisewa'
        ));
    }
}