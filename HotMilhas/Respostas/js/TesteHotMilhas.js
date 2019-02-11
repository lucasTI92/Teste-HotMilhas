function EnviarResposta (questao, idObjFinal, params){
	var urlCompleta = 'func/' + questao + '.php';
	
	for(i = 0; i < params.length; i ++){
		if (i == 0){
			urlCompleta += '?';
		}
		else{
			urlCompleta += '&';
		}
		
		urlCompleta += 'param' + i + '=' + $('#' + params[i]).val();
	}
	
	$.ajax({
		url: urlCompleta,
		async: false,
		complete: function (response) {
			//alert(response.responseText);
			$('#' + idObjFinal).html(response.responseText);
		},
		error: function (err) {
			alert('Erro');
		}
	}); 
}

 