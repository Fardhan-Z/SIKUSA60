<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - SIKUSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-[#f0f4ff] flex">
    <div class="hidden md:flex w-1/2 bg-gradient-to-br from-[#5177ff] to-[#4fc3f7] text-white items-center justify-center p-12 ">
        <div class="max-w-md text-center flex flex-col items-center gap-6">
            <img src="{{ asset('images/SIKUSA.png') }}" alt="SIKUSA Logo" class="h-75 object-contain">
            <p class="text-lg leading-relaxed -mt-30">
                Sistem Keluhan Sarana Sekolah <br>
                Laporkan seluruh keluhan sarana sekolahmu dengan mudah dan cepat.
            </p>
        </div>
    </div>
    <div class="w-full md:w-1/2 flex items-center justify-center px-6">
        <div class="w-full max-w-md bg-white p-10 rounded-2xl shadow-xl">

            <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">
                Login Akun
            </h2>

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        NIS / NIP
                    </label>
                    <input type="text" name="nip_nis" placeholder="Masukkan NIS atau NIP" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#5177ff] focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Password
                    </label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#5177ff] focus:outline-none transition">
                </div>
                <button type="submit"
                    class="w-full bg-[#5177ff] text-white py-3 rounded-lg font-semibold hover:bg-[#3f5fe0] transition duration-200 shadow-md">
                    Masuk
                </button>
            </form>
        </div>
    </div>

</body>

</html>
