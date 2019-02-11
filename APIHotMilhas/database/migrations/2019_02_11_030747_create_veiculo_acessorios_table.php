<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculoAcessoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo_acessorios', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('id_Veiculo')->unsigned();
			$table->foreign('id_Veiculo')->references('id')->on('veiculos')->onDelete('cascade')->onUpdate('cascade');
			$table->string('Nome');
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
        Schema::dropIfExists('veiculo_acessorios');
    }
}
