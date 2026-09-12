@extends('layouts.admin')

@section('title', 'Tambah Admin')

@section('content')

<div class="dashboard-container">

    <div class="page-header">
        <div>
            <div class="breadcrumb">ADMIN PANEL / KELOLA ADMIN / TAMBAH ADMIN</div>
            <h1>Tambah Admin</h1>
            <p>Buat akun admin baru untuk mengakses panel ini.</p>
        </div>
        <a href="{{ route('admin.admins.index') }}" class="back-btn">← Kembali</a>
    </div>

    @if ($errors->any())
        <div class="form-alert">
            <strong>Terdapat kesalahan pada input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('admin.admins.store') }}" method="POST">
            @csrf

            <div class="form-section">
                <div class="form-section-title">Informasi Admin</div>

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="nama_admin">Nama Admin <span>*</span></label>
                        <input type="text" id="nama_admin" name="nama_admin" value="{{ old('nama_admin') }}"
                            placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <div class="form-group full">
                        <label for="username">Username <span>*</span></label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            placeholder="Contoh: budi.admin" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password <span>*</span></label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <small>Minimal 8 karakter.</small>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password <span>*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                    </div>

                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.admins.index') }}" class="cancel-btn">Batal</a>
                <button type="submit" class="save-btn">Simpan Admin</button>
            </div>

        </form>
    </div>

</div>

<style>
    .back-btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 15px; background: #111c30; border: 1px solid #253550; border-radius: 7px; color: #aab5c7; font-size: 11px; font-weight: 500; text-decoration: none; transition: 0.2s; }
    .back-btn:hover { color: #00d6a3; border-color: #00d6a3; background: #17243a; }
    .form-card { background: #111b2d; border: 1px solid #24334d; border-radius: 9px; overflow: hidden; }
    .form-section { padding: 28px; }
    .form-section-title { font-size: 15px; font-weight: 600; color: #e7edf7; padding-bottom: 16px; margin-bottom: 24px; border-bottom: 1px solid #24334d; }
    .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 22px; }
    .form-group { display: flex; flex-direction: column; gap: 8px; }
    .form-group.full { grid-column: 1 / -1; }
    .form-group label { font-size: 12px; font-weight: 600; color: #aeb9ca; }
    .form-group label span { color: #ff5570; }
    .form-group input { width: 100%; min-height: 42px; padding: 10px 13px; background: #0d1728; border: 1px solid #263852; border-radius: 7px; color: #dbe3ef; font-family: inherit; font-size: 12px; outline: none; box-sizing: border-box; transition: 0.2s; }
    .form-group input:focus { border-color: #00d6a3; box-shadow: 0 0 0 2px rgba(0, 214, 163, 0.08); }
    .form-group input::placeholder { color: #59677d; }
    .form-group small { color: #59677d; font-size: 10px; line-height: 1.5; }
    .form-actions { display: flex; justify-content: flex-end; gap: 10px; padding: 16px 28px; border-top: 1px solid #24334d; background: #0d1728; }
    .cancel-btn, .save-btn { padding: 10px 18px; border-radius: 7px; font-size: 11px; font-weight: 600; cursor: pointer; text-decoration: none; border: none; transition: 0.2s; }
    .cancel-btn { color: #8795aa; background: #17243a; border: 1px solid #263852; }
    .cancel-btn:hover { color: #dbe3ef; background: #1c2d46; border-color: #3a506f; }
    .save-btn { color: #06131b; background: #08d3a4; }
    .save-btn:hover { background: #00e0ad; box-shadow: 0 5px 15px rgba(0, 214, 163, 0.12); }
    .form-alert { margin-bottom: 16px; padding: 12px 15px; background: #431827; border: 1px solid #6d243d; border-radius: 7px; color: #ff6b82; font-size: 11px; }
    .form-alert strong { color: #ff8094; }
    .form-alert ul { margin: 8px 0 0 18px; padding: 0; }

    @media (max-width: 768px) {
        .form-section { padding: 20px; }
        .form-grid { grid-template-columns: 1fr; gap: 18px; }
        .form-group.full { grid-column: auto; }
        .form-actions { flex-direction: column-reverse; padding: 15px 20px; }
        .cancel-btn, .save-btn { width: 100%; text-align: center; }
    }
</style>

@endsection
