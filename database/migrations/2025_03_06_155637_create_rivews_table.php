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
        Schema::create('rivews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Người đánh giá
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Sản phẩm được đánh giá
            $table->tinyInteger('rating')->default(5); // Điểm đánh giá (1 - 5)
            $table->text('comment')->nullable(); // Nội dung đánh giá
            $table->boolean('is_approved')->default(false); // Kiểm duyệt bình luận
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rivews');
    }
};
