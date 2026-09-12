<footer class="footer">
    <div class="container footer__grid">

        <div class="footer__brand">
            <a href="{{ route('home') }}" class="logo">CampRent<span>.</span></a>
            <p class="footer__desc">
                Platform penyewaan perlengkapan outdoor terpercaya. Menghubungkan
                pecinta alam dengan peralatan berkualitas.
            </p>
            <div class="social-icons">
                <a href="#" class="social-icons__item" aria-label="Instagram">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </a>
                <a href="#" class="social-icons__item" aria-label="WhatsApp">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.32A7.85 7.85 0 0012.05 4a7.94 7.94 0 00-6.9 11.87L4 20l4.24-1.11a7.93 7.93 0 003.8.97h0a7.94 7.94 0 007.94-7.94 7.86 7.86 0 00-2.38-5.6zm-5.55 12.2h0a6.6 6.6 0 01-3.36-.92l-.24-.14-2.5.66.67-2.44-.16-.25a6.6 6.6 0 1112.28-3.5 6.62 6.62 0 01-6.69 6.6z"></path></svg>
                </a>
            </div>
        </div>

        <div class="footer__col">
            <h4 class="footer__heading">Eksplorasi</h4>
            <a href="#" class="footer__link">Katalog Tenda</a>
            <a href="#" class="footer__link">Carrier &amp; Tas</a>
            <a href="#" class="footer__link">Alat Masak</a>
            <a href="#" class="footer__link">Aksesoris</a>
        </div>

        <div class="footer__col">
            <h4 class="footer__heading">Bantuan</h4>
            <a href="#" class="footer__link">Cara Menyewa</a>
            <a href="#" class="footer__link">Metode Pembayaran</a>
            <a href="#" class="footer__link">Syarat &amp; Ketentuan</a>
            <a href="#" class="footer__link">FAQ</a>
        </div>

        <div class="footer__col">
            <h4 class="footer__heading">Hubungi Kami</h4>
            <p class="footer__contact">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Jl. Pendaki Gunung No. 12, Sidoarjo, Jawa Timur
            </p>
            <p class="footer__contact">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"></path></svg>
                0812-3456-7890
            </p>
        </div>

    </div>

    <div class="container footer__bottom">
        <p>&copy; {{ date('Y') }} CampRent.</p>
        <div class="payment-icons">
            <span class="payment-icons__item">VISA</span>
            <span class="payment-icons__item">MC</span>
        </div>
    </div>
</footer>
