<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manajemen User – Web Archive</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --sidebar-bg: #1e2330;
      --sidebar-active: #e84040;
      --sidebar-text: #8b93a7;
      --sidebar-text-active: #ffffff;
      --sidebar-width: 220px;
      --topbar-h: 60px;
      --bg: #f3f4f8;
      --card-bg: #ffffff;
      --text-primary: #1a1d27;
      --text-secondary: #6b7280;
      --border: #e5e7eb;
      --accent: #e84040;
      --accent-hover: #c93333;
      --shadow: 0 1px 4px rgba(0,0,0,0.07);
      --radius: 10px;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--bg);
      color: var(--text-primary);
      display: flex;
      min-height: 100vh;
    }

    /* ── SIDEBAR ── */
    .sidebar {
      width: var(--sidebar-width);
      background: var(--sidebar-bg);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0; left: 0; bottom: 0;
      z-index: 100;
    }

    .sidebar-logo {
      padding: 20px 20px 16px;
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .sidebar-logo .logo-title {
      font-size: 15px;
      font-weight: 700;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .sidebar-logo .logo-title .logo-icon {
      width: 28px; height: 28px;
      background: var(--sidebar-active);
      border-radius: 6px;
      display: grid;
      place-items: center;
      flex-shrink: 0;
    }
    .sidebar-logo .logo-title .logo-icon svg { width: 15px; height: 15px; fill: #fff; }
    .sidebar-logo .logo-sub {
      font-size: 11px;
      color: var(--sidebar-text);
      margin-top: 3px;
      padding-left: 36px;
    }

    .sidebar-nav {
      flex: 1;
      padding: 12px 10px;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 9px 12px;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 500;
      color: var(--sidebar-text);
      cursor: pointer;
      transition: background .15s, color .15s;
      text-decoration: none;
    }
    .nav-item svg { width: 17px; height: 17px; flex-shrink: 0; }
    .nav-item:hover { background: rgba(255,255,255,0.06); color: #fff; }
    .nav-item.active { background: var(--sidebar-active); color: #fff; }

    .sidebar-footer {
      padding: 12px 10px 20px;
      border-top: 1px solid rgba(255,255,255,0.06);
    }
    .nav-item.logout { color: #8b93a7; }
    .nav-item.logout:hover { color: #ff6b6b; background: rgba(232,64,64,.1); }

    /* ── COLLAPSE BUTTON ── */
    .collapse-btn {
      position: absolute;
      top: 20px;
      right: -12px;
      width: 24px; height: 24px;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 50%;
      display: grid;
      place-items: center;
      cursor: pointer;
      box-shadow: 0 1px 4px rgba(0,0,0,.1);
    }
    .collapse-btn svg { width: 12px; height: 12px; stroke: #6b7280; }

    /* ── MAIN ── */
    .main {
      /* margin-left: var(--sidebar-width); */
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* ── TOPBAR ── */
    .topbar {
      height: var(--topbar-h);
      background: var(--card-bg);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      position: sticky; top: 0; z-index: 50;
    }
    .topbar-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--text-primary);
    }
    .topbar-user {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      padding: 6px 10px;
      border-radius: 8px;
      transition: background .15s;
    }
    .topbar-user:hover { background: var(--bg); }
    .topbar-avatar {
      width: 34px; height: 34px;
      background: var(--accent);
      border-radius: 50%;
      display: grid;
      place-items: center;
    }
    .topbar-avatar svg { width: 18px; height: 18px; fill: #fff; }
    .topbar-info { text-align: right; }
    .topbar-name { font-size: 13px; font-weight: 600; color: var(--text-primary); }
    .topbar-role { font-size: 11px; color: var(--text-secondary); }
    .chevron { width: 14px; height: 14px; stroke: var(--text-secondary); }

    /* ── CONTENT ── */
    .content {
      padding: 28px;
      flex: 1;
    }

    /* ── CARD ── */
    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      border: 1px solid var(--border);
      overflow: hidden;
      animation: fadeUp .35s ease both;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(12px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 24px 16px;
    }
    .card-title {
      font-size: 16px;
      font-weight: 700;
      color: var(--text-primary);
    }

    .btn-add {
      display: flex;
      align-items: center;
      gap: 7px;
      background: var(--text-primary);
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 9px 16px;
      font-size: 13px;
      font-weight: 600;
      font-family: inherit;
      cursor: pointer;
      transition: background .15s, transform .1s;
    }
    .btn-add:hover { background: #2d3346; transform: translateY(-1px); }
    .btn-add svg { width: 15px; height: 15px; }

    /* ── TABLE ── */
    table {
      width: 100%;
      border-collapse: collapse;
    }
    thead tr {
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
    }
    thead th {
      padding: 11px 24px;
      text-align: left;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--text-secondary);
      background: #fafafa;
    }
    tbody tr {
      border-bottom: 1px solid var(--border);
      transition: background .12s;
    }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #fafbff; }
    tbody td {
      padding: 14px 24px;
      font-size: 13.5px;
      color: var(--text-primary);
    }

    /* ── ROLE BADGES ── */
    .badge {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }
    .badge-admin    { background: #fce8e8; color: #d63030; }
    .badge-user     { background: #e8f0fe; color: #3b5ec6; }
    .badge-stafftu  { background: #e8f5ea; color: #2e7d32; }
    .badge-kepala   { background: #f3e8fd; color: #7b1fa2; }

    /* ── ACTION BUTTONS ── */
    .aksi { display: flex; align-items: center; gap: 8px; }
    .btn-icon {
      width: 32px; height: 32px;
      border: none;
      border-radius: 7px;
      display: grid;
      place-items: center;
      cursor: pointer;
      transition: background .15s, transform .1s;
    }
    .btn-icon:hover { transform: scale(1.1); }
    .btn-edit  { background: #fff3e0; }
    .btn-edit svg  { stroke: #e67e22; width: 15px; height: 15px; }
    .btn-edit:hover  { background: #ffe0b2; }
    .btn-del   { background: #fdecea; }
    .btn-del svg   { stroke: #e53935; width: 15px; height: 15px; }
    .btn-del:hover   { background: #ffcdd2; }

    /* ── MODAL ── */
    .modal-overlay {
      position: fixed; inset: 0;
      background: rgba(0,0,0,.35);
      display: flex; align-items: center; justify-content: center;
      z-index: 200;
      opacity: 0; pointer-events: none;
      transition: opacity .2s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal {
      background: #fff;
      border-radius: 14px;
      padding: 28px 28px 24px;
      width: 420px;
      max-width: 95vw;
      box-shadow: 0 20px 60px rgba(0,0,0,.18);
      transform: scale(.96) translateY(8px);
      transition: transform .2s;
    }
    .modal-overlay.open .modal { transform: scale(1) translateY(0); }
    .modal-header {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 22px;
    }
    .modal-title { font-size: 16px; font-weight: 700; }
    .modal-close {
      width: 30px; height: 30px;
      border: none; background: #f3f4f8;
      border-radius: 7px; cursor: pointer;
      display: grid; place-items: center;
    }
    .modal-close svg { width: 14px; height: 14px; stroke: #6b7280; }
    .form-group { margin-bottom: 16px; }
    .form-label { font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; display: block; }
    .form-input, .form-select {
      width: 100%;
      padding: 9px 12px;
      border: 1.5px solid var(--border);
      border-radius: 8px;
      font-size: 13.5px;
      font-family: inherit;
      color: var(--text-primary);
      outline: none;
      transition: border-color .15s;
    }
    .form-input:focus, .form-select:focus { border-color: var(--accent); }
    .modal-actions { display: flex; gap: 10px; margin-top: 22px; justify-content: flex-end; }
    .btn-cancel {
      padding: 9px 18px; border-radius: 8px; border: 1.5px solid var(--border);
      background: #fff; font-size: 13px; font-weight: 600; font-family: inherit;
      cursor: pointer; transition: background .15s;
    }
    .btn-cancel:hover { background: #f3f4f8; }
    .btn-save {
      padding: 9px 20px; border-radius: 8px; border: none;
      background: var(--accent); color: #fff;
      font-size: 13px; font-weight: 600; font-family: inherit;
      cursor: pointer; transition: background .15s;
    }
    .btn-save:hover { background: var(--accent-hover); }

    /* ── CONFIRM DIALOG ── */
    .confirm-body { font-size: 13.5px; color: var(--text-secondary); margin-bottom: 6px; }
    .confirm-name { font-weight: 700; color: var(--text-primary); }
    .btn-danger {
      padding: 9px 20px; border-radius: 8px; border: none;
      background: #e53935; color: #fff;
      font-size: 13px; font-weight: 600; font-family: inherit;
      cursor: pointer; transition: background .15s;
    }
    .btn-danger:hover { background: #c62828; }

    /* ── TOAST ── */
    .toast {
      position: fixed; bottom: 24px; right: 24px;
      background: #1e2330; color: #fff;
      padding: 12px 18px; border-radius: 10px;
      font-size: 13px; font-weight: 500;
      box-shadow: 0 6px 20px rgba(0,0,0,.2);
      opacity: 0; transform: translateY(10px);
      transition: opacity .2s, transform .2s;
      z-index: 300;
    }
    .toast.show { opacity: 1; transform: translateY(0); }

    /* ── RESPONSIVE ── */
    @media (max-width: 992px) {
      .content { padding: 20px; }
      .card-header { flex-wrap: wrap; gap: 12px; }
    }

    @media (max-width: 768px) {
      body { overflow-x: hidden; }
      .content { padding: 16px; }
      .topbar { padding: 0 16px; }
      .topbar-title { font-size: 13px; }
      .card { border-radius: 12px; overflow-x: auto; }
      .card-header { padding: 14px 16px 12px; }
      .card-title { font-size: 14px; }
      .btn-add { padding: 7px 12px; font-size: 12px; }
      table { min-width: 500px; }
      thead th { padding: 9px 16px; font-size: 10px; }
      tbody td { padding: 10px 16px; font-size: 12px; }
      .badge { font-size: 10px; padding: 2px 8px; }
      .btn-icon { width: 28px; height: 28px; }
      .modal { width: 90vw; padding: 20px; }
    }

    @media (max-width: 480px) {
      .content { padding: 12px; }
      .card-header { flex-direction: column; align-items: stretch; }
      .btn-add { justify-content: center; }
    }
  </style>
    <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --sidebar-w: 180px;
      --sidebar-bg: #2e4057;
      --sidebar-active: #e25c45;
      --sidebar-text: #b0bfd0;
      --topbar-h: 56px;
      --page-bg: #f0f2f5;
      --card-bg: #ffffff;
      --text: #2d3748;
      --text-muted: #8a9ab0;
      --border: #e8ecf1;
      --accent-red: #e25c45;
      --label: #4a5568;
      --star: #e25c45;
    }

    html, body { height: 100%; font-family: 'DM Sans', sans-serif; background: var(--page-bg); color: var(--text); }

    /* ══ LAYOUT ══ */
    .app { display: flex; height: 100vh; overflow: hidden; }

    /* ══ SIDEBAR ══ */
    .sidebar {
      width: var(--sidebar-w);
      background: var(--sidebar-bg);
      display: flex; flex-direction: column; flex-shrink: 0;
    }

    .sidebar-header {
      padding: 22px 18px 18px;
      border-bottom: 1px solid rgba(255,255,255,0.07);
      display: flex; align-items: flex-start; justify-content: space-between;
    }
    .sidebar-brand h2 { font-size: 0.95rem; font-weight: 700; color: #fff; line-height: 1.2; }
    .sidebar-brand p  { font-size: 0.72rem; color: var(--sidebar-text); margin-top: 3px; }

    .collapse-btn {
      background: none; border: none; cursor: pointer;
      color: var(--sidebar-text); padding: 2px;
      display: flex; align-items: center; margin-top: 2px;
      transition: color 0.2s;
    }
    .collapse-btn:hover { color: #fff; }
    .collapse-btn svg { width: 16px; height: 16px; }

    .sidebar-nav {
      padding: 14px 10px; flex: 1;
      display: flex; flex-direction: column; gap: 2px;
    }
    .nav-item {
      display: flex; align-items: center; gap: 10px;
      padding: 9px 12px; border-radius: 8px; cursor: pointer;
      text-decoration: none; font-size: 0.855rem; font-weight: 500;
      color: var(--sidebar-text); transition: background 0.18s, color 0.18s;
    }
    .nav-item:hover { background: rgba(255,255,255,0.07); color: #fff; }
    .nav-item.active {
      background: var(--sidebar-active); color: #fff;
      box-shadow: 0 4px 12px rgba(226,92,69,0.32);
    }
    .nav-item svg {
      width: 17px; height: 17px; flex-shrink: 0;
      stroke: currentColor; fill: none;
      stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round;
    }
    .sidebar-footer { padding: 14px 10px; border-top: 1px solid rgba(255,255,255,0.07); }

    /* ══ MAIN ══ */
    .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }

    /* ── Topbar ── */
    .topbar {
      height: var(--topbar-h);
      background: var(--card-bg);
      border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 28px; flex-shrink: 0;
    }
    .topbar-title { font-size: 1.125rem; font-weight: 700; color: var(--text); }

    .user-pill {
      display: flex; align-items: center; gap: 10px;
      cursor: pointer; padding: 5px 10px 5px 5px;
      border-radius: 50px; transition: background 0.18s;
    }
    .user-pill:hover { background: var(--page-bg); }
    .user-avatar {
      width: 34px; height: 34px; border-radius: 50%;
      background: var(--accent-red);
      display: flex; align-items: center; justify-content: center;
    }
    .user-avatar svg { width: 18px; height: 18px; stroke: #fff; fill: none; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }
    .user-info { line-height: 1.2; }
    .user-info strong { display: block; font-size: 0.82rem; font-weight: 600; color: var(--text); }
    .user-info span { font-size: 0.72rem; color: var(--text-muted); }
    .chevron { width: 15px; height: 15px; stroke: var(--text-muted); fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

    /* ── Content ── */
    .content { flex: 1; overflow-y: auto; padding: 28px; }

    .page-title { font-size: 1.25rem; font-weight: 700; color: var(--text); margin-bottom: 22px; }

    /* ── Form Card ── */
    .form-card {
      background: var(--card-bg);
      border-radius: 14px;
      padding: 28px;
      max-width: 540px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      animation: fadeUp 0.38s ease both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(14px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .field { margin-bottom: 22px; }

    label {
      display: block;
      font-size: 0.8rem; font-weight: 500;
      color: var(--label); margin-bottom: 8px;
    }
    label .req { color: var(--star); margin-left: 2px; }

    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 11px 14px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.875rem;
      color: var(--text);
      background: #fff;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
      appearance: none;
    }
    input[type="text"]::placeholder,
    textarea::placeholder { color: var(--text-muted); }
    input[type="text"]:focus,
    textarea:focus,
    select:focus {
      border-color: var(--accent-red);
      box-shadow: 0 0 0 3px rgba(226,92,69,0.12);
    }

    textarea { resize: vertical; min-height: 110px; line-height: 1.5; }

    /* Select wrapper */
    .select-wrap { position: relative; }
    .select-wrap select {
      cursor: pointer;
      color: var(--text-muted);
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238a9ab0' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
      padding-right: 36px;
    }
    .select-wrap select.selected { color: var(--text); }

    /* ── Drop Zone ── */
    .dropzone {
      border: 1.8px dashed #c8d3df;
      border-radius: 10px;
      padding: 36px 20px;
      display: flex; flex-direction: column;
      align-items: center; justify-content: center; gap: 8px;
      cursor: pointer;
      transition: border-color 0.2s, background 0.2s;
      background: #fafbfc;
      text-align: center;
    }
    .dropzone:hover, .dropzone.dragover {
      border-color: var(--accent-red);
      background: rgba(226,92,69,0.04);
    }
    .dropzone input[type="file"] { display: none; }

    .dropzone-icon svg {
      width: 36px; height: 36px;
      stroke: var(--text-muted); fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round;
    }
    .dropzone-primary {
      font-size: 0.875rem; color: var(--text-muted); line-height: 1.5;
    }
    .dropzone-primary span {
      color: var(--accent-red); font-weight: 600; cursor: pointer;
    }
    .dropzone-hint {
      font-size: 0.72rem; color: #aab5c4; margin-top: 2px;
    }

    /* File preview */
    .file-preview {
      display: none;
      align-items: center; gap: 10px;
      background: #f0f8ff;
      border: 1.5px solid #bee3f8;
      border-radius: 8px;
      padding: 10px 14px;
      margin-top: 10px;
    }
    .file-preview.show { display: flex; }
    .file-preview svg { width: 18px; height: 18px; stroke: #3b82f6; fill: none; stroke-width: 1.7; flex-shrink: 0; }
    .file-name { font-size: 0.82rem; color: var(--text); flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .file-remove {
      background: none; border: none; cursor: pointer;
      color: #aab5c4; padding: 2px; display: flex;
      transition: color 0.15s;
    }
    .file-remove:hover { color: var(--accent-red); }
    .file-remove svg { width: 15px; height: 15px; stroke: currentColor; fill: none; stroke-width: 2; }

    /* ── Buttons ── */
    .btn-row { display: flex; gap: 10px; margin-top: 4px; }

    .btn-submit {
      display: flex; align-items: center; gap: 8px;
      background: var(--sidebar-bg); color: #fff;
      border: none; border-radius: 9px;
      padding: 11px 22px;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.875rem; font-weight: 600;
      cursor: pointer;
      transition: background 0.18s, transform 0.15s, box-shadow 0.18s;
      box-shadow: 0 4px 12px rgba(46,64,87,0.22);
    }
    .btn-submit:hover { background: #243347; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(46,64,87,0.30); }
    .btn-submit svg { width: 15px; height: 15px; stroke: #fff; fill: none; stroke-width: 2.2; stroke-linecap: round; stroke-linejoin: round; }

    .btn-cancel {
      background: #fff; color: var(--text);
      border: 1.5px solid var(--border); border-radius: 9px;
      padding: 11px 22px;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.875rem; font-weight: 500;
      cursor: pointer;
      transition: background 0.18s, border-color 0.18s;
    }
    .btn-cancel:hover { background: #f7f8fa; border-color: #c8d3df; }
  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<!-- SIDEBAR -->
  <!-- ══ SIDEBAR ══ -->
  @include('layout.sidebar')
<!-- MAIN -->
<div class="main">

  <!-- CONTENT -->
  <main class="content">
    <div class="card">
      <div class="card-header">
        <span class="card-title">Manajemen User</span>
        <button class="btn-add" onclick="openAddModal()">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
          </svg>
          Tambah User
        </button>
      </div>

      <table id="userTable">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Nomer</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="userBody"></tbody>
      </table>
    </div>
  </main>
</div>

<!-- ADD / EDIT MODAL -->
<div class="modal-overlay" id="formModal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title" id="modalTitle">Tambah User</span>
      <button class="modal-close" onclick="closeModal('formModal')">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
    <div class="form-group">
      <label class="form-label">Nama Lengkap</label>
      <input class="form-input" type="text" id="inputNama" placeholder="Masukkan nama lengkap"/>
    </div>
    <div class="form-group">
      <label class="form-label">Nomer</label>
      <input class="form-input" id="inputNomer" placeholder="Masukan Nomer Telpon"/>
    </div>
    <div class="form-group">
      <label class="form-label">Role</label>
      <select class="form-select" id="inputRole">
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
    </div>
    <div class="modal-actions">
      <button class="btn-cancel" onclick="closeModal('formModal')">Batal</button>
      <button class="btn-save" onclick="saveUser()">Simpan</button>
    </div>
  </div>
</div>

<!-- DELETE CONFIRM MODAL -->
<div class="modal-overlay" id="delModal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title">Hapus User</span>
      <button class="modal-close" onclick="closeModal('delModal')">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
    <p class="confirm-body">Apakah Anda yakin ingin menghapus user <span class="confirm-name" id="delName"></span>? Tindakan ini tidak dapat dibatalkan.</p>
    <div class="modal-actions">
      <button class="btn-cancel" onclick="closeModal('delModal')">Batal</button>
      <button class="btn-danger" onclick="confirmDelete()">Hapus</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<script>
  // ── DATA ──
  const initialData = @json($users);
  let users = initialData.map(u => ({
    id: u.id_user,
    nama: u.name,
    nomer: u.whatsapp,
    role: u.role,
  }));
  let editingId = null;
  let deletingId = null;

  function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]')?.content ?? '';
  }

  function badgeClass(role) {
    return { 'admin':'badge-admin', 'user':'badge-user' }[role] || 'badge-user';
  }

  function render() {
    const tbody = document.getElementById('userBody');
    if (!users.length) {
      tbody.innerHTML = `<tr><td colspan="4" style="text-align:center;padding:40px;color:var(--text-secondary)">Belum ada data user.</td></tr>`;
      return;
    }
    tbody.innerHTML = users.map(u => `
      <tr>
        <td>${u.nama}</td>
        <td style="color:#6b7280">${u.nomer}</td>
        <td><span class="badge ${badgeClass(u.role)}">${u.role.charAt(0).toUpperCase() + u.role.slice(1)}</span></td>
        <td>
          <div class="aksi">
            <button class="btn-icon btn-edit" onclick="openEdit(${u.id})" title="Edit">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
              </svg>
            </button>
            <button class="btn-icon btn-del" onclick="openDelete(${u.id})" title="Hapus">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                <path d="M10 11v6"/><path d="M14 11v6"/>
                <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
              </svg>
            </button>
          </div>
        </td>
      </tr>
    `).join('');
  }

  // ── MODAL HELPERS ──
  function openModal(id)  { document.getElementById(id).classList.add('open'); }
  function closeModal(id) { document.getElementById(id).classList.remove('open'); }

  function openAddModal() {
    editingId = null;
    document.getElementById('modalTitle').textContent = 'Tambah User';
    document.getElementById('inputNama').value = '';
    document.getElementById('inputNomer').value = '';
    document.getElementById('inputRole').value = 'user';
    openModal('formModal');
  }

  function openEdit(id) {
    const u = users.find(x => x.id === id);
    editingId = id;
    document.getElementById('modalTitle').textContent = 'Edit User';
    document.getElementById('inputNama').value = u.nama;
    document.getElementById('inputNomer').value = u.nomer;
    document.getElementById('inputRole').value = u.role;
    openModal('formModal');
  }

  async function saveUser() {
    const nama  = document.getElementById('inputNama').value.trim();
    const nomer = document.getElementById('inputNomer').value.trim();
    const role  = document.getElementById('inputRole').value;
    if (!nama || !nomer) { showToast('Nama dan nomor telepon wajib diisi.'); return; }

    if (editingId) {
      const body = { name: nama, whatsapp: nomer, role };

      try {
        const res = await fetch(`/admin/user/${editingId}`, {
          method: 'PUT',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
          credentials: 'same-origin',
          body: JSON.stringify(body),
        });
        const text = await res.text();
        if (!res.ok) {
          let msg = 'Gagal memperbarui';
          try { const j = JSON.parse(text); msg = j.message || j.errors?.[Object.keys(j.errors)[0]]?.[0] || msg; } catch(e) {}
          throw new Error(msg);
        }
        const updated = JSON.parse(text);
        const u = users.find(x => x.id === editingId);
        u.nama = updated.name;
        u.nomer = updated.whatsapp;
        u.role = updated.role;
        showToast('User berhasil diperbarui.');
      } catch (e) {
        showToast('Gagal: ' + e.message);
        return;
      }
    } else {
      try {
        const res = await fetch('/admin/user', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
          credentials: 'same-origin',
          body: JSON.stringify({ name: nama, whatsapp: nomer, role }),
        });
        const text = await res.text();
        if (!res.ok) {
          let msg = 'Gagal menyimpan';
          try { const j = JSON.parse(text); msg = j.message || j.errors?.[Object.keys(j.errors)[0]]?.[0] || msg; } catch(e) {}
          throw new Error(msg);
        }
        const saved = JSON.parse(text);
        users.push({ id: saved.id_user, nama: saved.name, nomer: saved.whatsapp, role: saved.role });
        showToast('User berhasil ditambahkan.');
      } catch (e) {
        showToast('Gagal: ' + e.message);
        return;
      }
    }
    closeModal('formModal');
    render();
  }

  function openDelete(id) {
    deletingId = id;
    document.getElementById('delName').textContent = users.find(x => x.id === id).nama;
    openModal('delModal');
  }

  async function confirmDelete() {
    try {
      const res = await fetch(`/admin/user/${deletingId}`, {
        method: 'DELETE',
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
        credentials: 'same-origin',
      });
      if (!res.ok) throw new Error('Gagal menghapus');
      users = users.filter(x => x.id !== deletingId);
      closeModal('delModal');
      render();
      showToast('User berhasil dihapus.');
    } catch (e) {
      showToast('Gagal menghapus user.');
    }
  }

  // ── TOAST ──
  function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2500);
  }

  // Close modal on overlay click
  document.querySelectorAll('.modal-overlay').forEach(el => {
    el.addEventListener('click', e => { if (e.target === el) el.classList.remove('open'); });
  });

  render();
</script>
</body>
</html>