<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rincian Pesanan - LeLiLu</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f0f0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
    }

    .page {
      width: 100%;
      max-width: 480px;
      background: #f0f0f0;
      padding: 0 0 40px;
    }

    /* ==============================
       HEADER / NAVBAR
    ============================== */
    .navbar {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 18px 20px;
      background: #f0f0f0;
    }

    .back-btn {
      font-size: 22px;
      color: #333;
      cursor: pointer;
      text-decoration: none;
      line-height: 1;
    }

    .navbar-title {
      font-size: 18px;
      font-weight: 700;
      color: #1a1a1a;
    }

    /* ==============================
       CARD BASE
    ============================== */
    .card {
      background: #fff;
      border-radius: 16px;
      margin: 0 16px 16px;
      padding: 20px;
      box-shadow: 0 1px 8px rgba(0,0,0,0.07);
    }

    /* ==============================
       NOMOR PESANAN CARD
    ============================== */
    .order-number {
      font-size: 17px;
      font-weight: 800;
      color: #1a1a1a;
      margin-bottom: 6px;
    }

    .order-date {
      font-size: 13px;
      color: #aaa;
    }

    /* ==============================
       RINCIAN PEMBAYARAN CARD
    ============================== */
    .section-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .section-icon {
      width: 38px;
      height: 38px;
      background: #f5c518;
      border-radius: 10px;
      flex-shrink: 0;
    }

    .section-title {
      font-size: 16px;
      font-weight: 800;
      color: #1a1a1a;
    }

    .payment-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .payment-row:last-of-type {
      border-bottom: none;
    }

    .payment-label {
      font-size: 14px;
      color: #888;
    }

    .payment-value {
      font-size: 14px;
      color: #888;
    }

    .total-bar {
      background: #f5c518;
      border-radius: 12px;
      padding: 16px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 16px;
    }

    .total-label {
      font-size: 15px;
      font-weight: 800;
      color: #1a1a1a;
    }

    .total-value {
      font-size: 15px;
      font-weight: 800;
      color: #1a1a1a;
    }

    /* ==============================
       IMAGE GALLERY
    ============================== */
    .gallery {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin: 0 16px 16px;
      position: relative;
    }

    .gallery-item {
      border-radius: 14px;
      overflow: hidden;
      aspect-ratio: 1/1;
      background: #ddd;
      position: relative;
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    /* Placeholder gradient untuk demo */
    .gallery-item.demo-1 {
      background: linear-gradient(135deg, #1a3a8f, #4a90d9, #f5c518);
    }

    .gallery-item.demo-2 {
      background: linear-gradient(135deg, #90ee55, #55cc44, #88dd00);
    }

    .feedback-btn {
      position: absolute;
      bottom: 14px;
      left: 50%;
      transform: translateX(-50%);
      background: #f5c518;
      color: #1a1a1a;
      font-size: 13px;
      font-weight: 600;
      padding: 8px 20px;
      border-radius: 20px;
      white-space: nowrap;
      border: none;
      cursor: pointer;
      font-family: inherit;
    }

    /* ==============================
       STATUS PEMESANAN CARD
    ============================== */
    .status-track {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      position: relative;
      margin-top: 10px;
      padding: 0 8px;
    }

    /* Garis penghubung */
    .status-track::before {
      content: '';
      position: absolute;
      top: 20px;
      left: 40px;
      right: 40px;
      height: 3px;
      background: #f5c518;
      z-index: 0;
    }

    .status-step {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      position: relative;
      z-index: 1;
    }

    .status-dot {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: #2dd4a0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .status-dot.inactive {
      background: #d0d0d0;
    }

    .status-dot svg {
      width: 20px;
      height: 20px;
      stroke: #fff;
      fill: none;
      stroke-width: 2.5;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .status-label {
      font-size: 12px;
      color: #555;
      text-align: center;
      font-weight: 500;
    }

    /* ==============================
       REVISI SECTION
    ============================== */
    .revisi-section {
      padding: 0 16px;
    }

    .revisi-btn {
      display: inline-block;
      background: #f5c518;
      color: #1a1a1a;
      font-size: 14px;
      font-weight: 700;
      font-style: italic;
      text-decoration: underline;
      padding: 10px 20px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      font-family: inherit;
      margin-bottom: 12px;
    }

    .revisi-note {
      font-size: 12px;
      color: #888;
      line-height: 1.6;
    }
  </style>
</head>
<body>

  <div class="page">

    <!-- NAVBAR -->
    <div class="navbar">
      <a href="#" class="back-btn">&#8592;</a>
      <span class="navbar-title">Rincian Pesanan</span>
    </div>

    <!-- NOMOR PESANAN -->
    <div class="card">
      <div class="order-number">"Nomor Pesanan"</div>
      <div class="order-date">Dibuat pada 12 april 2029</div>
    </div>

    <!-- RINCIAN PEMBAYARAN -->
    <div class="card">
      <div class="section-header">
        <div class="section-icon"></div>
        <span class="section-title">Rincian Pembayaran</span>
      </div>

      <div class="payment-row">
        <span class="payment-label">Nomor Transaksi</span>
        <span class="payment-value">000000001</span>
      </div>
      <div class="payment-row">
        <span class="payment-label">Total Pesanan</span>
        <span class="payment-value">Rp.698.000</span>
      </div>
      <div class="payment-row">
        <span class="payment-label">Biaya Admin</span>
        <span class="payment-value">Rp.698.000</span>
      </div>

      <div class="total-bar">
        <span class="total-label">Total  Pembayaran</span>
        <span class="total-value">Rp.6677.000</span>
      </div>
    </div>

    <!-- GALLERY -->
    <div class="gallery">
      <div class="gallery-item demo-1"></div>
      <div class="gallery-item demo-2" style="position:relative;">
        <button class="feedback-btn">beri masukan</button>
      </div>
    </div>

    <!-- STATUS PEMESANAN -->
    <div class="card">
      <div class="section-header">
        <div class="section-icon"></div>
        <span class="section-title">Status Pemesanan</span>
      </div>

      <div class="status-track">

        <div class="status-step">
          <div class="status-dot">
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <span class="status-label">Pemesanan</span>
        </div>

        <div class="status-step">
          <div class="status-dot">
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <span class="status-label">pembayaran</span>
        </div>

        <div class="status-step">
          <div class="status-dot">
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <span class="status-label">progress</span>
        </div>

        <div class="status-step">
          <div class="status-dot">
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <span class="status-label">Selesai</span>
        </div>

      </div>
    </div>

    <!-- REVISI -->
    <div class="revisi-section">
      <button class="revisi-btn">Butuh Revisi? Kami bisa!</button>
      <p class="revisi-note">
        *Maksimal revisi 3 kali untuk pembiayaan gratis<br>
        jika sudah melebihi maka akan dikenakan biaya<br>
        tambahan
      </p>
    </div>

  </div>

</body>
</html>