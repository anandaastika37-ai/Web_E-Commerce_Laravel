@php
    $user = auth()->user();
    $isSeller = (bool) $user->isSeller();
    $store = $isSeller ? $user->store : null;
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:wght@100..1000&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 font-['DM_Sans'] text-gray-800">


    <main class="mx-auto w-full max-w-5xl p-4 sm:p-6">

        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-violet-600">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke dashboard
        </a>

        @if (session('success'))
            <div class="mt-4 rounded-xl bg-green-50 p-3 text-sm text-green-700">{{ session('success') }}</div>
        @endif

        {{-- Kartu profil --}}
        <section class="mt-4 overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
            <div class="h-28 bg-linear-to-r from-purple-600 to-indigo-800"></div>

            <div class="flex flex-col gap-4 px-6 pb-6 sm:flex-row sm:items-end">
                <div class="-mt-12 shrink-0">
                    @if ($user->profile_photo)
                        <img src="{{ $user->profile_photo_url }}" alt="Foto profil {{ $user->username }}"
                            class="size-24 rounded-full border-4 border-white object-cover shadow-md">
                    @else
                        <span class="flex size-24 items-center justify-center rounded-full border-4 border-white bg-linear-to-br from-violet-500 to-indigo-600 text-3xl font-bold text-white shadow-md">
                            {{ mb_strtoupper(mb_substr($user->username, 0, 1)) }}
                        </span>
                    @endif
                </div>

                <div class="min-w-0 flex-1">
                    <h1 class="truncate font-['Commissioner'] text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="truncate text-sm text-gray-500">{{ '@' . $user->username }}</p>
                </div>

                <span @class([
                    'inline-flex w-fit items-center gap-1.5 rounded-full px-3 py-1 text-xs font-semibold',
                    'bg-violet-100 text-violet-700' => $isSeller,
                    'bg-sky-100 text-sky-700' => ! $isSeller,
                ])>
                    <i class="fa-solid {{ $isSeller ? 'fa-store' : 'fa-bag-shopping' }} text-[11px]"></i>
                    {{ $isSeller ? 'Penjual' : 'Pembeli' }}
                </span>
            </div>
        </section>

        <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Kolom kiri: form --}}
            <div class="space-y-6 lg:col-span-2">

                {{-- Informasi pribadi --}}
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <h2 class="font-['Commissioner'] text-lg font-bold text-gray-900">Informasi Pribadi</h2>
                    <p class="mt-0.5 text-sm text-gray-500">Perbarui data akun dan foto profilmu.</p>

                    {{-- Ganti action="#" dengan route('profile.update') setelah route-nya dibuat --}}
                    <form method="POST" action="#" enctype="multipart/form-data" class="mt-6 space-y-4">
                        @csrf
                        @method('PUT')

                        {{-- Foto --}}
                        <div x-data="{ preview: @js($user->profile_photo ? $user->profile_photo_url : null) }" class="flex items-center gap-4">
                            <span class="flex size-20 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-dashed border-violet-200 bg-violet-50 text-xl text-violet-400">
                                <img x-cloak x-show="preview" :src="preview" alt="Pratinjau foto" class="size-full object-cover">
                                <i x-show="!preview" class="fa-solid fa-user"></i>
                            </span>
                            <div>
                                <label for="profile_photo"
                                    class="cursor-pointer rounded-xl border border-violet-200 px-4 py-2 text-sm font-semibold text-violet-700 transition hover:bg-violet-50">
                                    Ganti foto
                                </label>
                                <input type="file" id="profile_photo" name="profile_photo" accept="image/png,image/jpeg,image/webp" class="sr-only"
                                    @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : preview">
                                <p class="mt-1.5 text-xs text-gray-500">JPG, PNG, atau WebP. Maksimal 2 MB.</p>
                                @error('profile_photo')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="name" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required maxlength="100"
                                    autocomplete="name"
                                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                @error('name')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="username" class="mb-1.5 block text-sm font-semibold text-gray-700">Username</label>
                                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required maxlength="50"
                                    pattern="[A-Za-z0-9_\-]+" title="Hanya huruf, angka, garis bawah (_), dan strip (-)"
                                    autocomplete="username"
                                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                @error('username')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="email" class="mb-1.5 block text-sm font-semibold text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                                    autocomplete="email"
                                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="mb-1.5 block text-sm font-semibold text-gray-700">Nomor HP <span class="font-normal text-gray-500">(opsional)</span></label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" maxlength="20"
                                    autocomplete="tel" placeholder="08123456789"
                                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                @error('phone')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="h-11 rounded-xl bg-violet-600 px-6 text-sm font-semibold text-white transition hover:bg-violet-700 active:scale-95">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </section>

                {{-- Ubah password --}}
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <h2 class="font-['Commissioner'] text-lg font-bold text-gray-900">Ubah Password</h2>
                    <p class="mt-0.5 text-sm text-gray-500">Gunakan password yang kuat dan belum dipakai di tempat lain.</p>

                    {{-- Ganti action="#" dengan route('password.update') setelah route-nya dibuat --}}
                    <form method="POST" action="#" x-data="{ show: false }" class="mt-6 space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="current_password" class="mb-1.5 block text-sm font-semibold text-gray-700">Password Saat Ini</label>
                            <div class="relative">
                                <input :type="show ? 'text' : 'password'" id="current_password" name="current_password" required
                                    autocomplete="current-password"
                                    class="h-11 w-full rounded-xl border border-violet-200 bg-white pr-10 pl-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                <button type="button" @click="show = !show" aria-label="Tampilkan atau sembunyikan password"
                                    class="absolute top-1/2 right-3 -translate-y-1/2 text-gray-400 hover:text-violet-600">
                                    <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="password" class="mb-1.5 block text-sm font-semibold text-gray-700">Password Baru</label>
                                <input :type="show ? 'text' : 'password'" id="password" name="password" required minlength="8"
                                    autocomplete="new-password" placeholder="Minimal 8 karakter"
                                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                @error('password')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="mb-1.5 block text-sm font-semibold text-gray-700">Ulangi Password Baru</label>
                                <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required minlength="8"
                                    autocomplete="new-password"
                                    class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="h-11 rounded-xl bg-violet-600 px-6 text-sm font-semibold text-white transition hover:bg-violet-700 active:scale-95">
                                Perbarui Password
                            </button>
                        </div>
                    </form>
                </section>
            </div>

            {{-- Kolom kanan: ringkasan --}}
            <aside class="space-y-6">

                {{-- Info akun --}}
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <h2 class="font-['Commissioner'] text-lg font-bold text-gray-900">Info Akun</h2>

                    <dl class="mt-4 space-y-3 text-sm">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-envelope mt-0.5 w-4 text-center text-gray-400"></i>
                            <div class="min-w-0">
                                <dt class="text-xs text-gray-500">Email</dt>
                                <dd class="truncate font-medium text-gray-800">{{ $user->email }}</dd>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-phone mt-0.5 w-4 text-center text-gray-400"></i>
                            <div class="min-w-0">
                                <dt class="text-xs text-gray-500">Nomor HP</dt>
                                <dd class="truncate font-medium text-gray-800">{{ $user->phone ?: 'Belum diisi' }}</dd>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-calendar-days mt-0.5 w-4 text-center text-gray-400"></i>
                            <div class="min-w-0">
                                <dt class="text-xs text-gray-500">Bergabung sejak</dt>
                                <dd class="font-medium text-gray-800">{{ $user->created_at->format('d M Y') }}</dd>
                            </div>
                        </div>
                    </dl>
                </section>

                {{-- Toko (khusus penjual) --}}
                @if ($isSeller)
                    <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                        <h2 class="font-['Commissioner'] text-lg font-bold text-gray-900">Toko</h2>

                        @if ($store)
                            <div class="mt-4 flex items-center gap-3">
                                <img src="{{ $store->logo_url }}" alt="Logo {{ $store->name }}" class="size-12 shrink-0 rounded-xl border border-gray-100 object-cover">
                                <div class="min-w-0">
                                    <p class="truncate text-sm font-semibold text-gray-800">{{ $store->name }}</p>
                                    <p class="truncate text-xs text-gray-500">{{ $store->city ?: 'Kota belum diisi' }}</p>
                                </div>
                            </div>
                            <a href="{{ route('dashboard.store') }}"
                                class="mt-4 flex h-10 items-center justify-center gap-2 rounded-xl border border-violet-200 text-sm font-semibold text-violet-700 transition hover:bg-violet-50">
                                <i class="fa-solid fa-store text-xs"></i> Kelola Toko
                            </a>
                        @else
                            <p class="mt-2 text-sm text-gray-500">Kamu belum punya toko. Buat toko untuk mulai berjualan.</p>
                            <a href="{{ route('store.setup') }}"
                                class="mt-4 flex h-10 items-center justify-center gap-2 rounded-xl bg-violet-600 text-sm font-semibold text-white transition hover:bg-violet-700">
                                <i class="fa-solid fa-plus text-xs"></i> Buat Toko
                            </a>
                        @endif
                    </section>
                @endif

                {{-- Keluar --}}
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <h2 class="font-['Commissioner'] text-lg font-bold text-gray-900">Sesi</h2>
                    <p class="mt-1 text-sm text-gray-500">Keluar dari akun di perangkat ini.</p>
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="flex h-10 w-full items-center justify-center gap-2 rounded-xl border border-red-200 text-sm font-semibold text-red-600 transition hover:bg-red-50">
                            <i class="fa-solid fa-right-from-bracket text-xs"></i> Keluar
                        </button>
                    </form>
                </section>
            </aside>
        </div>
    </main>

</body>

</html>
