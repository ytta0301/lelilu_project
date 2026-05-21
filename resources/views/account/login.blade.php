<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LeLiLu Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .bg-yellow-main { background-color: #FACC15; }
        .text-yellow-main { color: #FACC15; }
        .custom-shadow { box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1); }

        @media (max-width: 480px) {
            body { padding: 12px; }
        }
        @media (max-width: 360px) {
            body { padding: 8px; }
            .text-2xl { font-size: 1.2rem; }
            .px-6 { padding-left: 12px; padding-right: 12px; }
            .py-8 { padding-top: 16px; padding-bottom: 16px; }
        }
    </style>
</head>
<body class="bg-yellow-400 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-[30px] md:rounded-[50px] overflow-hidden flex flex-col md:flex-row max-w-4xl w-full custom-shadow">
        
        <div class="relative w-full md:w-1/2 h-48 md:h-auto md:min-h-[300px] overflow-hidden">
            <div class="absolute top-6 md:top-8 left-6 md:left-8 z-10">
                <h1 class="text-white text-2xl md:text-3xl font-bold tracking-wider drop-shadow-md">LeLiLu</h1>
            </div>
            <img src="{{ asset('Image/bunga.png') }}" alt="" class="w-full h-full object-cover">
        </div>

        <div class="w-full md:w-1/2 px-6 md:px-12 py-8 md:py-0 flex flex-col justify-center">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang <span class="text-yellow-500 italic">Kembali</span></h2>
                <div class="h-1.5 w-24 bg-yellow-400 mt-1 rounded-full"></div>
                <p class="text-gray-400 text-sm mt-4">Masuk ke akun LeLiLu Anda untuk melanjutkan</p>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">
                        Nomor WhatsApp / Nama
                    </label>
                    <input type="text" name="identifier" value="{{ old('identifier') }}"
                        placeholder="Nomor WhatsApp atau nama Anda"
                        class="w-full px-4 py-3 bg-gray-100 border-none rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none">
                    @error('identifier')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Password</label>
                    <input type="password" name="password" placeholder="Password" 
                        class="w-full px-4 py-3 bg-gray-100 border-none rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-xs sm:text-sm">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="accent-yellow-400">
                        <label for="remember" class="ml-2 text-gray-600">Remember me</label>
                    </div>
                    <a href="#" class="text-yellow-500 hover:underline">Forgot Password?</a>
                </div>

                <div class="relative flex py-4 items-center">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="flex-shrink mx-4 text-gray-400 text-sm bg-black text-white px-3 py-0.5 rounded-full"></span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="/" class="px-10 py-3 border-2 border-gray-200 rounded-2xl text-gray-400 hover:bg-gray-50 hover:text-gray-600 transition font-bold w-full sm:w-auto text-center">
                        Kembali
                    </a>
                    <button type="submit" class="flex-1 bg-yellow-400 py-3 rounded-2xl text-gray-800 font-bold shadow-md hover:bg-yellow-500 transition flex items-center justify-center w-full sm:w-auto">
                        Masuk Ke Akun
                    </button>
                </div>
            </form>

            <p class="text-center mt-8 text-sm text-gray-600">
                Belum punya akun? <a href="/register" class="text-yellow-500 font-bold hover:underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>

</body>
</html>