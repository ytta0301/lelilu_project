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

    .user-telpon {
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
    .btn-kembali:active { transform: translateX(0); }

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
    .btn-simpan:active { transform: translateY(0); box-shadow: none; }
    .btn-simpan.loading { pointer-events: none; opacity: .8; }

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
    .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }
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

    @keyframes shake {
      0%,100% { transform: translateX(0); }
      20%      { transform: translateX(-6px); }
      40%      { transform: translateX(6px); }
      60%      { transform: translateX(-4px); }
      80%      { transform: translateX(4px); }
    }

    @media (max-width: 900px) {
      .profile-card { padding: 32px 32px 28px; }
      .card-body { gap: 0; }
      .left-panel { width: 200px; padding-right: 28px; }
      .avatar-wrap { width: 120px; height: 120px; }
      .avatar-ring { inset: -3px; }
      .avatar-placeholder { width: 120px; height: 120px; font-size: 2.5rem; border-width: 3px; }
      .user-name { font-size: 1.1rem; }
      .right-panel { padding-left: 28px; }
      .section-title { font-size: 1rem; }
      .field-input { padding: 10px 14px; font-size: 0.82rem; }
      .btn-kembali { padding: 10px 20px; font-size: 0.85rem; }
      .btn-simpan { padding: 16px 44px; font-size: 1rem; }
    }

    @media (max-width: 700px) {
      body { padding: 32px 16px 60px; }
      .profile-card { padding: 24px 20px 24px; border-radius: 16px; max-width: 100%; }
      .card-body { flex-direction: column; }
      .left-panel { 
        width: 100%; 
        border-right: none; 
        border-bottom: 1px solid #ddd; 
        padding-right: 0; 
        padding-bottom: 20px; 
        margin-bottom: 20px;
        flex-direction: row;
        justify-content: flex-start;
        gap: 16px;
        align-items: center;
      }
      .avatar-wrap { width: 100px; height: 100px; margin-bottom: 0; flex-shrink: 0; }
      .avatar-ring { inset: -2px; }
      .avatar-placeholder { width: 100px; height: 100px; font-size: 2rem; border-width: 3px; }
      .user-info { text-align: left; }
      .user-name { font-size: 1.05rem; text-align: left; }
      .user-telpon { font-size: 0.72rem; text-align: left; }
      .right-panel { padding-left: 0; }
      .section-title { font-size: 0.95rem; margin-bottom: 12px; }
      .field-group { margin-bottom: 12px; }
      .field-label { font-size: 0.78rem; margin-bottom: 5px; }
      .field-input { padding: 9px 12px; font-size: 0.8rem; border-radius: 8px; }
      .field-select { padding: 9px 12px; font-size: 0.8rem; border-radius: 8px; background-position: right 12px center; }
      .input-wrap .field-input { padding-right: 36px; }
      .eye-btn { right: 10px; }
      .eye-btn svg { width: 16px; height: 16px; }
      .section-spacer { margin-bottom: 16px; }
      .bottom-row { 
        flex-direction: column; 
        gap: 12px; 
        align-items: stretch; 
        margin-top: 28px;
        padding-top: 6px;
      }
      .btn-kembali, .btn-simpan { justify-content: center; }
      .btn-kembali { padding: 10px 20px; font-size: 0.85rem; border-radius: 10px; }
      .btn-simpan { padding: 14px 36px; font-size: 0.95rem; border-radius: 12px; }
      .fab-group { bottom: 20px; right: 20px; gap: 10px; }
      .fab { width: 44px; height: 44px; font-size: 1rem; }
      .toast { bottom: 20px; padding: 12px 20px; font-size: 0.82rem; border-radius: 40px; }
    }

    @media (max-width: 480px) {
      body { padding: 24px 12px 50px; }
      .profile-card { padding: 20px 14px 20px; border-radius: 14px; }
      .left-panel { padding-bottom: 16px; margin-bottom: 16px; gap: 12px; }
      .avatar-wrap { width: 80px; height: 80px; }
      .avatar-ring { inset: -2px; }
      .avatar-placeholder { width: 80px; height: 80px; font-size: 1.6rem; border-width: 2px; }
      .user-name { font-size: 0.95rem; }
      .user-telpon { font-size: 0.68rem; }
      .right-panel { padding-left: 0; }
      .section-title { font-size: 0.9rem; margin-bottom: 10px; }
      .field-group { margin-bottom: 10px; }
      .field-label { font-size: 0.74rem; margin-bottom: 4px; }
      .field-input { padding: 8px 10px; font-size: 0.78rem; border-radius: 8px; }
      .field-select { padding: 8px 10px; font-size: 0.78rem; border-radius: 8px; background-position: right 10px center; }
      .input-wrap .field-input { padding-right: 32px; }
      .eye-btn { right: 8px; }
      .eye-btn svg { width: 14px; height: 14px; }
      .section-spacer { margin-bottom: 12px; }
      .bottom-row { margin-top: 24px; gap: 10px; }
      .btn-kembali { padding: 10px 16px; font-size: 0.8rem; border-radius: 8px; }
      .btn-simpan { padding: 12px 28px; font-size: 0.9rem; border-radius: 10px; }
      .fab-group { bottom: 16px; right: 16px; gap: 8px; }
      .fab { width: 40px; height: 40px; font-size: 0.9rem; }
      .toast { bottom: 16px; padding: 10px 16px; font-size: 0.76rem; border-radius: 30px; }
    }

    @media (max-width: 360px) {
      .profile-card { padding: 16px 10px 18px; border-radius: 12px; }
      .left-panel { gap: 10px; }
      .avatar-wrap { width: 70px; height: 70px; }
      .avatar-placeholder { width: 70px; height: 70px; font-size: 1.4rem; }
      .user-name { font-size: 0.9rem; }
      .btn-kembali { padding: 8px 14px; font-size: 0.75rem; }
      .btn-simpan { padding: 10px 24px; font-size: 0.85rem; }
      .fab { width: 36px; height: 36px; font-size: 0.85rem; }
    }
  </style>
</head>
<body>

<div class="profile-card">

  {{-- ✅ FORM Laravel: action ke route profile.update dengan ID user --}}
  <form action="{{ route('profile.update', $user->id_user) }}" method="POST" id="profileForm">
    @csrf
    @method('PUT')

    <div class="card-body">

      <!-- LEFT PANEL -->
      <div class="left-panel">
        <div class="avatar-wrap">
          <div class="avatar-ring"></div>
          {{-- Ambil 2 huruf pertama nama user untuk avatar --}}
          <div class="avatar-placeholder">
            {{ strtoupper(substr($user->name, 0, 2)) }}
          </div>
        </div>
        {{-- Tampilkan nama & whatsapp dari database --}}
        <div class="user-name">{{ $user->name }}</div>
        <div class="user-telpon">{{ $user->whatsapp }}</div>
      </div>

      <!-- RIGHT PANEL -->
      <div class="right-panel">

        <!-- Notifikasi dari Laravel (muncul via JS toast di bawah) -->
        @if(session('success'))
          <script>
            window.addEventListener('DOMContentLoaded', () => {
              showToast('✓ {{ session("success") }}', 'success');
            });
          </script>
        @endif

        @if($errors->any())
          <script>
            window.addEventListener('DOMContentLoaded', () => {
              showToast('⚠ {{ $errors->first() }}', 'error');
            });
          </script>
        @endif

        <!-- Identitas -->
        <div class="section-title">Identitas Pengguna</div>

        <div class="field-group">
          <label class="field-label">Nama Pengguna</label>
          {{-- name="name" → dikirim ke controller, value dari DB --}}
          <input type="text" class="field-input" id="username"
                 name="name"
                 value="{{ old('name', $user->name) }}"/>
        </div>

        <div class="field-group section-spacer">
          <label class="field-label">Whatsapp</label>
          {{-- name="whatsapp" → dikirim ke controller, value dari DB --}}
          <input type="text" class="field-input" id="whatsapp"
                 name="whatsapp"
                 value="{{ old('whatsapp', $user->whatsapp) }}"
                 placeholder="Masukkan nomor Whatsapp"/>
        </div>

        <!-- Password -->
        <div class="section-title">Password</div>

        <div class="field-group">
          <label class="field-label">Masukan Password lama</label>
          <div class="input-wrap">
            {{-- name="old_password" → dicek di controller pakai Hash::check --}}
            <input type="password" class="field-input" id="pass-old"
                   name="old_password" placeholder="••••••••" autocomplete="off" />
            <button class="eye-btn" onclick="togglePass('pass-old', this)" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>

        <div class="field-group">
          <label class="field-label">Buat Password baru</label>
          <div class="input-wrap">
            {{-- name="new_password" → di-hash di controller --}}
            <input type="password" class="field-input" id="pass-new"
                   name="new_password" placeholder="••••••••" autocomplete="new-password"/>
            <button class="eye-btn" onclick="togglePass('pass-new', this)" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>

        <div class="field-group section-spacer">
          <label class="field-label">Konfirmasi Password</label>
          <div class="input-wrap">
            {{-- name="new_password_confirmation" → harus sama dengan new_password --}}
            <input type="password" class="field-input" id="pass-confirm"
                   name="new_password_confirmation" placeholder="••••••••" autocomplete="new-password"/>
            <button class="eye-btn" onclick="togglePass('pass-confirm', this)" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>

        <!-- Bahasa -->
        <div class="section-title">Bahasa</div>
        <div class="field-group">
          {{-- name="bahasa" → disimpan ke kolom bahasa di tabel users --}}
          <select class="field-select" id="bahasa" name="bahasa">
            <option value="id" {{ old('bahasa', $user->bahasa ?? 'id') == 'id' ? 'selected' : '' }}>Indonesia</option>
            <option value="en" {{ old('bahasa', $user->bahasa ?? '') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ms" {{ old('bahasa', $user->bahasa ?? '') == 'ms' ? 'selected' : '' }}>Melayu</option>
          </select>
        </div>

      </div>
    </div>

    <!-- BOTTOM ROW -->
    <div class="bottom-row">
      {{-- Kembali ke halaman sebelumnya --}}
      <a href="/dashboard"  class="btn-kembali">&#8592; Kembali</a>

      {{-- Tombol Simpan: validasi JS dulu, baru submit form --}}
      <button type="button" class="btn-simpan" id="btnSimpan" onclick="handleSimpan()">
        Simpan
      </button>
    </div>

  </form>
  {{-- akhir form --}}

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

  /* ── Simpan: validasi JS dulu → baru submit form ke Laravel ── */
  function handleSimpan() {
    const username    = document.getElementById('username').value.trim();
    const whatsapp       = document.getElementById('whatsapp').value.trim();
    const passOld     = document.getElementById('pass-old').value;
    const passNew     = document.getElementById('pass-new').value;
    const passConfirm = document.getElementById('pass-confirm').value;

    // reset error styles
    ['username','whatsapp','pass-old','pass-new','pass-confirm'].forEach(id => {
      document.getElementById(id).classList.remove('error');
    });

    // validasi username
    if (!username) {
      shakeField('username');
      showToast('⚠ Nama pengguna tidak boleh kosong', 'error');
      return;
    }

    // validasi whatsapp
    if (whatsapp && !/^\d{10,15}$/.test(whatsapp)) {
      shakeField('whatsapp');
      showToast('⚠ Format nomor Whatsapp tidak valid', 'error');
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

    // ✅ Semua validasi lolos → loading state → submit ke Laravel
    const btn = document.getElementById('btnSimpan');
    btn.classList.add('loading');
    btn.textContent = 'Menyimpan...';

    document.getElementById('profileForm').submit();
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