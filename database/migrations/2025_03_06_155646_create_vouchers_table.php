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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Mã giảm giá
            $table->enum('type', ['fixed', 'percent'])->default('percent'); // Loại giảm giá: số tiền hoặc %
            $table->decimal('discount_value', 10, 2); // Giá trị giảm
            $table->integer('quantity')->default(0); // Số lượng còn lại
            $table->dateTime('expires_at'); // Ngày hết hạn
            $table->boolean('is_active')->default(true); // Trạng thái voucher
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
