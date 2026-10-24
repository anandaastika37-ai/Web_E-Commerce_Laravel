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
                <a href="{{ url('/add') }}" title="Tambah"
                    class="h-10 px-4 inline-flex items-center gap-2 rounded-xl bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold shadow-sm shadow-violet-200 transition">
                    <i class="fa-solid fa-plus text-xs"></i> Tambah
                </a>
            </div>
        </div>
    </div>

    {{-- list produk --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        <article x-data="{ confirmDelete: false }"
            class="group flex flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition duration-300 hover:border-violet-200 hover:shadow-lg hover:shadow-violet-200/40">

            <!-- Gambar -->
            <div class="relative aspect-4/3 overflow-hidden bg-linear-to-br from-gray-100 to-gray-200">
                <img src="https://picsum.photos/seed/hoodie-sage/480/360" alt="Hoodie Oversize Sage Green"
                    loading="lazy"
                    class="size-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">

                <!-- Status -->
                <span
                    class="absolute left-2.5 top-2.5 inline-flex items-center gap-1.5 rounded-full bg-white/90 px-2.5 py-1 text-xs font-semibold text-emerald-700 shadow-sm backdrop-blur-md">
                    <span class="size-1.5 rounded-full bg-emerald-500"></span> Aktif
                </span>

                <!-- Unggulan -->
                <span
                    class="absolute right-2.5 top-2.5 inline-flex items-center gap-1 rounded-lg bg-amber-400 px-2 py-1 text-xs font-bold text-amber-950 shadow-sm">
                    <i class="fa-solid fa-bolt text-[10px]"></i> Unggulan
                </span>

                <!-- Diskon -->
                <span
                    class="absolute bottom-2.5 left-2.5 rounded-lg bg-rose-500 px-2 py-1 text-xs font-bold text-white shadow-sm">-20%</span>
            </div>

            <!-- Info -->
            <div class="flex flex-1 flex-col p-3">
                <p class="truncate text-xs text-gray-500">
                    <span class="font-semibold text-violet-700">Luaran</span>
                    <span class="mx-1 text-gray-300">/</span>
                    Urban Wear
                    <span class="mx-1 text-gray-300">/</span>
                    <span class="text-gray-400">HDI-OVR-001</span>
                </p>

                <h3 class="mt-1 line-clamp-1 font-figtree text-base font-bold text-gray-900">
                    Hoodie Oversize Sage Green
                </h3>

                <!-- Harga -->
                <div class="mt-1.5 flex items-baseline gap-2">
                    <p class="font-figtree text-xl font-extrabold leading-none text-gray-900">
                        <span class="mr-0.5 text-xs font-bold text-violet-600">Rp</span>229.000
                    </p>
                    <p class="text-xs text-gray-400 line-through">Rp285.000</p>
                </div>

                <!-- Statistik -->
                <div class="mt-2.5 flex items-center gap-1.5 text-xs">
                    <span
                        class="inline-flex items-center gap-1.5 rounded-lg bg-gray-50 px-2 py-1 font-semibold text-gray-600">
                        <i class="fa-solid fa-boxes-stacked text-[10px] text-violet-500"></i> Stok 55
                    </span>
                    <span
                        class="inline-flex items-center gap-1.5 rounded-lg bg-gray-50 px-2 py-1 font-semibold text-gray-600">
                        <i class="fa-solid fa-bag-shopping text-[10px] text-violet-500"></i> 1.250 terjual
                    </span>
                </div>

                <!-- Aksi -->
                <div class="mt-3">
                    <!-- Tombol normal -->
                    <div x-show="!confirmDelete" class="flex items-center gap-2">
                        <a href="/edit/1"
                            class="inline-flex h-9 flex-1 items-center justify-center gap-1.5 rounded-lg border border-amber-200 bg-amber-50 text-sm font-semibold text-amber-700 transition hover:bg-amber-500 hover:text-white active:scale-95">
                            <i class="fa-regular fa-pen-to-square text-xs"></i> Edit
                        </a>
                        <button type="button" @click="confirmDelete = true"
                            class="inline-flex h-9 flex-1 items-center justify-center gap-1.5 rounded-lg border border-red-200 bg-red-50 text-sm font-semibold text-red-600 transition hover:bg-red-500 hover:text-white active:scale-95">
                            <i class="fa-regular fa-trash-can text-xs"></i> Hapus
                        </button>
                    </div>

                    <!-- Konfirmasi hapus (satu baris, tinggi sama) -->
                    <div x-show="confirmDelete" x-cloak class="flex items-center gap-2">
                        <span class="mr-auto text-xs font-medium text-gray-600">Hapus produk ini?</span>
                        <button type="button" @click="confirmDelete = false"
                            class="inline-flex h-9 items-center justify-center rounded-lg border border-gray-200 bg-white px-3 text-sm font-semibold text-gray-600 transition hover:bg-gray-50 active:scale-95">
                            Batal
                        </button>
                        <!-- Ganti dengan <form method="POST" action="/delete/1"> + @csrf @method('DELETE') -->
                        <button type="button"
                            class="inline-flex h-9 items-center justify-center rounded-lg bg-red-500 px-3 text-sm font-semibold text-white transition hover:bg-red-600 active:scale-95">
                            Ya, hapus
                        </button>
                    </div>
                </div>
            </div>
        </article>

    </div>
    {{-- analisa product --}}
</x-dashboard>
