<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('Marca');
			$table->string('Modelo');
			$table->string('Cidade');
			$table->enum('TipoVeiculo', ['C', 'A', 'M']);
			$table->double('Preco', 10, 2);
			$table->string('AnoModelo');
			$table->integer('Kilometragem');
			$table->string('Combustivel');
			$table->integer('Portas');
			$table->string('Cor');
			$table->string('Placa');
			$table->enum('AceitaTroca', ['S', 'N']);
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
        Schema::dropIfExists('veiculos');
    }
}
