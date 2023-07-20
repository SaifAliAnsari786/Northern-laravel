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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->longText('background_image_description');
            $table->string('title');
            $table->longText('description');
            $table->enum('description_image_position',['1','2'])->default('1');
            $table->enum('form',['1','2'])->default('2');
            $table->longText('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_keyword_description')->nullable();
            $table->integer('order_by');
            $table->string('service_description_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};