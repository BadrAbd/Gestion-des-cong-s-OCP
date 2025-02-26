<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('demande_conges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->binary('signature_image')->nullable();
            $table->string('interim')->nullable();
            $table->enum('status', ['En attente', 'Approuvé', 'Refusé'])->default('En attente');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demande_conges');
    }
};
