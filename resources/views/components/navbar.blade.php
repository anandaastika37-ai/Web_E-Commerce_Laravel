@php
    $user = auth()->user();
    $isSeller = (bool) $user?->isSeller();

    $menuLinks = [['label' => 'Dashboard', 'icon' => 'fa-gauge', 'url' => route('dashboard')]];
    if ($isSeller) {
        $menuLinks[] = ['label' => 'Toko Saya', 'icon' => 'fa-store', 'url' => route('dashboard.store')];
    }
@endphp

<nav class="fixed top-0 right-0 left-60 z-20">
    <div class="flex h-18 items-center gap-6 border-b border-gray-200/80 bg-white/80 px-6 backdrop-blur-md">

        {{-- Pencarian --}}
        <form action="{{ route('catalog.index') }}" method="GET" role="search"
            class="relative hidden w-full max-w-md sm:block">
            <i class="fa-solid fa-magnifying-glass pointer-events-none absolute top-1/2 left-4 -translate-y-1/2 text-sm text-gray-400"></i>
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari produk..."
                aria-label="Cari produk"
                class="h-11 w-full rounded-full border border-gray-200 bg-gray-50 pr-4 pl-11 text-sm outline-none transition focus:border-violet-400 focus:bg-white focus:ring-4 focus:ring-violet-100">
        </form>

        <div class="ml-auto flex items-center gap-2">

            @guest
                <a href="{{ route('register') }}"
                    class="rounded-full px-4 py-2 text-sm font-semibold text-gray-600 transition hover:bg-violet-50 hover:text-violet-700">
                    Daftar
                </a>
                <a href="{{ route('login') }}"
                    class="rounded-full bg-violet-600 px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-violet-700 active:scale-95">
                    Masuk
                </a>
            @endguest

            @auth
                {{-- Ganti '#' dengan route() setelah halamannya dibuat --}}
                @if ($user->isBuyer())
                    <a href="#" aria-label="Keranjang"
                        class="flex size-10 items-center justify-center rounded-full text-gray-500 transition hover:bg-violet-50 hover:text-violet-600">
                        <i class="fa-solid fa-cart-shopping text-lg"></i>
                    </a>
                @endif
                <a href="#" aria-label="Notifikasi"
                    class="flex size-10 items-center justify-center rounded-full text-gray-500 transition hover:bg-violet-50 hover:text-violet-600">
                    <i class="fa-solid fa-bell text-lg"></i>
                </a>

                <span class="mx-2 h-6 w-px bg-gray-200"></span>

                {{-- Menu pengguna --}}
                <div x-data="{ open: false }" @keydown.escape.window="open = false" @click.outside="open = false"
                    class="relative">

                    <button type="button" @click="open = !open" :aria-expanded="open" aria-haspopup="menu"
                        class="flex items-center gap-2.5 rounded-full border border-gray-200 bg-white py-1 pr-3 pl-1 transition hover:border-violet-300 hover:shadow-sm">
                        @if ($user->profile_photo)
                            <img src="{{ $user->profile_photo_url }}" alt="" class="size-9 rounded-full object-cover">
                        @else
                            <span class="flex size-9 items-center justify-center rounded-full bg-linear-to-br from-violet-500 to-indigo-600 text-sm font-bold text-white">
                                {{ mb_strtoupper(mb_substr($user->username, 0, 1)) }}
                            </span>
                        @endif
                        <span class="hidden max-w-28 truncate font-dm-sans text-sm font-semibold text-gray-700 md:block">
                            {{ $user->username }}
                        </span>
                        <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 transition-transform"
                            :class="open && 'rotate-180'"></i>
                    </button>

                    <div x-cloak x-show="open" x-transition.origin.top.right role="menu"
                        class="absolute right-0 mt-2 w-64 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl">

                        <div class="flex items-center gap-3 border-b border-gray-100 bg-violet-50/60 p-4">
                            @if ($user->profile_photo)
                                <img src="{{ $user->profile_photo_url }}" alt="" class="size-11 rounded-full object-cover">
                            @else
                                <span class="flex size-11 items-center justify-center rounded-full bg-linear-to-br from-violet-500 to-indigo-600 font-bold text-white">
                                    {{ mb_strtoupper(mb_substr($user->username, 0, 1)) }}
                                </span>
                            @endif
                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-gray-800">{{ $user->name }}</p>
                                <p class="truncate text-xs text-gray-500">{{ '@' . $user->username }}</p>
                                <span class="mt-1 inline-block rounded-full bg-violet-100 px-2 py-0.5 text-[11px] font-semibold text-violet-700">
                                    {{ $isSeller ? 'Penjual' : 'Pembeli' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-2">
                            @foreach ($menuLinks as $item)
                                <a href="{{ $item['url'] }}" role="menuitem"
                                    class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm text-gray-700 transition hover:bg-violet-50 hover:text-violet-700">
                                    <i class="fa-solid {{ $item['icon'] }} w-4 text-center text-gray-400"></i>
                                    {{ $item['label'] }}
                                </a>
                            @endforeach


                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" role="menuitem"
                                    class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm text-red-600 transition hover:bg-red-50">
                                    <i class="fa-solid fa-right-from-bracket w-4 text-center"></i>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
