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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id('id_matricula');
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_profesor')->nullable();
            $table->unsignedBigInteger('id_horario')->nullable();
            $table->string('semestre');
            $table->date('fecha_matricula');
            $table->decimal('nota_final', 5, 2)->nullable();
            $table->enum('estado', ['aprobado', 'reprobado', 'cursando'])->default('cursando');
            $table->timestamps();
            
            $table->foreign('id_alumno')->references('id_alumno')->on('alumnos')->onDelete('cascade');
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id_profesor')->on('profesores')->onDelete('set null');
            $table->foreign('id_horario')->references('id_horario')->on('horarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
