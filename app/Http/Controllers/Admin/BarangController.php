<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Menampilkan daftar semua alat camping.
     */
    public function index(Request $request)
    {
        // Membuat query untuk mengambil data barang
        $query = Barang::query();

        // =========================
        // SEARCH
        // =========================

        // Search berdasarkan nama barang
        if ($request->filled('search')) {
            $query->where(
                'nama_barang',
                'like',
                '%' . $request->search . '%'
            );
        }

        // =========================
        // FILTER KATEGORI
        // =========================

        if ($request->filled('kategori')) {
            $query->where(
                'kategori',
                $request->kategori
            );
        }

        // =========================
        // FILTER STATUS
        // =========================

        if ($request->filled('status')) {

            // Barang tersedia
            if ($request->status === 'tersedia') {
                $query->where('stok_tersedia', '>', 3);
            }

            // Stok menipis
            elseif ($request->status === 'menipis') {
                $query->whereBetween(
                    'stok_tersedia',
                    [1, 3]
                );
            }

            // Barang habis
            elseif ($request->status === 'habis') {
                $query->where(
                    'stok_tersedia',
                    '<=',
                    0
                );
            }
        }

        // =========================
        // DATA BARANG
        // =========================

        $barangs = $query
            ->latest('id_barang')
            ->paginate(10)
            ->withQueryString();

        // =========================
        // DAFTAR KATEGORI
        // =========================

        $kategoris = Barang::select('kategori')
            ->distinct()
            ->orderBy('kategori')
            ->pluck('kategori');

        // =========================
        // STATISTIK ALAT
        // =========================

        // Total jenis alat
        $totalAlat = Barang::count();

        // Total seluruh stok semua alat
        $totalStok = Barang::sum('stok');

        // Total stok yang masih tersedia
        $stokTersedia = Barang::sum('stok_tersedia');

        // Jumlah unit alat yang sedang disewa
        $sedangDisewa = $totalStok - $stokTersedia;

        // Jumlah jenis alat dengan stok tersedia <= 3
        $stokMenipis = Barang::where(
            'stok_tersedia',
            '<=',
            3
        )->count();

        // =========================
        // KIRIM DATA KE VIEW
        // =========================

        return view('admin.barang.index', compact(
            'barangs',
            'kategoris',
            'totalAlat',
            'totalStok',
            'sedangDisewa',
            'stokTersedia',
            'stokMenipis'
        ));
    }


    /**
     * Menampilkan halaman form tambah alat.
     */
    public function create()
    {
        return view('admin.barang.create');
    }


    /**
     * Menyimpan alat baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'stok_tersedia' => 'required|integer|min:0|lte:stok',
            'foto' => 'nullable|string|max:255',
        ], [
            'nama_barang.required' =>
                'Nama alat wajib diisi.',

            'kategori.required' =>
                'Kategori wajib diisi.',

            'harga_sewa.required' =>
                'Harga sewa wajib diisi.',

            'harga_sewa.numeric' =>
                'Harga sewa harus berupa angka.',

            'stok.required' =>
                'Stok wajib diisi.',

            'stok.integer' =>
                'Stok harus berupa angka bulat.',

            'stok_tersedia.required' =>
                'Stok tersedia wajib diisi.',

            'stok_tersedia.integer' =>
                'Stok tersedia harus berupa angka bulat.',

            'stok_tersedia.lte' =>
                'Stok tersedia tidak boleh lebih besar dari stok.',
        ]);

        Barang::create($validated);

        return redirect()
            ->route('admin.barang.index')
            ->with(
                'success',
                'Alat berhasil ditambahkan.'
            );
    }


    /**
     * Menampilkan detail alat.
     */
    public function show(Barang $barang)
    {
        return view(
            'admin.barang.show',
            compact('barang')
        );
    }


    /**
     * Menampilkan form edit alat.
     */
    public function edit(Barang $barang)
    {
        return view(
            'admin.barang.edit',
            compact('barang')
        );
    }


    /**
     * Memperbarui data alat.
     */
    public function update(
        Request $request,
        Barang $barang
    ) {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'stok_tersedia' => 'required|integer|min:0|lte:stok',
            'foto' => 'nullable|string|max:255',
        ], [
            'nama_barang.required' =>
                'Nama alat wajib diisi.',

            'kategori.required' =>
                'Kategori wajib diisi.',

            'harga_sewa.required' =>
                'Harga sewa wajib diisi.',

            'harga_sewa.numeric' =>
                'Harga sewa harus berupa angka.',

            'stok.required' =>
                'Stok wajib diisi.',

            'stok.integer' =>
                'Stok harus berupa angka bulat.',

            'stok_tersedia.required' =>
                'Stok tersedia wajib diisi.',

            'stok_tersedia.integer' =>
                'Stok tersedia harus berupa angka bulat.',

            'stok_tersedia.lte' =>
                'Stok tersedia tidak boleh lebih besar dari stok.',
        ]);

        $barang->update($validated);

        return redirect()
            ->route('admin.barang.index')
            ->with(
                'success',
                'Alat berhasil diperbarui.'
            );
    }


    /**
     * Menghapus alat.
     */
    public function destroy(Barang $barang)
    {
        // Cek apakah alat sudah memiliki
        // transaksi peminjaman
        if ($barang->peminjamans()->exists()) {

            return redirect()
                ->route('admin.barang.index')
                ->with(
                    'error',
                    'Alat tidak dapat dihapus karena sudah memiliki data peminjaman.'
                );
        }

        // Hapus data barang
        $barang->delete();

        return redirect()
            ->route('admin.barang.index')
            ->with(
                'success',
                'Alat berhasil dihapus.'
            );
    }
}