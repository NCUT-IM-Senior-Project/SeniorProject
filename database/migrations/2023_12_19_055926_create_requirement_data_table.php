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
        Schema::create('requirement_data', function (Blueprint $table) {
            $table->id(); //編號
            $table->string('vendor_client_id'); //廠商客戶編號
            $table->unsignedBigInteger('requirement_id'); //需求編號
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_data');
    }
};
