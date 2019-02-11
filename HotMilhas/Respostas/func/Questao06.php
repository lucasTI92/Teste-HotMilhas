<?php	
	function ExisteNaVertical($ArrayTempSudoku, $IntX, $IntY, $IntValor){
		$Retorno = false;
		
		for ($i = 0; $i < $IntY; $i++){
			if($ArrayTempSudoku[$i][$IntX] == $IntValor){
				$Retorno = true;
				break;
			}
		}
		
		return ($Retorno);
	}
	
	function ExisteNaHorizontal($ArrayTempSudoku, $IntX, $IntY, $IntValor){
		for ($i = 0; $i < $IntX; $i++){
			if($ArrayTempSudoku[$IntY][$i] == $IntValor){
				return (true);
			}
		}
		
		return (false);
	}
	
	function Randomizar($arrayExcludeH, $arrayExcludeY){
		$arrayTemp = array( // 1,1
			0 => array(0,0,0), // y = 0
			1 => array(0,0,0), // y = 1
			2 => array(0,0,0), // y = 2
		);
		
		$arrayNumPossiveis = array (1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9);
		$arrayTestados = array();
			
		for ($intY = 0; $intY < count($arrayTemp); $intY++){
			if (!empty($arrayExcludeH)){
				$arrayNumPossiveis = array (1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9);
				$arrayTestados = array();
				$arrayNumPossiveis = array_diff($arrayNumPossiveis, $arrayExcludeH[$intY]);
			}
			
			for ($intX = 0; $intX < count($arrayTemp[$intY]); $intX++){
				if (!empty($arrayExcludeY)){
					$arrayNumPossiveis = array (1=>1, 2=>2, 3=>3, 4=>4, 5=>5, 6=>6, 7=>7, 8=>8, 9=>9);
					
					if (!empty($arrayExcludeH)){
						$arrayNumPossiveis = array_diff($arrayNumPossiveis, $arrayExcludeH[$intY]);
					}
					
					$arrayNumPossiveis = array_diff($arrayNumPossiveis, [$arrayExcludeY[0][$intX], $arrayExcludeY[1][$intX], $arrayExcludeY[2][$intX]]);
				}
				
				$arrayRandom = array_diff($arrayNumPossiveis, $arrayTestados);
				$arrayRandom = array_filter($arrayRandom);
				$intValor = array_rand($arrayRandom, 1);
				$arrayTemp[$intY][$intX] = $intValor;
				$arrayTestados[] = $intValor;
			}
		}
			
		return ($arrayTemp);
	}
	
	function ModoDificil(){		
		//primeira linha
		$arraySudoku1 = Randomizar(array(), array());
		$arraySudoku2 = Randomizar($arraySudoku1, array());
		$arrayAux1 = array(
			0 => array_merge($arraySudoku1[0], $arraySudoku2[0]),
			1 => array_merge($arraySudoku1[1], $arraySudoku2[1]),
			2 => array_merge($arraySudoku1[2], $arraySudoku2[2])
		);
		$arraySudoku3 = Randomizar($arrayAux1, array());
		
		//segunda linha
		$arraySudoku4 = Randomizar(array(), $arraySudoku1);
		$arraySudoku5 = Randomizar($arraySudoku4, $arraySudoku2);
		$arrayAux3 = array(
			0 => array_merge($arraySudoku4[0], $arraySudoku5[0]),
			1 => array_merge($arraySudoku4[1], $arraySudoku5[1]),
			2 => array_merge($arraySudoku4[2], $arraySudoku5[2])
		);
		$arraySudoku6 = Randomizar($arrayAux3, $arraySudoku3);
		
		//terceira linha
		$arrayAux4 = array_merge($arraySudoku1, $arraySudoku4);
		$arrayAux5 = array_merge($arraySudoku2, $arraySudoku5);
		$arrayAux6 = array_merge($arraySudoku3, $arraySudoku6);
		
		$arraySudoku8 = Randomizar(array(), $arrayAux4);
		$arraySudoku7 = Randomizar($arraySudoku8, $arrayAux5);
		
		$arrayAux7 = array(
			0 => array_merge($arraySudoku7[0], $arraySudoku8[0]),
			1 => array_merge($arraySudoku7[1], $arraySudoku8[1]),
			2 => array_merge($arraySudoku7[2], $arraySudoku8[2])
		);
		
		$arraySudoku9 = Randomizar($arrayAux7, $arrayAux6);
		
		
		$arrayLinha2 = array(
			array_merge($arrayAux3[0], $arraySudoku6[0]),
			array_merge($arrayAux3[1], $arraySudoku6[1]),
			array_merge($arrayAux3[2], $arraySudoku6[2])
		);
		
		$arrayLinha3 = array(
			array_merge($arrayAux7[0], $arraySudoku9[0]),
			array_merge($arrayAux7[1], $arraySudoku9[1]),
			array_merge($arrayAux7[2], $arraySudoku9[2])
		);
		
		$arraySudoku = array(
			array($arraySudoku1[0][0],$arraySudoku1[0][1],$arraySudoku1[0][2], $arraySudoku2[0][0],$arraySudoku2[0][1],$arraySudoku2[0][2], $arraySudoku3[0][0],$arraySudoku3[0][1],$arraySudoku3[0][2]),
			array($arraySudoku1[1][0],$arraySudoku1[1][1],$arraySudoku1[1][2], $arraySudoku2[1][0],$arraySudoku2[1][1],$arraySudoku2[1][2], $arraySudoku3[1][0],$arraySudoku3[1][1],$arraySudoku3[1][2]),
			array($arraySudoku1[2][0],$arraySudoku1[2][1],$arraySudoku1[2][2], $arraySudoku2[2][0],$arraySudoku2[2][1],$arraySudoku2[2][2], $arraySudoku3[2][0],$arraySudoku3[2][1],$arraySudoku3[2][2]),
			array($arraySudoku4[0][0],$arraySudoku4[0][1],$arraySudoku4[0][2], $arraySudoku5[0][0],$arraySudoku5[0][1],$arraySudoku5[0][2], $arraySudoku6[0][0],$arraySudoku6[0][1],$arraySudoku6[0][2]),
			array($arraySudoku4[1][0],$arraySudoku4[1][1],$arraySudoku4[1][2], $arraySudoku5[1][0],$arraySudoku5[1][1],$arraySudoku5[1][2], $arraySudoku6[1][0],$arraySudoku6[1][1],$arraySudoku6[1][2]),
			array($arraySudoku4[2][0],$arraySudoku4[2][1],$arraySudoku4[2][2], $arraySudoku5[2][0],$arraySudoku5[2][1],$arraySudoku5[2][2], $arraySudoku6[2][0],$arraySudoku6[1][1],$arraySudoku6[2][2]),
			array($arraySudoku7[0][0],$arraySudoku7[0][1],$arraySudoku7[0][2], $arraySudoku8[0][0],$arraySudoku8[0][1],$arraySudoku8[0][2], $arraySudoku9[0][0],$arraySudoku9[0][1],$arraySudoku9[0][2]),
			array($arraySudoku7[1][0],$arraySudoku7[1][1],$arraySudoku7[1][2], $arraySudoku8[1][0],$arraySudoku8[1][1],$arraySudoku8[1][2], $arraySudoku9[1][0],$arraySudoku9[1][1],$arraySudoku9[1][2]),
			array($arraySudoku7[2][0],$arraySudoku7[2][1],$arraySudoku7[2][2], $arraySudoku8[2][0],$arraySudoku8[2][1],$arraySudoku8[2][2], $arraySudoku9[2][0],$arraySudoku9[2][1],$arraySudoku9[2][2])
		);
		return ($arraySudoku);
	}
	
	function ModoFacil(){
		$intInicio = rand(1,9);
		
		$arraySudoku = array(
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0,0)
		);
		
		for($intY = 0; $intY < count($arraySudoku); $intY++){
			$valor = $intInicio;
			
			for($intX = 0; $intX < count($arraySudoku[$intY]); $intX++){
				$arraySudoku[$intY][$intX] = $valor;
				
				$valor = $valor + 4;
				
				if($valor > 9){
					$valor = $valor % 9;
				}
				/*
				if($intX == 2){
					$intInicio = $valor + 2;
				}*/
			}
			$intInicio = $intInicio + 3;
			//$intInicio++;
			if($intInicio > 9){
				$intInicio = 1;
			}
		}
		
		return ($arraySudoku);
	}
	
	$arraySudoku = ModoFacil();
	/*
	echo('<pre>');
	print_r($arraySudoku1);
	print_r($arraySudoku2);
	print_r($arraySudoku3);
	print_r($arraySudoku4);
	print_r($arraySudoku5);
	print_r($arraySudoku6);
	print_r($arraySudoku7);
	print_r($arraySudoku8);
	print_r($arraySudoku9);
	exit();
	*/
	echo('<br>-------------------------------<br>');
	echo('| '.$arraySudoku[0][0].' | '.$arraySudoku[0][1].' | '.$arraySudoku[0][2].' | '.$arraySudoku[0][3].' | '.$arraySudoku[0][4].' | '.$arraySudoku[0][5].' | '.$arraySudoku[0][6].' | '.$arraySudoku[0][7].' | '.$arraySudoku[0][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[1][0].' | '.$arraySudoku[1][1].' | '.$arraySudoku[1][2].' | '.$arraySudoku[1][3].' | '.$arraySudoku[1][4].' | '.$arraySudoku[1][5].' | '.$arraySudoku[1][6].' | '.$arraySudoku[1][7].' | '.$arraySudoku[1][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[2][0].' | '.$arraySudoku[2][1].' | '.$arraySudoku[2][2].' | '.$arraySudoku[2][3].' | '.$arraySudoku[2][4].' | '.$arraySudoku[2][5].' | '.$arraySudoku[2][6].' | '.$arraySudoku[2][7].' | '.$arraySudoku[2][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[3][0].' | '.$arraySudoku[3][1].' | '.$arraySudoku[3][2].' | '.$arraySudoku[3][3].' | '.$arraySudoku[3][4].' | '.$arraySudoku[3][5].' | '.$arraySudoku[3][6].' | '.$arraySudoku[3][7].' | '.$arraySudoku[3][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[4][0].' | '.$arraySudoku[4][1].' | '.$arraySudoku[4][2].' | '.$arraySudoku[4][3].' | '.$arraySudoku[4][4].' | '.$arraySudoku[4][5].' | '.$arraySudoku[4][6].' | '.$arraySudoku[4][7].' | '.$arraySudoku[4][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[5][0].' | '.$arraySudoku[5][1].' | '.$arraySudoku[5][2].' | '.$arraySudoku[5][3].' | '.$arraySudoku[5][4].' | '.$arraySudoku[5][5].' | '.$arraySudoku[5][6].' | '.$arraySudoku[5][7].' | '.$arraySudoku[5][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[6][0].' | '.$arraySudoku[6][1].' | '.$arraySudoku[6][2].' | '.$arraySudoku[6][3].' | '.$arraySudoku[6][4].' | '.$arraySudoku[6][5].' | '.$arraySudoku[6][6].' | '.$arraySudoku[6][7].' | '.$arraySudoku[6][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[7][0].' | '.$arraySudoku[7][1].' | '.$arraySudoku[7][2].' | '.$arraySudoku[7][3].' | '.$arraySudoku[7][4].' | '.$arraySudoku[7][5].' | '.$arraySudoku[7][6].' | '.$arraySudoku[7][7].' | '.$arraySudoku[7][8].' |<br>');
	echo('-------------------------------<br>');
	echo('| '.$arraySudoku[8][0].' | '.$arraySudoku[8][1].' | '.$arraySudoku[8][2].' | '.$arraySudoku[8][3].' | '.$arraySudoku[8][4].' | '.$arraySudoku[8][5].' | '.$arraySudoku[8][6].' | '.$arraySudoku[8][7].' | '.$arraySudoku[8][8].' |<br>');
?>