<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $t) {
            $t->string('excerpt', 300)->nullable()->change();
            $t->string('author')->nullable()->change();
            $t->date('published_at')->nullable()->change();
        });
    }

    public function down(): void {}
};  