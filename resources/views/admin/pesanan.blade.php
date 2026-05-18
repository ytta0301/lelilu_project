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
      overflow-x: hidden;
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

    .page-btn.disabled {
      opacity: 0.4;
      pointer-events: none;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 1200px) {
      .stats-row { flex-wrap: wrap; }
      .stat-card { flex: 1 1 calc(50% - 8px); min-width: 140px; }
    }

    @media (max-width: 992px) {
      .content { padding: 20px; }
    }

    @media (max-width: 768px) {
      .main { margin-left: 0; }
      .content { padding: 16px; gap: 16px; }
      .topbar { padding: 0 16px; }
      .topbar-title { font-size: 13px; }

      .stats-row { gap: 10px; }
      .stat-card { flex: 1 1 calc(50% - 5px); padding: 14px; }
      .stat-number { font-size: 20px; }

      .table-section { border-radius: 12px; overflow-x: auto; }
      .table-header { padding: 14px 16px 12px; flex-wrap: wrap; gap: 10px; }
      .table-title { font-size: 15px; }

      table { min-width: 600px; }
      thead th { padding: 10px 14px; font-size: 11px; }
      tbody td { padding: 12px 14px; font-size: 12px; }
      .status-badge { padding: 5px 14px; font-size: 11px; }
      .pagination { flex-direction: column; gap: 10px; align-items: flex-start; padding: 12px 16px; }

      .search-wrapper { width: 100%; }
      .search-input { padding: 10px 14px 10px 40px; font-size: 13px; }
    }

    @media (max-width: 480px) {
      .content { padding: 12px; }
      .stat-card { flex: 1 1 100%; }
      .stat-number { font-size: 18px; }
      .table-header-right { flex-wrap: wrap; width: 100%; }
      .col-id { font-size: 12px; }
      .akun-cell { gap: 6px; }
      .akun-avatar { width: 28px; height: 28px; }
      .akun-name { font-size: 12px; }
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
        <div class="stat-number">{{ $totalPesanan }}</div>
        <div class="stat-label">Total pesanan</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ $totalPending }}</div>
        <div class="stat-label">Pesanan pending</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ $totalProses }}</div>
        <div class="stat-label">Pesanan diproses</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ $totalSelesai }}</div>
        <div class="stat-label">Pesanan selesai</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">{{ $totalPesanan - $totalPending - $totalProses - $totalSelesai }}</div>
        <div class="stat-label">Dibatalkan / lainnya</div>
      </div>
    </div>

    <!-- Table Section -->
    <div class="table-section">

      <div class="table-header">
        <span class="table-title">Pesanan Terbaru</span>
        <div class="table-header-right">
           <form class="search-wrapper" action="{{ route('admin.pesanan') }}" method="GET">
      <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8" />
        <line x1="21" y1="21" x2="16.65" y2="16.65" />
      </svg>
      <input class="search-input" name="search" type="text" placeholder="Cari pesanan..." value="{{ request('search') }}">
    </form>
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

          @forelse ($pemesanans as $p)
          <tr>
            <td class="col-id">#{{ $p->id_pemesanan }}</td>
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
                <span class="akun-name">{{ $p->user->name ?? 'Tanpa akun' }}</span>
              </div>
            </td>
            <td>{{ $p->user->whatsapp ?? '—' }}</td>
            <td>{{ \Carbon\Carbon::parse($p->created_at)->isoFormat('D MMM Y') }}</td>
            <td>
              @php
                $map = ['selesai' => 'done', 'proses' => 'proses', 'pending' => 'pending', 'dibatalkan' => 'waiting'];
                $label = ['selesai' => 'Selesai', 'proses' => 'Proses', 'pending' => 'Pending', 'dibatalkan' => 'Dibatalkan'];
              @endphp
              <span class="status-badge status-{{ $map[$p->status] ?? 'pending' }}">{{ $label[$p->status] ?? $p->status }}</span>
            </td>
            <td class="col-saldo">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
            <td class="row-link"><a href="/admin/input?id={{ $p->id_pemesanan }}"></a></td>
          </tr>
          @empty
          <tr>
            <td colspan="7" style="text-align:center;padding:40px 20px;color:#aaa;">Belum ada pesanan.</td>
          </tr>
          @endforelse

        </tbody>
      </table>

      <!-- Pagination -->
      <div class="pagination">
        <span class="pagination-info">
          <span>{{ $pemesanans->firstItem() }} - {{ $pemesanans->lastItem() }}</span> of {{ $pemesanans->total() }}
        </span>
        <div class="pagination-right">
          <span class="pagination-label">Halaman</span>
          <select class="page-select" onchange="location = this.value;">
            @for ($i = 1; $i <= $pemesanans->lastPage(); $i++)
            <option value="{{ $pemesanans->url($i) }}" {{ $pemesanans->currentPage() == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>
          <a href="{{ $pemesanans->previousPageUrl() ?? '#' }}" class="page-btn {{ $pemesanans->onFirstPage() ? 'disabled' : '' }}">&#8249;</a>
          <a href="{{ $pemesanans->nextPageUrl() ?? '#' }}" class="page-btn {{ $pemesanans->hasMorePages() ? '' : 'disabled' }}">&#8250;</a>
        </div>
      </div>

    </div>
  </main>

</body>

</html>