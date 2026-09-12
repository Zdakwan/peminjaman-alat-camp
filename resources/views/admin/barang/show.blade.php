@extends('layouts.admin')

@section('title', 'Detail Alat')

@section('content')

<div class="dashboard-container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <div class="breadcrumb">
                ADMIN PANEL / KELOLA ALAT / DETAIL ALAT
            </div>

            <h1>Detail Alat</h1>

            <p>
                Informasi lengkap mengenai alat camping yang terdaftar di CampRent.
            </p>
        </div>

        <div class="header-actions">

            <a
                href="{{ route('admin.barang.edit', $barang) }}"
                class="edit-btn"
            >
                ✎ Edit Alat
            </a>

            <a
                href="{{ route('admin.barang.index') }}"
                class="back-btn"
            >
                ← Kembali
            </a>

        </div>

    </div>


    {{-- DETAIL CARD --}}
    <div class="detail-card">

        {{-- FOTO --}}
        <div class="detail-image">

            @if ($barang->foto)

                <img
                    src="{{ asset('storage/' . $barang->foto) }}"
                    alt="{{ $barang->nama_barang }}"
                >

            @else

                <div class="image-placeholder">

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
                            d="m21 15-5-5L5 21"
                        />
                    </svg>

                    <span>
                        Belum ada foto
                    </span>

                </div>

            @endif

        </div>


        {{-- INFORMASI --}}
        <div class="detail-content">

            {{-- NAMA --}}
            <div class="detail-title">

                <span class="detail-category">
                    {{ $barang->kategori }}
                </span>

                <h2>
                    {{ $barang->nama_barang }}
                </h2>

                <p>
                    ID Alat: #{{ $barang->id_barang }}
                </p>

            </div>


            {{-- HARGA --}}
            <div class="price-box">

                <span>
                    Harga Sewa
                </span>

                <strong>
                    Rp {{ number_format($barang->harga_sewa, 0, ',', '.') }}
                </strong>

                <small>
                    / hari
                </small>

            </div>


            {{-- STOK --}}
            <div class="stock-grid">

                {{-- TOTAL STOK --}}
                <div class="stock-item">

                    <span class="stock-label">
                        TOTAL STOK
                    </span>

                    <strong>
                        {{ $barang->stok }}
                    </strong>

                    <small>
                        unit
                    </small>

                </div>


                {{-- STOK TERSEDIA --}}
                <div class="stock-item">

                    <span class="stock-label">
                        STOK TERSEDIA
                    </span>

                    <strong>
                        {{ $barang->stok_tersedia }}
                    </strong>

                    <small>
                        unit
                    </small>

                </div>


                {{-- SEDANG DISEWA --}}
                <div class="stock-item">

                    <span class="stock-label">
                        SEDANG DISEWA
                    </span>

                    <strong>
                        {{ $barang->stok - $barang->stok_tersedia }}
                    </strong>

                    <small>
                        unit
                    </small>

                </div>

            </div>


            {{-- STATUS --}}
            <div class="status-row">

                <span class="status-label">
                    STATUS ALAT
                </span>

                @if ($barang->stok_tersedia <= 0)

                    <span class="status-badge habis">
                        Habis

                    </span>

                @elseif ($barang->stok_tersedia <= 3)

                    <span class="status-badge menipis">
                        Stok Menipis

                    </span>

                @else

                    <span class="status-badge tersedia">
                        Tersedia

                    </span>

                @endif

            </div>

        </div>

    </div>


    {{-- DESKRIPSI --}}
    <div class="information-card">

        <div class="information-header">

            <div>

                <h3>
                    Deskripsi Alat
                </h3>

                <p>
                    Informasi mengenai alat
                </p>

            </div>

        </div>


        <div class="description">

            @if ($barang->deskripsi)

                {!! nl2br(e($barang->deskripsi)) !!}

            @else

                <span class="empty-description">
                    Belum ada deskripsi untuk alat ini.
                </span>

            @endif

        </div>

    </div>


    {{-- INFORMASI SISTEM --}}
    <div class="information-card">

        <div class="information-header">

            <div>

                <h3>
                    Informasi Sistem
                </h3>

                <p>
                    Informasi pencatatan data alat
                </p>

            </div>

        </div>


        <div class="system-grid">

            <div class="system-item">

                <span>
                    ID Alat
                </span>

                <strong>
                    #{{ $barang->id_barang }}
                </strong>

            </div>


            <div class="system-item">

                <span>
                    Kategori
                </span>

                <strong>
                    {{ $barang->kategori }}
                </strong>

            </div>


            <div class="system-item">

                <span>
                    Ditambahkan
                </span>

                <strong>
                    {{ $barang->created_at ? $barang->created_at->format('d M Y, H:i') : '-' }}
                </strong>

            </div>


            <div class="system-item">

                <span>
                    Terakhir diperbarui
                </span>

                <strong>
                    {{ $barang->updated_at ? $barang->updated_at->format('d M Y, H:i') : '-' }}
                </strong>

            </div>

        </div>

    </div>

</div>


{{-- STYLE --}}
<style>

    /* =========================
       HEADER ACTIONS
    ========================= */

    .header-actions {

        display: flex;

        align-items: center;

        gap: 10px;

    }


    /* =========================
       BACK BUTTON
    ========================= */

    .back-btn,
    .edit-btn {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 7px;

        padding: 10px 15px;

        border-radius: 7px;

        font-size: 11px;

        font-weight: 600;

        text-decoration: none;

        transition: 0.2s;

    }


    .back-btn {

        background: #111c30;

        border: 1px solid #253550;

        color: #aab5c7;

    }


    .back-btn:hover {

        color: #00d6a3;

        border-color: #00d6a3;

        background: #17243a;

    }


    /* =========================
       EDIT BUTTON
    ========================= */

    .edit-btn {

        background: #08d3a4;

        color: #06131b;

        border: 1px solid #08d3a4;

    }


    .edit-btn:hover {

        background: #00e0ad;

        box-shadow:
            0 5px 15px rgba(0, 214, 163, 0.12);

    }


    /* =========================
       DETAIL CARD
    ========================= */

    .detail-card {

        display: grid;

        grid-template-columns: 360px 1fr;

        background: #111b2d;

        border: 1px solid #24334d;

        border-radius: 9px;

        overflow: hidden;

        margin-bottom: 20px;

    }


    /* =========================
       IMAGE
    ========================= */

    .detail-image {

        min-height: 390px;

        background: #0d1728;

        border-right: 1px solid #24334d;

        display: flex;

        align-items: center;

        justify-content: center;

        overflow: hidden;

    }


    .detail-image img {

        width: 100%;

        height: 100%;

        min-height: 390px;

        object-fit: cover;

        display: block;

    }


    /* =========================
       IMAGE PLACEHOLDER
    ========================= */

    .image-placeholder {

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        gap: 12px;

        color: #59677d;

    }


    .image-placeholder svg {

        width: 65px;

        height: 65px;

    }


    .image-placeholder span {

        font-size: 11px;

    }


    /* =========================
       DETAIL CONTENT
    ========================= */

    .detail-content {

        padding: 30px;

    }


    /* =========================
       TITLE
    ========================= */

    .detail-title {

        margin-bottom: 24px;

    }


    .detail-category {

        display: inline-block;

        padding: 5px 9px;

        margin-bottom: 10px;

        background: rgba(0, 214, 163, 0.08);

        border: 1px solid rgba(0, 214, 163, 0.18);

        border-radius: 5px;

        color: #00d6a3;

        font-size: 10px;

        font-weight: 600;

    }


    .detail-title h2 {

        margin: 0 0 7px;

        color: #e7edf7;

        font-size: 24px;

        font-weight: 600;

    }


    .detail-title p {

        margin: 0;

        color: #59677d;

        font-size: 11px;

    }


    /* =========================
       PRICE
    ========================= */

    .price-box {

        display: flex;

        align-items: baseline;

        gap: 6px;

        padding: 17px 18px;

        margin-bottom: 20px;

        background: #0d1728;

        border: 1px solid #24334d;

        border-radius: 7px;

    }


    .price-box span {

        color: #7d8ba0;

        font-size: 11px;

        margin-right: 4px;

    }


    .price-box strong {

        color: #08d3a4;

        font-size: 19px;

        font-weight: 600;

    }


    .price-box small {

        color: #59677d;

        font-size: 10px;

    }


    /* =========================
       STOCK GRID
    ========================= */

    .stock-grid {

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 10px;

        margin-bottom: 20px;

    }


    .stock-item {

        padding: 16px;

        background: #0d1728;

        border: 1px solid #24334d;

        border-radius: 7px;

    }


    .stock-label {

        display: block;

        color: #59677d;

        font-size: 9px;

        font-weight: 600;

        margin-bottom: 8px;

    }


    .stock-item strong {

        color: #dbe3ef;

        font-size: 20px;

        font-weight: 600;

    }


    .stock-item small {

        color: #59677d;

        font-size: 9px;

        margin-left: 3px;

    }


    /* =========================
       STATUS
    ========================= */

    .status-row {

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding-top: 18px;

        border-top: 1px solid #24334d;

    }


    .status-label {

        color: #7d8ba0;

        font-size: 11px;

        font-weight: 600;

    }


    .status-badge {

        display: inline-flex;

        align-items: center;

        padding: 6px 11px;

        border-radius: 5px;

        font-size: 10px;

        font-weight: 600;

    }


    .status-badge.tersedia {

        color: #00d6a3;

        background: rgba(0, 214, 163, 0.08);

        border: 1px solid rgba(0, 214, 163, 0.18);

    }


    .status-badge.menipis {

        color: #f4c95d;

        background: rgba(244, 201, 93, 0.08);

        border: 1px solid rgba(244, 201, 93, 0.18);

    }


    .status-badge.habis {

        color: #ff6078;

        background: rgba(255, 96, 120, 0.08);

        border: 1px solid rgba(255, 96, 120, 0.18);

    }


    /* =========================
       INFORMATION CARD
    ========================= */

    .information-card {

        background: #111b2d;

        border: 1px solid #24334d;

        border-radius: 9px;

        margin-bottom: 20px;

        overflow: hidden;

    }


    .information-header {

        padding: 20px 24px;

        border-bottom: 1px solid #24334d;

    }


    .information-header h3 {

        margin: 0 0 5px;

        color: #e7edf7;

        font-size: 14px;

        font-weight: 600;

    }


    .information-header p {

        margin: 0;

        color: #59677d;

        font-size: 10px;

    }


    /* =========================
       DESCRIPTION
    ========================= */

    .description {

        padding: 22px 24px;

        color: #aeb9ca;

        font-size: 12px;

        line-height: 1.7;

    }


    .empty-description {

        color: #59677d;

        font-style: italic;

    }


    /* =========================
       SYSTEM GRID
    ========================= */

    .system-grid {

        display: grid;

        grid-template-columns: repeat(2, 1fr);

    }


    .system-item {

        padding: 18px 24px;

        border-bottom: 1px solid #24334d;

    }


    .system-item:nth-child(odd) {

        border-right: 1px solid #24334d;

    }


    .system-item:nth-child(3),
    .system-item:nth-child(4) {

        border-bottom: none;

    }


    .system-item span {

        display: block;

        margin-bottom: 6px;

        color: #59677d;

        font-size: 10px;

    }


    .system-item strong {

        color: #dbe3ef;

        font-size: 12px;

        font-weight: 500;

    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .detail-card {

            grid-template-columns: 1fr;

        }


        .detail-image {

            min-height: 300px;

            border-right: none;

            border-bottom: 1px solid #24334d;

        }


        .detail-image img {

            min-height: 300px;

        }

    }


    @media (max-width: 768px) {

        .page-header {

            flex-direction: column;

            align-items: flex-start;

            gap: 15px;

        }


        .header-actions {

            width: 100%;

        }


        .back-btn,
        .edit-btn {

            flex: 1;

        }


        .detail-content {

            padding: 20px;

        }


        .stock-grid {

            grid-template-columns: 1fr;

        }


        .system-grid {

            grid-template-columns: 1fr;

        }


        .system-item:nth-child(odd) {

            border-right: none;

        }


        .system-item:nth-child(3) {

            border-bottom: 1px solid #24334d;

        }

    }

</style>

@endsection