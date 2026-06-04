<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('type'); // sedan, suv, mpv, dll
            $table->integer('year');
            $table->bigInteger('price');
            $table->enum('condition', ['baru', 'bekas']);
            $table->string('color');
            $table->integer('mileage')->default(0);
            $table->string('transmission'); // manual, otomatis
            $table->string('fuel'); // bensin, diesel, listrik
            $table->integer('seats');
            $table->text('description')->nullable();
            $table->enum('status', ['tersedia', 'terjual'])->default('tersedia');
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('cars'); }
};
