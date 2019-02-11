<?php
	echo('Em Javascript a comparação de valores não é limitada pelo tipo da variável, ou seja, é possível comparar uma string com inteiro por exemplo.<br>');
	echo('Então utilizando "==" você ignora o tipo da variável na comparação.<br>');
	echo('Já utilizando "===" você não ignora o tipo da variável, retornando "false" em caso de tipos diferentes.<br>');
	echo('A função abaixo pode ser utilizada para ver a diferença.<br>');
	echo('function Questao02 (param0, param1) {<br>');
	echo('&nbsp&nbsp var Resposta = "";<br>');
	echo('&nbsp&nbsp if(param0 == param1) {<br>');	
	echo('&nbsp&nbsp&nbsp&nbsp Resposta += "Para a comparação com \'==\' os valores são iguais.";<br>');	
	echo('&nbsp&nbsp }<br>');	
	echo('&nbsp&nbsp else {<br>');	
	echo('&nbsp&nbsp&nbsp&nbsp Resposta += "Para a comparação com \'==\' os valores são diferentes.";<br>');	
	echo('&nbsp&nbsp }<br>');	
	echo('&nbsp&nbsp if(param0 === param1) {<br>');	
	echo('&nbsp&nbsp&nbsp&nbsp Resposta += " Para a comparação com \'===\' os valores são iguais.";<br>');	
	echo('&nbsp&nbsp }<br>');	
	echo('&nbsp&nbsp else {<br>');	
	echo('&nbsp&nbsp&nbsp&nbsp Resposta += " Para a comparação com \'===\' os valores são diferentes.";<br>');	
	echo('&nbsp&nbsp }<br>');	
	echo('&nbsp&nbsp return(Resposta);<br>');	
	echo('}<br>');	
	echo('Exemplo: <br>');
	echo('Questao02(5, "5") retornará "Para a comparação com \'==\' os valores são iguais. Para a comparação com \'===\' os valores são diferentes."');
?>