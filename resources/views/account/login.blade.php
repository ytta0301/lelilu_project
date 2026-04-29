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
    </style>
</head>
<body class="bg-yellow-400 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-[50px] overflow-hidden flex flex-col md:flex-row max-w-3x1 w-50 h-50 custom-shadow">
        
        <div class="relative min-h-[300px]">
            <div class="absolute top-8 left-8 z-10">
                <h1 class="text-white text-3xl font-bold tracking-wider drop-shadow-md">LeLiLu</h1>
            </div>
            <img src="{{ asset('image/bunga.png') }}" alt="" class="w-50 h-50 object-cover">
        </div>

        <div class="md:w-1/2 px-8 md:px-12 flex flex-col justify-center">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang <span class="text-yellow-500 italic">Kembali</span></h2>
                <div class="h-1.5 w-24 bg-yellow-400 mt-1 rounded-full"></div>
                <p class="text-gray-400 text-sm mt-4">Masuk ke akun LeLiLu Anda untuk melanjutkan</p>
            </div>

            <form action="#" class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Nomor WhatsApp</label>
                    <input type="text" placeholder="Nomor WhatsApp anda" 
                           class="w-full px-4 py-3 bg-gray-100 border-none rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Password</label>
                    <input type="password" placeholder="Password" 
                           class="w-full px-4 py-3 bg-gray-100 border-none rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>

                <div class="flex items-center justify-between text-xs sm:text-sm">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="accent-yellow-400">
                        <label for="remember" class="ml-2 text-gray-600">Remember me</label>
                    </div>
                    <a href="#" class="text-yellow-500 hover:underline">Forgot Password?</a>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <button type="button" class="flex-1 flex items-center justify-center border border-gray-300 py-2.5 rounded-xl hover:bg-gray-50 transition">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5 mr-2" alt="Google">
                        <span class="text-sm font-medium text-gray-700">Masuk dengan Google</span>
                    </button>
                </div>

                <div class="relative flex py-4 items-center">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="flex-shrink mx-4 text-gray-400 text-sm bg-black text-white px-3 py-0.5 rounded-full">atau</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="flex gap-3">
                    <a href="/" type="button" class="px-10 py-3 border-2 border-gray-200 rounded-2xl text-gray-400 hover:bg-gray-50 hover:text-gray-600 transition font-bold w-full sm:w-auto">
                        Kembali
                    </a>
                    <a href="/dashbord" type="submit" class="flex-1 bg-yellow-400 py-2 rounded-lg text-gray-800 font-bold shadow-md hover:bg-yellow-500 transition flex items-center justify-center">Masuk Ke Akun</a>
                </div>
            </form>

            <p class="text-center mt-8 text-sm text-gray-600">
                Belum punya akun? <a href="/register" class="text-yellow-500 font-bold hover:underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>

</body>
</html>