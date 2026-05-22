<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --yellow: #F5C518;
        --dark: #1C1C1E;
        --sidebar-bg: #222224;
        --bg: #F4F3EF;
        --card-bg: #FFFFFF;
        --text: #1C1C1E;
        --muted: #9B9B9B;
        --radius: 16px;
        --shadow: 0 2px 12px rgba(0, 0, 0, .07);
    }

    /* ── SIDEBAR ── */
    .sidebar {
        width: 235px;
        height: 100vh;
        position: sticky;
        top: 0;
        align-self: flex-start;
        background: var(--sidebar-bg);
        display: flex;
        flex-direction: column;
        padding: 24px 14px;
        flex-shrink: 0;
        overflow-y: auto;
    }

    .logo {
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 28px;
        padding-left: 4px;
    }

    .logo span.le {
        color: #FFFFFF;
    }

    .logo span.li {
        color: var(--yellow);
    }

    .logo span.lu {
        color: #FFFFFF;
    }

    .profile-card {
        background: linear-gradient(135deg, #3a3a3c, #2a2a2c);
        border: 1.5px solid #444;
        border-radius: 14px;
        padding: 14px 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #555;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #ccc;
        overflow: hidden;
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-info .name {
        color: #fff;
        font-weight: 700;
        font-size: 13px;
    }

    .profile-info .email {
        color: var(--muted);
        font-size: 10.5px;
        margin-top: 2px;
    }

    /* ── NAV MENU ── */
    .nav-section {
        margin-top: 28px;
        flex: 1;
    }

    .nav-group-label {
        font-size: 10px;
        font-weight: 700;
        color: #555;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 0 8px;
        margin-bottom: 6px;
        margin-top: 20px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 10px;
        cursor: pointer;
        color: #bbb;
        transition: background .18s, color .18s;
        margin-bottom: 2px;
        text-decoration: none;
    }

    .nav-item:hover {
        background: rgba(255, 255, 255, .06);
    }

    .nav-item.active {
        background: var(--yellow);
    }

    .nav-item .nav-icon,
    .btn-logout .nav-icon {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
        opacity: 0.85;
    }

    .nav-item .nav-text {
        font-size: 13px;
        font-weight: 600;
        color: #bbb;
        transition: color .18s;
    }

    .nav-item:hover .nav-text {
        color: #fff;
    }

    .nav-item.active .nav-text {
        color: #1C1C1E;
        font-weight: 700;
    }

    .nav-item.active .nav-icon {
        opacity: 1;
        filter: brightness(0);
    }

    .nav-badge {
        margin-left: auto;
        background: var(--yellow);
        color: #1C1C1E;
        font-size: 10px;
        font-weight: 800;
        padding: 2px 7px;
        border-radius: 20px;
        line-height: 1.5;
    }

    .nav-item.active .nav-badge {
        background: #1C1C1E;
        color: var(--yellow);
    }

    .sidebar-bottom {
        margin-top: auto;
        padding-top: 16px;
        border-top: 1px solid #333;
    }

    .btn-logout {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 10px 12px;
        border: none;
        border-radius: 10px;
        background: transparent;
        color: #bbb;
        font-size: 13px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        transition: background .18s, color .18s;
        text-decoration: none;
    }

    .btn-logout:hover {
        background: rgba(255, 255, 255, .06);
        color: #fff;
    }

    /* ── HAMBURGER ── */
    .sidebar-toggle {
        display: none;
        position: fixed;
        top: 12px;
        left: 12px;
        z-index: 1001;
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 10px;
        background: var(--yellow);
        color: #1C1C1E;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.4);
        z-index: 998;
    }

    @media (max-width: 768px) {
        .sidebar-toggle { display: flex; }

        .sidebar {
            position: fixed;
            left: -280px;
            top: 0;
            bottom: 0;
            z-index: 999;
            transition: left 0.3s ease;
            width: 250px;
            height: 100vh;
        }

        .sidebar.open { left: 0; }

        .sidebar-overlay.open { display: block; }
    }
</style>

<div class="sidebar-overlay" id="sidebarOverlay"></div>
<button class="sidebar-toggle" id="sidebarToggle" onclick="toggleSidebar()">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="6" x2="21" y2="6"/>
        <line x1="3" y1="12" x2="21" y2="12"/>
        <line x1="3" y1="18" x2="21" y2="18"/>
    </svg>
</button>


<!-- SIDEBAR -->
<aside class="sidebar">
    <a href="/" style="text-decoration: none;">
        <div class="logo"><span class="le">Le</span><span class="li">Li</span><span class="lu">Lu</span></div>
    </a>
    <div class="profile-card">
        <div class="avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div class="profile-info">
            <div class="name">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->whatsapp }}</div>
        </div>
    </div>

    <!-- MAIN MENU -->
    <nav class="nav-section">
        <div class="nav-group-label">Menu Utama</div>

       <!-- <a class="nav-item {{ Request::is('admin/worker') ? 'active' : '' }}" href="/admin/worker">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7" rx="1.5" />
                <rect x="14" y="3" width="7" height="7" rx="1.5" />
                <rect x="3" y="14" width="7" height="7" rx="1.5" />
                <rect x="14" y="14" width="7" height="7" rx="1.5" />
            </svg>
            <span class="nav-text">Dashboard</span>
        </a> -->

        <a class="nav-item {{ Request::is('admin/pesanan') ? 'active' : '' }}" href="/admin/pesanan">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span class="nav-text">Pesanan</span>
            <!-- <span class="nav-badge">15</span> -->
        </a>

         <a class="nav-item {{ Request::is('admin/user') ? 'active' : '' }}" href="/admin/user">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span class="nav-text">User</span>
            <!-- <span class="nav-badge">15</span> -->
        </a>

          <a class="nav-item {{ Request::is('admin/portofolio') ? 'active' : '' }}" href="/admin/portofolio">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span class="nav-text">Portofolio</span>
            <!-- <span class="nav-badge">15</span> -->
        </a>

          <a class="nav-item {{ Request::is('admin/testimoni') ? 'active' : '' }}" href="/admin/testimoni">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span class="nav-text">Testimoni</span>
            <!-- <span class="nav-badge">15</span> -->
        </a>

          <!-- <a class="nav-item {{ Request::is('admin/produk') ? 'active' : '' }}" href="/admin/produk">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span class="nav-text">Produk</span>
        </a> -->

        <!-- SISTEM -->
        <div class="nav-group-label">Sistem</div>

        <a class="nav-item {{ Request::is('admin/admin') ? 'active' : '' }}" href="/admin/admin">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3" />
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
            </svg>
            <span class="nav-text">Pengaturan</span>
        </a>

        <a class="nav-item {{ Request::is('admin/notifikasi') ? 'active' : '' }}" href="/admin/notifikasi">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8h1a4 4 0 0 1 0 8h-1" />
                <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z" />
                <line x1="6" y1="1" x2="6" y2="4" />
                <line x1="10" y1="1" x2="10" y2="4" />
                <line x1="14" y1="1" x2="14" y2="4" />
            </svg>
            <span class="nav-text">Notifikasi</span>
        </a>

    </nav>

    <!-- LOGOUT -->
    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit" class="btn-logout">
                <svg class="nav-icon w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                <span class="nav-text">Keluar</span>
            </button>
        </form>
    </div>

</aside>

<script>
    function toggleSidebar() {
        document.getElementById('sidebarOverlay').classList.toggle('open');
        document.querySelector('.sidebar').classList.toggle('open');
    }
    document.getElementById('sidebarOverlay').addEventListener('click', function() {
        this.classList.remove('open');
        document.querySelector('.sidebar').classList.remove('open');
    });
</script>