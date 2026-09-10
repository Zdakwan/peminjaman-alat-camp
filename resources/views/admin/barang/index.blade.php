@extends('layouts.admin')

@section('title', 'Kelola Alat')

@section('content')

<div class="barang-container">

    {{-- HEADER --}}
    <div class="barang-header">
        <div>
            <h1>Kelola Alat Camping</h1>
            <p>Kelola alat camping yang tersedia untuk disewa</p>
        </div>

        <div class="tanggal-badge">
            <svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="17" rx="2"/>
                <path d="M16 2v4"/>
                <path d="M8 2v4"/>
                <path d="M3 10h18"/>
            </svg>

            {{ now()->format('F Y') }}
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

        {{-- TOTAL ALAT --}}
        <div class="stat-card">
            <div class="stat-content">
                <span class="stat-label">TOTAL ALAT</span>

                <h2>{{ $totalAlat }}</h2>

                <span class="stat-growth">
                    ↑ Alat tersedia dalam sistem
                </span>
            </div>

            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M21 8l-9-5-9 5 9 5 9-5z"/>
                    <path d="M3 8v8l9 5 9-5V8"/>
                    <path d="M12 13v8"/>
                </svg>
            </div>
        </div>


        {{-- SEDANG DISEWA --}}
        <div class="stat-card">
            <div class="stat-content">
                <span class="stat-label">SEDANG DISEWA</span>

                <h2>{{ $sedangDisewa }}</h2>

                <span class="stat-description">
                    dari {{ $totalStok }} alat
                </span>
            </div>

            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 2"/>
                </svg>
            </div>
        </div>


        {{-- TERSEDIA --}}
        <div class="stat-card">
            <div class="stat-content">
                <span class="stat-label">TERSEDIA</span>

                <h2>{{ $stokTersedia }}</h2>

                <span class="stat-growth">
                    stok tersedia
                </span>
            </div>

            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M8 12l3 3 5-6"/>
                </svg>
            </div>
        </div>


        {{-- STOK MENIPIS --}}
        <div class="stat-card">
            <div class="stat-content">
                <span class="stat-label">STOK MENIPIS</span>

                <h2>{{ $stokMenipis }}</h2>

                <span class="stok-warning-text">
                    stok < 3 unit
                </span>
            </div>

            <div class="stat-icon warning">
                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M12 3L2.5 20h19L12 3z"/>
                    <path d="M12 9v5"/>
                    <circle cx="12" cy="17" r=".5"/>
                </svg>
            </div>
        </div>

    </div>


    {{-- DAFTAR ALAT --}}
    <div class="activity-card barang-card">

        {{-- CARD HEADER --}}
        <div class="barang-card-header">

            <div>
                <h3>Daftar Alat Camping</h3>
            </div>

            <a href="{{ route('admin.barang.create') }}"
                class="btn-tambah">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14"/>
                    <path d="M5 12h14"/>
                </svg>

                Tambah Alat
            </a>

        </div>


        {{-- FILTER --}}
        <form method="GET"
            action="{{ route('admin.barang.index') }}"
            class="barang-filter">

            {{-- SEARCH --}}
            <div class="search-box">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="M20 20l-4-4"/>
                </svg>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama alat, kategori, atau kode..."
                >

            </div>


            {{-- KATEGORI --}}
            <select name="kategori" class="filter-select">

                <option value="">Semua Kategori</option>

                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori }}"
                        {{ request('kategori') == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach

            </select>


            {{-- STATUS --}}
            <select name="status" class="filter-select">

                <option value="">Semua Status</option>

                <option value="tersedia"
                    {{ request('status') == 'tersedia' ? 'selected' : '' }}>
                    Tersedia
                </option>

                <option value="menipis"
                    {{ request('status') == 'menipis' ? 'selected' : '' }}>
                    Stok Menipis
                </option>

                <option value="habis"
                    {{ request('status') == 'habis' ? 'selected' : '' }}>
                    Habis
                </option>

            </select>

            <button type="submit" class="btn-filter">
                Cari
            </button>

        </form>


        {{-- TABLE --}}
        <div class="table-wrapper">

            <table class="barang-table">

                <thead>
                    <tr>
                        <th class="check-column">
                            <input type="checkbox">
                        </th>

                        <th>NO</th>
                        <th>FOTO</th>
                        <th>NAMA ALAT</th>
                        <th>KATEGORI</th>
                        <th>HARGA SEWA / HARI</th>
                        <th>STOK</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($barangs as $index => $barang)

                        @php
                            if ($barang->stok_tersedia <= 0) {
                                $status = 'habis';
                                $statusText = 'Habis';
                            } elseif ($barang->stok_tersedia <= 3) {
                                $status = 'menipis';
                                $statusText = 'Stok Menipis';
                            } else {
                                $status = 'tersedia';
                                $statusText = 'Tersedia';
                            }
                        @endphp

                        <tr>

                            {{-- CHECKBOX --}}
                            <td class="check-column">
                                <input type="checkbox">
                            </td>


                            {{-- NOMOR --}}
                            <td>
                                {{ $barangs->firstItem() + $index }}
                            </td>


                            {{-- FOTO --}}
                            <td>

                                @if($barang->foto)
                                    <div class="barang-photo">
                                        <img
                                            src="{{ asset('storage/' . $barang->foto) }}"
                                            alt="{{ $barang->nama_barang }}"
                                        >
                                    </div>
                                @else
                                    <div class="barang-photo no-photo">
                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5">
                                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                                            <circle cx="8.5" cy="8.5" r="1.5"/>
                                            <path d="M21 15l-5-5L5 21"/>
                                        </svg>
                                    </div>
                                @endif

                            </td>


                            {{-- NAMA --}}
                            <td>

                                <div class="barang-name">

                                    <strong>
                                        {{ $barang->nama_barang }}
                                    </strong>

                                    <span>
                                        KODE: ALT-{{ str_pad($barang->id_barang, 3, '0', STR_PAD_LEFT) }}
                                    </span>

                                </div>

                            </td>


                            {{-- KATEGORI --}}
                            <td>

                                <span class="kategori-badge">
                                    {{ $barang->kategori }}
                                </span>

                            </td>


                            {{-- HARGA --}}
                            <td>

                                <span class="harga">
                                    Rp {{ number_format($barang->harga_sewa, 0, ',', '.') }}
                                </span>

                            </td>


                            {{-- STOK --}}
                            <td>

                                {{ $barang->stok_tersedia }}
                                unit

                            </td>


                            {{-- STATUS --}}
                            <td>

                                <span class="barang-status {{ $status }}">
                                    {{ $statusText }}
                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="barang-actions">

                                    {{-- DETAIL --}}
                                    <a href="{{ route('admin.barang.show', $barang) }}"
                                        class="action-btn detail"
                                        title="Detail">

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="8"/>
                                            <circle cx="12" cy="12" r="2"/>
                                        </svg>

                                    </a>


                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.barang.edit', $barang) }}"
                                        class="action-btn edit"
                                        title="Edit">

                                        <svg viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="M12 20h9"/>
                                            <path d="M16.5 3.5a2.1 2.1 0 013 3L8 18l-4 1 1-4L16.5 3.5z"/>
                                        </svg>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.barang.destroy', $barang) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus alat ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="action-btn delete"
                                            title="Hapus">

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path d="M4 7h16"/>
                                                <path d="M10 11v6"/>
                                                <path d="M14 11v6"/>
                                                <path d="M6 7l1 14h10l1-14"/>
                                                <path d="M9 7V4h6v3"/>
                                            </svg>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="empty-data">
                                Belum ada data alat camping.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- FOOTER --}}
        <div class="barang-footer">

            <div class="barang-total">

                @if($barangs->total() > 0)
                    Menampilkan
                    {{ $barangs->firstItem() }}–{{ $barangs->lastItem() }}
                    dari {{ $barangs->total() }} data
                @else
                    Menampilkan 0 data
                @endif

            </div>


            {{-- PAGINATION --}}
            @if($barangs->hasPages())

                <div class="barang-pagination">

                    {{-- PREVIOUS --}}
                    @if($barangs->onFirstPage())
                        <span class="page-btn disabled">‹</span>
                    @else
                        <a href="{{ $barangs->previousPageUrl() }}"
                            class="page-btn">
                            ‹
                        </a>
                    @endif


                    {{-- NOMOR HALAMAN --}}
                    @foreach($barangs->getUrlRange(
                        max(1, $barangs->currentPage() - 2),
                        min($barangs->lastPage(), $barangs->currentPage() + 2)
                    ) as $page => $url)

                        @if($page == $barangs->currentPage())
                            <span class="page-btn active">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="page-btn">
                                {{ $page }}
                            </a>
                        @endif

                    @endforeach


                    {{-- NEXT --}}
                    @if($barangs->hasMorePages())
                        <a href="{{ $barangs->nextPageUrl() }}"
                            class="page-btn">
                            ›
                        </a>
                    @else
                        <span class="page-btn disabled">›</span>
                    @endif

                </div>

            @endif

        </div>

    </div>

</div>

@endsection