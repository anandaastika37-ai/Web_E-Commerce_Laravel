@php
    $data = product()
@endphp
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
