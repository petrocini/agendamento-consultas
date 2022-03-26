<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMedico');
            $table->unsignedBigInteger('idPaciente');
            $table->foreign('idMedico')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idPaciente')->references('id')->on('pacientes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->date('dataMarcada');
            $table->time('horaMarcada');
            $table->boolean('concluida')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
