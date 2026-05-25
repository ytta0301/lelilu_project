<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeLilu - Desain & Ilustrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,700;1,800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-yellow: #F7D038;
            --dark-gray: #333333;
            --light-bg: #F8F9FA;
            --text-dark: #2C2C2C;
            --text-muted: #888888;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

        body { color: var(--text-dark); background-color: #FFFFFF; overflow-x: hidden; }

        a { text-decoration: none; color: inherit; }

        .btn-logout {
            background-color: var(--primary-yellow);
            color: var(--text-dark);
            border: none; border-radius: 999px;
            padding: 10px 22px; font-size: 0.9rem; font-weight: 700;
            font-family: 'Poppins', sans-serif; cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }
        .btn-logout:hover  { background-color: #e6c000; }
        .btn-logout:active { transform: scale(0.97); }

        .btn-gabung {
            background: var(--primary-yellow);
            border: none; border-radius: 12px;
            padding: 16px 28px; font-family: 'Poppins', sans-serif;
            font-weight: 700; font-size: 0.95rem; cursor: pointer;
            color: var(--text-dark); line-height: 1.3;
            text-decoration: none; display: inline-block;
        }

        /* Welcome Section */
        .welcome-section { background-color: var(--light-bg); padding: 40px 5% 0 5%; }

        .welcome-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }

        .welcome-text h1 { font-size: 3rem; font-weight: 800; line-height: 1.2; }

        .welcome-Image img { max-width: 400px; border-radius: 8px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }

        .orders-section { padding-bottom: 60px; }

        .orders-title h2 {
            font-size: 1.5rem; font-weight: 800;
            position: relative; display: inline-block;
        }
        .orders-title h2::after {
            content: ''; position: absolute;
            width: 150%; height: 4px;
            background-color: var(--primary-yellow);
            bottom: -5px; left: 0;
        }
        .orders-title p { color: var(--text-muted); font-size: 0.9rem; margin-top: 10px; }

        .empty-orders {
            background-color: #EBEBEB; height: 200px;
            display: flex; justify-content: center; align-items: center;
            border-radius: 8px; margin-top: 30px;
            color: var(--text-muted); font-weight: 500;
        }

        /* About Section */
        .about-section {
            background-color: var(--primary-yellow);
            padding: 60px 5%; display: flex;
            align-items: center; justify-content: space-between; gap: 40px;
        }
        .about-text { flex: 1; }
        .about-text h2 { font-size: 3.5rem; font-weight: 800; line-height: 1; margin-bottom: 20px; }
        .about-text h2 span { color: #FFFFFF; font-style: italic; }
        .about-text p { font-size: 1rem; font-weight: 500; max-width: 400px; }
        .about-Image { flex: 1; display: flex; gap: 15px; position: relative; }
        .about-Image img { border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); object-fit: cover; }
        .img-large { width: 350px; height: 200px; }
        .img-small-1 { width: 180px; height: 180px; position: absolute; bottom: -40px; left: 50px; }
        .img-small-2 { width: 150px; height: 220px; position: absolute; bottom: -50px; right: 50px; }

        /* Catalog Section */
        .catalog-container { display: flex; padding: 60px 5%; gap: 40px; }

        .sidebar { width: 250px; flex-shrink: 0; }
        .sidebar h2 { font-size: 2rem; font-weight: 800; margin-bottom: 20px; position: relative; display: inline-block; }
        .sidebar h2::after { content: ''; position: absolute; width: 100%; height: 4px; background-color: var(--primary-yellow); bottom: -5px; left: 0; }

        .category-title { font-weight: 700; margin-bottom: 15px; display: flex; align-items: center; gap: 10px; }
        .category-list { list-style: none; display: flex; flex-direction: column; gap: 12px; margin-bottom: 40px; }
        .category-list li { color: var(--text-dark); font-size: 0.9rem; cursor: pointer; }
        .category-list li:hover { color: var(--primary-yellow); font-weight: 600; }

        .custom-design-box { background-color: var(--primary-yellow); padding: 20px; border-radius: 8px; text-align: left; }
        .custom-design-box h3 { font-size: 1.2rem; font-weight: 800; line-height: 1.2; margin-bottom: 15px; }
        .custom-design-box h3 span { font-style: italic; color: #FFFFFF; }
        .custom-design-box button {
            background-color: #FFFFFF; color: var(--text-dark);
            border: none; padding: 10px 15px; font-size: 0.8rem;
            font-weight: 700; border-radius: 5px; cursor: pointer; width: 100%;
        }

        .catalog-content { flex: 1; }

        .search-bar { display: flex; align-items: center; border: 1px solid #CCC; border-radius: 5px; padding: 10px 15px; margin-bottom: 20px; }
        .search-bar input { border: none; outline: none; width: 100%; margin-left: 10px; font-size: 0.9rem; }

        .tabs { display: flex; gap: 25px; margin-bottom: 30px; border-bottom: 1px solid #EAEAEA; padding-bottom: 10px; }
        .tabs span { font-size: 0.95rem; font-weight: 600; color: var(--text-muted); cursor: pointer; }
        .tabs span.active { color: var(--text-dark); font-weight: 800; position: relative; }
        .tabs span.active::after { content: ''; position: absolute; width: 100%; height: 3px; background-color: var(--text-dark); bottom: -11px; left: 0; }

        .grid-container { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }

        .card { border: 1px solid #EAEAEA; border-radius: 12px; overflow: hidden; background-color: #FFFFFF; transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .card img { width: 100%; height: 140px; object-fit: cover; }
        .card-body { padding: 15px; }
        .card-body h4 { font-size: 1rem; font-weight: 700; margin-bottom: 5px; }
        .card-body p { font-size: 0.75rem; color: var(--text-muted); margin-bottom: 15px; line-height: 1.4; }
        .card-btn { display: block; width: 60px; height: 8px; border: 1px solid #CCC; border-radius: 10px; margin-left: auto; }
        .see-more { display: block; text-align: right; margin-top: 30px; font-size: 0.9rem; font-weight: 600; text-decoration: underline; }

        /* Orders */
        .orders-title-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; }
        .orders-see-all { font-size: 0.9rem; font-weight: 500; color: var(--text-dark); text-decoration: none; white-space: nowrap; margin-top: 4px; }
        .orders-see-all:hover { text-decoration: underline; }

        .orders-list { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 10px; padding-bottom: 40px; }

        .order-card { background: #FFFFFF; border: 1px solid #EAEAEA; border-radius: 12px; overflow: hidden; flex: 1; display: flex; flex-direction: column; }
        .order-card-img { width: 100%; height: 160px; overflow: hidden; background-color: #F0F0F0; }
        .order-card-img img { width: 100%; height: 100%; object-fit: cover; }
        .order-img-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--text-muted); font-size: 0.85rem; }
        .order-card-body { padding: 16px; display: flex; flex-direction: column; gap: 8px; }
        .order-info { display: flex; justify-content: space-between; align-items: flex-start; }
        .order-jenis { font-weight: 700; font-size: 0.95rem; display: block; }
        .order-type { font-size: 0.78rem; color: var(--text-muted); display: block; }
        .order-status { font-size: 0.78rem; font-weight: 600; white-space: nowrap; }
        .status-pending    { color: #856404; }
        .status-proses     { color: #0d6efd; }
        .status-selesai    { color: #198754; }
        .status-dibatalkan { color: #dc3545; }
        .order-brief { font-size: 0.82rem; color: var(--text-muted); line-height: 1.5; }

        /* ===== PROYEK SECTION ===== */
        .proyek-section {
            display: flex;
            align-items: center;
            padding: 60px 5%;
            gap: 40px;
            background: #FFFFFF;
        }

        .proyek-left { flex: 1; }

        .proyek-title {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 16px;
            color: var(--text-dark);
        }

        .proyek-title .highlight {
            color: var(--primary-yellow);
            font-style: italic;
        }

        .proyek-desc {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .proyek-right {
            flex: 1;
            max-width: 460px;
        }

        .proyek-img-placeholder {
            width: 100%;
            height: 300px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .proyek-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
        }

        .ind-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--primary-yellow);
            flex-shrink: 0;
        }

        .ind-line {
            width: 80px;
            height: 3px;
            background: var(--primary-yellow);
            border-radius: 2px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) { .catalog-container { padding: 40px 3%; } }

        @media (max-width: 992px) {
            .about-section { flex-direction: column; }
            .about-Image { margin-top: 60px; }
            .img-small-1, .img-small-2 { position: relative; inset: 0; }
            .catalog-container { flex-direction: column; }
            .sidebar { width: 100%; }
            .grid-container { grid-template-columns: repeat(2, 1fr); }
            .footer-content { grid-template-columns: repeat(2, 1fr); }
            .welcome-section { padding: 30px 3% 0 3%; }
            .orders-section { padding: 0 3% 40px 3%; }
            .about-section { padding: 40px 3%; }
            .proyek-section { padding: 40px 3%; gap: 30px; }
            .proyek-title { font-size: 2.2rem; }
        }

        @media (max-width: 800px) {
            .proyek-section { flex-direction: column; padding: 40px 4%; }
            .proyek-right { max-width: 100%; width: 100%; }
            .proyek-img-placeholder { height: 240px; }
        }

        @media (max-width: 768px) {
            .welcome-text h1 { font-size: 2.2rem; }
            .welcome-Image img { max-width: 300px; }
            .about-text h2 { font-size: 2.5rem; }
            .about-Image { flex-direction: column; gap: 20px; }
            .img-large { width: 100%; height: 150px; }
            .img-small-1, .img-small-2 { position: relative; width: 45%; height: 150px; bottom: 0; left: 0; right: 0; margin: 0 auto; }
            .tabs { gap: 15px; overflow-x: auto; }
            .tabs span { font-size: 0.85rem; white-space: nowrap; }
            .grid-container { grid-template-columns: repeat(2, 1fr); gap: 15px; }
            .footer-content { grid-template-columns: repeat(2, 1fr); gap: 20px; padding: 30px 3% 40px 3%; }
            .footer-logo { grid-column: span 2; font-size: 2rem; }
            .catalog-container { padding: 30px 3%; }
            .search-bar { padding: 8px 12px; }
            .orders-list { grid-template-columns: repeat(2, 1fr); }
            .proyek-title { font-size: 2rem; }
        }

        @media (max-width: 600px) {
            .btn-logout { padding: 8px 16px; font-size: 0.8rem; }
            .welcome-top { flex-direction: column; text-align: center; gap: 20px; }
            .welcome-text h1 { font-size: 2rem; }
            .welcome-Image { margin-top: 20px; }
            .welcome-Image img { max-width: 100%; width: 100%; height: auto; }
            .about-section { padding: 30px 4%; }
            .about-text h2 { font-size: 2rem; }
            .about-text p { font-size: 0.9rem; max-width: 100%; }
            .about-Image { flex-direction: column; align-items: center; }
            .img-large { width: 100%; max-width: 300px; height: 120px; }
            .img-small-1, .img-small-2 { position: relative; width: 45%; max-width: 150px; height: 100px; }
            .catalog-container { flex-direction: column; padding: 20px 4%; }
            .sidebar { width: 100%; }
            .sidebar h2 { font-size: 1.5rem; }
            .category-list { flex-direction: row; flex-wrap: wrap; gap: 8px; }
            .category-list li { font-size: 0.8rem; padding: 6px 12px; background: #f5f5f5; border-radius: 20px; }
            .grid-container { grid-template-columns: 1fr; gap: 12px; }
            .card img { height: 120px; }
            .card-body h4 { font-size: 0.9rem; }
            .card-body p { font-size: 0.7rem; }
            .footer-content { grid-template-columns: 1fr; gap: 20px; padding: 24px 4% 40px 4%; }
            .footer-logo { grid-column: span 1; font-size: 1.8rem; }
            .footer-col h5 { font-size: 0.9rem; margin-bottom: 12px; }
            .footer-col ul li { font-size: 0.8rem; margin-bottom: 8px; }
            .orders-title h2 { font-size: 1.2rem; }
            .orders-title p { font-size: 0.8rem; }
            .empty-orders { height: 150px; }
            .orders-list { grid-template-columns: 1fr; }
            .proyek-section { padding: 30px 4%; }
            .proyek-title { font-size: 1.7rem; }
            .proyek-img-placeholder { height: 200px; }
        }

        @media (max-width: 400px) {
            .welcome-text h1 { font-size: 1.6rem; }
            .about-text h2 { font-size: 1.6rem; }
            .footer-logo { font-size: 1.5rem; }
            .btn-logout { padding: 6px 12px; font-size: 0.75rem; }
            .proyek-title { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Welcome Section -->
    <header class="welcome-section">
        <div class="welcome-top">
            <div class="welcome-text">
                <h1>Hi {{ Auth::user()->name ?? 'Desainers' }},<br>Selamat<br>datang<br>kembali</h1>
            </div>
            <div class="welcome-Image">
                <img src="https://placehold.co/500x250/2C2C2C/FFD700?text=Hello!" alt="Hello Card">
            </div>
        </div>

        <div class="orders-section">
            <div class="orders-title">
                <div class="orders-title-top">
                    <div>
                        <h2>Pesanan anda</h2>
                        <p>Lihat dan temukan pesanan anda</p>
                    </div>
                    @auth
                        <a href="{{ route('history') }}" class="orders-see-all">lihat pesanan anda &rsaquo;</a>
                    @endauth
                </div>
            </div>

            @if($pesanans->isEmpty())
                <div class="empty-orders">Tidak Ada pesanan</div>
            @else
                <div class="orders-list">
                    @foreach($pesanans as $p)
                        @php
                            $gambar = null;
                            if ($p->status === 'selesai' && $p->fileHasil) {
                                $gambar = asset('storage/' . $p->fileHasil->gambar_hasil);
                            } elseif ($p->referensi) {
                                $gambar = asset('storage/' . $p->referensi);
                            }
                        @endphp
                        <div class="order-card" onclick="window.location.href='/detail/{{ $p->id_pemesanan }}'">
                            <div class="order-card-img">
                                @if($gambar)
                                    <img src="{{ $gambar }}" alt="Gambar Pesanan">
                                @else
                                    <div class="order-img-placeholder">Belum ada gambar</div>
                                @endif
                            </div>
                            <div class="order-card-body">
                                <div class="order-info">
                                    <div>
                                        <span class="order-jenis">{{ $p->jenis }}</span>
                                        <span class="order-type">art commision</span>
                                    </div>
                                    <span class="order-status status-{{ $p->status }}">
                                        {{ match($p->status) {
                                            'pending'    => 'Pending',
                                            'proses'     => 'On progress',
                                            'selesai'    => 'selesai',
                                            'dibatalkan' => 'Dibatalkan',
                                        } }}
                                    </span>
                                </div>
                                <p class="order-brief">{{ $p->brief }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </header>

    <!-- Proyek Section -->
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

    <!-- Footer -->
    @include('partfoot.footer')

</body>
</html>