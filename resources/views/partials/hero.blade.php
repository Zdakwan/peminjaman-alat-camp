<section class="hero">
    <div class="hero__bg"></div>
    <div class="hero__overlay"></div>

    <div class="container hero__inner">
        <div class="hero__content">
            <span class="badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2L3 14h7l-1 8 11-14h-7l1-6z"/></svg>
                Booking Instan &amp; Mudah
            </span>

            <h1 class="hero__title">
                Eksplorasi Alam<br>
                <span class="hero__title--accent">Tanpa Ribet.</span>
            </h1>

            <p class="hero__desc">
                Sewa perlengkapan camping berkualitas premium layaknya meminjam buku di
                perpustakaan. Cek ketersediaan real-time, booking tanggal, dan ambil
                barangmu.
            </p>

            <form class="search-bar" action="{{ route('katalog.search') }}" method="GET">
                <label class="search-bar__field search-bar__field--grow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" name="q" placeholder="Cari tenda, carrier, matras..." value="{{ request('q') }}">
                </label>

                <label class="search-bar__field">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <input type="text" name="tanggal" placeholder="Tgl Sewa (Mis: 12-14 Okt)" value="{{ request('tanggal') }}">
                </label>

                <button type="submit" class="btn btn--primary btn--search">
                    Cari
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </form>
        </div>
    </div>

    <div class="floating-card">
        <span class="floating-card__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
        </span>
        <div>
            <p class="floating-card__title">Kualitas Terjamin</p>
            <p class="floating-card__desc">Alat dirawat &amp; dicuci rutin</p>
        </div>
    </div>
</section>
