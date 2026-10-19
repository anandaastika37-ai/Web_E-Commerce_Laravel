@php
    $categories = $categories ??  [['id' => 1 , 'name' => 'Luaran' ], ['id' => 2  , 'name' => 'Bawahan'] ,['id' => 3  , 'name' => 'Atasan' ],[ 'id' => 4 , 'name' => 'Aksesoris'] , [ 'id' => 5 , 'name' => 'Alas kaki']];
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- Latar gradasi ungu lembut dengan pola titik tipis --}}
<body class="min-h-screen font-['DM_Sans'] text-gray-800 antialiased"
    style="background-image: radial-gradient(rgb(124 58 237 / .12) 1px, transparent 1px), linear-gradient(160deg, #ddd6fe 0%, #f5f3ff 42%, #e0e7ff 100%); background-size: 24px 24px, 100% 100%; background-attachment: scroll, fixed;">

    <div class="mx-auto w-[94%] py-8 lg:w-4/5">

        <!-- Header halaman -->
        <header
            class="relative mb-6 overflow-hidden rounded-3xl bg-linear-to-r from-purple-600 via-violet-600 to-indigo-700 p-6 shadow-xl shadow-violet-300/50 sm:p-8">
            <div class="pointer-events-none absolute -right-12 -top-20 size-64 rounded-full bg-white/10"></div>
            <div class="pointer-events-none absolute -bottom-24 right-28 size-52 rounded-full bg-fuchsia-300/20 blur-2xl">
            </div>

            <div class="relative flex flex-wrap items-end justify-between gap-4">
                <div>
                    <nav class="flex items-center gap-2 text-xs text-violet-100">
                        <a href="#" class="transition hover:text-white">Dashboard</a>
                        <i class="fa-solid fa-chevron-right text-[8px]"></i>
                        <a href="#" class="transition hover:text-white">Kelola Produk</a>
                        <i class="fa-solid fa-chevron-right text-[8px]"></i>
                        <span class="font-semibold text-white">Tambah Produk</span>
                    </nav>
                    <h1 class="mt-3 font-['Commissioner'] text-3xl font-bold tracking-tight text-white sm:text-4xl">Tambah
                        Produk</h1>
                    <p class="mt-1 text-sm text-violet-100">Lengkapi informasi produk yang akan dijual di tokomu.</p>
                </div>

                <a href="/store"
                    class="inline-flex h-10 items-center gap-2 rounded-xl border border-white/25 bg-white/15 px-4 text-sm font-semibold text-white backdrop-blur transition hover:bg-none hover:bg-white/25">
                    <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
                </a>
            </div>
        </header>

        <form id="product-form" method="POST" action="#" enctype="multipart/form-data"
            class="grid grid-cols-1 items-start gap-6 xl:grid-cols-3">
            @csrf

            <!-- ================= KOLOM KIRI ================= -->
            <div class="space-y-6 xl:col-span-2">

                <!-- Informasi dasar: name, slug, sku, brand, category_id, description -->
                <section class="rounded-2xl border border-white/70 bg-white/85 p-6 shadow-lg shadow-violet-200/40 backdrop-blur-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-linear-to-br from-purple-500 to-indigo-600 text-white shadow-md shadow-violet-300/60"><i class="fa-solid fa-circle-info"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] text-base font-bold text-gray-900">Informasi Dasar</h2>
                            <p class="text-xs text-gray-500">Nama, kode, dan kategori produk.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- name -->
                        <div class="md:col-span-2">
                            <label for="name" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Produk <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required maxlength="255"
                                placeholder="Contoh: Hoodie Oversize Sage Green" class="h-11 w-full rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-violet-300 hover:bg-none hover:bg-white focus:border-violet-500 focus:bg-none focus:bg-white focus:ring-4 focus:ring-violet-100">
                        </div>
                        <!-- sku -->
                        <div>
                            <label for="sku" class="mb-1.5 block text-sm font-semibold text-gray-700">SKU <span class="text-red-500">*</span></label>
                            <input type="text" id="sku" name="sku" required maxlength="50"
                                placeholder="HDI-OVR-001" class="h-11 w-full rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 px-3.5 text-sm uppercase text-gray-800 outline-none transition placeholder:normal-case placeholder:text-gray-400 hover:border-violet-300 hover:bg-none hover:bg-white focus:border-violet-500 focus:bg-none focus:bg-white focus:ring-4 focus:ring-violet-100">
                            <p class="mt-1 text-xs text-gray-500">Kode unik produk, maksimal 50 karakter.</p>
                        </div>

                        <!-- brand: otomatis dari nama toko -->
                        <div>
                            <label for="brand" class="mb-1.5 block text-sm font-semibold text-gray-700">Brand <span
                                    class="font-normal text-gray-500">(otomatis)</span></label>
                            <div class="relative">
                                <i
                                    class="fa-solid fa-store pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-xs text-violet-500"></i>
                                <input type="text" id="brand" name="brand" value="{{ $store->name ?? (auth()->user()?->store?->name ?? '') }}" readonly
                                    maxlength="100" placeholder="Nama toko belum diisi"
                                    class="h-11 w-full cursor-not-allowed rounded-xl border border-violet-200/70 bg-linear-to-r from-violet-100 to-purple-100 pl-9 pr-3.5 text-sm font-medium text-violet-900/70 outline-none placeholder:text-gray-400">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Mengikuti nama tokomu dan tidak bisa diubah.</p>
                        </div>

                        <!-- category_id -->
                        <div>
                            <label for="category_id" class="mb-1.5 block text-sm font-semibold text-gray-700">Kategori <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="category_id" name="category_id" required
                                    class="h-11 w-full cursor-pointer appearance-none rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 pl-3.5 pr-10 text-sm text-gray-800 outline-none transition hover:border-violet-300 hover:bg-none hover:bg-white focus:border-violet-500 focus:bg-none focus:bg-white focus:ring-4 focus:ring-violet-100">
                                    <option value="" disabled>Pilih kategori</option>
                                    @foreach ($categories ?? [] as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                                <i
                                    class="fa-solid fa-chevron-down pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 text-[10px] text-violet-500"></i>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="md:col-span-2">
                            <div class="mb-1.5 flex items-center justify-between">
                                <label for="description" class="block text-sm font-semibold text-gray-700">Deskripsi
                                    <span class="font-normal text-gray-500">(opsional)</span></label>
                                <span id="description-count" class="text-xs text-gray-500">0 / 1000</span>
                            </div>
                            <textarea id="description" name="description" rows="4" maxlength="1000"
                                placeholder="Ceritakan keunggulan produk, bahan, dan hal yang perlu diketahui pembeli..."
                                class="min-h-28 w-full resize-y rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 px-3.5 py-3 text-sm leading-relaxed text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-violet-300 hover:bg-none hover:bg-white focus:border-violet-500 focus:bg-none focus:bg-white focus:ring-4 focus:ring-violet-100"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Detail pakaian: gender, material -->
                <section class="rounded-2xl border border-white/70 bg-white/85 p-6 shadow-lg shadow-violet-200/40 backdrop-blur-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-linear-to-br from-purple-500 to-indigo-600 text-white shadow-md shadow-violet-300/60"><i class="fa-solid fa-shirt"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] text-base font-bold text-gray-900">Detail Pakaian</h2>
                            <p class="text-xs text-gray-500">Untuk siapa dan terbuat dari apa.</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- gender -->
                        <div>
                            <span class="mb-1.5 block text-sm font-semibold text-gray-700">Gender</span>
                            <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
                                @foreach ([['pria', 'fa-mars', 'Pria'], ['wanita', 'fa-venus', 'Wanita'], ['unisex', 'fa-venus-mars', 'Unisex'], ['anak', 'fa-child', 'Anak']] as [$val, $icon, $label])
                                    <label class="cursor-pointer">
                                        <input type="radio" name="gender" value="{{ $val }}"
                                            class="peer sr-only" {{ $val === 'unisex' ? 'checked' : '' }}>
                                        <span
                                            class="flex h-11 items-center justify-center gap-2 rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 text-sm font-semibold text-violet-800/80 transition hover:border-violet-300 peer-checked:border-transparent peer-checked:from-purple-600 peer-checked:to-indigo-700 peer-checked:text-white peer-checked:shadow-md peer-checked:shadow-violet-300/60 peer-focus-visible:ring-4 peer-focus-visible:ring-violet-200">
                                            <i class="fa-solid {{ $icon }}"></i> {{ $label }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- material -->
                        <div>
                            <label for="material" class="mb-1.5 block text-sm font-semibold text-gray-700">Bahan <span
                                    class="font-normal text-gray-500">(opsional)</span></label>
                            <input type="text" id="material" name="material" maxlength="100"
                                placeholder="Contoh: Katun fleece 280 gsm" class="h-11 w-full rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-violet-300 hover:bg-none hover:bg-white focus:border-violet-500 focus:bg-none focus:bg-white focus:ring-4 focus:ring-violet-100">
                        </div>
                    </div>
                </section>

                <!-- Varian produk: product_variants -->
                <section class="rounded-2xl border border-white/70 bg-white/85 p-6 shadow-lg shadow-violet-200/40 backdrop-blur-sm">
                    <div class="mb-6 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span class="flex size-10 items-center justify-center rounded-xl bg-linear-to-br from-purple-500 to-indigo-600 text-white shadow-md shadow-violet-300/60"><i class="fa-solid fa-swatchbook"></i></span>
                            <div>
                                <h2 class="font-['Commissioner'] text-base font-bold text-gray-900">Varian Produk</h2>
                                <p class="text-xs text-gray-500">Tambah warna, lalu centang ukuran yang tersedia. Tiap ukuran punya SKU dan stok sendiri.</p>
                            </div>
                        </div>
                        <span id="variant-badge"
                            class="shrink-0 rounded-full bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700">0 varian</span>
                    </div>


                    <div id="variant-list" class="space-y-4"></div>

                    <button type="button" id="add-variant"
                        class="mt-4 flex h-12 w-full items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-violet-300 bg-white/50 text-sm font-semibold text-violet-600 transition hover:border-violet-500 hover:bg-violet-50 hover:text-violet-800">
                        <i class="fa-solid fa-plus text-xs"></i> Tambah Warna
                    </button>
                </section>
            </div>

            <!-- ================= KOLOM KANAN ================= -->
            <div class="space-y-6 xl:sticky xl:top-6">

                <!-- Foto utama: thumbnail -->
                <section class="rounded-2xl border border-white/70 bg-white/85 p-6 shadow-lg shadow-violet-200/40 backdrop-blur-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-linear-to-br from-purple-500 to-indigo-600 text-white shadow-md shadow-violet-300/60"><i class="fa-solid fa-image"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] text-base font-bold text-gray-900">Foto Utama</h2>
                            <p class="text-xs text-gray-500">Tampil di kartu produk.</p>
                        </div>
                    </div>

                    <label id="thumb-drop"
                        class="group relative flex aspect-4/5 w-full cursor-pointer flex-col items-center justify-center gap-2 overflow-hidden rounded-2xl border-2 border-dashed border-violet-300 bg-linear-to-br from-violet-50 via-purple-50 to-indigo-100/70 text-center transition hover:border-violet-500">
                        <input type="file" id="thumb-input" name="thumbnail" accept="image/*" class="sr-only">
                        <img id="thumb-preview" alt="Pratinjau foto utama"
                            class="absolute inset-0 hidden size-full object-cover">
                        <span id="thumb-empty" class="flex flex-col items-center gap-2">
                            <span
                                class="flex size-14 items-center justify-center rounded-2xl bg-white text-2xl text-violet-500 shadow-sm transition group-hover:scale-110">
                                <i class="fa-regular fa-image"></i>
                            </span>
                            <span class="text-sm font-semibold text-gray-700">Unggah foto utama</span>
                            <span class="px-6 text-xs text-gray-500">Klik untuk memilih. Rasio 4:5 paling pas dengan
                                kartu produk.</span>
                        </span>
                        <button type="button" id="thumb-remove" title="Hapus foto"
                            class="absolute right-3 top-3 z-10 hidden size-8 items-center justify-center rounded-lg bg-white/90 text-red-500 shadow transition hover:bg-none hover:bg-white">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </label>
                </section>

                <!-- Harga & pengiriman: price, discount_price, weight -->
                <section class="rounded-2xl border border-white/70 bg-white/85 p-6 shadow-lg shadow-violet-200/40 backdrop-blur-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-linear-to-br from-purple-500 to-indigo-600 text-white shadow-md shadow-violet-300/60"><i class="fa-solid fa-tags"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] text-base font-bold text-gray-900">Harga &amp; Pengiriman</h2>
                            <p class="text-xs text-gray-500">Harga jual dan berat paket.</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- price -->
                        <div>
                            <label for="price" class="mb-1.5 block text-sm font-semibold text-gray-700">Harga <span
                                    class="text-red-500">*</span></label>
                            <div class="flex h-11 items-stretch overflow-hidden rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 transition focus-within:border-violet-500 focus-within:bg-none focus-within:bg-white focus-within:ring-4 focus-within:ring-violet-100">
                                <span class="flex items-center border-r border-violet-200/70 bg-linear-to-b from-violet-100 to-purple-100 px-3 text-sm font-semibold text-violet-700">Rp</span>
                                <input type="number" id="price" name="price" required min="0"
                                    max="4294967295" step="1" placeholder="250000" class="min-w-0 flex-1 bg-transparent px-3 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                            </div>
                        </div>

                        <!-- discount_price -->
                        <div>
                            <label for="discount_price" class="mb-1.5 block text-sm font-semibold text-gray-700">Harga Diskon <span
                                    class="font-normal text-gray-500">(opsional)</span></label>
                            <div class="flex h-11 items-stretch overflow-hidden rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 transition focus-within:border-violet-500 focus-within:bg-none focus-within:bg-white focus-within:ring-4 focus-within:ring-violet-100">
                                <span class="flex items-center border-r border-violet-200/70 bg-linear-to-b from-violet-100 to-purple-100 px-3 text-sm font-semibold text-violet-700">Rp</span>
                                <input type="number" id="discount_price" name="discount_price" min="0"
                                    max="4294967295" step="1" placeholder="199000" class="min-w-0 flex-1 bg-transparent px-3 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                            </div>
                            <p id="discount-hint" class="mt-1 text-xs text-gray-500">Harus lebih rendah dari harga
                                normal.</p>
                        </div>

                        <!-- weight -->
                        <div>
                            <label for="weight" class="mb-1.5 block text-sm font-semibold text-gray-700">Berat</label>
                            <div class="flex h-11 items-stretch overflow-hidden rounded-xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/60 transition focus-within:border-violet-500 focus-within:bg-none focus-within:bg-white focus-within:ring-4 focus-within:ring-violet-100">
                                <input type="number" id="weight" name="weight" min="0" max="65535"
                                    step="1" value="0" onfocus="this.select()" class="min-w-0 flex-1 bg-transparent px-3 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                                <span class="flex items-center border-l border-violet-200/70 bg-linear-to-b from-violet-100 to-purple-100 px-3 text-sm font-semibold text-violet-700">gram</span>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Dipakai untuk menghitung ongkos kirim. Maksimal 65.535
                                gram.</p>
                        </div>
                    </div>
                </section>

                <!-- Status: is_active, is_featured -->
                <section class="rounded-2xl border border-white/70 bg-white/85 p-6 shadow-lg shadow-violet-200/40 backdrop-blur-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-linear-to-br from-purple-500 to-indigo-600 text-white shadow-md shadow-violet-300/60"><i class="fa-solid fa-toggle-on"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] text-base font-bold text-gray-900">Status</h2>
                            <p class="text-xs text-gray-500">Atur tampilan produk di toko.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- is_active -->
                        <label class="flex cursor-pointer items-center justify-between gap-4">
                            <span>
                                <span class="block text-sm font-semibold text-gray-800">Aktif</span>
                                <span class="block text-xs text-gray-500">Produk tampil dan bisa dibeli</span>
                            </span>
                            <span class="relative shrink-0">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" checked class="peer sr-only">
                                <span
                                    class="block h-6 w-11 rounded-full bg-violet-200 transition peer-checked:bg-linear-to-r peer-checked:from-purple-600 peer-checked:to-indigo-700 peer-focus-visible:ring-4 peer-focus-visible:ring-violet-200"></span>
                                <span
                                    class="absolute left-0.5 top-0.5 size-5 rounded-full bg-white shadow transition peer-checked:translate-x-5"></span>
                            </span>
                        </label>

                        <div class="border-t border-violet-100"></div>

                        <!-- is_featured -->
                        <label class="flex cursor-pointer items-center justify-between gap-4">
                            <span>
                                <span class="block text-sm font-semibold text-gray-800">Produk Unggulan</span>
                                <span class="block text-xs text-gray-500">Ditonjolkan di halaman depan</span>
                            </span>
                            <span class="relative shrink-0">
                                <input type="hidden" name="is_featured" value="0">
                                <input type="checkbox" name="is_featured" value="1" class="peer sr-only">
                                <span
                                    class="block h-6 w-11 rounded-full bg-violet-200 transition peer-checked:bg-linear-to-r peer-checked:from-purple-600 peer-checked:to-indigo-700 peer-focus-visible:ring-4 peer-focus-visible:ring-violet-200"></span>
                                <span
                                    class="absolute left-0.5 top-0.5 size-5 rounded-full bg-white shadow transition peer-checked:translate-x-5"></span>
                            </span>
                        </label>
                    </div>
                </section>

                <!-- Ringkasan -->
                <section class="rounded-2xl border border-violet-200 bg-linear-to-br from-violet-100 to-purple-200/70 p-6 shadow-lg shadow-violet-200/40">
                    <h2 class="mb-4 font-['Commissioner'] text-base font-bold text-gray-900">Ringkasan</h2>
                    <dl class="space-y-3 text-sm">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-violet-900/70">Harga jual</dt>
                            <dd id="sum-price" class="text-right font-semibold text-gray-800">-</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-violet-900/70">Diskon</dt>
                            <dd id="sum-discount" class="text-right font-semibold text-gray-800">-</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-violet-900/70">Jumlah varian</dt>
                            <dd id="sum-variants" class="text-right font-semibold text-gray-800">0</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-violet-900/70">Total stok</dt>
                            <dd id="sum-stock" class="text-right font-semibold text-gray-800">0</dd>
                        </div>
                    </dl>
                </section>
            </div>

            <!-- ================= BAR AKSI ================= -->
            <div
                class="sticky bottom-4 z-10 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-white/70 bg-white/80 p-3 shadow-xl shadow-violet-300/40 backdrop-blur xl:col-span-3">
                <p class="hidden text-sm text-gray-500 sm:block">
                    Kolom bertanda <span class="font-bold text-red-500">*</span> wajib diisi.
                </p>

                <div class="ml-auto flex items-center gap-2">
                    <a href="{{ url('/store') }}"
                        class="inline-flex h-11 items-center rounded-xl border border-violet-200/70 bg-white px-5 text-sm font-semibold text-gray-600 transition hover:bg-violet-50">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex h-11 items-center gap-2 rounded-xl bg-linear-to-r from-purple-600 to-indigo-800 px-6 text-sm font-semibold text-white shadow-md shadow-violet-200 transition hover:from-purple-700 hover:to-indigo-900 hover:shadow-lg active:scale-95">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Produk
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Template satu warna (product_variants: color, color_hex) beserta checklist ukurannya -->
    <template id="variant-template">
        <div class="variant-item rounded-2xl border border-violet-200/70 bg-linear-to-br from-violet-50 to-purple-100/50 p-4">
            <div class="mb-3 flex items-center justify-between">
                <span class="inline-flex items-center gap-2 text-sm font-bold text-gray-700">
                    <span
                        class="variant-number flex size-6 items-center justify-center rounded-lg bg-violet-100 text-xs text-violet-700">1</span>
                    <span class="variant-title">Warna 1</span>
                </span>
                <button type="button" title="Hapus warna"
                    class="remove-variant flex size-8 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-transparent">
                    <i class="fa-regular fa-trash-can"></i>
                </button>
            </div>

            <div class="grid grid-cols-2 gap-3 md:grid-cols-6">
                <!-- color -->
                <div class="col-span-2 md:col-span-4">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">Warna <span class="text-red-500">*</span></label>
                    <input type="text" required maxlength="30" placeholder="Hijau Sage"
                        class="group-color h-11 w-full rounded-xl border border-violet-200/70 bg-white px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-violet-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                </div>
                <!-- color_hex -->
                <div class="col-span-2 md:col-span-2">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">Kode Warna</label>
                    <input type="color" value="#9caf88"
                        class="group-hex h-11 w-full cursor-pointer rounded-xl border border-violet-200/70 bg-white p-1 transition hover:border-violet-300">
                </div>
            </div>
            <p class="group-error mt-2 hidden text-xs font-medium text-red-500"></p>

            <!-- size: checklist. Satu ukuran tercentang = satu baris product_variants -->
            <div class="mt-4">
                <span class="mb-2 block text-xs font-semibold text-gray-600">Ukuran <span class="text-red-500">*</span>
                    <span class="font-normal text-gray-500">(centang yang tersedia)</span></span>
                <div class="size-chips flex flex-wrap gap-2"></div>
                <div class="mt-3 flex items-center gap-2">
                    <input type="text" maxlength="10" placeholder="Ukuran lain, mis. 30"
                        class="custom-size h-9 w-44 rounded-xl border border-violet-200/70 bg-white px-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-violet-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                    <button type="button"
                        class="add-size inline-flex h-9 items-center gap-1.5 rounded-xl border border-violet-200/70 bg-white px-3 text-xs font-semibold text-gray-600 transition hover:border-violet-400 hover:text-violet-700">
                        <i class="fa-solid fa-plus text-[10px]"></i> Tambah
                    </button>
                </div>
            </div>

            <!-- Baris SKU dan stok untuk tiap ukuran yang dicentang -->
            <div class="size-rows mt-4 space-y-3"></div>
        </div>
    </template>

    <!-- Template satu baris ukuran (sku, size, stock, price) -->
    <template id="size-row-template">
        <div class="size-row grid grid-cols-2 gap-3 rounded-xl border border-violet-200/70 bg-white p-3 md:grid-cols-12 md:items-end">
            <input type="hidden" name="variants[__i__][size]" class="row-size">
            <input type="hidden" name="variants[__i__][color]" class="row-color">
            <input type="hidden" name="variants[__i__][color_hex]" class="row-hex">

            <div class="col-span-2 md:col-span-2">
                <span class="mb-1 block text-xs font-semibold text-gray-600">Ukuran</span>
                <span
                    class="row-badge flex h-9 items-center justify-center rounded-xl bg-violet-100 px-3 text-sm font-bold text-violet-700 md:h-11"></span>
            </div>
            <div class="col-span-2 md:col-span-4">
                <label class="mb-1 block text-xs font-semibold text-gray-600">SKU Varian <span class="text-red-500">*</span></label>
                <input type="text" name="variants[__i__][sku]" required maxlength="60"
                    placeholder="HDI-OVR-001-M-HJ" class="row-sku h-11 w-full rounded-xl border border-violet-200/70 bg-white px-3.5 text-sm uppercase text-gray-800 outline-none transition placeholder:normal-case placeholder:text-gray-400 hover:border-violet-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
            </div>
            <div class="col-span-1 md:col-span-2">
                <label class="mb-1 block text-xs font-semibold text-gray-600">Stok <span class="text-red-500">*</span></label>
                <input type="number" name="variants[__i__][stock]" required min="0" max="4294967295"
                    step="1" placeholder="10" class="row-stock h-11 w-full rounded-xl border border-violet-200/70 bg-white px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-violet-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
            </div>
            <div class="col-span-1 md:col-span-4">
                <label class="mb-1 block text-xs font-semibold text-gray-600">Harga Varian <span
                        class="font-normal text-gray-500">(opsional)</span></label>
                <div
                    class="flex h-11 items-stretch overflow-hidden rounded-xl border border-violet-200/70 bg-white transition focus-within:border-violet-500 focus-within:ring-4 focus-within:ring-violet-100">
                    <span
                        class="flex items-center border-r border-violet-200/70 bg-linear-to-b from-violet-100 to-purple-100 px-2.5 text-xs font-semibold text-violet-700">Rp</span>
                    <input type="number" name="variants[__i__][price]" min="0" max="4294967295"
                        step="1" placeholder="Sama"
                        class="min-w-0 flex-1 bg-transparent px-2.5 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                </div>
            </div>

            <p class="row-error col-span-2 hidden text-xs font-medium text-red-500 md:col-span-12"></p>
        </div>
    </template>

    <script>
        (() => {
            const $ = (s, r = document) => r.querySelector(s);
            const num = (n) => new Intl.NumberFormat('id-ID').format(n);
            const rupiah = (n) => 'Rp ' + num(n);
            const upper = (el) => {
                const s = el.selectionStart, e = el.selectionEnd;
                el.value = el.value.toUpperCase();
                el.setSelectionRange(s, e);
            };

            /* ---------- Slug otomatis dari nama ---------- */
            const nameEl = $('#name'), slugEl = $('#slug');
            let slugEdited = false;
            const slugify = (t) => t.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            slugEl.addEventListener('input', () => { slugEdited = slugEl.value !== ''; });
            nameEl.addEventListener('input', () => { if (!slugEdited) slugEl.value = slugify(nameEl.value); });
            slugEl.addEventListener('blur', () => { slugEl.value = slugify(slugEl.value); });

            /* ---------- SKU produk selalu huruf besar ---------- */
            $('#sku').addEventListener('input', (e) => upper(e.target));

            /* ---------- Penghitung deskripsi ---------- */
            const desc = $('#description'), descCount = $('#description-count');
            desc.addEventListener('input', () => { descCount.textContent = desc.value.length + ' / 1000'; });

            /* ---------- Varian: per warna, ukuran dipilih lewat checklist ---------- */
            const SIZES = ['S', 'M', 'L', 'XL', 'XXL', 'All Size'];
            const list = $('#variant-list'), tpl = $('#variant-template'), rowTpl = $('#size-row-template');
            let counter = 0;

            // Satu chip ukuran (checkbox)
            const addChip = (box, size) => {
                const wrap = document.createElement('label');
                wrap.className = 'relative cursor-pointer';
                wrap.innerHTML =
                    '<input type="checkbox" class="size-check peer sr-only">' +
                    '<span class="chip-text flex h-10 min-w-14 items-center justify-center rounded-xl border border-violet-200 bg-white px-3 text-sm font-semibold text-violet-800/80 transition hover:border-violet-400 peer-checked:border-transparent peer-checked:bg-linear-to-r peer-checked:from-purple-600 peer-checked:to-indigo-700 peer-checked:text-white peer-checked:shadow-md peer-checked:shadow-violet-300/60 peer-focus-visible:ring-4 peer-focus-visible:ring-violet-200"></span>' +
                    '<i class="fa-solid fa-check absolute -right-1 -top-1 hidden size-4 items-center justify-center rounded-full bg-white text-[8px] text-violet-600 shadow ring-1 ring-violet-200 peer-checked:flex"></i>';
                const input = $('input', wrap);
                input.value = size;
                $('.chip-text', wrap).textContent = size;
                box.appendChild(wrap);
                return input;
            };

            // Satu baris SKU/stok untuk satu ukuran
            const makeRow = (size) => {
                const row = rowTpl.content.firstElementChild.cloneNode(true);
                row.querySelectorAll('[name*="__i__"]').forEach((el) => { el.name = el.name.replace('__i__', counter); });
                counter++;
                row.dataset.size = size;
                $('.row-size', row).value = size;
                $('.row-badge', row).textContent = size;
                return row;
            };

            // Nama dan kode warna disalin ke tiap baris (kolom color dan color_hex)
            const syncColor = (g) => {
                const color = $('.group-color', g).value.trim(), hex = $('.group-hex', g).value;
                g.querySelectorAll('.size-row').forEach((r) => {
                    $('.row-color', r).value = color;
                    $('.row-hex', r).value = hex;
                });
            };

            // Samakan baris dengan ukuran yang tercentang
            const syncRows = (g) => {
                const box = $('.size-rows', g);
                const have = new Map([...box.children].map((r) => [r.dataset.size, r]));
                const picked = [...g.querySelectorAll('.size-check:checked')].map((c) => c.value);
                have.forEach((r, size) => { if (!picked.includes(size)) r.remove(); });
                picked.forEach((size) => box.append(have.get(size) || makeRow(size)));
                syncColor(g);
                refresh();
            };

            // "All Size" tidak boleh digabung dengan ukuran lain
            const pick = (g, input) => {
                if (input.checked) {
                    g.querySelectorAll('.size-check').forEach((c) => {
                        if (c !== input && (input.value === 'All Size' || c.value === 'All Size')) c.checked = false;
                    });
                }
                syncRows(g);
            };

            // Ukuran di luar daftar, mis. 28, 30, 3XL
            const addCustom = (g) => {
                const field = $('.custom-size', g), size = field.value.trim();
                if (!size) return;
                const found = [...g.querySelectorAll('.size-check')].find((c) => c.value.toLowerCase() === size.toLowerCase());
                const chip = found || addChip($('.size-chips', g), size);
                chip.checked = true;
                field.value = '';
                pick(g, chip);
            };

            // Ringkasan + validasi. Tabel punya unique(product_id, size, color) dan sku unik.
            const refresh = () => {
                const groups = list.querySelectorAll('.variant-item');
                const seenColor = new Set(), seenSku = new Set();
                let rows = 0, total = 0;

                groups.forEach((g, i) => {
                    $('.variant-number', g).textContent = i + 1;
                    $('.variant-title', g).textContent = 'Warna ' + (i + 1);
                    $('.remove-variant', g).disabled = groups.length === 1;

                    // Satu warna hanya boleh muncul sekali
                    const colorEl = $('.group-color', g), key = colorEl.value.trim().toLowerCase();
                    let msg = '';
                    if (key) {
                        if (seenColor.has(key)) msg = 'Warna ini sudah dipakai di grup lain. Gabungkan ukurannya dalam satu warna.';
                        seenColor.add(key);
                    }
                    colorEl.setCustomValidity(msg);
                    const gErr = $('.group-error', g);
                    gErr.textContent = msg;
                    gErr.classList.toggle('hidden', !msg);

                    // Minimal satu ukuran dicentang
                    const picked = g.querySelectorAll('.size-check:checked').length;
                    $('.size-check', g).setCustomValidity(picked ? '' : 'Centang minimal satu ukuran.');

                    g.querySelectorAll('.size-row').forEach((r) => {
                        rows++;
                        total += parseInt($('.row-stock', r).value) || 0;
                        const sku = $('.row-sku', r), k = sku.value.trim().toUpperCase();
                        let skuMsg = '';
                        if (k) {
                            if (seenSku.has(k)) skuMsg = 'SKU ini sudah dipakai varian lain.';
                            seenSku.add(k);
                        }
                        sku.setCustomValidity(skuMsg);
                        const rErr = $('.row-error', r);
                        rErr.textContent = skuMsg;
                        rErr.classList.toggle('hidden', !skuMsg);
                    });
                });

                $('#variant-badge').textContent = rows + ' varian';
                $('#sum-variants').textContent = rows;
                $('#sum-stock').textContent = num(total);
            };

            const addGroup = () => {
                const g = tpl.content.firstElementChild.cloneNode(true);
                SIZES.forEach((size) => addChip($('.size-chips', g), size));
                list.append(g);
                refresh();
                return g;
            };

            $('#add-variant').addEventListener('click', () => { $('.group-color', addGroup()).focus(); });
            list.addEventListener('click', (e) => {
                const rm = e.target.closest('.remove-variant');
                if (rm) {
                    if (!rm.disabled) { rm.closest('.variant-item').remove(); refresh(); }
                    return;
                }
                const add = e.target.closest('.add-size');
                if (add) addCustom(add.closest('.variant-item'));
            });
            list.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' && e.target.classList.contains('custom-size')) {
                    e.preventDefault();
                    addCustom(e.target.closest('.variant-item'));
                }
            });
            list.addEventListener('change', (e) => {
                if (e.target.classList.contains('size-check')) pick(e.target.closest('.variant-item'), e.target);
            });
            list.addEventListener('input', (e) => {
                const c = e.target.classList;
                if (c.contains('row-sku')) upper(e.target);
                if (c.contains('group-color') || c.contains('group-hex')) syncColor(e.target.closest('.variant-item'));
                refresh();
            });
            addGroup();

            /* ---------- Harga, diskon, ringkasan ---------- */
            const priceEl = $('#price'), discEl = $('#discount_price'), hint = $('#discount-hint');
            const updatePrice = () => {
                const price = parseFloat(priceEl.value), disc = parseFloat(discEl.value);
                $('#sum-price').textContent = price >= 0 ? rupiah(price) : '-';

                let msg = '', ok = true;
                if (!isNaN(disc) && !isNaN(price) && disc >= price) {
                    ok = false; msg = 'Harga diskon harus lebih rendah dari harga normal.';
                }
                discEl.setCustomValidity(msg);
                hint.textContent = ok ? 'Harus lebih rendah dari harga normal.' : msg;
                hint.classList.toggle('text-red-500', !ok);
                hint.classList.toggle('text-gray-500', ok);

                if (ok && disc >= 0 && price > 0) {
                    const pct = Math.round((1 - disc / price) * 100);
                    $('#sum-discount').textContent = rupiah(disc) + ' (-' + pct + '%)';
                } else {
                    $('#sum-discount').textContent = '-';
                }
            };
            priceEl.addEventListener('input', updatePrice);
            discEl.addEventListener('input', updatePrice);

            /* ---------- Foto utama ---------- */
            const tIn = $('#thumb-input'), tImg = $('#thumb-preview'), tEmpty = $('#thumb-empty'), tRm = $('#thumb-remove');
            const showThumb = (file) => {
                if (!file) {
                    tImg.classList.add('hidden'); tEmpty.classList.remove('hidden');
                    tRm.classList.add('hidden'); tRm.classList.remove('flex');
                    return;
                }
                tImg.src = URL.createObjectURL(file);
                tImg.classList.remove('hidden'); tEmpty.classList.add('hidden');
                tRm.classList.remove('hidden'); tRm.classList.add('flex');
            };
            tIn.addEventListener('change', () => showThumb(tIn.files[0]));
            tRm.addEventListener('click', (e) => {
                e.preventDefault(); e.stopPropagation();
                tIn.value = ''; showThumb(null);
            });
        })();
    </script>
</body>

</html>
