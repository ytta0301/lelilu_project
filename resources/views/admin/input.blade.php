<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Pesanan - LeLiLu</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: #ebebeb;
      display: flex;
      min-height: 100vh;
    }

    /* ── Main ── */
    .main {
      flex: 1;
      padding: 32px 36px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .page-header { display: flex; align-items: center; gap: 18px; }
    .page-title  { font-size: 28px; font-weight: 800; color: #1a1a1a; }
    .title-line  { flex: 0 0 90px; height: 4px; background: #f5c518; border-radius: 4px; margin-top: 4px; }

    /* ── Toast / alert ── */
    .alert-error {
      background: #fee2e2;
      border: 1.5px solid #fca5a5;
      color: #991b1b;
      border-radius: 10px;
      padding: 12px 18px;
      font-size: 14px;
      font-weight: 600;
    }
    .alert-error ul { margin: 6px 0 0 18px; font-weight: 400; }

    /* ── Card ── */
    .card {
      background: #fff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 2px 14px rgba(0,0,0,.06);
    }

    .card-inner { display: flex; gap: 0; }

    /* ── Left Panel ── */
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
      width: 86px; height: 86px;
      border-radius: 50%;
      overflow: hidden;
      border: 3px solid #f0d0d8;
      background: #f5e0e4;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .customer-name  { font-size: 17px; font-weight: 700; color: #1a1a1a; border-bottom: 2px solid #1a1a1a; padding-bottom: 3px; }
    .customer-phone { font-size: 13px; color: #666; }

    .order-meta            { display: flex; flex-direction: column; gap: 5px; }
    .order-meta p          { font-size: 14px; color: #333; }
    .order-meta b          { font-weight: 700; }

    .banner-title          { font-size: 17px; font-weight: 800; color: #1a1a1a; margin-bottom: 10px; }
    .banner-title em       { font-weight: 400; font-style: italic; }

    /* Referensi: bisa gambar atau teks */
    .banner-img {
      width: 100%;
      max-width: 350px;
      border-radius: 10px;
      display: block;
      aspect-ratio: 16/9;
      object-fit: cover;
    }
    .banner-placeholder {
      width: 100%;
      max-width: 350px;
      border-radius: 10px;
      aspect-ratio: 16/9;
      background: linear-gradient(135deg, #2d6a1f, #7ab648, #c8e85a, #e8a020);
    }

    .detail-label    { font-size: 14px; font-weight: 700; color: #1a1a1a; margin-bottom: 7px; }
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

    /* ── Divider ── */
    .divider { width: 1px; background: #e0e0e0; margin: 0 36px; align-self: stretch; }

    /* ── Right Panel ── */
    .right-panel {
      width: 310px;
      display: flex;
      flex-direction: column;
      gap: 20px;
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
      color: #333;
      outline: none;
      font-family: inherit;
      background: #fafafa;
      transition: border-color .2s;
    }
    .field-input:focus { border-color: #f5c518; }

    /* ── Upload area ── */
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
      transition: border-color .2s, background .2s;
      position: relative;
      overflow: hidden;
    }
    .upload-area:hover     { border-color: #aaa; background: #f3f3f3; }
    .upload-area input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; }
    .upload-plus  { font-size: 38px; color: #bbb; line-height: 1; font-weight: 300; }
    .upload-text  { font-size: 15px; color: #bbb; }
    .upload-preview {
      width: 100%; height: 100%;
      object-fit: cover;
      position: absolute;
      inset: 0;
      border-radius: 9px;
    }

    /* ── Checkbox tampil portofolio ── */
    .checkbox-row {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 14px;
      color: #333;
      cursor: pointer;
    }
    .checkbox-row input[type="checkbox"] {
      width: 18px; height: 18px;
      accent-color: #f5c518;
      cursor: pointer;
    }

    /* ── Status select (badge style) ── */
    .status-wrapper { position: relative; display: inline-block; }
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
      transition: background .2s;
    }
    .status-select.status-pending    { background: #fde68a; color: #92400e; }
    .status-select.status-proses     { background: #bfdbfe; color: #1d4ed8; }
    .status-select.status-selesai    { background: #bbf7d0; color: #15803d; }
    .status-select.status-dibatalkan { background: #fecaca; color: #991b1b; }

    .status-arrow {
      position: absolute;
      right: 12px; top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
    }

    /* ── Bottom row (status + save) ── */
    .bottom-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: auto;
      padding-top: 8px;
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
      transition: background .15s;
    }
    .send-btn:hover { background: #e6b800; }

    /* ── Back button ── */
    .back-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 14px;
      color: #555;
      text-decoration: none;
      font-weight: 500;
    }
    .back-btn:hover { color: #1a1a1a; }

    /* ── Responsive ── */
    @media (max-width: 900px) {
      .card-inner    { flex-direction: column; }
      .left-panel    { padding-right: 0; }
      .divider       { width: 100%; height: 1px; margin: 20px 0; }
      .right-panel   { width: 100%; }
    }
    @media (max-width: 600px) {
      .main { padding: 20px 16px; }
      .page-title { font-size: 20px; }
    }
  </style>
</head>
<body>

  @include('layout.sidebar')

  <main class="main">

    <!-- Page Title -->
    <div class="page-header">
      <h1 class="page-title">Detail Pesanan</h1>
      <div class="title-line"></div>
    </div>

    {{-- Validasi error --}}
    @if ($errors->any())
      <div class="alert-error">
        Terdapat kesalahan:
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Card -->
    <div class="card">
      {{-- FORM: method PUT, enctype untuk upload file --}}
      <form method="POST"
            action="{{ route('admin.input.update', $pemesanan->id_pemesanan) }}"
            enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-inner">

          <!-- ══ LEFT PANEL (read-only) ══ -->
          <div class="left-panel">

            <!-- Customer -->
            <div class="customer-section">
              <div class="customer-avatar">
                <svg viewBox="0 0 86 86" width="86" height="86" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="43" cy="43" r="43" fill="#f0d0d8"/>
                  <ellipse cx="43" cy="41" rx="15" ry="20" fill="#c0405a" opacity=".9"/>
                  <ellipse cx="30" cy="53" rx="12" ry="7" fill="#a03050" opacity=".7" transform="rotate(-25 30 53)"/>
                  <ellipse cx="56" cy="53" rx="12" ry="7" fill="#a03050" opacity=".7" transform="rotate(25 56 53)"/>
                </svg>
              </div>
              <div class="customer-name">{{ $pemesanan->user->name ?? 'Tanpa akun' }}</div>
              <div class="customer-phone">{{ $pemesanan->user->whatsapp ?? '—' }}</div>
            </div>

            <!-- Order Meta -->
            <div class="order-meta">
              <p><b>Nomor Pesanan:</b> #{{ $pemesanan->id_pemesanan }}</p>
              <p><b>Nama Pelanggan:</b> {{ $pemesanan->user->name ?? '—' }}</p>
              <p><b>Tanggal Pesan:</b> {{ \Carbon\Carbon::parse($pemesanan->created_at)->isoFormat('D MMMM Y') }}</p>
              <p><b>Jenis:</b> {{ $pemesanan->jenis ?? '—' }}</p>
            </div>

            <!-- Referensi -->
            <div>
              <h3 class="banner-title">
                {{ $pemesanan->jenis ?? 'Pesanan' }} || <em>Reference</em>
              </h3>
              @if ($pemesanan->referensi)
                <img class="banner-img"
                     src="{{ Storage::url($pemesanan->referensi) }}"
                     alt="Referensi desain"
                     onerror="this.style.display='none';document.getElementById('ref-placeholder').style.display='block';">
                <div class="banner-placeholder" id="ref-placeholder" style="display:none;"></div>
              @else
                <div class="banner-placeholder"></div>
                <p style="margin-top:8px;font-size:13px;color:#aaa;font-style:italic;">
                  Tidak ada referensi dari pelanggan.
                </p>
              @endif
            </div>

            <!-- Brief / Detail Pemesanan -->
            <div>
              <p class="detail-label">Detail Pemesanan :</p>
              <textarea class="detail-textarea" readonly>{{ $pemesanan->brief ?? '—' }}</textarea>
            </div>

          </div>
          <!-- end LEFT PANEL -->

          <div class="divider"></div>

          <!-- ══ RIGHT PANEL (editable) ══ -->
          <div class="right-panel">

            <!-- Jenis / Nama Pesanan (read-only info) -->
            <div>
              <label class="field-label">Nama / Jenis Pesanan</label>
              <input class="field-input" type="text"
                     value="{{ $pemesanan->jenis ?? '—' }}" readonly
                     style="background:#f0f0f0;color:#888;cursor:not-allowed;">
            </div>

            <!-- Harga (editable) -->
            <div>
              <label class="field-label" for="harga">Harga</label>
              <input class="field-input" type="number" id="harga" name="harga"
                     min="0" step="1000"
                     value="{{ old('harga', $pemesanan->harga) }}"
                     placeholder="Masukkan harga yang sudah didiskusikan">
            </div>

            <!-- Upload Hasil Kerja -->
            <div>
              <label class="field-label">Hasil Kerja</label>
              <div class="upload-area" id="uploadArea">
                <input type="file" name="gambar_hasil" accept="Image/*" onchange="previewImage(event)">
                @if ($pemesanan->fileHasil && $pemesanan->fileHasil->gambar_hasil)
                  <img class="upload-preview" id="uploadPreview"
                       src="{{ Storage::url($pemesanan->fileHasil->gambar_hasil) }}" alt="Hasil">
                @else
                  <div class="upload-plus" id="uploadPlus">+</div>
                  <div class="upload-text" id="uploadText">Upload Hasil</div>
                  <img class="upload-preview" id="uploadPreview" src="" alt="" style="display:none;">
                @endif
              </div>
            </div>

            <!-- Tampil di Portofolio -->
            <label class="checkbox-row">
              <input type="checkbox" name="tampil_portofolio" value="1"
                {{ ($pemesanan->fileHasil && $pemesanan->fileHasil->tampil_portofolio) ? 'checked' : '' }}>
              Tampilkan di halaman portofolio
            </label>

            <!-- Status + Save -->
            <div class="bottom-row">
              <div class="status-wrapper">
                <select class="status-select status-{{ $pemesanan->status }}"
                        name="status" id="statusSelect"
                        onchange="updateStatus(this)">
                  <option value="pending"    {{ $pemesanan->status === 'pending'    ? 'selected' : '' }}>Pending</option>
                  <option value="proses"     {{ $pemesanan->status === 'proses'     ? 'selected' : '' }}>Proses</option>
                  <option value="selesai"    {{ $pemesanan->status === 'selesai'    ? 'selected' : '' }}>Selesai</option>
                  <option value="dibatalkan" {{ $pemesanan->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                <svg class="status-arrow" width="12" height="12" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="3">
                  <polyline points="6 9 12 15 18 9"/>
                </svg>
              </div>

              <button type="submit" class="send-btn">Save</button>
            </div>

          </div>
          <!-- end RIGHT PANEL -->

        </div>{{-- card-inner --}}
      </form>
    </div>

    <a href="{{ route('admin.pesanan') }}" class="back-btn">&#8592; Kembali</a>

  </main>

  <script>
    // Preview gambar baru sebelum upload
    function previewImage(event) {
      const file = event.target.files[0];
      if (!file) return;
      const preview = document.getElementById('uploadPreview');
      const reader  = new FileReader();
      reader.onload = e => {
        preview.src          = e.target.result;
        preview.style.display = 'block';
        const plus = document.getElementById('uploadPlus');
        const text = document.getElementById('uploadText');
        if (plus) plus.style.display = 'none';
        if (text) text.style.display = 'none';
      };
      reader.readAsDataURL(file);
    }

    // Ganti warna badge status sesuai pilihan
    function updateStatus(select) {
      select.className = 'status-select status-' + select.value;
    }
  </script>

</body>
</html>