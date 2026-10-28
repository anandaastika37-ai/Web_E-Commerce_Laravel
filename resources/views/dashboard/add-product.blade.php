<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=DM+Sans:wght@100..1000&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-linear-to-br from-violet-100 via-violet-50 to-indigo-100 font-['DM_Sans'] text-gray-800">

    <div class="mx-auto w-[94%] py-8 lg:w-4/5">

        <!-- Header -->
        <header class="mb-6 rounded-3xl bg-linear-to-r from-purple-600 to-indigo-700 p-6 shadow-lg sm:p-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="text-xs text-violet-100">Dashboard / Kelola Produk / Tambah Produk</p>
                    <h1 class="mt-3 font-['Commissioner'] text-3xl font-bold text-white sm:text-4xl">Tambah Produk</h1>
                    <p class="mt-1 text-sm text-violet-100">Lengkapi informasi produk yang akan dijual di tokomu.</p>
                </div>

                <a href="/store"
                    class="inline-flex h-10 items-center gap-2 rounded-xl bg-white/20 px-4 text-sm font-semibold text-white hover:bg-white/30">
                    <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
                </a>
            </div>
        </header>

        <form method="POST" action="{{ route('dashboard.products.store') }}" enctype="multipart/form-data"
            x-data="productForm()" class="grid grid-cols-1 items-start gap-6 xl:grid-cols-3">
            @csrf
            @if ($errors->any())
                <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-700 xl:col-span-3">
                    <p class="mb-2 font-semibold">Produk belum tersimpan:</p>
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- ============ KOLOM KIRI ============ -->
            <div class="space-y-6 xl:col-span-2">

                <!-- Informasi dasar -->
                <section class="rounded-2xl bg-white p-6 shadow-md">
                    <div class="mb-5 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-violet-600 text-white"><i
                                class="fa-solid fa-circle-info"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] font-bold text-gray-900">Informasi Dasar</h2>
                            <p class="text-xs text-gray-500">Nama, kode, dan kategori produk.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <!-- Nama -->
                        <div class="md:col-span-2">
                            <label for="name" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Produk
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required maxlength="255"
                                placeholder="Contoh: Hoodie Oversize Sage Green"
                                class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                        </div>

                        <!-- SKU -->
                        <div>
                            <label for="sku" class="mb-1.5 block text-sm font-semibold text-gray-700">SKU <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="sku" name="sku" required maxlength="50"
                                placeholder="HDI-OVR-001"
                                class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm uppercase outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                            <p class="mt-1 text-xs text-gray-500">Kode unik produk, maksimal 50 karakter.</p>
                        </div>

                        <!-- Brand (otomatis dari nama toko) -->
                        <div>
                            <label for="brand" class="mb-1.5 block text-sm font-semibold text-gray-700">Brand <span
                                    class="font-normal text-gray-500">(otomatis)</span></label>
                            <input type="text" id="brand" name="brand" readonly maxlength="100"
                                value="{{ auth()->user()?->store?->name }}" placeholder="Nama toko belum diisi"
                                class="h-11 w-full cursor-not-allowed rounded-xl border border-violet-200 bg-violet-100 px-3.5 text-sm text-gray-600 outline-none">
                            <p class="mt-1 text-xs text-gray-500">Mengikuti nama tokomu dan tidak bisa diubah.</p>
                        </div>

                        <!-- Kategori -->
                        <div class="md:col-span-2">
                            <label for="category_id" class="mb-1.5 block text-sm font-semibold text-gray-700">Kategori
                                <span class="text-red-500">*</span></label>
                            <select id="category_id" name="category_id" required
                                class="h-11 w-full cursor-pointer rounded-xl border border-violet-200 bg-white px-3 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                <option value="" selected disabled>Pilih kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <div class="mb-1.5 flex items-center justify-between">
                                <label for="description" class="text-sm font-semibold text-gray-700">Deskripsi <span
                                        class="font-normal text-gray-500">(opsional)</span></label>
                                <span class="text-xs text-gray-500" x-text="description.length + ' / 1000'"></span>
                            </div>
                            <textarea id="description" name="description" rows="4" maxlength="1000" x-model="description"
                                placeholder="Ceritakan keunggulan produk, bahan, dan hal yang perlu diketahui pembeli..."
                                class="min-h-28 w-full resize-y rounded-xl border border-violet-200 bg-white px-3.5 py-3 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Detail pakaian -->
                <section class="rounded-2xl bg-white p-6 shadow-md">
                    <div class="mb-5 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-violet-600 text-white"><i
                                class="fa-solid fa-shirt"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] font-bold text-gray-900">Detail Pakaian</h2>
                            <p class="text-xs text-gray-500">Untuk siapa dan terbuat dari apa.</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- Gender -->
                        <div>
                            <span class="mb-1.5 block text-sm font-semibold text-gray-700">Gender</span>
                            <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
                                <label class="cursor-pointer">
                                    <input type="radio" name="gender" value="pria" class="peer sr-only">
                                    <span
                                        class="flex h-11 items-center justify-center rounded-xl border border-violet-200 bg-white text-sm font-semibold text-violet-800 peer-checked:border-violet-600 peer-checked:bg-violet-600 peer-checked:text-white">Pria</span>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="gender" value="wanita" class="peer sr-only">
                                    <span
                                        class="flex h-11 items-center justify-center rounded-xl border border-violet-200 bg-white text-sm font-semibold text-violet-800 peer-checked:border-violet-600 peer-checked:bg-violet-600 peer-checked:text-white">Wanita</span>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="gender" value="unisex" class="peer sr-only"
                                        checked>
                                    <span
                                        class="flex h-11 items-center justify-center rounded-xl border border-violet-200 bg-white text-sm font-semibold text-violet-800 peer-checked:border-violet-600 peer-checked:bg-violet-600 peer-checked:text-white">Unisex</span>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="gender" value="anak" class="peer sr-only">
                                    <span
                                        class="flex h-11 items-center justify-center rounded-xl border border-violet-200 bg-white text-sm font-semibold text-violet-800 peer-checked:border-violet-600 peer-checked:bg-violet-600 peer-checked:text-white">Anak</span>
                                </label>
                            </div>
                        </div>

                        <!-- Bahan -->
                        <div>
                            <label for="material" class="mb-1.5 block text-sm font-semibold text-gray-700">Bahan <span
                                    class="font-normal text-gray-500">(opsional)</span></label>
                            <input type="text" id="material" name="material" maxlength="100"
                                placeholder="Contoh: Katun fleece 280 gsm"
                                class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                        </div>
                    </div>
                </section>

                <!-- Varian produk: satu baris = satu kombinasi warna + ukuran -->
                <section class="rounded-2xl bg-white p-6 shadow-md">
                    <div class="mb-5 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span
                                class="flex size-10 items-center justify-center rounded-xl bg-violet-600 text-white"><i
                                    class="fa-solid fa-swatchbook"></i></span>
                            <div>
                                <h2 class="font-['Commissioner'] font-bold text-gray-900">Varian Produk</h2>
                                <p class="text-xs text-gray-500">Satu baris untuk satu kombinasi warna dan ukuran.</p>
                            </div>
                        </div>
                        <span
                            class="shrink-0 rounded-full bg-violet-100 px-3 py-1 text-xs font-semibold text-violet-700"
                            x-text="variants.length + ' varian'"></span>
                    </div>

                    <div class="space-y-4">
                        <!-- Baris ini diulang otomatis oleh Alpine untuk setiap varian -->
                        <template x-for="(v, i) in variants" :key="i">
                            <div class="rounded-2xl border border-violet-200 bg-violet-50 p-4">
                                <div class="mb-3 flex items-center justify-between">
                                    <span class="text-sm font-bold text-gray-700" x-text="'Varian ' + (i + 1)"></span>
                                    <button type="button" title="Hapus varian" @click="removeVariant(i)"
                                        :disabled="variants.length === 1"
                                        class="flex size-8 items-center justify-center rounded-lg text-red-500 hover:bg-red-50 disabled:cursor-not-allowed disabled:opacity-30">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>

                                <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                                    <!-- Warna -->
                                    <div class="col-span-2">
                                        <label class="mb-1.5 block text-sm font-semibold text-gray-700">Warna <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" :name="`variants[${i}][color]`" x-model="v.color"
                                            required maxlength="30" placeholder="Hijau Sage"
                                            class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                    </div>

                                    <!-- Kode warna -->
                                    <div>
                                        <label class="mb-1.5 block text-sm font-semibold text-gray-700">Kode
                                            Warna</label>
                                        <input type="color" :name="`variants[${i}][color_hex]`"
                                            x-model="v.color_hex"
                                            class="h-11 w-full cursor-pointer rounded-xl border border-violet-200 bg-white p-1">
                                    </div>

                                    <!-- Ukuran (bisa pilih saran atau ketik sendiri) -->
                                    <div>
                                        <label class="mb-1.5 block text-sm font-semibold text-gray-700">Ukuran <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" :name="`variants[${i}][size]`" x-model="v.size"
                                            list="size-list" required maxlength="10" placeholder="M"
                                            class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                    </div>

                                    <!-- SKU varian -->
                                    <div class="col-span-2">
                                        <label class="mb-1.5 block text-sm font-semibold text-gray-700">SKU Varian
                                            <span class="text-red-500">*</span></label>
                                        <input type="text" :name="`variants[${i}][sku]`" x-model="v.sku" required
                                            maxlength="60" placeholder="HDI-OVR-001-M-HJ"
                                            class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm uppercase outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                    </div>

                                    <!-- Stok -->
                                    <div>
                                        <label class="mb-1.5 block text-sm font-semibold text-gray-700">Stok <span
                                                class="text-red-500">*</span></label>
                                        <input type="number" :name="`variants[${i}][stock]`" x-model="v.stock"
                                            required min="0" max="4294967295" step="1" placeholder="10"
                                            class="h-11 w-full rounded-xl border border-violet-200 bg-white px-3.5 text-sm outline-none focus:border-violet-500 focus:ring-4 focus:ring-violet-100">
                                    </div>

                                    <!-- Harga varian -->
                                    <div>
                                        <label class="mb-1.5 block text-sm font-semibold text-gray-700">Harga <span
                                                class="font-normal text-gray-500">(opsional)</span></label>
                                        <div
                                            class="flex h-11 overflow-hidden rounded-xl border border-violet-200 bg-white focus-within:border-violet-500 focus-within:ring-4 focus-within:ring-violet-100">
                                            <span
                                                class="flex items-center bg-violet-100 px-2.5 text-xs font-semibold text-violet-700">Rp</span>
                                            <input type="number" :name="`variants[${i}][price]`" x-model="v.price"
                                                min="0" max="4294967295" step="1" placeholder="Sama"
                                                class="min-w-0 flex-1 px-2.5 text-sm outline-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Saran ukuran. Tetap bisa mengetik ukuran lain, mis. 28 atau 3XL -->
                    <datalist id="size-list">
                        <option value="S">
                        <option value="M">
                        <option value="L">
                        <option value="XL">
                        <option value="XXL">
                        <option value="All Size">
                    </datalist>

                    <button type="button" @click="addVariant()"
                        class="mt-4 flex h-12 w-full items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-violet-300 text-sm font-semibold text-violet-600 hover:border-violet-500 hover:bg-violet-50">
                        <i class="fa-solid fa-plus text-xs"></i> Tambah Varian
                    </button>
                </section>
            </div>

            <!-- ============ KOLOM KANAN ============ -->
            <div class="space-y-6 xl:sticky xl:top-6">

                <!-- Foto utama -->
                <section class="rounded-2xl bg-white p-6 shadow-md">
                    <div class="mb-5 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-violet-600 text-white"><i
                                class="fa-solid fa-image"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] font-bold text-gray-900">Foto Utama</h2>
                            <p class="text-xs text-gray-500">Tampil di kartu produk.</p>
                        </div>
                    </div>

                    <label
                        class="relative flex aspect-4/5 w-full cursor-pointer flex-col items-center justify-center gap-2 overflow-hidden rounded-2xl border-2 border-dashed border-violet-300 bg-violet-50 text-center hover:border-violet-500">
                        <input type="file" name="thumbnail" accept="image/*" class="sr-only" x-ref="thumb"
                            @change="pickPhoto($event)">

                        <!-- Pratinjau foto -->
                        <img x-show="preview" :src="preview" alt="Pratinjau foto utama"
                            class="absolute inset-0 size-full object-cover">

                        <!-- Tampilan sebelum ada foto -->
                        <div x-show="!preview" class="flex flex-col items-center gap-2">
                            <i class="fa-regular fa-image text-3xl text-violet-500"></i>
                            <span class="text-sm font-semibold text-gray-700">Unggah foto utama</span>
                            <span class="px-6 text-xs text-gray-500">Klik untuk memilih. Rasio 4:5 paling pas dengan
                                kartu produk.</span>
                        </div>

                        <!-- Tombol hapus foto -->
                        <button type="button" x-show="preview" title="Hapus foto" @click.prevent="removePhoto()"
                            class="absolute right-3 top-3 flex size-8 items-center justify-center rounded-lg bg-white text-red-500 shadow hover:bg-red-50">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </label>
                </section>

                <!-- Harga & pengiriman -->
                <section class="rounded-2xl bg-white p-6 shadow-md">
                    <div class="mb-5 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-violet-600 text-white"><i
                                class="fa-solid fa-tags"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] font-bold text-gray-900">Harga &amp; Pengiriman</h2>
                            <p class="text-xs text-gray-500">Harga jual dan berat paket.</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- Harga -->
                        <div>
                            <label for="price" class="mb-1.5 block text-sm font-semibold text-gray-700">Harga <span
                                    class="text-red-500">*</span></label>
                            <div
                                class="flex h-11 overflow-hidden rounded-xl border border-violet-200 bg-white focus-within:border-violet-500 focus-within:ring-4 focus-within:ring-violet-100">
                                <span
                                    class="flex items-center bg-violet-100 px-3 text-sm font-semibold text-violet-700">Rp</span>
                                <input type="number" id="price" name="price" x-model="price" required
                                    min="0" max="4294967295" step="1" placeholder="250000"
                                    class="min-w-0 flex-1 px-3 text-sm outline-none">
                            </div>
                        </div>

                        <!-- Harga diskon -->
                        <div>
                            <label for="discount_price" class="mb-1.5 block text-sm font-semibold text-gray-700">Harga
                                Diskon <span class="font-normal text-gray-500">(opsional)</span></label>
                            <div
                                class="flex h-11 overflow-hidden rounded-xl border border-violet-200 bg-white focus-within:border-violet-500 focus-within:ring-4 focus-within:ring-violet-100">
                                <span
                                    class="flex items-center bg-violet-100 px-3 text-sm font-semibold text-violet-700">Rp</span>
                                <!-- :max membuat browser menolak diskon yang sama atau lebih tinggi dari harga normal -->
                                <input type="number" id="discount_price" name="discount_price" x-model="discount"
                                    min="0" :max="price ? price - 1 : null" step="1"
                                    placeholder="199000" class="min-w-0 flex-1 px-3 text-sm outline-none">
                            </div>
                            <p class="mt-1 text-xs" :class="discountInvalid ? 'text-red-500' : 'text-gray-500'">Harus
                                lebih rendah dari harga normal.</p>
                        </div>

                        <!-- Berat -->
                        <div>
                            <label for="weight"
                                class="mb-1.5 block text-sm font-semibold text-gray-700">Berat</label>
                            <div
                                class="flex h-11 overflow-hidden rounded-xl border border-violet-200 bg-white focus-within:border-violet-500 focus-within:ring-4 focus-within:ring-violet-100">
                                <input type="number" id="weight" name="weight" value="0" min="0"
                                    max="65535" step="1" @focus="$el.select()"
                                    class="min-w-0 flex-1 px-3 text-sm outline-none">
                                <span
                                    class="flex items-center bg-violet-100 px-3 text-sm font-semibold text-violet-700">gram</span>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Dipakai untuk menghitung ongkos kirim. Maksimal
                                65.535 gram.</p>
                        </div>
                    </div>
                </section>

                <!-- Status -->
                <section class="rounded-2xl bg-white p-6 shadow-md">
                    <div class="mb-5 flex items-center gap-3">
                        <span class="flex size-10 items-center justify-center rounded-xl bg-violet-600 text-white"><i
                                class="fa-solid fa-toggle-on"></i></span>
                        <div>
                            <h2 class="font-['Commissioner'] font-bold text-gray-900">Status</h2>
                            <p class="text-xs text-gray-500">Atur tampilan produk di toko.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Aktif -->
                        <label class="flex cursor-pointer items-center justify-between gap-4">
                            <span>
                                <span class="block text-sm font-semibold text-gray-800">Aktif</span>
                                <span class="block text-xs text-gray-500">Produk tampil dan bisa dibeli</span>
                            </span>
                            <span class="relative shrink-0">
                                <!-- Input hidden ini memastikan nilai 0 tetap terkirim saat toggle mati -->
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" value="1" class="peer sr-only" checked>
                                <span
                                    class="block h-6 w-11 rounded-full bg-violet-200 peer-checked:bg-violet-600"></span>
                                <span
                                    class="absolute left-0.5 top-0.5 size-5 rounded-full bg-white shadow peer-checked:translate-x-5"></span>
                            </span>
                        </label>

                        <!-- Produk unggulan -->
                        <label class="flex cursor-pointer items-center justify-between gap-4">
                            <span>
                                <span class="block text-sm font-semibold text-gray-800">Produk Unggulan</span>
                                <span class="block text-xs text-gray-500">Ditonjolkan di halaman depan</span>
                            </span>
                            <span class="relative shrink-0">
                                <input type="hidden" name="is_featured" value="0">
                                <input type="checkbox" name="is_featured" value="1" class="peer sr-only">
                                <span
                                    class="block h-6 w-11 rounded-full bg-violet-200 peer-checked:bg-violet-600"></span>
                                <span
                                    class="absolute left-0.5 top-0.5 size-5 rounded-full bg-white shadow peer-checked:translate-x-5"></span>
                            </span>
                        </label>
                    </div>
                </section>

                <!-- Ringkasan -->
                <section class="rounded-2xl border border-violet-200 bg-violet-100 p-6">
                    <h2 class="mb-4 font-['Commissioner'] font-bold text-gray-900">Ringkasan</h2>
                    <dl class="space-y-3 text-sm">
                        <div class="flex justify-between gap-3">
                            <dt class="text-gray-600">Harga jual</dt>
                            <dd class="text-right font-semibold" x-text="price === '' ? '-' : rupiah(price)"></dd>
                        </div>
                        <div class="flex justify-between gap-3">
                            <dt class="text-gray-600">Diskon</dt>
                            <dd class="text-right font-semibold" x-text="discountText"></dd>
                        </div>
                        <div class="flex justify-between gap-3">
                            <dt class="text-gray-600">Jumlah varian</dt>
                            <dd class="text-right font-semibold" x-text="variants.length"></dd>
                        </div>
                        <div class="flex justify-between gap-3">
                            <dt class="text-gray-600">Total stok</dt>
                            <dd class="text-right font-semibold" x-text="totalStock"></dd>
                        </div>
                    </dl>
                </section>
            </div>

            <!-- ============ BAR AKSI ============ -->
            <div
                class="sticky bottom-4 z-10 flex flex-wrap items-center justify-between gap-3 rounded-2xl bg-white p-3 shadow-xl xl:col-span-3">
                <p class="hidden text-sm text-gray-500 sm:block">
                    Kolom bertanda <span class="font-bold text-red-500">*</span> wajib diisi.
                </p>

                <div class="ml-auto flex items-center gap-2">
                    <a href="/store"
                        class="inline-flex h-11 items-center rounded-xl border border-violet-200 bg-white px-5 text-sm font-semibold text-gray-600 hover:bg-violet-50">
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex h-11 items-center gap-2 rounded-xl bg-violet-600 px-6 text-sm font-semibold text-white hover:bg-violet-700 active:scale-95">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Produk
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Semua logika halaman ada di sini: data + fungsi kecil untuk Alpine
        function productForm() {
            return {
                description: '',
                price: '',
                discount: '',
                preview: null,
                variants: [],

                init() {
                    this.addVariant() // mulai dengan satu varian kosong
                },

                // ----- Varian -----
                addVariant() {
                    this.variants.push({
                        color: '',
                        color_hex: '#9caf88',
                        size: '',
                        sku: '',
                        stock: '',
                        price: ''
                    })
                },
                removeVariant(i) {
                    this.variants.splice(i, 1)
                },
                get totalStock() {
                    return this.variants.reduce((total, v) => total + Number(v.stock), 0)
                },

                // ----- Harga -----
                rupiah(n) {
                    return 'Rp ' + Number(n).toLocaleString('id-ID')
                },
                get discountInvalid() {
                    return this.discount !== '' && Number(this.discount) >= Number(this.price)
                },
                get discountText() {
                    if (!this.discount || !this.price || this.discountInvalid) return '-'
                    const persen = Math.round((1 - this.discount / this.price) * 100)
                    return this.rupiah(this.discount) + ' (-' + persen + '%)'
                },

                // ----- Foto utama -----
                pickPhoto(e) {
                    const file = e.target.files[0]
                    this.preview = file ? URL.createObjectURL(file) : null
                },
                removePhoto() {
                    this.preview = null
                    this.$refs.thumb.value = ''
                },
            }
        }
    </script>
</body>

</html>
