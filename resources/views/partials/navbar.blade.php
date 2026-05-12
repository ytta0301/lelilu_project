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

    .lelu-nav__username {
        font-size: 0.875rem;
        font-weight: 600;
        color: #1a1a1a;
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

    .lelu-nav__mobile a:hover  { color: #1a1a1a; }
    .lelu-nav__mobile a:last-child { border-bottom: none; }

    .lelu-nav__mobile-auth {
        margin-top: 12px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .lelu-nav__mobile-auth .lelu-nav__username {
        font-size: 0.85rem;
        color: #888;
    }

    .lelu-nav__mobile-auth .lelu-nav__btn {
        text-align: center;
        width: 100%;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .lelu-nav__links,
        .lelu-nav__divider,
        .lelu-nav__username { display: none; }

        .lelu-nav__btn { display: none; }

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
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ url('/chatbot') }}">FAQ</a></li>
            </ul>
        </div>

        {{-- ===== KANAN ===== --}}
        <div class="lelu-nav__right">
            @auth
                <a href="{{ url('/profile') }}"
                    class="hidden md:block text-sm font-semibold text-gray-700 hover:text-[#E6C200] transition-colors">
                        {{ auth()->user()->name }}
                </a>
                <form action="{{ url('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="lelu-nav__btn">Log out</button>
                </form>
            @else
                <a href="{{ url('login') }}" class="lelu-nav__btn">Log in</a>
            @endauth

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
        <a href="{{ url('portofolio') }}">Portofolio</a>
        <a href="{{ url('testimoni') }}">Testimoni</a>
        <a href="{{ url('dashboard') }}">Dashboard</a>

        <div class="lelu-nav__mobile-auth">
            @auth
                <span class="lelu-nav__username">{{ auth()->user()->name }}</span>
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="lelu-nav__btn">Log out</button>
                </form>
            @else
                <a href="{{ url('login') }}" class="lelu-nav__btn">Log in</a>
            @endauth
        </div>
    </div>
</nav>

<div style="height: 50px; flex-shrink: 0;"></div>

{{-- @once memastikan script ini hanya di-render sekali --}}
{{-- meski @include dipanggil di beberapa tempat        --}}
@once
<script>
    function leluToggleMenu() {
        document.getElementById('leluMobileMenu').classList.toggle('is-open');
    }
</script>
@endonce
