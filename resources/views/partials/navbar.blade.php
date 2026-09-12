<header class="navbar">
    <div class="container navbar__inner">
        <a href="{{ route('home') }}" class="logo">CampRent<span>.</span></a>

        <nav class="nav-links">
            <a href="{{ route('home') }}" class="nav-links__item is-active">Beranda</a>
            <a href="#katalog" class="nav-links__item">Katalog Alat</a>
            <a href="{{ route('cara-sewa') }}" class="nav-links__item">Cara Sewa</a>
            <a href="{{ route('syarat-ketentuan') }}" class="nav-links__item">Syarat &amp; Ketentuan</a>
        </nav>

        <div class="navbar__actions">
            <button class="icon-btn cart-btn" aria-label="Keranjang">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span class="cart-btn__badge">{{ $cartCount ?? 2 }}</span>
            </button>
            <a href="{{ route('login') }}" class="link-plain">Masuk</a>
            <a href="{{ route('register') }}" class="btn btn--primary">Daftar</a>
        </div>
    </div>
</header>
