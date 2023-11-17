<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('materia');
            $table->integer('h_semanales');
            $table->integer('h_totales');
            $table->string('aula');

            // Claves foráneas
            $table->foreignId('user_id')->constrained(); // Para user_id
            $table->foreignId('especialidad_id')->constrained(); // Para especialidad_id
            $table->foreignId('estudio_id')->constrained(); // Para estudio_id

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
