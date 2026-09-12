<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel') - CampRent</title>

    @vite(['resources/css/admin.css'])
</head>

<body>

    <div class="admin-wrapper">

        {{-- SIDEBAR --}}
        <aside class="sidebar">

            {{-- LOGO --}}
            <div class="brand">
                <div class="brand-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M4 5h16v14H4z"/>
                        <path d="M8 9l3 3 5-5"/>
                    </svg>
                </div>

                <div class="brand-text">
                    <strong>CampRent</strong>
                    <span>ADMIN</span>
                </div>
            </div>

            {{-- MENU --}}
            <nav class="sidebar-menu">

                {{-- DASHBOARD --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <rect x="4" y="4" width="6" height="6"/>
                            <rect x="14" y="4" width="6" height="6"/>
                            <rect x="4" y="14" width="6" height="6"/>
                            <rect x="14" y="14" width="6" height="6"/>
                        </svg>
                    </span>

                    <span>Dashboard</span>
                </a>


                {{-- KELOLA ALAT --}}
                <a href="{{ route('admin.barang.index') }}"
                    class="menu-item {{ request()->routeIs('admin.barang.*') ? 'active' : '' }}">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M12 2v3"/>
                            <path d="M12 19v3"/>
                            <path d="M2 12h3"/>
                            <path d="M19 12h3"/>
                        </svg>
                    </span>

                    <span>Kelola Alat</span>
                </a>


                {{-- TRANSAKSI --}}
                <a href="#" class="menu-item">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="M3 6h18"/>
                            <path d="M6 6v14h12V6"/>
                            <path d="M9 10v6"/>
                            <path d="M15 10v6"/>
                            <path d="M9 3h6"/>
                        </svg>
                    </span>

                    <span>Transaksi</span>
                </a>


                {{-- PELANGGAN --}}
                <a href="#" class="menu-item">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="8" r="3"/>
                            <path d="M5 21c0-4 3-6 7-6s7 2 7 6"/>
                        </svg>
                    </span>

                    <span>Pelanggan</span>
                </a>


                {{-- LAPORAN --}}
                <a href="#" class="menu-item">

                    <span class="menu-icon">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="M4 19V5"/>
                            <path d="M4 19h16"/>
                            <path d="M7 16v-5"/>
                            <path d="M11 16V8"/>
                            <path d="M15 16v-7"/>
                            <path d="M19 16V5"/>
                        </svg>
                    </span>

                    <span>Laporan</span>
                </a>

            </nav>


            {{-- LOGOUT --}}
            <div class="sidebar-bottom">

                <a href="#" class="logout">

                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M10 17l5-5-5-5"/>
                        <path d="M15 12H3"/>
                        <path d="M21 3v18"/>
                    </svg>

                    <span>Keluar</span>
                </a>

            </div>

        </aside>


        {{-- MAIN CONTENT --}}
        <main class="main-content">

            @yield('content')

        </main>

    </div>

</body>

</html>