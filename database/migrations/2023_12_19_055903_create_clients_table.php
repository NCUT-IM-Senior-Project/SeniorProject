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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); //編號
            $table->string('partner_id'); //客戶編號
            $table->string('name'); //客戶公司名稱
            $table->string('address'); //地址
            $table->string('land_line'); //室內電話
            $table->string('fax'); //傳真
            $table->string('description')->nullable(); //備註說明
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
