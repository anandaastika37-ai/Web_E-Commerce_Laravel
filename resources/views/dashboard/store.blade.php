<x-dashboard>

    <x-navbar-store></x-navbar-store>

    {{-- kelola product --}}
    <div
        class="w-full flex flex-wrap items-center justify-between gap-3 bg-white p-3 rounded-2xl border border-gray-100 shadow-sm mt-15">

        {{-- Filter --}}
        <div class="filter-product flex flex-wrap items-center gap-2">
            <div class="relative">
                <i
                    class="fa-solid fa-arrow-down-short-wide absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                <select name="sort" id="sort"
                    class="appearance-none h-10 pl-9 pr-9 rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-700 outline-none cursor-pointer transition hover:bg-white hover:border-gray-300 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    <option value="">Default</option>
                    <option value="name">A-Z</option>
                    <option value="price">Harga</option>
                    <option value="latest">Terbaru</option>
                    <option value="stock">Stok terbanyak</option>
                    <option value="best_seller">Terlaris</option>
                </select>
                <i
                    class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-gray-400 pointer-events-none"></i>
            </div>

            <div class="relative">
                <i
                    class="fa-solid fa-layer-group absolute left-3 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                <select name="category" id="category"
                    class="appearance-none h-10 pl-9 pr-9 rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-700 outline-none cursor-pointer transition hover:bg-white hover:border-gray-300 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    <option value="">Semua Kategori</option>
                    <option value="atasan">Atasan</option>
                    <option value="bawahan">Bawahan</option>
                    <option value="luaran">Luaran</option>
                    <option value="aksesori">Aksesori</option>
                </select>
                <i
                    class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-gray-400 pointer-events-none"></i>
            </div>
        </div>

        <div class="flex flex-wrap items-center justify-end gap-3">

            {{-- Search: input dan tombol menyatu --}}
            <div
                class="search flex items-stretch h-10 w-full sm:w-72 rounded-xl border border-gray-200 bg-gray-50 overflow-hidden transition focus-within:bg-white focus-within:border-violet-500 focus-within:ring-4 focus-within:ring-violet-100">
                <input type="text" name="search" placeholder="Cari produk..."
                    class="flex-1 min-w-0 px-3 text-sm bg-transparent outline-none placeholder:text-gray-400">
                <button type="button" title="Cari"
                    class="w-11 flex items-center justify-center bg-violet-500 hover:bg-violet-600 active:bg-violet-700 text-white text-sm transition">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            {{-- Aksi --}}
            <div class="flex items-center gap-2 sm:border-l sm:border-gray-200 sm:pl-3">
                <a href="{{ route('dashboard.products.create') }}" title="Tambah"
                    class="h-10 px-4 inline-flex items-center gap-2 rounded-xl bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold shadow-sm shadow-violet-200 transition">
                    <i class="fa-solid fa-plus text-xs"></i> Tambah
                </a>
            </div>
        </div>
    </div>

    {{-- list produk --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">



    </div>
    {{-- analisa product --}}
</x-dashboard>
