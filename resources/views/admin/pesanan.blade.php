<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pesanan - LeLiLu</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #ebebeb;
      display: flex;
      min-height: 100vh;
    }

    /* ==============================
       SIDEBAR
    ============================== */
    .sidebar {
      width: 240px;
      min-width: 240px;
      background: #2b2b2b;
      color: #fff;
      display: flex;
      flex-direction: column;
      padding-bottom: 24px;
    }

    .sidebar-brand {
      font-size: 28px;
      font-weight: 800;
      color: #f5c518;
      padding: 24px 24px 20px;
      letter-spacing: 1px;
    }

    .worker-card {
      display: flex;
      align-items: center;
      gap: 10px;
      border: 2px solid #f5c518;
      border-radius: 12px;
      margin: 0 14px 24px;
      padding: 10px 12px;
    }

    .worker-avatar {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: #555;
      overflow: hidden;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .worker-info .worker-name {
      font-size: 13px;
      font-weight: 700;
      color: #fff;
    }

    .worker-info .worker-email {
      font-size: 11px;
      color: #aaa;
      margin-top: 2px;
    }

    .menu-label {
      font-size: 10px;
      color: #888;
      font-weight: 700;
      letter-spacing: 1.2px;
      padding: 10px 24px 6px;
      text-transform: uppercase;
    }

    .menu-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 22px;
      font-size: 14px;
      color: #bbb;
      text-decoration: none;
      border-radius: 8px;
      margin: 2px 10px;
      cursor: pointer;
      transition: background 0.15s, color 0.15s;
    }

    .menu-item:hover {
      background: rgba(255, 255, 255, 0.07);
      color: #fff;
    }

    .menu-item.active {
      color: #fff;
      font-weight: 700;
    }

    .menu-icon {
      width: 18px;
      height: 18px;
      flex-shrink: 0;
      opacity: 0.7;
    }

    .menu-item.active .menu-icon {
      opacity: 1;
    }

    /* ==============================
       MAIN
    ============================== */
    .main {
      flex: 1;
      padding: 28px 36px;
      display: flex;
      flex-direction: column;
      gap: 22px;
      overflow: auto;
    }

    /* ==============================
       SEARCH BAR
    ============================== */
    .search-wrapper {
      position: relative;
    }

    .search-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #bbb;
      width: 18px;
      height: 18px;
    }

    .search-input {
      width: 100%;
      padding: 14px 18px 14px 46px;
      border: 1.5px solid #e0e0e0;
      border-radius: 12px;
      font-size: 15px;
      color: #555;
      background: #fff;
      outline: none;
      font-family: inherit;
      transition: border-color 0.2s;
    }

    .search-input:focus {
      border-color: #f5c518;
    }

    .search-input::placeholder {
      color: #bbb;
    }

    /* ==============================
       STATS CARDS
    ============================== */
    .stats-row {
      display: flex;
      gap: 16px;
    }

    .stat-card {
      flex: 1;
      background: #fff;
      border-radius: 14px;
      padding: 20px 20px 16px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .stat-number {
      font-size: 26px;
      font-weight: 800;
      color: #1a1a1a;
    }

    .stat-label {
      font-size: 13px;
      color: #888;
    }

    .stat-change {
      font-size: 12px;
      color: #22c55e;
      margin-top: 6px;
    }

    /* ==============================
       TABLE SECTION
    ============================== */
    .table-section {
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 2px 14px rgba(0, 0, 0, 0.06);
    }

    .table-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px 16px;
    }

    .table-title {
      font-size: 18px;
      font-weight: 800;
      color: #1a1a1a;
    }

    .table-header-right {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .lihat-semua {
      font-size: 14px;
      color: #555;
      text-decoration: none;
      cursor: pointer;
    }

    .lihat-semua:hover {
      color: #1a1a1a;
    }

    .filter-icon {
      color: #888;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead tr {
      background: #f7f7f5;
    }

    thead th {
      padding: 12px 20px;
      font-size: 13px;
      font-weight: 500;
      color: #aaa;
      text-align: left;
    }

    /* ── Clickable rows ── */
    tbody tr {
      position: relative;
      border-top: 1px solid #f0f0ee;
      transition: background 0.15s;
      cursor: pointer;
    }

    tbody tr:hover {
      background: #fafaf7;
    }

    tbody td {
      padding: 16px 20px;
      font-size: 14px;
      color: #333;
      vertical-align: middle;
    }

    /* Invisible <a> that covers the full row */
    .row-link a {
      position: absolute;
      inset: 0;
      z-index: 1;
      text-decoration: none;
    }

    /* Keep badges above the overlay */
    .status-badge {
      position: relative;
      z-index: 2;
    }

    /* ── Columns ── */
    .col-id {
      font-weight: 700;
      color: #1a1a1a;
    }

    .akun-cell {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .akun-avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      flex-shrink: 0;
      overflow: hidden;
      background: #f5e0e4;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .akun-name {
      font-size: 14px;
      color: #333;
      font-weight: 500;
    }

    /* ── Status badges ── */
    .status-badge {
      display: inline-block;
      padding: 7px 20px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
    }

    .status-done     { background: #bbf7d0; color: #15803d; }
    .status-proses   { background: #bfdbfe; color: #1d4ed8; }
    .status-waiting  { background: #fde68a; color: #92400e; }
    .status-pending  { background: #fde68a; color: #92400e; }

    .col-saldo {
      font-weight: 700;
      color: #1a1a1a;
    }

    /* ==============================
       PAGINATION
    ============================== */
    .pagination {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 14px 20px;
      border-top: 1px solid #f0f0ee;
    }

    .pagination-info {
      font-size: 13px;
      color: #aaa;
    }

    .pagination-info span {
      font-weight: 700;
      color: #333;
    }

    .pagination-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .pagination-label {
      font-size: 13px;
      color: #aaa;
    }

    .page-select {
      border: 1.5px solid #e0e0e0;
      border-radius: 8px;
      padding: 6px 10px;
      font-size: 13px;
      background: #fff;
      cursor: pointer;
      outline: none;
    }

    .page-btn {
      width: 34px;
      height: 34px;
      border: 1.5px solid #e0e0e0;
      border-radius: 8px;
      background: #fff;
      cursor: pointer;
      font-size: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #555;
      transition: background 0.15s;
    }

    .page-btn:hover {
      background: #f5f5f5;
    }
  </style>
</head>
<body>

  <!-- ==============================
       SIDEBAR
  ============================== -->
  <aside class="sidebar">
    <div class="sidebar-brand">LeLiLu</div>

    <div class="worker-card">
      <div class="worker-avatar">
        <svg viewBox="0 0 46 46" width="46" height="46" xmlns="http://www.w3.org/2000/svg">
          <circle cx="23" cy="23" r="23" fill="#666"/>
          <circle cx="23" cy="18" r="9" fill="#aaa"/>
          <ellipse cx="23" cy="40" rx="14" ry="9" fill="#888"/>
        </svg>
      </div>
      <div class="worker-info">
        <div class="worker-name">mas fachri</div>
        <div class="worker-email">fachrilelilu@gmail.com</div>
      </div>
    </div>

    <div class="menu-label">Menu Utama</div>

    <a href="/admin/worker" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
        <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
      </svg>
      Dasboard
    </a>

    <a href="/admin/pesanan" class="menu-item active">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
        <rect x="9" y="3" width="6" height="4" rx="1"/>
        <line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/>
      </svg>
      Pesanan
    </a>

    <div class="menu-label">Sistem</div>

    <a href="#" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="3"/>
        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
      </svg>
      Pengaturan
    </a>

    <a href="#" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
        <polyline points="16 17 21 12 16 7"/>
        <line x1="21" y1="12" x2="9" y2="12"/>
      </svg>
      Log out
    </a>
  </aside>

  <!-- ==============================
       MAIN CONTENT
  ============================== -->
  <main class="main">

    <!-- Search Bar -->
    <div class="search-wrapper">
      <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>
      <input class="search-input" type="text" placeholder="Cari pesanan?....">
    </div>

    <!-- Stats Cards -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-number">20</div>
        <div class="stat-label">Total pesanan</div>
        <div class="stat-change">67% dari bulan lalu</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">15</div>
        <div class="stat-label">Pesanan pending</div>
        <div class="stat-change">67% dari bulan lalu</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">20</div>
        <div class="stat-label">Total pesanan</div>
        <div class="stat-change">67% dari bulan lalu</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">15</div>
        <div class="stat-label">Pesanan pending</div>
        <div class="stat-change">67% dari bulan lalu</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">—</div>
        <div class="stat-label">Total pesanan</div>
        <div class="stat-change">67% dari bulan lalu</div>
      </div>
    </div>

    <!-- Table Section -->
    <div class="table-section">

      <div class="table-header">
        <span class="table-title">Pesanan Terbaru</span>
        <div class="table-header-right">
          <a href="#" class="lihat-semua">Lihat Semua</a>
          <svg class="filter-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/>
            <line x1="8" y1="18" x2="21" y2="18"/>
            <line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/>
            <line x1="3" y1="18" x2="3.01" y2="18"/>
          </svg>
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
        <tbody>

          <tr>
            <td class="col-id">sda-77</td>
            <td>
              <div class="akun-cell">
                <div class="akun-avatar">
                  <svg viewBox="0 0 36 36" width="36" height="36"><circle cx="18" cy="18" r="18" fill="#f0d0d8"/><ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9"/><ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)"/><ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)"/></svg>
                </div>
                <span class="akun-name">Andi.M</span>
              </div>
            </td>
            <td>0809******</td>
            <td>29 Apr 2026</td>
            <td><span class="status-badge status-done">Done</span></td>
            <td class="col-saldo">Rp 450.000</td>
            <td class="row-link"><a href="/admin/input"></a></td>
          </tr>

          <tr>
            <td class="col-id">sda-77</td>
            <td>
              <div class="akun-cell">
                <div class="akun-avatar">
                  <svg viewBox="0 0 36 36" width="36" height="36"><circle cx="18" cy="18" r="18" fill="#f0d0d8"/><ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9"/><ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)"/><ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)"/></svg>
                </div>
                <span class="akun-name">Andi.M</span>
              </div>
            </td>
            <td>0809******</td>
            <td>29 Apr 2026</td>
            <td><span class="status-badge status-proses">Proses</span></td>
            <td class="col-saldo">Rp 450.000</td>
            <td class="row-link"><a href="detail-pesanan.html"></a></td>
          </tr>

          <tr>
            <td class="col-id">sda-77</td>
            <td>
              <div class="akun-cell">
                <div class="akun-avatar">
                  <svg viewBox="0 0 36 36" width="36" height="36"><circle cx="18" cy="18" r="18" fill="#f0d0d8"/><ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9"/><ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)"/><ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)"/></svg>
                </div>
                <span class="akun-name">Andi.M</span>
              </div>
            </td>
            <td>0809******</td>
            <td>29 Apr 2026</td>
            <td><span class="status-badge status-proses">Proses</span></td>
            <td class="col-saldo">Rp 450.000</td>
            <td class="row-link"><a href="detail-pesanan.html"></a></td>
          </tr>

          <tr>
            <td class="col-id">sda-77</td>
            <td>
              <div class="akun-cell">
                <div class="akun-avatar">
                  <svg viewBox="0 0 36 36" width="36" height="36"><circle cx="18" cy="18" r="18" fill="#f0d0d8"/><ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9"/><ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)"/><ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)"/></svg>
                </div>
                <span class="akun-name">Andi.M</span>
              </div>
            </td>
            <td>0809******</td>
            <td>29 Apr 2026</td>
            <td><span class="status-badge status-proses">Proses</span></td>
            <td class="col-saldo">Rp 450.000</td>
            <td class="row-link"><a href="detail-pesanan.html"></a></td>
          </tr>

          <tr>
            <td class="col-id">sda-77</td>
            <td>
              <div class="akun-cell">
                <div class="akun-avatar">
                  <svg viewBox="0 0 36 36" width="36" height="36"><circle cx="18" cy="18" r="18" fill="#f0d0d8"/><ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9"/><ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)"/><ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)"/></svg>
                </div>
                <span class="akun-name">Andi.M</span>
              </div>
            </td>
            <td>0809******</td>
            <td>29 Apr 2026</td>
            <td><span class="status-badge status-proses">Proses</span></td>
            <td class="col-saldo">Rp 450.000</td>
            <td class="row-link"><a href="detail-pesanan.html"></a></td>
          </tr>

          <tr>
            <td class="col-id">sda-77</td>
            <td>
              <div class="akun-cell">
                <div class="akun-avatar">
                  <svg viewBox="0 0 36 36" width="36" height="36"><circle cx="18" cy="18" r="18" fill="#f0d0d8"/><ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9"/><ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)"/><ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)"/></svg>
                </div>
                <span class="akun-name">Andi.M</span>
              </div>
            </td>
            <td>0809******</td>
            <td>29 Apr 2026</td>
            <td><span class="status-badge status-waiting">Waiting</span></td>
            <td class="col-saldo">Rp 450.000</td>
            <td class="row-link"><a href="detail-pesanan.html"></a></td>
          </tr>

        </tbody>
      </table>

      <!-- Pagination -->
      <div class="pagination">
        <span class="pagination-info"><span>1 - 5</span> of 56</span>
        <div class="pagination-right">
          <span class="pagination-label">The page you're on</span>
          <select class="page-select">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
          <button class="page-btn">&#8249;</button>
          <button class="page-btn">&#8250;</button>
        </div>
      </div>

    </div>
  </main>

</body>
</html>