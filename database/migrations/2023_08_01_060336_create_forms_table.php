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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->enum('participant_fund', ['yes','no']);
            $table->string('enquirer_name');
            $table->string('phone_no');
            $table->string('email');
            $table->string('participant_name');
            $table->string('participant_age');
            $table->enum('participant_gender', ['male','female','other']);
            $table->string('participant_disability_type');
            $table->string('participant_suburb');
            $table->string('postcode');
            $table->enum('state', ['qld','nsw','sa','act','vic']);
            $table->enum('heard', ['family','friends','ndis','google','facebook','other']);
            $table->string('core_support');
            $table->string('capacity_building_supports');
            $table->string('coordination');
            $table->string('plan_management');
            $table->longText('message');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
