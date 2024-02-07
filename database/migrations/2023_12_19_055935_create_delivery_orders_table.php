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
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->id(); //編號
            $table->string('keynote')->nullable(); //主旨
            $table->string('partner_id'); //廠商客戶編號
            $table->string('order_number'); //訂單編號
            $table->unsignedBigInteger('logistics_id'); //物流類型
            $table->dateTime('scheduled_at')->nullable(); //預定交期
            $table->dateTime('shipment_at')->nullable(); //出貨日期
            $table->unsignedBigInteger('delivery_status_id'); //狀態
            $table->unsignedBigInteger('created_by'); //創建者
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_orders');
    }
};
