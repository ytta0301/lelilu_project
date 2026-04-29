<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LeLiLu – Portofolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --yellow: #F5C518;
            --yellow-dark: #e0b000;
            --cream: #F0EDE6;
            --dark: #111111;
            --gray: #888;
            --white: #ffffff;
            --radius: 16px;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.09);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--dark);
        }

        /* ══════════════════ NAV ══════════════════ */
        nav {
            background: var(--white);
            display: flex;
            align-items: stretch;
            border-bottom: 1.5px solid #e8e8e8;
            position: sticky;
            top: 0;
            z-index: 200;
        }

        .nav-logo {
            font-family: 'DM Sans', sans-serif;
            font-weight: 700;
            font-size: 1.15rem;
            padding: 0 28px;
            display: flex;
            align-items: center;
            border-right: 1.5px solid #e8e8e8;
            letter-spacing: -0.3px;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li a {
            display: block;
            padding: 20px 26px;
            text-decoration: none;
            color: #444;
            font-size: 0.9rem;
            font-weight: 500;
            border-bottom: 3px solid transparent;
            transition: color .2s, border-color .2s;
        }

        .nav-links li a:hover,
        .nav-links li a.active {
            color: var(--dark);
            border-bottom-color: var(--dark);
        }

        /* ══════════════════ BREADCRUMB ══════════════════ */
        .breadcrumb {
            padding: 10px 48px;
            font-size: 0.82rem;
            color: var(--gray);
            background: var(--white);
            border-bottom: 1px solid #ebebeb;
        }

        .breadcrumb a {
            color: var(--yellow-dark);
            text-decoration: none;
            font-weight: 600;
        }

        .breadcrumb span {
            margin: 0 5px;
            color: #bbb;
        }

        /* ══════════════════ HERO / PORTFOLIO ══════════════════ */
        .portfolio-section {
            padding: 32px 48px 0;
            position: relative;
        }

        .portofolio-wave {
            z-index: -10;
            position: absolute;
            top: -5rem;
            left: 0;
            width: 100%;
        }

        .portfolio-top {
            display: flex;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .search-wrap {
            background: var(--white);
            border-radius: 10px;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            width: 300px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.07);
        }

        .search-wrap input {
            border: none;
            outline: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #aaa;
            flex: 1;
            background: transparent;
        }

        .search-wrap svg {
            flex-shrink: 0;
            opacity: .4;
        }

        .filter-tabs {
            display: flex;
            gap: 28px;
        }

        .filter-tabs button {
            background: none;
            border: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.92rem;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.5);
            cursor: pointer;
            padding-bottom: 4px;
            border-bottom: 2.5px solid transparent;
            transition: all .2s;
        }

        .filter-tabs button.active {
            color: var(--dark);
            border-bottom-color: var(--dark);
            font-weight: 700;
        }

        .filter-tabs button:hover {
            color: var(--dark);
        }

        /* ── Cards container ── */
        .cards-bg {
            border-radius: 28px 28px 0 0;
            padding: 36px 40px 40px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .25s, box-shadow .25s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 36px rgba(0, 0, 0, 0.13);
        }

        .card-img {
            width: 100%;
            aspect-ratio: 16/10;
            object-fit: cover;
            display: block;
            background: #ddd;
        }

        .card-body {
            padding: 18px 20px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .card-desc {
            font-size: 0.8rem;
            color: var(--gray);
            line-height: 1.55;
            flex: 1;
        }

        .card-btn {
            margin-top: 14px;
            align-self: flex-end;
            background: none;
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 6px 28px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--dark);
            cursor: pointer;
            transition: all .2s;
        }

        .card-btn:hover {
            background: var(--yellow);
            border-color: var(--yellow);
        }

        /* ── Pagination ── */
        .pagination {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 36px;
        }

        .pag-bar {
            width: 180px;
            height: 7px;
            background: var(--dark);
            border-radius: 99px;
        }

        .pag-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #bbb;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }

        .pag-dot.active {
            background: var(--dark);
            transform: scale(1.25);
        }

        .pag-dot:hover {
            background: var(--dark);
        }

        /* ══════════════════ CREATOR SECTION ══════════════════ */
        .creator-section {
            background: var(--white);
            padding: 48px 0 56px;
        }

        .creator-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            padding: 0 48px;
            margin-bottom: 28px;
        }

        .creator-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            letter-spacing: -0.5px;
        }

        .creator-title em {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-weight: 700;
            color: var(--yellow-dark);
        }

        .see-more {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--dark);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            border-bottom: 1.5px solid var(--dark);
            padding-bottom: 2px;
        }

        .see-more:hover {
            color: var(--yellow-dark);
            border-color: var(--yellow-dark);
        }

        /* Divider line */
        .creator-divider {
            margin: 0 48px 28px;
            height: 2px;
            background: linear-gradient(to right, var(--dark) 60%, transparent 100%);
        }

        /* Scrollable creator row */
        .creator-row {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 0 48px 12px;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
        }

        .creator-row::-webkit-scrollbar {
            display: none;
        }

        .creator-card {
            flex: 0 0 220px;
            background: var(--white);
            border: 1.5px solid #eee;
            border-radius: var(--radius);
            overflow: hidden;
            scroll-snap-align: start;
            transition: transform .25s, box-shadow .25s;
        }

        .creator-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.11);
        }

        .creator-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
            background: #ddd;
        }

        .creator-body {
            padding: 14px 16px 16px;
        }

        .creator-name {
            font-size: 0.92rem;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .creator-name span {
            font-weight: 400;
            color: var(--gray);
            font-size: 0.82rem;
        }

        .creator-desc {
            font-size: 0.76rem;
            color: var(--gray);
            line-height: 1.5;
            margin-bottom: 14px;
        }

        .creator-actions {
            display: flex;
            gap: 8px;
        }

        .btn-follow {
            background: var(--dark);
            color: var(--white);
            border: none;
            border-radius: 8px;
            padding: 7px 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-follow:hover {
            background: #333;
        }

        .btn-gallery {
            background: none;
            color: var(--dark);
            border: 1.5px solid #ddd;
            border-radius: 8px;
            padding: 7px 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            flex: 1;
            text-align: center;
        }

        .btn-gallery:hover {
            border-color: var(--yellow);
            background: var(--yellow);
        }

        /* Dots on creator bg */
        .creator-dots-bg {
            background: radial-gradient(circle, var(--yellow) 1.5px, transparent 1.5px);
            background-size: 14px 14px;
            opacity: 0.3;
            position: absolute;
            width: 100px;
            height: 100px;
            pointer-events: none;
        }

        /* ══════════════════ CTA SECTION ══════════════════ */
        .cta-section {
            background: var(--cream);
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 380px;
        }

        .cta-left {
            padding: 64px 56px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 18px;
        }

        .cta-left h2 {
            font-family: 'DM Sans', sans-serif;
            font-size: 2.8rem;
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .cta-left h2 em {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            color: var(--yellow-dark);
        }

        .cta-left p {
            font-size: 0.95rem;
            color: var(--gray);
            line-height: 1.65;
            max-width: 320px;
        }

        .cta-btn {
            background: var(--yellow);
            color: var(--dark);
            border: none;
            border-radius: 12px;
            padding: 16px 28px;
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            width: fit-content;
            transition: background .2s, transform .15s;
            box-shadow: 0 4px 16px rgba(245, 197, 24, 0.35);
        }

        .cta-btn:hover {
            background: var(--yellow-dark);
            transform: translateY(-2px);
        }

        .cta-right {
            position: relative;
            overflow: hidden;
        }

        .cta-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .cta-accent {
            position: absolute;
            bottom: 28px;
            right: 28px;
            width: 70px;
            height: 4px;
            background: var(--yellow);
            border-radius: 99px;
        }

        /* ══════════════════ FOOTER ══════════════════ */
        footer {
            position: relative;
        }

        .footer-wave {
            position: absolute;
            bottom: 0;
            z-index: 1;
            width: 100%;
            height: 500px;
        }

        .footer-img-wrap {
            width: 100%;
            height: 500px;
            position: relative;
            overflow: hidden;
        }

        .footer-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            filter: brightness(0.85);
        }

        .footer-body {
            padding: 0px 48px 36px;
            position: relative;
            z-index: 1;
        }

        .footer-logo {
            font-family: 'DM Sans', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--white);
            margin-bottom: 36px;
        }

        .footer-cols {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 36px;
        }

        .footer-col h4 {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 14px;
            letter-spacing: 0.2px;
        }

        .footer-col ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .footer-col ul li a {
            font-size: 0.82rem;
            color: #aaa;
            text-decoration: none;
            transition: color .2s;
        }

        .footer-col ul li a:hover {
            color: var(--yellow);
        }

        .footer-bottom {
            border-top: 1px solid #2a2a2a;
            padding-top: 20px;
            font-size: 0.78rem;
            color: #555;
            text-align: center;
        }

        /* ══════════════════ ANIMATIONS ══════════════════ */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeUp .4s ease both;
        }

        .card:nth-child(1) {
            animation-delay: .05s;
        }

        .card:nth-child(2) {
            animation-delay: .1s;
        }

        .card:nth-child(3) {
            animation-delay: .15s;
        }

        .card:nth-child(4) {
            animation-delay: .2s;
        }

        .card:nth-child(5) {
            animation-delay: .25s;
        }

        .card:nth-child(6) {
            animation-delay: .3s;
        }

        /* ══════════════════ RESPONSIVE ══════════════════ */
        @media (max-width: 900px) {
            .card-grid {
                grid-template-columns: 1fr 1fr;
            }

            .cta-section {
                grid-template-columns: 1fr;
            }

            .cta-right {
                height: 260px;
            }

            .footer-cols {
                grid-template-columns: repeat(2, 1fr);
            }

            .portfolio-section,
            .cards-bg,
            .creator-header,
            .creator-divider,
            .creator-row,
            .cta-left,
            .footer-body {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        @media (max-width: 540px) {
            .card-grid {
                grid-template-columns: 1fr;
            }

            .footer-cols {
                grid-template-columns: 1fr;
            }

            .cta-left h2 {
                font-size: 2rem;
            }

            .portfolio-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-wrap {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- ═══ NAV ═══ -->
    <nav>
        <div class="nav-logo">LeLiLu</div>
        <ul class="nav-links">
            <li><a href="#">About us</a></li>
            <li><a href="#" class="active">Portofolio</a></li>
            <li><a href="#">Testimoni</a></li>
        </ul>
    </nav>

    <!-- ═══ BREADCRUMB ═══ -->
    <div class="breadcrumb">
        <a href="#">Home</a>
        <span>›</span>
        <span>Portofolio</span>
    </div>

    <!-- ═══ PORTFOLIO SECTION ═══ -->
    <div class="portfolio-section">
        <img src="{{ asset('Image/wave2.png') }}" class="portofolio-wave" alt="">
        <div class="portfolio-top">
            <div class="search-wrap">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="2.3">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" id="searchInput" placeholder="Cari apa?...." />
            </div>
            <div class="filter-tabs">
                <button class="active" onclick="filterCards('all',this)">Semua</button>
                <button onclick="filterCards('desain',this)">BundLe Desain</button>
                <button onclick="filterCards('lainnya',this)">BundLe Lainnya</button>
            </div>
        </div>

        <!-- Cards bg -->
        <div class="cards-bg">
            <div class="card-grid" id="cardGrid">

                <div class="card" data-cat="desain">
                    <img class="card-img" src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="A.X.E my bini" />
                    <div class="card-body">
                        <div class="card-title">A.X.E my bini</div>
                        <div class="card-desc">Lorem ipsum dolor sit amet consectetur adipiscing elit</div>
                        <button class="card-btn">Lihat</button>
                    </div>
                </div>

                <div class="card" data-cat="lainnya">
                    <img class="card-img" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=600&q=80" alt="ambon" />
                    <div class="card-body">
                        <div class="card-title">ambon</div>
                        <div class="card-desc">Lorem ipsum dolor sit amet consectetur adipiscing elit</div>
                        <button class="card-btn">Lihat</button>
                    </div>
                </div>

                <div class="card" data-cat="desain">
                    <img class="card-img" src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=600&q=80" alt="Rico jawa" />
                    <div class="card-body">
                        <div class="card-title">Rico jawa</div>
                        <div class="card-desc">Lorem ipsum dolor sit amet consectetur adipiscing elit</div>
                        <button class="card-btn">Lihat</button>
                    </div>
                </div>

                <div class="card" data-cat="lainnya">
                    <img class="card-img" src="https://images.unsplash.com/photo-1504701954957-2010ec3bcec1?w=600&q=80" alt="suki" />
                    <div class="card-body">
                        <div class="card-title">suki</div>
                        <div class="card-desc">Lorem ipsum dolor sit amet consectetur adipiscing elit</div>
                        <button class="card-btn">Lihat</button>
                    </div>
                </div>

                <div class="card" data-cat="desain">
                    <img class="card-img" src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=600&q=80" alt="Tyara lope" />
                    <div class="card-body">
                        <div class="card-title">Tyara lope</div>
                        <div class="card-desc">Lorem ipsum dolor sit amet consectetur adipiscing elit</div>
                        <button class="card-btn">Lihat</button>
                    </div>
                </div>

                <div class="card" data-cat="lainnya">
                    <img class="card-img" src="https://images.unsplash.com/photo-1472289065668-ce650ac443d2?w=600&q=80" alt="Kukuh mls" />
                    <div class="card-body">
                        <div class="card-title">Kukuh mls</div>
                        <div class="card-desc">Lorem ipsum dolor sit amet consectetur adipiscing elit</div>
                        <button class="card-btn">Lihat</button>
                    </div>
                </div>

            </div>

            <!-- Pagination -->
            <div class="pagination">
                <div class="pag-bar"></div>
                <div class="pag-dot active" onclick="setDot(this)"></div>
                <div class="pag-dot" onclick="setDot(this)"></div>
                <div class="pag-dot" onclick="setDot(this)"></div>
                <div class="pag-dot" onclick="setDot(this)"></div>
                <div class="pag-dot" onclick="setDot(this)"></div>
            </div>
        </div>
    </div>

    <!-- ═══ CREATOR SECTION ═══ -->
    <div class="creator-section">
        <div class="creator-header">
            <div class="creator-title">LeLiLu <em>Creator</em></div>
            <a href="#" class="see-more">See More &rsaquo;</a>
        </div>
        <div class="creator-divider"></div>

        <div class="creator-row">

            <div class="creator-card">
                <img class="creator-img" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80" alt="Kukuhfaws" />
                <div class="creator-body">
                    <div class="creator-name">Kukuhfaws <span>| @kukuh</span></div>
                    <div class="creator-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidunt</div>
                    <div class="creator-actions">
                        <button class="btn-gallery" style="width:100%">Visit Gallery</button>
                    </div>
                </div>
            </div>

            <div class="creator-card">
                <img class="creator-img" src="https://images.unsplash.com/photo-1493863641943-9b68992a8d07?w=400&q=80" alt="Tyara" />
                <div class="creator-body">
                    <div class="creator-name">Tyara <span>| @arachu</span></div>
                    <div class="creator-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidunt</div>
                    <div class="creator-actions">
                        <button class="btn-follow">Follow</button>
                        <button class="btn-gallery">Visit Gallery</button>
                    </div>
                </div>
            </div>

            <div class="creator-card">
                <img class="creator-img" src="https://images.unsplash.com/photo-1462275646964-a0e3386b89fa?w=400&q=80" alt="Marcya" />
                <div class="creator-body">
                    <div class="creator-name">Marcya <span>| @cyaann67</span></div>
                    <div class="creator-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidunt</div>
                    <div class="creator-actions">
                        <button class="btn-follow">Follow</button>
                        <button class="btn-gallery">Visit Gallery</button>
                    </div>
                </div>
            </div>

            <div class="creator-card">
                <img class="creator-img" src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=400&q=80" alt="Ershon" />
                <div class="creator-body">
                    <div class="creator-name">Ershon <span>| @Juan</span></div>
                    <div class="creator-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidunt</div>
                    <div class="creator-actions">
                        <button class="btn-follow">Follow</button>
                        <button class="btn-gallery">Visit Gallery</button>
                    </div>
                </div>
            </div>

            <div class="creator-card">
                <img class="creator-img" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&q=80" alt="Raka" />
                <div class="creator-body">
                    <div class="creator-name">Raka <span>| @raka.art</span></div>
                    <div class="creator-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidunt</div>
                    <div class="creator-actions">
                        <button class="btn-follow">Follow</button>
                        <button class="btn-gallery">Visit Gallery</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ═══ CTA SECTION ═══ -->
    <div class="cta-section">
        <div class="cta-left">
            <h2>Punya Proyek<br>untuk <em>Kami?</em></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
            <button class="cta-btn">Ayo gabung<br>sekarang!</button>
        </div>
        <div class="cta-right">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&q=80" alt="Proyek" />
            <div class="cta-accent"></div>
        </div>
    </div>

    <!-- ═══ FOOTER ═══ -->
    <footer>
        <img src="{{ asset('Image/wave3.png') }}" class="footer-wave" alt="">
        <div class="footer-img-wrap">
            <img src="https://images.unsplash.com/photo-1541961017774-22349e4a1262?w=1400&q=80" alt="Footer background" />
        </div>

        <div class="footer-body">
            <div class="footer-logo">LeLiLu</div>

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

            <div class="footer-bottom">
                &copy; 2026 LeLiLu. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Filter cards
        function filterCards(cat, btn) {
            document.querySelectorAll('.filter-tabs button').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.querySelectorAll('.card').forEach(card => {
                const show = cat === 'all' || card.dataset.cat === cat;
                card.style.display = show ? '' : 'none';
                if (show) card.style.animation = 'none', card.offsetHeight, card.style.animation = 'fadeUp .35s ease both';
            });
        }

        // Search
        document.getElementById('searchInput').addEventListener('input', function() {
            const q = this.value.toLowerCase();
            document.querySelectorAll('.card').forEach(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                card.style.display = title.includes(q) ? '' : 'none';
            });
        });

        // Pagination dots
        function setDot(el) {
            document.querySelectorAll('.pag-dot').forEach(d => d.classList.remove('active'));
            el.classList.add('active');
        }
    </script>

</body>

</html>