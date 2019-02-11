<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<link rel="author" href="../../humans.txt" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<title>Respostas para as questões</title>
	<head>
	<body>
		<div id="divCabecalho" class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm fixed-top">
			<h5 id="h5Titulo" class="my-0 mr-md-auto font-weight-normal">Respostas</h5>
			<nav id="navMenuPrincipal" class="my-2 my-md-0 mr-md-0">
				<a id="aQuestao01" class="p-2 text-dark" href="#divResposta01">Questão 01</a>
				<a id="aQuestao02" class="p-2 text-dark" href="#divResposta02">Questão 02</a>
				<a id="aQuestao03" class="p-2 text-dark" href="#divResposta03">Questão 03</a>
				<a id="aQuestao04" class="p-2 text-dark" href="#divResposta04">Questão 04</a>
				<a id="aQuestao05" class="p-2 text-dark" href="#divResposta05">Questão 05</a>
				<a id="aQuestao06" class="p-2 text-dark" href="#divResposta06">Questão 06</a>
				<a id="aQuestao07" class="p-2 text-dark" href="#divResposta07">Questão 07</a>
			</nav>
		</div>
		
		<div id="divCorpo" class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column mt-5">
			<h4 id="h4Questão01">Questão 01</h4>
			<div id="divResposta01" class="p-2 row">				
				<div id="divEntrada01" class="column col-md-4">
					<div id="divCoefA" class="input-group mb-3">
						<div id="divAddCoefA" class="input-group-prepend">
							<span id="spanAddCoefA" class="input-group-text">0.00</span>
						</div>
						<input id="inputCoefA" class="form-control" type="number" placeholder="Digite o valor de A na equação" >
					</div>
					<div id="divCoefB" class="input-group mb-3">
						<div id="divAddCoefB" class="input-group-prepend">
							<span id="spanAddCoefB" class="input-group-text">0.00</span>
						</div>
						<input id="inputCoefB" class="form-control" type="number" placeholder="Digite o valor de B na equação" >
					</div>
					<div id="divCoefC" class="input-group mb-3">
						<div id="divAddCoefC" class="input-group-prepend">
							<span id="spanAddCoefC" class="input-group-text">0.00</span>
						</div>
						<input id="inputCoefC" class="form-control" type="number" placeholder="Digite o valor de C na equação" >
					</div>
				</div>
				
				<div id="divCalculo01" class="column col-md-4 align-items-center">
					<button id="buttonCalcular01" class="form-control col-md-10 m-auto btn-primary" onClick="EnviarResposta('Questao01', 'spanResposta01', ['inputCoefA', 'inputCoefB', 'inputCoefC'])">Calcular</button>
				</div>
				
				<div id="divSaida01" class="column col-md-4">
					<span id="spanTituloResposta01">Resposta: </span>
					<span id="spanResposta01"></span>
				</div>
			</div>
			<div id="divResposta02">
				<h4 id="h4Questão02">Questão 02</h4>
				<div id="divResposta02" class="p-2 row">						
					<div id="divCalculo02" class="column col-md-4 align-items-center">
						<button id="buttonCalcular02" class="form-control col-md-10 m-auto btn-primary" onClick="EnviarResposta('Questao02', 'spanResposta02', [])">Exibir Resposta</button>
					</div>
					
					<div id="divSaida02" class="column col-md-8">
						<span id="spanTituloResposta02">Resposta: </span>
						<span id="spanResposta02"></span>
					</div>
				</div>
			</div>
			<div id="divResposta03" >	
				<?php include('func/Questao03.php'); ?>	
				<h4 id="h4Questão03">Questão 03</h4>
				<div id="divResposta03" class="p-2 row">	
					<form id="formEstacionamento" action="func/Questao03.php" class="column col-md-4 align-items-center">
						<button id="buttonRandomEstac" class="form-control col-md-10 m-auto btn-primary" onClick="">Randomizar Estacionamento</button>
					</form>
					
					<form id="formVeiculo" action="func/Questao03.php" class="column col-md-4 align-items-center">	
						<div id="divResposta03" class="row">	
							<button id="buttonRandomVeic" class="form-control col-md-5 m-auto btn-primary" onClick="">Randomizar Carro</button>
							<button id="buttonRandomVeic" class="form-control col-md-5 m-auto btn-primary" onClick="">Randomizar Moto</button>
						</div>
					</form>
					
					<form id="formMovimentacao" action="func/Questao03.php" class="column col-md-4 align-items-center">
						<button id="buttonRandomEstac" class="form-control col-md-10 m-auto btn-primary" onClick="">Estacionar Veiculo</button>
					</form>
				</div>				
			</div>
			<div id="divResposta04">
				<h4 id="h4Questão04">Questão 04</h4>
				<div id="divResposta04" class="p-2 row">						
					<div id="divCalculo04" class="column col-md-4 align-items-center">
						<button id="buttonCalcular04" class="form-control col-md-10 m-auto btn-primary" onClick="EnviarResposta('Questao04', 'spanResposta04', [])">Exibir Resposta</button>
					</div>
					
					<div id="divSaida04" class="column col-md-8">
						<span id="spanTituloResposta04">Resposta: </span>
						<span id="spanResposta04"></span>
					</div>
				</div>			
			</div>
			<div id="divResposta05">
				<h4 id="h4Questão05">Questão 05</h4>
				<div id="divResposta05" class="p-2 row">						
					<div id="divCalculo05" class="column col-md-4 align-items-center">
						<button id="buttonCalcular05" class="form-control col-md-10 m-auto btn-primary" onClick="EnviarResposta('Questao05', 'spanResposta05', [])">Exibir Resposta</button>
					</div>
					
					<div id="divSaida05" class="column col-md-8">
						<span id="spanTituloResposta05">Resposta: </span>
						<span id="spanResposta05"></span>
					</div>
				</div>						
			</div>
			<div id="divResposta06">

				<h4 id="h4Questão06">Questão 06</h4>		
				<div id="divResposta06" class="p-2 row">						
					<div id="divCalculo06" class="column col-md-4 align-items-center">
						<button id="buttonCalcular06" class="form-control col-md-10 m-auto btn-primary" onClick="EnviarResposta('Questao06', 'spanResposta06', [])">Randomizar Sudoku</button>
					</div>
					
					<div id="divSaida06" class="column col-md-8">
						<span id="spanTituloResposta06">Resposta: </span>
						<span id="spanResposta06"></span>
					</div>
				</div>			
			</div>
			<div id="divResposta07">
				<?php include('func/Questao07.php'); ?>		

				<h4 id="h4Questão07">Questão 07</h4>	
				<div id="divResposta07" class="p-2 row">						
					<div id="divCalculo07" class="column col-md-4 align-items-center">
						<form target="_blank" action='http://localhost/APIHotMilhas/public/api/Crawler'>
							<button id="buttonCrawler07" class="form-control col-md-10 m-auto btn-primary" type="subimt">Popular com crawler</button>
						</form>
						
						<form target="_blank" action='http://localhost/APIHotMilhas/public/api/veiculos'>
							<button id="buttonTodos07" class="form-control col-md-10 m-auto btn-primary" type="subimt">Todos os Veiculos</button>
						</form>
						
						<form target="_blank" action='http://localhost/APIHotMilhas/public/api/veiculos/search'>
							<button id="buttonBuscar07" class="form-control col-md-10 m-auto btn-primary" type="subimt">Buscar em Veiculos</button>
						</form>
						
						<form target="_blank" action='http://localhost/APIHotMilhas/public/api/veiculos/search'>
							<button id="buttonBuscar07" class="form-control col-md-10 m-auto btn-primary" type="subimt">Buscar em Veiculos</button>
						</form>
					</div>
					
					<div id="divSaida07" class="column col-md-8">
						<span id="spanTituloResposta07">Resposta: </span>
						<span id="spanResposta07"></span>
					</div>
				</div>					
			</div>
			
			<footer id="footerRodape" class="mastfoot mt-auto">
				<div id="divAssinatura" class="inner">
					<p id="pAutor text-center">Feito por Lucas França Barbosa.</p>
				</div>
			</footer>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script src="js/TesteHotMilhas.js"></script>
	</body>
</html>