<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LeLiLu Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --yellow: #F5C518; --yellow-hover: #e0b200;
      --dark: #1E1E1E; --dark2: #2A2A2A;
      --bg: #F0F0F0; --card-bg: #ffffff;
      --text: #1a1a1a; --text-muted: #888;
      --border: #e5e5e5; --radius: 14px;
      --red: #ef4444; --red-hover: #dc2626;
      --blue: #3b82f6;
    }
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: var(--text); display: flex; min-height: 100vh; }

    /* ── SIDEBAR ── */
    .sidebar { width: 240px; min-height: 100vh; background: var(--dark); display: flex; flex-direction: column; padding: 28px 20px; position: fixed; top: 0; left: 0; height: 100%; }
    .logo { font-size: 26px; font-weight: 800; letter-spacing: -0.5px; color: #fff; margin-bottom: 28px; }
    .logo span:nth-child(2) { color: var(--yellow); }
    .profile-card { background: var(--dark2); border: 1.5px solid #3a3a3a; border-radius: var(--radius); display: flex; align-items: center; gap: 12px; padding: 12px 14px; margin-bottom: 32px; }
    .avatar { width: 40px; height: 40px; border-radius: 50%; background: #555; flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
    .profile-info .name { font-size: 14px; font-weight: 700; color: #fff; }
    .profile-info .email { font-size: 11px; color: #aaa; word-break: break-all; }
    .menu-label { font-size: 10px; font-weight: 700; letter-spacing: 1.2px; color: #666; text-transform: uppercase; margin-bottom: 8px; }
    .nav-item { display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: 10px; color: #ccc; font-size: 14px; font-weight: 600; cursor: pointer; transition: background .15s, color .15s; margin-bottom: 2px; text-decoration: none; }
    .nav-item:hover { background: #2e2e2e; color: #fff; }
    .nav-item.active { color: #fff; background: #2e2e2e; }
    .nav-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .nav-section { margin-top: 24px; }

    /* ── MAIN ── */
    .main {  flex: 1; padding: 32px 36px; min-height: 100vh; }

    /* ── STATS ── */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; margin-bottom: 32px; }
    .stat-card { background: var(--card-bg); border-radius: var(--radius); padding: 28px 24px 22px; box-shadow: 0 1px 4px rgba(0,0,0,.06); transition: transform .18s, box-shadow .18s; }
    .stat-card:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,.09); }
    .stat-num { font-size: 42px; font-weight: 800; line-height: 1; margin-bottom: 10px; }
    .stat-label { font-size: 13px; color: var(--text-muted); font-weight: 500; }

    /* ── TABLE CARD ── */
    .table-card { background: var(--card-bg); border-radius: var(--radius); box-shadow: 0 1px 4px rgba(0,0,0,.06); overflow: hidden; }
    .table-header { display: flex; align-items: center; justify-content: space-between; padding: 22px 28px 18px; }
    .table-title { font-size: 18px; font-weight: 800; }
    .btn-yellow { background: var(--yellow); color: #111; font-family: inherit; font-size: 13px; font-weight: 700; border: none; border-radius: 8px; padding: 10px 18px; cursor: pointer; transition: background .15s, transform .12s; }
    .btn-yellow:hover { background: var(--yellow-hover); transform: translateY(-1px); }
    table { width: 100%; border-collapse: collapse; }
    thead tr { background: #f5f5f5; }
    th { font-size: 13px; font-weight: 600; color: var(--text-muted); text-align: left; padding: 13px 20px; }
    th:first-child { padding-left: 28px; }
    th:last-child { padding-right: 28px; text-align: center; }
    tbody tr { border-bottom: 1px solid var(--border); transition: background .12s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #fafafa; }
    td { padding: 16px 20px; font-size: 14px; }
    td:first-child { padding-left: 28px; font-weight: 700; }
    td:last-child { padding-right: 28px; text-align: center; }
    .td-phone { color: #555; }
    .td-testi { color: #444; }

    /* ── ACTION BUTTONS ── */
    .actions { display: flex; align-items: center; justify-content: center; gap: 6px; }
    .btn-icon { width: 32px; height: 32px; border: none; border-radius: 7px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: opacity .15s, transform .12s; }
    .btn-icon:hover { opacity: .82; transform: translateY(-1px); }
    .btn-view   { background: #e0f2fe; color: var(--blue); }
    .btn-edit   { background: #fef9c3; color: #b45309; }
    .btn-delete { background: #fee2e2; color: var(--red); }

    /* ── BADGE ── */
    .badge { display: inline-block; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
    .badge-selesai { background: #dcfce7; color: #16a34a; }
    .badge-pending { background: #fef9c3; color: #a16207; }
    .badge-batal   { background: #fee2e2; color: #dc2626; }

    /* ── PAGINATION ── */
    .pagination { display: flex; align-items: center; justify-content: space-between; padding: 16px 28px; border-top: 1px solid var(--border); }
    .page-info { font-size: 13px; color: var(--text-muted); }
    .page-info strong { color: var(--text); }
    .page-controls { display: flex; align-items: center; gap: 8px; }
    .page-text { font-size: 13px; color: var(--text-muted); margin-right: 4px; }
    .page-select { border: 1.5px solid var(--border); border-radius: 7px; padding: 5px 10px; font-family: inherit; font-size: 13px; font-weight: 600; color: var(--text); background: #fff; cursor: pointer; }
    .page-btn { width: 34px; height: 34px; border: 1.5px solid var(--border); border-radius: 7px; background: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 14px; transition: background .12s; }
    .page-btn:hover:not(:disabled) { background: #f0f0f0; }
    .page-btn:disabled { opacity: .4; cursor: not-allowed; }

    /* ── MODAL OVERLAY ── */
    .overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.45); z-index: 100; align-items: center; justify-content: center; }
    .overlay.open { display: flex; animation: fadeIn .18s ease; }
    @keyframes fadeIn { from { opacity: 0 } to { opacity: 1 } }
    .modal { background: #fff; border-radius: 18px; padding: 32px; width: 100%; max-width: 480px; box-shadow: 0 20px 60px rgba(0,0,0,.18); animation: slideUp .2s ease; position: relative; }
    @keyframes slideUp { from { transform: translateY(20px); opacity: 0 } to { transform: translateY(0); opacity: 1 } }
    .modal-title { font-size: 18px; font-weight: 800; margin-bottom: 22px; }
    .modal-close { position: absolute; top: 20px; right: 20px; width: 30px; height: 30px; border: none; background: #f0f0f0; border-radius: 50%; cursor: pointer; font-size: 15px; display: flex; align-items: center; justify-content: center; transition: background .12s; }
    .modal-close:hover { background: #e0e0e0; }

    /* ── FORM ── */
    .form-group { margin-bottom: 16px; }
    label { display: block; font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .6px; margin-bottom: 6px; }
    .finput, .fselect, .ftextarea { width: 100%; border: 1.5px solid var(--border); border-radius: 9px; padding: 10px 14px; font-family: inherit; font-size: 14px; color: var(--text); transition: border-color .15s; background: #fff; }
    .finput:focus, .fselect:focus, .ftextarea:focus { outline: none; border-color: var(--yellow); }
    .ftextarea { resize: vertical; min-height: 80px; }
    .finput:disabled { background: #f5f5f5; color: #999; cursor: not-allowed; }
    .form-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 24px; }
    .btn-cancel { background: #f0f0f0; color: #555; font-family: inherit; font-size: 13px; font-weight: 700; border: none; border-radius: 8px; padding: 10px 18px; cursor: pointer; }
    .btn-cancel:hover { background: #e0e0e0; }
    .btn-submit { background: var(--yellow); color: #111; font-family: inherit; font-size: 13px; font-weight: 700; border: none; border-radius: 8px; padding: 10px 22px; cursor: pointer; }
    .btn-submit:hover { background: var(--yellow-hover); }
    .btn-danger { background: var(--red); color: #fff; font-family: inherit; font-size: 13px; font-weight: 700; border: none; border-radius: 8px; padding: 10px 22px; cursor: pointer; }
    .btn-danger:hover { background: var(--red-hover); }

    /* ── DETAIL ── */
    .detail-row { display: flex; gap: 14px; margin-bottom: 14px; border-bottom: 1px solid #f0f0f0; padding-bottom: 14px; }
    .detail-row:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
    .detail-key { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .6px; width: 90px; flex-shrink: 0; padding-top: 2px; }
    .detail-val { font-size: 14px; color: var(--text); font-weight: 500; line-height: 1.5; }

    /* ── CONFIRM DELETE ── */
    .confirm-body { text-align: center; }
    .confirm-icon { font-size: 48px; margin-bottom: 12px; }
    .confirm-text { font-size: 14px; color: #666; margin-bottom: 6px; }
    .confirm-id { font-size: 17px; font-weight: 800; color: var(--text); margin-bottom: 10px; }

    /* ── TOAST ── */
    .toast { position: fixed; bottom: 28px; right: 28px; background: #1a1a1a; color: #fff; padding: 12px 20px; border-radius: 10px; font-size: 13px; font-weight: 600; z-index: 200; display: none; align-items: center; gap: 10px; box-shadow: 0 8px 24px rgba(0,0,0,.22); }
    .toast.show { display: flex; animation: slideUp .2s ease; }

    /* ── EMPTY ── */
    .empty-cell { text-align: center; color: var(--text-muted); padding: 40px !important; font-size: 14px; font-weight: 500; }
  </style>
</head>
<body>

<!-- SIDEBAR -->
 @include('layout.sidebar')

<!-- MAIN -->
<main class="main">
  <div class="stats-grid">
    <div class="stat-card"><div class="stat-num" id="statTotal">0</div><div class="stat-label">Total pesanan</div></div>
    <div class="stat-card"><div class="stat-num" id="statSelesai">0</div><div class="stat-label">Total pesanan selesai</div></div>
    <div class="stat-card"><div class="stat-num" id="statPending">0</div><div class="stat-label">Total pesanan pending</div></div>
    <div class="stat-card"><div class="stat-num" id="statBatal">0</div><div class="stat-label">Total pesanan batal</div></div>
  </div>

  <div class="table-card">
    <div class="table-header">
      <span class="table-title">Pesanan Terbaru</span>
      <button class="btn-yellow" onclick="openAdd()">+ Tambahkan ulasan</button>
    </div>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nomor</th>
          <th>Testimoni</th>
          <th>Status</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody id="tableBody"></tbody>
    </table>
    <div class="pagination">
      <span class="page-info" id="pageInfo"></span>
      <div class="page-controls">
        <span class="page-text">Halaman</span>
        <select class="page-select" id="pageSelect" onchange="goToPage(+this.value)"></select>
        <button class="page-btn" id="btnPrev" onclick="prevPage()">&#8592;</button>
        <button class="page-btn" id="btnNext" onclick="nextPage()">&#8594;</button>
      </div>
    </div>
  </div>
</main>

<!-- MODAL FORM (TAMBAH / EDIT) -->
<div class="overlay" id="modalForm">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('modalForm')">&#10005;</button>
    <div class="modal-title" id="formTitle">Tambah Pesanan</div>
    <input type="hidden" id="editIdx"/>
    <input type="hidden" id="fId"/>
    <div class="form-group">
      <label>Nomor HP</label>
      <input class="finput" type="text" id="fNomor" placeholder="cth: 0812******"/>
    </div>
    <div class="form-group">
      <label>Testimoni</label>
      <textarea class="ftextarea" id="fTesti" placeholder="Tulis testimoni pelanggan..."></textarea>
    </div>
    <div class="form-group">
      <label>Status</label>
      <select class="fselect" id="fStatus">
        <option value="selesai">Selesai</option>
        <option value="pending">Pending</option>
        <option value="batal">Batal</option>
      </select>
    </div>
    <div class="form-actions">
      <button class="btn-cancel" onclick="closeModal('modalForm')">Batal</button>
      <button class="btn-submit" onclick="submitForm()">Simpan</button>
    </div>
  </div>
</div>

<!-- MODAL DETAIL -->
<div class="overlay" id="modalDetail">
  <div class="modal">
    <button class="modal-close" onclick="closeModal('modalDetail')">&#10005;</button>
    <div class="modal-title">Detail Pesanan</div>
    <div id="detailContent"></div>
    <div class="form-actions">
      <button class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
    </div>
  </div>
</div>

<!-- MODAL KONFIRMASI HAPUS -->
<div class="overlay" id="modalConfirm">
  <div class="modal" style="max-width:380px">
    <div class="confirm-body">
      <div class="confirm-icon">🗑️</div>
      <div class="modal-title" style="display:flex;justify-content:center">Hapus Pesanan?</div>
      <p class="confirm-text">Pesanan dengan ID</p>
      <div class="confirm-id" id="confirmId"></div>
      <p class="confirm-text">akan dihapus permanen dan tidak bisa dikembalikan.</p>
    </div>
    <div class="form-actions" style="justify-content:center;margin-top:22px">
      <button class="btn-cancel" onclick="closeModal('modalConfirm')">Batal</button>
      <button class="btn-danger" onclick="confirmDelete()">Ya, Hapus</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast">
  <span id="toastIcon"></span>
  <span id="toastMsg"></span>
</div>

<script>
const PER_PAGE = 6;
let page = 1;
let deleteIdx = null;

let data = [
  { id:'sda-77', nomor:'0809******', testi:'Pelayanan sangat baik dan cepat, sangat direkomendasikan!', status:'selesai' },
  { id:'sda-78', nomor:'0812******', testi:'Pengiriman tepat waktu dan produk sesuai pesanan.', status:'selesai' },
  { id:'sda-79', nomor:'0856******', testi:'Masih menunggu konfirmasi dari penjual.', status:'pending' },
  { id:'sda-80', nomor:'0821******', testi:'Produk tidak tersedia, pesanan dibatalkan.', status:'batal' },
  { id:'sda-81', nomor:'0877******', testi:'Pelayanan ramah dan responsif, sangat memuaskan!', status:'selesai' },
  { id:'sda-82', nomor:'0838******', testi:'Pesanan sedang diproses oleh tim kami.', status:'pending' },
  { id:'sda-83', nomor:'0895******', testi:'Barang sudah diterima dengan kondisi baik.', status:'selesai' },
  { id:'sda-84', nomor:'0811******', testi:'Dibatalkan karena stok habis.', status:'batal' },
  { id:'sda-85', nomor:'0822******', testi:'Terlambat sedikit tapi kualitas produk memuaskan.', status:'selesai' },
  { id:'sda-86', nomor:'0899******', testi:'Menunggu proses pembayaran dikonfirmasi.', status:'pending' },
  { id:'sda-87', nomor:'0831******', testi:'Pengiriman cepat sekali, puas banget!', status:'selesai' },
  { id:'sda-88', nomor:'0845******', testi:'Pesanan dibatalkan atas permintaan pelanggan.', status:'batal' },
];

const badgeClass = { selesai:'badge-selesai', pending:'badge-pending', batal:'badge-batal' };
const badgeLabel = { selesai:'Selesai', pending:'Pending', batal:'Batal' };

function render() {
  // Stats
  document.getElementById('statTotal').textContent   = data.length;
  document.getElementById('statSelesai').textContent = data.filter(d=>d.status==='selesai').length;
  document.getElementById('statPending').textContent = data.filter(d=>d.status==='pending').length;
  document.getElementById('statBatal').textContent   = data.filter(d=>d.status==='batal').length;

  // Table
  const tbody = document.getElementById('tableBody');
  const start = (page - 1) * PER_PAGE;
  const slice = data.slice(start, start + PER_PAGE);

  if (!slice.length) {
    tbody.innerHTML = `<tr><td colspan="5" class="empty-cell">📭 Belum ada data pesanan.</td></tr>`;
  } else {
    tbody.innerHTML = slice.map((row, i) => {
      const ri = start + i;
      const short = row.testi.length > 58 ? row.testi.slice(0,58)+'…' : row.testi;
      return `<tr>
        <td>${row.id}</td>
        <td class="td-phone">${row.nomor}</td>
        <td class="td-testi">${short}</td>
        <td><span class="badge ${badgeClass[row.status]}">${badgeLabel[row.status]}</span></td>
        <td>
          <div class="actions">
            <button class="btn-icon btn-view" title="Lihat Detail" onclick="openDetail(${ri})">
              <svg width="14" height="14" fill="none" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/></svg>
            </button>
            <button class="btn-icon btn-edit" title="Edit" onclick="openEdit(${ri})">
              <svg width="14" height="14" fill="none" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
            <button class="btn-icon btn-delete" title="Hapus" onclick="openDelete(${ri})">
              <svg width="14" height="14" fill="none" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M10 11v6M14 11v6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" stroke="currentColor" stroke-width="2"/></svg>
            </button>
          </div>
        </td>
      </tr>`;
    }).join('');
  }

  // Pagination
  const totalPages = Math.max(1, Math.ceil(data.length / PER_PAGE));
  const s = start + 1, e = Math.min(page * PER_PAGE, data.length);
  document.getElementById('pageInfo').innerHTML = `<strong>${data.length ? s : 0}</strong> – ${e} of ${data.length}`;
  const sel = document.getElementById('pageSelect');
  sel.innerHTML = '';
  for (let i = 1; i <= totalPages; i++) {
    sel.innerHTML += `<option value="${i}"${i===page?' selected':''}>${i}</option>`;
  }
  document.getElementById('btnPrev').disabled = page === 1;
  document.getElementById('btnNext').disabled = page === totalPages;
}

function goToPage(p) { page = p; render(); }
function prevPage()  { if (page > 1) { page--; render(); } }
function nextPage()  { if (page < Math.ceil(data.length/PER_PAGE)) { page++; render(); } }

// ── MODAL ──
function openModal(id)  { document.getElementById(id).classList.add('open'); }
function closeModal(id) { document.getElementById(id).classList.remove('open'); }
document.querySelectorAll('.overlay').forEach(ov => ov.addEventListener('click', e => { if(e.target===ov) ov.classList.remove('open'); }));

function generateId() {
  const nums = data.map(d => { const m = d.id.match(/^sda-(\d+)$/); return m ? parseInt(m[1]) : 0; });
  const next = nums.length ? Math.max(...nums) + 1 : 77;
  return 'sda-' + next;
}

// ── CREATE ──
function openAdd() {
  document.getElementById('formTitle').textContent = '+ Tambah Pesanan';
  document.getElementById('editIdx').value = '';
  document.getElementById('fId').value = '';
  document.getElementById('fNomor').value = '';
  document.getElementById('fTesti').value = '';
  document.getElementById('fStatus').value = 'selesai';
  openModal('modalForm');
}

// ── READ ──
function openDetail(idx) {
  const r = data[idx];
  document.getElementById('detailContent').innerHTML = `
    <div class="detail-row"><span class="detail-key">ID</span><span class="detail-val">${r.id}</span></div>
    <div class="detail-row"><span class="detail-key">Nomor</span><span class="detail-val">${r.nomor}</span></div>
    <div class="detail-row"><span class="detail-key">Status</span><span class="detail-val"><span class="badge ${badgeClass[r.status]}">${badgeLabel[r.status]}</span></span></div>
    <div class="detail-row"><span class="detail-key">Testimoni</span><span class="detail-val">${r.testi}</span></div>
  `;
  openModal('modalDetail');
}

// ── UPDATE ──
function openEdit(idx) {
  const r = data[idx];
  document.getElementById('formTitle').textContent = '✏️ Edit Pesanan';
  document.getElementById('editIdx').value = idx;
  document.getElementById('fId').value = r.id;
  document.getElementById('fNomor').value = r.nomor;
  document.getElementById('fTesti').value = r.testi;
  document.getElementById('fStatus').value = r.status;
  openModal('modalForm');
}

function submitForm() {
  const nomor  = document.getElementById('fNomor').value.trim();
  const testi  = document.getElementById('fTesti').value.trim();
  const status = document.getElementById('fStatus').value;
  const idx    = document.getElementById('editIdx').value;

  if (!nomor || !testi) { showToast('⚠️','Semua field wajib diisi!'); return; }

  if (idx === '') {
    const id = generateId();
    data.unshift({ id, nomor, testi, status });
    page = 1;
    showToast('✅','Pesanan berhasil ditambahkan!');
  } else {
    const id = data[+idx].id;
    data[+idx] = { id, nomor, testi, status };
    showToast('✏️','Pesanan berhasil diperbarui!');
  }
  closeModal('modalForm');
  render();
}

// ── DELETE ──
function openDelete(idx) {
  deleteIdx = idx;
  document.getElementById('confirmId').textContent = data[idx].id;
  openModal('modalConfirm');
}
function confirmDelete() {
  const id = data[deleteIdx].id;
  data.splice(deleteIdx, 1);
  deleteIdx = null;
  closeModal('modalConfirm');
  const tp = Math.max(1, Math.ceil(data.length/PER_PAGE));
  if (page > tp) page = tp;
  render();
  showToast('🗑️',`Pesanan ${id} dihapus!`);
}

// ── TOAST ──
let toastTimer;
function showToast(icon, msg) {
  clearTimeout(toastTimer);
  document.getElementById('toastIcon').textContent = icon;
  document.getElementById('toastMsg').textContent  = msg;
  const t = document.getElementById('toast');
  t.classList.add('show');
  toastTimer = setTimeout(()=>t.classList.remove('show'), 2800);
}

render();
</script>
</body>
</html>