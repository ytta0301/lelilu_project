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
    .ref-box {
      width: 100%;
      aspect-ratio: 1 / 1;
      border: 1.5px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      position: relative;
      background: #fafafa;
      cursor: pointer;
      transition: border-color .2s, box-shadow .2s;
    }
    .ref-box:hover {
      border-color: #f5c518;
      box-shadow: 0 0 0 3px rgba(245,197,24,0.18);
    }
    .ref-placeholder {
      position: absolute;
      inset: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 12px;
      color: #bbb;
      font-size: 14px;
      text-align: center;
      padding: 20px;
      pointer-events: none;
    }
    .ref-preview {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
      transition: transform .35s ease;
    }
    .ref-preview.visible { display: block; }
    .ref-box:hover .ref-preview.visible { transform: scale(1.03); }
    .hover-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.28);
      display: none;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity .2s;
      pointer-events: none;
    }
    .hover-overlay.active { display: flex; }
    .ref-box:hover .hover-overlay.active { opacity: 1; }
    .btn-edit {
      background: #f5c518;
      color: #1a1a1a;
      border: none;
      border-radius: 50px;
      padding: 9px 28px;
      font-family: inherit;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background .2s, transform .15s, box-shadow .2s;
      margin-top: 10px;
      width: 100%;
    }
    .btn-edit:hover {
      background: #e6b800;
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(245,200,0,.35);
    }
    .btn-edit:active { transform: translateY(0); }

    /* ── Upload progress bar ── */
    .upload-progress {
      display: none;
      margin-top: 8px;
      background: #f0f0f0;
      border-radius: 6px;
      height: 6px;
      overflow: hidden;
    }
    .upload-progress.show { display: block; }
    .upload-progress-bar {
      height: 100%;
      background: #f5c518;
      border-radius: 6px;
      width: 0%;
      transition: width 0.3s ease;
    }
    .upload-size-info {
      font-size: 11px;
      color: #999;
      margin-top: 4px;
      text-align: right;
    }

    /* ── Toast ── */
    .toast {
      display: none;
      position: fixed;
      bottom: 28px;
      left: 50%;
      transform: translateX(-50%) translateY(20px);
      background: #1a1a1a;
      color: #fff;
      padding: 14px 28px;
      border-radius: 50px;
      font-size: 14px;
      font-weight: 500;
      z-index: 999;
      white-space: nowrap;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
      gap: 10px;
      align-items: center;
    }
    .toast.show {
      display: flex;
      animation: toastIn 0.35s ease forwards;
    }
    @keyframes toastIn {
      from { transform: translateX(-50%) translateY(20px); opacity: 0; }
      to   { transform: translateX(-50%) translateY(0);    opacity: 1; }
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

    /* ===== MODAL GAMBAR ===== */
    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.8);
      z-index: 999;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      animation: fadeIn 0.25s ease;
    }
    .modal-overlay.open { display: flex; }
    .modal-box {
      max-width: 90vw;
      max-height: 90vh;
      cursor: default;
      animation: zoomIn 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .modal-box img {
      max-width: 90vw;
      max-height: 70vh;
      border-radius: 12px 12px 0 0;
      box-shadow: 0 8px 40px rgba(0,0,0,0.5);
      display: block;
    }
    .modal-desc {
      background: #fff;
      width: 100%;
      padding: 16px 20px;
      border-radius: 0 0 12px 12px;
      text-align: left;
    }
    .modal-desc h3 {
      font-size: 1rem;
      font-weight: 700;
      color: #111;
      margin-bottom: 4px;
    }
    .modal-desc p {
      font-size: 0.82rem;
      color: #666;
      line-height: 1.5;
      margin: 0;
    }
    .modal-close {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 36px;
      color: #fff;
      cursor: pointer;
      line-height: 1;
      transition: transform 0.2s;
      z-index: 1000;
    }
    .modal-close:hover { transform: scale(1.2); }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes zoomIn { from { transform: scale(0.7); opacity: 0; } to { transform: scale(1); opacity: 1; } }
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
            enctype="multipart/form-data"
            id="mainForm">
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
              <div class="customer-name">
                {{ $pemesanan->user->name ?? ($pemesanan->nama ?? 'Guest') }}
              </div>
              <div class="customer-phone">
                {{ $pemesanan->user->whatsapp ?? ($pemesanan->whatsapp ?? '—') }}
              </div>
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
                     style="cursor:pointer"
                     onclick='openModal(this.src,"Referensi",@json($pemesanan->jenis ?? "Referensi Desain"))'
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
              <div class="ref-box" id="hasilBox" onclick="handleHasilClick()">
                @if ($pemesanan->fileHasil && $pemesanan->fileHasil->gambar_hasil)
                  <img class="ref-preview visible" id="hasilPreview"
                       src="{{ Storage::url($pemesanan->fileHasil->gambar_hasil) }}" alt="Hasil">
                  <div class="hover-overlay active" id="hasilOverlay">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8">
                      <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                  </div>
                @else
                  <div class="ref-placeholder" id="hasilPlaceholder">
                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.4">
                      <rect x="3" y="3" width="18" height="18" rx="3"/>
                      <circle cx="8.5" cy="8.5" r="1.5"/>
                      <path d="M21 15l-5-5L5 21"/>
                    </svg>
                    <span>Upload Hasil<br>Kerja</span>
                  </div>
                  <div class="hover-overlay" id="hasilOverlay"></div>
                  <img class="ref-preview" id="hasilPreview" src="" alt="" style="display:none;">
                @endif
              </div>
              <button type="button" class="btn-edit" onclick="triggerUpload()">Edit</button>

              {{-- Hidden file input — backend tetap menerima field 'gambar_hasil' --}}
              <input type="file" id="hasilFileInput" name="gambar_hasil"
                     accept="image/*" onchange="handleHasilFile(event)" style="display:none">

              {{-- Progress bar & info ukuran (hanya tampil saat memilih file) --}}
              <div class="upload-progress" id="uploadProgress">
                <div class="upload-progress-bar" id="uploadProgressBar"></div>
              </div>
              <div class="upload-size-info" id="uploadSizeInfo"></div>
            </div>

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

              <button type="submit" class="send-btn" id="saveBtn">Save</button>
            </div>

          </div>
          <!-- end RIGHT PANEL -->

        </div>{{-- card-inner --}}
      </form>
    </div>

    <a href="{{ route('admin.pesanan') }}" class="back-btn">&#8592; Kembali</a>

  </main>

  <!-- Toast -->
  <div class="toast" id="toast"></div>

  <!-- Modal Gambar -->
  <div class="modal-overlay" id="imgModal" onclick="closeModal(event)">
    <span class="modal-close" onclick="closeModal()">&times;</span>
    <div class="modal-box">
      <img id="modalImg" src="" alt="">
      <div class="modal-desc">
        <h3 id="modalTitle"></h3>
        <p id="modalDesc"></p>
      </div>
    </div>
  </div>

  <script>
    /* ============================================================
       KOMPRESI GAMBAR DI BROWSER
       — Mengurangi ukuran file sebelum dikirim ke server
       — Backend tidak berubah sama sekali: field name tetap 'gambar_hasil'
       ============================================================ */

    // Konfigurasi kompresi — sesuaikan jika perlu
    var COMPRESS_MAX_WIDTH  = 1280;   // lebar maksimum hasil (px)
    var COMPRESS_MAX_HEIGHT = 1280;   // tinggi maksimum hasil (px)
    var COMPRESS_QUALITY    = 0.82;   // kualitas JPEG (0–1)
    var COMPRESS_MAX_MB     = 4;      // batas aman agar tidak 413

    /**
     * Kompres File gambar menggunakan Canvas API,
     * lalu masukkan kembali ke input[type=file] via DataTransfer.
     * Return Promise<File>
     */
    function compressImage(file) {
      return new Promise(function(resolve, reject) {
        var reader = new FileReader();
        reader.onerror = reject;
        reader.onload = function(ev) {
          var img = new Image();
          img.onerror = reject;
          img.onload = function() {
            // Hitung dimensi baru (proporsional)
            var w = img.width;
            var h = img.height;
            if (w > COMPRESS_MAX_WIDTH) {
              h = Math.round(h * COMPRESS_MAX_WIDTH / w);
              w = COMPRESS_MAX_WIDTH;
            }
            if (h > COMPRESS_MAX_HEIGHT) {
              w = Math.round(w * COMPRESS_MAX_HEIGHT / h);
              h = COMPRESS_MAX_HEIGHT;
            }

            // Gambar ke canvas lalu export sebagai JPEG
            var canvas = document.createElement('canvas');
            canvas.width  = w;
            canvas.height = h;
            canvas.getContext('2d').drawImage(img, 0, 0, w, h);

            canvas.toBlob(function(blob) {
              if (!blob) { reject(new Error('Gagal kompres gambar')); return; }
              // Buat File baru dengan nama yang sama
              var ext      = file.name.replace(/\.[^.]+$/, '');
              var newName  = ext + '_compressed.jpg';
              var newFile  = new File([blob], newName, { type: 'image/jpeg' });
              resolve(newFile);
            }, 'image/jpeg', COMPRESS_QUALITY);
          };
          img.src = ev.target.result;
        };
        reader.readAsDataURL(file);
      });
    }

    /** Format bytes ke string yang mudah dibaca (KB / MB) */
    function formatSize(bytes) {
      if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(0) + ' KB';
      return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }

    /** Tampilkan progress bar semu saat kompresi berlangsung */
    function showProgress(pct) {
      var bar  = document.getElementById('uploadProgressBar');
      var wrap = document.getElementById('uploadProgress');
      wrap.classList.add('show');
      bar.style.width = pct + '%';
    }
    function hideProgress() {
      document.getElementById('uploadProgress').classList.remove('show');
      document.getElementById('uploadProgressBar').style.width = '0%';
    }

    /* ============================================================
       HANDLER UTAMA — dipanggil saat user memilih file
       ============================================================ */
    function handleHasilFile(e) {
      var file = e.target.files[0];
      if (!file) return;

      // Validasi: harus berupa gambar
      if (!file.type.startsWith('image/')) {
        showToast('❌ File harus berupa gambar (JPG, PNG, dll)');
        e.target.value = '';
        return;
      }

      var originalSizeMB = file.size / (1024 * 1024);
      showProgress(20);
      showToast('Mengompres gambar…');

      compressImage(file).then(function(compressed) {
        showProgress(80);

        var compressedSizeMB = compressed.size / (1024 * 1024);

        // Peringatan jika masih > batas aman (jarang terjadi)
        if (compressedSizeMB > COMPRESS_MAX_MB) {
          showToast('⚠️ Gambar masih ' + compressedSizeMB.toFixed(1) + ' MB setelah dikompres. Coba gambar lain.');
        }

        // Masukkan file yang sudah dikompres ke input — backend menerima seperti biasa
        var dt = new DataTransfer();
        dt.items.add(compressed);
        document.getElementById('hasilFileInput').files = dt.files;

        // Preview
        var url = URL.createObjectURL(compressed);
        var preview = document.getElementById('hasilPreview');
        preview.src = url;
        preview.classList.add('visible');
        preview.style.display = 'block';

        var placeholder = document.getElementById('hasilPlaceholder');
        if (placeholder) placeholder.style.display = 'none';
        var overlay = document.getElementById('hasilOverlay');
        if (overlay) overlay.classList.add('active');

        // Info ukuran
        document.getElementById('uploadSizeInfo').textContent =
          'Asli: ' + formatSize(file.size) + ' → Setelah kompres: ' + formatSize(compressed.size);

        showProgress(100);
        setTimeout(hideProgress, 600);

        showToast('✓ Gambar siap (' + formatSize(compressed.size) + ')');
      }).catch(function(err) {
        hideProgress();
        console.error('Compress error:', err);
        showToast('❌ Gagal mengompres gambar. Coba lagi.');
      });
    }

    /* ============================================================
       FUNGSI LAIN (tidak berubah dari versi awal)
       ============================================================ */

    function triggerUpload() {
      document.getElementById('hasilFileInput').click();
    }

    function handleHasilClick() {
      var img = document.getElementById('hasilPreview');
      if (img && img.classList.contains('visible')) {
        openModal(img.src, 'Hasil Kerja', @json($pemesanan->jenis ?? 'Hasil Kerja'));
      } else {
        triggerUpload();
      }
    }

    function openModal(src, title, desc) {
      document.getElementById('modalImg').src   = src;
      document.getElementById('modalTitle').textContent = title;
      document.getElementById('modalDesc').textContent  = desc;
      document.getElementById('imgModal').classList.add('open');
    }
    function closeModal(e) {
      if (e && e.target !== e.currentTarget) return;
      document.getElementById('imgModal').classList.remove('open');
    }
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') document.getElementById('imgModal').classList.remove('open');
    });

    function updateStatus(select) {
      select.className = 'status-select status-' + select.value;
    }

    function showToast(msg) {
      var t = document.getElementById('toast');
      t.textContent = msg;
      t.classList.add('show');
      setTimeout(function() { t.classList.remove('show'); }, 2800);
    }
  </script>

</body>
</html>