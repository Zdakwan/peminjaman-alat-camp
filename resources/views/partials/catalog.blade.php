<section class="catalog" id="katalog">
    <div class="container">

        <div class="catalog__header">
            <div>
                <h2 class="section-title">Katalog Alat Camping</h2>
                <p class="section-subtitle">Temukan gear terbaik untuk perjalananmu selanjutnya.</p>
            </div>

            <div class="filter-pills">
                @foreach ($categories as $slug => $label)
                    <a href="{{ route('katalog.search', $slug === 'semua' ? [] : ['kategori' => $slug]) }}"
                       class="pill {{ ($activeCategory ?? 'semua') === $slug ? 'pill--active' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="product-grid">
            @forelse ($products as $product)
                <article class="product-card">
                    <div class="product-card__media product-card__media--{{ $product['media'] }}">
                        @if ($product['status'] === 'tersedia')
                            <span class="status status--available">
                                <span class="status__dot"></span>Tersedia
                            </span>
                        @else
                            <span class="status status--rented">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                Sedang Disewa
                            </span>
                        @endif
                    </div>

                    <div class="product-card__body">
                        <p class="product-card__category">{{ $product['category'] }}</p>
                        <h3 class="product-card__title">{{ $product['name'] }}</h3>
                        <p class="product-card__desc">{{ $product['description'] }}</p>

                        <div class="product-card__footer">
                            <div>
                                <p class="product-card__price-label">Harga Sewa</p>
                                <p class="product-card__price">
                                    Rp {{ number_format($product['price'], 0, ',', '.') }}<span>/hari</span>
                                </p>
                            </div>

                            @if ($product['status'] === 'tersedia')
                                <form action="{{ route('cart.add', $product['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="round-btn" aria-label="Tambah">+</button>
                                </form>
                            @else
                                <a href="{{ route('produk.show', $product['id']) }}" class="pill-btn">Info</a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <p class="section-subtitle">Belum ada alat yang tersedia untuk kategori ini.</p>
            @endforelse
        </div>

        <div class="catalog__more">
            <a href="{{ route('home') }}" class="btn btn--outline">
                Lihat Semua Katalog
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>

    </div>
</section>
