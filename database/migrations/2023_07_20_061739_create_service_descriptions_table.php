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
        Schema::create('service_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->unique();
            $table->integer('order_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_descriptions');
    }
};
