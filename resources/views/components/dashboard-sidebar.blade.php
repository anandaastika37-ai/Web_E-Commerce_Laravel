@php
    $user = auth()->user();
    $displayName = $user->username ?? $user->name ?? 'Tamu';
    $isSeller = (bool) $user?->isSeller();
     $hasStore = $isSeller && $user->store !== null;

    $menus = [
        ['label' => 'Beranda',    'icon' => 'fa-house',         'url' => url('/dashboard'),     'active' => request()->is('dashboard')],
        ['label' => 'Notifikasi', 'icon' => 'fa-bell',          'url' => url('/notifications'), 'active' => request()->is('notifications*'), 'badge' => null],
        ['label' => 'Keranjang',  'icon' => 'fa-cart-shopping', 'url' => url('/cart'),          'active' => request()->is('cart*'),          'badge' => null],
        ['label' => 'Disukai',    'icon' => 'fa-heart',         'url' => url('/wishlist'),      'active' => request()->is('wishlist*')],
    ];
@endphp

<aside class="fixed inset-y-0 left-0 w-64 flex flex-col bg-white border-r border-gray-100">

    {{-- Header --}}
    <div class="px-6 pt-6 pb-5">
        <a href="{{ url('/') }}" title="Kembali ke toko"
            class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-violet-600 transition">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Beranda
        </a>
        <h2 class="mt-5 font-bold font-commissioner text-3xl text-gray-800">Dashboard</h2>
    </div>

    {{-- Kelola Toko (khusus penjual) --}}
    @if ($isSeller)
<div class="px-4">
        @if ($hasStore)
            {{-- Sudah punya toko --}}
            <a href="{{ route('dashboard.store') }}"
                class="group flex items-center gap-3 rounded-2xl bg-linear-to-r from-purple-600 to-indigo-800 p-3 text-white shadow-lg shadow-violet-200 transition hover:-translate-y-0.5 hover:shadow-xl hover:shadow-violet-300">
                <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-white/20 text-lg">
                    <i class="fa-solid fa-store"></i>
                </span>
                <span class="min-w-0 flex-1">
                    <span class="block truncate text-sm font-semibold">Kelola Toko</span>
                    <span class="block truncate text-xs text-white/70">{{ $user->store->name }}</span>
                </span>
                <i class="fa-solid fa-chevron-right text-xs text-white/70 transition group-hover:translate-x-0.5"></i>
            </a>
        @else
            {{-- Belum punya toko --}}
            <a href="{{ route('store.setup') }}"
                class="group flex items-center gap-3 rounded-2xl border-2 border-dashed border-violet-300 bg-violet-50 p-3 text-violet-700 transition hover:-translate-y-0.5 hover:border-violet-500 hover:bg-violet-100">
                <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-violet-600 text-lg text-white">
                    <i class="fa-solid fa-plus"></i>
                </span>
                <span class="min-w-0 flex-1">
                    <span class="block text-sm font-semibold">Buat Toko</span>
                    <span class="block text-xs text-violet-600/80">Mulai berjualan sekarang</span>
                </span>
                <i class="fa-solid fa-chevron-right text-xs text-violet-400 transition group-hover:translate-x-0.5"></i>
            </a>
        @endif
    </div>
    @endif

    {{-- Menu --}}
    <nav class="flex-1 overflow-y-auto px-4 pt-6 pb-5">
        <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Menu</p>

        <ul class="space-y-1">
            @foreach ($menus as $menu)
                <li>
                    <a href="{{ $menu['url'] }}"
                        @class([
                            'group relative flex items-center gap-3 rounded-xl px-3 py-2.5 text-[15px] transition',
                            'bg-violet-50 text-violet-700 font-semibold before:absolute before:-left-4 before:top-1/2 before:-translate-y-1/2 before:h-6 before:w-1 before:rounded-r-full before:bg-violet-600' => $menu['active'],
                            'text-gray-600 hover:bg-gray-50 hover:text-gray-900' => ! $menu['active'],
                        ])>

                        <span @class([
                            'w-9 h-9 flex items-center justify-center rounded-lg text-sm transition',
                            'bg-violet-100 text-violet-600' => $menu['active'],
                            'bg-gray-100 text-gray-500 group-hover:bg-violet-100 group-hover:text-violet-600' => ! $menu['active'],
                        ])>
                            <i class="fa-solid {{ $menu['icon'] }}"></i>
                        </span>

                        <span class="flex-1">{{ $menu['label'] }}</span>

                        @if (! empty($menu['badge']))
                            <span class="min-w-5 h-5 px-1.5 flex items-center justify-center rounded-full bg-violet-600 text-white text-[11px] font-semibold">
                                {{ $menu['badge'] }}
                            </span>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    {{-- Username + role (paling bawah) --}}
    <div class="p-4 border-t border-gray-100">
        <a href="{{ route('profile') }}" title="Lihat profil"
            class="group flex items-center gap-3 rounded-xl p-2 transition hover:bg-gray-50">
            <div class="w-11 h-11 shrink-0 flex items-center justify-center rounded-full bg-linear-to-br from-purple-600 to-indigo-800 text-white font-bold text-lg shadow-md shadow-violet-200">
                {{ strtoupper(mb_substr($displayName, 0, 1)) }}
            </div>

            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-semibold text-gray-800">{{ $displayName }}</p>
                <span @class([
                    'mt-0.5 inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[11px] font-semibold',
                    'bg-violet-100 text-violet-700' => $isSeller,
                    'bg-sky-100 text-sky-700' => ! $isSeller,
                ])>
                    <i class="fa-solid {{ $isSeller ? 'fa-store' : 'fa-bag-shopping' }} text-[10px]"></i>
                    {{ $isSeller ? 'Penjual' : 'Pembeli' }}
                </span>
            </div>

            <i class="fa-solid fa-chevron-right text-[10px] text-gray-300 transition group-hover:text-violet-500"></i>
        </a>
    </div>
</aside>
