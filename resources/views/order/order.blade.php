<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Page</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --yellow:      #F5C800;
    --yellow-dark: #e0b400;
    --dark:        #2a2a2a;
    --gray:        #7a7a7a;
    --border:      #e2e2e2;
    --white:       #fff;
    --bg:          #f9f9f7;
    --radius:      18px;
    --shadow:      0 4px 40px rgba(0,0,0,0.07);
  }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--dark);
    min-height: 100vh;
  }

  .wrapper {
    max-width: 980px;
    margin: 0 auto;
    padding: 52px 40px 48px;
    animation: fadeUp 0.4s ease both;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ── HEADER ── */
  .page-title {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 10px;
  }
  .page-title strong { color: var(--dark); }
  .page-title em     { color: var(--yellow); font-style: italic; }

  .page-subtitle {
    color: var(--gray);
    font-size: 0.93rem;
    line-height: 1.65;
    margin-bottom: 44px;
  }

  /* ── CARD ── */
  .card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 36px 40px 44px;
  }

  .card-title {
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: 30px;
    letter-spacing: -0.01em;
  }

  /* ── TWO-COLUMN LAYOUT ── */
  .order-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 40px;
    align-items: start;
  }

  /* ── FORM ── */
  .form-group { margin-bottom: 24px; }

  .form-label {
    display: block;
    font-size: 1.05rem;
    font-weight: 500;
    margin-bottom: 10px;
  }

  .form-input,
  .form-textarea {
    width: 100%;
    padding: 15px 18px;
    border: 1.5px solid var(--border);
    border-radius: 13px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    color: var(--dark);
    background: var(--white);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  .form-input::placeholder,
  .form-textarea::placeholder { color: #c0c0c0; }
  .form-input:focus,
  .form-textarea:focus {
    border-color: var(--yellow);
    box-shadow: 0 0 0 3px rgba(245,200,0,0.18);
  }

  .form-textarea {
    resize: none;
    height: 190px;
    line-height: 1.65;
  }

  /* ── CUSTOM SELECT ── */
  .select-wrapper { position: relative; }

  .custom-select {
    width: 100%;
    padding: 15px 18px;
    border: 1.5px solid var(--border);
    border-radius: 13px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    color: var(--dark);
    background: var(--white);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    user-select: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  .custom-select.open {
    border-color: var(--yellow);
    box-shadow: 0 0 0 3px rgba(245,200,0,0.18);
  }

  .select-arrow {
    font-size: 1rem;
    transition: transform 0.25s;
    color: var(--dark);
    line-height: 1;
  }
  .custom-select.open .select-arrow { transform: rotate(180deg); }

  .select-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 6px);
    left: 0; right: 0;
    background: var(--white);
    border: 1.5px solid var(--border);
    border-radius: 13px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    z-index: 50;
    overflow: hidden;
    animation: dropIn 0.2s ease;
  }
  @keyframes dropIn {
    from { opacity: 0; transform: translateY(-6px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .custom-select.open ~ .select-dropdown { display: block; }

  .select-option {
    padding: 14px 18px;
    cursor: pointer;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: background 0.15s;
  }
  .select-option:hover    { background: #fffbea; }
  .select-option.selected { background: #fff9d6; font-weight: 600; }
  .select-option:not(:last-child) { border-bottom: 1px solid #f0f0f0; }

  .option-badge {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: var(--yellow);
    color: var(--dark);
    font-size: 0.72rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  /* ── SUBMIT BUTTON ── */
  .btn-primary {
    background: var(--yellow);
    color: var(--dark);
    border: none;
    padding: 16px 44px;
    border-radius: 50px;
    font-family: 'DM Sans', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    margin-top: 10px;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    display: inline-block;
  }
  .btn-primary:hover {
    background: var(--yellow-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(245,200,0,0.35);
  }
  .btn-primary:active { transform: translateY(0); box-shadow: none; }

  /* ── CUSTOM REFERENCE PANEL ── */
  .ref-panel {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 14px;
    padding-top: 4px;
  }

  .ref-box {
    width: 100%;
    aspect-ratio: 3 / 4;
    border: 1.5px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    background: #fafafa;
    cursor: pointer;
    transition: border-color .2s, box-shadow .2s;
  }
  .ref-box:hover {
    border-color: var(--yellow);
    box-shadow: 0 0 0 3px rgba(245,200,0,0.18);
  }

  .ref-placeholder {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 12px;
    color: #aaa;
    font-size: 0.88rem;
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

  /* hover overlay when image loaded */
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
    background: var(--yellow);
    color: var(--dark);
    border: none;
    border-radius: 50px;
    padding: 9px 28px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.88rem;
    font-weight: 600;
    cursor: pointer;
    transition: background .2s, transform .15s, box-shadow .2s;
  }
  .btn-edit:hover {
    background: var(--yellow-dark);
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(245,200,0,.35);
  }
  .btn-edit:active { transform: translateY(0); }

  /* ── BACK ── */
  .back-link {
    display: inline-block;
    margin-top: 32px;
    color: var(--dark);
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    transition: color 0.2s;
  }
  .back-link::before { content: '← '; }
  .back-link:hover { color: var(--yellow-dark); }

  /* ── TOAST ── */
  .toast {
    display: none;
    position: fixed;
    bottom: 28px;
    left: 50%;
    transform: translateX(-50%) translateY(20px);
    background: var(--dark);
    color: var(--white);
    padding: 14px 28px;
    border-radius: 50px;
    font-size: 0.9rem;
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

  @keyframes shake {
    0%,100% { transform: translateX(0); }
    20%      { transform: translateX(-6px); }
    40%      { transform: translateX(6px); }
    60%      { transform: translateX(-4px); }
    80%      { transform: translateX(4px); }
  }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .wrapper { padding: 40px 24px; }
    .order-layout { gap: 30px; }
    .card { padding: 30px 28px 36px; }
    .page-title { font-size: 2.6rem; }
  }

  @media (max-width: 768px) {
    .wrapper { padding: 32px 20px; }
    .page-title { font-size: 2.2rem; }
    .page-subtitle { font-size: 0.88rem; }
    .card { padding: 24px 20px 28px; }
    .order-layout { grid-template-columns: 1fr; gap: 24px; }
    .card-title { font-size: 1rem; margin-bottom: 24px; }
    .form-group { margin-bottom: 20px; }
    .form-label { font-size: 0.95rem; }
    .form-input, .form-textarea { padding: 12px 14px; font-size: 0.9rem; }
    .form-textarea { height: 150px; }
    .ref-panel { padding-top: 0; }
    .ref-box { aspect-ratio: 16 / 10; max-width: 300px; margin: 0 auto; }
    .ref-placeholder { font-size: 0.8rem; padding: 16px; }
    .btn-primary { padding: 14px 32px; font-size: 0.95rem; width: 100%; }
    .back-link { margin-top: 24px; font-size: 0.9rem; }
  }

  @media (max-width: 480px) {
    .wrapper { padding: 24px 16px; }
    .page-title { font-size: 1.8rem; }
    .page-subtitle { font-size: 0.82rem; margin-bottom: 32px; }
    .page-subtitle br { display: none; }
    .card { padding: 20px 16px 24px; border-radius: 14px; }
    .card-title { font-size: 0.95rem; margin-bottom: 20px; }
    .form-label { font-size: 0.9rem; margin-bottom: 8px; }
    .form-input, .form-textarea { padding: 10px 12px; font-size: 0.85rem; border-radius: 10px; }
    .form-textarea { height: 120px; }
    .select-wrapper { margin-bottom: 16px; }
    .custom-select { padding: 12px 14px; font-size: 0.85rem; }
    .select-option { padding: 12px 14px; font-size: 0.85rem; }
    .option-badge { width: 20px; height: 20px; font-size: 0.65rem; }
    .ref-box { aspect-ratio: 4 / 3; max-width: 100%; }
    .ref-placeholder { font-size: 0.75rem; gap: 8px; }
    .ref-placeholder svg { width: 32px; height: 32px; }
    .btn-primary { padding: 12px 24px; font-size: 0.9rem; }
    .btn-edit { padding: 8px 20px; font-size: 0.8rem; }
    .back-link { margin-top: 20px; font-size: 0.85rem; }
    .toast { padding: 12px 20px; font-size: 0.8rem; }
  }

  @media (max-width: 360px) {
    .wrapper { padding: 20px 12px; }
    .page-title { font-size: 1.6rem; }
    .page-subtitle { font-size: 0.78rem; }
    .card-title { font-size: 0.9rem; }
    .form-input, .form-textarea { padding: 8px 10px; font-size: 0.8rem; }
    .btn-primary { padding: 10px 20px; font-size: 0.85rem; }
  }
</style>
</head>
<body>

<div class="wrapper">
  <h1 class="page-title">
    <strong>Order</strong> <em>Page</em>
  </h1>
  <p class="page-subtitle">
    Buat design sesuai dengan keinginanmu,<br>
    kami siap melayani <strong>!!</strong>
  </p>

  {{-- [TAMBAH] Alert sukses --}}
  @if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <p class="card-title">Form Pemesanan Banner</p>

    {{-- [UBAH] Ganti <div> jadi <form> --}}
    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="order-layout">
        <div class="form-col">

          <!-- NAMA -->
          <div class="form-group">
            <label class="form-label">Nama</label>
            {{-- [UBAH] tambah name, value auto-fill dari $user->name --}}
            <input class="form-input @error('nama') input-error @enderror"
                   id="nama" name="nama" type="text" placeholder="Nama kamu"
                   value="{{ old('nama', $user->name ?? '') }}">
            @error('nama')<span class="field-error">{{ $message }}</span>@enderror
          </div>

          <!-- UKURAN BANNER -->
          <div class="form-group">
            <label class="form-label">Ukuran Banner</label>
            <div class="select-wrapper">
              <div class="custom-select" id="customSelect" onclick="toggleSelect()">
                <span id="selectLabel" style="color:{{ old('jenis') ? 'var(--dark)' : '#c0c0c0' }}">
                  {{ old('jenis') ?? 'pilih ukuran banner' }}
                </span>
                <span class="select-arrow">&#8964;</span>
              </div>
              <div class="select-dropdown" id="selectDropdown">
                @foreach(['60x160' => '60 × 160 cm', '80x200' => '80 × 200 cm', '100x200' => '100 × 200 cm', '120x240' => '120 × 240 cm', '150x300' => '150 × 300 cm', 'custom' => 'Custom'] as $val => $label)
                  <div class="select-option {{ old('jenis') === $val ? 'selected' : '' }}"
                       data-value="{{ $val }}" onclick="pickOption(this)">
                    <span class="option-badge">{{ $loop->iteration === 6 ? '✦' : $loop->iteration }}</span>
                    {{ $label }}
                  </div>
                @endforeach
              </div>
              {{-- [TAMBAH] hidden input wajib ada untuk kirim nilai ke server --}}
              <input type="hidden" name="jenis" id="jenisInput" value="{{ old('jenis') }}">
            </div>
            @error('jenis')<span class="field-error">{{ $message }}</span>@enderror
          </div>

          <!-- NOMOR WHATSAPP -->
          <div class="form-group">
            <label class="form-label">Nomor WhatsApp</label>
            {{-- [UBAH] tambah name="whatsapp", value auto-fill dari $user->whatsapp --}}
            <input class="form-input @error('whatsapp') input-error @enderror"
                   id="phone1" name="whatsapp" type="tel" placeholder="08___"
                   value="{{ old('whatsapp', $user->whatsapp ?? '') }}">
            @error('whatsapp')<span class="field-error">{{ $message }}</span>@enderror
          </div>

          <!-- DESKRIPSI -->
          <div class="form-group">
            <label class="form-label">Deskripsi Pemesanan</label>
            {{-- [UBAH] tambah name="brief" --}}
            <textarea class="form-textarea @error('brief') input-error @enderror"
                      id="pesan" name="brief"
                      placeholder="Tulis deskripsi desain yang kamu inginkan...">{{ old('brief') }}</textarea>
            @error('brief')<span class="field-error">{{ $message }}</span>@enderror
          </div>

          {{-- [UBAH] Tombol jadi type="submit", hapus href --}}
          <button type="submit" class="btn-primary" onclick="return validateForm()">
            Kirim Pesanan
          </button>

        </div>

        <!-- GAMBAR REFERENSI -->
        <div class="ref-panel">
          <div class="ref-box" id="refBox" onclick="triggerUpload()">
            <div class="ref-placeholder" id="refPlaceholder">
              <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.4">
                <rect x="3" y="3" width="18" height="18" rx="3"/>
                <circle cx="8.5" cy="8.5" r="1.5"/>
                <path d="M21 15l-5-5L5 21"/>
              </svg>
              <span>Custom Reference<br>here</span>
            </div>
            <div class="hover-overlay" id="hoverOverlay">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8">
                <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
              </svg>
            </div>
            <img id="refPreview" class="ref-preview" alt="Reference preview">
          </div>
          <button type="button" class="btn-edit" onclick="triggerUpload()">Edit</button>

          {{-- [UBAH] tambah name="referensi" --}}
          <input type="file" id="refFileInput" name="referensi"
                 accept="image/*" onchange="handleRefFile(event)" style="display:none">
          @error('referensi')<span class="field-error" style="text-align:center">{{ $message }}</span>@enderror
        </div>

      </div>
    </form>{{-- [UBAH] tutup </form> bukan </div> --}}
  </div>

  <a class="back-link" href="/dashboard">Back</a>
</div>

<div class="toast" id="toast"></div>

{{-- [TAMBAH] Style tambahan untuk error & sukses --}}
<style>
  .input-error { border-color: #ff4d4d !important; }
  .field-error { display:block; color:#ff4d4d; font-size:0.82rem; margin-top:6px; font-weight:500; }
  .alert-success {
    background:#f0fdf4; border:1.5px solid #86efac; color:#166534;
    border-radius:13px; padding:14px 20px; margin-bottom:24px;
    font-size:0.95rem; font-weight:500;
  }
</style>

<script>
  /* ── Custom Select ── */
  function toggleSelect() {
    const sel = document.getElementById('customSelect');
    sel.classList.toggle('open');
    if (sel.classList.contains('open')) {
      setTimeout(() => document.addEventListener('click', closeOnOutside), 0);
    }
  }
  function closeOnOutside(e) {
    const sel = document.getElementById('customSelect');
    const dd  = document.getElementById('selectDropdown');
    if (!sel.contains(e.target) && !dd.contains(e.target)) {
      sel.classList.remove('open');
      document.removeEventListener('click', closeOnOutside);
    }
  }
  function pickOption(el) {
    document.querySelectorAll('.select-option').forEach(o => o.classList.remove('selected'));
    el.classList.add('selected');
    const value = el.getAttribute('data-value');
    const clone = el.cloneNode(true);
    clone.querySelector('.option-badge').remove();
    const label = document.getElementById('selectLabel');
    label.textContent = clone.textContent.trim();
    label.style.color = 'var(--dark)';
    document.getElementById('jenisInput').value = value; // [TAMBAH] set hidden input
    document.getElementById('customSelect').classList.remove('open');
    document.removeEventListener('click', closeOnOutside);
  }

  /* ── Image Upload ── */
  function triggerUpload() { document.getElementById('refFileInput').click(); }
  function handleRefFile(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
      const img = document.getElementById('refPreview');
      img.src = ev.target.result;
      img.classList.add('visible');
      document.getElementById('refPlaceholder').style.display = 'none';
      document.getElementById('hoverOverlay').classList.add('active');
      showToast('✓ Gambar referensi berhasil dipilih');
    };
    reader.readAsDataURL(file);
  }

  /* ── Validasi client-side sebelum submit ── */
  function validateForm() {
    const nama  = document.getElementById('nama').value.trim();
    const wa    = document.getElementById('phone1').value.trim();
    const pesan = document.getElementById('pesan').value.trim();
    const jenis = document.getElementById('jenisInput').value;
    if (!nama)  { showToast('⚠ Nama belum diisi');  return false; }
    if (!wa)    { showToast('⚠ Nomor WhatsApp belum diisi'); return false; }
    if (!jenis) { showToast('⚠ Pilih ukuran banner dulu'); return false; }
    if (!pesan) { showToast('⚠ Deskripsi belum diisi'); return false; }
    showToast('Mengirim pesanan...');
    return true;
  }

  /* ── Toast ── */
  function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2800);
  }

  @if(session('success'))
    document.addEventListener('DOMContentLoaded', () => showToast('🎉 Pesanan berhasil dikirim!'));
  @endif
</script>
</body>
</html>