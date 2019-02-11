<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class veiculoAcessorio extends Model
{
	protected $fillable = [
		'Nome', 'id_Veiculo'
	];
	
	public function search($idVeiculo){
		$retorno = $this->where('id_Veiculo', '='.$idVeiculo)
		->toSql();
		//->get()
		dd($retorno);
		
		return ($retorno);
	}
}
