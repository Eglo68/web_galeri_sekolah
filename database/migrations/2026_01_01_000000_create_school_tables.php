<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('articles', function (Blueprint $t) {
            $t->id(); $t->string('title'); $t->string('slug')->unique();
            $t->string('category'); $t->text('excerpt')->nullable(); $t->longText('body');
            $t->string('image')->nullable(); $t->string('author')->default('Admin');
            $t->enum('status', ['draft', 'published'])->default('draft');
            $t->timestamp('published_at')->nullable(); $t->unsignedInteger('views')->default(0);
            $t->timestamps();
        });
        Schema::create('products', function (Blueprint $t) {
            $t->id(); $t->string('name'); $t->string('slug')->unique();
            $t->string('sku')->nullable()->unique(); $t->string('category');
            $t->unsignedInteger('price'); $t->unsignedInteger('stock')->default(0);
            $t->text('description')->nullable(); $t->string('image')->nullable();
            $t->timestamps();
        });
        Schema::create('galleries', function (Blueprint $t) {
            $t->id(); $t->string('title'); $t->string('slug')->unique();
            $t->string('category'); $t->text('description')->nullable();
            $t->string('image')->nullable(); $t->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('galleries'); Schema::dropIfExists('products'); Schema::dropIfExists('articles');
    }
};
