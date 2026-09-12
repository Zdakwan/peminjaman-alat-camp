@extends('layouts.admin')

@section('title', 'Kelola Admin')

@section('content')

<div class="barang-container">

    {{-- HEADER --}}
    <div class="barang-header">
        <div>
            <h1>Kelola Admin</h1>
            <p>Kelola akun admin yang dapat mengakses panel ini</p>
        </div>
    </div>


    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="barang-alert success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="barang-alert error">
            {{ session('error') }}
        </div>
    @endif


    {{-- STATISTIK --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-content">
                <span class="stat-label">TOTAL ADMIN</span>
                <h2>{{ $totalAdmin }}</h2>
                <span class="stat-growth">Akun admin terdaftar</span>
            </div>
            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
        </div>
    </div>


    {{-- DAFTAR ADMIN --}}
    <div class="activity-card barang-card">

        <div class="barang-card-header">
            <div>
                <h3>Daftar Admin</h3>
            </div>

            <a href="{{ route('admin.admins.create') }}" class="btn-tambah">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14"/>
                    <path d="M5 12h14"/>
                </svg>
                Tambah Admin
            </a>
        </div>


        {{-- SEARCH --}}
        <form method="GET" action="{{ route('admin.admins.index') }}" class="barang-filter">
            <div class="search-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="M20 20l-4-4"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau username admin...">
            </div>
            <button type="submit" class="btn-filter">Cari</button>
        </form>


        {{-- TABLE --}}
        <div class="table-wrapper">
            <table class="barang-table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA ADMIN</th>
                        <th>USERNAME</th>
                        <th>DIBUAT</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $index => $admin)
                        <tr>
                            <td>{{ $admins->firstItem() + $index }}</td>
                            <td>
                                <div class="barang-name">
                                    <strong>{{ $admin->nama_admin }}</strong>
                                    @if(auth('admin')->id() === $admin->id_admin)
                                        <span>Ini akun kamu</span>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->created_at?->format('d M Y') }}</td>
                            <td>
                                <div class="barang-actions">
                                    <a href="{{ route('admin.admins.edit', $admin) }}" class="action-btn edit" title="Edit">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M12 20h9"/>
                                            <path d="M16.5 3.5a2.1 2.1 0 013 3L8 18l-4 1 1-4L16.5 3.5z"/>
                                        </svg>
                                    </a>

                                    @if(auth('admin')->id() !== $admin->id_admin)
                                        <button type="button" class="action-btn delete" title="Hapus"
                                            onclick="openDeleteModal(@js($admin->nama_admin), '{{ route('admin.admins.destroy', $admin) }}')">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M4 7h16"/>
                                                <path d="M10 11v6"/>
                                                <path d="M14 11v6"/>
                                                <path d="M6 7l1 14h10l1-14"/>
                                                <path d="M9 7V4h6v3"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-data">Belum ada data admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        {{-- FOOTER --}}
        <div class="barang-footer">
            <div class="barang-total">
                @if($admins->total() > 0)
                    Menampilkan {{ $admins->firstItem() }}–{{ $admins->lastItem() }} dari {{ $admins->total() }} data
                @else
                    Menampilkan 0 data
                @endif
            </div>

            @if($admins->hasPages())
                <div class="barang-pagination">
                    @if($admins->onFirstPage())
                        <span class="page-btn disabled">‹</span>
                    @else
                        <a href="{{ $admins->previousPageUrl() }}" class="page-btn">‹</a>
                    @endif

                    @foreach($admins->getUrlRange(max(1, $admins->currentPage() - 2), min($admins->lastPage(), $admins->currentPage() + 2)) as $page => $url)
                        @if($page == $admins->currentPage())
                            <span class="page-btn active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($admins->hasMorePages())
                        <a href="{{ $admins->nextPageUrl() }}" class="page-btn">›</a>
                    @else
                        <span class="page-btn disabled">›</span>
                    @endif
                </div>
            @endif
        </div>

    </div>

</div>


{{-- DELETE MODAL --}}
<div id="deleteModal" class="delete-modal">
    <div class="delete-modal-overlay" onclick="closeDeleteModal()"></div>
    <div class="delete-modal-card">
        <div class="delete-modal-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M3 6h18"/>
                <path d="M8 6V4h8v2"/>
                <path d="M19 6l-1 15H6L5 6"/>
                <path d="M10 11v6"/>
                <path d="M14 11v6"/>
            </svg>
        </div>
        <div class="delete-modal-content">
            <h3>Hapus Admin?</h3>
            <p>Apakah kamu yakin ingin menghapus <strong id="deleteAdminName">admin ini</strong>?</p>
            <span class="delete-warning">Akun yang sudah dihapus tidak dapat dikembalikan.</span>
        </div>
        <div class="delete-modal-actions">
            <button type="button" class="modal-cancel-btn" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="modal-delete-btn">Hapus Admin</button>
            </form>
        </div>
    </div>
</div>


<style>
    .barang-actions { display: flex; align-items: center; gap: 6px; }
    .action-btn { width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; padding: 0; border-radius: 6px; border: 1px solid #263852; background: #0d1728; color: #8795aa; text-decoration: none; cursor: pointer; transition: 0.2s; }
    .action-btn svg { width: 15px; height: 15px; }
    .action-btn.edit:hover { color: #f4c95d; border-color: #f4c95d; background: rgba(244, 201, 93, 0.08); }
    .action-btn.delete:hover { color: #ff6078; border-color: #ff6078; background: rgba(255, 96, 120, 0.08); }
    .barang-name span { display: block; font-size: 10px; color: #59677d; margin-top: 2px; }

    .delete-modal { position: fixed; inset: 0; display: none; align-items: center; justify-content: center; padding: 20px; z-index: 9999; }
    .delete-modal.show { display: flex; }
    .delete-modal-overlay { position: absolute; inset: 0; background: rgba(3, 8, 18, 0.78); backdrop-filter: blur(4px); }
    .delete-modal-card { position: relative; width: 100%; max-width: 400px; padding: 28px; background: #111b2d; border: 1px solid #24334d; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.45); }
    .delete-modal-icon { width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; margin-bottom: 18px; border-radius: 50%; background: rgba(255, 96, 120, 0.10); border: 1px solid rgba(255, 96, 120, 0.20); color: #ff6078; }
    .delete-modal-icon svg { width: 24px; height: 24px; }
    .delete-modal-content h3 { margin: 0 0 9px; color: #e7edf7; font-size: 18px; font-weight: 600; }
    .delete-modal-content p { margin: 0; color: #8795aa; font-size: 12px; line-height: 1.6; }
    .delete-modal-content p strong { color: #dbe3ef; font-weight: 600; }
    .delete-warning { display: block; margin-top: 10px; color: #ff6078; font-size: 10px; }
    .delete-modal-actions { display: flex; align-items: center; justify-content: flex-end; gap: 9px; margin-top: 25px; }
    .delete-modal-actions form { margin: 0; padding: 0; }
    .modal-cancel-btn { padding: 10px 17px; background: #17243a; border: 1px solid #263852; border-radius: 7px; color: #aab5c7; font-family: inherit; font-size: 11px; font-weight: 600; cursor: pointer; }
    .modal-cancel-btn:hover { color: #dbe3ef; background: #1c2d46; border-color: #3a506f; }
    .modal-delete-btn { padding: 10px 17px; background: #ff5570; border: 1px solid #ff5570; border-radius: 7px; color: #fff; font-family: inherit; font-size: 11px; font-weight: 600; cursor: pointer; }
    .modal-delete-btn:hover { background: #ff3f5f; border-color: #ff3f5f; }
</style>

<script>
    function openDeleteModal(nama, action) {
        document.getElementById('deleteAdminName').textContent = nama;
        document.getElementById('deleteForm').action = action;
        document.getElementById('deleteModal').classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>

@endsection
