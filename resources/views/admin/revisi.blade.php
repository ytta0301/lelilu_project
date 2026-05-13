<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Revisi Pesanan – LeLiLu Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet" />
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --sidebar-bg: #2b2b2b;
    --accent: #f5c518;
    --body-bg: #f0f0ec;
    --card-bg: #ffffff;
    --text-primary: #1a1a1a;
    --text-secondary: #555;
    --text-muted: #888;
    --border: #e0e0e0;
  }

  body {
    font-family: 'Nunito', sans-serif;
    background: var(--body-bg);
    display: flex;
    min-height: 100vh;
    color: var(--text-primary);
  }

  /* ── SIDEBAR ── */
  aside {
    width: 210px;
    min-height: 100vh;
    background: var(--sidebar-bg);
    display: flex;
    flex-direction: column;
    padding-bottom: 2rem;
    flex-shrink: 0;
    position: fixed;
    top: 0; left: 0; bottom: 0;
  }
  .sidebar-logo {
    padding: 1.3rem 1.4rem 0.9rem;
    font-size: 1.65rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.5px;
  }
  .sidebar-logo span { color: var(--accent); }

  .admin-card {
    margin: 0 0.9rem 1.4rem;
    background: #3a3a3a;
    border-radius: 12px;
    padding: 0.7rem 0.9rem;
    display: flex;
    align-items: center;
    gap: 9px;
  }
  .admin-avatar {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: #777;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem; color: #fff; font-weight: 700; flex-shrink: 0;
  }
  .admin-info p { font-size: 0.8rem; font-weight: 700; color: #fff; }
  .admin-info span { font-size: 0.68rem; color: #aaa; }

  .sidebar-section-label {
    font-size: 0.63rem; font-weight: 700;
    letter-spacing: 0.08em; color: #666;
    text-transform: uppercase;
    padding: 0.7rem 1.4rem 0.25rem;
  }
  .sidebar-nav a {
    display: block;
    padding: 0.5rem 1.4rem;
    font-size: 0.86rem; font-weight: 600;
    color: #c8c8c8; text-decoration: none;
    transition: color 0.15s;
  }
  .sidebar-nav a:hover { color: #fff; }
  .sidebar-nav a.active { color: #fff; font-weight: 700; }

  /* ── MAIN ── */
  main {
    margin-left: 210px;
    flex: 1;
    padding: 2rem 2.2rem 3rem;
  }
  .page-title {
    font-size: 1.65rem; font-weight: 800;
    color: var(--text-primary); margin-bottom: 0.25rem;
  }
  .title-underline {
    width: 70px; height: 3px;
    background: var(--accent);
    border-radius: 2px; margin-bottom: 1.6rem;
  }

  /* ── BIG CARD ── */
  .main-card {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 1.8rem 2rem 2rem;
    margin-bottom: 1.5rem;
  }

  /* ── TOP ROW ── */
  .top-row {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    padding-bottom: 1.4rem;
    border-bottom: 1px solid var(--border);
    margin-bottom: 1.5rem;
  }
  .customer-col {
    display: flex; flex-direction: column; align-items: center;
    min-width: 110px;
    gap: 6px;
  }
  .customer-avatar-big {
    width: 72px; height: 72px; border-radius: 50%;
    background: linear-gradient(135deg, #c94060, #a02040);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.8rem; color: #fff; font-weight: 800;
  }
  .customer-name {
    font-size: 0.95rem; font-weight: 700;
    border-bottom: 2px solid var(--text-primary);
    padding-bottom: 2px;
  }
  .customer-phone { font-size: 0.78rem; color: var(--text-secondary); }

  /* status badge */
  .badge {
    display: inline-block;
    padding: 0.3rem 1.1rem;
    border-radius: 8px;
    font-size: 0.85rem; font-weight: 700;
    cursor: pointer;
    margin-top: 2px;
  }
  .badge-done { background: #b8f0c8; color: #156f3a; }
  .badge-pending  { background: #fff3e0; color: #b35c00; }
  .badge-progress { background: #e3f0ff; color: #1256a3; }
  .badge-revision { background: #fdecea; color: #a32020; }

  /* banner images */
  .banners-col {
    display: flex; flex-direction: column; gap: 6px; flex: 1;
  }
  .banner-label {
    font-size: 0.95rem; font-weight: 800;
  }
  .banner-label em { font-style: italic; font-weight: 700; color: #555; }
  .banner-date { font-size: 0.78rem; color: var(--text-secondary); }
  .banner-date strong { font-style: italic; }

  .banners-row { display: flex; gap: 10px; }
  .banner-thumb {
    height: 130px; border-radius: 10px; overflow: hidden;
    background: #1e4d20; flex-shrink: 0;
  }
  .banner-thumb.ref  { width: 220px; }
  .banner-thumb.result { width: 240px; }
  .banner-thumb img  { width: 100%; height: 100%; object-fit: cover; display: block; }

  /* placeholder banners */
  .banner-placeholder-green {
    width: 100%; height: 100%;
    background: linear-gradient(120deg, #1e4d20 0%, #2d7a30 50%, #1a3a1c 100%);
    display: flex; align-items: center; justify-content: center;
    position: relative; overflow: hidden;
  }
  .banner-placeholder-green .main-word {
    font-size: 2rem; font-weight: 900; color: #f5c518;
    font-style: italic; letter-spacing: -1px;
    text-shadow: 2px 2px 0 #a07000;
    position: relative; z-index: 2;
  }
  .banner-placeholder-green .badge-8th {
    position: absolute; top: 6px; left: 8px;
    font-size: 0.55rem; font-weight: 800; color: rgba(255,255,255,0.6);
    letter-spacing: 0.05em;
  }

  .banner-placeholder-summer {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, #0da7d6 0%, #f7a500 60%, #e84040 100%);
    display: flex; align-items: center; justify-content: center;
    position: relative; overflow: hidden;
  }
  .banner-placeholder-summer .sum-text {
    font-size: 1.6rem; font-weight: 900; color: #fff;
    text-shadow: 2px 2px 0 rgba(0,0,0,0.3);
    line-height: 1; text-align: center; z-index: 2; position: relative;
  }
  .banner-placeholder-summer .splash {
    font-size: 0.85rem; font-style: italic; color: rgba(255,255,255,0.85);
    display: block;
  }

  /* ── MIDDLE ROW ── */
  .middle-row {
    display: flex;
    gap: 1.5rem;
    align-items: flex-start;
  }

  /* left: order info + payment */
  .left-col { flex: 1; }

  .order-nums {
    display: flex; gap: 3rem;
    margin-bottom: 1.3rem;
  }
  .order-nums .num-group p:first-child {
    font-size: 0.82rem; font-weight: 700; color: var(--text-primary);
    margin-bottom: 2px;
  }
  .order-nums .num-group p:last-child {
    font-size: 0.82rem; color: var(--text-secondary);
  }

  /* payment box */
  .payment-box {
    background: #f2f2ee;
    border-radius: 12px;
    padding: 1.2rem 1.4rem;
    margin-bottom: 1.3rem;
  }
  .payment-box h3 {
    font-size: 0.95rem; font-weight: 800;
    margin-bottom: 0.9rem;
  }
  .payment-row {
    display: flex; justify-content: space-between;
    font-size: 0.83rem; color: var(--text-secondary);
    margin-bottom: 0.45rem;
  }
  .payment-divider {
    border: none; border-top: 1px solid #ccc;
    margin: 0.75rem 0;
  }
  .payment-total {
    display: flex; justify-content: space-between;
    font-size: 0.88rem; font-weight: 800; color: var(--text-primary);
  }
  .customer-details p {
    font-size: 0.84rem; margin-bottom: 0.3rem; color: var(--text-secondary);
  }
  .customer-details p strong { color: var(--text-primary); }
  .customer-details p em { font-style: italic; }

  /* right: upload + notes + revisi btn */
  .right-col { width: 360px; flex-shrink: 0; }

  .upload-box {
    width: 100%; border: 1.5px dashed #ccc;
    border-radius: 10px; height: 185px;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    gap: 8px; cursor: pointer; background: #fafafa;
    margin-bottom: 1rem;
    transition: border-color 0.2s, background 0.2s;
    position: relative; overflow: hidden;
  }
  .upload-box:hover { border-color: #999; background: #f4f4f4; }
  .upload-box input[type="file"] { display: none; }
  .upload-box .plus-icon { font-size: 2.2rem; color: #bbb; line-height: 1; }
  .upload-box .upload-label { font-size: 0.88rem; color: #aaa; font-weight: 600; }
  #uploadPreview {
    display: none; position: absolute; inset: 0;
    width: 100%; height: 100%; object-fit: cover; border-radius: 9px;
  }

  .catatan-label {
    font-size: 0.9rem; font-weight: 800; margin-bottom: 0.4rem;
  }
  .catatan-textarea {
    width: 100%; border: 1.5px solid var(--border);
    border-radius: 8px; padding: 0.65rem 0.9rem;
    font-family: 'Nunito', sans-serif; font-size: 0.83rem;
    color: var(--text-primary); resize: vertical;
    min-height: 80px; background: #fff; margin-bottom: 1.1rem;
    outline: none; transition: border-color 0.2s;
  }
  .catatan-textarea:focus { border-color: #888; }

  .btn-revisi {
    width: 100%; padding: 0.65rem;
    background: var(--accent); color: #1a1a1a;
    font-family: 'Nunito', sans-serif;
    font-size: 0.95rem; font-weight: 800;
    border: none; border-radius: 10px;
    cursor: pointer; transition: background 0.2s, transform 0.1s;
  }
  .btn-revisi:hover { background: #e0b200; }
  .btn-revisi:active { transform: scale(0.98); }

  /* ── DETAIL REVISI ── */
  .detail-revisi { margin-top: 1.8rem; }
  .detail-revisi h3 {
    font-size: 1rem; font-weight: 800; margin-bottom: 0.7rem;
  }
  .revisi-textarea {
    width: 100%; max-width: 640px;
    border: 1.5px solid var(--border);
    border-radius: 8px; padding: 0.8rem 1rem;
    font-family: 'Nunito', sans-serif; font-size: 0.85rem;
    color: var(--text-primary); resize: vertical;
    min-height: 130px; background: #fff;
    outline: none; transition: border-color 0.2s;
  }
  .revisi-textarea:focus { border-color: #888; }

  /* ── BACK ── */
  .back-link {
    display: inline-flex; align-items: center; gap: 6px;
    margin-top: 1.2rem; font-size: 0.88rem; font-weight: 700;
    color: var(--text-secondary); text-decoration: none;
    transition: color 0.15s;
  }
  .back-link:hover { color: var(--text-primary); }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside>
  <div class="sidebar-logo">Le<span>Li</span>Lu</div>
  <div class="admin-card">
    <div class="admin-avatar">A</div>
    <div class="admin-info">
      <p>Admin LeLiLu</p>
      <span>admin@gmail.com</span>
    </div>
  </div>
  <div class="sidebar-section-label">Menu Utama</div>
  <nav class="sidebar-nav">
    <a href="#">Dasboard</a>
    <a href="#" class="active">Pesanan</a>
  </nav>
  <div class="sidebar-section-label">Sistem</div>
  <nav class="sidebar-nav">
    <a href="#">Pengaturan</a>
    <a href="#">Log out</a>
  </nav>
</aside>

<!-- MAIN -->
<main>
  <h1 class="page-title">Revisi Pesanan</h1>
  <div class="title-underline"></div>

  <div class="main-card">

    <!-- TOP ROW -->
    <div class="top-row">

      <!-- Customer -->
      <div class="customer-col">
        <div class="customer-avatar-big">A</div>
        <div class="customer-name">Andi.M</div>
        <div class="customer-phone">1234567897656</div>
        <!-- Status Dropdown -->
        <div style="position:relative; margin-top:4px;">
          <span class="badge badge-done" id="statusBadge" onclick="toggleStatusDropdown()">Done ▾</span>
          <ul id="statusDropdown" style="display:none; position:absolute; top:calc(100% + 4px); left:0; background:#fff; border:1px solid #ddd; border-radius:10px; box-shadow:0 6px 20px rgba(0,0,0,0.13); z-index:100; min-width:140px; padding:5px; list-style:none;">
            <li onclick="selectStatus('Pending','badge-pending')"    style="padding:0.5rem 0.9rem; border-radius:7px; cursor:pointer; font-size:0.85rem; font-weight:700; background:#fff3e0; color:#b35c00; margin-bottom:3px;">Pending</li>
            <li onclick="selectStatus('In Progress','badge-progress')" style="padding:0.5rem 0.9rem; border-radius:7px; cursor:pointer; font-size:0.85rem; font-weight:700; background:#e3f0ff; color:#1256a3; margin-bottom:3px;">In Progress</li>
            <li onclick="selectStatus('Revision','badge-revision')"  style="padding:0.5rem 0.9rem; border-radius:7px; cursor:pointer; font-size:0.85rem; font-weight:700; background:#fdecea; color:#a32020; margin-bottom:3px;">Revision</li>
            <li onclick="selectStatus('Done','badge-done')"          style="padding:0.5rem 0.9rem; border-radius:7px; cursor:pointer; font-size:0.85rem; font-weight:700; background:#b8f0c8; color:#156f3a;">Done</li>
          </ul>
        </div>
      </div>

      <!-- Banners -->
      <div class="banners-col">
        <div class="banners-row">
          <div class="banner-thumb ref">
            <div class="banner-placeholder-green">
              <span class="badge-8th">8TH</span>
              <span class="main-word">kritika</span>
            </div>
          </div>
          <div style="display:flex; flex-direction:column; justify-content:flex-end; gap:4px;">
            <div class="banner-label">Banner 9:16 || <em>Reference</em></div>
            <div class="banner-date"><strong>Tanggal Selesai:</strong> 18:34, 05/05/2026</div>
          </div>
          <div class="banner-thumb result" style="margin-left:auto;">
            <div class="banner-placeholder-summer">
              <div class="sum-text">SUM<br>MER<span class="splash">Splash</span></div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- end top-row -->

    <!-- MIDDLE ROW -->
    <div class="middle-row">

      <!-- LEFT -->
      <div class="left-col">
        <div class="order-nums">
          <div class="num-group">
            <p>Nomor Pesanan</p>
            <p>#0331292384439</p>
          </div>
          <div class="num-group">
            <p>Tanggal Transaksi</p>
            <p>04 Mei 2026</p>
          </div>
        </div>

        <div class="payment-box">
          <h3>Rincian Pembayaran</h3>
          <div class="payment-row"><span>Nomor Transaksi</span><span>000000001</span></div>
          <div class="payment-row"><span>Total Pesanan</span><span>Rp.698.000</span></div>
          <div class="payment-row"><span>Biaya Admin</span><span>Rp.698.000</span></div>
          <hr class="payment-divider" />
          <div class="payment-total"><span>Total  Pembayaran</span><span>Rp.6677.000</span></div>
        </div>

        <div class="customer-details">
          <p><strong>Nama Pelanggan:</strong> Andi.M</p>
          <p><strong>Email:</strong> Andikal2m@gmail.com</p>
          <p><strong>Tanggal Pesan:</strong> 04 Mei 2026</p>
          <p><strong><em>Tanggal Selesai:</em></strong> <em>18:34, 05/05/2026</em></p>
        </div>

        <div class="detail-revisi">
          <h3>Detail Revisi Pemesanan :</h3>
          <textarea class="revisi-textarea" readonly>Saya ingin revisi bagian atasnya sedikit</textarea>
        </div>
      </div>

      <!-- RIGHT -->
      <div class="right-col">
        <label class="upload-box" id="uploadLabel">
          <input type="file" accept="image/*" id="fileInput" />
          <div class="plus-icon" id="uploadPlusIcon">+</div>
          <div class="upload-label" id="uploadLabelText">Upload Here</div>
          <img id="uploadPreview" alt="Preview" />
        </label>

        <div class="catatan-label">Catatan :</div>
        <textarea class="catatan-textarea" placeholder="Tulis catatan di sini..."></textarea>

        <button class="btn-revisi" onclick="handleRevisi()">Revisi</button>
      </div>

    </div>
    <!-- end middle-row -->

  </div>
  <!-- end main-card -->

  <a href="#" class="back-link">← Kembali</a>
</main>

<script>
  /* upload preview */
  document.getElementById('fileInput').addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
      const prev = document.getElementById('uploadPreview');
      prev.src = e.target.result;
      prev.style.display = 'block';
      document.getElementById('uploadPlusIcon').style.display = 'none';
      document.getElementById('uploadLabelText').style.display = 'none';
    };
    reader.readAsDataURL(file);
  });

  /* revisi button */
  function handleRevisi() {
    const btn = document.querySelector('.btn-revisi');
    btn.textContent = 'Revisi Dikirim ✓';
    btn.style.background = '#4caf50';
    btn.style.color = '#fff';
    setTimeout(() => {
      btn.textContent = 'Revisi';
      btn.style.background = '';
      btn.style.color = '';
    }, 2000);
  }

  /* status badge dropdown */
  function toggleStatusDropdown() {
    const dd = document.getElementById('statusDropdown');
    dd.style.display = dd.style.display === 'none' ? 'block' : 'none';
  }

  const badgeClasses = ['badge-done','badge-pending','badge-progress','badge-revision'];
  function selectStatus(label, cls) {
    const badge = document.getElementById('statusBadge');
    badge.textContent = label + ' ▾';
    badgeClasses.forEach(c => badge.classList.remove(c));
    badge.classList.add(cls);
    document.getElementById('statusDropdown').style.display = 'none';
  }

  document.addEventListener('click', e => {
    const wrapper = document.getElementById('statusBadge').parentElement;
    if (!wrapper.contains(e.target)) {
      document.getElementById('statusDropdown').style.display = 'none';
    }
  });
</script>
</body>
</html>