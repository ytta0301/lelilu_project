<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Page</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --yellow: #F5C800;
    --yellow-dark: #e0b400;
    --dark: #2a2a2a;
    --gray: #7a7a7a;
    --border: #e2e2e2;
    --white: #fff;
    --bg: #f9f9f7;
    --radius: 18px;
    --shadow: 0 4px 40px rgba(0,0,0,0.07);
  }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--dark);
    min-height: 100vh;
  }

  .wrapper {
    max-width: 900px;
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
    font-size: 0.92rem;
    line-height: 1.6;
    margin-bottom: 44px;
  }

  /* ── CARD ── */
  .card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 40px 44px 44px;
    max-width: 620px;
    margin: 0 auto;
  }

  .card-title {
    font-size: 1.15rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 32px;
    letter-spacing: -0.01em;
  }

  /* ── FORM ── */
  .form-group { margin-bottom: 24px; }

  .form-label {
    display: block;
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 10px;
    color: var(--dark);
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
  .form-textarea:focus,
  .custom-select.open {
    border-color: var(--yellow);
    box-shadow: 0 0 0 3px rgba(245,200,0,0.18);
  }

  .form-textarea {
    resize: none;
    height: 170px;
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
  .custom-select:focus-within,
  .custom-select.open {
    border-color: var(--yellow);
    box-shadow: 0 0 0 3px rgba(245,200,0,0.18);
  }

  .select-arrow {
    font-size: 0.85rem;
    transition: transform 0.25s;
    color: var(--dark);
  }
  .custom-select.open .select-arrow { transform: rotate(180deg); }

  .select-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 6px);
    left: 0;
    right: 0;
    background: var(--white);
    border: 1.5px solid var(--border);
    border-radius: 13px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
    z-index: 10;
    overflow: hidden;
    animation: dropIn 0.2s ease;
  }
  @keyframes dropIn {
    from { opacity: 0; transform: translateY(-6px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .custom-select.open + .select-dropdown { display: block; }

  .select-option {
    padding: 14px 18px;
    cursor: pointer;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: background 0.15s;
  }
  .select-option:hover { background: #fffbea; }
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

  /* ── BUTTON ── */
  .btn-primary {
    display: block;
    width: 100%;
    background: var(--yellow);
    color: var(--dark);
    border: none;
    padding: 17px;
    border-radius: 50px;
    font-family: 'DM Sans', sans-serif;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    margin-top: 8px;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
  }
  .btn-primary:hover {
    background: var(--yellow-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(245,200,0,0.35);
  }
  .btn-primary:active { transform: translateY(0); box-shadow: none; }

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

  /* ── SUCCESS TOAST ── */
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
    to { transform: translateX(-50%) translateY(0); opacity: 1; }
    from { transform: translateX(-50%) translateY(20px); opacity: 0; }
  }

  @media (max-width: 600px) {
    .wrapper { padding: 36px 20px; }
    .page-title { font-size: 2.2rem; }
    .card { padding: 28px 20px 32px; }
  }
</style>
</head>
<body>

<div class="wrapper">
  <!-- HEADER -->
  <h1 class="page-title">
    <strong>Payment</strong> <em>Page</em>
  </h1>
  <p class="page-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt</p>

  <!-- CARD -->
  <div class="card">
    <p class="card-title">Form Pemesanan</p>

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

    <button class="btn-primary" onclick="submitOrder()">Kirim Pesanan</button>
  </div>

  <a class="back-link" href="/order">Back</a>
</div>

<!-- TOAST -->
<div class="toast" id="toast">🎉 Pesanan berhasil dikirim!</div>

<script>
  let selectedValue = '1';
  let selectedText  = 'Art Comission';

  function toggleSelect() {
    const sel = document.getElementById('customSelect');
    sel.classList.toggle('open');
    // close on outside click
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
    // update selection state
    document.querySelectorAll('.select-option').forEach(o => o.classList.remove('selected'));
    el.classList.add('selected');

    selectedValue = el.dataset.value;
    selectedText  = el.textContent.trim();
    document.getElementById('selectLabel').textContent = selectedText;

    document.getElementById('customSelect').classList.remove('open');
    document.removeEventListener('click', closeOnOutside);
  }

  function submitOrder() {
    const nama  = document.getElementById('nama').value.trim();
    const pesan = document.getElementById('pesan').value.trim();

    if (!nama)  { shake('nama');  return; }
    if (!pesan) { shake('pesan'); return; }

    showToast();
    setTimeout(() => {
      document.getElementById('nama').value  = '';
      document.getElementById('pesan').value = '';
    }, 2000);
  }

  function shake(id) {
    const el = document.getElementById(id);
    el.style.borderColor = '#ff4d4d';
    el.style.animation   = 'none';
    requestAnimationFrame(() => {
      el.style.animation = 'shake 0.4s ease';
    });
    setTimeout(() => { el.style.borderColor = ''; }, 1200);
  }

  function showToast() {
    const t = document.getElementById('toast');
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
  }
</script>

<style>
@keyframes shake {
  0%,100% { transform: translateX(0); }
  20%      { transform: translateX(-6px); }
  40%      { transform: translateX(6px); }
  60%      { transform: translateX(-4px); }
  80%      { transform: translateX(4px); }
}
</style>
</body>
</html>