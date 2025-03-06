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
        Schema::create('loyalty_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Người sở hữu điểm
            $table->integer('points')->default(0); // Số điểm hiện có
            $table->decimal('points_to_money', 10, 2)->default(0.00); // Số tiền quy đổi từ điểm
            $table->enum('status', ['pending', 'approved', 'used', 'expired'])->default('pending'); // Trạng thái điểm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loyalty_points');
    }
};
