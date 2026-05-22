<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeLiLu - Solusi Digital Terbaik</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&family=Kalam:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .footer-background {
            padding-top: 100px;
            background: #2c2a2a;
        }

        .font-handwriting {
            font-family: 'Kalam', cursive;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) {
            .max-w-7xl {
                max-width: 960px;
            }

            .lg\:text-9xl {
                font-size: 5rem;
            }
        }

        @media (max-width: 992px) {
            .hidden.md\:flex {
                display: none;
            }

            .md\:block {
                display: block;
            }

            .md\:text-2xl {
                font-size: 1.5rem;
            }

            .md\:hidden {
                display: flex;
            }

            section.relative {
                min-height: auto;
                padding-top: 100px;
                padding-bottom: 60px;
            }

            .grid-cols-1.lg\:grid-cols-2 {
                grid-template-columns: 1fr;
            }

            .text-5xl {
                font-size: 2.5rem;
            }

            .text-6xl {
                font-size: 3rem;
            }

            .lg\:text-8xl {
                font-size: 4rem;
            }

            .lg\:text-9xl {
                font-size: 4.5rem;
            }

            .font-handwriting {
                font-size: 2.5rem !important;
            }

            .text-8xl {
                font-size: 4rem;
            }

            .text-9xl {
                font-size: 4.5rem;
            }

            .space-y-8>*+* {
                margin-top: 2rem;
            }

            .absolute.-top-\[5rem\] {
                position: relative;
                top: 0;
                margin-top: 2rem;
            }

            .flex-col.sm\:flex-row {
                flex-direction: column;
                gap: 12px;
            }

            .gap-4 {
                gap: 12px;
            }

            .flex>button {
                width: 100%;
                justify-content: center;
            }

            .w-full {
                width: 100%;
            }

            .grid-cols-1.md\:grid-cols-2 {
                grid-template-columns: 1fr;
            }

            .lg\:col-span-9 {
                grid-column: span 1;
            }

            .lg\:col-span-3 {
                display: none;
            }

            .rounded-\[3rem\] {
                border-radius: 1.5rem;
            }

            .p-8 {
                padding: 1.5rem;
            }

            .lg\:grid-cols-12 {
                grid-template-columns: 1fr;
            }

            .lg\:pt-20 {
                padding-top: 2rem;
            }

            .lg\:col-span-7,
            .lg\:col-span-5 {
                grid-column: span 1;
            }

            .absolute.-bottom-6 {
                position: relative;
                bottom: 0;
                margin-top: 1.5rem;
            }

            .flex-wrap {
                flex-wrap: wrap;
            }

            .justify-between {
                justify-content: center;
            }

            .min-w-\[80px\] {
                min-width: 60px;
            }

            .grid-cols-2.md\:grid-cols-4 {
                grid-template-columns: repeat(2, 1fr);
            }

            footer .max-w-7xl {
                padding: 0 24px 4rem;
            }

            .pb-\[8rem\] {
                padding-bottom: 4rem;
            }

            footer h2 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .text-xl {
                font-size: 1.25rem;
            }

            .max-w-7xl {
                padding: 0 16px;
            }

            .text-4xl {
                font-size: 2rem;
            }

            .md\:text-5xl {
                font-size: 2rem;
            }

            .text-5xl {
                font-size: 2.2rem;
            }

            .text-6xl {
                font-size: 2.5rem;
            }

            .text-7xl {
                font-size: 3rem;
            }

            .text-8xl {
                font-size: 3rem;
            }

            .text-9xl {
                font-size: 3.5rem;
            }

            .font-handwriting {
                font-size: 2rem !important;
            }

            section {
                padding-top: 90px;
                padding-bottom: 40px;
            }

            .gap-6 {
                gap: 1rem;
            }

            .py-20 {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .py-24 {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            .gap-4 {
                gap: 0.75rem;
            }

            .grid-cols-1 {
                gap: 1rem;
            }

            .gap-8 {
                gap: 1.5rem;
            }

            .rounded-\[3rem\] {
                border-radius: 1.5rem;
            }

            .p-8,
            .p-12 {
                padding: 1.25rem;
            }

            .shadow-xl {
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            }

            .hidden {
                display: none;
            }

            footer .max-w-7xl {
                padding: 0 16px 3rem;
            }

            footer h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 600px) {
            .max-w-7xl {
                padding: 0 12px;
            }

            .text-4xl {
                font-size: 1.75rem;
            }

            .text-5xl {
                font-size: 2rem;
            }

            .text-6xl {
                font-size: 2.2rem;
            }

            .text-7xl {
                font-size: 2.5rem;
            }

            .text-8xl {
                font-size: 2.8rem;
            }

            .text-9xl {
                font-size: 3rem;
            }

            .font-handwriting {
                font-size: 1.75rem !important;
            }

            section {
                padding-top: 80px;
                padding-bottom: 30px;
            }

            .gap-8 {
                gap: 1.25rem;
            }

            .gap-4 {
                gap: 0.5rem;
            }

            footer .max-w-7xl {
                padding: 0 12px 2rem;
            }

            footer h2 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 400px) {
            .text-4xl {
                font-size: 1.5rem;
            }

            .text-9xl {
                font-size: 2.8rem;
            }

            .font-handwriting {
                font-size: 1.5rem !important;
            }
        }

        /* ===== WAVE ===== */
        .custom-wave-container {
            position: absolute;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            z-index: 0;
        }

        .wave-divider {
            bottom: -1px;
        }

        .wave-footer {
            top: 0;
            transform: rotate(180deg);
        }

        /* ===== CAROUSEL ===== */
        #bestSellerCarousel {
            position: relative;
            overflow: hidden;
        }

        #carouselTrack {
            display: flex;
            gap: 20px;
            padding: 8px 0;
        }

        .carousel-card {
            min-width: 300px;
            flex-shrink: 0;
            cursor: pointer;
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease, transform 0.5s ease;
        }

        .carousel-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            transform: scale(1.03);
            z-index: 5;
        }

        .carousel-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .carousel-card:hover img {
            transform: scale(1.08);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(2px);
        }

        .carousel-card:hover .card-overlay {
            opacity: 1;
        }

        .card-popup {
            background: white;
            padding: 1rem 1.25rem;
            border-radius: 0.625rem;
            text-align: center;
            transform: translateY(12px);
            transition: transform 0.1s ease;
            min-width: 160px;
            pointer-events: none;
        }

        .carousel-card:hover .card-popup {
            transform: translateY(0);
        }

        /* Nav buttons */
        .carousel-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
            color: #333;
            transition: background 0.2s, transform 0.2s;
            line-height: 1;
        }

        .carousel-nav-btn:hover {
            background: #FFD700;
            transform: translateY(-50%) scale(1.1);
        }

        #carouselBtnLeft {
            left: 8px;
        }

        #carouselBtnRight {
            right: 8px;
        }

        /* Empty state carousel */
        .carousel-empty {
            padding: 40px 20px;
            text-align: center;
            color: #aaa;
            font-size: 14px;
            width: 100%;
        }
    </style>
</head>

<body class="bg-white text-gray-800 overflow-x-hidden">

    @include('partials.navbar')

    <!-- ================= HERO ================= -->
    <section class="relative pt-10 pb-10 lg:pt-16 lg:pb-16 bg-[#FFCF22] overflow-hidden min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8 fade-in-up">
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold leading-tight text-black drop-shadow-sm">
                        <span class="block font-poppins">Proses</span>
                        <span class="font-handwriting text-white italic text-6xl md:text-8xl lg:text-9xl block mt-2 drop-shadow-md">sat set</span>
                        <span class="block font-poppins mt-2">hasil</span>
                        <span class="font-handwriting text-white italic text-6xl md:text-8xl lg:text-9xl block mt-2 drop-shadow-md">terbaik</span>
                    </h1>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="/order">
                            <button class="bg-white text-black font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-50 transition transform hover:scale-105">
                                Order Now
                            </button>
                        </a>
                    </div>
                </div>
                <div class="absolute -top-[5rem] right-0 lg:h-full flex items-center justify-center fade-in-up" style="animation-delay: 0.2s;">
                    <img src="{{ asset('Image/hero-image.png') }}" alt="Ilustrasi Kucing" class="h-full">
                </div>
            </div>
        </div>
        <div class="custom-wave-container wave-divider"></div>
    </section>

    <!-- ================= BEST SELLER ================= -->
    <section id="portfolio" class="py-20 bg-[#FAFAFA] relative overflow-hidden">
        <div class="absolute bottom-0 right-0 w-64 h-64 opacity-20 pointer-events-none">
            <svg width="100%" height="100%" viewBox="0 0 200 200">
                <pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="2" fill="#FFD700"></circle>
                </pattern>
                <rect width="100%" height="100%" fill="url(#dots)"></rect>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex justify-between items-end mb-10 fade-in-up">
                <div class="flex items-center gap-4">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                        Karya <span class="text-[#FFD700]">Kami</span>
                    </h2>
                    <div class="h-2 w-24 bg-[#FFD700] rounded-full hidden md:block"></div>
                </div>
            </div>

            <!-- CAROUSEL -->
            <div class="fade-in-up" style="animation-delay: 0.2s;">
                <div id="bestSellerCarousel" style="position: relative;">

                    @if ($portofolios->isNotEmpty())
                    <button id="carouselBtnLeft" class="carousel-nav-btn" aria-label="Sebelumnya">&#8249;</button>
                    <button id="carouselBtnRight" class="carousel-nav-btn" aria-label="Berikutnya">&#8250;</button>
                    @endif

                    <div style="overflow: hidden;">
                        <div id="carouselTrack">
                            @forelse ($portofolios as $porto)
                            <div class="carousel-card">
                                @if ($porto->gambar_url)
                                <img src="{{ $porto->gambar_url }}"
                                    alt="{{ $porto->deskripsi ?? $porto->nama_kreator }}"
                                    onerror="this.style.background='#f0f0f0'; this.src='';">
                                @else
                                {{-- Placeholder warna jika tidak ada gambar --}}
                                <div style="width:100%;height:250px;background:linear-gradient(135deg,#FFD700,#ff9f43);display:flex;align-items:center;justify-content:center;">
                                    <span style="font-size:13px;color:#fff;font-weight:600;">{{ $porto->kode }}</span>
                                </div>
                                @endif
                                <div class="card-overlay">
                                    <div class="card-popup">
                                        <h3 style="font-weight:700;font-size:14px;color:#111;margin:0 0 4px;">
                                            {{ $porto->nama_kreator }}
                                        </h3>
                                        @if ($porto->deskripsi)
                                        <p style="font-size:11px;color:#777;margin:0;">
                                            {{ Str::limit($porto->deskripsi, 60) }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="carousel-empty">
                                Belum ada portofolio yang ditampilkan.
                            </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
            <!-- END CAROUSEL -->
        </div>

        <div class="custom-wave-container wave-divider">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#F9F5F0" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- ================= TESTIMONI ================= -->
    <section id="testimoni" class="py-24 bg-[#F9F5F0] relative overflow-hidden">
        <img src="{{ asset('Image/titik.png') }}" alt="Titik" class="absolute top-0 left-0 h-full">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none"
            style="background-Image: radial-gradient(#FFD700 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-3 hidden lg:block pt-10"></div>

                <div class="lg:col-span-9 bg-[#FFD700] rounded-[3rem] p-8 md:p-12 shadow-xl relative overflow-hidden fade-in-up">
                    <div class="flex justify-between items-end mb-10 border-b border-black/10 pb-6">
                        <h2 class="text-4xl md:text-5xl font-bold text-black font-poppins">Testimoni</h2>
                        <a href="/testimoni"
                            class="hidden md:inline-flex items-center text-lg font-semibold text-black hover:opacity-70 transition group">
                            See More
                            <span class="ml-2 transform group-hover:translate-x-1 transition-transform">&gt;</span>
                        </a>
                    </div>

                    @if ($testimonis->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($testimonis as $t)
                        <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition duration-300 flex flex-col h-full">
                            <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-grow">
                                "{{ $t->isi_testimoni }}"
                            </p>
                            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                                <div class="relative inline-block flex-shrink-0">
                                    {{-- Avatar: gunakan foto user jika ada, fallback ke placeholder --}}
                                    <img src="https://placehold.co/40x40"
                                        alt="{{ $t->nama }}"
                                        class="w-10 h-10 rounded-full object-cover">
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-blue-500 rounded-full border-2 border-white flex items-center justify-center">
                                        <svg width="7" height="7" viewBox="0 0 24 24" fill="none" stroke="white"
                                            stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm">{{ $t->nama }}</h4>
                                    @if ($t->user)
                                    <span class="text-xs text-gray-400">
                                        {{ $t->user->whatsapp ? '+'.ltrim($t->user->whatsapp, '0') : '' }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-black/60 text-sm text-center py-10">Belum ada testimoni.</p>
                    @endif

                </div>
            </div>
        </div>

        <div class="custom-wave-container wave-divider">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#F9F5F0" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- ================= ABOUT US ================= -->
    <section id="about" class="py-20 bg-[#F9F5F0] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 reveal">
                <h2 class="text-4xl md:text-5xl font-extrabold text-black inline-block mr-4 font-poppins">
                    Siapa <span class="text-yellow-500 italic">Kami?</span>
                </h2>
                <div class="h-2 w-7/12 bg-yellow-500 inline-block align-middle rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-7 relative reveal delay-100">
                    <img src="{{ asset('Image/Firefly.webp') }}" class="w-full h-auto object-cover block rounded-xl shadow-sm">

                    {{-- Statistik dari DB --}}
                    <div class="absolute -bottom-6 left-4 right-4 md:left-8 md:right-auto md:w-[90%]
                                bg-white p-6 rounded-xl shadow-2xl flex justify-center items-center
                                z-20 border border-gray-100 flex-wrap gap-4">
                        <div class="text-center min-w-[80px]">
                            <p class="text-2xl font-bold text-yellow-500 font-poppins">{{ $projectSelesai }}</p>
                            <p class="text-xs text-gray-500">Project Selesai</p>
                        </div>
                        <div class="text-center min-w-[80px]">
                            <p class="text-2xl font-bold text-yellow-500 font-poppins">{{ $klienAktif }}</p>
                            <p class="text-xs text-gray-500">Klien Aktif</p>
                        </div>
                        <div class="text-center min-w-[80px]">
                            <p class="text-2xl font-bold text-yellow-500 font-poppins">3+</p>
                            <p class="text-xs text-gray-500">Tahun Berdiri</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 pt-10 lg:pt-20 reveal delay-200">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 font-poppins">
                        Partner Terpercaya untuk Solusi Digital Anda
                    </h3>
                    <p class="text-gray-600 text-base mb-8">
                        LeLiLu memberikan layanan digital cepat, efisien, dan berkualitas.
                        Dengan tim profesional, kami fokus memberikan hasil terbaik sekaligus
                        membangun hubungan jangka panjang bagi setiap klien.
                    </p>

                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        @foreach ([
                        ['Profesional', 'Tim berpengalaman dan tersertifikasi di bidangnya'],
                        ['Cepat', 'Proses pengerjaan yang efisien tanpa mengorbankan kualitas'],
                        ['Berkualitas', 'Standar kerja tinggi dengan hasil yang memuaskan'],
                        ['Terpercaya', 'Transparan, amanah, dan bertanggung jawab'],
                        ] as [$judul, $desc])
                        <div class="flex items-start gap-4 {{ !$loop->last ? 'mb-5' : '' }}">
                            <div class="flex-shrink-0 w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center shadow-sm">
                                <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 leading-tight">{{ $judul }}:</h4>
                                <p class="text-gray-600 text-sm mt-1">{{ $desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="relative">
        <img src="{{ asset('Image/wave.png') }}" alt="Wave" class="absolute -top-20 md:-top-14 left-0 w-full z-0 pointer-events-none">
        <img src="{{ asset('Image/titik2.png') }}" alt="Wave" class="absolute bottom-0 md:-top-11 left-0 w-full z-10 pointer-events-none">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-5 pb-[8rem] pt-[12rem] bg-[#2c2a2a] md:bg-transparent">
            <div class="flex flex-col md:flex-row gap-8">
                <div>
                    <h3 class="font-bold mb-4 text-gray-300 uppercase tracking-wider">Bantuan & Dukungan</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-yellow-400 transition">Hubungi Kami</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-gray-300 uppercase tracking-wider">Layanan & Informasi</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-yellow-400 transition">Pemesanan Online</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Informasi Testimoni</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Jasa Desain</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Customer Services</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-gray-300 uppercase tracking-wider">Tentang Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-yellow-400 transition">Tentang LeLiLu</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Karier</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Partner & Kerja Sama</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Kontak Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4 text-gray-300 uppercase tracking-wider">Panduan Pengguna</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-yellow-400 transition">Cara Daftar Akun</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Cara Pemesanan Online</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Panduan Pembayaran</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Informasi Lainnya</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- ================= CAROUSEL SCRIPT ================= -->
    @if ($portofolios->isNotEmpty())
    <script>
        (function() {
            const track = document.getElementById('carouselTrack');
            const carousel = document.getElementById('bestSellerCarousel');
            const btnLeft = document.getElementById('carouselBtnLeft');
            const btnRight = document.getElementById('carouselBtnRight');

            if (!track || track.children.length === 0) return;

            // Duplikat item agar loop seamless
            const origCards = Array.from(track.children);
            origCards.forEach(card => track.appendChild(card.cloneNode(true)));

            function totalOrigWidth() {
                let w = 0;
                origCards.forEach(card => {
                    w += card.offsetWidth + 20;
                });
                return w;
            }

            let offset = 0;
            let paused = false;
            let lastTime = null;
            const SPEED = 17000; // px per detik (lebih besar = lebih lambat)

            function animate(ts) {
                if (!paused) {
                    if (lastTime !== null) {
                        const delta = ts - lastTime;
                        offset += (delta / SPEED) * totalOrigWidth();
                        if (offset >= totalOrigWidth()) offset -= totalOrigWidth();
                        track.style.transform = 'translateX(-' + offset + 'px)';
                    }
                    lastTime = ts;
                } else {
                    lastTime = null;
                }
                requestAnimationFrame(animate);
            }

            carousel.addEventListener('mouseenter', () => {
                paused = true;
            });
            carousel.addEventListener('mouseleave', () => {
                paused = false;
            });

            btnLeft && btnLeft.addEventListener('click', (e) => {
                e.stopPropagation();
                const step = origCards[0] ? origCards[0].offsetWidth + 20 : 320;
                offset = Math.max(0, offset - step);
                track.style.transform = 'translateX(-' + offset + 'px)';
            });

            btnRight && btnRight.addEventListener('click', (e) => {
                e.stopPropagation();
                const step = origCards[0] ? origCards[0].offsetWidth + 20 : 320;
                offset = (offset + step) % totalOrigWidth();
                track.style.transform = 'translateX(-' + offset + 'px)';
            });

            requestAnimationFrame(animate);
        })();
    </script>
    @endif

</body>

</html>