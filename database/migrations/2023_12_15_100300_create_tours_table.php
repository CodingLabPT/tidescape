<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('local');
            $table->string('duration');
            $table->string('ep');
            $table->string('eg');
            $table->string('emg');
            $table->string('img');
            $table->string('img2')->nullable();;
            $table->string('img3')->nullable();;
            $table->string('obs');
            $table->string('destaque');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
