<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile - LeLiLu</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Poppins', sans-serif;
      background: #e8e4de;
      min-height: 100vh;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      padding: 48px 20px 80px;
    }

    .profile-card {
      background: #fff;
      border-radius: 20px;
      width: 100%;
      max-width: 900px;
      padding: 40px 40px 36px;
      box-shadow: 0 4px 32px rgba(0,0,0,0.07);
      position: relative;
    }

    .card-body {
      display: flex;
      gap: 0;
    }

    /* LEFT PANEL */
    .left-panel {
      width: 240px;
      flex-shrink: 0;
      padding-right: 40px;
      border-right: 1px solid #ddd;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-bottom: 32px;
    }

    .avatar-wrap {
      position: relative;
      width: 140px;
      height: 140px;
      margin-bottom: 18px;
    }

    .avatar-ring {
      position: absolute;
      inset: -4px;
      border-radius: 50%;
      background: conic-gradient(
        #ff6ec7 0deg, #4dffb4 90deg,
        #6ef0ff 180deg, #f5a623 270deg, #ff6ec7 360deg
      );
      z-index: 0;
    }

    .avatar-placeholder {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      background: linear-gradient(135deg, #ff6ec7, #4dff91, #6ef0ff, #f5a623);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 3rem;
      font-weight: 800;
      color: #fff;
      position: relative;
      z-index: 1;
      border: 4px solid #fff;
    }

    .user-name {
      font-size: 1.25rem;
      font-weight: 800;
      color: #1a1a1a;
      margin-bottom: 4px;
      text-align: center;
    }

    .user-email {
      font-size: 0.78rem;
      color: #aaa;
      text-decoration: underline;
      text-align: center;
    }

    /* RIGHT PANEL */
    .right-panel {
      flex: 1;
      padding-left: 40px;
    }

    .section-title {
      font-size: 1.1rem;
      font-weight: 800;
      color: #1a1a1a;
      margin-bottom: 16px;
    }

    .field-group { margin-bottom: 14px; }

    .field-label {
      font-size: 0.82rem;
      color: #555;
      margin-bottom: 6px;
      display: block;
    }

    .field-input {
      width: 100%;
      padding: 11px 16px;
      border: 1.5px solid #d0d0d0;
      border-radius: 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.85rem;
      color: #333;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
      background: #fff;
    }
    .field-input:focus {
      border-color: #F5C518;
      box-shadow: 0 0 0 3px rgba(245,197,24,0.15);
    }
    .field-input::placeholder { color: #bbb; }
    .field-input.error {
      border-color: #ff4d4d;
      box-shadow: 0 0 0 3px rgba(255,77,77,0.12);
    }

    .input-wrap { position: relative; }
    .input-wrap .field-input { padding-right: 44px; }

    .eye-btn {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: #aaa;
      padding: 0;
      display: flex;
      align-items: center;
      transition: color .2s;
    }

    .field-select {
      width: 100%;
      padding: 11px 16px;
      border: 1.5px solid #d0d0d0;
      border-radius: 10px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.85rem;
      color: #555;
      outline: none;
      background: #fff;
      appearance: none;
      -webkit-appearance: none;
      cursor: pointer;
      transition: border-color 0.2s;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23888' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
    }
    .field-select:focus { border-color: #F5C518; }

    .section-spacer { margin-bottom: 20px; }

    /* BOTTOM ROW */
    .bottom-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 36px;
      padding-top: 8px;
    }

    .btn-kembali {
      background: none;
      border: 1.5px solid #ddd;
      border-radius: 12px;
      padding: 12px 24px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.9rem;
      font-weight: 600;
      color: #555;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s;
      text-decoration: none;
    }
    .btn-kembali:hover {
      border-color: #F5C518;
      color: #1a1a1a;
      background: #fffbea;
      transform: translateX(-3px);
    }
    .btn-kembali:active {
      transform: translateX(0);
    }

    .btn-simpan {
      background: #F5C518;
      border: none;
      border-radius: 14px;
      padding: 18px 52px;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.1rem;
      cursor: pointer;
      color: #1a1a1a;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      white-space: nowrap;
      position: relative;
      overflow: hidden;
    }
    .btn-simpan:hover {
      background: #e6b800;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(245,197,24,0.35);
    }
    .btn-simpan:active {
      transform: translateY(0);
      box-shadow: none;
    }
    .btn-simpan.loading {
      pointer-events: none;
      opacity: .8;
    }

    /* TOAST */
    .toast {
      position: fixed;
      bottom: 28px;
      left: 50%;
      transform: translateX(-50%) translateY(30px);
      padding: 14px 26px;
      border-radius: 50px;
      font-size: 0.88rem;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      z-index: 9999;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: all .35s cubic-bezier(.34,1.56,.64,1);
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .toast.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }
    .toast.success { background: #1a1a1a; color: #fff; }
    .toast.error   { background: #ff4d4d; color: #fff; }

    /* FAB */
    .fab-group {
      position: fixed;
      bottom: 28px;
      right: 28px;
      display: flex;
      gap: 12px;
    }

    .fab {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: #fff;
      border: none;
      box-shadow: 0 2px 12px rgba(0,0,0,0.12);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: #888;
      font-size: 1.1rem;
      transition: box-shadow 0.2s, color .2s;
    }
    .fab:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.18); color: #F5C518; }

    /* shake animation */
    @keyframes shake {
      0%,100% { transform: translateX(0); }
      20%      { transform: translateX(-6px); }
      40%      { transform: translateX(6px); }
      60%      { transform: translateX(-4px); }
      80%      { transform: translateX(4px); }
    }

    @media (max-width: 700px) {
      .card-body { flex-direction: column; }
      .left-panel { width: 100%; border-right: none; border-bottom: 1px solid #ddd; padding-right: 0; padding-bottom: 28px; margin-bottom: 28px; }
      .right-panel { padding-left: 0; }
      .bottom-row { flex-direction: column; gap: 12px; align-items: stretch; }
      .btn-kembali, .btn-simpan { justify-content: center; }
    }
  </style>
</head>
<body>

<div class="profile-card">
  <div class="card-body">

    <!-- LEFT PANEL -->
    <div class="left-panel">
      <div class="avatar-wrap">
        <div class="avatar-ring"></div>
        <div class="avatar-placeholder">KM</div>
      </div>
      <div class="user-name">Lastyellow22</div>
      <div class="user-email">sonn23@gmail.com</div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">

      <!-- Identitas -->
      <div class="section-title">Identitas Pengguna</div>
      <div class="field-group">
        <label class="field-label">Nama Pengguna</label>
        <input type="text" class="field-input" id="username" value="@lastyellow22"/>
      </div>
      <div class="field-group section-spacer">
        <label class="field-label">Email</label>
        <input type="email" class="field-input" id="email" placeholder="sonn23@gmail.com"/>
      </div>

      <!-- Password -->
      <div class="section-title">Password</div>
      <div class="field-group">
        <label class="field-label">Masukan Password lama</label>
        <div class="input-wrap">
          <input type="password" class="field-input" id="pass-old" placeholder="••••••••"/>
          <button class="eye-btn" onclick="togglePass('pass-old', this)" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
      </div>
      <div class="field-group">
        <label class="field-label">Buat Password baru</label>
        <div class="input-wrap">
          <input type="password" class="field-input" id="pass-new" placeholder="••••••••"/>
          <button class="eye-btn" onclick="togglePass('pass-new', this)" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
      </div>
      <div class="field-group section-spacer">
        <label class="field-label">Konfirmasi Password</label>
        <div class="input-wrap">
          <input type="password" class="field-input" id="pass-confirm" placeholder="••••••••"/>
          <button class="eye-btn" onclick="togglePass('pass-confirm', this)" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
        </div>
      </div>

      <!-- Bahasa -->
      <div class="section-title">Bahasa</div>
      <div class="field-group">
        <select class="field-select" id="bahasa">
          <option value="id" selected>Indonesia</option>
          <option value="en">English</option>
          <option value="ms">Melayu</option>
        </select>
      </div>

    </div>
  </div>

  <!-- BOTTOM ROW -->
  <div class="bottom-row">
    <a href="/dashboard"><button class="btn-kembali" onclick="handleKembali()"></a>
      &#8592; Kembali
    </button>
    <button class="btn-simpan" id="btnSimpan" onclick="handleSimpan()">
      Simpan
    </button>
  </div>
</div>

<!-- FAB BUTTONS -->
<div class="fab-group">
  <button class="fab" title="Riwayat">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.51"/></svg>
  </button>
  <button class="fab" title="Pesan">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
  </button>
</div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<script>
  /* ── Toggle password visibility ── */
  function togglePass(id, btn) {
    const input = document.getElementById(id);
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    btn.style.color = isHidden ? '#F5C518' : '#aaa';
  }

  /* ── Kembali ── */
  function handleKembali() {
    if (history.length > 1) {
      history.back();
    } else {
      // fallback jika tidak ada halaman sebelumnya
      window.location.href = '/dashboard';
    }
  }

  /* ── Simpan ── */
  function handleSimpan() {
    const username    = document.getElementById('username').value.trim();
    const email       = document.getElementById('email').value.trim();
    const passOld     = document.getElementById('pass-old').value;
    const passNew     = document.getElementById('pass-new').value;
    const passConfirm = document.getElementById('pass-confirm').value;

    // reset error styles
    ['username','email','pass-old','pass-new','pass-confirm'].forEach(id => {
      document.getElementById(id).classList.remove('error');
    });

    // validasi username
    if (!username) {
      shakeField('username');
      showToast('⚠ Nama pengguna tidak boleh kosong', 'error');
      return;
    }

    // validasi email
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      shakeField('email');
      showToast('⚠ Format email tidak valid', 'error');
      return;
    }

    // validasi password (hanya jika diisi)
    if (passNew || passConfirm || passOld) {
      if (!passOld) {
        shakeField('pass-old');
        showToast('⚠ Masukkan password lama terlebih dahulu', 'error');
        return;
      }
      if (passNew.length < 6) {
        shakeField('pass-new');
        showToast('⚠ Password baru minimal 6 karakter', 'error');
        return;
      }
      if (passNew !== passConfirm) {
        shakeField('pass-confirm');
        showToast('⚠ Konfirmasi password tidak cocok', 'error');
        return;
      }
    }

    // simulasi loading
    const btn = document.getElementById('btnSimpan');
    btn.classList.add('loading');
    btn.textContent = 'Menyimpan...';

    setTimeout(() => {
      btn.classList.remove('loading');
      btn.textContent = 'Simpan';
      showToast('✓ Perubahan berhasil disimpan!', 'success');

      // reset password fields setelah simpan
      document.getElementById('pass-old').value     = '';
      document.getElementById('pass-new').value     = '';
      document.getElementById('pass-confirm').value = '';
    }, 1200);
  }

  /* ── Helpers ── */
  function shakeField(id) {
    const el = document.getElementById(id);
    el.classList.add('error');
    el.style.animation = 'none';
    requestAnimationFrame(() => { el.style.animation = 'shake 0.4s ease'; });
    setTimeout(() => {
      el.classList.remove('error');
      el.style.animation = '';
    }, 1400);
  }

  let toastTimer;
  function showToast(msg, type = 'success') {
    const t = document.getElementById('toast');
    clearTimeout(toastTimer);
    t.textContent = msg;
    t.className = `toast ${type} show`;
    toastTimer = setTimeout(() => { t.classList.remove('show'); }, 3000);
  }
</script>
</body>
</html>