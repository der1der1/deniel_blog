<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('album', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 20);
            $table->string('title', 20);
            $table->string('context', 70);
            $table->string('back_img', 50)->nullable();
            $table->string('show', 5);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('album');
    }
};
