<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Rincian Pesanan</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --yellow: #F5C518;
    --bg:     #F0EFEb;
    --card:   #FFFFFF;
    --text:   #1C1C1E;
    --muted:  #9B9B9B;
    --green:  #3CC08F;
    --radius: 16px;
    --shadow: 0 2px 12px rgba(0,0,0,.07);
  }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding-bottom: 40px;
  }

  .page {
    width: 100%;
    max-width: 480px;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  /* ── HEADER ── */
  .header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 20px 20px 8px;
    background: var(--bg);
    position: sticky; top: 0; z-index: 10;
  }
  .back-btn {
    width: 36px; height: 36px;
    display: flex; align-items: center; justify-content: center;
    text-decoration: none; color: var(--text);
    border-radius: 10px;
    transition: background .15s;
  }
  .back-btn:hover { background: rgba(0,0,0,.06); }
  .header-title { font-size: 17px; font-weight: 700; }

  /* ── CARD base ── */
  .card {
    background: var(--card);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    margin: 0 16px;
    overflow: hidden;
  }

  /* ── ORDER NUMBER CARD ── */
  .order-num-card { padding: 20px 22px; }
  .order-num-card .label {
    font-size: 18px; font-weight: 800;
  }
  .order-num-card .date {
    font-size: 13px; color: var(--muted); margin-top: 5px; font-weight: 500;
  }

  /* ── PAYMENT CARD ── */
  .payment-card { padding: 20px 22px 0; }

  .payment-header {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 20px;
  }
  .pay-icon {
    width: 44px; height: 44px; border-radius: 12px;
    background: var(--yellow);
    flex-shrink: 0;
  }
  .pay-title { font-size: 17px; font-weight: 800; }

  .pay-row {
    display: flex; justify-content: space-between; align-items: center;
    padding: 13px 0;
    border-bottom: 1px solid #F2F2F0;
  }
  .pay-row:last-of-type { border-bottom: none; }
  .pay-row .key   { font-size: 14px; color: #555; font-weight: 500; }
  .pay-row .val   { font-size: 14px; font-weight: 700; color: var(--text); }

  .pay-total {
    display: flex; justify-content: space-between; align-items: center;
    background: var(--yellow);
    margin: 16px -22px 0;
    padding: 16px 22px;
  }
  .pay-total .key { font-size: 16px; font-weight: 800; color: var(--text); }
  .pay-total .val { font-size: 16px; font-weight: 800; color: var(--text); }

  /* ── IMAGE SECTION ── */
  .image-section {
    margin: 0 16px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
  }
  .img-box {
    border-radius: var(--radius);
    overflow: hidden;
    aspect-ratio: 1;
    box-shadow: var(--shadow);
  }
  .img-box img { width: 100%; height: 100%; object-fit: cover; display: block; }

  .img-placeholder {
    background: var(--card);
    border-radius: var(--radius);
    aspect-ratio: 1;
    box-shadow: var(--shadow);
    border: 2px solid #E5E5E3;
    display: flex; align-items: center; justify-content: center;
  }
  .img-placeholder span {
    font-size: 14px; color: var(--muted); font-weight: 500;
    letter-spacing: .3px;
  }

  /* ── STATUS CARD ── */
  .status-card { padding: 20px 22px 28px; }

  .status-header {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 28px;
  }
  .status-icon {
    width: 44px; height: 44px; border-radius: 12px;
    background: var(--yellow); flex-shrink: 0;
  }
  .status-title { font-size: 17px; font-weight: 800; }

  /* stepper */
  .stepper {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    position: relative;
    padding: 0 10px;
  }

  /* connecting line */
  .stepper::before {
    content: '';
    position: absolute;
    top: 18px;
    left: calc(10px + 18px);
    right: calc(10px + 18px);
    height: 3px;
    background: #E0E0DE;
    z-index: 0;
  }

  /* yellow progress line — 2 of 4 steps done = ~33% of the track */
  .stepper::after {
    content: '';
    position: absolute;
    top: 18px;
    left: calc(10px + 18px);
    width: 33.3%;
    height: 3px;
    background: var(--yellow);
    z-index: 1;
  }

  .step {
    display: flex; flex-direction: column; align-items: center; gap: 8px;
    position: relative; z-index: 2;
    flex: 1;
  }

  .step-dot {
    width: 36px; height: 36px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .step-dot.done {
    background: var(--green);
  }
  .step-dot.done::after {
    content: '';
    display: block;
    width: 12px; height: 7px;
    border-left: 2.5px solid #fff;
    border-bottom: 2.5px solid #fff;
    transform: rotate(-45deg) translateY(-2px);
  }
  .step-dot.pending {
    background: #D9D9D9;
  }

  .step-label {
    font-size: 11.5px; font-weight: 600; color: var(--text);
    text-align: center; line-height: 1.3;
  }
  .step.inactive .step-label { color: var(--muted); }
</style>
</head>
<body>
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <a href="/history" class="back-btn">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"/>
      </svg>
    </a>
    <span class="header-title">Rincian Pesanan</span>
  </div>

  <!-- ORDER NUMBER -->
  <div class="card order-num-card">
    <div class="label">"Nomor Pesanan"</div>
    <div class="date">Dibuat pada 12 april 2029</div>
  </div>

  <!-- PAYMENT DETAIL -->
  <div class="card payment-card">
    <div class="payment-header">
      <div class="pay-icon"></div>
      <span class="pay-title">Rincian Pembayaran</span>
    </div>

    <div class="pay-row">
      <span class="key">Nomor Transaksi</span>
      <span class="val">000000001</span>
    </div>
    <div class="pay-row">
      <span class="key">Total Pesanan</span>
      <span class="val">Rp.698.000</span>
    </div>
    <div class="pay-row">
      <span class="key">Biaya Admin</span>
      <span class="val">Rp.698.000</span>
    </div>

    <div class="pay-total">
      <span class="key">Total  Pembayaran</span>
      <span class="val">Rp.6677.000</span>
    </div>
  </div>

  <!-- IMAGES -->
  <div class="image-section">
    <div class="img-box">
      <img src="https://i.imgur.com/placeholder.jpg"
           onerror="this.style.background='#dde4f0';this.removeAttribute('src')"
           alt="Gambar Pesanan" />
    </div>
    <div class="img-placeholder">
      <span>On Progress.....</span>
    </div>
  </div>

  <!-- STATUS -->
  <div class="card status-card">
    <div class="status-header">
      <div class="status-icon"></div>
      <span class="status-title">Status  Pemesanan</span>
    </div>

    <div class="stepper">
      <div class="step">
        <div class="step-dot done"></div>
        <span class="step-label">Pemesanan</span>
      </div>
      <div class="step">
        <div class="step-dot done"></div>
        <span class="step-label">pembayaran</span>
      </div>
      <div class="step inactive">
        <div class="step-dot pending"></div>
        <span class="step-label">progress</span>
      </div>
      <div class="step inactive">
        <div class="step-dot pending"></div>
        <span class="step-label">Selesai</span>
      </div>
    </div>
  </div>

</div>
</body>
</html>