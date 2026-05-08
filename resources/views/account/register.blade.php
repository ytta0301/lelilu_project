<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeLiLu - Daftar Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-yellow-400 min-h-screen flex items-center justify-center p-4 sm:p-6">

    <div class="bg-white rounded-[30px] sm:rounded-[50px] shadow-2xl flex flex-col md:flex-row w-full max-w-5xl overflow-hidden relative">

        <div class="relative w-full md:w-6/12 h-64 md:h-auto">
            <div class="absolute top-8 left-8 z-10">
                <h1 class="text-white text-3xl font-bold tracking-wider drop-shadow-md">LeLiLu</h1>
            </div>
            <img src="{{ asset('image/cat.png') }}" alt="" class="h-full object-cover">
        </div>

        <div class="w-full md:w-5/12 px-8 md:px-5 md:py-5 flex flex-col justify-center bg-white">

            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <h2 class="text-3xl font-bold text-gray-800">
                        Selamat <span class="text-yellow-500 font-normal italic">Datang</span>
                    </h2>
                    <div class="h-2 w-32 bg-yellow-400 rounded-full mt-2"></div>
                </div>
                <p class="text-gray-400 text-sm font-medium">Daftarkan akun LeLiLu Anda untuk melanjutkan pembayaran</p>
            </div>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-gray-700 font-bold mb-1 ml-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama anda"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-50 border border-gray-200 text-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-1 ml-1">Nomor WhatsApp</label>
                    <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="Contoh: 08123456789"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-50 border border-gray-200 text-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all">
                    @error('whatsapp')
                        <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-1 ml-1">Password</label>
                    <input type="password" name="password" placeholder="Masukan Password"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-50 border border-gray-200 text-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-1 ml-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="Masukan password"
                        class="w-full px-5 py-3 rounded-2xl bg-gray-50 border border-gray-200 text-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:bg-white transition-all">
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-6">
                    <a href="/login" class="order-2 sm:order-1 px-10 py-3 border-2 border-gray-200 rounded-2xl text-gray-400 hover:bg-gray-50 hover:text-gray-600 transition font-bold w-full sm:w-auto text-center">
                        Kembali
                    </a>
                    <button type="submit" class="order-1 sm:order-2 px-10 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-800 rounded-2xl font-black shadow-lg shadow-yellow-200 transition-all transform hover:-translate-y-1 w-full sm:w-auto">
                        Daftar Akun
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center">
                <p class="text-sm font-bold text-gray-800">
                    Sudah punya akun? <a href="/login" class="text-yellow-500 hover:text-yellow-600 transition ml-1">Login</a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>