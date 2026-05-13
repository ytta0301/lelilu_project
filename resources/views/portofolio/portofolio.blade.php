<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LeLiLu - Portofolio</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --yellow: #F5C518;
      --dark: #111;
      --gray: #888;
      --light-gray: #f5f5f5;
      --border: #e5e5e5;
      --white: #fff;
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
      border-bottom: 1px solid var(--border);
    }

    .nav-logo {
      font-weight: 800;
      font-size: 1.15rem;
      padding: 18px 28px;
      border-right: 1px solid var(--border);
    }

    .nav-links {
      display: flex;
      list-style: none;
      flex: 1;
    }

    .nav-links li a {
      display: block;
      padding: 18px 28px;
      text-decoration: none;
      color: var(--dark);
      font-size: 0.9rem;
      font-weight: 500;
      border-right: 1px solid var(--border);
    }

    .nav-links li a:hover { color: var(--yellow); }

    .nav-right {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 0 24px;
    }

    .nav-lang {
      font-size: 1.1rem;
      cursor: pointer;
      color: var(--dark);
    }

    .btn-login {
      background: var(--yellow);
      border: none;
      border-radius: 24px;
      padding: 8px 22px;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 0.85rem;
      cursor: pointer;
      color: var(--dark);
    }

    /* ===== BREADCRUMB ===== */
    .breadcrumb {
      padding: 10px 28px;
      background: var(--light-gray);
      font-size: 0.82rem;
      color: var(--gray);
      border-bottom: 1px solid var(--border);
    }
    .breadcrumb a { color: var(--gray); text-decoration: none; }
    .breadcrumb span { color: var(--yellow); font-weight: 600; }

    /* ===== MAIN CONTENT ===== */
    .main-content {
      background: var(--light-gray);
      padding: 28px 28px 40px;
    }

    /* ===== SEARCH + FILTER ===== */
    .search-filter {
      display: flex;
      align-items: center;
      gap: 24px;
      margin-bottom: 28px;
    }

    .search-wrap {
      position: relative;
      flex: 0 0 320px;
    }

    .search-wrap input {
      width: 100%;
      padding: 10px 16px 10px 40px;
      border: 1px solid var(--border);
      border-radius: 8px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.85rem;
      background: var(--white);
      outline: none;
      color: var(--gray);
    }

    .search-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray);
      font-size: 0.9rem;
    }

    .filter-tabs {
      display: flex;
      gap: 20px;
      list-style: none;
    }

    .filter-tabs li {
      font-size: 0.88rem;
      font-weight: 500;
      cursor: pointer;
      color: var(--gray);
      padding-bottom: 2px;
    }

    .filter-tabs li.active {
      color: var(--yellow);
      border-bottom: 2px solid var(--yellow);
      font-weight: 600;
    }

    /* ===== PORTFOLIO GRID ===== */
    .portfolio-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .porto-card {
      background: var(--white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 1px 6px rgba(0,0,0,0.06);
      transition: box-shadow 0.2s, transform 0.2s;
      cursor: pointer;
    }

    .porto-card:hover {
      box-shadow: 0 8px 28px rgba(0,0,0,0.12);
      transform: translateY(-3px);
    }

    .porto-img {
      width: 100%;
      height: 170px;
      object-fit: cover;
      display: block;
      background: #ddd;
    }

    /* Placeholder colored images */
    .porto-img-placeholder {
      width: 100%;
      height: 170px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
    }

    .porto-body {
      padding: 16px 16px 18px;
    }

    .porto-title {
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 4px;
    }

    .porto-desc {
      font-size: 0.78rem;
      color: var(--gray);
      line-height: 1.5;
      margin-bottom: 14px;
    }

    .porto-btn {
      display: inline-block;
      width: 90px;
      height: 28px;
      background: var(--light-gray);
      border-radius: 6px;
    }

    /* ===== PAGINATION ===== */
    .pagination {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 28px;
    }

    .pag-bar {
      width: 140px;
      height: 8px;
      background: var(--dark);
      border-radius: 4px;
    }

    .pag-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--dark);
      opacity: 0.3;
    }
    .pag-dot.active { opacity: 1; }

    /* ===== PROYEK SECTION ===== */
    .proyek-section {
      display: flex;
      align-items: center;
      padding: 60px 28px;
      gap: 40px;
      background: var(--white);
    }

    .proyek-left { flex: 1; }

    .proyek-title {
      font-size: 2.6rem;
      font-weight: 800;
      line-height: 1.15;
      margin-bottom: 18px;
      letter-spacing: -1px;
    }

    .proyek-title .highlight {
      color: var(--yellow);
      font-style: italic;
    }

    .proyek-desc {
      font-size: 0.9rem;
      color: var(--gray);
      line-height: 1.7;
      margin-bottom: 28px;
    }

    .btn-gabung {
      background: var(--yellow);
      border: none;
      border-radius: 12px;
      padding: 16px 28px;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 0.95rem;
      cursor: pointer;
      color: var(--dark);
      line-height: 1.3;
    }

    .proyek-right {
      flex: 1;
      max-width: 400px;
    }

    .proyek-img-placeholder {
      width: 100%;
      height: 280px;
      background: #222;
      border-radius: 12px;
      overflow: hidden;
    }

    .proyek-img-placeholder img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.85;
    }

    /* slide indicator */
    .proyek-indicator {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 16px;
    }

    .ind-dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--yellow);
    }

    .ind-line {
      width: 80px;
      height: 3px;
      background: var(--yellow);
      border-radius: 2px;
    }

    /* ===== FOOTER ART IMAGE ===== */
    .footer-art {
      width: 100%;
      height: 220px;
      overflow: hidden;
    }

    .footer-art img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    /* ===== FOOTER ===== */
    footer {
      background: #1a1a1a;
      position: relative;
      overflow: hidden;
      padding: 0 0 60px;
    }

    /* Wave top */
    .footer-wave {
      width: 100%;
      display: block;
      margin-bottom: 0;
    }

    .footer-inner {
      padding: 0 48px 0;
    }

    .footer-logo {
      font-size: 2.2rem;
      font-weight: 800;
      color: var(--white);
      margin-bottom: 48px;
      display: block;
    }

    .footer-cols {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 24px;
    }

    .footer-col h4 {
      font-size: 0.88rem;
      font-weight: 700;
      color: var(--white);
      margin-bottom: 16px;
    }

    .footer-col ul {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .footer-col ul li a {
      text-decoration: none;
      color: #ccc;
      font-size: 0.82rem;
      font-weight: 400;
      transition: color 0.2s;
    }

    .footer-col ul li a:hover { color: var(--yellow); }

    @media (max-width: 1024px) {
      .main-content { padding: 20px 20px 30px; }
      .portfolio-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
    }

    @media (max-width: 800px) {
      .portfolio-grid { grid-template-columns: repeat(2, 1fr); }
      .footer-cols { grid-template-columns: repeat(2, 1fr); }
      .proyek-section { flex-direction: column; padding: 40px 20px; }
      .proyek-left, .proyek-right { flex: none; width: 100%; }
      .proyek-title { font-size: 2rem; }
      .proyek-desc { font-size: 0.85rem; }
      .search-filter { flex-direction: column; align-items: stretch; gap: 16px; }
      .search-wrap { flex: none; width: 100%; }
      .filter-tabs { flex-wrap: wrap; gap: 12px; }
    }

    @media (max-width: 600px) {
      nav { flex-direction: column; height: auto; padding: 12px 16px; gap: 12px; }
      .nav-logo { border-right: none; padding: 8px 0; font-size: 1rem; }
      .nav-links { flex-wrap: wrap; justify-content: center; gap: 8px; }
      .nav-links li a { padding: 8px 12px; font-size: 0.8rem; border-right: none; }
      .nav-right { padding: 8px 0; }
      .breadcrumb { padding: 8px 16px; font-size: 0.75rem; }
      .main-content { padding: 16px 16px 24px; }
      .search-wrap input { font-size: 0.8rem; padding: 8px 12px 8px 36px; }
      .filter-tabs li { font-size: 0.8rem; }
      .portfolio-grid { grid-template-columns: 1fr; gap: 12px; }
      .porto-card { border-radius: 8px; }
      .porto-img { height: 140px; }
      .porto-body { padding: 12px; }
      .porto-title { font-size: 0.9rem; }
      .porto-desc { font-size: 0.7rem; margin-bottom: 10px; }
      .porto-btn { width: 70px; height: 24px; }
      .pagination { justify-content: center; }
      .pag-bar { width: 100px; }
      .proyek-section { padding: 30px 16px; gap: 24px; }
      .proyek-title { font-size: 1.6rem; }
      .proyek-desc { font-size: 0.8rem; margin-bottom: 20px; }
      .btn-gabung { padding: 12px 20px; font-size: 0.85rem; }
      .proyek-img-placeholder { height: 200px; }
      .footer-inner { padding: 0 20px; }
      .footer-logo { font-size: 1.8rem; margin-bottom: 24px; }
      .footer-cols { grid-template-columns: 1fr; gap: 20px; }
      .footer-col h4 { font-size: 0.85rem; margin-bottom: 12px; }
      .footer-col ul li a { font-size: 0.78rem; }
      .footer-art { height: 150px; }
    }

    @media (max-width: 400px) {
      .page-title { font-size: 1.4rem; }
      .search-wrap { flex: none; width: 100%; }
      .filter-tabs { flex-direction: column; gap: 8px; }
      .filter-tabs li { text-align: center; }
      .porto-img { height: 120px; }
      .proyek-title { font-size: 1.4rem; }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
@include('partials.navbar')

<!-- MAIN CONTENT -->
<div class="main-content">

  <!-- Search + Filter -->
  <div class="search-filter">
    <div class="search-wrap">
      <span class="search-icon">🔍</span>
      <input type="text" placeholder="Cari apa?...."/>
    </div>
    <ul class="filter-tabs">
      <li class="active">Semua</li>
      <li>BundLe Desain</li>
      <li>BundLe Lainnya</li>
    </ul>
  </div>

  <!-- Portfolio Grid -->
  <div class="portfolio-grid" id="porto-grid"></div>

  <!-- Pagination -->
  <div class="pagination">
    <div class="pag-bar"></div>
    <div class="pag-dot active"></div>
    <div class="pag-dot"></div>
    <div class="pag-dot"></div>
    <div class="pag-dot"></div>
    <div class="pag-dot"></div>
  </div>

</div>

<!-- PROYEK SECTION -->
<section class="proyek-section">
  <div class="proyek-left">
    <h2 class="proyek-title">Punya Proyek<br>untuk <span class="highlight">Kami?</span></h2>
    <p class="proyek-desc">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit,<br>sed do</p>
    <button class="btn-gabung">Ayo gabung<br>sekarang!</button>
  </div>
  <div class="proyek-right">
    <div class="proyek-img-placeholder">
      <!-- Dark desk/writing photo placeholder -->
      <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a1a1a 0%,#333 100%);display:flex;align-items:center;justify-content:center;">
        <span style="font-size:4rem;">✍️</span>
      </div>
    </div>
    <div class="proyek-indicator">
      <div class="ind-dot"></div>
      <div class="ind-line"></div>
    </div>
  </div>
</section>

<!-- FOOTER ART IMAGE -->
<div class="footer-art">
  <img src="{{ asset('Image/canvas.png') }}"" alt="">
</div>

<!-- FOOTER -->
 <div style="width:100%;overflow:hidden;line-height:0;margin-bottom:-2px;"><img src="{{ asset('Image/wave2.png') }}" alt="">
<footer>


  <div class="footer-inner">
    <span class="footer-logo">LeLiLu</span>
    <div class="footer-cols">
      <div class="footer-col">
        <h4>Bantuan &amp; Dukungan</h4>
        <ul>
          <li><a href="#">Hubungi Kami</a></li>
          <li><a href="#">Pusat Bantuan</a></li>
          <li><a href="#">Syarat &amp; Ketentuan</a></li>
          <li><a href="#">Kebijakan Privasi</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Layanan &amp; Informasi</h4>
        <ul>
          <li><a href="#">Pemesanan Online</a></li>
          <li><a href="#">Informasi Testimoni</a></li>
          <li><a href="#">Jasa Desain</a></li>
          <li><a href="#">Customer Services</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Tentang Kami</h4>
        <ul>
          <li><a href="#">Tentang LeLiLu</a></li>
          <li><a href="#">Karier</a></li>
          <li><a href="#">Partner &amp; Kerja Sama</a></li>
          <li><a href="#">Kontak Kami</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Panduan Pengguna</h4>
        <ul>
          <li><a href="#">Cara Daftar Akun</a></li>
          <li><a href="#">Cara Pemesanan Online</a></li>
          <li><a href="#">Panduan Pembayaran</a></li>
          <li><a href="#">Informasi Lainnya</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<script>
const items = [
  { title: "A.X.E my bini", bg: "linear-gradient(135deg,#e8c4f0,#f0a0c0,#c8d4f8)", emoji: "🌊" },
  { title: "ambon",          bg: "linear-gradient(135deg,#d4b896,#8b6e5a,#4a3728)", emoji: "🎭" },
  { title: "Rico jawa",      bg: "linear-gradient(135deg,#f0e0a0,#c8d8f0,#b0c8e8)", emoji: "🔵" },
  { title: "suki",           bg: "linear-gradient(135deg,#ff6ec7,#4dff91,#6ef0ff)", emoji: "🌈" },
  { title: "Tyara lope",     bg: "linear-gradient(135deg,#f5d0b0,#e8a080,#c87050)", emoji: "🦋" },
  { title: "Kukuh mls",      bg: "linear-gradient(135deg,#f0c0a0,#d08060,#a04020)", emoji: "✏️" },
];

const grid = document.getElementById('porto-grid');
items.forEach(item => {
  const card = document.createElement('div');
  card.className = 'porto-card';
  card.innerHTML = `
    <div class="porto-img-placeholder" style="background:${item.bg}">
      <span>${item.emoji}</span>
    </div>
    <div class="porto-body">
      <div class="porto-title">${item.title}</div>
      <p class="porto-desc">Lorem ipsum dolor sit amet consectetur adipiscing elit</p>
      <div class="porto-btn"></div>
    </div>
  `;
  grid.appendChild(card);
});
</script>
</body>
</html>