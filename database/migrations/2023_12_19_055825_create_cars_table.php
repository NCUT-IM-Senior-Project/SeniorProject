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
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('number'); //車牌號碼
            $table->string('brand'); //品牌
            $table->string('color'); //車色
            $table->string('type'); //車型 例：中小型汽車
            $table->string('Oils'); //汽油種類
            $table->unsignedBigInteger('tonnage'); //噸位數
            $table->boolean('tailgate'); //尾門
            $table->unsignedBigInteger('driver_id')->nullable(); //駕駛司機
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
