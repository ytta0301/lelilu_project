<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rincian Pesanan - LeLiLu</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

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

    /* ── Navbar ── */
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

    /* ── Card base ── */
    .card {
      background: #fff;
      border-radius: 16px;
      margin: 0 16px 16px;
      padding: 20px;
      box-shadow: 0 1px 8px rgba(0,0,0,0.07);
    }

    /* ── Nomor pesanan ── */
    .order-number { font-size: 17px; font-weight: 800; color: #1a1a1a; margin-bottom: 6px; }
    .order-date   { font-size: 13px; color: #aaa; }

    /* ── Badge status ── */
    .order-status {
      display: inline-block;
      margin-top: 10px;
      padding: 5px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 700;
    }
    .status-pending    { background: #fde68a; color: #92400e; }
    .status-proses     { background: #bfdbfe; color: #1d4ed8; }
    .status-selesai    { background: #bbf7d0; color: #15803d; }
    .status-dibatalkan { background: #fecaca; color: #991b1b; }

    /* ── Section header ── */
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
    .section-title { font-size: 16px; font-weight: 800; color: #1a1a1a; }

    /* ── Payment rows ── */
    .payment-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 0;
      border-bottom: 1px solid #f0f0f0;
    }
    .payment-row:last-of-type { border-bottom: none; }
    .payment-label { font-size: 14px; color: #888; }
    .payment-value { font-size: 14px; color: #333; font-weight: 600; }

    .total-bar {
      background: #f5c518;
      border-radius: 12px;
      padding: 16px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 16px;
    }
    .total-label { font-size: 15px; font-weight: 800; color: #1a1a1a; }
    .total-value { font-size: 15px; font-weight: 800; color: #1a1a1a; }

    /* ── Gallery ── */
    .gallery {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin: 0 16px 16px;
    }

    .gallery-item {
      border-radius: 14px;
      overflow: hidden;
      aspect-ratio: 1/1;
      background: #e0e0e0;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .gallery-label {
      position: absolute;
      top: 10px;
      left: 10px;
      background: rgba(0,0,0,0.5);
      color: #fff;
      font-size: 10px;
      font-weight: 700;
      padding: 3px 8px;
      border-radius: 6px;
      letter-spacing: 0.5px;
    }

    .gallery-empty {
      color: #bbb;
      font-size: 12px;
      text-align: center;
      padding: 8px;
    }

    /* Gradient placeholder */
    .placeholder-referensi {
      width: 100%; height: 100%;
      background: linear-gradient(135deg, #1a3a8f, #4a90d9, #f5c518);
    }
    .placeholder-hasil {
      width: 100%; height: 100%;
      background: linear-gradient(135deg, #d0d0d0, #e8e8e8);
    }

    /* ── Status track ── */
    .status-track {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      position: relative;
      margin-top: 10px;
      padding: 0 8px;
    }

    .status-track::before {
      content: '';
      position: absolute;
      top: 20px;
      left: 40px;
      right: 40px;
      height: 3px;
      background: #e0e0e0;
      z-index: 0;
    }

    /* Garis progress aktif — lebar diatur JS */
    .status-track::after {
      content: '';
      position: absolute;
      top: 20px;
      left: 40px;
      height: 3px;
      background: #f5c518;
      z-index: 1;
      transition: width 0.5s ease;
    }

    .status-step {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      position: relative;
      z-index: 2;
    }

    .status-dot {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.3s;
    }
    .status-dot.active   { background: #2dd4a0; }
    .status-dot.inactive { background: #d0d0d0; }
    .status-dot.cancelled { background: #fca5a5; }

    .status-dot svg {
      width: 20px; height: 20px;
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

    /* ── Revisi ── */
    .revisi-section { padding: 0 16px; }

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
    .revisi-btn:disabled {
      background: #e0e0e0;
      color: #aaa;
      cursor: not-allowed;
      text-decoration: none;
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
    <a href="{{ route('history') }}" class="back-btn">&#8592;</a>
    <span class="navbar-title">Rincian Pesanan</span>
  </div>

  <!-- NOMOR PESANAN -->
  <div class="card">
    <div class="order-number">#{{ $pemesanan->id_pemesanan }}</div>
    <div class="order-date">
      Dibuat pada {{ \Carbon\Carbon::parse($pemesanan->created_at)->isoFormat('D MMMM Y') }}
    </div>
    @php
      $badgeMap = [
        'pending'    => 'status-pending',
        'proses'     => 'status-proses',
        'selesai'    => 'status-selesai',
        'dibatalkan' => 'status-dibatalkan',
      ];
      $labelMap = [
        'pending'    => 'Pending',
        'proses'     => 'Diproses',
        'selesai'    => 'Selesai',
        'dibatalkan' => 'Dibatalkan',
      ];
    @endphp
    <span class="order-status {{ $badgeMap[$pemesanan->status] ?? 'status-pending' }}">
      {{ $labelMap[$pemesanan->status] ?? $pemesanan->status }}
    </span>
  </div>

  <!-- RINCIAN PEMBAYARAN -->
  <div class="card">
    <div class="section-header">
      <div class="section-icon"></div>
      <span class="section-title">Rincian Pembayaran</span>
    </div>

    <div class="payment-row">
      <span class="payment-label">Nomor Pesanan</span>
      <span class="payment-value">#{{ $pemesanan->id_pemesanan }}</span>
    </div>

    <div class="payment-row">
      <span class="payment-label">Jenis</span>
      <span class="payment-value">{{ $pemesanan->jenis ?? '—' }}</span>
    </div>

    <div class="total-bar">
      <span class="total-label">Total Pembayaran</span>
      <span class="total-value">
        Rp {{ $pemesanan->harga ? number_format($pemesanan->harga, 0, ',', '.') : '—' }}
      </span>
    </div>
  </div>

  <!-- GALLERY: Referensi + Hasil -->
  <div class="gallery">

    {{-- Gambar Referensi (dari user saat order) --}}
    <div class="gallery-item">
      <span class="gallery-label">Referensi</span>
      @if ($pemesanan->referensi)
        <img src="{{ Storage::url($pemesanan->referensi) }}"
             alt="Referensi"
             onerror="this.parentElement.innerHTML='<div class=\'placeholder-referensi\'></div><span class=\'gallery-label\'>Referensi</span>'">
      @else
        <div class="placeholder-referensi"></div>
        <span style="position:absolute;bottom:10px;font-size:11px;color:rgba(255,255,255,0.7);">Belum ada</span>
      @endif
    </div>

    {{-- Gambar Hasil Kerja (dari admin) --}}
    <div class="gallery-item" style="position:relative;">
      <span class="gallery-label">Hasil</span>
      @if ($pemesanan->fileHasil && $pemesanan->fileHasil->gambar_hasil)
        <img src="{{ Storage::url($pemesanan->fileHasil->gambar_hasil) }}"
             alt="Hasil Kerja"
             onerror="this.parentElement.innerHTML='<div class=\'placeholder-hasil\'></div><span class=\'gallery-label\'>Hasil</span>'">
      @else
        <div class="placeholder-hasil"></div>
        <span class="gallery-empty" style="position:absolute;">Belum tersedia</span>
      @endif
    </div>

  </div>

  <!-- STATUS PEMESANAN -->
  <div class="card">
    <div class="section-header">
      <div class="section-icon"></div>
      <span class="section-title">Status Pemesanan</span>
    </div>

    @php
      /*
       * Mapping status DB → berapa step yang aktif:
       * pending    → 1 step  (Pemesanan)
       * proses     → 3 steps (Pemesanan, Pembayaran, Progress)
       * selesai    → 4 steps (semua)
       * dibatalkan → 1 step aktif, sisanya merah
       */
      $activeSteps = match($pemesanan->status) {
        'pending'    => 1,
        'proses'     => 3,
        'selesai'    => 4,
        'dibatalkan' => 1,
        default      => 1,
      };
      $isCancelled = $pemesanan->status === 'dibatalkan';
    @endphp

    <div class="status-track" id="statusTrack"
         data-active="{{ $activeSteps }}"
         data-cancelled="{{ $isCancelled ? '1' : '0' }}">

      @php
        $steps = ['Pemesanan', 'Pembayaran', 'Progress', 'Selesai'];
      @endphp

      @foreach ($steps as $i => $stepLabel)
        @php
          $stepNum  = $i + 1;
          $isActive = $stepNum <= $activeSteps;
          $dotClass = $isActive
            ? ($isCancelled && $stepNum > 1 ? 'cancelled' : 'active')
            : 'inactive';
        @endphp
        <div class="status-step">
          <div class="status-dot {{ $dotClass }}">
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <span class="status-label">{{ $stepLabel }}</span>
        </div>
      @endforeach

    </div>
  </div>

  <!-- REVISI -->
  <div class="revisi-section">
    {{-- Tombol revisi hanya aktif jika status proses/selesai, bukan dibatalkan --}}
    @if (in_array($pemesanan->status, ['proses', 'selesai']))
      <button class="revisi-btn">Butuh Revisi? Kami bisa!</button>
    @else
      <button class="revisi-btn" disabled>Butuh Revisi? Kami bisa!</button>
    @endif
    <p class="revisi-note">
      *Maksimal revisi 3 kali untuk pembiayaan gratis<br>
      jika sudah melebihi maka akan dikenakan biaya<br>
      tambahan
    </p>
  </div>

</div>

<script>
  // Animasikan garis progress status track
  (function () {
    const track     = document.getElementById('statusTrack');
    if (!track) return;
    const active    = parseInt(track.dataset.active, 10);
    const total     = 4; // jumlah step
    const segments  = total - 1; // jumlah garis antar step
    const pct       = Math.max(0, Math.min(1, (active - 1) / segments));
    track.style.setProperty('--progress', pct);

    // Sesuaikan pseudo-element ::after lewat inline style width
    // Karena CSS pseudo-element tidak bisa diset via JS langsung,
    // kita gunakan custom property dan set via style tag
    const style = document.createElement('style');
    style.textContent = `
      #statusTrack::after {
        width: calc((100% - 80px) * ${pct});
      }
    `;
    document.head.appendChild(style);
  })();
</script>

</body>
</html>