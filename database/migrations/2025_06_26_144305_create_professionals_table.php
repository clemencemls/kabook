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
        Schema::create('professionals', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // Informations personnelles
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');

            // Informations professionnelles
            $table->string('slug')->unique();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable(); // Rue + numéro
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('region')->nullable();
            $table->boolean('is_mobile')->default(false); // pour savoir si il se déplace
            $table->string('profile_picture')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('siret')->nullable();
            $table->text('description')->nullable();
            $table->text('price')->nullable();
            $table->text('education_background')->nullable();
            $table->text('experience_background')->nullable();
            $table->boolean('is_validated')->default(false);
            $table->timestamps();

            // Bonus à prévoir si j'ai le temps
            // Champs pour latitude / longitude si je veux la géolocalisation
            // $table->decimal('latitude', 10, 7)->nullable(); $table->decimal('longitude', 10, 7)->nullable();
            // email_verified_at si je veux mettre en place une vérification d’email
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionals');
    }
};
