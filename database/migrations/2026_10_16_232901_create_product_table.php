<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Data umum produk
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand', 100)->nullable();
            $table->text('description')->nullable();
            $table->enum('gender', ['pria', 'wanita', 'unisex', 'anak'])->default('unisex');
            $table->string('material', 100)->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('discount_price')->nullable();
            $table->unsignedSmallInteger('weight')->default(0);
            $table->string('thumbnail')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('sku', 60)->unique();
            $table->string('size', 10);
            $table->string('color', 30);
            $table->string('color_hex', 7)->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('price')->nullable();
            $table->timestamps();
            $table->unique(['product_id', 'size', 'color']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('products');
    }
};
