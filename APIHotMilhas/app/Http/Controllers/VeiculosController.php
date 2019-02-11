<?php

namespace App\Http\Controllers;

use App\veiculo;
use App\veiculoAcessorio;
use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;

class VeiculosController extends Controller
{
	private $Veiculo;
	
	function __construct(){
		$Veiculo = new veiculo();
	}
	
	public function index(){
		$data = ['veiculos' => veiculo::all()];
		return (response()->json($data));
	}
	
	public function show($id){
		$veiculo = veiculo::find($id);
		
		if(!$veiculo){
			return (response()->json(['erro','veiculo não encontrado'], 404));
		}
			
		$data = ['veiculo' => $veiculo];		
		return (response()->json($data));
	}
	
	public function search(Request $request){
		$data = $request->all();
		$veiculos = $Veiculo->search($data);
		return (response()->json($data));
	}
	
	public function execCrawler(){
		$url = 'https://www.seminovosbh.com.br/';		
		$html = HtmlDomParser::file_get_html($url, false, null, 0);
		$iframesUrl = array();
		
		try{		
			set_time_limit(90000);
			
			try{
				foreach($html->find('div.#conteudoDestaqueParticular>iframe') as $iframe){
					$iframesUrl[] = $iframe->attr['src'];
				}
				
				foreach($iframesUrl as $iframeUrl){
					$urlFinal = $url.$iframeUrl;
					$iframeHtml = HtmlDomParser::file_get_html($urlFinal, false, null, 0);
					$linksUrl = array();
					
					foreach($iframeHtml->find('div.#dastaquesParticular>dl>dt>a') as $link){
						$linksUrl[] = $link->attr['href'];
					}
					
					foreach($linksUrl as $linkUrl){
						$urlVeiculo = $url.$linkUrl;
						$veiculoHtml = HtmlDomParser::file_get_html($urlVeiculo, false, null, 0);
						$veiculoInfo = $veiculoHtml->find('div#conteudoAcessorios > div#infDetalhes > span[itemprop="description"] li');
						$veiculoCidade = $veiculoHtml->find('div#conteudoAcessorios > div#infDetalhes4 > div.texto > ul > li');
						$veiculoPreco = $veiculoHtml->find('div#mostraVeiculo > div#conteudoVeiculo > div#textoBoxVeiculo > p');
						$veiculoTipo = $veiculoHtml->find('fieldset.boxveiculo > input[checked]');
						$veiculoMarca = $veiculoHtml->find('select#marca > option[selected]')[0];
						$veiculoModelo = $veiculoHtml->find('select#modelo > option[selected]')[0];
						
						if($veiculoTipo[0]->attr['id'] == 'carro'){
							$Tipo = 'A';
						}
						else if($veiculoTipo[0]->attr['id'] == 'moto'){
							$Tipo = 'M';
						}
						else if($veiculoTipo[0]->attr['id'] == 'caminhao'){
							$Tipo = 'C';
						}
						
						if(isset($veiculoInfo[6])){
							$Trocas = strpos($veiculoInfo[6]->plaintext, 'N') === false ? 'S' : 'N';
						}
						else{
							$Trocas = 'S';
						}
						
						$novoVeiculo = veiculo::create([
							'Marca' => $veiculoMarca->plaintext,
							'Modelo' => $veiculoModelo->plaintext,
							'Cidade' => str_replace('&nbsp; ', '', $veiculoCidade[1]->plaintext),
							'TipoVeiculo' => $Tipo,
							'Preco' => floatval(str_replace(',', '.', str_replace('.', '', str_replace('R$ ', '', $veiculoPreco[0]->plaintext)))),
							'AnoModelo' => $veiculoInfo[0]->plaintext,
							'Kilometragem' => str_replace('km', '', $veiculoInfo[1]->plaintext),
							'Combustivel' => $veiculoInfo[2]->plaintext,
							'Portas' => str_replace(' portas', '', $veiculoInfo[3]->plaintext),
							'Cor' => $veiculoInfo[4]->plaintext,
							'Placa' => $veiculoInfo[5]->plaintext,
							'AceitaTroca' => $Trocas	
						]);
										
						$veiculoAcessorios = $veiculoHtml->find('div#conteudoAcessorios > div#infDetalhes2 li');
						
						foreach($veiculoAcessorios as $veiculoAcessorio){
							$novoAcessorio = veiculoAcessorio::create([
								'id_Veiculo' => $novoVeiculo->id,
								'Nome' => $veiculoAcessorio->plaintext
							]);
						}
					}
				}
			}
			finally{
				set_time_limit(30000);
			}
			
			return response.json(['OK' => 'Relação de veiculos adicionada com sucesso']);
		}
		catch(Exception $e){
			return response.json(['erro' => $e->message]);
		}
	}
}
