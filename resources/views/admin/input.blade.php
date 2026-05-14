<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Pesanan - LeLiLu</title>
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
      display: block;
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
      background: rgba(255,255,255,0.07);
      color: #fff;
    }

    .menu-item.active {
      color: #fff;
      font-weight: 700;
      background: rgba(255,255,255,0.09);
    }

    /* ==============================
       MAIN
    ============================== */
    .main {
      flex: 1;
      padding: 32px 36px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .page-header {
      display: flex;
      align-items: center;
      gap: 18px;
    }

    .page-title {
      font-size: 28px;
      font-weight: 800;
      color: #1a1a1a;
    }

    .title-line {
      flex: 0 0 90px;
      height: 4px;
      background: #f5c518;
      border-radius: 4px;
      margin-top: 4px;
    }

    /* ==============================
       CARD
    ============================== */
    .card {
      background: #fff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 2px 14px rgba(0,0,0,0.06);
    }

    .card-inner {
      display: flex;
      gap: 0;
    }

    /* ==============================
       LEFT PANEL
    ============================== */
    .left-panel {
      flex: 1;
      padding-right: 36px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .customer-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
    }

    .customer-avatar {
      width: 86px;
      height: 86px;
      border-radius: 50%;
      overflow: hidden;
      border: 3px solid #f0d0d8;
      background: #f5e0e4;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .customer-name {
      font-size: 17px;
      font-weight: 700;
      color: #1a1a1a;
      border-bottom: 2px solid #1a1a1a;
      padding-bottom: 3px;
    }

    .customer-phone {
      font-size: 13px;
      color: #666;
    }

    .order-meta {
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .order-meta p {
      font-size: 14px;
      color: #333;
    }

    .order-meta b {
      font-weight: 700;
    }

    .banner-title {
      font-size: 17px;
      font-weight: 800;
      color: #1a1a1a;
      margin-bottom: 10px;
    }

    .banner-title em {
      font-weight: 400;
      font-style: italic;
    }

    .banner-img {
      width: 100%;
      max-width: 350px;
      border-radius: 10px;
      display: block;
      aspect-ratio: 16/9;
      object-fit: cover;
      background: linear-gradient(135deg, #2d6a1f, #7ab648, #c8e85a, #e8a020);
    }

    .detail-label {
      font-size: 14px;
      font-weight: 700;
      color: #1a1a1a;
      margin-bottom: 7px;
    }

    .detail-textarea {
      width: 100%;
      max-width: 420px;
      min-height: 88px;
      border: 1.5px solid #ddd;
      border-radius: 8px;
      padding: 10px 12px;
      font-size: 13px;
      color: #555;
      resize: none;
      background: #fafafa;
      outline: none;
      font-family: inherit;
      line-height: 1.5;
    }

    /* ==============================
       DIVIDER
    ============================== */
    .divider {
      width: 1px;
      background: #e0e0e0;
      margin: 0 36px;
      align-self: stretch;
    }

    /* ==============================
       RIGHT PANEL
    ============================== */
    .right-panel {
      width: 310px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding-top: 0;
      position: relative;
    }

    .field-label {
      display: block;
      font-size: 17px;
      font-weight: 800;
      color: #1a1a1a;
      margin-bottom: 9px;
    }

    .field-input {
      width: 100%;
      border: 1.5px solid #ddd;
      border-radius: 8px;
      padding: 12px 14px;
      font-size: 14px;
      color: #aaa;
      outline: none;
      font-family: inherit;
      background: #fafafa;
      transition: border-color 0.2s;
    }

    .field-input:focus {
      border-color: #f5c518;
      color: #333;
    }

    /* ── Image Upload ── */
    .upload-area {
      width: 100%;
      height: 180px;
      border: 1.5px solid #ddd;
      border-radius: 10px;
      background: #fafafa;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 10px;
      cursor: pointer;
      transition: border-color 0.2s, background 0.2s;
      position: relative;
      overflow: hidden;
    }

    .upload-area:hover {
      border-color: #aaa;
      background: #f3f3f3;
    }

    .upload-area input[type="file"] {
      position: absolute;
      inset: 0;
      opacity: 0;
      cursor: pointer;
      width: 100%;
      height: 100%;
    }

    .upload-plus {
      font-size: 38px;
      color: #bbb;
      line-height: 1;
      font-weight: 300;
    }

    .upload-text {
      font-size: 15px;
      color: #bbb;
      font-weight: 400;
    }

    .upload-preview {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      inset: 0;
      border-radius: 9px;
      display: none;
    }

    /* ── Catatan ── */
    .catatan-textarea {
      width: 100%;
      min-height: 80px;
      border: 1.5px solid #ddd;
      border-radius: 8px;
      padding: 10px 12px;
      font-size: 13px;
      color: #333;
      resize: none;
      background: #fafafa;
      outline: none;
      font-family: inherit;
      transition: border-color 0.2s;
    }

    .catatan-textarea:focus {
      border-color: #f5c518;
    }

    /* ── Status select (styled like badge) ── */
    .status-wrapper {
      position: relative;
      display: inline-block;
    }

    .status-select {
      appearance: none;
      -webkit-appearance: none;
      border: none;
      outline: none;
      padding: 9px 36px 9px 20px;
      font-size: 14px;
      font-weight: 700;
      border-radius: 20px;
      cursor: pointer;
      font-family: inherit;
      background-color: #bfdbfe;
      color: #1d4ed8;
      transition: background 0.2s;
    }

    .status-select.status-pending  { background: #fde68a; color: #92400e; }
    .status-select.status-progress { background: #bfdbfe; color: #1d4ed8; }
    .status-select.status-done     { background: #bbf7d0; color: #15803d; }
    .status-select.status-waiting  { background: #fde68a; color: #92400e; }
    .status-select.status-cancel   { background: #fecaca; color: #991b1b; }

    .status-arrow {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
      color: currentColor;
    }

    /* ── Bottom row ── */
    .bottom-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
    }

    .send-btn {
      background: #f5c518;
      color: #1a1a1a;
      border: none;
      border-radius: 10px;
      padding: 12px 38px;
      font-size: 15px;
      font-weight: 700;
      cursor: pointer;
      font-family: inherit;
      transition: background 0.15s;
    }

    .send-btn:hover {
      background: #e6b800;
    }

    /* ==============================
       BACK BUTTON
    ============================== */
    .back-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 14px;
      color: #555;
      text-decoration: none;
      font-weight: 500;
      cursor: pointer;
    }

    .back-btn:hover {
      color: #1a1a1a;
    }
  </style>
</head>
<body>

  <!-- SIDEBAR -->
 @include('layout.sidebar')

  <!-- MAIN -->
  <main class="main">

    <!-- Page Title -->
    <div class="page-header">
      <h1 class="page-title">Detail Pesanan</h1>
      <div class="title-line"></div>
    </div>

    <!-- Card -->
    <div class="card">
      <div class="card-inner">

        <!-- LEFT PANEL -->
        <div class="left-panel">

          <!-- Customer -->
          <div class="customer-section">
            <div class="customer-avatar">
              <svg viewBox="0 0 86 86" width="86" height="86" xmlns="http://www.w3.org/2000/svg">
                <circle cx="43" cy="43" r="43" fill="#f0d0d8"/>
                <ellipse cx="43" cy="41" rx="15" ry="20" fill="#c0405a" opacity="0.9"/>
                <ellipse cx="30" cy="53" rx="12" ry="7" fill="#a03050" opacity="0.7" transform="rotate(-25 30 53)"/>
                <ellipse cx="56" cy="53" rx="12" ry="7" fill="#a03050" opacity="0.7" transform="rotate(25 56 53)"/>
                <circle cx="43" cy="43" r="43" fill="none" stroke="#c0607a" stroke-width="2"/>
              </svg>
            </div>
            <div class="customer-name">Andi.M</div>
            <div class="customer-phone">1234567897656</div>
          </div>

          <!-- Order Meta -->
          <div class="order-meta">
            <p><b>Nomor Pesanan:</b> #0331292384439</p>
            <p><b>Nama Pelanggan:</b> Andi.M</p>
            <p><b>Tanggal Pesan:</b> 04 Mei 2026</p>
          </div>

          <!-- Banner -->
          <div>
            <h3 class="banner-title">Banner 9:16 || <em>Reference</em></h3>
            <div class="banner-img"></div>
          </div>

          <!-- Detail Pemesanan -->
          <div>
            <p class="detail-label">Detail Pemesanan :</p>
            <textarea class="detail-textarea" readonly>Warna minta Hijau warm dan sedikit ada glow effectnya.. .</textarea>
          </div>

        </div>

        <!-- DIVIDER -->
        <div class="divider"></div>

        <!-- RIGHT PANEL -->
        <div class="right-panel">

          <!-- Nama Pesanan -->
          <div>
            <label class="field-label">Nama Pesanan</label>
            <input class="field-input" type="text" placeholder="Beri nama/label pesanan ini">
          </div>

          <!-- Harga -->
          <div>
            <label class="field-label">Harga</label>
            <input class="field-input" type="text" placeholder="Masukkan harga yang sudah didiskusikan">
          </div>

          <!-- Image Upload -->
          <div>
            <label class="field-label">Image</label>
            <div class="upload-area" id="uploadArea">
              <input type="file" accept="image/*" onchange="previewImage(event)">
              <div class="upload-plus">+</div>
              <div class="upload-text">Upload Here</div>
              <img class="upload-preview" id="uploadPreview" src="" alt="Preview">
            </div>
          </div>

          <!-- Catatan -->
          <div>
            <label class="field-label" style="font-size:15px;">Catatan :</label>
            <textarea class="catatan-textarea" placeholder=""></textarea>
          </div>

          <!-- Status + Send -->
          <div class="bottom-row">
            <div class="status-wrapper">
              <select class="status-select status-progress" id="statusSelect" onchange="updateStatus(this)">
                <option value="pending"  style="background:#fde68a; color:#92400e; font-weight:700;">Pending</option>
                <option value="progress" style="background:#bfdbfe; color:#1d4ed8; font-weight:700;" selected>Progress</option>
                <option value="done"     style="background:#bbf7d0; color:#15803d; font-weight:700;">Done</option>
                <option value="cancel"   style="background:#fecaca; color:#991b1b; font-weight:700;">Cancel</option>
              </select>
              <svg class="status-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="6 9 12 15 18 9"/>
              </svg>
            </div>

            <a href="/admin/pesanan"><button class="send-btn">Save</button></a>
          </div>

        </div>
      </div>
    </div>

    <!-- Back -->
    <a href="/admin/pesanan" class="back-btn">&#8592; Kembali</a>

  </main>

  <script>
    // Preview image after upload
    function previewImage(event) {
      const file = event.target.files[0];
      if (!file) return;
      const preview = document.getElementById('uploadPreview');
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        document.querySelector('.upload-plus').style.display = 'none';
        document.querySelector('.upload-text').style.display = 'none';
      };
      reader.readAsDataURL(file);
    }

    // Change badge color based on selected status
    function updateStatus(select) {
      const classMap = {
        pending:  'status-pending',
        progress: 'status-progress',
        done:     'status-done',
        cancel:   'status-cancel',
      };
      select.className = 'status-select ' + (classMap[select.value] || '');
    }
  </script>

</body>
</html>