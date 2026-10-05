<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Hanya buat tabel jika belum ada dari migrasi sebelumnya
        if (!Schema::hasTable('articles')) {
            Schema::create('articles', function (Blueprint $t) {
                $t->id();
                $t->string('title');
                $t->string('slug')->unique();
                $t->string('category')->index();
                $t->string('excerpt', 300)->nullable();
                $t->longText('body');
                $t->string('image')->nullable();
                $t->string('author')->nullable();
                $t->enum('status', ['draft', 'published'])->default('draft')->index();
                $t->date('published_at')->nullable();
                $t->timestamps();
            });
        }

        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $t) {
                $t->id();
                $t->string('name');
                $t->string('slug')->unique();
                $t->string('sku')->nullable();
                $t->string('category')->index();
                $t->text('description')->nullable();
                $t->unsignedInteger('price')->default(0);
                $t->unsignedInteger('stock')->default(0);
                $t->string('image')->nullable();
                $t->timestamps();
            });
        }

        if (!Schema::hasTable('galleries')) {
            Schema::create('galleries', function (Blueprint $t) {
                $t->id();
                $t->string('title');
                $t->string('slug')->unique();
                $t->string('category')->index();
                $t->text('description')->nullable();
                $t->string('image')->nullable();
                $t->date('taken_at')->nullable();
                $t->timestamps();
            });
        }

        if (!Schema::hasTable('messages')) {
            Schema::create('messages', function (Blueprint $t) {
                $t->id();
                $t->string('name');
                $t->string('email');
                $t->string('subject');
                $t->text('body');
                $t->timestamps();
            });
        }
    }

    public function down(): void
    {
        foreach (['messages', 'galleries', 'products', 'articles'] as $x) Schema::dropIfExists($x);
    }
};