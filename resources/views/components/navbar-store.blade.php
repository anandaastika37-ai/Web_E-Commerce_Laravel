

<nav class="fixed left-64 right-0 top-0 z-10 flex h-20 items-center gap-6 overflow-x-auto border-b border-gray-100 bg-white px-10">

    {{-- Kelola Produk (menyala juga di halaman /add dan /edit/...) --}}
    <a href="{{ url('/store') }}"
        class="inline-flex h-10 shrink-0 items-center gap-2 rounded-xl px-4 text-sm font-semibold {{ request()->is('store', 'add', 'edit/*') ? 'bg-violet-50 text-violet-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
        <i class="fa-solid fa-box text-xs"></i> Kelola Produk
    </a>

    {{-- Pesanan --}}
    <a href="{{ url('/store/orders') }}"
        class="inline-flex h-10 shrink-0 items-center gap-2 rounded-xl px-4 text-sm font-semibold {{ request()->is('store/orders*') ? 'bg-violet-50 text-violet-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
        <i class="fa-solid fa-receipt text-xs"></i> Pesanan
    </a>

    {{-- Analisa --}}
    <a href="{{ url('/store/analysis') }}"
        class="inline-flex h-10 shrink-0 items-center gap-2 rounded-xl px-4 text-sm font-semibold {{ request()->is('store/analysis*') ? 'bg-violet-50 text-violet-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
        <i class="fa-solid fa-chart-line text-xs"></i> Analisa
    </a>

    {{-- Profil Toko --}}
    <a href="{{ url('/store/profile') }}"
        class="inline-flex h-10 shrink-0 items-center gap-2 rounded-xl px-4 text-sm font-semibold {{ request()->is('store/profile*') ? 'bg-violet-50 text-violet-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
        <i class="fa-solid fa-store text-xs"></i> Profil Toko
    </a>

    {{-- Nama toko (paling kanan) --}}
    <div class="ml-auto flex shrink-0 items-center gap-3 border-l border-gray-200 pl-4">
        <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-linear-to-br from-purple-600 to-indigo-800 text-white shadow-md shadow-violet-200">
            <i class="fa-solid fa-store"></i>
        </span>
        <div>
            <p class="text-xs text-gray-400">Toko</p>
            <p class="text-sm font-semibold text-gray-800">{{ auth()->user()?->store?->name ?? 'Nama toko belum diisi' }}</p>
        </div>
    </div>

</nav>
