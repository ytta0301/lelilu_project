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
    grid-template-columns: 1fr 320px;
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
    font-weight: 600;
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

  /* ── GALLERY ── */
  .gallery {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto;
    gap: 10px;
  }

  .gallery-item {
    border-radius: 14px;
    overflow: hidden;
    position: relative;
    background: #e0ddd8;
  }
  .gallery-item.wide {
    grid-column: 1 / -1;
    aspect-ratio: 16 / 9;
  }
  .gallery-item.tall {
    aspect-ratio: 3 / 4;
  }
  .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.35s ease;
  }
  .gallery-item:hover img { transform: scale(1.04); }

  .gallery-label {
    position: absolute;
    bottom: 8px;
    left: 10px;
    font-size: 0.7rem;
    color: #fff;
    background: rgba(0,0,0,0.32);
    padding: 2px 8px;
    border-radius: 20px;
    backdrop-filter: blur(4px);
  }

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
  @media (max-width: 680px) {
    .wrapper { padding: 36px 20px; }
    .page-title { font-size: 2.2rem; }
    .card { padding: 28px 20px 32px; }
    .order-layout { grid-template-columns: 1fr; }
    .gallery { display: none; }
  }
</style>
</head>
<body>

<div class="wrapper">
  <!-- HEADER -->
  <h1 class="page-title">
    <strong>Order</strong> <em>Page</em>
  </h1>
  <p class="page-subtitle">
    Buat design sesuai dengan keinginanmu,<br>
    kami siap melayani <strong>!!</strong>
  </p>

  <!-- CARD -->
  <div class="card">
    <p class="card-title">Form Pemesanan</p>

    <div class="order-layout">

      <!-- LEFT: FORM -->
      <div class="form-col">

        <!-- NAMA -->
        <div class="form-group">
          <label class="form-label">Nama</label>
          <input class="form-input" id="nama" type="text" placeholder="Nama kamu">
        </div>

        <!-- LAYANAN -->
        <div class="form-group">
          <label class="form-label">Layanan</label>
          <div class="select-wrapper">
            <div class="custom-select" id="customSelect" onclick="toggleSelect()">
              <span id="selectLabel">Art Comission</span>
              <span class="select-arrow">&#8964;</span>
            </div>
            <div class="select-dropdown" id="selectDropdown">
              <div class="select-option selected" data-value="1" onclick="pickOption(this)">
                <span class="option-badge">1</span> Art Comission
              </div>
              <div class="select-option" data-value="2" onclick="pickOption(this)">
                <span class="option-badge">2</span> Logo Design
              </div>
              <div class="select-option" data-value="3" onclick="pickOption(this)">
                <span class="option-badge">3</span> Poster Design
              </div>
            </div>
          </div>
        </div>

        <!-- PESAN -->
        <div class="form-group">
          <label class="form-label">Pesan</label>
          <textarea class="form-textarea" id="pesan" placeholder="Jelaskan Kebutuhan kamu..."></textarea>
        </div>

        <a href="/payment"><button class="btn-primary" onclick="submitOrder()">Kirim Pesanan</button></a>
      </div>

      <!-- RIGHT: GALLERY -->
      <div class="gallery">
        <!-- Wide top image -->
        <div class="gallery-item wide">
          <img
            src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80"
            alt="By Fahri"
            onerror="this.parentElement.style.background='linear-gradient(135deg,#d4e8f5,#a8c8e0)'">
          <span class="gallery-label">By Fahri</span>
        </div>
        <!-- Bottom left -->
        <div class="gallery-item tall">
          <img
            src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&q=80"
            alt="By Tyara"
            onerror="this.parentElement.style.background='linear-gradient(135deg,#c8e0d4,#a0c0b0)'">
          <span class="gallery-label">By Tyara</span>
        </div>
        <!-- Bottom right -->
        <div class="gallery-item tall">
          <img
            src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?w=400&q=80"
            alt="Art Work"
            onerror="this.parentElement.style.background='linear-gradient(135deg,#e8d4c0,#c0a080)'">
        </div>
      </div>

    </div><!-- /order-layout -->
  </div><!-- /card -->

  <a class="back-link" href="/dashbord">Back</a>
</div>

<!-- TOAST -->
<div class="toast" id="toast">🎉 Pesanan berhasil dikirim!</div>

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
    document.getElementById('selectLabel').textContent = el.textContent.trim();
    document.getElementById('customSelect').classList.remove('open');
    document.removeEventListener('click', closeOnOutside);
  }

  /* ── Submit ── */
  function submitOrder() {
    const nama  = document.getElementById('nama').value.trim();
    const pesan = document.getElementById('pesan').value.trim();
    if (!nama)  { shakeEl('nama');  return; }
    if (!pesan) { shakeEl('pesan'); return; }
    showToast();
    setTimeout(() => {
      document.getElementById('nama').value  = '';
      document.getElementById('pesan').value = '';
    }, 2200);
  }

  function shakeEl(id) {
    const el = document.getElementById(id);
    el.style.borderColor = '#ff4d4d';
    el.style.boxShadow   = '0 0 0 3px rgba(255,77,77,0.15)';
    el.style.animation   = 'none';
    requestAnimationFrame(() => { el.style.animation = 'shake 0.4s ease'; });
    setTimeout(() => { el.style.borderColor = ''; el.style.boxShadow = ''; }, 1200);
  }

  function showToast() {
    const t = document.getElementById('toast');
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
  }
</script>
</body>
</html>