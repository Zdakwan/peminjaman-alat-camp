<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Menampilkan daftar semua admin.
     */
    public function index(Request $request)
    {
        $query = Admin::query();

        if ($request->filled('search')) {
            $query->where('nama_admin', 'like', '%' . $request->search . '%')
                  ->orWhere('username', 'like', '%' . $request->search . '%');
        }

        $admins = $query
            ->latest('id_admin')
            ->paginate(10)
            ->withQueryString();

        $totalAdmin = Admin::count();

        return view('admin.admins.index', compact('admins', 'totalAdmin'));
    }

    /**
     * Menampilkan form tambah admin.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Menyimpan admin baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_admin' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nama_admin.required' => 'Nama admin wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, pilih yang lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        Admin::create([
            'nama_admin' => $validated['nama_admin'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit admin.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Memperbarui data admin.
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'nama_admin' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id_admin . ',id_admin',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'nama_admin.required' => 'Nama admin wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, pilih yang lain.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $admin->nama_admin = $validated['nama_admin'];
        $admin->username = $validated['username'];

        if (!empty($validated['password'])) {
            $admin->password = Hash::make($validated['password']);
        }

        $admin->save();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Menghapus admin.
     */
    public function destroy(Admin $admin)
    {
        // Cegah admin menghapus akunnya sendiri
        if (auth('admin')->id() === $admin->id_admin) {
            return redirect()
                ->route('admin.admins.index')
                ->with('error', 'Kamu tidak bisa menghapus akunmu sendiri.');
        }

        // Cegah hapus jika admin masih punya data terkait
        if (
            $admin->peminjamans()->exists() ||
            $admin->pembayarans()->exists() ||
            $admin->kontens()->exists() ||
            $admin->laporanPeminjamans()->exists()
        ) {
            return redirect()
                ->route('admin.admins.index')
                ->with('error', 'Admin tidak dapat dihapus karena masih memiliki data terkait.');
        }

        $admin->delete();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}
