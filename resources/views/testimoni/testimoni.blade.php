<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LeLiLu - Testimoni</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --yellow: #F5C518;
      --dark: #111;
      --gray: #888;
      --light-gray: #f5f5f5;
      --border: #e5e5e5;
      --white: #fff;
      --blue-badge: #4A6CF7;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--white);
      color: var(--dark);
    }

    /* ===== NAVBAR ===== */
    nav {
      display: flex;
      align-items: center;
      gap: 0;
      border-bottom: 1px solid var(--border);
      padding: 0;
    }

    .nav-logo {
      font-weight: 800;
      font-size: 1.15rem;
      padding: 18px 28px;
      border-right: 1px solid var(--border);
      letter-spacing: -0.5px;
    }

    .nav-links {
      display: flex;
      list-style: none;
    }

    .nav-links li a {
      display: block;
      padding: 18px 28px;
      text-decoration: none;
      color: var(--dark);
      font-size: 0.9rem;
      font-weight: 500;
      border-right: 1px solid var(--border);
      transition: color 0.2s;
    }

    .nav-links li a:hover,
    .nav-links li a.active {
      color: var(--yellow);
    }

    /* ===== BREADCRUMB ===== */
    .breadcrumb {
      padding: 10px 28px;
      background: var(--light-gray);
      font-size: 0.82rem;
      color: var(--gray);
      border-bottom: 1px solid var(--border);
    }

    .breadcrumb a {
      color: var(--gray);
      text-decoration: none;
    }

    .breadcrumb span {
      color: var(--yellow);
      font-weight: 600;
    }

    /* ===== MAIN ===== */
    main {
      padding: 36px 28px 60px;
      max-width: 1100px;
    }

    /* ===== PAGE TITLE ===== */
    .page-title-wrap {
      display: flex;
      align-items: center;
      gap: 18px;
      margin-bottom: 32px;
    }

    .page-title {
      font-size: 2.2rem;
      font-weight: 800;
      letter-spacing: -1px;
    }

    .title-line {
      flex: 1;
      max-width: 200px;
      height: 5px;
      background: var(--yellow);
      border-radius: 3px;
    }

    /* ===== GRID ===== */
    .testimonial-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    /* ===== CARD ===== */
    .card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 22px 20px 18px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 160px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.04);
      transition: box-shadow 0.2s, transform 0.2s;
    }

    .card:hover {
      box-shadow: 0 6px 24px rgba(0,0,0,0.09);
      transform: translateY(-2px);
    }

    .card-text {
      font-size: 0.84rem;
      line-height: 1.65;
      color: #333;
      margin-bottom: 20px;
      flex: 1;
    }

    .card-author {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .avatar-wrap {
      position: relative;
      width: 38px;
      height: 38px;
      flex-shrink: 0;
    }

    .avatar {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      object-fit: cover;
      display: block;
    }

    /* Colored avatar placeholder */
    .avatar-placeholder {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 0.9rem;
      color: #fff;
    }

    .badge {
      position: absolute;
      bottom: 0;
      right: -2px;
      background: var(--blue-badge);
      border-radius: 50%;
      width: 14px;
      height: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid var(--white);
    }

    .badge svg {
      width: 7px;
      height: 7px;
      fill: white;
    }

    .author-info {
      display: flex;
      flex-direction: column;
    }

    .author-name {
      font-size: 0.82rem;
      font-weight: 700;
      color: var(--dark);
    }

    .author-handle {
      font-size: 0.75rem;
      color: var(--gray);
    }

    /* ===== FOOTER IMAGE AREA ===== */
    .footer-art {
      width: 100%;
      height: 220px;
      margin-top: 40px;
      overflow: hidden;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 900px) {
      main { padding: 28px 20px 40px; }
      .testimonial-grid { gap: 16px; }
    }

    @media (max-width: 800px) {
      .testimonial-grid { grid-template-columns: repeat(2, 1fr); }
      nav { flex-wrap: wrap; height: auto; padding: 12px 20px; gap: 12px; }
      .nav-logo { padding: 8px 0; border-right: none; }
      .nav-links { flex-wrap: wrap; justify-content: center; gap: 8px; }
      .nav-links li a { padding: 8px 12px; font-size: 0.85rem; border-right: none; }
      main { padding: 24px 20px 36px; }
      .page-title-wrap { margin-bottom: 24px; gap: 14px; }
      .page-title { font-size: 1.8rem; }
      .title-line { height: 4px; max-width: 150px; }
      .card { padding: 18px 16px 14px; min-height: 140px; }
      .card-text { font-size: 0.8rem; margin-bottom: 16px; }
    }

    @media (max-width: 600px) {
      .breadcrumb { padding: 8px 16px; font-size: 0.75rem; }
      nav { padding: 10px 16px; }
      .nav-logo { font-size: 1rem; }
      .nav-links li a { padding: 6px 10px; font-size: 0.8rem; }
      main { padding: 20px 16px 30px; }
      .page-title-wrap { flex-wrap: wrap; margin-bottom: 20px; gap: 10px; }
      .page-title { font-size: 1.5rem; }
      .title-line { max-width: 100px; height: 3px; }
      .testimonial-grid { grid-template-columns: 1fr; gap: 14px; }
      .card { padding: 16px 14px 12px; min-height: 130px; border-radius: 8px; }
      .card-text { font-size: 0.78rem; margin-bottom: 14px; line-height: 1.5; }
      .card-author { gap: 8px; }
      .avatar-wrap { width: 34px; height: 34px; }
      .avatar, .avatar-placeholder { width: 34px; height: 34px; font-size: 0.8rem; }
      .badge { width: 12px; height: 12px; border-width: 1.5px; }
      .badge svg { width: 6px; height: 6px; }
      .author-name { font-size: 0.78rem; }
      .author-handle { font-size: 0.7rem; }
      .footer-art { height: 160px; margin-top: 30px; }
    }

    @media (max-width: 400px) {
      .breadcrumb { padding: 6px 12px; font-size: 0.7rem; }
      nav { padding: 8px 12px; }
      .nav-logo { font-size: 0.95rem; }
      .nav-links li a { padding: 5px 8px; font-size: 0.75rem; }
      main { padding: 16px 12px 24px; }
      .page-title { font-size: 1.3rem; }
      .title-line { max-width: 80px; }
      .testimonial-grid { gap: 12px; }
      .card { padding: 14px 12px 10px; min-height: 120px; }
      .card-text { font-size: 0.74rem; margin-bottom: 12px; }
      .avatar-wrap { width: 30px; height: 30px; }
      .avatar, .avatar-placeholder { width: 30px; height: 30px; font-size: 0.75rem; }
      .author-name { font-size: 0.72rem; }
      .author-handle { font-size: 0.65rem; }
      .footer-art { height: 120px; margin-top: 24px; }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
@include('partials.navbar')
<!-- MAIN -->
<main>
  <div class="page-title-wrap">
    <h1 class="page-title">Testimoni</h1>
    <div class="title-line"></div>
  </div>

<div class="testimonial-grid">
  @forelse ($testimonis as $t)
    <div class="card">
      <p class="card-text">{{ $t->isi_testimoni }}</p>
      <div class="card-author">
        <div class="avatar-wrap">
          <div class="avatar-placeholder" style="background: {{ '#' . substr(md5($t->user->name), 0, 6) }}">
            {{ strtoupper(substr($t->user->name, 0, 2)) }}
          </div>
          <div class="badge">
            <svg viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
              <polyline points="2,5 4.5,7.5 8,3" stroke="white" stroke-width="1.8"
                fill="none" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
        <div class="author-info">
          <span class="author-name">{{ $t->user->name }}</span>
        </div>
      </div>
    </div>
  @empty
    <p style="color: #888; font-size: 0.9rem;">Belum ada testimoni.</p>
  @endforelse
</div>
<!-- FOOTER ART -->
<div class="footer-art">
  <img src="{{ asset('Image/canvas.png') }}" alt="imagenya salah">
</div>
</script>
</body>
</html>