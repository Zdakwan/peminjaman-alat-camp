@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-container">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <div class="breadcrumb">
                ADMIN PANEL / DASHBOARD
            </div>

            <h1>Dashboard</h1>

            <p>
                Ringkasan aktivitas penyewaan CampRent.
            </p>
        </div>

        <button class="refresh-btn" onclick="location.reload()">

            <svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path d="M20 11a8 8 0 1 0 2 5"/>
                <path d="M20 4v7h-7"/>
            </svg>

            Refresh

        </button>

    </div>


    {{-- STATISTICS --}}
    <div class="stats-grid">

        {{-- TOTAL PELANGGAN --}}
        <div class="stat-card">

            <div class="stat-content">

                <span class="stat-label">
                    TOTAL PELANGGAN
                </span>

                <h2>286</h2>

                <span class="stat-growth">
                    ↑ 8,2% bulan ini
                </span>

            </div>

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="8" r="3"/>
                    <path d="M5 21c0-4 3-6 7-6s7 2 7 6"/>
                </svg>

            </div>

        </div>


        {{-- ALAT --}}
        <div class="stat-card">

            <div class="stat-content">

                <span class="stat-label">
                    ALAT TERSEDIA
                </span>

                <h2>
                    {{ $alatTersedia }}
                    <small>alat</small>
                </h2>

                <span class="stat-description">
                    {{ $alatDisewa }} alat sedang disewa
                </span>

            </div>

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8">
                    <rect x="4" y="5" width="16" height="14" rx="2"/>
                    <path d="M8 5V3h8v2"/>
                </svg>

            </div>

        </div>


        {{-- TRANSAKSI --}}
        <div class="stat-card">

            <div class="stat-content">

                <span class="stat-label">
                    TRANSAKSI AKTIF
                </span>

                <h2>34</h2>

                <span class="stat-growth">
                    12 transaksi selesai hari ini
                </span>

            </div>

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8">
                    <path d="M7 7h12"/>
                    <path d="M17 3l4 4-4 4"/>
                    <path d="M17 17H5"/>
                    <path d="M7 13l-4 4 4 4"/>
                </svg>

            </div>

        </div>


        {{-- PENDAPATAN --}}
        <div class="stat-card">

            <div class="stat-content">

                <span class="stat-label">
                    PENDAPATAN BULAN INI
                </span>

                <h2>Rp 18,75 Jt</h2>

                <span class="stat-growth">
                    ↑ 15,2% dari bulan lalu
                </span>

            </div>

            <div class="stat-icon currency">
                Rp
            </div>

        </div>

    </div>


    {{-- RECENT ACTIVITY --}}
    <div class="activity-card">

        <div class="activity-header">

            <div>
                <h3>Aktivitas Terbaru</h3>

                <p>
                    Transaksi penyewaan terbaru
                </p>
            </div>

            <a href="#">
                Lihat semua →
            </a>

        </div>


        {{-- TABLE --}}
        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>NO</th>
                        <th>KODE TRANSAKSI</th>
                        <th>PELANGGAN</th>
                        <th>ALAT</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>01</td>

                        <td>
                            <strong>TRX-00156</strong>
                        </td>

                        <td>
                            Budi Santoso
                        </td>

                        <td>
                            2 alat
                        </td>

                        <td class="price">
                            Rp 150.000
                        </td>

                        <td>
                            <span class="status berjalan">
                                Berjalan
                            </span>
                        </td>

                    </tr>


                    <tr>

                        <td>02</td>

                        <td>
                            <strong>TRX-00155</strong>
                        </td>

                        <td>
                            Siti Aminah
                        </td>

                        <td>
                            1 alat
                        </td>

                        <td class="price">
                            Rp 150.000
                        </td>

                        <td>
                            <span class="status terlambat">
                                Terlambat
                            </span>
                        </td>

                    </tr>


                    <tr>

                        <td>03</td>

                        <td>
                            <strong>TRX-00154</strong>
                        </td>

                        <td>
                            Andi Pratama
                        </td>

                        <td>
                            3 alat
                        </td>

                        <td class="price">
                            Rp 225.000
                        </td>

                        <td>
                            <span class="status selesai">
                                Selesai
                            </span>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        {{-- FOOTER --}}
        <div class="activity-footer">
            Dashboard diperbarui secara berkala
        </div>

    </div>

</div>

@endsection