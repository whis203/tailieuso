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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name', 50);
            $table->string('product_detail', 10000);
            $table->string('product_img', 300)->nullable();
            $table->string('product_file', 255)->nullable();
            $table->string('totalstar', 255)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('education_id')->nullable();;
            $table->string('tacgia', 50)->nullable();;
            $table->string('category', 100)->nullable();
            $table->integer('views')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
