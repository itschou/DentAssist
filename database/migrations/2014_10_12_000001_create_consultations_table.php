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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(DB::raw('CURRENT_DATE'));
            $table->string('type_consultation');
            $table->string('motif_consultation')->default('Aucun')->nullable();
            $table->string('prix_consultation');
            $table->string('prix_payé_consultation');
            $table->string('prix_reste_consultation')->default('0')->nullable();
            $table->string('procedures_effectué')->default('Aucun')->nullable();
            $table->string('prescription')->default('Aucun')->nullable();
            $table->string('observation')->default('Aucun')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
