<?php
	class Veiculo {
		private $stringPlaca;
		private $stringCor;
		private $stringModelo;
		private $intAno;
		private $intTipo;
		private $dateTimeEntrada;
		
		function __construct($StringPlaca, $StringCor, $StringModelo, $IntAno){
			$this->stringPlaca = $StringPlaca;
			$this->stringCor = $StringCor;
			$this->stringModelo = $StringModelo;
			$this->intAno = $IntAno;
		}
		
		// Funções para bsucar valores
		function getPlaca(){
			return ($this->stringPlaca);
		}
		
		function getCor(){
			return ($this->stringCor);
		}
		
		function getModelo(){
			return ($this->stringModelo);
		}
		
		function getAno(){
			return ($this->intAno);
		}
		
		function getTipo(){
			return ($this->intTipo);
		}
		
		function getEntrada(){
			return ($this->dateTimeEntrada);
		}
		
		// Funções para setar valores
		function setPlaca($StringPlaca){
			$this->stringPlaca = $StringPlaca;
		}
		
		function setCor($StringCor){
			$this->stringCor = $StringCor;
		}
		
		function setModelo($StringModelo){
			$this->stringModelo = $StringModelo;
		}
		
		function setAno($IntAno){
			$this->intAno = $IntAno;
		}
		
		function setTipo($IntTipo){
			$this->intTipo = $IntTipo;
		}
		
		function setEntrada($DateTimeEntrada){
			$this->dateTimeEntrada = $DateTimeEntrada;
		}
	}
	
	class Carro extends Veiculo {
		private $boolIsPickup;
		
		function __construct($StringPlaca, $StringCor, $StringModelo, $IntAno){
			parent::__construct($StringPlaca, $StringCor, $StringModelo, $IntAno);
			$this->setTipo(0);	
			$this->boolIsPickup = false;
		}
		
		// Funções para bsucar valores
		function getIsPickup(){
			return ($this->boolIsPickup);
		}
		
		// Funções para setar valores
		function setIsPickup($BoolIsPickup){
			$this->boolIsPickup = $BoolIsPickup;
		}
	}
	
	class Moto extends Veiculo {
		private $boolIsTriciculo;
		
		function __construct($StringPlaca, $StringCor, $StringModelo, $IntAno){
			parent::__construct($StringPlaca, $StringCor, $StringModelo, $IntAno);
			$this->setTipo(1);			
			$this->boolIsTriciculo = false;
		}
		
		// Funções para bsucar valores
		function getIsTriciculo(){
			return ($this->boolIsTriciculo);
		}
		
		// Funções para setar valores
		function setIsTriciculo($BoolIsTriciculo){
			$this->boolIsTriciculo = $BoolIsTriciculo;
		}
	}
	
	class Estacionamento {
		private $stringNome;
		private $floatPrecoCarro;
		private $floatPrecoMoto;
		private $intVagasCarros;
		private $intVagasMotos;
		private $arrayCarros;
		private $arrayMotos;
		
		function __construct($StringNome, $FloatPrecoCarro, $FloatPrecoMoto, $IntVagasCarros, $IntVagasMotos) {
			$this->stringNome = $StringNome;
			$this->floatPrecoCarro = $FloatPrecoCarro;
			$this->floatPrecoMoto = $FloatPrecoMoto;
			$this->intVagasCarros = $IntVagasCarros;
			$this->intVagasMotos = $IntVagasMotos;
		}
		
		// Funções para bsucar valores
		function getNome(){
			return ($this->stringNome);
		}
		
		function getPrecoCarro(){
			return ($this->floatPrecoCarro);
		}
		
		function getPrecoMoto(){
			return ($this->floatPrecoMoto);
		}
		
		function getQtdCarros(){
			return ($this->intVagasCarros);
		}
		
		function getQtdMotos(){
			return ($this->intVagasMotos);
		}
		
		// Funções para setar valores
		function setNome($StringNome){
			$this->stringNome = $StringNome;
		}
		
		function setPrecoCarro($FloatPrecoCarro){
			$this->floatPrecoCarro = $FloatPrecoCarro;
		}
		
		function setPrecoMoto($FloatPrecoMoto){
			$this->floatPrecoMoto = $FloatPrecoMoto;
		}
		
		function setQtdCarros($IntVagasCarros){
			$this->intVagasCarros = $IntVagasCarros;
		}
		
		function setQtdMotos($IntVagasMotos){
			$this->intVagasMotos = $IntVagasMotos;
		}
		
		// Funções Utilitarias
		function CalcularValorFinal($ObjVeiculo, $DateTimeFinal){
			$dateTimeInicial = $ObjVeiculo->getEntrada();
			$diferenca = $dateTimeInicial->diff($DateTimeFinal);
			$minutos = (($diferenca->h + ($diferenca->days * 24)) * 60) + $diferenca->m;
			$total = ($minutos * $this->floatPrecoCarro) / 60;
			return (abs($total));
		}
		
		function EntrarVeiculo($ObjVeiculo, $DateTimeMomento){
			$alocado = false;
			
			if ($DateTimeMomento !== null){
				$ObjVeiculo->setEntrada($DateTimeMomento);
			}
			else{
				$ObjVeiculo->setEntrada(now());
			}
						
			if ($ObjVeiculo->getTipo() == 0){ // 0 = Carros
				for ($i = 0; $i < count($this->arrayCarros); $i++){
					if ($this->arrayCarros[$i] === null){
						$this->arrayCarros[$i] = $ObjVeiculo;
						$alocado = true;
						break;
					}
				}
			
				if((!$alocado) && (count($this->arrayCarros) < $this->intVagasCarros)){
					$this->arrayCarros[] = $ObjVeiculo;
					$alocado = true;
				}
			}
			else if ($ObjVeiculo->getTipo() == 1){ // 1 = Motos
				for ($i = 0; $i < count($this->arrayMotos); $i++){
					if ($this->arrayMotos[$i] === null){
						$this->arrayMotos[$i] = $ObjVeiculo;
						$alocado = true;
						break;
					}
				}
			
				if((!$alocado) && (count($this->arrayMotos) < $this->intVagasMotos)){
					$this->arrayMotos[] = $ObjVeiculo;
					$alocado = true;
				}
			}
			
			return ($alocado);
		}
		
		function SairVeiculo($IdVeiculo, $TipoVeiculo, $DateTimeMomento){
			$floatValorFinal = 0;
			$dateTimeMomento = now();
			
			if ($DateTimeMomento !== null){
				$dateTimeMomento = $DateTimeMomento;
			}
			
			if ($TipoVeiculo == 0){ // 0 = Carros
				if (($IdVeiculo > 0) && ($IdVeiculo < count($this->arrayCarros))){
					$floatValorFinal = CalcularValorFinal(($this->arrayCarros[$IdVeiculo]), $dateTimeMomento);
					$this->arrayCarros[$IdVeiculo] = null;
				}
			}
			else if ($TipoVeiculo == 1){ // 1 = Motos
				if (($IdVeiculo > 0) && ($IdVeiculo < count($this->arrayMotos))){
					$floatValorFinal = CalcularValorFinal($this->arrayMotos[$IdVeiculo], $dateTimeMomento);
					$this->arrayMotos[$IdVeiculo] = null;					
				}				
			}
			
			return ($floatValorFinal);
		}
	}
	
	// Funções par demonstração
	function RandomizarEstacionamento(){
		$floatPrecoMoto = rand(2, 8);
		$floatPrecoCarro = rand($floatPrecoMoto, 10);
		$intVagasCarros = rand(2, 10);
		$intVagasMotos = rand(2, 10);
		
		return (new Estacionamento('Estacionamento Teste', $floatPrecoCarro, $floatPrecoMoto, $intVagasCarros, $intVagasMotos));
	}
	
	function RandomizarVeiculo($IntTipo){
		$arrayCores = ['Preto', 'Branco', 'Prata', 'Vermelho'];
		$arrayModeloCarro = ['Fiat-Bravo', 'Chevrolet-Celta', 'Volkswagem-Gol', 'Renault-Sandero'];
		$arrayModeloMoto = ['Honda-Titan', 'Yamaha-Ybr', 'Shineray-Phoenix', 'BMW-F600'];
		$intPriLetraPlaca = rand(1, 26);
		$intSegLetraPlaca = rand(1, 26);
		$intTerLetraPlaca = rand(1, 26);
		$intPriNumeroPlaca = rand(0, 9);
		$intSegNumeroPlaca = rand(0, 9);
		$intTerNumeroPlaca = rand(0, 9);
		$intQuaNumeroPlaca = rand(0, 9);
		$intCor = rand(0, 3);
		$intModelo = rand(0, 3);
		$intAno = rand(2000, 2019);
		
		$stringPlaca = chr($intPriLetraPlaca).chr($intSegLetraPlaca).chr($intTerLetraPlaca)."-".$intPriNumeroPlaca.$intSegNumeroPlaca.$intTerNumeroPlaca.$intQuaNumeroPlaca;
		
		if($IntTipo == 0){// 0 = Carros
			return (new Carro($stringPlaca, $arrayCores[$intCor], $arrayModeloCarro[$intModelo], $intAno));
		}
		else if($IntTipo == 1){// 1 = Motos
			return (new Moto($stringPlaca, $arrayCores[$intCor], $arrayModeloMoto[$intModelo], $intAno));
		}
	}
	
	function EstacionarVeiculo($objEstacionamento, $objVeiculo){
		
	}
	
	function RetirarVeiculo($objEstacionamento, $objVeiculo){
		
	}
?>