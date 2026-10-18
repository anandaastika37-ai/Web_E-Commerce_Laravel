<!-- Kartu produk (1 produk, data dummy, tanpa PHP). Butuh: Tailwind v4, Font Awesome, Alpine.js -->
<article x-data="{ liked: false }"
    class="group flex w-full max-w-sm flex-col rounded-3xl border border-gray-100 bg-white p-3 shadow-sm shadow-gray-200/50 transition-all duration-300 ease-out hover:-translate-y-1.5 hover:border-violet-200 hover:shadow-2xl hover:shadow-violet-300/30">

    <!-- Gambar -->
    <div class="relative aspect-4/5 overflow-hidden rounded-2xl bg-linear-to-br from-gray-100 to-gray-200">
        <img src="https://picsum.photos/seed/hoodie-sage/480/600" alt="Hoodie Oversize Sage Green" loading="lazy"
            class="size-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">

        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-2/5 bg-linear-to-t from-black/45 to-transparent"></div>

        <!-- Lencana kiri atas -->
        <div class="absolute left-3 top-3 flex flex-col items-start gap-1.5">
            <span class="rounded-lg bg-rose-500 px-2.5 py-1 text-xs font-bold text-white shadow-sm">-20%</span>
            <span class="inline-flex items-center gap-1 rounded-lg bg-amber-400 px-2.5 py-1 text-xs font-bold text-amber-950 shadow-sm">
                <i class="fa-solid fa-bolt text-[10px]"></i> Unggulan
            </span>
        </div>

        <!-- Tombol suka -->
        <button type="button" @click="liked = !liked" :title="liked ? 'Hapus dari favorit' : 'Simpan ke favorit'"
            class="absolute right-3 top-3 flex size-9 items-center justify-center rounded-full bg-white/90 text-sm shadow-sm backdrop-blur-md transition hover:scale-110 active:scale-90">
            <i class="fa-solid fa-heart transition" :class="liked ? 'text-red-500' : 'text-gray-300'"></i>
        </button>

        <!-- Gender -->
        <div class="absolute inset-x-3 bottom-3 flex items-center justify-between gap-2">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-white/90 px-2.5 py-1 text-xs font-semibold text-gray-700 backdrop-blur-md">
                <i class="fa-solid fa-venus-mars text-violet-600"></i> Unisex
            </span>
        </div>
    </div>

    <!-- Info produk -->
    <div class="mt-4 flex-1 px-1">

        <!-- Kategori, brand, rating -->
        <div class="flex items-center justify-between gap-2">
            <p class="min-w-0 truncate text-xs text-gray-500">
                <span class="font-semibold text-violet-700">Luaran</span>
                <span class="mx-1 text-gray-300">/</span>
                Urban Wear
            </p>

            <span class="inline-flex shrink-0 items-center gap-1 rounded-full bg-amber-50 px-2.5 py-1 font-commissioner text-xs font-bold text-amber-600">
                <i class="fa-solid fa-star text-amber-500"></i> 4.8
            </span>
        </div>

        <!-- Nama -->
        <h2 class="mt-2.5 line-clamp-1 font-figtree text-lg font-bold text-gray-900 transition-colors group-hover:text-violet-700">
            Hoodie Oversize Sage Green
        </h2>

        <!-- Bahan & berat -->
        <div class="mt-3 flex flex-wrap gap-2 text-xs text-gray-600">
            <span class="inline-flex items-center gap-1.5 rounded-lg bg-gray-50 px-2 py-1">
                <i class="fa-solid fa-layer-group text-[10px] text-violet-500"></i> Katun fleece 280 gsm
            </span>
            <span class="inline-flex items-center gap-1.5 rounded-lg bg-gray-50 px-2 py-1">
                <i class="fa-solid fa-weight-hanging text-[10px] text-violet-500"></i> 650 g
            </span>
        </div>

        <!-- Harga & terjual -->
        <div class="mt-4 flex flex-wrap items-end justify-between gap-2">
            <div>
                <p class="text-xs text-gray-400 line-through">Rp285.000</p>
                <p class="font-figtree text-2xl font-extrabold leading-none text-gray-900">
                    <span class="mr-0.5 text-sm font-bold text-violet-600">Rp</span>229.000
                </p>
            </div>

            <span class="inline-flex items-center gap-1.5 rounded-lg bg-gray-50 px-2 py-1 font-figtree text-xs font-semibold text-gray-500">
                <i class="fa-solid fa-bag-shopping text-[10px] text-violet-500"></i>
                1.250 terjual
            </span>
        </div>

        <p class="mt-3 text-[11px] text-gray-400">SKU HDI-OVR-001</p>
    </div>

    <!-- Aksi -->
    <div class="mt-4 flex items-center gap-2 border-t border-gray-100 pt-4">
        <button type="button" title="Tambah ke keranjang"
            class="flex size-11 shrink-0 items-center justify-center rounded-xl border border-violet-200 bg-violet-50 text-violet-700 transition hover:bg-violet-600 hover:text-white active:scale-95">
            <i class="fa-solid fa-cart-plus"></i>
        </button>

        <a href="/products/hoodie-oversize-sage-green"
            class="group/btn flex h-11 flex-1 items-center justify-center gap-2 rounded-xl bg-linear-to-r from-purple-600 to-indigo-800 font-semibold text-white shadow-md shadow-violet-200 transition hover:from-purple-700 hover:to-indigo-900 hover:shadow-lg">
            Selengkapnya
            <i class="fa-solid fa-arrow-right text-sm transition-transform duration-300 group-hover/btn:translate-x-1"></i>
        </a>
    </div>
</article>
