{{-- =============================================================== --}}
{{-- FILE : resources/views/partials/footer.blade.php               --}}
{{-- CARA PAKAI : @include('partials.footer')                       --}}
{{-- =============================================================== --}}

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