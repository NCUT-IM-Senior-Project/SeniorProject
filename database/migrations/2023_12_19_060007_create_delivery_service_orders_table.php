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
        Schema::create('delivery_service_orders', function (Blueprint $table) {
            $table->id(); //編號
            $table->string('keynote')->nullable(); //主旨
            $table->unsignedBigInteger('car_id'); //車輛編號
            $table->unsignedBigInteger('driver_id'); //司機編號
            $table->unsignedBigInteger('plan_id'); //狀態
            $table->dateTime('departure_at')->nullable(); //出車日期
            $table->dateTime('return_at')->nullable(); //回廠時間
            $table->unsignedBigInteger('created_by'); //創建者
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_service_orders');
    }
};
