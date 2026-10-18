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
        href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Domine:wght@400..700&family=Figtree:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-['DM_Sans'] text-gray-800 antialiased">

    {{-- Lebar halaman 80% (di layar kecil dilebarkan agar tetap nyaman) --}}
    <div class="mx-auto w-[94%] py-8 lg:w-4/5">

        <!-- Header halaman -->
        <header class="mb-6 flex flex-wrap items-end justify-between gap-4">
            <div>
                <nav class="flex items-center gap-2 text-xs text-gray-400">
                    <a href="#" class="transition hover:text-violet-600">Dashboard</a>
                    <i class="fa-solid fa-chevron-right text-[8px]"></i>
                    <a href="#" class="transition hover:text-violet-600">Kelola Produk</a>
                    <i class="fa-solid fa-chevron-right text-[8px]"></i>
                    <span class="font-medium text-gray-600">Tambah Produk</span>
                </nav>
                <h1 class="mt-2 font-['Commissioner'] text-3xl font-bold tracking-tight text-gray-900">Tambah Produk</h1>
                <p class="mt-1 text-sm text-gray-500">Lengkapi informasi produk yang akan dijual di tokomu.</p>
            </div>

            <a href="#"
                class="inline-flex h-10 items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 text-sm font-semibold text-gray-600 shadow-sm transition hover:bg-gray-50">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
            </a>
        </header>

        <form id="product-form" method="POST" action="#" enctype="multipart/form-data"
            class="grid grid-cols-1 items-start gap-6 xl:grid-cols-3">
            @csrf

            <!-- ================= KOLOM KIRI ================= -->
            <div class="space-y-6 xl:col-span-2">

                <!-- Informasi dasar -->
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span
                            class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600"><i
                                class="fa-solid fa-circle-info"></i></span>
                        <div>
                            <h2 class="font-bold text-gray-900">Informasi Dasar</h2>
                            <p class="text-xs text-gray-400">Nama, kode, dan kategori produk.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- name -->
                        <div class="md:col-span-2">
                            <label for="name" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Produk
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required maxlength="150"
                                placeholder="Contoh: Hoodie Oversize Sage Green"
                                class="h-11 w-full rounded-xl border border-gray-200 bg-gray-50 px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 hover:bg-white focus:border-violet-500 focus:bg-white focus:ring-4 focus:ring-violet-100">
                        </div>

                        <!-- slug -->
                        <div>
                            <label for="slug" class="mb-1.5 block text-sm font-semibold text-gray-700">Slug (URL)
                                <span class="text-red-500">*</span></label>
                            <div
                                class="flex h-11 items-stretch overflow-hidden rounded-xl border border-gray-200 bg-gray-50 transition focus-within:border-violet-500 focus-within:bg-white focus-within:ring-4 focus-within:ring-violet-100">
                                <span
                                    class="flex items-center border-r border-gray-200 bg-gray-100 px-3 text-sm text-gray-500">/products/</span>
                                <input type="text" id="slug" name="slug" required
                                    placeholder="hoodie-oversize-sage-green"
                                    class="min-w-0 flex-1 bg-transparent px-3 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                            </div>
                            <p class="mt-1 text-xs text-gray-400">Terisi otomatis dari nama produk. Harus unik, tanpa
                                spasi.</p>
                        </div>

                        <!-- sku -->
                        <div>
                            <label for="sku" class="mb-1.5 block text-sm font-semibold text-gray-700">SKU <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="sku" name="sku" required maxlength="50"
                                placeholder="HDI-OVR-001"
                                class="h-11 w-full rounded-xl border border-gray-200 bg-gray-50 px-3.5 text-sm uppercase text-gray-800 outline-none transition placeholder:normal-case placeholder:text-gray-400 hover:border-gray-300 hover:bg-white focus:border-violet-500 focus:bg-white focus:ring-4 focus:ring-violet-100">
                            <p class="mt-1 text-xs text-gray-400">Kode unik produk, maksimal 50 karakter.</p>
                        </div>

                        <!-- brand -->
                        <div>
                            <label for="brand" class="mb-1.5 block text-sm font-semibold text-gray-700">Brand <span
                                    class="font-normal text-gray-400">(opsional)</span></label>
                            <input type="text" id="brand" name="brand" maxlength="100"
                                placeholder="Contoh: Urban Wear"
                                class="h-11 w-full rounded-xl border border-gray-200 bg-gray-50 px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 hover:bg-white focus:border-violet-500 focus:bg-white focus:ring-4 focus:ring-violet-100">
                        </div>

                        <!-- category_id -->
                        <div>
                            <label for="category_id"
                                class="mb-1.5 block text-sm font-semibold text-gray-700">Kategori <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <select id="category_id" name="category_id" required
                                    class="h-11 w-full cursor-pointer appearance-none rounded-xl border border-gray-200 bg-gray-50 pl-3.5 pr-10 text-sm text-gray-800 outline-none transition hover:border-gray-300 hover:bg-white focus:border-violet-500 focus:bg-white focus:ring-4 focus:ring-violet-100">
                                    <option value="">Pilih kategori</option>
                                    <option value="1">Atasan</option>
                                    <option value="2">Bawahan</option>
                                    <option value="3">Luaran</option>
                                    <option value="4">Aksesori</option>
                                </select>
                                <i
                                    class="fa-solid fa-chevron-down pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 text-[10px] text-gray-400"></i>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="md:col-span-2">
                            <div class="mb-1.5 flex items-center justify-between">
                                <label for="description" class="block text-sm font-semibold text-gray-700">Deskripsi
                                    <span class="font-normal text-gray-400">(opsional)</span></label>
                                <span id="description-count" class="text-xs text-gray-400">0 / 1000</span>
                            </div>
                            <textarea id="description" name="description" rows="4" maxlength="1000"
                                placeholder="Ceritakan keunggulan produk, bahan, dan hal yang perlu diketahui pembeli..."
                                class="min-h-28 w-full resize-y rounded-xl border border-gray-200 bg-gray-50 px-3.5 py-3 text-sm leading-relaxed text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 hover:bg-white focus:border-violet-500 focus:bg-white focus:ring-4 focus:ring-violet-100"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Detail pakaian -->
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span
                            class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600"><i
                                class="fa-solid fa-shirt"></i></span>
                        <div>
                            <h2 class="font-bold text-gray-900">Detail Pakaian</h2>
                            <p class="text-xs text-gray-400">Untuk siapa, bahan, dan cara perawatan.</p>
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
                                            class="flex h-11 items-center justify-center gap-2 rounded-xl border border-gray-200 bg-gray-50 text-sm font-semibold text-gray-600 transition hover:bg-white peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-700 peer-focus-visible:ring-4 peer-focus-visible:ring-violet-100">
                                            <i class="fa-solid {{ $icon }}"></i> {{ $label }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <!-- material -->
                            <div>
                                <label for="material"
                                    class="mb-1.5 block text-sm font-semibold text-gray-700">Bahan <span
                                        class="font-normal text-gray-400">(opsional)</span></label>
                                <input type="text" id="material" name="material" maxlength="100"
                                    placeholder="Contoh: Katun fleece 280 gsm"
                                    class="h-11 w-full rounded-xl border border-gray-200 bg-gray-50 px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 hover:bg-white focus:border-violet-500 focus:bg-white focus:ring-4 focus:ring-violet-100">
                            </div>

                            <!-- care_instruction -->
                            <div>
                                <label for="care_instruction"
                                    class="mb-1.5 block text-sm font-semibold text-gray-700">Petunjuk Perawatan <span
                                        class="font-normal text-gray-400">(opsional)</span></label>
                                <textarea id="care_instruction" name="care_instruction" rows="3"
                                    placeholder="Contoh: Cuci dengan air dingin, jangan diputihkan, setrika suhu rendah."
                                    class="min-h-24 w-full resize-y rounded-xl border border-gray-200 bg-gray-50 px-3.5 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 hover:bg-white focus:border-violet-500 focus:bg-white focus:ring-4 focus:ring-violet-100"></textarea>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Varian produk -->
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span
                                class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600"><i
                                    class="fa-solid fa-swatchbook"></i></span>
                            <div>
                                <h2 class="font-bold text-gray-900">Varian Produk</h2>
                                <p class="text-xs text-gray-400">Satu varian = satu kombinasi ukuran dan warna, dengan
                                    stok sendiri.</p>
                            </div>
                        </div>
                        <span id="variant-badge"
                            class="shrink-0 rounded-full bg-violet-50 px-3 py-1 text-xs font-semibold text-violet-700">1
                            varian</span>
                    </div>

                    <!-- Pilihan ukuran yang umum -->
                    <datalist id="daftar-ukuran">
                        <option value="S"></option>
                        <option value="M"></option>
                        <option value="L"></option>
                        <option value="XL"></option>
                        <option value="XXL"></option>
                        <option value="All Size"></option>
                    </datalist>

                    <div id="variant-list" class="space-y-4"></div>

                    <!-- Tombol tambah varian -->
                    <button type="button" id="add-variant"
                        class="mt-4 flex h-12 w-full items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-gray-300 text-sm font-semibold text-gray-500 transition hover:border-violet-400 hover:bg-violet-50/50 hover:text-violet-700">
                        <i class="fa-solid fa-plus text-xs"></i> Tambah Varian
                    </button>
                </section>

                <!-- Galeri foto -->
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span
                            class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600"><i
                                class="fa-solid fa-images"></i></span>
                        <div>
                            <h2 class="font-bold text-gray-900">Galeri Foto</h2>
                            <p class="text-xs text-gray-400">Foto tambahan dari berbagai sudut. Urutan foto mengikuti
                                urutan unggah.</p>
                        </div>
                    </div>

                    <label
                        class="group flex h-36 w-full cursor-pointer flex-col items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 text-center transition hover:border-violet-400 hover:bg-violet-50/50">
                        <input type="file" id="gallery-input" name="images[]" accept="image/*" multiple
                            class="sr-only">
                        <span
                            class="flex size-12 items-center justify-center rounded-2xl bg-white text-xl text-violet-500 shadow-sm transition group-hover:scale-110">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                        </span>
                        <span class="text-sm font-semibold text-gray-700">Klik untuk mengunggah foto</span>
                        <span class="text-xs text-gray-400">Bisa pilih lebih dari satu foto sekaligus</span>
                    </label>

                    <!-- Slot urutan foto -->
                    <div id="gallery-grid" class="mt-4 grid grid-cols-4 gap-3 sm:grid-cols-5"></div>
                </section>
            </div>

            <!-- ================= KOLOM KANAN ================= -->
            <div class="space-y-6 xl:sticky xl:top-6">

                <!-- Foto utama -->
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span
                            class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600"><i
                                class="fa-solid fa-image"></i></span>
                        <div>
                            <h2 class="font-bold text-gray-900">Foto Utama</h2>
                            <p class="text-xs text-gray-400">Tampil di kartu produk.</p>
                        </div>
                    </div>

                    <label id="thumb-drop"
                        class="group relative flex aspect-4/5 w-full cursor-pointer flex-col items-center justify-center gap-2 overflow-hidden rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 text-center transition hover:border-violet-400 hover:bg-violet-50/50">
                        <input type="file" id="thumb-input" name="thumbnail" accept="image/*" class="sr-only">
                        <img id="thumb-preview" alt="Pratinjau foto utama"
                            class="absolute inset-0 hidden size-full object-cover">
                        <span id="thumb-empty" class="flex flex-col items-center gap-2">
                            <span
                                class="flex size-14 items-center justify-center rounded-2xl bg-white text-2xl text-violet-500 shadow-sm transition group-hover:scale-110">
                                <i class="fa-regular fa-image"></i>
                            </span>
                            <span class="text-sm font-semibold text-gray-700">Unggah foto utama</span>
                            <span class="px-6 text-xs text-gray-400">Klik untuk memilih. Rasio 4:5 paling pas dengan
                                kartu produk.</span>
                        </span>
                        <button type="button" id="thumb-remove" title="Hapus foto"
                            class="absolute right-3 top-3 z-10 hidden size-8 items-center justify-center rounded-lg bg-white/90 text-red-500 shadow transition hover:bg-white">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </label>
                </section>

                <!-- Harga & pengiriman -->
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span
                            class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600"><i
                                class="fa-solid fa-tags"></i></span>
                        <div>
                            <h2 class="font-bold text-gray-900">Harga &amp; Pengiriman</h2>
                            <p class="text-xs text-gray-400">Harga jual dan berat paket.</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- price -->
                        <div>
                            <label for="price" class="mb-1.5 block text-sm font-semibold text-gray-700">Harga <span
                                    class="text-red-500">*</span></label>
                            <div
                                class="flex h-11 items-stretch overflow-hidden rounded-xl border border-gray-200 bg-gray-50 transition focus-within:border-violet-500 focus-within:bg-white focus-within:ring-4 focus-within:ring-violet-100">
                                <span
                                    class="flex items-center border-r border-gray-200 bg-gray-100 px-3 text-sm font-semibold text-gray-500">Rp</span>
                                <input type="number" id="price" name="price" required min="0"
                                    placeholder="250000"
                                    class="min-w-0 flex-1 bg-transparent px-3 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                            </div>
                        </div>

                        <!-- discount_price -->
                        <div>
                            <label for="discount_price"
                                class="mb-1.5 block text-sm font-semibold text-gray-700">Harga Diskon <span
                                    class="font-normal text-gray-400">(opsional)</span></label>
                            <div
                                class="flex h-11 items-stretch overflow-hidden rounded-xl border border-gray-200 bg-gray-50 transition focus-within:border-violet-500 focus-within:bg-white focus-within:ring-4 focus-within:ring-violet-100">
                                <span
                                    class="flex items-center border-r border-gray-200 bg-gray-100 px-3 text-sm font-semibold text-gray-500">Rp</span>
                                <input type="number" id="discount_price" name="discount_price" min="0"
                                    placeholder="199000"
                                    class="min-w-0 flex-1 bg-transparent px-3 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                            </div>
                            <p id="discount-hint" class="mt-1 text-xs text-gray-400">Harus lebih rendah dari harga
                                normal.</p>
                        </div>

                        <!-- weight -->
                        <div>
                            <label for="weight"
                                class="mb-1.5 block text-sm font-semibold text-gray-700">Berat</label>
                            <div
                                class="flex h-11 items-stretch overflow-hidden rounded-xl border border-gray-200 bg-gray-50 transition focus-within:border-violet-500 focus-within:bg-white focus-within:ring-4 focus-within:ring-violet-100">
                                <input type="number" id="weight" name="weight" min="0" placeholder="500"
                                    class="min-w-0 flex-1 bg-transparent px-3 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                                <span
                                    class="flex items-center border-l border-gray-200 bg-gray-100 px-3 text-sm font-semibold text-gray-500">gram</span>
                            </div>
                            <p class="mt-1 text-xs text-gray-400">Dipakai untuk menghitung ongkos kirim.</p>
                        </div>
                    </div>
                </section>

                <!-- Status -->
                <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
                    <div class="mb-6 flex items-center gap-3">
                        <span
                            class="flex size-10 items-center justify-center rounded-xl bg-violet-100 text-violet-600"><i
                                class="fa-solid fa-toggle-on"></i></span>
                        <div>
                            <h2 class="font-bold text-gray-900">Status</h2>
                            <p class="text-xs text-gray-400">Atur tampilan produk di toko.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- is_active -->
                        <label class="flex cursor-pointer items-center justify-between gap-4">
                            <span>
                                <span class="block text-sm font-semibold text-gray-800">Aktif</span>
                                <span class="block text-xs text-gray-400">Produk tampil dan bisa dibeli</span>
                            </span>
                            <span class="relative shrink-0">
                                <input type="checkbox" name="is_active" value="1" checked class="peer sr-only">
                                <span
                                    class="block h-6 w-11 rounded-full bg-gray-200 transition peer-checked:bg-violet-600 peer-focus-visible:ring-4 peer-focus-visible:ring-violet-100"></span>
                                <span
                                    class="absolute left-0.5 top-0.5 size-5 rounded-full bg-white shadow transition peer-checked:translate-x-5"></span>
                            </span>
                        </label>

                        <div class="border-t border-gray-100"></div>

                        <!-- is_featured -->
                        <label class="flex cursor-pointer items-center justify-between gap-4">
                            <span>
                                <span class="block text-sm font-semibold text-gray-800">Produk Unggulan</span>
                                <span class="block text-xs text-gray-400">Ditonjolkan di halaman depan</span>
                            </span>
                            <span class="relative shrink-0">
                                <input type="checkbox" name="is_featured" value="1" class="peer sr-only">
                                <span
                                    class="block h-6 w-11 rounded-full bg-gray-200 transition peer-checked:bg-violet-600 peer-focus-visible:ring-4 peer-focus-visible:ring-violet-100"></span>
                                <span
                                    class="absolute left-0.5 top-0.5 size-5 rounded-full bg-white shadow transition peer-checked:translate-x-5"></span>
                            </span>
                        </label>
                    </div>
                </section>

                <!-- Ringkasan -->
                <section class="rounded-2xl border border-violet-100 bg-violet-50/60 p-6">
                    <h2 class="mb-4 font-bold text-gray-900">Ringkasan</h2>
                    <dl class="space-y-3 text-sm">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Harga jual</dt>
                            <dd id="sum-price" class="text-right font-semibold text-gray-800">-</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Diskon</dt>
                            <dd id="sum-discount" class="text-right font-semibold text-gray-800">-</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Jumlah varian</dt>
                            <dd id="sum-variants" class="text-right font-semibold text-gray-800">1</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-gray-500">Total stok</dt>
                            <dd id="sum-stock" class="text-right font-semibold text-gray-800">0</dd>
                        </div>
                    </dl>
                </section>
            </div>

            <!-- ================= BAR AKSI ================= -->
            <div
                class="sticky bottom-4 z-10 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-gray-100 bg-white/90 p-3 shadow-lg shadow-gray-200/60 backdrop-blur xl:col-span-3">
                <p class="hidden text-sm text-gray-500 sm:block">
                    Kolom bertanda <span class="font-bold text-red-500">*</span> wajib diisi.
                </p>

                <div class="ml-auto flex items-center gap-2">
                    <a href="#"
                        class="inline-flex h-11 items-center rounded-xl border border-gray-200 bg-white px-5 text-sm font-semibold text-gray-600 transition hover:bg-gray-50">
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

    <!-- Template satu varian -->
    <template id="variant-template">
        <div class="variant-item rounded-2xl border border-gray-200 bg-gray-50/60 p-4">
            <div class="mb-3 flex items-center justify-between">
                <span class="inline-flex items-center gap-2 text-sm font-bold text-gray-700">
                    <span
                        class="variant-number flex size-6 items-center justify-center rounded-lg bg-violet-100 text-xs text-violet-700">1</span>
                    <span class="variant-title">Varian 1</span>
                </span>
                <button type="button" title="Hapus varian"
                    class="remove-variant flex size-8 items-center justify-center rounded-lg text-red-500 transition hover:bg-red-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-transparent">
                    <i class="fa-regular fa-trash-can"></i>
                </button>
            </div>

            <div class="grid grid-cols-2 gap-3 md:grid-cols-6">
                <div class="col-span-2 md:col-span-3">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">SKU Varian <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="variants[__i__][sku]" required maxlength="60"
                        placeholder="HDI-OVR-001-M-HJ"
                        class="h-11 w-full rounded-xl border border-gray-200 bg-white px-3.5 text-sm uppercase text-gray-800 outline-none transition placeholder:normal-case placeholder:text-gray-400 hover:border-gray-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                </div>
                <div class="col-span-1">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">Ukuran <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="variants[__i__][size]" list="daftar-ukuran" required maxlength="10"
                        placeholder="M"
                        class="h-11 w-full rounded-xl border border-gray-200 bg-white px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                </div>
                <div class="col-span-1 md:col-span-2">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">Warna <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="variants[__i__][color]" required maxlength="30"
                        placeholder="Hijau Sage"
                        class="h-11 w-full rounded-xl border border-gray-200 bg-white px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                </div>

                <div class="col-span-2 md:col-span-2">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">Kode Warna <span
                            class="font-normal text-gray-400">(opsional)</span></label>
                    <input type="color" name="variants[__i__][color_hex]" value="#9caf88"
                        class="h-11 w-full cursor-pointer rounded-xl border border-gray-200 bg-white p-1 transition hover:border-gray-300">
                </div>
                <div class="col-span-1 md:col-span-2">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">Stok <span
                            class="text-red-500">*</span></label>
                    <input type="number" name="variants[__i__][stock]" required min="0" placeholder="10"
                        class="variant-stock h-11 w-full rounded-xl border border-gray-200 bg-white px-3.5 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 hover:border-gray-300 focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                </div>
                <div class="col-span-1 md:col-span-2">
                    <label class="mb-1 block text-xs font-semibold text-gray-600">Harga Varian <span
                            class="font-normal text-gray-400">(opsional)</span></label>
                    <div
                        class="flex h-11 items-stretch overflow-hidden rounded-xl border border-gray-200 bg-white transition focus-within:border-violet-500 focus-within:ring-4 focus-within:ring-violet-100">
                        <span
                            class="flex items-center border-r border-gray-200 bg-gray-100 px-2.5 text-xs font-semibold text-gray-500">Rp</span>
                        <input type="number" name="variants[__i__][price]" min="0" placeholder="Sama"
                            class="min-w-0 flex-1 bg-transparent px-2.5 text-sm text-gray-800 outline-none placeholder:text-gray-400">
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script>
        (() => {
            const $ = (s, r = document) => r.querySelector(s);
            const rupiah = (n) => 'Rp ' + new Intl.NumberFormat('id-ID').format(n);

            /* ---------- Slug otomatis dari nama ---------- */
            const nameEl = $('#name'), slugEl = $('#slug');
            let slugEdited = false;
            const slugify = (t) => t.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            slugEl.addEventListener('input', () => { slugEdited = slugEl.value !== ''; });
            nameEl.addEventListener('input', () => { if (!slugEdited) slugEl.value = slugify(nameEl.value); });
            slugEl.addEventListener('blur', () => { slugEl.value = slugify(slugEl.value); });

            /* ---------- Penghitung deskripsi ---------- */
            const desc = $('#description'), descCount = $('#description-count');
            desc.addEventListener('input', () => { descCount.textContent = desc.value.length + ' / 1000'; });

            /* ---------- Varian dinamis ---------- */
            const list = $('#variant-list'), tpl = $('#variant-template');
            let counter = 0;

            const refreshVariants = () => {
                const items = list.querySelectorAll('.variant-item');
                items.forEach((el, i) => {
                    $('.variant-number', el).textContent = i + 1;
                    $('.variant-title', el).textContent = 'Varian ' + (i + 1);
                    $('.remove-variant', el).disabled = items.length === 1;
                });
                $('#variant-badge').textContent = items.length + ' varian';
                $('#sum-variants').textContent = items.length;
                let total = 0;
                list.querySelectorAll('.variant-stock').forEach((s) => { total += parseInt(s.value) || 0; });
                $('#sum-stock').textContent = new Intl.NumberFormat('id-ID').format(total);
            };

            const addVariant = () => {
                const html = tpl.innerHTML.replaceAll('__i__', counter++);
                list.insertAdjacentHTML('beforeend', html);
                refreshVariants();
            };

            $('#add-variant').addEventListener('click', () => {
                addVariant();
                list.lastElementChild.querySelector('input').focus();
            });
            list.addEventListener('click', (e) => {
                const btn = e.target.closest('.remove-variant');
                if (!btn || btn.disabled) return;
                btn.closest('.variant-item').remove();
                refreshVariants();
            });
            list.addEventListener('input', (e) => {
                if (e.target.classList.contains('variant-stock')) refreshVariants();
            });
            addVariant();

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
                hint.classList.toggle('text-gray-400', ok);

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

            /* ---------- Galeri foto ---------- */
            const gIn = $('#gallery-input'), grid = $('#gallery-grid');
            let files = [];
            const syncInput = () => {
                const dt = new DataTransfer();
                files.forEach((f) => dt.items.add(f));
                gIn.files = dt.files;
            };
            const renderGallery = () => {
                grid.innerHTML = '';
                const slots = Math.max(4, files.length);
                for (let i = 0; i < slots; i++) {
                    const cell = document.createElement('div');
                    cell.className = 'group relative flex aspect-square items-center justify-center overflow-hidden rounded-xl border border-gray-200 bg-gray-50 text-gray-300';
                    const badge = document.createElement('span');
                    badge.className = 'absolute left-2 top-2 z-10 flex size-5 items-center justify-center rounded-md text-[10px] font-bold text-white ' + (files[i] ? 'bg-violet-600' : 'bg-gray-300');
                    badge.textContent = i + 1;
                    cell.appendChild(badge);
                    if (files[i]) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(files[i]);
                        img.alt = 'Foto ' + (i + 1);
                        img.className = 'size-full object-cover';
                        const rm = document.createElement('button');
                        rm.type = 'button'; rm.title = 'Hapus foto';
                        rm.className = 'absolute right-1.5 top-1.5 z-10 flex size-6 items-center justify-center rounded-md bg-white/90 text-xs text-red-500 opacity-0 shadow transition group-hover:opacity-100 focus:opacity-100';
                        rm.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                        rm.addEventListener('click', () => { files.splice(i, 1); syncInput(); renderGallery(); });
                        cell.append(img, rm);
                    } else {
                        cell.insertAdjacentHTML('beforeend', '<i class="fa-regular fa-image text-xl"></i>');
                    }
                    grid.appendChild(cell);
                }
            };
            gIn.addEventListener('change', () => {
                // Tambahkan ke daftar yang sudah ada agar tidak saling menimpa
                const added = Array.from(gIn.files);
                files = files.concat(added.filter((f) => !files.some((x) => x.name === f.name && x.size === f.size)));
                syncInput(); renderGallery();
            });
            renderGallery();
        })();
    </script>
</body>

</html>
