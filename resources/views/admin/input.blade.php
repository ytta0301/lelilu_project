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
      overflow-x: hidden;
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
      background: #3d3d3d;
      border-radius: 12px;
      margin: 0 14px 20px;
      padding: 10px 12px;
    }

    .worker-avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: #555;
      overflow: hidden;
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .worker-avatar svg {
      display: block;
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
      padding: 14px 24px 6px;
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
      background: rgba(255, 255, 255, 0.07);
      color: #fff;
    }

    .menu-item.active {
      color: #fff;
      font-weight: 700;
      background: rgba(255, 255, 255, 0.09);
    }

    /* ==============================
       MAIN CONTENT
    ============================== */
    .main {
      flex: 1;
      padding: 36px 40px;
      display: flex;
      flex-direction: column;
      gap: 22px;
      overflow: auto;
    }

    .page-title {
      font-size: 30px;
      font-weight: 800;
      color: #1a1a1a;
    }

    .title-underline {
      height: 4px;
      width: 84px;
      background: #f5c518;
      border-radius: 4px;
      margin-top: 7px;
    }

    /* ==============================
       CARD
    ============================== */
    .card {
      background: #fff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 2px 14px rgba(0, 0, 0, 0.07);
    }

    .card-inner {
      display: flex;
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

    /* Customer */
    .customer-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
    }

    .customer-avatar {
      width: 84px;
      height: 84px;
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

    /* Order Meta */
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
      color: #1a1a1a;
    }

    /* Banner */
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
      max-width: 360px;
      border-radius: 10px;
      object-fit: cover;
      display: block;
      aspect-ratio: 16 / 9;
      background: linear-gradient(135deg, #2d6a1f, #7ab648, #c8e85a, #e8a020);
    }

    /* Detail Pemesanan */
    .detail-label {
      font-size: 14px;
      font-weight: 700;
      color: #1a1a1a;
      margin-bottom: 7px;
    }

    .detail-textarea {
      width: 100%;
      max-width: 420px;
      min-height: 90px;
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
      width: 300px;
      display: flex;
      flex-direction: column;
      gap: 22px;
      position: relative;
      min-height: 300px;
      padding-top: 156px;
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

    .status-badge {
      display: inline-block;
      background: #f5c518;
      color: #1a1a1a;
      font-weight: 700;
      font-size: 14px;
      border-radius: 20px;
      padding: 8px 24px;
    }

    .send-row {
      position: absolute;
      bottom: 0;
      right: 0;
    }

    .send-btn {
      background: #f5c518;
      color: #1a1a1a;
      border: none;
      border-radius: 10px;
      padding: 13px 40px;
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

    /* ── RESPONSIVE ── */
    @media (max-width: 1024px) {
      .card-inner { flex-direction: column; }
      .divider { width: 100%; height: 1px; margin: 24px 0; align-self: auto; }
      .left-panel { padding-right: 0; }
      .right-panel { width: 100%; padding-top: 0; min-height: auto; }
      .send-row { position: relative; bottom: auto; right: auto; margin-top: 16px; }
      .main { padding: 24px 20px; }
      .banner-img { max-width: 100%; }
      .detail-textarea { max-width: 100%; }
    }

    @media (max-width: 600px) {
      .main { padding: 16px; gap: 16px; }
      .page-title { font-size: 22px; }
      .card { padding: 20px; border-radius: 12px; }
      .customer-name { font-size: 15px; }
      .customer-avatar { width: 64px; height: 64px; }
      .banner-title { font-size: 15px; }
      .banner-img { aspect-ratio: auto; height: 180px; }
      .field-label { font-size: 15px; }
      .send-btn { width: 100%; text-align: center; }
    }

    @media (max-width: 400px) {
      .main { padding: 12px; }
      .card { padding: 16px; }
      .page-title { font-size: 18px; }
    }
  </style>
</head>
<body>

  <!-- ==============================
       SIDEBAR
  ============================== -->
  @include('layout.sidebar')

  <!-- ==============================
       MAIN CONTENT
  ============================== -->
  <main class="main">

    <!-- Page Title -->
    <div>
      <h1 class="page-title">Detail Pesanan</h1>
      <div class="title-underline"></div>
    </div>

    <!-- Card -->
    <div class="card">
      <div class="card-inner">

        <!-- LEFT PANEL -->
        <div class="left-panel">

          <!-- Customer Info -->
          <div class="customer-section">
            <div class="customer-avatar">
              <svg viewBox="0 0 84 84" width="84" height="84" xmlns="http://www.w3.org/2000/svg">
                <circle cx="42" cy="42" r="42" fill="#f0d0d8"/>
                <ellipse cx="42" cy="40" rx="15" ry="19" fill="#c0405a" opacity="0.85"/>
                <ellipse cx="29" cy="51" rx="11" ry="6" fill="#a03050" opacity="0.7" transform="rotate(-30 29 51)"/>
                <ellipse cx="55" cy="51" rx="11" ry="6" fill="#a03050" opacity="0.7" transform="rotate(30 55 51)"/>
                <circle cx="42" cy="42" r="42" fill="none" stroke="#c0607a" stroke-width="2"/>
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

          <!-- Banner Reference -->
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

          <div>
            <label class="field-label">Nama Pesanan</label>
            <input class="field-input" type="text" placeholder="Beri nama/label pesanan ini">
          </div>

          <div>
            <label class="field-label">Harga</label>
            <input class="field-input" type="text" placeholder="Masukkan harga yang sudah didiskusikan">
          </div>

          <div>
            <span class="status-badge">Pending</span>
          </div>

          <div class="send-row">
            <a href="/admin/pesanan"><button class="send-btn">Send</button></a>
          </div>

        </div>

      </div>
    </div>

    <!-- Back Button -->
    <a href="#" class="back-btn">&#8592; Kembali</a>

  </main>

</body>
</html>