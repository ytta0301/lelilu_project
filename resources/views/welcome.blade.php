<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeLiLu - Solusi Digital Terbaik</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&family=Kalam:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-handwriting { font-family: 'Kalam', cursive; }
        
        /* Hide Scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Animations */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

        /* Responsive */
        @media (max-width: 1200px) {
            .max-w-7xl { max-width: 960px; }
            .lg\:text-9xl { font-size: 5rem; }
        }

        @media (max-width: 992px) {
            nav { height: 70px; }
            nav .max-w-7xl { padding: 0 24px; }
            .hidden.md\:flex { display: none; }
            .md\:block { display: block; }
            .md\:text-2xl { font-size: 1.5rem; }
            .md\:hidden { display: flex; }
            section.relative { min-height: auto; padding-top: 100px; padding-bottom: 60px; }
            .grid-cols-1.lg\:grid-cols-2 { grid-template-columns: 1fr; }
            .text-5xl { font-size: 2.5rem; }
            .text-6xl { font-size: 3rem; }
            .lg\:text-8xl { font-size: 4rem; }
            .lg\:text-9xl { font-size: 4.5rem; }
            .font-handwriting { font-size: 2.5rem !important; }
            .text-8xl { font-size: 4rem; }
            .text-9xl { font-size: 4.5rem; }
            .space-y-8 > * + * { margin-top: 2rem; }
            .absolute.-top-\[5rem\] { position: relative; top: 0; margin-top: 2rem; }
            .flex-col.sm\:flex-row { flex-direction: column; gap: 12px; }
            .gap-4 { gap: 12px; }
            .flex > button { width: 100%; justify-content: center; }
            .w-full { width: 100%; }
            .grid-cols-1.md\:grid-cols-2 { grid-template-columns: 1fr; }
            .lg\:col-span-9 { grid-column: span 1; }
            .lg\:col-span-3 { display: none; }
            .rounded-\[3rem\] { border-radius: 1.5rem; }
            .p-8 { padding: 1.5rem; }
            .lg\:grid-cols-12 { grid-template-columns: 1fr; }
            .lg\:pt-20 { padding-top: 2rem; }
            .lg\:col-span-7, .lg\:col-span-5 { grid-column: span 1; }
            .absolute.-bottom-6 { position: relative; bottom: 0; margin-top: 1.5rem; }
            .flex-wrap { flex-wrap: wrap; }
            .justify-between { justify-content: center; }
            .min-w-\[80px\] { min-width: 60px; }
            .grid-cols-2.md\:grid-cols-4 { grid-template-columns: repeat(2, 1fr); }
            footer .max-w-7xl { padding: 0 24px 4rem; }
            .pb-\[8rem\] { padding-bottom: 4rem; }
            .text-5xl { font-size: 2.5rem; }
            footer h2 { font-size: 2.5rem; }
        }

        @media (max-width: 768px) {
            nav { height: 64px; padding: 0 16px; }
            .text-xl { font-size: 1.25rem; }
            .max-w-7xl { padding: 0 16px; }
            .text-4xl { font-size: 2rem; }
            .md\:text-5xl { font-size: 2rem; }
            .text-5xl { font-size: 2.2rem; }
            .text-6xl { font-size: 2.5rem; }
            .text-7xl { font-size: 3rem; }
            .text-8xl { font-size: 3rem; }
            .text-9xl { font-size: 3.5rem; }
            .font-handwriting { font-size: 2rem !important; }
            section { padding-top: 90px; padding-bottom: 40px; }
            .gap-6 { gap: 1rem; }
            .py-20 { padding-top: 3rem; padding-bottom: 3rem; }
            .py-24 { padding-top: 3rem; padding-bottom: 3rem; }
            .py-20 { padding-top: 2.5rem; padding-bottom: 2.5rem; }
            .gap-4 { gap: 0.75rem; }
            .bg-white { padding: 1rem; }
            .grid-cols-1 { gap: 1rem; }
            .gap-8 { gap: 1.5rem; }
            .rounded-\[3rem\] { border-radius: 1.5rem; }
            .p-8, .p-12 { padding: 1.25rem; }
            .shadow-xl { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
            .hidden { display: none; }
            .text-center { text-align: center; }
            .items-center { align-items: center; }
            .justify-center { justify-content: center; }
            .flex-col { flex-direction: column; }
            .w-auto { width: 100%; }
            .h-auto { height: auto; }
            img.h-full { max-height: 300px; width: auto; }
            .mb-10 { margin-bottom: 1.5rem; }
            .mb-12 { margin-bottom: 2rem; }
            .mb-8 { margin-bottom: 1.5rem; }
            .gap-4 { gap: 0.75rem; }
            .text-sm { font-size: 0.875rem; }
            .text-xs { font-size: 0.75rem; }
            .border-b { border-bottom-width: 1px; }
            .text-gray-600 { font-size: 0.875rem; }
            .flex-col.md\:flex-row { flex-direction: column; }
            .bg-white { border-radius: 0.75rem; }
            footer .max-w-7xl { padding: 0 16px 3rem; }
            footer h2 { font-size: 2rem; }
            .text-xl.md\:text-2xl { font-size: 1.25rem; }
            .bg-\[\#FFD700\] { padding: 1rem 2rem; }
            button.py-3.px-8 { width: 100%; justify-content: center; }
        }

        @media (max-width: 600px) {
            nav { height: 60px; }
            .max-w-7xl { padding: 0 12px; }
            .flex.gap-6 { gap: 8px; }
            .h-8 { height: 24px; }
            .text-xl { font-size: 1.1rem; }
            .text-4xl { font-size: 1.75rem; }
            .md\:text-5xl { font-size: 1.75rem; }
            .text-5xl { font-size: 2rem; }
            .text-6xl { font-size: 2.2rem; }
            .text-7xl { font-size: 2.5rem; }
            .text-8xl { font-size: 2.8rem; }
            .text-9xl { font-size: 3rem; }
            .font-handwriting { font-size: 1.75rem !important; }
            section { padding-top: 80px; padding-bottom: 30px; }
            .py-16 { padding: 2rem 0; }
            .py-20 { padding: 2rem 0; }
            .py-24 { padding: 2rem 0; }
            .gap-8 { gap: 1.25rem; }
            .gap-4 { gap: 0.5rem; }
            .text-base { font-size: 0.875rem; }
            .text-sm { font-size: 0.75rem; }
            .text-xs { font-size: 0.65rem; }
            .leading-relaxed { line-height: 1.4; }
            .leading-tight { line-height: 1.2; }
            .mb-6 { margin-bottom: 1rem; }
            .mb-8 { margin-bottom: 1.25rem; }
            .mb-12 { margin-bottom: 1.5rem; }
            .p-4 { padding: 0.75rem; }
            .p-6 { padding: 1rem; }
            .p-8 { padding: 1rem; }
            .rounded-lg { border-radius: 0.5rem; }
            .rounded-2xl { border-radius: 0.75rem; }
            .rounded-\[3rem\] { border-radius: 1rem; }
            .shadow-lg { box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.1); }
            .shadow-xl { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
            .w-40 { width: 60%; }
            .h-40 { height: 40px; }
            .gap-3 { gap: 0.5rem; }
            .gap-4 { gap: 0.5rem; }
            img { max-width: 100%; height: auto; }
            .text-center { text-align: center; }
            .flex { flex-direction: column; }
            .items-center { align-items: center; }
            .space-y-4 > * + * { margin-top: 0.75rem; }
            .bg-white { padding: 0.75rem; }
            .grid-cols-1.md\:grid-cols-2 { grid-template-columns: 1fr; gap: 0.75rem; }
            .grid-cols-2 { grid-template-columns: 1fr 1fr; gap: 0.5rem; }
            .gap-2 { gap: 0.25rem; }
            .min-w-\[80px\] { min-width: 50px; }
            .text-2xl { font-size: 1.25rem; }
            .text-3xl { font-size: 1.5rem; }
            .text-xl { font-size: 1rem; }
            .text-lg { font-size: 0.875rem; }
            .text-sm { font-size: 0.75rem; }
            .text-xs { font-size: 0.65rem; }
            .font-bold { font-weight: 700; }
            .font-semibold { font-weight: 600; }
            .font-medium { font-weight: 500; }
            footer { padding-bottom: 2rem; }
            footer .max-w-7xl { padding: 0 12px 2rem; }
            footer h2 { font-size: 1.75rem; }
            .text-5xl { font-size: 1.75rem; }
            .text-white { font-size: 0.875rem; }
            .gap-2 { gap: 0.5rem; }
            .grid-cols-2.md\:grid-cols-4 { grid-template-columns: 1fr 1fr; gap: 1rem; }
            .space-y-2 > * + * { margin-top: 0.25rem; }
            .hidden.sm\:block { display: none; }
            .w-full { width: 100%; }
            .justify-between { justify-content: flex-start; }
            .bg-\[\#FFD700\] { padding: 0.75rem 1.5rem; font-size: 0.875rem; }
            .py-2\.5 { padding: 0.5rem 1rem; }
            .px-8 { padding-left: 1rem; padding-right: 1rem; }
            .rounded-full { border-radius: 9999px; }
            .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
            button, .btn { width: 100%; }
        }

        @media (max-width: 400px) {
            nav { height: 56px; }
            .text-xl { font-size: 1rem; }
            .text-4xl { font-size: 1.5rem; }
            .text-5xl { font-size: 1.75rem; }
            .text-6xl { font-size: 2rem; }
            .text-7xl { font-size: 2.2rem; }
            .text-8xl { font-size: 2.5rem; }
            .text-9xl { font-size: 2.8rem; }
            .font-handwriting { font-size: 1.5rem !important; }
            .py-2\.5 { padding: 0.4rem 0.75rem; }
            .text-sm { font-size: 0.7rem; }
            footer h2 { font-size: 1.5rem; }
            .text-white { font-size: 0.8rem; }
            .text-2xl { font-size: 1.1rem; }
        }

        /* Custom Wave Styles */
        .custom-wave-container {
    position: absolute;
    left: 0;
    width: 100%; /* <-- ubah dari 10% ke 100% */
    overflow: hidden;
    line-height: 0;
    z-index: 0;
}
        
        /* Wave di antara section (Menghadap Bawah) */
        .wave-divider {
            bottom: -1px; /* Supaya tidak ada celah putih tipis */
        }
        
        /* Wave di Footer (Menghadap Atas) */
        .wave-footer {
            top: 0;
            transform: rotate(180deg); /* Membalik gelombang agar menghadap atas */
        }
    </style>
</head>
<body class="bg-white text-gray-800 overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->
    <nav class="fixed w-full z-50 bg-white border-b border-gray-100 h-20 flex items-center transition-all duration-300 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex justify-between items-center">
            <div class="flex items-center gap-6">
                <a href="#" class="text-xl md:text-2xl font-bold tracking-tight text-gray-900">LeLiLu</a>
                <div class="h-8 w-[1px] bg-gray-200 hidden md:block"></div>
                <div class="hidden md:flex space-x-8 items-center ml-2">
                    <a href="#" class="text-gray-600 hover:text-black font-medium transition-colors">Home</a>
                    <a href="/portofolio" class="text-gray-600 hover:text-black font-medium transition-colors">Portofolio</a>
                    <a href="#testimoni" class="text-gray-600 hover:text-black font-medium transition-colors">Testimoni</a>
                    <a href="#about" class="text-gray-600 hover:text-black font-medium transition-colors">About us</a>
                    <a href="/chatbot" class="text-gray-600 hover:text-black font-medium transition-colors">FAQ</a>
                </div>
            </div>
<div class="flex items-center">
                <a href="/login" class="hidden md:block bg-[#FFD700] hover:bg-[#E6C200] text-black font-semibold py-2.5 px-8 rounded-full shadow-sm transition-all transform hover:-translate-y-0.5 text-sm md:text-base">Log in</a>
                <button id="mobile-menu-btn" class="md:hidden ml-4 text-gray-600 p-2" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white border-b border-gray-100 shadow-lg py-4 px-4 flex flex-col gap-3 z-40">
            <a href="#" class="text-gray-600 hover:text-black font-medium py-2">Home</a>
            <a href="/portofolio" class="text-gray-600 hover:text-black font-medium py-2">Portofolio</a>
            <a href="#testimoni" class="text-gray-600 hover:text-black font-medium py-2">Testimoni</a>
            <a href="#about" class="text-gray-600 hover:text-black font-medium py-2">About us</a>
            <a href="/chatbot" class="text-gray-600 hover:text-black font-medium py-2">AI</a>
            <a href="/login" class="bg-[#FFD700] text-black font-semibold py-2.5 px-8 rounded-full shadow-sm text-center">Log in</a>
        </div>
    </nav>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>

    <!-- ================= HERO SECTION ================= -->
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 bg-[#FFCF22] overflow-hidden min-h-screen flex items-center">
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
                        <a href="/dashboard"><button class="bg-white text-black font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-50 transition transform hover:scale-105">Order Now</button></a>
                        
                    </div>
                </div>
                <div class="absolute -top-[5rem] right-0 lg:h-full flex items-center justify-center fade-in-up" style="animation-delay: 0.2s;">
                    <img src="{{ asset('Image/hero-image.png') }}" alt="Ilustrasi Kucing" class=" h-full">
                </div>
            </div>
        </div>
        
        <!-- WAVE DIVIDER (Hero to Portfolio) -->
        <div class="custom-wave-container wave-divider">
           
        </div>
    </section>

    <!-- ================= BEST SELLER SECTION ================= -->
     <section id="portfolio" class="py-20 bg-[#FAFAFA] relative overflow-hidden">
        <div class="absolute bottom-0 right-0 w-64 h-64 opacity-20 pointer-events-none">
             <svg width="100%" height="100%" viewBox="0 0 200 200"><pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="2" fill="#FFD700"></circle></pattern><rect width="100%" height="100%" fill="url(#dots)"></rect></svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex justify-between items-end mb-10 fade-in-up">
                <div class="flex items-center gap-4">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900">Best <span class="text-[#FFD700]">Seller</span></h2>
                    <div class="h-2 w-24 bg-[#FFD700] rounded-full hidden md:block"></div>
                </div>
                <a href="#" class="text-gray-800 font-semibold hover:text-[#FFD700] transition flex items-center gap-1 group">See More <span class="transform group-hover:translate-x-1 transition-transform">&gt;</span></a>
            </div>
            
            <div class="flex overflow-x-auto gap-6 pb-8 no-scrollbar snap-x snap-mandatory fade-in-up" style="animation-delay: 0.2s;">
                
                <!-- ITEM 1: Dengan Pop-up Detail -->
                <div class="min-w-[300px] md:min-w-[450px] snap-center cursor-pointer group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-[250px] object-cover transform group-hover:scale-105 transition-transform duration-500">
                    
                    <!-- POP UP CONTENT (Hanya muncul di Best Seller) -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40 backdrop-blur-[2px]">
                        <div class="bg-white p-4 rounded-lg shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 text-center">
                            <h3 class="font-bold text-gray-900">Banner Promosi</h3>
                            <p class="text-xs text-gray-500 mt-1">Ukuran 19:6 | High Res</p>
                            <span class="inline-block mt-2 text-[#FFD700] font-bold text-sm">Rp 150.000</span>
                        </div>
                    </div>
                </div>

                <!-- ITEM 2: Dengan Pop-up Detail -->
                <div class="min-w-[250px] md:min-w-[300px] snap-center cursor-pointer group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-[250px] object-cover transform group-hover:scale-105 transition-transform duration-500">
                    
                    <!-- POP UP CONTENT -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40 backdrop-blur-[2px]">
                        <div class="bg-white p-4 rounded-lg shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 text-center">
                            <h3 class="font-bold text-gray-900">Feed Instagram</h3>
                            <p class="text-xs text-gray-500 mt-1">Ukuran 1:1 | Estetik</p>
                            <span class="inline-block mt-2 text-[#FFD700] font-bold text-sm">Rp 50.000</span>
                        </div>
                    </div>
                </div>

                <!-- ITEM 3: Dengan Pop-up Detail -->
                <div class="min-w-[200px] md:min-w-[240px] snap-center cursor-pointer group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-[250px] object-cover transform group-hover:scale-105 transition-transform duration-500">
                    
                    <!-- POP UP CONTENT -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40 backdrop-blur-[2px]">
                        <div class="bg-white p-4 rounded-lg shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 text-center">
                            <h3 class="font-bold text-gray-900">Story IG</h3>
                            <p class="text-xs text-gray-500 mt-1">Ukuran 4:5 | Interaktif</p>
                            <span class="inline-block mt-2 text-[#FFD700] font-bold text-sm">Rp 35.000</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <!-- WAVE DIVIDER -->
        <div class="custom-wave-container wave-divider">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#F9F5F0" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- ================= TESTIMONI SECTION ================= -->
    <section id="testimoni" class="py-24 bg-[#F9F5F0] relative overflow-hidden">
        <img src="{{ asset('Image/titik.png') }}" alt="Titik" class="absolute top-0 left-0 h-full">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none" 
             style="background-image: radial-gradient(#FFD700 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-3 hidden lg:block pt-10">
                    
                </div>
                <div class="lg:col-span-9 bg-[#FFD700] rounded-[3rem] p-8 md:p-12 shadow-xl relative overflow-hidden fade-in-up">
                    <div class="flex justify-between items-end mb-10 border-b border-black/10 pb-6">
                        <h2 class="text-4xl md:text-5xl font-bold text-black font-poppins">Testimoni</h2>
                        <a href="/testimoni" class="hidden md:inline-flex items-center text-lg font-semibold text-black hover:opacity-70 transition group">See More <span class="ml-2 transform group-hover:translate-x-1 transition-transform">&gt;</span></a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Card 1 -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition duration-300 flex flex-col h-full">
                            <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-grow">"Lorem ipsum dolor sit amet, consectetur adipiscing elit..."</p>
                            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                                <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm flex items-center gap-1">
                                        Kibutsuji Muzan
                                        <svg class="w-4 h-4 text-blue-500 ml-auto" fill="currentColor" viewBox="0 0 24 24"><path d="M23 12L20.56 9.22L20.9 5.54L17.29 4.72L15.4 1.54L12 3L8.6 1.54L6.71 4.72L3.1 5.53L3.44 9.21L1 12L3.44 14.78L3.1 18.47L6.71 19.29L8.6 22.47L12 21L15.4 22.46L17.29 19.28L20.9 18.46L20.56 14.78L23 12ZM10 17L6 13L7.41 11.58L10 14.17L16.59 7.58L18 9L10 17Z"/></svg>    
                                    </h4>
                                    <span class="text-xs text-gray-400">@muzan12</span>
                                </div>       
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition duration-300 flex flex-col h-full">
                            <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-grow">"Lorem ipsum dolor sit amet, consectetur adipiscing elit..."</p>
                            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                                <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm flex items-center gap-1">
                                        Kibutsuji Muzan
                                        <svg class="w-4 h-4 text-blue-500 ml-auto" fill="currentColor" viewBox="0 0 24 24"><path d="M23 12L20.56 9.22L20.9 5.54L17.29 4.72L15.4 1.54L12 3L8.6 1.54L6.71 4.72L3.1 5.53L3.44 9.21L1 12L3.44 14.78L3.1 18.47L6.71 19.29L8.6 22.47L12 21L15.4 22.46L17.29 19.28L20.9 18.46L20.56 14.78L23 12ZM10 17L6 13L7.41 11.58L10 14.17L16.59 7.58L18 9L10 17Z"/></svg>    
                                    </h4>
                                    <span class="text-xs text-gray-400">@muzan12</span>
                                </div>       
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition duration-300 flex flex-col h-full">
                            <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-grow">"Lorem ipsum dolor sit amet, consectetur adipiscing elit..."</p>
                            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                                <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm flex items-center gap-1">
                                        Kibutsuji Muzan
                                        <svg class="w-4 h-4 text-blue-500 ml-auto" fill="currentColor" viewBox="0 0 24 24"><path d="M23 12L20.56 9.22L20.9 5.54L17.29 4.72L15.4 1.54L12 3L8.6 1.54L6.71 4.72L3.1 5.53L3.44 9.21L1 12L3.44 14.78L3.1 18.47L6.71 19.29L8.6 22.47L12 21L15.4 22.46L17.29 19.28L20.9 18.46L20.56 14.78L23 12ZM10 17L6 13L7.41 11.58L10 14.17L16.59 7.58L18 9L10 17Z"/></svg>    
                                    </h4>
                                    <span class="text-xs text-gray-400">@muzan12</span>
                                </div>       
                            </div>
                        </div>
                         <!-- Card 4 -->
                         <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition duration-300 flex flex-col h-full">
                            <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-grow">"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum..."</p>
                            <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                                <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm flex items-center gap-1">
                                        Kibutsuji Muzan
                                        <svg class="w-4 h-4 text-blue-500 ml-auto" fill="currentColor" viewBox="0 0 24 24"><path d="M23 12L20.56 9.22L20.9 5.54L17.29 4.72L15.4 1.54L12 3L8.6 1.54L6.71 4.72L3.1 5.53L3.44 9.21L1 12L3.44 14.78L3.1 18.47L6.71 19.29L8.6 22.47L12 21L15.4 22.46L17.29 19.28L20.9 18.46L20.56 14.78L23 12ZM10 17L6 13L7.41 11.58L10 14.17L16.59 7.58L18 9L10 17Z"/></svg>    
                                    </h4>
                                    <span class="text-xs text-gray-400">@muzan12</span>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- WAVE DIVIDER (Testimoni to About) -->
        <div class="custom-wave-container wave-divider">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="#F9F5F0" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- ================= ABOUT US / SIAPA KAMI? SECTION ================= -->
    <section id="about" class="py-20 bg-[#F9F5F0] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 reveal">
                <h2 class="text-4xl md:text-5xl font-extrabold text-black inline-block mr-4 font-poppins">Siapa <span class="text-yellow-500 italic">Kami?</span></h2>
                <div class="h-2 w-7/12 bg-yellow-500 inline-block align-middle rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <!-- Left: Image & Stats -->
                <div class="lg:col-span-7 relative reveal delay-100">
                    <img src="{{ asset('image/Firefly.webp') }}" class="w-full h-auto object-cover block rounded-xl shadow-sm">
                    <div class="absolute -bottom-6 left-4 right-4 md:left-8 md:right-auto md:w-[90%] bg-white p-6 rounded-xl shadow-2xl flex justify-between items-center z-20 border border-gray-100 flex-wrap gap-4">
                        <div class="text-center min-w-[80px]"><p class="text-2xl font-bold text-yellow-500 font-poppins">19Jt</p><p class="text-xs text-gray-500">Project Selesai</p></div>
                        <div class="text-center min-w-[80px]"><p class="text-2xl font-bold text-yellow-500 font-poppins">67%</p><p class="text-xs text-gray-500">Klien Puas</p></div>
                        <div class="text-center min-w-[80px]"><p class="text-2xl font-bold text-yellow-500 font-poppins">76+</p><p class="text-xs text-gray-500">Klien Aktif</p></div>
                        <div class="text-center min-w-[80px]"><p class="text-2xl font-bold text-yellow-500 font-poppins">3+</p><p class="text-xs text-gray-500">Tahun Pengalaman</p></div>
                    </div>
                </div>

                <!-- Right: Content + Feature Cards -->
                <div class="lg:col-span-5 pt-10 lg:pt-20 reveal delay-200">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 font-poppins">Partner Terpercaya untuk Solusi Digital Anda</h3>
                    <p class="text-gray-600 text-base mb-8">LeLiLu memberikan layanan digital cepat, efisien, dan berkualitas. Dengan tim profesional dan tingkat kepuasan 98%, kami fokus memberikan hasil terbaik sekaligus membangun hubungan jangka panjang bagi setiap klien.</p>
                    
                    <!-- Feature Cards Container -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        
                        <!-- Poin 1 -->
                        <div class="flex items-start gap-4 mb-5">
                            <div class="flex-shrink-0 w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center shadow-sm">
                                <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 leading-tight">Profesional:</h4>
                                <p class="text-gray-600 text-sm mt-1">Tim berpengalaman dan tersertifikasi di bidangnya</p>
                            </div>
                        </div>

                        <!-- Poin 2 -->
                        <div class="flex items-start gap-4 mb-5">
                            <div class="flex-shrink-0 w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center shadow-sm">
                                <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 leading-tight">Cepat:</h4>
                                <p class="text-gray-600 text-sm mt-1">Proses pengerjaan yang efisien tanpa mengorbankan kualitas</p>
                            </div>
                        </div>

                        <!-- Poin 3 -->
                        <div class="flex items-start gap-4 mb-5">
                            <div class="flex-shrink-0 w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center shadow-sm">
                                <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 leading-tight">Berkualitas:</h4>
                                <p class="text-gray-600 text-sm mt-1">Standar kerja tinggi dengan hasil yang memuaskan</p>
                            </div>
                        </div>

                        <!-- Poin 4 -->
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center shadow-sm">
                                <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 leading-tight">Terpercaya:</h4>
                                <p class="text-gray-600 text-sm mt-1">Transparan, amanah, dan bertanggung jawab</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <!-- WAVE DIVIDER (About to Footer) -->
        
    </section>
    
    <!-- ================= FOOTER BARU (REVISI: GELAMBANG SAMA) ================= -->'
    <footer class="relative">
        <!-- Gelombang Kuning Tebal di Paling Bawah (Menggunakan SVG yang sama tapi di-rotate/diposisikan di bottom) -->
        <img src="{{ asset('Image/wave.png') }}" alt="Wave" class="absolute -bottom-[2rem] left-0 w-full overflow-hidden leading-none z-0">

        <!-- Dekorasi Halftone Dot Pattern di Kanan Bawah (Di atas kuning, di dalam area hitam) -->
        <div class="absolute bottom-20 right-0 w-96 h-96 opacity-20 pointer-events-none z-0">
            <svg width="100%" height="100%" viewBox="0 0 200 200">
                <pattern id="footer-dots" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
                    <circle cx="1" cy="1" r="1" fill="white"></circle>
                </pattern>
                <rect width="100%" height="100%" fill="url(#footer-dots)"></rect>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pb-[8rem]">
            
            <!-- Logo -->
            <div class="mb-12">
                <h2 class="text-5xl font-bold font-poppins tracking-tight text-white">LeLiLu</h2>
            </div>

            <!-- Grid Links -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-sm">
                
                <!-- Kolom 1 -->
                <div>
                    <h3 class="font-bold mb-4 text-gray-300 uppercase tracking-wider">Bantuan & Dukungan</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-yellow-400 transition">Hubungi Kami</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <!-- Kolom 2 -->
                <div>
                    <h3 class="font-bold mb-4 text-gray-300 uppercase tracking-wider">Layanan & Informasi</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-yellow-400 transition">Pemesanan Online</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Informasi Testimoni</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Jasa Desain</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Customer Services</a></li>
                    </ul>
                </div>

                <!-- Kolom 3 -->
                <div>
                    <h3 class="font-bold mb-4 text-gray-300 uppercase tracking-wider">Tentang Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-yellow-400 transition">Tentang LeLiLu</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Karier</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Partner & Kerja Sama</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">Kontak Kami</a></li>
                    </ul>
                </div>

                <!-- Kolom 4 -->
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

</body>
</html>