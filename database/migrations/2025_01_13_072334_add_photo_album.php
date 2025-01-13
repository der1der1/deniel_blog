<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('album', function (Blueprint $table) {
            $table->after('back_img', function ($table) {
                $table->string('photos', 500)->nullable();
            });
        });
    }

    public function down(): void
    {
        Schema::table('album', function (Blueprint $table) {
            $table->dropColumn('photos');
        });
    }
};
