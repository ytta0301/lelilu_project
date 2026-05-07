<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Poppins', sans-serif;
      background: #eeebe6;
      min-height: 100vh;
      padding: 48px 24px 60px;
      color: #222;
    }

    .page-wrap {
      max-width: 560px;
      margin: 0 auto;
    }

    /* ===== HEADER ===== */
    .page-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 8px;
    }

    .page-title {
      font-size: 2rem;
      font-weight: 800;
      letter-spacing: -0.5px;
      line-height: 1.1;
      display: flex;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
    }

    .page-title .black { color: #2b2b2b; }
    .page-title .yellow { color: #F5C518; font-style: italic; }

    .title-line {
      display: inline-block;
      width: 120px;
      height: 4px;
      background: #F5C518;
      border-radius: 2px;
      margin-left: 4px;
      vertical-align: middle;
      position: relative;
      top: -4px;
    }

    .btn-back {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 0.9rem;
      font-weight: 500;
      color: #222;
      background: none;
      border: none;
      cursor: pointer;
      white-space: nowrap;
      padding-top: 4px;
    }

    .btn-back:hover { color: #F5C518; }

    .page-subtitle {
      font-size: 0.82rem;
      color: #888;
      margin-bottom: 28px;
    }

    /* ===== CARD ===== */
    .card {
      background: #fff;
      border-radius: 16px;
      padding: 24px 28px;
      margin-bottom: 16px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.05);
    }

    /* Order number card */
    .order-title {
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .order-date {
      font-size: 0.8rem;
      color: #aaa;
    }

    /* Payment detail card */
    .detail-header {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 24px;
    }

    .detail-icon {
      width: 44px;
      height: 44px;
      background: #FDE97A;
      border-radius: 10px;
      flex-shrink: 0;
    }

    .detail-title {
      font-size: 1rem;
      font-weight: 700;
    }

    .detail-rows {
      display: flex;
      flex-direction: column;
      gap: 0;
    }

    .detail-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 0;
      border-top: 1px solid #f0f0f0;
    }

    .detail-row:first-child { border-top: none; }

    .detail-label {
      font-size: 0.85rem;
      color: #aaa;
      font-weight: 400;
    }

    .detail-value {
      font-size: 0.85rem;
      color: #aaa;
      font-weight: 400;
    }

    /* Total bar */
    .total-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #F5C518;
      border-radius: 10px;
      padding: 16px 20px;
      margin-top: 8px;
    }

    .total-label {
      font-size: 1rem;
      font-weight: 700;
      color: #222;
    }

    .total-value {
      font-size: 1rem;
      font-weight: 700;
      color: #222;
    }

    /* ===== QR CODE ===== */
    .qr-wrap {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 8px;
    }

    .qr-card {
      background: #fff;
      border-radius: 16px;
      padding: 24px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.05);
      margin-bottom: 16px;
    }

    .qr-card canvas {
      display: block;
    }

    .qr-amount {
      font-size: 1.4rem;
      font-weight: 800;
      color: #222;
      text-align: center;
    }
  </style>
</head>
<body>
<div class="page-wrap">

  <!-- HEADER -->
  <div class="page-header">
    <div>
      <h1 class="page-title">
        <span class="black">Payment</span>
        <span class="yellow">Page</span>
        <span class="title-line"></span>
      </h1>
    </div>
    <a href="/order"><button class="btn-back">&#8249; Back</button></a>
  </div>
  <p class="page-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

  <!-- ORDER NUMBER CARD -->
  <div class="card">
    <div class="order-title">"Nomor Pesanan"</div>
    <div class="order-date">Dibuat pada 12 april 2029</div>
  </div>

  <!-- PAYMENT DETAIL CARD -->
  <div class="card">
    <div class="detail-header">
      <div class="detail-icon"></div>
      <div class="detail-title">Rincian Pembayaran</div>
    </div>

    <div class="detail-rows">
      <div class="detail-row">
        <span class="detail-label">Nomor Transaksi</span>
        <span class="detail-value">000000001</span>
      </div>
      <div class="detail-row">
        <span class="detail-label">Total Pesanan</span>
        <span class="detail-value">Rp.698.000</span>
      </div>
      <div class="detail-row">
        <span class="detail-label">Biaya Admin</span>
        <span class="detail-value">Rp.698.000</span>
      </div>
    </div>

    <div class="total-bar">
      <span class="total-label">Total &nbsp;Pembayaran</span>
      <span class="total-value">Rp.677.000</span>
    </div>
  </div>

  <!-- QR CODE -->
  <div class="qr-wrap">
    <div class="qr-card">
      <canvas id="qr-canvas"></canvas>
    </div>
    <div class="qr-amount">Rp.677.000</div>
  </div>

</div>

<!-- QR Code library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
  const canvas = document.getElementById('qr-canvas');
  // Use QRCode library to draw on a temp div then move canvas
  const container = document.createElement('div');
  document.body.appendChild(container);

  new QRCode(container, {
    text: "https://lelilu.com/payment/000000001",
    width: 220,
    height: 220,
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
  });

  setTimeout(() => {
    const qrCanvas = container.querySelector('canvas');
    if (qrCanvas) {
      canvas.width = qrCanvas.width;
      canvas.height = qrCanvas.height;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(qrCanvas, 0, 0);
    }
    document.body.removeChild(container);
  }, 100);
</script>
</body>
</html>