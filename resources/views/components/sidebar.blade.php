@php
    $links = [
        ['route' => 'home',             'icon' => 'fa-house',       'label' => 'Beranda'],
        ['route' => 'catalog.index',    'icon' => 'fa-shirt',       'label' => 'Produk'],
        ['route' => 'categories.index', 'icon' => 'fa-layer-group', 'label' => 'Kategori'],
        ['route' => 'catalog.new',      'icon' => 'fa-calendar',    'label' => 'Koleksi Baru'],
        ['route' => 'catalog.promo',    'icon' => 'fa-tags',        'label' => 'Promo'],
    ];

    $user = auth()->user();
    $dashboardUrl = $user?->isSeller() ? route('dashboard.store') : route('dashboard');
@endphp

<aside class="fixed inset-y-0 left-0 z-30 flex w-60 flex-col border-r border-gray-200 bg-white">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="logo flex items-center gap-2 px-6 pt-8 pb-6">
        <img src="{{ asset('img/softwear-icon-purple.png') }}" alt="Logo Softwear" class="w-9">
        <span class="font-dm-sans text-2xl text-purple-500">
            <span class="font-bold text-purple-600">Soft</span>wear
        </span>
    </a>

    {{-- Menu --}}
    <nav class="route-link flex-1 overflow-y-auto px-4 pb-4">
        <p class="mb-2 px-3 text-xs font-semibold tracking-wider text-gray-400 uppercase">Jelajahi</p>

        <ul class="space-y-1">
            @foreach ($links as $link)
                @php $active = request()->routeIs($link['route']); @endphp
                <li>
                    <a href="{{ route($link['route']) }}"
                        @if ($active) aria-current="page" @endif
                        @class([
                            'group relative flex items-center gap-3 rounded-xl px-3 py-2.5 text-[15px] transition',
                            'bg-violet-50 font-semibold text-violet-700 before:absolute before:top-1/2 before:-left-4 before:h-6 before:w-1 before:-translate-y-1/2 before:rounded-r-full before:bg-violet-600' => $active,
                            'text-gray-600 hover:bg-gray-50 hover:text-gray-900' => ! $active,
                        ])>
                        <span @class([
                            'flex size-9 items-center justify-center rounded-lg text-sm transition',
                            'bg-violet-100 text-violet-600' => $active,
                            'bg-gray-100 text-gray-500 group-hover:bg-violet-100 group-hover:text-violet-600' => ! $active,
                        ])>
                            <i class="fa-solid {{ $link['icon'] }}"></i>
                        </span>
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</aside>
