<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pesanan - LeLiLu</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--bg);
      color: var(--text);
      display: flex;
      min-height: 100vh;
    }

    /* ==============================
       LAYOUT
    ============================== */
    :root {
      --topbar-h: 60px;
      --card-bg: #ffffff;
      --text-primary: #1a1d27;
      --text-secondary: #6b7280;
      --border: #e5e7eb;
    }

    .main {
      /* margin-left: 235px; */
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .topbar {
      height: var(--topbar-h);
      background: var(--card-bg);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .topbar-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--text-primary);
    }

    .topbar-user {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      padding: 6px 10px;
      border-radius: 8px;
      transition: background .15s;
    }

    .topbar-user:hover { background: #f3f4f8; }

    .topbar-avatar {
      width: 34px;
      height: 34px;
      background: #e84040;
      border-radius: 50%;
      display: grid;
      place-items: center;
    }

    .topbar-avatar svg { width: 18px; height: 18px; fill: #fff; }

    .topbar-info { text-align: right; }

    .topbar-name {
      font-size: 13px;
      font-weight: 600;
      color: var(--text-primary);
    }

    .topbar-role {
      font-size: 11px;
      color: var(--text-secondary);
    }

    .chevron {
      width: 14px;
      height: 14px;
      stroke: var(--text-secondary);
    }

    .content {
      padding: 28px;
      flex: 1;
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

    .status-done {
      background: #bbf7d0;
      color: #15803d;
    }

    .status-proses {
      background: #bfdbfe;
      color: #1d4ed8;
    }

    .status-waiting {
      background: #fde68a;
      color: #92400e;
    }

    .status-pending {
      background: #fde68a;
      color: #92400e;
    }

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

  @include('layout.sidebar')

  <!-- ==============================
       MAIN
  ============================== -->
  <div class="main">
    <!-- CONTENT -->
    <main class="content">

    <!-- Search Bar -->
   

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
           <div class="search-wrapper">
      <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8" />
        <line x1="21" y1="21" x2="16.65" y2="16.65" />
      </svg>
      <input class="search-input" type="text" placeholder="Cari pesanan?....">
    </div>
          <svg class="filter-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="8" y1="6" x2="21" y2="6" />
            <line x1="8" y1="12" x2="21" y2="12" />
            <line x1="8" y1="18" x2="21" y2="18" />
            <line x1="3" y1="6" x2="3.01" y2="6" />
            <line x1="3" y1="12" x2="3.01" y2="12" />
            <line x1="3" y1="18" x2="3.01" y2="18" />
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
                  <svg viewBox="0 0 36 36" width="36" height="36">
                    <circle cx="18" cy="18" r="18" fill="#f0d0d8" />
                    <ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9" />
                    <ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)" />
                    <ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)" />
                  </svg>
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
                  <svg viewBox="0 0 36 36" width="36" height="36">
                    <circle cx="18" cy="18" r="18" fill="#f0d0d8" />
                    <ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9" />
                    <ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)" />
                    <ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)" />
                  </svg>
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
                  <svg viewBox="0 0 36 36" width="36" height="36">
                    <circle cx="18" cy="18" r="18" fill="#f0d0d8" />
                    <ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9" />
                    <ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)" />
                    <ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)" />
                  </svg>
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
                  <svg viewBox="0 0 36 36" width="36" height="36">
                    <circle cx="18" cy="18" r="18" fill="#f0d0d8" />
                    <ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9" />
                    <ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)" />
                    <ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)" />
                  </svg>
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
                  <svg viewBox="0 0 36 36" width="36" height="36">
                    <circle cx="18" cy="18" r="18" fill="#f0d0d8" />
                    <ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9" />
                    <ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)" />
                    <ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)" />
                  </svg>
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
                  <svg viewBox="0 0 36 36" width="36" height="36">
                    <circle cx="18" cy="18" r="18" fill="#f0d0d8" />
                    <ellipse cx="18" cy="17" rx="7" ry="9" fill="#c0405a" opacity="0.9" />
                    <ellipse cx="13" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(-25 13 23)" />
                    <ellipse cx="23" cy="23" rx="6" ry="4" fill="#a03050" opacity="0.7" transform="rotate(25 23 23)" />
                  </svg>
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