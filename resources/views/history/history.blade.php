<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>LeLiLu – Riwayat Pesanan</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: 'Poppins', sans-serif;
  background: #f5f4f0;
  min-height: 100vh;
  color: #111;
  overflow-x: hidden;
}

/* ── NAVBAR ── */
.navbar {
  background: #fff;
  border-bottom: 1px solid #e5e3dc;
  height: 58px;
  display: flex; align-items: center;
  padding: 0 40px;
  gap: 0;
}
.nav-logo {
  font-weight: 800; font-size: 1.2rem;
  color: #111; letter-spacing: -.3px;
  padding-right: 24px;
  border-right: 1.5px solid #e0ddd5;
  margin-right: 36px;
}
.nav-links {
  display: flex; align-items: center; gap: 36px;
  list-style: none; flex: 1;
}
.nav-links a {
  font-size: .88rem; font-weight: 500; color: #111;
  text-decoration: none; transition: opacity .2s;
}
.nav-links a:hover { opacity: .55; }
.nav-back {
  font-size: .88rem; font-weight: 600; color: #111;
  cursor: pointer; margin-left: auto;
  transition: opacity .2s;
}
.nav-back:hover { opacity: .6; }

/* ── PAGE WRAPPER ── */
.page {
  max-width: 900px;
  margin: 0 auto;
  padding: 32px 24px 0;
}

/* ── FILTER TABS ── */
.filter-bar {
  background: #fff;
  border-radius: 50px;
  display: flex; align-items: center;
  padding: 5px;
  gap: 2px;
  margin-bottom: 16px;
  border: 1px solid #e5e3dc;
}
.filter-tab {
  flex: 1; text-align: center;
  padding: 10px 16px;
  border-radius: 50px;
  font-size: .85rem; font-weight: 500;
  color: #888;
  cursor: pointer;
  border: none; background: none;
  font-family: 'Poppins', sans-serif;
  transition: background .2s, color .2s;
  white-space: nowrap;
}
.filter-tab.active {
  background: #f5c800;
  color: #111; font-weight: 700;
}
.filter-tab:hover:not(.active) { color: #111; }

/* ── SEARCH ── */
.search-wrap {
  display: flex; align-items: center; gap: 10px;
  background: #fff;
  border: 1.5px solid #e5e3dc;
  border-radius: 10px;
  padding: 0 16px;
  margin-bottom: 0;
}
.search-wrap svg { color: #bbb; flex-shrink: 0; }
.search-wrap input {
  border: none; background: transparent;
  font-family: 'Poppins', sans-serif;
  font-size: .87rem; color: #999;
  padding: 13px 0; outline: none; width: 100%;
}

/* ── WAVE + CONTENT AREA ── */
.wave-area {
  position: relative;
  margin-top: -1px;
}
.wave-top {
  display: block; width: 100%;
  line-height: 0; margin-top: 24px;
}

.yellow-bg {
  background: #f5c800;
  padding: 0 0 40px;
}

/* ── CONTENT CARD (white rounded) ── */
.content-card {
  background: #fff;
  border-radius: 20px;
  margin: 0 auto;
  max-width: 860px;
  padding: 36px 36px 28px;
  position: relative;
}

/* ── SECTION HEADING ── */
.daftar-title {
  display: flex; align-items: center; gap: 16px;
  margin-bottom: 28px;
}
.daftar-title h1 {
  font-weight: 900; font-size: 1.9rem;
  color: #111;
  white-space: nowrap;
}
.daftar-title h1 span { color: #f5c800; }
.title-line {
  flex: 1; height: 3px;
  background: linear-gradient(90deg, #f5c800 80%, transparent 100%);
  border-radius: 2px;
  position: relative;
}
.title-dots {
  display: flex; gap: 4px;
  margin-left: -8px;
}
.title-dot {
  width: 7px; height: 7px;
  border-radius: 50%;
  background: #f5c800;
}
.title-dot:last-child { background: #ccc; }

/* ── ORDER CARD ── */
.order-card {
  border-radius: 14px;
  border: 1.5px solid #e5e3dc;
  overflow: hidden;
  margin-bottom: 20px;
  background: #fff;
}

/* Status header strip */
.order-status-bar {
  padding: 12px 20px;
  text-align: center;
  font-weight: 600; font-size: .9rem;
  letter-spacing: .01em;
}
.status-proses  { background: #d6e8f7; color: #4a90c4; }
.status-selesai { background: #d4f0d4; color: #3a9a5c; }
.status-pending { background: #fff3cd; color: #c08a00; }
.status-batal   { background: #fde0e0; color: #c04040; }
.status-kirim   { background: #e8d6f7; color: #7a4ac4; }

/* Order body */
.order-body {
  padding: 20px 20px 16px;
}
.order-top {
  display: flex; align-items: flex-start; gap: 16px;
  margin-bottom: 18px;
}
.order-icon {
  width: 68px; height: 68px;
  background: #fff8e0;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.order-icon svg { color: #c8a200; }
.order-meta h3 {
  font-weight: 800; font-size: 1.1rem;
  color: #111; margin-bottom: 4px;
}
.order-meta .order-date {
  font-size: .83rem; color: #aaa; font-weight: 400;
}

.order-footer {
  display: flex; align-items: center; justify-content: space-between;
  padding-top: 14px;
  border-top: 1px solid #f0eeea;
}
.order-total-label {
  font-size: .82rem; font-weight: 600; color: #111;
  margin-bottom: 3px;
}
.order-price {
  font-weight: 700; font-size: 1rem;
  color: #f5a800;
}

.btn-beli-lagi {
  border: 1.5px solid #f5c800;
  background: #fff;
  color: #111;
  border-radius: 8px;
  padding: 9px 22px;
  font-family: 'Poppins', sans-serif;
  font-weight: 700; font-size: .83rem;
  cursor: pointer;
  transition: background .18s, color .18s;
}
.btn-beli-lagi:hover { background: #f5c800; }

/* ── PAGINATION ── */
.pagination {
  display: flex; align-items: center; justify-content: space-between;
  padding: 16px 0 4px;
}
.page-btn {
  background: none; border: none;
  font-family: 'Poppins', sans-serif;
  font-weight: 700; font-size: 1.1rem;
  color: #555;
  cursor: pointer;
  padding: 8px 16px;
  border-radius: 8px;
  transition: background .18s, color .18s;
}
.page-btn:hover { background: #f5c800; color: #111; }
.page-number {
  font-weight: 800; font-size: 1rem;
  color: #111;
}

/* ── HIDDEN FILTER CONTENT ── */
.filter-content { display: none; }
.filter-content.show { display: block; }
.all-content { display: block; }

    /* RESPONSIVE */
    @media (max-width: 900px) {
      .page { padding: 24px 20px 0; }
      .filter-bar { overflow-x: auto; padding: 4px; }
      .filter-tab { padding: 8px 12px; font-size: .8rem; }
      .search-wrap { padding: 0 12px; }
      .search-wrap input { font-size: .82rem; padding: 11px 0; }
      .content-card { padding: 28px 28px 20px; border-radius: 16px; }
      .daftar-title { margin-bottom: 20px; gap: 12px; }
      .daftar-title h1 { font-size: 1.6rem; }
    }

    @media (max-width: 768px) {
      .navbar { padding: 0 20px; height: 52px; }
      .nav-logo { font-size: 1rem; padding-right: 16px; margin-right: 24px; }
      .nav-links { display: none; }
      .nav-back { font-size: .82rem; }
      .page { padding: 20px 16px 0; }
      .filter-bar { margin-bottom: 12px; }
      .filter-tab { padding: 8px 14px; font-size: .78rem; white-space: nowrap; }
      .search-wrap { border-radius: 8px; }
      .search-wrap input { font-size: .8rem; padding: 10px 0; }
      .search-wrap svg { width: 15px; height: 15px; }
      .yellow-bg { padding: 0 0 32px; }
      .content-card { padding: 20px 20px 16px; border-radius: 14px; }
      .daftar-title { flex-wrap: wrap; margin-bottom: 16px; gap: 10px; }
      .daftar-title h1 { font-size: 1.4rem; }
      .title-line { flex: 1; min-width: 100px; }
      .title-dots { display: none; }
      .order-card { margin-bottom: 16px; border-radius: 12px; }
      .order-status-bar { padding: 10px 16px; font-size: .82rem; }
      .order-body { padding: 16px; }
      .order-top { gap: 12px; margin-bottom: 14px; }
      .order-icon { width: 56px; height: 56px; border-radius: 10px; }
      .order-icon svg { width: 26px; height: 26px; }
      .order-meta h3 { font-size: 1rem; }
      .order-meta .order-date { font-size: .76rem; }
      .order-footer { flex-direction: column; align-items: flex-start; gap: 12px; }
      .order-total-label { font-size: .76rem; }
      .order-price { font-size: .9rem; }
      .btn-beli-lagi { width: 100%; text-align: center; padding: 10px 16px; font-size: .8rem; }
    }

    @media (max-width: 480px) {
      .navbar { padding: 0 16px; height: 48px; }
      .nav-logo { font-size: 0.95rem; padding-right: 12px; margin-right: 16px; }
      .nav-back { font-size: .78rem; }
      .page { padding: 16px 12px 0; }
      .filter-bar { margin-bottom: 10px; border-radius: 40px; }
      .filter-tab { padding: 6px 10px; font-size: .72rem; }
      .search-wrap { border-radius: 6px; padding: 0 10px; }
      .search-wrap input { font-size: .75rem; padding: 8px 0; }
      .wave-top { margin-top: 16px; }
      .yellow-bg { padding: 0 0 24px; }
      .content-card { padding: 16px 14px 14px; border-radius: 12px; }
      .daftar-title { margin-bottom: 12px; gap: 8px; }
      .daftar-title h1 { font-size: 1.2rem; }
      .order-status-bar { padding: 8px 12px; font-size: .76rem; }
      .order-body { padding: 12px; }
      .order-top { gap: 10px; margin-bottom: 10px; }
      .order-icon { width: 48px; height: 48px; border-radius: 8px; }
      .order-icon svg { width: 22px; height: 22px; }
      .order-meta h3 { font-size: 0.9rem; }
      .order-meta .order-date { font-size: .7rem; }
      .order-footer { gap: 10px; }
      .order-total-label { font-size: .7rem; }
      .order-price { font-size: .85rem; }
      .btn-beli-lagi { padding: 8px 14px; font-size: .75rem; }
      .pagination { padding: 12px 0 4px; }
      .page-btn { font-size: .9rem; padding: 6px 12px; }
      .page-number { font-size: .85rem; }
    }

    @media (max-width: 360px) {
      .navbar { padding: 0 12px; }
      .nav-logo { font-size: 0.9rem; margin-right: 12px; }
      .page-title { font-size: 1rem; }
      .filter-tab { padding: 5px 8px; font-size: .68rem; }
      .content-card { padding: 12px 10px 12px; }
      .order-card { margin-bottom: 12px; }
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
  <span class="nav-logo">LeLiLu</span>
  <ul class="nav-links">
    <li><a href="/dashboard">Dashboard</a></li>
    <li><a href="/portofolio">Portofolio</a></li>
    <li><a href="/testimoni">Testimoni</a></li>
    <li><a href="/chatbot">FAQ</a></li>
  </ul>
  <span class="nav-back" onclick="history.back()">Back</span>
</nav>

<!-- PAGE -->
<div class="page">

  <!-- Filter Tabs -->
  <div class="filter-bar">
    <a href="{{ route('history') }}" class="filter-tab {{ !request('status') ? 'active' : '' }}">Semua</a>
    <a href="{{ route('history', ['status' => 'pending']) }}" class="filter-tab {{ request('status') == 'pending' ? 'active' : '' }}">Pending</a>
    <a href="{{ route('history', ['status' => 'proses']) }}" class="filter-tab {{ request('status') == 'proses' ? 'active' : '' }}">Proses</a>
    <a href="{{ route('history', ['status' => 'selesai']) }}" class="filter-tab {{ request('status') == 'selesai' ? 'active' : '' }}">Selesai</a>
    <a href="{{ route('history', ['status' => 'dibatalkan']) }}" class="filter-tab {{ request('status') == 'dibatalkan' ? 'active' : '' }}">Dibatalkan</a>
  </div>

  <!-- Search -->
  <div class="search-wrap">
    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
      <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
    </svg>
    <input type="text" placeholder="Cari apa?...."/>
  </div>
</div>

<!-- WAVE + YELLOW BG -->
<div style="max-width:900px;margin:0 auto;">
  <svg viewBox="0 0 900 60" xmlns="http://www.w3.org/2000/svg" style="display:block;width:100%;line-height:0;margin-top:20px;">
    <path d="M0,60 L0,30 Q112,0 225,30 Q337,60 450,30 Q562,0 675,30 Q787,60 900,30 L900,60 Z" fill="#f5c800"/>
  </svg>
</div>

<div class="yellow-bg">
  <div style="max-width:900px;margin:0 auto;padding:0 24px;">
    <div class="content-card">
      <div class="daftar-title">
        <h1>Daftar <span>Pesanan</span></h1>
        <div class="title-line"></div>
        <div class="title-dots">
          <div class="title-dot"></div>
          <div class="title-dot"></div>
        </div>
      </div>
      @auth
        @forelse ($pemesanans as $pesan)
          @php
            $statusClass = match($pesan->status) {
              'proses'     => 'status-proses',
              'selesai'    => 'status-selesai',
              'pending'    => 'status-pending',
              'dibatalkan' => 'status-batal',
              default      => 'status-pending',
            };
            $statusLabel = match($pesan->status) {
              'proses'     => 'Proses',
              'selesai'    => 'Selesai',
              'pending'    => 'Pending',
              'dibatalkan' => 'Dibatalkan',
              default      => ucfirst($pesan->status),
            };
          @endphp
          <div class="order-card">
            <div class="order-status-bar {{ $statusClass }}">{{ $statusLabel }}</div>
            <div class="order-body">
              <div class="order-top">
                <div class="order-icon">
                  <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                  </svg>
                </div>
                <div class="order-meta">
                  <h3>{{ $pesan->jenis }}</h3>
                  <span class="order-date">
                    {{ \Carbon\Carbon::parse($pesan->created_at)->translatedFormat('d F Y') }}
                  </span>
                </div>
              </div>
              <div class="order-footer">
                <div>
                  <div class="order-total-label">Total Pembelian</div>
                  <div class="order-price">Rp {{ number_format($pesan->harga, 0, ',', '.') }}</div>
                </div>
                <a href="/detail" class="btn-bel"></a>
                <a href="/order" class="btn-beli-lagi">Pesan Lagi</a>
              </div>
            </div>
          </div>
        @empty
          <div style="text-align:center; padding: 40px 0; color: #aaa;">
            <p style="font-size:1rem; font-weight:600;">Belum ada pesanan</p>
            <p style="font-size:.85rem; margin-top:8px;">Pesanan kamu akan muncul di sini</p>
          </div>
        @endforelse

      @else
        {{-- Tidak login --}}
        <div style="text-align:center; padding: 60px 0;">
          <p style="font-size:1rem; font-weight:600; color:#111; margin-bottom:8px;">
            Kamu belum login
          </p>
          <p style="font-size:.85rem; color:#aaa; margin-bottom:24px;">
            Login untuk melihat riwayat pesananmu
          </p>
          <a href="/login" style="background:#f5c800; padding:10px 28px; border-radius:10px; font-weight:700; font-size:.9rem; color:#111; text-decoration:none;">
            Login Sekarang
          </a>
        </div>
      @endauth
    </div>
  </div>
</div>

<script>
let currentPage = 1;
let activeFilter = 'semua';

function filterTab(btn, filter) {
  // Update tabs
  document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  activeFilter = filter;

  // Show/hide content
  document.getElementById('semua').style.display = filter === 'semua' ? 'block' : 'none';
  document.querySelectorAll('.filter-content').forEach(el => el.classList.remove('show'));
  if (filter !== 'semua') {
    const el = document.getElementById(filter);
    if (el) el.classList.add('show');
  }

  currentPage = 1;
  document.getElementById('pageNum').textContent = currentPage;
}

function changePage(dir) {
  currentPage = Math.max(1, currentPage + dir);
  document.getElementById('pageNum').textContent = currentPage;
}
</script>
</body>
</html>