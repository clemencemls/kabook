<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animal_category_professional', function (Blueprint $table) {
            $table->uuid('professional_id');
            $table->uuid('animal_category_id');

            $table->foreign('professional_id')->references('id')->on('professionals')->onDelete('cascade');
            $table->foreign('animal_category_id')->references('id')->on('animal_categories')->onDelete('cascade');

            $table->primary(['professional_id', 'animal_category_id']); // Clé primaire composite

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_category_professional');
    }
};
