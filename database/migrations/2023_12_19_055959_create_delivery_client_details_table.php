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
        Schema::create('delivery_client_details', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('delivery_order_id'); //送貨單編號
            $table->string('name'); //商品名稱
            $table->string('specification'); //規格
            $table->unsignedBigInteger('quantity'); //數量
            $table->string('weight')->nullable(); //重量
            $table->string('description')->nullable(); //備註說明
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_client_details');
    }
};
