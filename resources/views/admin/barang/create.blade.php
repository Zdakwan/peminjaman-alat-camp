@extends('layouts.admin')

@section('title', 'Tambah Alat')

@section('content')

<div class="dashboard-container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <div class="breadcrumb">
                ADMIN PANEL / KELOLA ALAT / TAMBAH ALAT
            </div>

            <h1>Tambah Alat</h1>

            <p>
                Tambahkan alat camping baru ke dalam daftar CampRent.
            </p>
        </div>

        <a href="{{ route('admin.barang.index') }}" class="back-btn">
            ← Kembali
        </a>

    </div>


    {{-- ERROR VALIDATION --}}
    @if ($errors->any())

        <div class="form-alert">

            <strong>
                Terdapat kesalahan pada input:
            </strong>

            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <div class="form-card">

        <form
            action="{{ route('admin.barang.store') }}"
            method="POST"
        >

            @csrf


            {{-- INFORMASI ALAT --}}
            <div class="form-section">

                <div class="form-section-title">
                    Informasi Alat
                </div>


                <div class="form-grid">


                    {{-- NAMA ALAT --}}
                    <div class="form-group full">

                        <label for="nama_barang">
                            Nama Alat
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="nama_barang"
                            name="nama_barang"
                            value="{{ old('nama_barang') }}"
                            placeholder="Contoh: Tenda Dome 4 Orang"
                            required
                        >

                    </div>


                    {{-- KATEGORI --}}
                    <div class="form-group">

                        <label for="kategori">
                            Kategori
                            <span>*</span>
                        </label>

                        <select
                            id="kategori"
                            name="kategori"
                            required
                        >

                            <option value="">
                                Pilih kategori
                            </option>

                            <option value="Tenda"
                                {{ old('kategori') == 'Tenda' ? 'selected' : '' }}>
                                Tenda
                            </option>

                            <option value="Sleeping Bag"
                                {{ old('kategori') == 'Sleeping Bag' ? 'selected' : '' }}>
                                Sleeping Bag
                            </option>

                            <option value="Carrier"
                                {{ old('kategori') == 'Carrier' ? 'selected' : '' }}>
                                Carrier
                            </option>

                            <option value="Kompor"
                                {{ old('kategori') == 'Kompor' ? 'selected' : '' }}>
                                Kompor
                            </option>

                            <option value="Peralatan Masak"
                                {{ old('kategori') == 'Peralatan Masak' ? 'selected' : '' }}>
                                Peralatan Masak
                            </option>

                            <option value="Penerangan"
                                {{ old('kategori') == 'Penerangan' ? 'selected' : '' }}>
                                Penerangan
                            </option>

                            <option value="Aksesoris"
                                {{ old('kategori') == 'Aksesoris' ? 'selected' : '' }}>
                                Aksesoris
                            </option>

                        </select>

                    </div>


                    {{-- HARGA --}}
                    <div class="form-group">

                        <label for="harga_sewa">
                            Harga Sewa / Hari
                            <span>*</span>
                        </label>

                        <div class="input-prefix">

                            <span>Rp</span>

                            <input
                                type="number"
                                id="harga_sewa"
                                name="harga_sewa"
                                value="{{ old('harga_sewa') }}"
                                placeholder="50000"
                                min="0"
                                required
                            >

                        </div>

                    </div>


                    {{-- TOTAL STOK --}}
                    <div class="form-group">

                        <label for="stok">
                            Total Stok
                            <span>*</span>
                        </label>

                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            value="{{ old('stok') }}"
                            placeholder="10"
                            min="0"
                            required
                        >

                    </div>


                    {{-- STOK TERSEDIA --}}
                    <div class="form-group">

                        <label for="stok_tersedia">
                            Stok Tersedia
                            <span>*</span>
                        </label>

                        <input
                            type="number"
                            id="stok_tersedia"
                            name="stok_tersedia"
                            value="{{ old('stok_tersedia') }}"
                            placeholder="10"
                            min="0"
                            required
                        >

                        <small>
                            Jumlah alat yang saat ini dapat disewa.
                        </small>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="form-group full">

                        <label for="deskripsi">
                            Deskripsi
                        </label>

                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            rows="5"
                            placeholder="Masukkan deskripsi alat..."
                        >{{ old('deskripsi') }}</textarea>

                    </div>


                    {{-- FOTO --}}
                    <div class="form-group full">

                        <label for="foto">
                            Foto
                        </label>

                        <input
                            type="text"
                            id="foto"
                            name="foto"
                            value="{{ old('foto') }}"
                            placeholder="Contoh: tenda-dome.jpg"
                        >

                        <small>
                            Untuk sementara masukkan nama/path file foto.
                            Upload foto akan kita buat pada tahap berikutnya.
                        </small>

                    </div>


                </div>

            </div>


            {{-- ACTION --}}
            <div class="form-actions">

                <a
                    href="{{ route('admin.barang.index') }}"
                    class="cancel-btn"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="save-btn"
                >
                    Simpan Alat
                </button>

            </div>

        </form>

    </div>

</div>


{{-- STYLE --}}
<style>

    /* =========================
       BACK BUTTON
    ========================= */

    .back-btn {

        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 10px 15px;

        background: #111c30;
        border: 1px solid #253550;
        border-radius: 7px;

        color: #aab5c7;

        font-size: 11px;
        font-weight: 500;

        text-decoration: none;

        transition: 0.2s;

    }

    .back-btn:hover {

        color: #00d6a3;
        border-color: #00d6a3;
        background: #17243a;

    }


    /* =========================
       FORM CARD
    ========================= */

    .form-card {

        background: #111b2d;
        border: 1px solid #24334d;
        border-radius: 9px;
        overflow: hidden;

    }


    /* =========================
       FORM SECTION
    ========================= */

    .form-section {

        padding: 28px;

    }


    .form-section-title {

        font-size: 15px;
        font-weight: 600;
        color: #e7edf7;
        padding-bottom: 16px;
        margin-bottom: 24px;
        border-bottom: 1px solid #24334d;

    }


    /* =========================
       FORM GRID
    ========================= */

    .form-grid {

        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 22px;

    }


    .form-group {

        display: flex;
        flex-direction: column;
        gap: 8px;

    }


    .form-group.full {

        grid-column: 1 / -1;

    }


    /* =========================
       LABEL
    ========================= */

    .form-group label {

        font-size: 12px;
        font-weight: 600;
        color: #aeb9ca;

    }


    .form-group label span {

        color: #ff5570;

    }


    /* =========================
       INPUT
    ========================= */

    .form-group input,
    .form-group select,
    .form-group textarea {

        width: 100%;
        min-height: 42px;
        padding: 10px 13px;
        background: #0d1728;
        border: 1px solid #263852;
        border-radius: 7px;
        color: #dbe3ef;
        font-family: inherit;
        font-size: 12px;
        outline: none;
        box-sizing: border-box;
        transition: 0.2s;

    }


    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {

        border-color: #00d6a3;

        box-shadow:
            0 0 0 2px rgba(0, 214, 163, 0.08);

    }


    .form-group input::placeholder,
    .form-group textarea::placeholder {

        color: #59677d;

    }


    /* =========================
       SELECT
    ========================= */

    .form-group select {

        cursor: pointer;

    }


    .form-group select option {

        background: #0d1728;
        color: #dbe3ef;

    }


    /* =========================
       TEXTAREA
    ========================= */

    .form-group textarea {

        resize: vertical;
        min-height: 130px;
        line-height: 1.5;

    }


    /* =========================
       HELPER TEXT
    ========================= */

    .form-group small {

        color: #59677d;
        font-size: 10px;
        line-height: 1.5;

    }


    /* =========================
       HARGA
    ========================= */

    .input-prefix {

        display: flex;
        align-items: center;
        min-height: 42px;
        background: #0d1728;
        border: 1px solid #263852;
        border-radius: 7px;
        overflow: hidden;
        transition: 0.2s;

    }


    .input-prefix span {

        padding-left: 13px;
        color: #00d6a3;
        font-size: 12px;
        font-weight: 600;

    }


    .input-prefix input {

        min-height: 40px;
        border: none;
        background: transparent;
        box-shadow: none;
        padding-left: 8px;

    }


    .input-prefix input:focus {

        border: none;
        box-shadow: none;

    }


    .input-prefix:focus-within {

        border-color: #00d6a3;
        box-shadow:
            0 0 0 2px rgba(0, 214, 163, 0.08);

    }


    /* =========================
       ACTION
    ========================= */

    .form-actions {

        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 28px;
        border-top: 1px solid #24334d;
        background: #0d1728;

    }


    .cancel-btn,
    .save-btn {

        padding: 10px 18px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        border: none;
        transition: 0.2s;

    }


    /* BATAL */

    .cancel-btn {

        color: #8795aa;
        background: #17243a;
        border: 1px solid #263852;

    }


    .cancel-btn:hover {

        color: #dbe3ef;
        background: #1c2d46;
        border-color: #3a506f;

    }


    /* SIMPAN */

    .save-btn {

        color: #06131b;
        background: #08d3a4;

    }


    .save-btn:hover {

        background: #00e0ad;
        box-shadow:
            0 5px 15px rgba(0, 214, 163, 0.12);

    }


    /* =========================
       ERROR
    ========================= */

    .form-alert {

        margin-bottom: 16px;
        padding: 12px 15px;
        background: #431827;
        border: 1px solid #6d243d;
        border-radius: 7px;
        color: #ff6b82;
        font-size: 11px;

    }


    .form-alert strong {

        color: #ff8094;

    }


    .form-alert ul {

        margin: 8px 0 0 18px;
        padding: 0;

    }


    .form-alert li {

        margin-bottom: 3px;

    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .form-section {

            padding: 20px;

        }

        .form-grid {

            grid-template-columns: 1fr;
            gap: 18px;

        }

        .form-group.full {

            grid-column: auto;

        }

        .form-actions {

            flex-direction: column-reverse;
            padding: 15px 20px;

        }

        .cancel-btn,
        .save-btn {

            width: 100%;
            text-align: center;

        }

    }

</style>

@endsection