<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:wght@100..1000&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-linear-to-br from-violet-100 via-violet-50 to-indigo-100 p-4 font-['DM_Sans'] text-gray-800">

    <!-- Card -->
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg">

        <div class="text-center">
            <span class="mx-auto flex size-12 items-center justify-center rounded-xl bg-violet-600 text-xl text-white">
                <i class="fa-solid fa-right-to-bracket"></i>
            </span>
            <h1 class="mt-4 font-['Commissioner'] text-2xl font-bold text-gray-900">Masuk ke Akunmu</h1>
            <p class="mt-1 text-sm text-gray-500">Masukkan email dan password untuk melanjutkan.</p>
        </div>

        <form method="POST" action="{{ url('/login') }}" class="mt-6 space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="mb-1.5 block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="nama@email.com"
                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password (ada tombol lihat/sembunyikan) -->
            <div x-data="{ show: false }">
                <label for="password" class="mb-1.5 block text-sm font-semibold text-gray-700">Password</label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="password" name="password" required
                        placeholder="Masukkan password"
                        class="h-11 w-full rounded-xl border border-violet-200 bg-white pl-3.5 pr-10 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    <button type="button" @click="show = !show" title="Lihat password"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-violet-600">
                        <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Ingat saya -->
            <label class="flex cursor-pointer items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="size-4 accent-violet-600"> Ingat saya
            </label>

            <button type="submit"
                class="h-11 w-full rounded-xl bg-violet-600 text-sm font-semibold text-white hover:bg-violet-700 active:scale-95">
                Masuk
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            Belum punya akun?
            <a href="{{ url('/register') }}" class="font-semibold text-violet-600 hover:text-violet-800">Daftar</a>
        </p>
    </div>

</body>

</html>
