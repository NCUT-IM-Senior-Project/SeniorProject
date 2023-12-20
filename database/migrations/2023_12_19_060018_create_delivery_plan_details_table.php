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
        Schema::create('delivery_plan_details', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('delivery_service_id'); //配送單編號
            $table->unsignedBigInteger('delivery_order_id'); //送貨單編號
            $table->unsignedBigInteger('sequence')->nullable(); //順序
            $table->unsignedBigInteger('plans_details_status_id'); //配送狀態編號
            $table->dateTime('departure_at')->nullable(); //出發時間
            $table->dateTime('arrival_at')->nullable(); //到達時間
            $table->dateTime('start_unload_at')->nullable(); //開始卸貨時間
            $table->dateTime('end_unload_at')->nullable(); //結束卸貨時間
            $table->string('pictrue')->nullable(); //回傳照片
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_plan_details');
    }
};
