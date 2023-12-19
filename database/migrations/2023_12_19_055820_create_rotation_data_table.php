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
        Schema::create('rotation_data', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('rotation_list_id'); //輪值編號
            $table->unsignedBigInteger('driver_id'); //司機編號
            $table->dateTime('date')->nullable(); //日期
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotation_data');
    }
};
