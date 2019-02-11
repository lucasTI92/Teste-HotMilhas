<?php
	function EquacaoSegundoGrau($floatCoefA, $floatCoefB, $floatCoefC) {
		$floatDelta = pow($floatCoefB, 2) - (4 * $floatCoefA * $floatCoefC);
		
		if ($floatDelta < 0){
			return ('Não possui raiz real, pois delta é menor que 0');
		}
		else if ($floatDelta == 0){
			$floatRaiz =  (- $floatCoefB) / (2 * $floatCoefA);
			return ('A raiz da equação é '.$floatRaiz);
		}
		else{
			$floatRaizPos = ((- $floatCoefB) + sqrt($floatDelta)) / (2 * $floatCoefA);
			$floatRaizNeg = ((- $floatCoefB) - sqrt($floatDelta)) / (2 * $floatCoefA);
			return ('As raizes da equação são '.$floatRaizPos.' e '.$floatRaizNeg);
		}
	}
	
	$param0 = $_REQUEST['param0'];
	$param1 = $_REQUEST['param1'];
	$param2 = $_REQUEST['param2'];
	
	echo (EquacaoSegundoGrau($param0, $param1, $param2));
?>