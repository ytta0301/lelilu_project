<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>LeLiLu – Admin Dashboard</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html, body { height: 100%; }
body {
  font-family: 'Poppins', sans-serif;
  background: #f0efeb;
  display: flex;
  min-height: 100vh;
  color: #111;
}

/* ── SIDEBAR ── */
.sidebar {
  width: 240px;
  min-height: 100vh;
  background: #2a2a2a;
  display: flex;
  flex-direction: column;
  padding: 28px 0 32px;
  position: fixed;
  top: 0; left: 0; bottom: 0;
  z-index: 100;
}
.sidebar-logo {
  font-weight: 900;
  font-size: 1.7rem;
  letter-spacing: -1px;
  padding: 0 28px;
  margin-bottom: 28px;
  color: var(--white);
}
.sidebar-logo span:nth-child(1) { color: #ffffff; }
.sidebar-logo span:nth-child(2) { color: #f5c800; }
.sidebar-logo span:nth-child(3) { color: #ffffff; }
.sidebar-logo span:nth-child(4) { color: #f5c800; }
.sidebar-logo span:nth-child(5) { color: #ffffff; }
.sidebar-logo span:nth-child(6) { color: #f5c800; }

/* Admin profile card */
.admin-card {
  margin: 0 16px 32px;
  border: 1.5px solid #f5c800;
  border-radius: 12px;
  padding: 14px 16px;
  display: flex;
  align-items: center;
  gap: 12px;
}
.admin-avatar {
  width: 44px; height: 44px;
  border-radius: 50%;
  background: #555;
  flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem;
  color: #ccc;
}
.admin-info {}
.admin-name {
  font-weight: 700;
  font-size: 0.88rem;
  color: #ffffff;
  line-height: 1.3;
}
.admin-email {
  font-size: 0.72rem;
  color: #aaa;
  font-weight: 400;
}

/* Nav sections */
.nav-section-label {
  font-size: 0.68rem;
  font-weight: 600;
  color: #888;
  letter-spacing: .1em;
  text-transform: uppercase;
  padding: 0 28px;
  margin-bottom: 6px;
}
.nav-item {
  display: block;
  font-weight: 600;
  font-size: 0.92rem;
  color: #ccc;
  padding: 11px 28px;
  cursor: pointer;
  border-radius: 0;
  transition: color .18s, background .18s;
  text-decoration: none;
  position: relative;
}
.nav-item:hover { color: #fff; background: rgba(255,255,255,.06); }
.nav-item.active {
  color: #ffffff;
  background: rgba(245,200,0,.08);
}
.nav-item.active::before {
  content: '';
  position: absolute;
  left: 0; top: 0; bottom: 0;
  width: 3px;
  background: #f5c800;
  border-radius: 0 2px 2px 0;
}

.nav-group { margin-bottom: 28px; }

.sidebar-spacer { flex: 1; }

/* Logout */
.nav-item.logout { color: #e05555; }
.nav-item.logout:hover { background: rgba(224,85,85,.08); color: #ff6b6b; }

/* ── MAIN ── */
.main {
  margin-left: 240px;
  flex: 1;
  padding: 32px 36px 48px;
  min-height: 100vh;
}

/* Search bar */
.topbar {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 32px;
}
.search-box {
  flex: 1;
  display: flex;
  align-items: center;
  gap: 12px;
  background: #fff;
  border: 1.5px solid #e5e3dc;
  border-radius: 12px;
  padding: 0 18px;
}
.search-box svg { color: #bbb; flex-shrink: 0; }
.search-box input {
  border: none; background: transparent;
  font-family: 'Poppins', sans-serif;
  font-size: 0.88rem;
  color: #999;
  padding: 14px 0;
  outline: none;
  width: 100%;
}
.settings-btn {
  width: 50px; height: 50px;
  background: #fff;
  border: 1.5px solid #e5e3dc;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer;
  color: #888;
  transition: background .18s, color .18s;
}
.settings-btn:hover { background: #f5c800; color: #111; border-color: #f5c800; }

/* ── STAT CARDS ── */
.stats-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 18px;
  margin-bottom: 28px;
}
.stat-card {
  background: #fff;
  border-radius: 16px;
  padding: 22px 22px 18px;
  position: relative;
  box-shadow: 0 1px 4px rgba(0,0,0,.05);
  transition: transform .2s, box-shadow .2s;
}
.stat-card:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,.08); }
.stat-top {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 10px;
}
.stat-number {
  font-weight: 800;
  font-size: 1.9rem;
  line-height: 1;
  color: #111;
  letter-spacing: -1px;
}
.stat-icon {
  width: 44px; height: 44px;
  background: #f5c800;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem;
}
.stat-label {
  font-size: 0.82rem;
  color: #777;
  font-weight: 400;
  margin-bottom: 6px;
}
.stat-growth {
  font-size: 0.74rem;
  color: #f5a800;
  font-weight: 500;
}

/* ── TABLE SECTION ── */
.table-section {
  background: #fff;
  border-radius: 16px;
  padding: 28px 28px 8px;
  box-shadow: 0 1px 4px rgba(0,0,0,.05);
}
.table-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 24px;
}
.table-title {
  font-weight: 800;
  font-size: 1.15rem;
  color: #111;
}
.btn-lihat-semua {
  background: #f5c800;
  color: #111;
  border: none;
  border-radius: 10px;
  padding: 11px 24px;
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  font-size: 0.88rem;
  cursor: pointer;
  transition: background .18s, transform .15s;
}
.btn-lihat-semua:hover { background: #e8b800; transform: translateY(-1px); }

/* Table */
table {
  width: 100%;
  border-collapse: collapse;
}
thead tr {
  border-bottom: 1.5px solid #eee;
}
thead th {
  text-align: left;
  font-weight: 500;
  font-size: 0.82rem;
  color: #aaa;
  padding: 10px 12px 12px;
}
thead th:first-child { padding-left: 0; width: 80px; }
thead th.center { text-align: center; }

tbody tr {
  border-bottom: 1px solid #f0f0ec;
  transition: background .15s;
}
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: #fafaf7; }

tbody td {
  padding: 18px 12px;
  font-size: 0.87rem;
  color: #333;
  vertical-align: middle;
}
tbody td:first-child { padding-left: 0; }

/* ID cell */
.td-id {
  font-size: 0.78rem;
  color: #bbb;
  font-weight: 500;
}

/* Customer cell */
.td-customer {
  display: flex;
  align-items: center;
  gap: 12px;
}
.avatar-sm {
  width: 36px; height: 36px;
  border-radius: 50%;
  background: #ddd;
  flex-shrink: 0;
}
.customer-name { font-weight: 500; font-size: 0.87rem; }

/* Status badge */
.badge {
  display: inline-block;
  padding: 5px 16px;
  border-radius: 20px;
  font-size: 0.78rem;
  font-weight: 600;
  text-align: center;
}
.badge-proses  { background: #cce8ff; color: #1a7ac0; }
.badge-selesai { background: #d4f5d4; color: #1a8040; }
.badge-batal   { background: #ffd4d4; color: #c01a1a; }

.td-center { text-align: center; }
.td-saldo { font-weight: 600; color: #111; }
.td-date { color: #777; }
.td-layanan { color: #555; }

/* ── RESPONSIVE ── */
@media (max-width: 1200px) {
  .main { padding: 28px 28px 40px; }
  .stats-row { gap: 14px; }
  .stat-card { padding: 18px 18px 14px; }
  .stat-number { font-size: 1.6rem; }
  .stat-icon { width: 40px; height: 40px; font-size: 1.1rem; }
}

@media (max-width: 1100px) {
  .stats-row { grid-template-columns: 1fr 1fr; }
  .table-section { padding: 20px 20px 6px; }
}

@media (max-width: 900px) {
  .sidebar { width: 200px; }
  .main { margin-left: 200px; padding: 20px 20px 32px; }
  .sidebar-logo { font-size: 1.5rem; padding: 0 20px; }
  .admin-card { margin: 0 12px 24px; padding: 12px 14px; }
  .admin-avatar { width: 38px; height: 38px; font-size: 1rem; }
  .nav-item { padding: 9px 20px; font-size: 0.88rem; }
  .topbar { margin-bottom: 24px; }
  .stats-row { gap: 12px; margin-bottom: 20px; }
  .stat-card { padding: 16px 16px 12px; }
  .stat-number { font-size: 1.5rem; }
  .table-header { margin-bottom: 16px; }
  .table-title { font-size: 1.05rem; }
}

@media (max-width: 768px) {
  .sidebar { width: 180px; padding: 20px 0 24px; }
  .main { margin-left: 180px; padding: 16px 16px 28px; }
  .sidebar-logo { font-size: 1.4rem; padding: 0 16px; margin-bottom: 20px; }
  .sidebar-logo span { font-size: inherit; }
  .admin-card { margin: 0 10px 18px; padding: 10px 12px; gap: 10px; }
  .admin-avatar { width: 34px; height: 34px; font-size: 0.9rem; }
  .admin-name { font-size: 0.82rem; }
  .admin-email { font-size: 0.68rem; }
  .nav-section-label { font-size: 0.62rem; padding: 0 16px; margin-bottom: 4px; }
  .nav-group { margin-bottom: 20px; }
  .nav-item { padding: 8px 16px; font-size: 0.85rem; }
  .topbar { gap: 10px; margin-bottom: 20px; }
  .search-box { border-radius: 10px; }
  .search-box input { font-size: 0.82rem; padding: 12px 0; }
  .settings-btn { width: 44px; height: 44px; border-radius: 10px; }
  .stats-row { grid-template-columns: repeat(2, 1fr); gap: 10px; margin-bottom: 16px; }
  .stat-card { padding: 14px 14px 10px; border-radius: 14px; }
  .stat-number { font-size: 1.4rem; }
  .stat-icon { width: 36px; height: 36px; font-size: 1rem; }
  .stat-label { font-size: 0.76rem; }
  .stat-growth { font-size: 0.68rem; }
  .table-section { padding: 16px 16px 6px; border-radius: 14px; }
  .table-header { margin-bottom: 14px; flex-wrap: wrap; gap: 10px; }
  .table-title { font-size: 1rem; }
  .btn-lihat-semua { padding: 9px 18px; font-size: 0.82rem; border-radius: 8px; }
  thead th { font-size: 0.76rem; padding: 8px 10px; }
  tbody td { padding: 14px 10px; font-size: 0.82rem; }
  .td-customer { gap: 10px; }
  .avatar-sm { width: 32px; height: 32px; }
  .customer-name { font-size: 0.82rem; }
  .badge { padding: 4px 12px; font-size: 0.72rem; }
}

@media (max-width: 640px) {
  .sidebar { display: none; }
  .main { margin-left: 0; }
  .topbar { flex-wrap: wrap; }
  .search-box { flex: 1 1 100%; }
  .settings-btn { flex-shrink: 0; }
  .stats-row { grid-template-columns: 1fr 1fr; gap: 10px; }
  .stat-card { padding: 12px 12px 10px; }
  .stat-number { font-size: 1.3rem; }
  .stat-icon { width: 32px; height: 32px; }
  table { display: block; overflow-x: auto; }
  .table-section { overflow-x: hidden; }
}

@media (max-width: 480px) {
  body { font-size: 14px; }
  .main { padding: 12px 12px 24px; }
  .topbar { margin-bottom: 16px; gap: 8px; }
  .search-box { padding: 0 12px; }
  .search-box input { font-size: 0.8rem; padding: 10px 0; }
  .search-box svg { width: 16px; height: 16px; }
  .settings-btn { width: 40px; height: 40px; }
  .settings-btn svg { width: 18px; height: 18px; }
  .stats-row { gap: 8px; margin-bottom: 14px; }
  .stat-card { padding: 10px 10px 8px; border-radius: 12px; }
  .stat-number { font-size: 1.2rem; }
  .stat-icon { width: 28px; height: 28px; font-size: 0.9rem; }
  .stat-label { font-size: 0.7rem; margin-bottom: 4px; }
  .stat-growth { font-size: 0.62rem; }
  .table-section { padding: 12px 12px 4px; border-radius: 12px; }
  .table-header { margin-bottom: 10px; }
  .table-title { font-size: 0.95rem; }
  .btn-lihat-semua { padding: 8px 14px; font-size: 0.78rem; border-radius: 6px; }
  thead th { font-size: 0.7rem; padding: 6px 8px; }
  tbody td { padding: 10px 8px; font-size: 0.76rem; }
  .td-id { font-size: 0.7rem; }
  .td-customer { gap: 8px; }
  .avatar-sm { width: 28px; height: 28px; }
  .customer-name { font-size: 0.78rem; }
  .badge { padding: 3px 10px; font-size: 0.68rem; border-radius: 16px; }
  .td-saldo { font-size: 0.78rem; }
  .td-date { font-size: 0.72rem; }
  .td-layanan { font-size: 0.76rem; }
}

@media (max-width: 360px) {
  .search-box { flex: 1 1 100%; }
  .stats-row { grid-template-columns: 1fr; }
  .stat-card { flex-direction: row; align-items: center; justify-content: space-between; }
  .stat-top { margin-bottom: 0; }
}
</style>
</head>
<body>

<!-- ══════════════════════════════════
     SIDEBAR
══════════════════════════════════ -->
<aside class="sidebar">
  <!-- Logo -->
  <div class="sidebar-logo">
    <span>L</span><span>e</span><span>L</span><span>i</span><span>L</span><span>u</span>
  </div>

  <!-- Admin Card -->
  <div class="admin-card">
    <div class="admin-avatar">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
        <circle cx="12" cy="8" r="4"/>
        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
      </svg>
    </div>
    <div class="admin-info">
      <div class="admin-name">Admin LeLiLu</div>
      <div class="admin-email">admin@gmail.com</div>
    </div>
  </div>

  <!-- Menu Utama -->
  <div class="nav-group">
    <div class="nav-section-label">Menu Utama</div>
    <a class="nav-item active" href="#">Dasboard</a>
    <a class="nav-item" href="#">Pesanan</a>
    <a class="nav-item" href="#">Pengguna</a>
    <a class="nav-item" href="#">Portofolio</a>
  </div>

  <!-- Sistem -->
  <div class="nav-group">
    <div class="nav-section-label">Sistem</div>
    <a class="nav-item" href="#">Pengaturan</a>
    <a class="nav-item logout" href="#" onclick="return confirm('Yakin ingin logout?')">Log out</a>
  </div>
</aside>

<!-- ══════════════════════════════════
     MAIN CONTENT
══════════════════════════════════ -->
<main class="main">

  <!-- Topbar -->
  <div class="topbar">
    <div class="search-box">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>
      <input type="text" placeholder="Cari apa?...."/>
    </div>
    <button class="settings-btn" title="Pengaturan">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="3"/>
        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
      </svg>
    </button>
  </div>

  <!-- Stat Cards -->
  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-top">
        <div class="stat-number">1,900</div>
        <div class="stat-icon">📦</div>
      </div>
      <div class="stat-label">Total pesanan</div>
      <div class="stat-growth">67% dari bulan lalu</div>
    </div>
    <div class="stat-card">
      <div class="stat-top">
        <div class="stat-number">1,900</div>
        <div class="stat-icon">👥</div>
      </div>
      <div class="stat-label">Total pengguna</div>
      <div class="stat-growth">67% dari bulan lalu</div>
    </div>
    <div class="stat-card">
      <div class="stat-top">
        <div class="stat-number">1,900</div>
        <div class="stat-icon">💰</div>
      </div>
      <div class="stat-label">Pendapatan</div>
      <div class="stat-growth">67% dari bulan lalu</div>
    </div>
    <div class="stat-card">
      <div class="stat-top">
        <div class="stat-number">1,900</div>
        <div class="stat-icon">⏳</div>
      </div>
      <div class="stat-label">Pesanan pending</div>
      <div class="stat-growth">67% dari bulan lalu</div>
    </div>
  </div>

  <!-- Table Section -->
  <div class="table-section">
    <div class="table-header">
      <span class="table-title">Pesanan Terbaru</span>
      <button class="btn-lihat-semua">Lihat Semua</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Pelangan</th>
          <th>Layanan</th>
          <th class="center">Tanggal</th>
          <th class="center">Status</th>
          <th class="center">Saldo</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="td-id">#001</td>
          <td>
            <div class="td-customer">
              <div class="avatar-sm"></div>
              <span class="customer-name">Andi.M</span>
            </div>
          </td>
          <td class="td-layanan">Logo desain</td>
          <td class="td-center td-date">29 Apr 2026</td>
          <td class="td-center"><span class="badge badge-proses">Proses</span></td>
          <td class="td-center td-saldo">Rp 450.000</td>
        </tr>
        <tr>
          <td class="td-id">#002</td>
          <td>
            <div class="td-customer">
              <div class="avatar-sm"></div>
              <span class="customer-name">Andi.M</span>
            </div>
          </td>
          <td class="td-layanan">Logo desain</td>
          <td class="td-center td-date">29 Apr 2026</td>
          <td class="td-center"><span class="badge badge-proses">Proses</span></td>
          <td class="td-center td-saldo">Rp 450.000</td>
        </tr>
        <tr>
          <td class="td-id">#003</td>
          <td>
            <div class="td-customer">
              <div class="avatar-sm"></div>
              <span class="customer-name">Andi.M</span>
            </div>
          </td>
          <td class="td-layanan">Logo desain</td>
          <td class="td-center td-date">29 Apr 2026</td>
          <td class="td-center"><span class="badge badge-proses">Proses</span></td>
          <td class="td-center td-saldo">Rp 450.000</td>
        </tr>
        <tr>
          <td class="td-id">#004</td>
          <td>
            <div class="td-customer">
              <div class="avatar-sm"></div>
              <span class="customer-name">Andi.M</span>
            </div>
          </td>
          <td class="td-layanan">Logo desain</td>
          <td class="td-center td-date">29 Apr 2026</td>
          <td class="td-center"><span class="badge badge-proses">Proses</span></td>
          <td class="td-center td-saldo">Rp 450.000</td>
        </tr>
        <tr>
          <td class="td-id">#005</td>
          <td>
            <div class="td-customer">
              <div class="avatar-sm"></div>
              <span class="customer-name">Andi.M</span>
            </div>
          </td>
          <td class="td-layanan">Logo desain</td>
          <td class="td-center td-date">29 Apr 2026</td>
          <td class="td-center"><span class="badge badge-proses">Proses</span></td>
          <td class="td-center td-saldo">Rp 450.000</td>
        </tr>
      </tbody>
    </table>
  </div>

</main>

<script>
  // Active nav highlight
  document.querySelectorAll('.nav-item:not(.logout)').forEach(item => {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
      this.classList.add('active');
    });
  });
</script>
</body>
</html>