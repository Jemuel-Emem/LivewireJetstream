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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('item_image')->nullable();
            $table->string('user_name');
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->string('product_name');
            $table->string('item_price');
            $table->string('total_fee');
            $table->string('item_quantity');
            $table->string('item_stocks');
            $table->string('status')->default("In progress");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
