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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('Date_de_naissance');
            $table->string('telephone')->default('Non renseigné')->nullable();
            $table->string('adresse')->default('Non renseigné')->nullable();
            $table->string('role')->default('client');
            $table->string('genre');
            $table->text('maladies')->default('Non renseigné')->nullable();
            $table->string('informations_suplementaires')->nullable()->default('Aucune');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
