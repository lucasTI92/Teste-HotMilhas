<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\veiculoAcessorio;

class veiculo extends Model
{
	protected $fillable = [
		'Marca', 'Modelo', 'Cidade', 'TipoVeiculo', 'Preco', 'AnoModelo', 'Kilometragem', 'Combustivel', 'Portas', 'Cor', 'Placa', 'AceitaTroca'
	];
	
	public function TipoVeiculo($TipoVeiculo = null){
		$TipoVeiculos = [
			'C' => 'Caminhão',
			'A' => 'Carro',
			'M' => 'Motocicleta'
		];
		
		if(!$TipoVeiculo){
			return ($TipoVeiculos);
		}
		
		return ($TipoVeiculos[$TipoVeiculo]);
	}
	
	public function AceitaTroca($AceitaTroca = null){
		$AceitaTrocas = [
			'S' => 'Sim',
			'N' => 'Não'
		];
		
		if(!$AceitaTroca){
			return ($AceitaTrocas);
		}
		
		return ($AceitaTrocas[$AceitaTroca]);
	}
	
	public function Acessorios(){
		$retorno = veiculoAcessorio::search($this->id_Veiculo);
		dd($retorno);
		return ($retorno);
	}
	
	public function search(Array $data){
		$retorno = $this->where(function($query) use ($data){
			if(isset($data['TipoVeiculo'])){
				$query->where('TipoVeiculo', '='.$data['TipoVeiculo']);
			}
			
			if(isset($data['Kilometragem'])){
				if ($data['Kilometragem'] > 0){
					$query->where('TipoVeiculo', '>0');
				}else{
					$query->where('TipoVeiculo', '=0');
				}
			}
			
			if(isset($data['Marca'])){
				$query->where('Marca', 'like %'.$data['Marca'].'%');
			}
			
			if(isset($data['Modelo'])){
				$query->where('Modelo', 'like %'.$data['Modelo'].'%');
			}
			
			if(isset($data['Cidade'])){
				$query->where('Cidade', 'like %'.$data['Cidade'].'%');
			}
			
			if(isset($data['PrecoMin'])){
				$query->where('PrecoMin', '>= '.$data['PrecoMin']);
			}
			
			if(isset($data['PrecoMax'])){
				$query->where('PrecoMax', '<= '.$data['PrecoMax']);
			}
			
			if(isset($data['AnoMin'])){
				$query->where('AnoMin', '>= '.$data['AnoMin']);
			}
			
			if(isset($data['AnoMax'])){
				$query->where('AnoMax', '>= '.$data['AnoMax']);
			}
			
		})
		->toSql();
		//->get()
		dd($retorno);
		
		return ($retorno);
	}
}
