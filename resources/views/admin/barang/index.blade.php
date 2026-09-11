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

                <span class="stat-label">
                    TOTAL ALAT
                </span>

                <h2>
                    {{ $totalAlat }}
                </h2>

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

                <span class="stat-label">
                    SEDANG DISEWA
                </span>

                <h2>
                    {{ $sedangDisewa }}
                </h2>

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

                <span class="stat-label">
                    TERSEDIA
                </span>

                <h2>
                    {{ $stokTersedia }}
                </h2>

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

                <span class="stat-label">
                    STOK MENIPIS
                </span>

                <h2>
                    {{ $stokMenipis }}
                </h2>

                <span class="stok-warning-text">
                    stok &lt; 3 unit
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

                <h3>
                    Daftar Alat Camping
                </h3>

            </div>


            <a
                href="{{ route('admin.barang.create') }}"
                class="btn-tambah"
            >

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">

                    <path d="M12 5v14"/>
                    <path d="M5 12h14"/>

                </svg>

                Tambah Alat

            </a>

        </div>


        {{-- FILTER --}}
        <form
            method="GET"
            action="{{ route('admin.barang.index') }}"
            class="barang-filter"
        >


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
            <select
                name="kategori"
                class="filter-select"
            >

                <option value="">
                    Semua Kategori
                </option>


                @foreach($kategoris as $kategori)

                    <option
                        value="{{ $kategori }}"
                        {{ request('kategori') == $kategori ? 'selected' : '' }}
                    >
                        {{ $kategori }}
                    </option>

                @endforeach

            </select>


            {{-- STATUS --}}
            <select
                name="status"
                class="filter-select"
            >

                <option value="">
                    Semua Status
                </option>


                <option
                    value="tersedia"
                    {{ request('status') == 'tersedia' ? 'selected' : '' }}
                >
                    Tersedia
                </option>


                <option
                    value="menipis"
                    {{ request('status') == 'menipis' ? 'selected' : '' }}
                >
                    Stok Menipis
                </option>


                <option
                    value="habis"
                    {{ request('status') == 'habis' ? 'selected' : '' }}
                >
                    Habis
                </option>

            </select>


            {{-- BUTTON FILTER --}}
            <button
                type="submit"
                class="btn-filter"
            >
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

                                <input
                                    type="checkbox"
                                    value="{{ $barang->id_barang }}"
                                >

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

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                        >

                                            <rect
                                                x="3"
                                                y="3"
                                                width="18"
                                                height="18"
                                                rx="2"
                                            />

                                            <circle
                                                cx="8.5"
                                                cy="8.5"
                                                r="1.5"
                                            />

                                            <path
                                                d="M21 15l-5-5L5 21"
                                            />

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

                                        KODE:
                                        ALT-{{
                                            str_pad(
                                                $barang->id_barang,
                                                3,
                                                '0',
                                                STR_PAD_LEFT
                                            )
                                        }}

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

                                    Rp
                                    {{ number_format(
                                        $barang->harga_sewa,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            </td>


                            {{-- STOK --}}
                            <td>

                                {{ $barang->stok_tersedia }}
                                unit

                            </td>


                            {{-- STATUS --}}
                            <td>

                                <span
                                    class="barang-status {{ $status }}"
                                >

                                    {{ $statusText }}

                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="barang-actions">


                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('admin.barang.show', $barang) }}"
                                        class="action-btn detail"
                                        title="Detail"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="8"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="2"
                                            />

                                        </svg>

                                    </a>


                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('admin.barang.edit', $barang) }}"
                                        class="action-btn edit"
                                        title="Edit"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <path d="M12 20h9"/>

                                            <path
                                                d="M16.5 3.5a2.1 2.1 0 013 3L8 18l-4 1 1-4L16.5 3.5z"
                                            />

                                        </svg>

                                    </a>


                                    {{-- HAPUS --}}
                                    <button
                                        type="button"
                                        class="action-btn delete"
                                        title="Hapus"

                                        onclick="openDeleteModal(
                                            @js($barang->nama_barang),
                                            '{{ route('admin.barang.destroy', $barang) }}'
                                        )"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <path d="M4 7h16"/>

                                            <path d="M10 11v6"/>

                                            <path d="M14 11v6"/>

                                            <path
                                                d="M6 7l1 14h10l1-14"
                                            />

                                            <path
                                                d="M9 7V4h6v3"
                                            />

                                        </svg>

                                    </button>


                                </div>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="9"
                                class="empty-data"
                            >

                                Belum ada data alat camping.

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


        {{-- FOOTER --}}
        <div class="barang-footer">


            {{-- TOTAL DATA --}}
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

                        <span class="page-btn disabled">
                            ‹
                        </span>

                    @else

                        <a
                            href="{{ $barangs->previousPageUrl() }}"
                            class="page-btn"
                        >
                            ‹
                        </a>

                    @endif


                    {{-- NOMOR HALAMAN --}}
                    @foreach(
                        $barangs->getUrlRange(
                            max(1, $barangs->currentPage() - 2),
                            min(
                                $barangs->lastPage(),
                                $barangs->currentPage() + 2
                            )
                        ) as $page => $url
                    )


                        @if($page == $barangs->currentPage())

                            <span class="page-btn active">
                                {{ $page }}
                            </span>

                        @else

                            <a
                                href="{{ $url }}"
                                class="page-btn"
                            >
                                {{ $page }}
                            </a>

                        @endif


                    @endforeach


                    {{-- NEXT --}}
                    @if($barangs->hasMorePages())

                        <a
                            href="{{ $barangs->nextPageUrl() }}"
                            class="page-btn"
                        >
                            ›
                        </a>

                    @else

                        <span class="page-btn disabled">
                            ›
                        </span>

                    @endif


                </div>

            @endif


        </div>

    </div>

</div>


{{-- =========================================================
     DELETE MODAL
========================================================= --}}

<div
    id="deleteModal"
    class="delete-modal"
>


    {{-- OVERLAY --}}
    <div
        class="delete-modal-overlay"
        onclick="closeDeleteModal()"
    ></div>


    {{-- MODAL CARD --}}
    <div class="delete-modal-card">


        {{-- ICON --}}
        <div class="delete-modal-icon">

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
            >

                <path d="M3 6h18"/>

                <path d="M8 6V4h8v2"/>

                <path d="M19 6l-1 15H6L5 6"/>

                <path d="M10 11v6"/>

                <path d="M14 11v6"/>

            </svg>

        </div>


        {{-- CONTENT --}}
        <div class="delete-modal-content">

            <h3>
                Hapus Alat?
            </h3>

            <p>

                Apakah kamu yakin ingin menghapus

                <strong id="deleteBarangName">
                    alat ini
                </strong>?

            </p>

            <span class="delete-warning">

                Data yang sudah dihapus tidak dapat dikembalikan.

            </span>

        </div>


        {{-- ACTION --}}
        <div class="delete-modal-actions">


            {{-- BATAL --}}
            <button
                type="button"
                class="modal-cancel-btn"
                onclick="closeDeleteModal()"
            >

                Batal

            </button>


            {{-- FORM DELETE --}}
            <form
                id="deleteForm"
                method="POST"
            >

                @csrf

                @method('DELETE')


                <button
                    type="submit"
                    class="modal-delete-btn"
                >

                    Hapus Alat

                </button>

            </form>


        </div>


    </div>

</div>


{{-- =========================================================
     STYLE
========================================================= --}}

<style>


    /* =========================
       ACTION BUTTON
    ========================= */

    .barang-actions {

        display: flex;

        align-items: center;

        gap: 6px;

    }


    .action-btn {

        width: 32px;

        height: 32px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 0;

        border-radius: 6px;

        border: 1px solid #263852;

        background: #0d1728;

        color: #8795aa;

        text-decoration: none;

        cursor: pointer;

        transition: 0.2s;

    }


    .action-btn svg {

        width: 15px;

        height: 15px;

    }


    /* DETAIL */

    .action-btn.detail:hover {

        color: #00d6a3;

        border-color: #00d6a3;

        background: rgba(0, 214, 163, 0.08);

    }


    /* EDIT */

    .action-btn.edit:hover {

        color: #f4c95d;

        border-color: #f4c95d;

        background: rgba(244, 201, 93, 0.08);

    }


    /* DELETE */

    .action-btn.delete:hover {

        color: #ff6078;

        border-color: #ff6078;

        background: rgba(255, 96, 120, 0.08);

    }


    /* =========================
       DELETE MODAL
    ========================= */

    .delete-modal {

        position: fixed;

        inset: 0;

        display: none;

        align-items: center;

        justify-content: center;

        padding: 20px;

        z-index: 9999;

    }


    .delete-modal.show {

        display: flex;

    }


    /* =========================
       OVERLAY
    ========================= */

    .delete-modal-overlay {

        position: absolute;

        inset: 0;

        background: rgba(3, 8, 18, 0.78);

        backdrop-filter: blur(4px);

    }


    /* =========================
       MODAL CARD
    ========================= */

    .delete-modal-card {

        position: relative;

        width: 100%;

        max-width: 400px;

        padding: 28px;

        background: #111b2d;

        border: 1px solid #24334d;

        border-radius: 12px;

        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.45);

        animation: deleteModalShow 0.2s ease;

    }


    @keyframes deleteModalShow {

        from {

            opacity: 0;

            transform: translateY(10px) scale(0.97);

        }

        to {

            opacity: 1;

            transform: translateY(0) scale(1);

        }

    }


    /* =========================
       DELETE ICON
    ========================= */

    .delete-modal-icon {

        width: 52px;

        height: 52px;

        display: flex;

        align-items: center;

        justify-content: center;

        margin-bottom: 18px;

        border-radius: 50%;

        background: rgba(255, 96, 120, 0.10);

        border: 1px solid rgba(255, 96, 120, 0.20);

        color: #ff6078;

    }


    .delete-modal-icon svg {

        width: 24px;

        height: 24px;

    }


    /* =========================
       MODAL CONTENT
    ========================= */

    .delete-modal-content h3 {

        margin: 0 0 9px;

        color: #e7edf7;

        font-size: 18px;

        font-weight: 600;

    }


    .delete-modal-content p {

        margin: 0;

        color: #8795aa;

        font-size: 12px;

        line-height: 1.6;

    }


    .delete-modal-content p strong {

        color: #dbe3ef;

        font-weight: 600;

    }


    .delete-warning {

        display: block;

        margin-top: 10px;

        color: #ff6078;

        font-size: 10px;

        line-height: 1.5;

    }


    /* =========================
       MODAL ACTION
    ========================= */

    .delete-modal-actions {

        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 9px;

        margin-top: 25px;

    }


    .delete-modal-actions form {

        margin: 0;

        padding: 0;

    }


    /* =========================
       CANCEL BUTTON
    ========================= */

    .modal-cancel-btn {

        padding: 10px 17px;

        background: #17243a;

        border: 1px solid #263852;

        border-radius: 7px;

        color: #aab5c7;

        font-family: inherit;

        font-size: 11px;

        font-weight: 600;

        cursor: pointer;

        transition: 0.2s;

    }


    .modal-cancel-btn:hover {

        color: #dbe3ef;

        background: #1c2d46;

        border-color: #3a506f;

    }


    /* =========================
       DELETE BUTTON
    ========================= */

    .modal-delete-btn {

        padding: 10px 17px;

        background: #ff5570;

        border: 1px solid #ff5570;

        border-radius: 7px;

        color: #ffffff;

        font-family: inherit;

        font-size: 11px;

        font-weight: 600;

        cursor: pointer;

        transition: 0.2s;

    }


    .modal-delete-btn:hover {

        background: #ff3f5f;

        border-color: #ff3f5f;

        box-shadow:
            0 5px 15px rgba(255, 85, 112, 0.15);

    }


    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 500px) {

        .delete-modal-card {

            padding: 22px;

        }


        .delete-modal-actions {

            flex-direction: column-reverse;

            width: 100%;

        }


        .modal-cancel-btn,
        .modal-delete-btn {

            width: 100%;

        }

    }


    /* =========================
       MOBILE ACTION
    ========================= */

    @media (max-width: 768px) {

        .barang-actions {

            gap: 4px;

        }


        .action-btn {

            width: 30px;

            height: 30px;

        }

    }

</style>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}

<script>

    function openDeleteModal(nama, action) {

        const modal = document.getElementById('deleteModal');

        const barangName = document.getElementById('deleteBarangName');

        const deleteForm = document.getElementById('deleteForm');


        // Masukkan nama alat ke modal

        barangName.textContent = nama;


        // Tentukan URL tujuan delete

        deleteForm.action = action;


        // Tampilkan modal

        modal.classList.add('show');


        // Cegah halaman di-scroll

        document.body.style.overflow = 'hidden';

    }


    function closeDeleteModal() {

        const modal = document.getElementById('deleteModal');


        // Sembunyikan modal

        modal.classList.remove('show');


        // Kembalikan scroll

        document.body.style.overflow = '';

    }


    // Tutup modal dengan tombol ESC

    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            closeDeleteModal();

        }

    });

</script>

@endsection