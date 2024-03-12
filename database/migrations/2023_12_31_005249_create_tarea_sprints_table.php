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
        Schema::create('tarea_sprints', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->string('responsable');
            $table->integer('estimacion');
            $table->enum('estado',  ['pendiente', 'finalizado'])->default('pendiente');
            $table->unsignedBigInteger('sprint_backlog_id');
            
            $table->foreign('sprint_backlog_id')->references('id')->on('sprint_backlogs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea_sprints');
    }
};
