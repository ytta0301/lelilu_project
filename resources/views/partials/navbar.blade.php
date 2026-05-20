{{-- =============================================================== --}}
{{-- FILE : resources/views/partials/navbar.blade.php              --}}
{{-- CARA PAKAI : @include('partials.navbar')                      --}}
{{-- CATATAN : CSS sudah di-scope dengan prefix .lelu-nav          --}}
{{--           agar tidak bentrok dengan CSS halaman lain          --}}
{{-- =============================================================== --}}

<style>
    /* ===== RESET SCOPE ===== */
    .lelu-nav *, .lelu-nav *::before, .lelu-nav *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* ===== NAVBAR WRAPPER ===== */
    .lelu-nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 72px;
        background-color: #ffffff;
        border-bottom: 1px solid #f0f0f0;
        box-shadow: 0 1px 6px rgba(0,0,0,0.06);
        display: flex;
        align-items: center;
        z-index: 999;
        font-family: 'Poppins', sans-serif;
    }

    /* ===== INNER CONTAINER ===== */
    .lelu-nav__inner {
        max-width: 1280px;
        width: 100%;
        margin: 0 auto;
        padding: 0 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* ===== KIRI: Logo + Links ===== */
    .lelu-nav__left {
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .lelu-nav__logo {
        font-size: 1.3rem;
        font-weight: 800;
        color: #1a1a1a;
        text-decoration: none;
    }

    .lelu-nav__divider {
        width: 1px;
        height: 28px;
        background-color: #e0e0e0;
    }

    .lelu-nav__links {
        display: flex;
        align-items: center;
        gap: 32px;
        list-style: none;
    }

    .lelu-nav__links a {
        font-size: 0.9rem;
        font-weight: 500;
        color: #555555;
        text-decoration: none;
        transition: color 0.2s;
    }

    .lelu-nav__links a:hover {
        color: #1a1a1a;
    }

    /* ===== KANAN: Auth ===== */
    .lelu-nav__right {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .lelu-nav__btn {
        background-color: #FFD700;
        color: #1a1a1a;
        font-family: 'Poppins', sans-serif;
        font-size: 0.875rem;
        font-weight: 700;
        padding: 10px 26px;
        border: none;
        border-radius: 999px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.2s, transform 0.1s;
    }

    .lelu-nav__btn:hover  { background-color: #e6c200; }
    .lelu-nav__btn:active { transform: scale(0.97); }

    /* ===== PROFILE DROPDOWN ===== */
    .lelu-nav__profile {
        position: relative;
    }

    .lelu-nav__profile-trigger {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 999px;
        border: none;
        background: none;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.2s;
    }

    .lelu-nav__profile-trigger:hover {
        background-color: #f5f5f5;
    }

    /* Avatar: lingkaran kuning berisi inisial nama */
    .lelu-nav__profile-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #FFD700;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 700;
        color: #1a1a1a;
        flex-shrink: 0;
    }

    .lelu-nav__profile-name {
        font-size: 0.875rem;
        font-weight: 600;
        color: #1a1a1a;
        max-width: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .lelu-nav__profile-chevron {
        color: #888;
        transition: transform 0.2s;
        flex-shrink: 0;
    }

    /* Putar chevron saat dropdown terbuka */
    .lelu-nav__profile-trigger[aria-expanded="true"] .lelu-nav__profile-chevron {
        transform: rotate(180deg);
    }

    /* ===== DROPDOWN MENU ===== */
    .lelu-nav__dropdown {
        display: none;
        position: absolute;
        top: calc(100% + 10px);
        right: 0;
        min-width: 210px;
        background-color: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.10);
        overflow: hidden;
        z-index: 1000;
        animation: leluDropIn 0.15s ease-out;
    }

    .lelu-nav__dropdown.is-open {
        display: block;
    }

    @keyframes leluDropIn {
        from { opacity: 0; transform: translateY(-6px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Header dropdown: nama + email */
    .lelu-nav__dropdown-header {
        padding: 14px 16px;
        border-bottom: 1px solid #f0f0f0;
        background-color: #fafafa;
    }

    .lelu-nav__dropdown-header-name {
        font-size: 0.875rem;
        font-weight: 700;
        color: #1a1a1a;
        display: block;
    }

    .lelu-nav__dropdown-header-email {
        font-size: 0.75rem;
        color: #888;
        display: block;
        margin-top: 2px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Item dropdown */
    .lelu-nav__dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 11px 16px;
        font-size: 0.875rem;
        font-weight: 500;
        color: #444;
        text-decoration: none;
        transition: background-color 0.15s, color 0.15s;
        cursor: pointer;
        width: 100%;
        border: none;
        background: none;
        font-family: 'Poppins', sans-serif;
        text-align: left;
    }

    .lelu-nav__dropdown-item:hover {
        background-color: #fffbea;
        color: #1a1a1a;
    }

    .lelu-nav__dropdown-item svg {
        flex-shrink: 0;
        color: #aaa;
    }

    .lelu-nav__dropdown-item:hover svg {
        color: #FFD700;
    }

    /* Garis pemisah */
    .lelu-nav__dropdown-sep {
        height: 1px;
        background-color: #f0f0f0;
        margin: 4px 0;
    }

    /* Item logout (merah saat hover) */
    .lelu-nav__dropdown-item--danger:hover {
        background-color: #fff5f5;
        color: #dc3545;
    }

    .lelu-nav__dropdown-item--danger:hover svg {
        color: #dc3545;
    }

    /* ===== HAMBURGER ===== */
    .lelu-nav__hamburger {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 6px;
        color: #555;
    }

    /* ===== MOBILE MENU ===== */
    .lelu-nav__mobile {
        display: none;
        flex-direction: column;
        gap: 4px;
        position: absolute;
        top: 72px;
        left: 0;
        width: 100%;
        background-color: #ffffff;
        border-bottom: 1px solid #f0f0f0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        padding: 12px 24px 20px;
        z-index: 998;
    }

    .lelu-nav__mobile.is-open {
        display: flex;
    }

    .lelu-nav__mobile a {
        font-size: 0.9rem;
        font-weight: 500;
        color: #555555;
        text-decoration: none;
        padding: 10px 0;
        border-bottom: 1px solid #f5f5f5;
        transition: color 0.2s;
    }

    .lelu-nav__mobile a:hover { color: #1a1a1a; }

    .lelu-nav__mobile-auth {
        margin-top: 12px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .lelu-nav__mobile-auth .lelu-nav__username {
        font-size: 0.85rem;
        font-weight: 600;
        color: #888;
        padding: 8px 0 4px;
    }

    .lelu-nav__mobile-auth a:not(.lelu-nav__btn) {
        font-size: 0.875rem;
        font-weight: 500;
        color: #555;
        padding: 9px 0;
        border-bottom: 1px solid #f5f5f5;
        display: block;
        text-decoration: none;
    }

    .lelu-nav__mobile-auth a:not(.lelu-nav__btn):hover {
        color: #1a1a1a;
    }

    .lelu-nav__mobile-auth .lelu-nav__btn {
        text-align: center;
        width: 100%;
        margin-top: 8px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .lelu-nav__links,
        .lelu-nav__divider  { display: none; }

        .lelu-nav__profile  { display: none; }
        .lelu-nav__btn      { display: none; }

        .lelu-nav__hamburger { display: block; }

        .lelu-nav__inner { padding: 0 20px; }
    }
</style>

<nav class="lelu-nav">
    <div class="lelu-nav__inner">

        {{-- ===== KIRI ===== --}}
        <div class="lelu-nav__left">
            <a href="{{ url('/') }}" class="lelu-nav__logo">LeLiLu</a>

            <div class="lelu-nav__divider"></div>

            <ul class="lelu-nav__links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/portofolio') }}">Portofolio</a></li>
                <li><a href="{{ url('/testimoni') }}">Testimoni</a></li>
                <li><a href="{{ url('/chatbot') }}">FAQ</a></li>
                <li><a href="{{ url('/produk') }}">Produk</a></li>
            </ul>
        </div>

        {{-- ===== KANAN ===== --}}
        <div class="lelu-nav__right">
            @auth
                {{-- ── PROFILE DROPDOWN (desktop) ── --}}
                <div class="lelu-nav__profile">

                    <button class="lelu-nav__profile-trigger"
                            onclick="leluToggleDropdown()"
                            aria-haspopup="true"
                            aria-expanded="false"
                            id="leluProfileTrigger">
                        {{-- Inisial nama sebagai avatar --}}
                        <div class="lelu-nav__profile-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="lelu-nav__profile-name">{{ auth()->user()->name }}</span>
                        <svg class="lelu-nav__profile-chevron" width="14" height="14" fill="none"
                             stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
                        </svg>
                    </button>

                    <div class="lelu-nav__dropdown" id="leluDropdown">

                        {{-- Header: nama + email --}}
                        <div class="lelu-nav__dropdown-header">
                            <span class="lelu-nav__dropdown-header-name">{{ auth()->user()->name }}</span>
                            <span class="lelu-nav__dropdown-header-email">{{ auth()->user()->email }}</span>
                        </div>

                        {{-- ══════════════════════════════════════════════════ --}}
                        {{-- TAMBAH / KURANGI ITEM MENU DI SINI                --}}
                        {{-- ══════════════════════════════════════════════════ --}}

                        <a href="{{ url('/profile') }}" class="lelu-nav__dropdown-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                            Profil Saya
                        </a>

                        <a href="{{ url('/dashboard') }}" class="lelu-nav__dropdown-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            Dashboard
                        </a>

                        <a href="{{ url('/history') }}" class="lelu-nav__dropdown-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Riwayat Pesanan
                        </a>
                        {{-- ══ ADMIN PANEL (hanya tampil jika user adalah admin) ══ --}}

                        @if(auth()->user()->role === 'admin')
                            <a href="{{ url('/admin/pesanan') }}" class="lelu-nav__dropdown-item">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Admin Panel
                            </a>
                            <div class="lelu-nav__dropdown-sep"></div>
                        @endif
                        
                        {{-- ══ GARIS PEMISAH + LOGOUT ══ --}}
                        <div class="lelu-nav__dropdown-sep"></div>

                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="lelu-nav__dropdown-item lelu-nav__dropdown-item--danger">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/></svg>
                                Log out
                            </button>
                        </form>

                    </div>
                </div>

                {{-- <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="lelu-nav__btn">Log out</button>
                </form> --}}

            @else
                <a href="{{ url('/login') }}" class="lelu-nav__btn">Log in</a>
            @endauth

            {{-- Hamburger (mobile) --}}
            <button class="lelu-nav__hamburger" onclick="leluToggleMenu()" aria-label="Menu">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="3" y1="6"  x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- ===== MOBILE MENU ===== --}}
    <div class="lelu-nav__mobile" id="leluMobileMenu">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/portofolio') }}">Portofolio</a>
        <a href="{{ url('/testimoni') }}">Testimoni</a>

        <div class="lelu-nav__mobile-auth">
            @auth
                <span class="lelu-nav__username">{{ auth()->user()->name }}</span>
                <a href="{{ url('/profile') }}">Profil Saya</a>
                <a href="{{ url('/history') }}">Riwayat Pesanan</a>
                <a href="{{ url('/chatbot') }}">Hubungi Admin</a>
                <form action="{{ url('/logout') }}" method="POST" style="margin-top:4px">
                    @csrf
                    <button type="submit" class="lelu-nav__btn">Log out</button>
                </form>
            @else
                <a href="{{ url('/login') }}" class="lelu-nav__btn">Log in</a>
            @endauth
        </div>
    </div>
</nav>

{{-- Spacer agar konten halaman tidak tertutup navbar --}}
<div style="height: 72px; flex-shrink: 0;"></div>

@once
<script>
    /* ── Toggle dropdown profil ── */
    function leluToggleDropdown() {
        const dropdown = document.getElementById('leluDropdown');
        const trigger  = document.getElementById('leluProfileTrigger');
        const isOpen   = dropdown.classList.toggle('is-open');
        trigger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    }

    /* ── Tutup dropdown jika klik di luar area ── */
    document.addEventListener('click', function (e) {
        const profile  = document.querySelector('.lelu-nav__profile');
        const dropdown = document.getElementById('leluDropdown');
        const trigger  = document.getElementById('leluProfileTrigger');
        if (profile && !profile.contains(e.target)) {
            dropdown && dropdown.classList.remove('is-open');
            trigger  && trigger.setAttribute('aria-expanded', 'false');
        }
    });

    /* ── Toggle mobile menu ── */
    function leluToggleMenu() {
        document.getElementById('leluMobileMenu').classList.toggle('is-open');
    }
</script>
@endonce