<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Detail Pesanan – LeLiLu Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet" />
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --sidebar-bg: #2b2b2b;
    --sidebar-text: #c8c8c8;
    --sidebar-active: #ffffff;
    --accent: #f5c518;
    --accent-hover: #e0b200;
    --body-bg: #f0f0ec;
    --card-bg: #ffffff;
    --text-primary: #1a1a1a;
    --text-secondary: #555;
    --text-muted: #888;
    --border: #e0e0e0;
    --btn-progress-bg: #a8d8f0;
    --btn-progress-text: #1a5f7a;
    --upload-border: #ccc;
    --upload-text: #aaa;
    --divider: #d0d0d0;
  }

  body {
    font-family: 'Nunito', sans-serif;
    background: var(--body-bg);
    display: flex;
    min-height: 100vh;
    color: var(--text-primary);
  }

  /* ───── SIDEBAR ───── */
  aside {
    width: 220px;
    min-height: 100vh;
    background: var(--sidebar-bg);
    display: flex;
    flex-direction: column;
    padding: 0 0 2rem;
    flex-shrink: 0;
    position: fixed;
    top: 0; left: 0; bottom: 0;
  }

  .sidebar-logo {
    padding: 1.4rem 1.5rem 1rem;
    font-size: 1.7rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.5px;
  }
  .sidebar-logo span { color: var(--accent); }

  .admin-card {
    margin: 0 1rem 1.5rem;
    background: #3a3a3a;
    border-radius: 12px;
    padding: 0.75rem 1rem;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .admin-avatar {
    width: 42px; height: 42px;
    border-radius: 50%;
    background: #777;
    overflow: hidden;
    flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem;
    color: #fff;
    font-weight: 700;
  }
  .admin-info p { font-size: 0.82rem; font-weight: 700; color: #fff; }
  .admin-info span { font-size: 0.7rem; color: #aaa; }

  .sidebar-section-label {
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    color: #666;
    text-transform: uppercase;
    padding: 0.8rem 1.5rem 0.3rem;
  }

  .sidebar-nav a {
    display: block;
    padding: 0.55rem 1.5rem;
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--sidebar-text);
    text-decoration: none;
    border-radius: 0;
    transition: color 0.15s;
  }
  .sidebar-nav a:hover { color: #fff; }
  .sidebar-nav a.active { color: var(--sidebar-active); font-weight: 700; }

  /* ───── MAIN ───── */
  main {
    margin-left: 220px;
    flex: 1;
    padding: 2rem 2.5rem 3rem;
    min-height: 100vh;
  }

  .page-title {
    font-size: 1.7rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.3rem;
  }
  .title-underline {
    width: 72px; height: 3px;
    background: var(--accent);
    border-radius: 2px;
    margin-bottom: 1.8rem;
  }

  /* ───── CARD ───── */
  .order-card {
    background: var(--card-bg);
    border-radius: 16px;
    overflow: hidden;
    display: flex;
    min-height: 560px;
  }

  /* LEFT PANEL */
  .panel-left {
    flex: 1;
    padding: 2rem 2rem 1.5rem;
    border-right: 1.5px solid var(--divider);
  }

  .customer-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1.8rem;
  }
  .customer-avatar {
    width: 80px; height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #c94060 0%, #a02040 100%);
    display: flex; align-items: center; justify-content: center;
    font-size: 2rem;
    color: #fff;
    font-weight: 800;
    margin-bottom: 0.8rem;
    position: relative;
    overflow: hidden;
  }
  .customer-avatar::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 35% 30%, rgba(255,255,255,0.25) 0%, transparent 60%);
  }
  .customer-name {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--text-primary);
    border-bottom: 2px solid var(--text-primary);
    padding-bottom: 2px;
    margin-bottom: 4px;
  }
  .customer-phone {
    font-size: 0.85rem;
    color: var(--text-secondary);
  }

  .order-meta { margin-bottom: 1.5rem; }
  .order-meta p { font-size: 0.88rem; margin-bottom: 0.3rem; color: var(--text-secondary); }
  .order-meta p strong { color: var(--text-primary); }

  .order-item-title {
    font-size: 1rem;
    font-weight: 800;
    margin-bottom: 0.75rem;
    color: var(--text-primary);
  }
  .order-item-title em { font-style: italic; font-weight: 700; color: #555; }

  .reference-img {
    width: 100%;
    max-width: 340px;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 1.2rem;
    background: #2a2a1a;
    display: flex; align-items: center; justify-content: center;
    aspect-ratio: 16/9;
    font-size: 0.75rem;
    color: #888;
    border: 1px solid var(--border);
  }
  .reference-img img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
  }

  /* Placeholder banner */
  .banner-placeholder {
    width: 100%;
    max-width: 340px;
    aspect-ratio: 16/9;
    border-radius: 10px;
    background: linear-gradient(120deg, #1e4d20 0%, #2d7a30 40%, #3da545 60%, #1a3a1c 100%);
    position: relative;
    overflow: hidden;
    margin-bottom: 1.2rem;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .banner-placeholder .banner-text {
    position: relative;
    z-index: 2;
    text-align: center;
  }
  .banner-placeholder .banner-text .top-label {
    font-size: 0.55rem;
    font-weight: 700;
    color: rgba(255,255,255,0.7);
    letter-spacing: 0.1em;
    text-transform: uppercase;
  }
  .banner-placeholder .banner-text .main-word {
    font-size: 2.2rem;
    font-weight: 900;
    color: #f5c518;
    line-height: 1;
    text-shadow: 2px 2px 0 #a07000, 0 0 20px rgba(245,197,24,0.5);
    font-style: italic;
    letter-spacing: -1px;
  }
  .banner-placeholder .banner-text .sub-label {
    font-size: 0.55rem;
    font-weight: 700;
    color: rgba(255,255,255,0.6);
    letter-spacing: 0.15em;
    text-transform: uppercase;
  }
  .banner-placeholder::before {
    content: '';
    position: absolute;
    top: -20%; left: -10%;
    width: 60%; height: 140%;
    background: rgba(255,220,50,0.06);
    border-radius: 50%;
    filter: blur(20px);
  }
  .banner-placeholder::after {
    content: '8TH';
    position: absolute;
    top: 8px; right: 10px;
    font-size: 0.65rem;
    font-weight: 800;
    color: rgba(255,255,255,0.6);
    letter-spacing: 0.05em;
  }

  .detail-label {
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.4rem;
  }
  .detail-note-box {
    width: 100%;
    max-width: 340px;
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 0.7rem 0.9rem;
    font-size: 0.83rem;
    color: var(--text-secondary);
    line-height: 1.5;
    background: #fafafa;
    min-height: 64px;
  }

  /* RIGHT PANEL */
  .panel-right {
    width: 400px;
    padding: 2rem 2rem 1.5rem;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
  }

  .right-section-label {
    font-size: 1rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.7rem;
  }

  .upload-box {
    width: 100%;
    border: 1.5px dashed var(--upload-border);
    border-radius: 10px;
    height: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
    margin-bottom: 1.4rem;
    transition: border-color 0.2s, background 0.2s;
    background: #fafafa;
  }
  .upload-box:hover { border-color: #999; background: #f4f4f4; }
  .upload-box .plus-icon {
    font-size: 2.5rem;
    color: var(--upload-text);
    font-weight: 300;
    line-height: 1;
  }
  .upload-box .upload-label {
    font-size: 0.9rem;
    color: var(--upload-text);
    font-weight: 600;
  }
  .upload-box input[type="file"] { display: none; }

  .catatan-label {
    font-size: 0.95rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
  }
  .catatan-textarea {
    width: 100%;
    border: 1.5px solid var(--border);
    border-radius: 8px;
    padding: 0.7rem 0.9rem;
    font-family: 'Nunito', sans-serif;
    font-size: 0.85rem;
    color: var(--text-primary);
    resize: vertical;
    min-height: 90px;
    background: #fff;
    margin-bottom: 1.2rem;
    outline: none;
    transition: border-color 0.2s;
  }
  .catatan-textarea:focus { border-color: #888; }

  .progress-wrapper {
    position: relative;
    align-self: flex-start;
    margin-bottom: 1.5rem;
  }
  .btn-progress {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 0.55rem 1.1rem 0.55rem 1.4rem;
    background: var(--btn-progress-bg);
    color: var(--btn-progress-text);
    font-family: 'Nunito', sans-serif;
    font-size: 0.9rem;
    font-weight: 700;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.2s;
    user-select: none;
  }
  .btn-progress:hover { background: #8ac8e0; }
  .btn-progress .chevron {
    font-size: 0.7rem;
    transition: transform 0.2s;
  }
  .btn-progress.open .chevron { transform: rotate(180deg); }

  .progress-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.13);
    z-index: 100;
    min-width: 170px;
    overflow: hidden;
    padding: 5px;
  }
  .progress-dropdown.open { display: block; }
  .progress-dropdown li {
    list-style: none;
    padding: 0.55rem 1rem;
    font-size: 0.88rem;
    font-weight: 700;
    cursor: pointer;
    border-radius: 7px;
    margin-bottom: 3px;
    transition: opacity 0.15s, transform 0.1s;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .progress-dropdown li:last-child { margin-bottom: 0; }
  .progress-dropdown li:hover { opacity: 0.85; transform: scale(0.98); }

  .li-pending  { background: #fff3e0; color: #b35c00; }
  .li-progress { background: #e3f0ff; color: #1256a3; }
  .li-revision { background: #fdecea; color: #a32020; }
  .li-done     { background: #e6f9ee; color: #156f3a; }

  .progress-dropdown li .dot {
    width: 9px; height: 9px;
    border-radius: 50%;
    flex-shrink: 0;
  }
  .dot-pending   { background: #f5a623; }
  .dot-progress  { background: #3a7bd5; }
  .dot-revision  { background: #e74c3c; }
  .dot-done      { background: #22a85a; }

  .panel-right-footer {
    margin-top: auto;
    display: flex;
    justify-content: flex-end;
  }

  .btn-send {
    padding: 0.6rem 2rem;
    background: var(--accent);
    color: #1a1a1a;
    font-family: 'Nunito', sans-serif;
    font-size: 0.95rem;
    font-weight: 800;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
  }
  .btn-send:hover { background: var(--accent-hover); }
  .btn-send:active { transform: scale(0.97); }

  /* BACK */
  .back-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 1.5rem;
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.15s;
  }
  .back-link:hover { color: var(--text-primary); }
  .back-link .arrow { font-size: 1.1rem; }
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
  <h1 class="page-title">Detail Pesanan</h1>
  <div class="title-underline"></div>

  <div class="order-card">

    <!-- LEFT PANEL -->
    <div class="panel-left">
      <div class="customer-info">
        <div class="customer-avatar">A</div>
        <div class="customer-name">Andi.M</div>
        <div class="customer-phone">1234567897656</div>
      </div>

      <div class="order-meta">
        <p><strong>Nomor Pesanan:</strong> #0331292384439</p>
        <p><strong>Nama Pelanggan:</strong> Andi.M</p>
        <p><strong>Tanggal Pesan:</strong> 04 Mei 2026</p>
      </div>

      <div class="order-item-title">Banner 9:16 || <em>Reference</em></div>

      <!-- Banner Placeholder (mimics the reference image) -->
      <div class="banner-placeholder">
        <div class="banner-text">
          <div class="top-label"></div>
          <div class="main-word">kritika</div>
          <div class="sub-label">VOUGE</div>
        </div>
      </div>

      <div class="detail-label">Detail Pemesanan :</div>
      <div class="detail-note-box">
        Warna minta Hijau warm dan sedikit ada glow effectnya..
      </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="panel-right">
      <div class="right-section-label">Image</div>

      <label class="upload-box" id="uploadLabel">
        <input type="file" accept="image/*" id="fileInput" />
        <div class="plus-icon" id="uploadPlusIcon">+</div>
        <div class="upload-label" id="uploadLabelText">Upload Here</div>
        <img id="uploadPreview" style="display:none; width:100%; height:100%; object-fit:cover; border-radius:9px;" alt="Preview" />
      </label>

      <div class="catatan-label">Catatan :</div>
      <textarea class="catatan-textarea" placeholder="Tulis catatan di sini..."></textarea>

      <div class="progress-wrapper">
        <button class="btn-progress" id="progressBtn" onclick="toggleProgress()">
          <span id="progressLabel">Progress</span>
          <span class="chevron">▼</span>
        </button>
        <ul class="progress-dropdown" id="progressDropdown">
          <li class="li-pending"  onclick="selectProgress('Pending',     'dot-pending',  '#fff3e0', '#b35c00')"><span class="dot dot-pending"></span> Pending</li>
          <li class="li-progress" onclick="selectProgress('In Progress',  'dot-progress', '#e3f0ff', '#1256a3')"><span class="dot dot-progress"></span> In Progress</li>
          <li class="li-revision" onclick="selectProgress('Revision',     'dot-revision', '#fdecea', '#a32020')"><span class="dot dot-revision"></span> Revision</li>
          <li class="li-done"     onclick="selectProgress('Done',         'dot-done',     '#e6f9ee', '#156f3a')"><span class="dot dot-done"></span> Done</li>
        </ul>
      </div>

      <div class="panel-right-footer">
        <button class="btn-send" onclick="handleSend()">Send</button>
      </div>
    </div>

  </div>

  <a href="#" class="back-link">
    <span class="arrow">←</span> Kembali
  </a>
</main>

<script>
  const fileInput = document.getElementById('fileInput');
  const uploadPreview = document.getElementById('uploadPreview');
  const uploadPlusIcon = document.getElementById('uploadPlusIcon');
  const uploadLabelText = document.getElementById('uploadLabelText');

  fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (e) => {
      uploadPreview.src = e.target.result;
      uploadPreview.style.display = 'block';
      uploadPlusIcon.style.display = 'none';
      uploadLabelText.style.display = 'none';
    };
    reader.readAsDataURL(file);
  });

  function toggleProgress() {
    const btn = document.getElementById('progressBtn');
    const dropdown = document.getElementById('progressDropdown');
    btn.classList.toggle('open');
    dropdown.classList.toggle('open');
  }

  function selectProgress(label, dotClass, bg, color) {
    const btn = document.getElementById('progressBtn');
    const lbl = document.getElementById('progressLabel');
    const dot = btn.querySelector('.dot');
    lbl.textContent = label;
    btn.style.background = bg;
    btn.style.color = color;
    if (!dot) {
      const d = document.createElement('span');
      d.className = 'dot ' + dotClass;
      btn.insertBefore(d, lbl);
    } else {
      dot.className = 'dot ' + dotClass;
    }
    btn.classList.remove('open');
    document.getElementById('progressDropdown').classList.remove('open');
  }

  document.addEventListener('click', function(e) {
    const wrapper = document.querySelector('.progress-wrapper');
    if (!wrapper.contains(e.target)) {
      document.getElementById('progressBtn').classList.remove('open');
      document.getElementById('progressDropdown').classList.remove('open');
    }
  });

  function handleSend() {
    const btn = document.querySelector('.btn-send');
    btn.textContent = 'Terkirim ✓';
    btn.style.background = '#4caf50';
    btn.style.color = '#fff';
    setTimeout(() => {
      btn.textContent = 'Send';
      btn.style.background = '';
      btn.style.color = '';
    }, 2000);
  }
</script>
</body>
</html>