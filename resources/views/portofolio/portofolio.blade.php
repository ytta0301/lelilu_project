<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LeLiLu - Portofolio</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
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
      overflow-x: hidden;
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

    /* ===== MAIN ===== */
    main {
      background: var(--light-gray);
      position: relative;
      overflow: hidden;
    }

    .main-content {
      z-index: 1;
      padding: 28px 28px 40px;
    }

    .main-wave {
      position: absolute;
      top: -40px;
      left: 0;
      width: 100%;
      height: auto;
      z-index: 0;
    }

    /* ===== PORTFOLIO GRID ===== */
    .portfolio-grid {
      z-index: 1;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .porto-card {
      z-index: 1;
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
    }

    .porto-img-placeholder {
      width: 100%;
      height: 170px;
      background: #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      color: #aaa;
    }

    .porto-body { padding: 16px 16px 18px; }

    .porto-kode {
      font-size: 0.7rem;
      color: var(--yellow);
      font-weight: 600;
      margin-bottom: 2px;
      letter-spacing: 0.5px;
    }

    .porto-title { font-size: 1rem; font-weight: 700; margin-bottom: 4px; }

    .porto-desc { font-size: 0.78rem; color: var(--gray); line-height: 1.5; }

    /* ===== EMPTY STATE ===== */
    .empty-state { grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: var(--gray); }
    .empty-state span { font-size: 3rem; display: block; margin-bottom: 12px; }

    /* ===== PAGINATION ===== */
    .pagination-wrap { display: flex; align-items: center; gap: 8px; margin-top: 28px; }

    .pagination-wrap .page-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 34px;
      height: 34px;
      border-radius: 8px;
      border: 1px solid var(--border);
      background: var(--white);
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--dark);
      text-decoration: none;
      transition: background 0.15s, color 0.15s;
    }

    .pagination-wrap .page-link:hover,
    .pagination-wrap .page-link.active { background: var(--yellow); border-color: var(--yellow); }
    .pagination-wrap .page-link.disabled { opacity: 0.4; pointer-events: none; }

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
      cursor: default;
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

    .proyek-title .highlight { color: var(--yellow); font-style: italic; }

    .proyek-desc { font-size: 0.9rem; color: var(--gray); line-height: 1.7; margin-bottom: 28px; }

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
      text-decoration: none;
      display: inline-block;
    }

    .proyek-right { flex: 1; max-width: 400px; }

    .proyek-img-placeholder { width: 100%; height: 280px; border-radius: 12px; overflow: hidden; }

    .proyek-indicator { display: flex; align-items: center; gap: 8px; margin-top: 16px; }
    .ind-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--yellow); }
    .ind-line { width: 80px; height: 3px; background: var(--yellow); border-radius: 2px; }

    /* ===== FOOTER ART ===== */
    .footer-art { width: 100%; height: 300px; overflow: hidden; }
    .footer-art img { width: 100%; height: 100%; object-fit: cover; display: block; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
      .portfolio-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 800px) {
      .proyek-section { flex-direction: column; padding: 40px 20px; }
      .proyek-left, .proyek-right { flex: none; width: 100%; }
      .proyek-title { font-size: 2rem; }
    }

    @media (max-width: 600px) {
      .portfolio-grid { grid-template-columns: 1fr; }
      .main-content { padding: 16px 16px 24px; }
      .footer-art { height: 150px; }
      .proyek-title { font-size: 1.6rem; }
    }
  </style>
</head>
<body>

{{-- NAVBAR --}}
@include('partials.navbar')

{{-- MAIN --}}
<main>
  <img class="main-wave" src="{{ asset('Image/wave2.png') }}" alt="">

  <div class="main-content">

    {{-- Grid --}}
    <div class="portfolio-grid">

      @forelse ($portfolios as $porto)
        <div class="porto-card">

          @if ($porto->gambar_url)
            <img class="porto-img" src="{{ $porto->gambar_url }}" alt="{{ $porto->nama_kreator }}" style="cursor:pointer" onclick="openModal(this.src, '{{ $porto->nama_kreator }}', '{{ addslashes($porto->deskripsi ?? '') }}')">
          @else
            <div class="porto-img-placeholder">🖼️</div>
          @endif

          <div class="porto-body">
            <div class="porto-kode">{{ $porto->kode }}</div>
            <div class="porto-title">{{ $porto->nama_kreator }}</div>
            @if ($porto->deskripsi)
              <p class="porto-desc">{{ Str::limit($porto->deskripsi, 80) }}</p>
            @endif
          </div>

        </div>
      @empty
        <div class="empty-state">
          <span>🗂️</span>
          <p>Belum ada portofolio yang ditampilkan.</p>
        </div>
      @endforelse

    </div>

    {{-- Pagination --}}
    @if ($portfolios->hasPages())
      <div class="pagination-wrap">

        @if ($portfolios->onFirstPage())
          <span class="page-link disabled">&lsaquo;</span>
        @else
          <a class="page-link" href="{{ $portfolios->previousPageUrl() }}">&lsaquo;</a>
        @endif

        @foreach ($portfolios->getUrlRange(1, $portfolios->lastPage()) as $page => $url)
          <a class="page-link {{ $page == $portfolios->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
        @endforeach

        @if ($portfolios->hasMorePages())
          <a class="page-link" href="{{ $portfolios->nextPageUrl() }}">&rsaquo;</a>
        @else
          <span class="page-link disabled">&rsaquo;</span>
        @endif

      </div>
    @endif

  </div>
</main>

{{-- PROYEK SECTION --}}
<section class="proyek-section">
   <div class="proyek-left">
            <h2 class="proyek-title">Butuh Benner Kreatif <br>Untuk<span class="highlight"> Bisnis MU? </span></h2>
            <p class="proyek-desc">Sampaikan konsep atau ide kasarmu. Tim desainer kami siap mengeksekusinya menjadi visual promosi yang memikat dan tepat sasaran.<br>Untuk Anda</p>
            <a href="{{ url('/order') }}" class="btn-gabung">Mulai Project<br>Anda!</a>
        </div>
  <div class="proyek-right">
    <div class="proyek-img-placeholder">
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

{{-- FOOTER ART --}}
<div class="footer-art">
  <img src="{{ asset('Image/canvas.png') }}" alt="">
</div>

{{-- FOOTER --}}
<div style="margin-top: -120px; position: relative; z-index: 1;">
  @include('partfoot.footer')
</div>

{{-- MODAL GAMBAR --}}
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
function openModal(src, title, desc) {
  document.getElementById('modalImg').src = src;
  document.getElementById('modalTitle').textContent = title;
  document.getElementById('modalDesc').textContent = desc;
  document.getElementById('imgModal').classList.add('open');
}
function closeModal(e) {
  if (e && e.target !== e.currentTarget) return;
  document.getElementById('imgModal').classList.remove('open');
}
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') document.getElementById('imgModal').classList.remove('open');
});
</script>

</body>
</html>