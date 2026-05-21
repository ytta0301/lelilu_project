<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeLilu - Desain & Ilustrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,700;1,800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-yellow: #F7D038;
            --dark-gray: #333333;
            --light-bg: #F8F9FA;
            --text-dark: #2C2C2C;
            --text-muted: #888888;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            color: var(--text-dark);
            background-color: #FFFFFF;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .btn-logout {
            background-color: var(--primary-yellow);
            color: var(--text-dark);
            border: none;
            border-radius: 999px;
            padding: 10px 22px;
            font-size: 0.9rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-logout:hover {
            background-color: #e6c000;
        }

        .btn-logout:active {
            transform: scale(0.97);
        }

        /* Welcome Section */
        .welcome-section {
            background-color: var(--light-bg);
            padding: 40px 5% 0 5%;
        }

        .welcome-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .welcome-text h1 {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
        }

        .welcome-Image img {
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .orders-section {
            padding-bottom: 60px;
        }

        .orders-title h2 {
            font-size: 1.5rem;
            font-weight: 800;
            position: relative;
            display: inline-block;
        }

        .orders-title h2::after {
            content: '';
            position: absolute;
            width: 150%;
            height: 4px;
            background-color: var(--primary-yellow);
            bottom: -5px;
            left: 0;
        }

        .orders-title p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: 10px;
        }

        .empty-orders {
            background-color: #EBEBEB;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            margin-top: 30px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* About Section */
        .about-section {
            background-color: var(--primary-yellow);
            padding: 60px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .about-text {
            flex: 1;
        }

        .about-text h2 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 20px;
        }

        .about-text h2 span {
            color: #FFFFFF;
            font-style: italic;
        }

        .about-text p {
            font-size: 1rem;
            font-weight: 500;
            max-width: 400px;
        }

        .about-Image {
            flex: 1;
            display: flex;
            gap: 15px;
            position: relative;
        }

        .about-Image img {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            object-fit: cover;
        }

        .img-large { width: 350px; height: 200px; }
        .img-small-1 { width: 180px; height: 180px; position: absolute; bottom: -40px; left: 50px; }
        .img-small-2 { width: 150px; height: 220px; position: absolute; bottom: -50px; right: 50px; }

        /* Catalog Section */
        .catalog-container {
            display: flex;
            padding: 60px 5%;
            gap: 40px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            flex-shrink: 0;
        }

        .sidebar h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .sidebar h2::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 4px;
            background-color: var(--primary-yellow);
            bottom: -5px;
            left: 0;
        }

        .category-title {
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .category-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 40px;
        }

        .category-list li {
            color: var(--text-dark);
            font-size: 0.9rem;
            cursor: pointer;
        }

        .category-list li:hover {
            color: var(--primary-yellow);
            font-weight: 600;
        }

        .custom-design-box {
            background-color: var(--primary-yellow);
            padding: 20px;
            border-radius: 8px;
            text-align: left;
        }

        .custom-design-box h3 {
            font-size: 1.2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 15px;
        }

        .custom-design-box h3 span {
            font-style: italic;
            color: #FFFFFF;
        }

        .custom-design-box button {
            background-color: #FFFFFF;
            color: var(--text-dark);
            border: none;
            padding: 10px 15px;
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        /* Catalog Content */
        .catalog-content {
            flex: 1;
        }

        .search-bar {
            display: flex;
            align-items: center;
            border: 1px solid #CCC;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .search-bar input {
            border: none;
            outline: none;
            width: 100%;
            margin-left: 10px;
            font-size: 0.9rem;
        }

        .tabs {
            display: flex;
            gap: 25px;
            margin-bottom: 30px;
            border-bottom: 1px solid #EAEAEA;
            padding-bottom: 10px;
        }

        .tabs span {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
        }

        .tabs span.active {
            color: var(--text-dark);
            font-weight: 800;
            position: relative;
        }

        .tabs span.active::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            background-color: var(--text-dark);
            bottom: -11px;
            left: 0;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            border: 1px solid #EAEAEA;
            border-radius: 12px;
            overflow: hidden;
            background-color: #FFFFFF;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h4 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-body p {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .card-btn {
            display: block;
            width: 60px;
            height: 8px;
            border: 1px solid #CCC;
            border-radius: 10px;
            margin-left: auto;
        }

        .see-more {
            display: block;
            text-align: right;
            margin-top: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: underline;
        }

        /* Footer */
        .footer-wrapper {
            position: relative;
            background-color: var(--dark-gray);
            color: #FFFFFF;
            margin-top: 50px;
            padding-top: 50px;
        }

        .footer-waves {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .footer-waves svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }

        .footer-wrapper::before {
            content: "";
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: var(--primary-yellow);
            z-index: -1;
            clip-path: ellipse(60% 50px at 50% 50%);
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 30px;
            padding: 40px 5% 60px 5%;
        }

        .footer-logo {
            font-size: 2.5rem;
            font-weight: 800;
            grid-column: span 4;
            margin-bottom: 20px;
        }

        .footer-col h5 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            font-size: 0.85rem;
            margin-bottom: 12px;
            color: #CCCCCC;
            cursor: pointer;
        }

        .footer-col ul li:hover {
            color: #FFFFFF;
        }

        .orders-title-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .orders-see-all {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-dark);
            text-decoration: none;
            white-space: nowrap;
            margin-top: 4px;
        }

        .orders-see-all:hover {
            text-decoration: underline;
        }

        .orders-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 10px;
            padding-bottom: 40px;
        }

        .order-card {
            background: #FFFFFF;
            border: 1px solid #EAEAEA;
            border-radius: 12px;
            overflow: hidden;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .order-card-img {
            width: 100%;
            height: 160px;
            overflow: hidden;
            background-color: #F0F0F0;
        }

        .order-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-img-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .order-card-body {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .order-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .order-jenis {
            font-weight: 700;
            font-size: 0.95rem;
            display: block;
        }

        .order-type {
            font-size: 0.78rem;
            color: var(--text-muted);
            display: block;
        }

        .order-status {
            font-size: 0.78rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .proyek-section {
            display: flex;
            align-items: center;
            padding: 60px 28px;
            gap: 40px;
            background: var(--white);
        }   

        .status-pending    { color: #856404; }
        .status-proses     { color: #0d6efd; }
        .status-selesai    { color: #198754; }
        .status-dibatalkan { color: #dc3545; }

        .order-brief {
            font-size: 0.82rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        @media (max-width: 768px) {
            .orders-list {
                flex-direction: column;
            }
        }
        @media (max-width: 1200px) {
            .catalog-container { padding: 40px 3%; }
        }

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
            .proyek-section { padding: 30px 16px; gap: 24px; }
        }

        @media (max-width: 400px) {
            .welcome-text h1 { font-size: 1.6rem; }
            .about-text h2 { font-size: 1.6rem; }
            .footer-logo { font-size: 1.5rem; }
            .btn-logout { padding: 6px 12px; font-size: 0.75rem; }
        }

         @media (max-width: 800px) {
        .proyek-section { flex-direction: column; padding: 40px 20px; }
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
                <div class="empty-orders">
                    Tidak Ada pesanan
                </div>
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
                        <div class="order-card">
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

    
    <!-- <section class="about-section">
        <div class="about-text">
            <h2>ADA APA<br>AJA SIH<br>DI <span>LELILU?</span></h2>
            <br>
            <p>Wujudkan ide imajinatifmu menjadi kenyataan dengan ilustrasi orisinal berkualitas tinggi, dibuat khusus sesuai <em>permintaanmu</em></p>
        </div>
        <div class="about-Image">
            <img src="https://placehold.co/400x200/C2B280/FFFFFF?text=Vintage+Gas+Station" alt="Img1" class="img-large">
            <img src="https://placehold.co/200x200/A0D6B4/FFFFFF?text=Vintage+Cars" alt="Img2" class="img-small-1">
            <img src="https://placehold.co/180x250/FFB347/FFFFFF?text=Vintage+Poster" alt="Img3" class="img-small-2">
        </div>
    </section> -->

    <!-- Catalog Section -->
    <!-- <section class="catalog-container">
        <aside class="sidebar">
            <h2>Katalog</h2>
            
            <div class="category-title" style="margin-top: 30px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                Kategori
            </div>
            <ul class="category-list">
                <li>Desain Grafis</li>
                <li>Aset Digital</li>
                <li>Branding</li>
                <li>Ilustrasi</li>
                <li>UI/UX Kit</li>
                <li>Desain Banner</li>
            </ul>

            <div class="custom-design-box">
                <h3>Mau <span>Custom</span><br>bentuk desain<br>Sendiri?<br>KAMI BISA!</h3>
                <a href="/order"><button>Konsultasi Desain Sekarang</button></a>
            </div>
        </aside>

        <main class="catalog-content">
            <div class="search-bar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" placeholder="Cari apa?">
            </div>

            <div class="tabs">
                <span class="active">Semua</span>
                <span>Bundle Desain</span>
                <span>Bundle Lainnya</span>
            </div>

            <div class="grid-container">
                <div class="card">
                    <img src="https://placehold.co/300x150/FFD1DC/333?text=Abstract+Art" alt="Product">
                    <div class="card-body">
                        <h4>A.X.E my bini</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <span class="card-btn"></span>
                    </div>
                </div>
                <div class="card">
                    <img src="https://placehold.co/300x150/E6E6FA/333?text=Illustration" alt="Product">
                    <div class="card-body">
                        <h4>ambon</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <span class="card-btn"></span>
                    </div>
                </div>
                <div class="card">
                    <img src="https://placehold.co/300x150/FFFACD/333?text=Shapes" alt="Product">
                    <div class="card-body">
                        <h4>Rico jawa</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <span class="card-btn"></span>
                    </div>
                </div>
                <div class="card">
                    <img src="https://placehold.co/300x150/FF69B4/FFF?text=Holo" alt="Product">
                    <div class="card-body">
                        <h4>suki</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <span class="card-btn"></span>
                    </div>
                </div>
                <div class="card">
                    <img src="https://placehold.co/300x150/D2B48C/333?text=Koi+Fish" alt="Product">
                    <div class="card-body">
                        <h4>Tyara lope</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <span class="card-btn"></span>
                    </div>
                </div>
                <div class="card">
                    <img src="https://placehold.co/300x150/F08080/333?text=Drawing" alt="Product">
                    <div class="card-body">
                        <h4>Kukuh mis</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <span class="card-btn"></span>
                    </div>
                </div>
            </div>

            <a href="#" class="see-more">Lihat Selengkapnya</a>
        </main>
    </section> -->

    <section class="proyek-section">
  <div class="proyek-left">
    <h2 class="proyek-title">Punya Proyek<br>untuk <span class="highlight">Kami?</span></h2>
    <p class="proyek-desc">Lorem ipsum dolor sit amet,<br>consectetur adipiscing elit,<br>sed do</p>
    <a href="{{ url('/order') }}" class="lelu-nav__btn">Ayo gabung<br>sekarang!</a>
    
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

    <!-- Footer -->
    <footer class="footer-wrapper">
        <div class="footer-waves">
            <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,60 C320,120 420,0 720,60 C1020,120 1120,0 1440,60 L1440,120 L0,120 Z" fill="#333333"></path>
            </svg>
        </div>
        
        <div class="footer-content">
            <div class="footer-logo">LeLilu</div>
            
            <div class="footer-col">
                <h5>Bantuan & Dukungan</h5>
                <ul>
                    <li>Hubungi Kami</li>
                    <li>Pusat Bantuan</li>
                    <li>Syarat & Ketentuan</li>
                    <li>Kebijakan Privasi</li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Layanan & Informasi</h5>
                <ul>
                    <li>Pemesanan Online</li>
                    <li>Informasi Testimoni</li>
                    <li>Jasa Desain</li>
                    <li>Customer Service</li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Tentang Kami</h5>
                <ul>
                    <li>Tentang LeLilu</li>
                    <li>Karier</li>
                    <li>Partner & Kerja Sama</li>
                    <li>Kontak Kami</li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Panduan Pengguna</h5>
                <ul>
                    <li>Cara Daftar Akun</li>
                    <li>Cara Pemesanan Online</li>
                    <li>Panduan Pembayaran</li>
                    <li>Informasi Lainnya</li>
                </ul>
            </div>
        </div>
    </footer>

</body>
</html>