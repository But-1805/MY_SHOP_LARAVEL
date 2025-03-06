<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();  // Số điện thoại
            $table->string('address')->nullable();  // Địa chỉ
            $table->string('avatar')->nullable();  // Ảnh đại diện
            $table->enum('role', ['admin', 'customer'])->default('customer'); // Phân quyền
            $table->integer('loyalty_points')->default(0); // Điểm tích lũy
            $table->boolean('is_active')->default(true); // Trạng thái tài khoản
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
