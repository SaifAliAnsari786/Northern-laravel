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
            $table->string('logo')->nullable();
            $table->string('logo_image_alt')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('background_title')->nullable();
            $table->string('background_image')->nullable();
            $table->string('background_image_alt')->nullable();
            $table->longText('background_image_description')->nullable();
            $table->longText('service_image')->nullable();
            $table->longText('service_image_description')->nullable();
            $table->longText('service_image_alt')->nullable();
            $table->enum('description_image_position',['1','2'])->default('1');
            $table->enum('form',['1','2'])->default('2');
            $table->longText('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_keyword_description')->nullable();
            $table->string('slug')->unique();
            $table->enum('status', ['1','2'])->default(1);
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
