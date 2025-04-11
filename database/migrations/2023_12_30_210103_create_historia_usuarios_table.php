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
        Schema::create('historia_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('prioridad');
            $table->string('programador');
            $table->text('como');
            $table->text('quiero');
            $table->text('para');
            $table->text('descripcion');
            $table->text('observaciones');
            $table->text('criterioaceptacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historia_usuarios');
    }
};
