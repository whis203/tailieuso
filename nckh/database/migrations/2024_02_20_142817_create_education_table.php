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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('donvi', 50);
            $table->string('mahp', 10);
            $table->string('tenhp', 50);
            $table->string('tenvt', 10);
            $table->string('main', 10);
            $table->string('mota', 1000);
            $table->string('sotinchi', 5);
            $table->string('muctieu', 2000);
            $table->string('khoa_id', 10);
            $table->timestamps();
        });
    }
    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
