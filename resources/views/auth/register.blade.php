<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:wght@100..1000&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-linear-to-br from-violet-100 via-violet-50 to-indigo-100 p-4 font-['DM_Sans'] text-gray-800">

    <!-- Card -->
    <div class="w-full max-w-lg rounded-2xl bg-white p-8 shadow-lg">

        <div class="text-center">
            <span class="mx-auto flex size-12 items-center justify-center rounded-xl bg-violet-600 text-xl text-white">
                <i class="fa-solid fa-user-plus"></i>
            </span>
            <h1 class="mt-4 font-['Commissioner'] text-2xl font-bold text-gray-900">Buat Akun Baru</h1>
            <p class="mt-1 text-sm text-gray-500">Isi data berikut untuk mulai belanja atau berjualan.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
            @csrf

            <!-- Nama & username -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="100" autofocus
                        placeholder="Nama kamu"
                        class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="username" class="mb-1.5 block text-sm font-semibold text-gray-700">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required maxlength="50"
                    pattern="[A-Za-z0-9_\-]+" title="Hanya huruf, angka, garis bawah (_), dan strip (-)"
                    autocomplete="username" placeholder="nama_pengguna"
                        class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    @error('username')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="mb-1.5 block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    placeholder="nama@email.com"
                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor HP -->
            <div>
                <label for="phone" class="mb-1.5 block text-sm font-semibold text-gray-700">Nomor HP <span class="font-normal text-gray-500">(opsional)</span></label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" maxlength="20"
                    placeholder="08123456789"
                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                @error('phone')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Daftar sebagai (nilai: buyer / seller) -->
            <div>
                <span class="mb-1.5 block text-sm font-semibold text-gray-700">Daftar sebagai</span>
                <div class="grid grid-cols-2 gap-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="buyer" class="peer sr-only" @checked(old('role', 'buyer') === 'buyer')>
                        <span class="flex h-11 items-center justify-center gap-2 rounded-xl border border-violet-200 bg-white text-sm font-semibold text-violet-800 peer-checked:border-violet-600 peer-checked:bg-violet-600 peer-checked:text-white peer-focus-visible:ring-4 peer-focus-visible:ring-violet-200">
                            <i class="fa-solid fa-bag-shopping text-xs"></i> Pembeli
                        </span>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="seller" class="peer sr-only" @checked(old('role') === 'seller')>
                        <span class="flex h-11 items-center justify-center gap-2 rounded-xl border border-violet-200 bg-white text-sm font-semibold text-violet-800 peer-checked:border-violet-600 peer-checked:bg-violet-600 peer-checked:text-white peer-focus-visible:ring-4 peer-focus-visible:ring-violet-200">
                            <i class="fa-solid fa-store text-xs"></i> Penjual
                        </span>
                    </label>
                </div>
                @error('role')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password & konfirmasi -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div x-data="{ show: false }">
                    <label for="password" class="mb-1.5 block text-sm font-semibold text-gray-700">Password</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required minlength="8"
                            placeholder="Minimal 8 karakter"
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

                <div x-data="{ show: false }">
                    <label for="password_confirmation" class="mb-1.5 block text-sm font-semibold text-gray-700">Ulangi Password</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required minlength="8"
                            placeholder="Ketik ulang password"
                            class="h-11 w-full rounded-xl border border-violet-200 bg-white pl-3.5 pr-10 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                        <button type="button" @click="show = !show" title="Lihat password"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-violet-600">
                            <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="h-11 w-full rounded-xl bg-violet-600 text-sm font-semibold text-white hover:bg-violet-700 active:scale-95">
                Daftar
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-violet-600 hover:text-violet-800">Masuk</a>
        </p>
    </div>

</body>

</html>
