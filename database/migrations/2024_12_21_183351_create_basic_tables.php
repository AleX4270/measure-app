<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('symbol', 32);
            $table->string('name', 64);
            $table->tinyInteger('is_active');
        });

        Schema::create('measurement_categories', function(Blueprint $table) {
            $table->id();
            $table->string('symbol', 32);
            $table->tinyInteger('is_active');
            $table->timestamps();
        });

        Schema::create('measurement_category_translations', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('measurement_category_id');
            $table->unsignedBigInteger('language_id');
            $table->string('name', 255);
            $table->string('remarks', 255);
            $table->timestamps();

            $table->foreign('measurement_category_id', 'mc_translations_category_fk')->references('id')->on('measurement_categories');
            $table->foreign('language_id')->references('id')->on('languages');
        });

        Schema::create('measurement_units', function(Blueprint $table) {
            $table->id();
            $table->string('symbol', 32);
            $table->string('short_symbol', 32);
            $table->tinyInteger('is_active');
            $table->timestamps();
        });

        Schema::create('measurements', function(Blueprint $table) {
            $table->id();
            $table->decimal('value');
            $table->unsignedBigInteger('measurement_category_id');
            $table->unsignedBigInteger('measurement_unit_id');
            $table->tinyInteger('is_active');
            $table->timestamps();

            $table->foreign('measurement_category_id', 'mc_measurements_category_fk')->references('id')->on('measurement_categories');
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units');
        });

        Schema::create('measurement_translations', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('measurement_id');
            $table->unsignedBigInteger('language_id');
            $table->string('remarks', 255);
            $table->timestamps();

            $table->foreign('measurement_id')->references('id')->on('measurements');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('measurement_translations');
        Schema::dropIfExists('measurements');
        Schema::dropIfExists('measurement_units');
        Schema::dropIfExists('measurement_category_translations');
        Schema::dropIfExists('measurement_categories');
        Schema::dropIfExists('languages');
    }
};
