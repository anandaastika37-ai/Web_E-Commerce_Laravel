<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Toko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:wght@100..1000&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-linear-to-br from-violet-100 via-violet-50 to-indigo-100 p-4 font-['DM_Sans'] text-gray-800">

    <div class="w-full max-w-xl rounded-2xl bg-white p-8 shadow-lg">

        <div class="text-center">
            <span class="mx-auto flex size-12 items-center justify-center rounded-xl bg-violet-600 text-xl text-white">
                <i class="fa-solid fa-store"></i>
            </span>
            <h1 class="mt-4 font-['Commissioner'] text-2xl font-bold text-gray-900">Buat Toko Kamu</h1>
            <p class="mt-1 text-sm text-gray-500">Lengkapi data toko sebelum mulai berjualan.</p>
        </div>

        @if (session('error'))
            <div class="mt-4 rounded-xl bg-amber-50 p-3 text-sm text-amber-700">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('store.store') }}" enctype="multipart/form-data" class="mt-6 space-y-4">
            @csrf

            {{-- Logo --}}
            <div x-data="{ preview: null }" class="flex items-center gap-4">
                <span class="flex size-20 shrink-0 items-center justify-center overflow-hidden rounded-2xl border-2 border-dashed border-violet-200 bg-violet-50 text-xl text-violet-400">
                    <img x-cloak x-show="preview" :src="preview" alt="Pratinjau logo" class="size-full object-cover">
                    <i x-show="!preview" class="fa-solid fa-camera"></i>
                </span>
                <div>
                    <label for="logo" class="cursor-pointer rounded-xl border border-violet-200 px-4 py-2 text-sm font-semibold text-violet-700 transition hover:bg-violet-50">
                        Pilih logo
                    </label>
                    <input type="file" id="logo" name="logo" accept="image/png,image/jpeg,image/webp" class="sr-only"
                        @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null">
                    <p class="mt-1.5 text-xs text-gray-500">JPG, PNG, atau WebP. Maksimal 2 MB. (opsional)</p>
                    @error('logo')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Nama toko --}}
            <div>
                <label for="name" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Toko</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="100" autofocus
                    placeholder="Contoh: Toko Baju Budi"
                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="mb-1.5 block text-sm font-semibold text-gray-700">Deskripsi <span class="font-normal text-gray-500">(opsional)</span></label>
                <textarea id="description" name="description" rows="3" maxlength="1000"
                    placeholder="Ceritakan singkat tentang tokomu..."
                    class="w-full rounded-xl border border-violet-200 bg-white px-3.5 py-2.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Telepon & kota --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="phone" class="mb-1.5 block text-sm font-semibold text-gray-700">Nomor HP Toko <span class="font-normal text-gray-500">(opsional)</span></label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" maxlength="20"
                        autocomplete="tel" placeholder="08123456789"
                        class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    @error('phone')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="city" class="mb-1.5 block text-sm font-semibold text-gray-700">Kota <span class="font-normal text-gray-500">(opsional)</span></label>
                    <input type="text" id="city" name="city" value="{{ old('city') }}" maxlength="100"
                        placeholder="Contoh: Denpasar"
                        class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    @error('city')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Alamat --}}
            <div>
                <label for="address" class="mb-1.5 block text-sm font-semibold text-gray-700">Alamat <span class="font-normal text-gray-500">(opsional)</span></label>
                <textarea id="address" name="address" rows="2" maxlength="500"
                    placeholder="Alamat lengkap toko / gudang"
                    class="w-full rounded-xl border border-violet-200 bg-white px-3.5 py-2.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="h-11 w-full rounded-xl bg-violet-600 text-sm font-semibold text-white hover:bg-violet-700 active:scale-95">
                Buat Toko
            </button cl>
        </form>

        <div class="mt-6 flex items-center justify-between text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-violet-600"><i class="fa-solid fa-arrow-left text-xs"></i> Ke beranda</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-red-500">Keluar</button>
            </form>
        </div>
    </div>

</body>

</html>
