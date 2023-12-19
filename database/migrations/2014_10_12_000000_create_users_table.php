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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //編號
            $table->string('name'); //姓名
            $table->string('email')->unique(); //信箱 (帳號)
            $table->timestamp('email_verified_at')->nullable(); //信箱驗證時間
            $table->string('password'); //密碼
            $table->string('phone'); //電話
            $table->string('description')->nullable(); //備註說明
            $table->unsignedBigInteger('status')->default(0); //狀態
            $table->unsignedBigInteger('permission_id'); //權限
            $table->rememberToken(); //記住我 金鑰
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
