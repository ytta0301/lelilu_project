<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LeLiLu - Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --bg-main: #f0efeb;
    --bg-sidebar: #1e1e1e;
    --bg-card: #ffffff;
    --accent: #f5c518;
    --accent-hover: #e0b000;
    --text-primary: #1a1a1a;
    --text-muted: #888;
    --text-sidebar: #e0e0e0;
    --border: #e8e6e0;
    --sidebar-width: 240px;
    --shadow-card: 0 2px 12px rgba(0,0,0,0.06);
    --radius: 16px;
    --radius-sm: 10px;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg-main);
    color: var(--text-primary);
    min-height: 100vh;
    display: flex;
  }

  /* ── SIDEBAR ── */
  .sidebar {
    width: var(--sidebar-width);
    background: var(--bg-sidebar);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    padding: 28px 20px;
    position: fixed;
    top: 0; left: 0; bottom: 0;
    z-index: 10;
  }

  .logo {
    font-size: 26px;
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.5px;
    margin-bottom: 32px;
  }
  .logo span.le { color: #fff; }
  .logo span.li { color: var(--accent); }
  .logo span.lu { color: #fff; }

  .profile-card {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: var(--radius-sm);
    padding: 14px 14px;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 36px;
  }
  .avatar {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: #444;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    color: #ccc;
    flex-shrink: 0;
  }
  .profile-info .name {
    font-size: 13px; font-weight: 700;
    color: #fff;
  }
  .profile-info .email {
    font-size: 10.5px; color: #888;
    white-space: nowrap; overflow: hidden;
    text-overflow: ellipsis; max-width: 140px;
  }

  .nav-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.2px;
    color: #555;
    text-transform: uppercase;
    margin-bottom: 10px;
    margin-top: 4px;
  }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: background 0.18s, color 0.18s;
    margin-bottom: 2px;
    color: var(--text-sidebar);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
  }
  .nav-item:hover { background: rgba(255,255,255,0.08); }
  .nav-item.active { background: rgba(245,197,24,0.15); color: var(--accent); }
  .nav-item .icon { font-size: 16px; width: 20px; text-align: center; }

  .nav-section { margin-top: 20px; }

  /* ── MAIN ── */
  .main {
    flex: 1;
    padding: 36px 36px 48px;
    min-height: 100vh;
  }

  /* ── STAT CARDS ── */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 32px;
  }

  .stat-card {
    background: var(--bg-card);
    border-radius: var(--radius);
    padding: 28px 24px 22px;
    box-shadow: var(--shadow-card);
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(0,0,0,0.10);
  }
  .stat-number {
    font-size: 48px;
    font-weight: 800;
    color: var(--text-primary);
    line-height: 1;
    margin-bottom: 10px;
    letter-spacing: -2px;
  }
  .stat-label {
    font-size: 13px;
    color: var(--text-muted);
    font-weight: 500;
  }

  /* ── PRODUCT TABLE SECTION ── */
  .table-section {
    background: var(--bg-card);
    border-radius: var(--radius);
    box-shadow: var(--shadow-card);
    overflow: hidden;
  }

  .table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 28px 20px;
    border-bottom: 1px solid var(--border);
  }
  .table-title {
    font-size: 18px;
    font-weight: 700;
  }

  .table-controls {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .search-box {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--bg-main);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 9px 14px;
  }
  .search-box input {
    border: none;
    background: transparent;
    outline: none;
    font-family: inherit;
    font-size: 13px;
    color: var(--text-primary);
    width: 200px;
  }
  .search-box input::placeholder { color: #aaa; }
  .search-icon { color: #bbb; font-size: 14px; }

  .btn-add {
    background: var(--accent);
    color: #1a1a1a;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 13px;
    font-weight: 700;
    font-family: inherit;
    cursor: pointer;
    transition: background 0.2s, transform 0.15s;
    white-space: nowrap;
  }
  .btn-add:hover { background: var(--accent-hover); transform: scale(1.02); }

  /* ── TABLE ── */
  table {
    width: 100%;
    border-collapse: collapse;
  }
  thead tr {
    background: #fafaf8;
  }
  th {
    font-size: 12.5px;
    font-weight: 600;
    color: var(--text-muted);
    text-align: left;
    padding: 14px 20px;
    letter-spacing: 0.2px;
    border-bottom: 1px solid var(--border);
  }
  th:first-child { padding-left: 28px; }
  th:last-child { text-align: center; }

  td {
    padding: 16px 20px;
    font-size: 13.5px;
    border-bottom: 1px solid var(--border);
    vertical-align: middle;
  }
  td:first-child { padding-left: 28px; }
  td:last-child { text-align: center; }

  tbody tr:last-child td { border-bottom: none; }
  tbody tr { transition: background 0.15s; }
  tbody tr:hover { background: #fafaf8; }

  .product-id {
    font-family: 'DM Mono', monospace;
    font-size: 13px;
    font-weight: 500;
    color: #555;
  }

  .product-img {
    width: 52px; height: 40px;
    border-radius: 8px;
    overflow: hidden;
    background: linear-gradient(135deg, #ff6b6b, #4ecdc4, #45b7d1, #96e6a1);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
  }

  /* Colorful product Image placeholders */
  .img-1 { background: linear-gradient(135deg, #ff6b6b 0%, #ffd93d 40%, #4ecdc4 80%, #45b7d1 100%); }
  .img-2 { background: linear-gradient(135deg, #667eea 0%, #764ba2 40%, #f093fb 80%, #f5576c 100%); }
  .img-3 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 50%, #43e97b 100%); }
  .img-4 { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
  .img-5 { background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%); }
  .img-6 { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 50%, #ff9a9e 100%); }

  .product-name {
    font-weight: 600;
    font-size: 14px;
  }
  .price {
    font-weight: 600;
    font-size: 14px;
  }
  .sold {
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
    font-size: 14px;
    color: #333;
  }
  .sold-icon { color: #aaa; font-size: 13px; }

  /* Action buttons */
  .action-btns {
    display: flex;
    gap: 6px;
    justify-content: center;
  }
  .btn-action {
    padding: 6px 12px;
    border-radius: 7px;
    border: none;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: opacity 0.15s, transform 0.15s;
  }
  .btn-action:hover { opacity: 0.85; transform: scale(1.04); }
  .btn-edit { background: #eef2ff; color: #4f46e5; }
  .btn-delete { background: #fff1f0; color: #e53e3e; }

  /* ── PAGINATION ── */
  .pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 28px;
    border-top: 1px solid var(--border);
  }
  .page-info {
    font-size: 13px;
    color: var(--text-muted);
  }
  .page-info strong { color: var(--text-primary); }

  .page-controls {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--text-muted);
  }
  .page-select {
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 6px 10px;
    font-family: inherit;
    font-size: 13px;
    background: var(--bg-card);
    cursor: pointer;
    outline: none;
    color: var(--text-primary);
  }
  .page-btn {
    width: 32px; height: 32px;
    border-radius: 8px;
    border: 1px solid var(--border);
    background: var(--bg-card);
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    color: #555;
    transition: background 0.15s;
  }
  .page-btn:hover { background: var(--bg-main); }
  .page-btn:disabled { opacity: 0.4; cursor: default; }

  /* ── MODAL ── */
  .modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    z-index: 100;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(3px);
  }
  .modal-overlay.active { display: flex; }

  .modal {
    background: var(--bg-card);
    border-radius: 20px;
    padding: 32px;
    width: 440px;
    max-width: 95vw;
    box-shadow: 0 24px 60px rgba(0,0,0,0.2);
    animation: modalIn 0.25s ease;
  }
  @keyframes modalIn {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
  }
  .modal-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 24px;
  }
  .form-group { margin-bottom: 16px; }
  .form-label {
    display: block;
    font-size: 12.5px;
    font-weight: 600;
    color: #555;
    margin-bottom: 7px;
  }
  .form-input {
    width: 100%;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    padding: 11px 14px;
    font-family: inherit;
    font-size: 14px;
    outline: none;
    transition: border-color 0.18s;
    color: var(--text-primary);
    background: var(--bg-main);
  }
  .form-input:focus { border-color: var(--accent); }
  .modal-actions {
    display: flex;
    gap: 10px;
    margin-top: 24px;
  }
  .btn-cancel {
    flex: 1;
    padding: 12px;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    background: transparent;
    font-family: inherit;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    color: #555;
    transition: background 0.15s;
  }
  .btn-cancel:hover { background: var(--bg-main); }
  .btn-save {
    flex: 1;
    padding: 12px;
    border: none;
    border-radius: 10px;
    background: var(--accent);
    font-family: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    color: #1a1a1a;
    transition: background 0.15s;
  }
  .btn-save:hover { background: var(--accent-hover); }

  /* Animate rows in */
  @keyframes fadeSlideIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
  }
  tbody tr {
    animation: fadeSlideIn 0.3s ease both;
  }
  tbody tr:nth-child(1) { animation-delay: 0.04s; }
  tbody tr:nth-child(2) { animation-delay: 0.08s; }
  tbody tr:nth-child(3) { animation-delay: 0.12s; }
  tbody tr:nth-child(4) { animation-delay: 0.16s; }
  tbody tr:nth-child(5) { animation-delay: 0.20s; }
  tbody tr:nth-child(6) { animation-delay: 0.24s; }
</style>
</head>
<body>

<!-- SIDEBAR -->
@include('layout.sidebar')

<!-- MAIN CONTENT -->
<main class="main">

  <!-- STATS -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-number">20</div>
      <div class="stat-label">Total pesanan</div>
    </div>
    <div class="stat-card">
      <div class="stat-number">20</div>
      <div class="stat-label">Total pesanan selesai</div>
    </div>
    <div class="stat-card">
      <div class="stat-number">20</div>
      <div class="stat-label">Total pesanan pending</div>
    </div>
    <div class="stat-card">
      <div class="stat-number">20</div>
      <div class="stat-label">Total pesanan batal</div>
    </div>
  </div>

  <!-- TABLE SECTION -->
  <div class="table-section">
    <div class="table-header">
      <div class="table-title">Pesanan Terbaru</div>
      <div class="table-controls">
        <div class="search-box">
          <span class="search-icon">🔍</span>
          <input type="text" placeholder="Cari pesanan?..." id="searchInput" oninput="filterProducts()">
        </div>
        <button class="btn-add" onclick="openModal()">+ Tambah produk</button>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Gambar</th>
          <th>Nama produk</th>
          <th>Harga</th>
          <th>Terjual</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <!-- Rows injected by JS -->
      </tbody>
    </table>

    <div class="pagination">
      <div class="page-info">
        <strong id="pageRange">1 - 6</strong> of <strong id="totalCount">56</strong>
      </div>
      <div class="page-controls">
        <span>The page you're on</span>
        <select class="page-select" id="pageSelect" onchange="goToPage(this.value)">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
        </select>
        <button class="page-btn" onclick="prevPage()" id="prevBtn">←</button>
        <button class="page-btn" onclick="nextPage()" id="nextBtn">→</button>
      </div>
    </div>
  </div>

</main>

<!-- MODAL: Tambah Produk -->
<div class="modal-overlay" id="modalOverlay" onclick="closeModalOutside(event)">
  <div class="modal">
    <div class="modal-title">Tambah Produk Baru</div>
    <div class="form-group">
      <label class="form-label">Nama Produk</label>
      <input type="text" class="form-input" id="inputName" placeholder="Masukkan nama produk">
    </div>
    <div class="form-group">
      <label class="form-label">Harga (Rp)</label>
      <input type="number" class="form-input" id="inputPrice" placeholder="cth: 450000">
    </div>
    <div class="form-group">
      <label class="form-label">Jumlah Terjual</label>
      <input type="number" class="form-input" id="inputSold" placeholder="cth: 19">
    </div>
    <div class="modal-actions">
      <button class="btn-cancel" onclick="closeModal()">Batal</button>
      <button class="btn-save" onclick="saveProduct()">Simpan</button>
    </div>
  </div>
</div>

<script>
  // ── DATA ──
  const imgClasses = ['img-1','img-2','img-3','img-4','img-5','img-6'];
  let products = [
    { id: 'PRD-001', name: 'Social Media Kit', price: 450000, sold: 19, img: 0 },
    { id: 'PRD-002', name: 'Social Media Kit', price: 450000, sold: 124, img: 1 },
    { id: 'PRD-003', name: 'Social Media Kit', price: 450000, sold: 98, img: 2 },
    { id: 'PRD-004', name: 'Social Media Kit', price: 450000, sold: 13, img: 3 },
    { id: 'PRD-005', name: 'Social Media Kit', price: 450000, sold: 19, img: 4 },
    { id: 'PRD-006', name: 'Social Media Kit', price: 450000, sold: 19, img: 5 },
    { id: 'PRD-007', name: 'Landing Page Template', price: 750000, sold: 45, img: 0 },
    { id: 'PRD-008', name: 'Icon Pack Pro', price: 350000, sold: 210, img: 1 },
    { id: 'PRD-009', name: 'Motion Graphics Kit', price: 850000, sold: 33, img: 2 },
    { id: 'PRD-010', name: 'UI Component Library', price: 600000, sold: 87, img: 3 },
    { id: 'PRD-011', name: 'Pitch Deck Template', price: 400000, sold: 62, img: 4 },
    { id: 'PRD-012', name: 'Brand Identity Pack', price: 950000, sold: 28, img: 5 },
  ];

  const ROWS_PER_PAGE = 6;
  let currentPage = 1;
  let filtered = [...products];

  function formatRp(n) {
    return 'Rp ' + n.toLocaleString('id-ID');
  }

  function renderTable() {
    const tbody = document.getElementById('tableBody');
    const start = (currentPage - 1) * ROWS_PER_PAGE;
    const end = start + ROWS_PER_PAGE;
    const page = filtered.slice(start, end);

    tbody.innerHTML = page.map((p, i) => `
      <tr>
        <td><span class="product-id">${p.id}</span></td>
        <td><div class="product-img ${imgClasses[p.img % 6]}"></div></td>
        <td><span class="product-name">${p.name}</span></td>
        <td><span class="price">${formatRp(p.price)}</span></td>
        <td><span class="sold"><span class="sold-icon">🔒</span>${p.sold}</span></td>
        <td>
          <div class="action-btns">
            <button class="btn-action btn-edit" onclick="editProduct(${start + i})">Edit</button>
            <button class="btn-action btn-delete" onclick="deleteProduct(${start + i})">Hapus</button>
          </div>
        </td>
      </tr>
    `).join('');

    // Update pagination info
    const realEnd = Math.min(end, filtered.length);
    document.getElementById('pageRange').textContent = `${start + 1} - ${realEnd}`;
    document.getElementById('totalCount').textContent = filtered.length;

    // Update page select
    const sel = document.getElementById('pageSelect');
    sel.innerHTML = '';
    const totalPages = Math.max(1, Math.ceil(filtered.length / ROWS_PER_PAGE));
    for (let i = 1; i <= totalPages; i++) {
      const opt = document.createElement('option');
      opt.value = i; opt.textContent = i;
      if (i === currentPage) opt.selected = true;
      sel.appendChild(opt);
    }

    document.getElementById('prevBtn').disabled = currentPage === 1;
    document.getElementById('nextBtn').disabled = currentPage >= totalPages;
  }

  function filterProducts() {
    const q = document.getElementById('searchInput').value.toLowerCase();
    filtered = products.filter(p =>
      p.name.toLowerCase().includes(q) || p.id.toLowerCase().includes(q)
    );
    currentPage = 1;
    renderTable();
  }

  function prevPage() {
    if (currentPage > 1) { currentPage--; renderTable(); }
  }
  function nextPage() {
    const total = Math.ceil(filtered.length / ROWS_PER_PAGE);
    if (currentPage < total) { currentPage++; renderTable(); }
  }
  function goToPage(p) {
    currentPage = parseInt(p);
    renderTable();
  }

  // ── MODAL ──
  let editingIndex = null;

  function openModal(idx = null) {
    editingIndex = idx;
    if (idx !== null) {
      const p = products[idx];
      document.getElementById('inputName').value = p.name;
      document.getElementById('inputPrice').value = p.price;
      document.getElementById('inputSold').value = p.sold;
      document.querySelector('.modal-title').textContent = 'Edit Produk';
    } else {
      document.getElementById('inputName').value = '';
      document.getElementById('inputPrice').value = '';
      document.getElementById('inputSold').value = '';
      document.querySelector('.modal-title').textContent = 'Tambah Produk Baru';
    }
    document.getElementById('modalOverlay').classList.add('active');
  }

  function closeModal() {
    document.getElementById('modalOverlay').classList.remove('active');
  }

  function closeModalOutside(e) {
    if (e.target === document.getElementById('modalOverlay')) closeModal();
  }

  function saveProduct() {
    const name = document.getElementById('inputName').value.trim();
    const price = parseInt(document.getElementById('inputPrice').value) || 0;
    const sold = parseInt(document.getElementById('inputSold').value) || 0;
    if (!name) { alert('Nama produk tidak boleh kosong.'); return; }

    if (editingIndex !== null) {
      products[editingIndex] = { ...products[editingIndex], name, price, sold };
    } else {
      const newId = 'PRD-' + String(products.length + 1).padStart(3, '0');
      products.push({ id: newId, name, price, sold, img: products.length % 6 });
    }
    filtered = products;
    filterProducts();
    closeModal();
  }

  function editProduct(idx) {
    openModal(idx);
  }

  function deleteProduct(idx) {
    if (confirm('Hapus produk ini?')) {
      products.splice(idx, 1);
      filtered = [...products];
      filterProducts();
    }
  }

  // ── INIT ──
  renderTable();
</script>
</body>
</html>