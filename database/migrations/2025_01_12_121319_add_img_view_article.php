<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('article', function (Blueprint $table) {
            $table->after('context', function ($table) {
                $table->string('back_img', 50)->nullable();
                $table->string('views', 25)->nullable();
            });
        });
    }

    public function down(): void
    {
        Schema::table('article', function (Blueprint $table) {
            $table->dropColumn('back_img');
            $table->dropColumn('views');
        });
    }
};
