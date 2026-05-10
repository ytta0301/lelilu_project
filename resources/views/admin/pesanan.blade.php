<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>LeLiLu – Pesanan</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --yellow:     #F5C518;
    --sidebar-bg: #222224;
    --bg:         #F4F3EF;
    --card-bg:    #FFFFFF;
    --text:       #1C1C1E;
    --muted:      #9B9B9B;
    --radius:     14px;
    --shadow:     0 2px 12px rgba(0,0,0,.07);
  }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    display: flex;
    min-height: 100vh;
  }

  /* ───── SIDEBAR ───── */
  .sidebar {
    width: 235px;
    min-height: 100vh;
    background: var(--sidebar-bg);
    display: flex;
    flex-direction: column;
    padding: 24px 14px;
    flex-shrink: 0;
  }

  .logo {
    font-size: 22px;
    font-weight: 800;
    letter-spacing: -0.5px;
    margin-bottom: 28px;
    padding-left: 4px;
  }
  .logo .le,.logo .lu { color: #fff; }
  .logo .li            { color: var(--yellow); }

  .profile-card {
    background: linear-gradient(135deg,#3a3a3c,#2a2a2c);
    border: 1.5px solid #444;
    border-radius: 14px;
    padding: 14px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 4px;
  }
  .avatar {
    width: 42px; height: 42px;
    border-radius: 50%;
    background: #555;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; color: #ccc; flex-shrink: 0;
  }
  .profile-info .name  { color:#fff; font-weight:700; font-size:13px; }
  .profile-info .email { color:var(--muted); font-size:10.5px; margin-top:2px; }

  /* nav */
  .nav-group-label {
    font-size: 10px; font-weight: 700; color: #555;
    letter-spacing: 1.2px; text-transform: uppercase;
    padding: 0 8px; margin: 20px 0 6px;
  }
  .nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 12px; border-radius: 10px;
    cursor: pointer; margin-bottom: 2px; text-decoration: none;
    transition: background .18s;
  }
  .nav-item:hover { background: rgba(255,255,255,.06); }
  .nav-item.active { background: var(--yellow); }
  .nav-icon { width:18px; height:18px; flex-shrink:0; }
  .nav-text { font-size:13px; font-weight:600; color:#bbb; transition:color .18s; }
  .nav-item:hover .nav-text { color:#fff; }
  .nav-item.active .nav-text { color:#1C1C1E; font-weight:700; }
  .nav-item.active .nav-icon { filter:brightness(0); }

  .nav-badge {
    margin-left:auto; background:var(--yellow); color:#1C1C1E;
    font-size:10px; font-weight:800; padding:2px 7px;
    border-radius:20px; line-height:1.5;
  }
  .nav-item.active .nav-badge { background:#1C1C1E; color:var(--yellow); }

  .sidebar-bottom { padding-top:16px; border-top:1px solid #333; }

  /* ───── MAIN ───── */
  .main {
    flex: 1;
    padding: 32px 34px;
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
    gap: 22px;
  }

  /* search */
  .search-bar {
    display: flex; align-items: center; gap: 10px;
    background: var(--card-bg);
    border: 1.5px solid #E5E5E3;
    border-radius: 50px;
    padding: 11px 20px;
    max-width: 680px;
    box-shadow: var(--shadow);
    transition: border-color .2s, box-shadow .2s;
  }
  .search-bar:focus-within {
    border-color: var(--yellow);
    box-shadow: 0 0 0 3px rgba(245,197,24,.15);
  }
  .search-bar svg { flex-shrink:0; color:var(--muted); }
  .search-bar input {
    border:none; outline:none; background:transparent;
    font-family:inherit; font-size:14px; color:var(--text);
    width:100%; font-weight:500;
  }
  .search-bar input::placeholder { color:var(--muted); }

  /* stat cards */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(5,1fr);
    gap: 14px;
  }
  .stat-card {
    background: var(--card-bg);
    border-radius: var(--radius);
    padding: 20px 18px 16px;
    box-shadow: var(--shadow);
    animation: fadeUp .4s ease both;
  }
  .stat-card:nth-child(1){animation-delay:.05s}
  .stat-card:nth-child(2){animation-delay:.10s}
  .stat-card:nth-child(3){animation-delay:.15s}
  .stat-card:nth-child(4){animation-delay:.20s}
  .stat-card:nth-child(5){animation-delay:.25s}

  .stat-card .number { font-size:28px; font-weight:800; letter-spacing:-1px; line-height:1; }
  .stat-card .label  { font-size:12px; color:var(--muted); margin-top:4px; font-weight:500; }
  .stat-card .change { font-size:11.5px; color:#27AE60; font-weight:700; margin-top:8px; }

  /* table card */
  .table-card {
    background: var(--card-bg);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    overflow: hidden;
    animation: fadeUp .45s ease .3s both;
  }

  .table-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 20px 24px 16px;
  }
  .table-header .title { font-size:17px; font-weight:800; }
  .table-header-right { display:flex; align-items:center; gap:12px; }
  .view-all { font-size:13px; color:var(--muted); font-weight:600; cursor:pointer; }
  .view-all:hover { color:var(--text); }
  .filter-btn {
    background:none; border:none; cursor:pointer; padding:4px;
    color:var(--muted); display:flex; align-items:center;
  }
  .filter-btn:hover { color:var(--text); }

  /* table */
  table { width:100%; border-collapse:collapse; }
  thead tr { background:#F8F8F6; }
  thead th {
    text-align:left; padding:12px 20px;
    font-size:12px; color:var(--muted); font-weight:600;
    letter-spacing:.3px; border-bottom:1px solid #EFEFED;
  }
  tbody tr {
    border-bottom:1px solid #F0F0EE;
    transition: background .15s;
  }
  tbody tr:last-child { border-bottom: none; }
  tbody tr:hover { background:#FAFAF8; }
  tbody td {
    padding:16px 20px;
    font-size:13.5px;
    font-weight:500;
    vertical-align: middle;
  }

  .td-id { font-weight:700; color:var(--text); }

  .td-akun { display:flex; align-items:center; gap:10px; }
  .acc-avatar {
    width:34px; height:34px; border-radius:50%; overflow:hidden;
    flex-shrink:0; background:#e8e8e8;
    display:flex; align-items:center; justify-content:center;
    font-size:14px;
  }
  .acc-avatar img { width:100%; height:100%; object-fit:cover; }
  .acc-name {
    font-weight:700; font-size:13.5px;
    color: #1A5FAE;
    cursor: pointer;
    text-decoration: underline;
    text-underline-offset: 3px;
    text-decoration-color: rgba(26,95,174,.3);
    transition: color .15s, text-decoration-color .15s;
  }
  .acc-name:hover {
    color: #0D3F7A;
    text-decoration-color: rgba(13,63,122,.6);
  }

  /* ── MODAL OVERLAY ── */
  .modal-overlay {
    display: none;
    position: fixed; inset: 0;
    background: rgba(0,0,0,.45);
    backdrop-filter: blur(3px);
    z-index: 1000;
    align-items: center;
    justify-content: center;
    animation: fadeIn .2s ease;
  }
  .modal-overlay.open { display: flex; }

  @keyframes fadeIn { from{opacity:0} to{opacity:1} }
  @keyframes slideUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }

  .modal {
    background: #fff;
    border-radius: 20px;
    width: 420px;
    max-width: calc(100vw - 40px);
    box-shadow: 0 24px 60px rgba(0,0,0,.18);
    animation: slideUp .25s ease;
    overflow: hidden;
  }

  .modal-top {
    background: linear-gradient(135deg, #222224, #3a3a3c);
    padding: 28px 28px 48px;
    position: relative;
  }
  .modal-close {
    position: absolute; top: 16px; right: 16px;
    background: rgba(255,255,255,.1); border: none;
    border-radius: 8px; cursor: pointer;
    width: 32px; height: 32px;
    display: flex; align-items: center; justify-content: center;
    color: #fff; transition: background .15s;
  }
  .modal-close:hover { background: rgba(255,255,255,.2); }

  .modal-avatar-wrap {
    display: flex; flex-direction: column; align-items: center; gap: 10px;
  }
  .modal-avatar {
    width: 72px; height: 72px; border-radius: 50%;
    background: #555;
    border: 3px solid var(--yellow);
    display: flex; align-items: center; justify-content: center;
    font-size: 30px;
  }
  .modal-name { color: #fff; font-weight: 800; font-size: 18px; }
  .modal-role { color: var(--yellow); font-size: 12px; font-weight: 600; letter-spacing: .5px; }

  .modal-body { padding: 24px 28px 28px; }

  .modal-stats {
    display: grid; grid-template-columns: repeat(3,1fr);
    gap: 10px; margin-bottom: 22px;
  }
  .mstat {
    background: #F8F8F6; border-radius: 10px;
    padding: 12px 10px; text-align: center;
  }
  .mstat .mv { font-size: 18px; font-weight: 800; color: var(--text); }
  .mstat .ml { font-size: 10.5px; color: var(--muted); font-weight: 500; margin-top: 2px; }

  .modal-info { display: flex; flex-direction: column; gap: 12px; }
  .minfo-row {
    display: flex; align-items: center; gap: 12px;
    padding: 10px 14px;
    background: #F8F8F6; border-radius: 10px;
  }
  .minfo-icon { color: var(--muted); flex-shrink: 0; }
  .minfo-label { font-size: 11px; color: var(--muted); font-weight: 600; }
  .minfo-val { font-size: 13.5px; font-weight: 700; color: var(--text); margin-top: 1px; }

  .modal-actions {
    display: flex; gap: 10px; margin-top: 20px;
  }
  .btn-primary {
    flex: 1; padding: 11px;
    background: var(--yellow); border: none; border-radius: 10px;
    font-family: inherit; font-size: 13px; font-weight: 700;
    cursor: pointer; color: var(--text);
    transition: opacity .15s;
  }
  .btn-primary:hover { opacity: .85; }
  .btn-secondary {
    flex: 1; padding: 11px;
    background: #F0F0EE; border: none; border-radius: 10px;
    font-family: inherit; font-size: 13px; font-weight: 700;
    cursor: pointer; color: var(--muted);
    transition: background .15s;
  }
  .btn-secondary:hover { background: #E5E5E3; color: var(--text); }

  .td-nomor { color:#555; letter-spacing:.4px; }
  .td-tanggal { color:#555; }
  .td-saldo { font-weight:700; }

  /* status badges */
  .badge {
    display:inline-block;
    padding:6px 16px;
    border-radius:8px;
    font-size:13px;
    font-weight:700;
    min-width:80px;
    text-align:center;
  }
  .badge-done    { background:#D4EDDA; color:#1A7A3A; }
  .badge-proses  { background:#CCE5FF; color:#1A5FAE; }
  .badge-waiting { background:#FFF3CD; color:#D4900A; }
  .badge-batal   { background:#FDDEDE; color:#C0392B; }

  /* pagination */
  .pagination {
    display:flex; align-items:center; justify-content:space-between;
    padding:14px 24px;
    border-top:1px solid #EFEFED;
    font-size:13px; color:var(--muted);
  }
  .page-info { font-weight:500; }
  .page-info strong { color:var(--text); font-weight:700; }

  .page-controls { display:flex; align-items:center; gap:8px; }
  .page-select {
    appearance:none;
    border:1.5px solid #E0E0DE;
    border-radius:8px;
    padding:5px 26px 5px 10px;
    font-family:inherit; font-size:13px;
    font-weight:600; background:#fff;
    cursor:pointer; outline:none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%239B9B9B'/%3E%3C/svg%3E");
    background-repeat:no-repeat; background-position:right 8px center;
    transition:border-color .2s;
  }
  .page-select:focus { border-color:var(--yellow); }

  .page-btn {
    width:32px; height:32px; border-radius:8px;
    border:1.5px solid #E0E0DE;
    background:#fff; cursor:pointer;
    display:flex; align-items:center; justify-content:center;
    transition:all .18s;
  }
  .page-btn:hover { border-color:var(--yellow); background:var(--yellow); }
  .page-btn:hover svg { stroke:#1C1C1E; }
  .page-btn svg { stroke:#9B9B9B; }

  /* animations */
  @keyframes fadeUp {
    from { opacity:0; transform:translateY(16px); }
    to   { opacity:1; transform:translateY(0); }
  }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="logo"><span class="le">Le</span><span class="li">Li</span><span class="lu">Lu</span></div>

  <div class="profile-card">
    <div class="avatar">👤</div>
    <div class="profile-info">
      <div class="name">mas fachri</div>
      <div class="email">fachrilelilu@gmail.com</div>
    </div>
  </div>

  <nav>
    <div class="nav-group-label">Menu Utama</div>

    <a class="nav-item" href="/admin/worker">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
      <span class="nav-text">Dasboard</span>
    </a>

    <a class="nav-item active" href="#">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
      <span class="nav-text">Pesanan</span>
      <span class="nav-badge">15</span>
    </a>

    <div class="nav-group-label">Sistem</div>

    <a class="nav-item" href="#">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
      <span class="nav-text">Pengaturan</span>
    </a>

  </nav>

  <div style="flex:1"></div>

  <div class="sidebar-bottom">
    <a class="nav-item" href="#" style="margin-bottom:0">
      <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="#E74C3C" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      <span class="nav-text" style="color:#E74C3C;">Log out</span>
    </a>
  </div>
</aside>

<!-- MAIN -->
<main class="main">

  <!-- SEARCH -->
  <div class="search-bar">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    <input type="text" placeholder="Cari pesanan?...."/>
  </div>

  <!-- STATS -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="number">20</div>
      <div class="label">Total pesanan</div>
      <div class="change">67% dari bulan lalu</div>
    </div>
    <div class="stat-card">
      <div class="number">15</div>
      <div class="label">Pesanan pending</div>
      <div class="change">67% dari bulan lalu</div>
    </div>
    <div class="stat-card">
      <div class="number" style="color:var(--text)">15</div>
      <div class="label">Total pesanan</div>
      <div class="change">67% dari bulan lalu</div>
    </div>
    <div class="stat-card">
      <div class="number">15</div>
      <div class="label">Pesanan pending</div>
      <div class="change">67% dari bulan lalu</div>
    </div>
    <div class="stat-card">
      <div class="label" style="margin-top:0;margin-bottom:4px;">Total pesanan</div>
      <div class="change">67% dari bulan lalu</div>
    </div>
  </div>

  <!-- TABLE -->
  <div class="table-card">
    <div class="table-header">
      <span class="title">Pesanan Terbaru</span>
      <div class="table-header-right">
        <span class="view-all">Lihat Semua</span>
        <button class="filter-btn" title="Filter">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="21" y1="6" x2="3" y2="6"/><line x1="15" y1="12" x2="9" y2="12"/><line x1="18" y1="18" x2="6" y2="18"/></svg>
        </button>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>akun</th>
          <th>nomor</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Saldo</th>
        </tr>
      </thead>
      <tbody id="tableBody"></tbody>
    </table>

    <!-- PAGINATION -->
    <div class="pagination">
      <span class="page-info"><strong>1 – 5</strong> of 56</span>
      <div style="display:flex;align-items:center;gap:10px;">
        <span style="font-size:13px;color:var(--muted);font-weight:500;">The page you're on</span>
        <select class="page-select" id="pageSelect">
          <option>1</option><option>2</option><option>3</option>
          <option>4</option><option>5</option><option>6</option>
          <option>7</option><option>8</option><option>9</option>
          <option>10</option><option>11</option><option>12</option>
        </select>
        <button class="page-btn" id="prevBtn" title="Previous">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9B9B9B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <button class="page-btn" id="nextBtn" title="Next">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9B9B9B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
      </div>
    </div>
  </div>

</main>

<!-- MODAL PROFIL AKUN -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal" id="modal">
    <div class="modal-top">
      <button class="modal-close" id="modalClose">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <a href="/admin/detail"><div class="modal-avatar-wrap"></a>
        <div class="modal-avatar" id="mAvatar">🔴</div>
        <div class="modal-name" id="mName">Andi.M</div>
        <div class="modal-role">Worker · Aktif</div>
      </div>
    </div>

    <div class="modal-body">
      <div class="modal-stats">
        <div class="mstat"><div class="mv">24</div><div class="ml">Total Pesanan</div></div>
        <div class="mstat"><div class="mv">18</div><div class="ml">Selesai</div></div>
        <div class="mstat"><div class="mv">6</div><div class="ml">Pending</div></div>
      </div>

      <div class="modal-info">
        <div class="minfo-row">
          <svg class="minfo-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.86 19.86 0 0 1 3.08 4.18 2 2 0 0 1 5.06 2h3a2 2 0 0 1 2 1.72c.13 1 .37 1.98.72 2.91a2 2 0 0 1-.45 2.11L9.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.93.35 1.9.59 2.91.72A2 2 0 0 1 23 16.92z"/></svg>
          <div><div class="minfo-label">Nomor</div><div class="minfo-val" id="mNomor">0809******</div></div>
        </div>
        <div class="minfo-row">
          <svg class="minfo-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          <div><div class="minfo-label">Bergabung</div><div class="minfo-val" id="mJoined">12 Jan 2025</div></div>
        </div>
        <div class="minfo-row">
          <svg class="minfo-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          <div><div class="minfo-label">Total Saldo</div><div class="minfo-val" id="mSaldo">Rp 450.000</div></div>
        </div>
        <div class="minfo-row">
          <svg class="minfo-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          <div><div class="minfo-label">Pesanan Terakhir</div><div class="minfo-val" id="mLast">29 Apr 2026</div></div>
        </div>
      </div>

      <div class="modal-actions">
        <button class="btn-primary">Lihat Pesanan</button>
        <button class="btn-secondary" id="modalClose2">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  const data = [
    { id:'sda-77', akun:'Andi.M', nomor:'0809******', tanggal:'29 Apr 2026', status:'Done',    saldo:'Rp 450.000', profileUrl:'/admin/detail' },
    { id:'sda-77', akun:'Andi.M', nomor:'0809******', tanggal:'29 Apr 2026', status:'Proses',  saldo:'Rp 450.000', profileUrl:'https://example.com/profil/andi-m' },
    { id:'sda-77', akun:'Andi.M', nomor:'0809******', tanggal:'29 Apr 2026', status:'Proses',  saldo:'Rp 450.000', profileUrl:'https://example.com/profil/andi-m' },
    { id:'sda-77', akun:'Andi.M', nomor:'0809******', tanggal:'29 Apr 2026', status:'Proses',  saldo:'Rp 450.000', profileUrl:'https://example.com/profil/andi-m' },
    { id:'sda-77', akun:'Andi.M', nomor:'0809******', tanggal:'29 Apr 2026', status:'Proses',  saldo:'Rp 450.000', profileUrl:'https://example.com/profil/andi-m' },
    { id:'sda-77', akun:'Andi.M', nomor:'0809******', tanggal:'29 Apr 2026', status:'Waiting', saldo:'Rp 450.000', profileUrl:'https://example.com/profil/andi-m' },
  ];

  const statusClass = { Done:'badge-done', Proses:'badge-proses', Waiting:'badge-waiting', Batal:'badge-batal' };
  const COLORS = ['#E74C3C','#27AE60','#2980B9','#E67E22','#8E44AD'];
  const EMOJIS = ['🔴','🟢','🔵','🟠','🟣'];

  function renderTable(rows) {
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = rows.map((r, i) => `
      <tr>
        <td class="td-id">${r.id}</td>
        <td>
          <div class="td-akun">
            <div class="acc-avatar" style="background:${COLORS[i%COLORS.length]}22;font-size:18px;">${EMOJIS[i%EMOJIS.length]}</div>
            <a class="acc-name" href="${r.profileUrl}" target="_blank" rel="noopener noreferrer">${r.akun}</a>
          </div>
        </td>
        <td class="td-nomor">${r.nomor}</td>
        <td class="td-tanggal">${r.tanggal}</td>
        <td><span class="badge ${statusClass[r.status] || 'badge-proses'}">${r.status}</span></td>
        <td class="td-saldo">${r.saldo}</td>
      </tr>
    `).join('');
  }

  renderTable(data);

  /* ── MODAL LOGIC ── */
  function openModal(idx) {
    const r = data[idx];
    document.getElementById('mAvatar').textContent  = EMOJIS[idx % EMOJIS.length];
    document.getElementById('mName').textContent    = r.akun;
    document.getElementById('mNomor').textContent   = r.nomor;
    document.getElementById('mLast').textContent    = r.tanggal;
    document.getElementById('mSaldo').textContent   = r.saldo;
    document.getElementById('modalOverlay').classList.add('open');
  }

  function closeModal() {
    document.getElementById('modalOverlay').classList.remove('open');
  }

  document.getElementById('modalClose').addEventListener('click', closeModal);
  document.getElementById('modalClose2').addEventListener('click', closeModal);
  document.getElementById('modalOverlay').addEventListener('click', e => {
    if (e.target === document.getElementById('modalOverlay')) closeModal();
  });
  document.addEventListener('keydown', e => { if(e.key==='Escape') closeModal(); });

  /* ── PAGINATION ── */
  const TOTAL = 56, PER_PAGE = 5, TOTAL_PAGES = Math.ceil(TOTAL/PER_PAGE);
  let page = 1;

  const sel = document.getElementById('pageSelect');
  for(let i = sel.options.length; i < TOTAL_PAGES; i++) {
    const o = document.createElement('option'); o.text = i+1; sel.add(o);
  }

  function updatePage(p) {
    page = Math.max(1, Math.min(TOTAL_PAGES, p));
    sel.value = page;
    const start = (page-1)*PER_PAGE + 1;
    const end   = Math.min(page*PER_PAGE, TOTAL);
    document.querySelector('.page-info').innerHTML = `<strong>${start} – ${end}</strong> of ${TOTAL}`;
  }

  sel.addEventListener('change', () => updatePage(+sel.value));
  document.getElementById('prevBtn').addEventListener('click', () => updatePage(page-1));
  document.getElementById('nextBtn').addEventListener('click', () => updatePage(page+1));

  /* search filter */
  document.querySelector('.search-bar input').addEventListener('input', e => {
    const q = e.target.value.toLowerCase();
    const filtered = data.filter(r =>
      r.id.toLowerCase().includes(q) ||
      r.akun.toLowerCase().includes(q) ||
      r.nomor.toLowerCase().includes(q) ||
      r.status.toLowerCase().includes(q)
    );
    renderTable(filtered);
  });
</script>
</body>
</html>