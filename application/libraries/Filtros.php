<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filtros {
	/*recebe texto e compara com lista de palavroes*/
	public function palavras_feias($data, $lista_obj_palavras_feias)
	{

		/*array de objetos para array de strings*/
		$lista_palavras_feias = array();
		foreach ($lista_obj_palavras_feias as $key => $val) {
			array_push($lista_palavras_feias, $val->descricao);
			
		}	

		/* monta regex #\b(palavrao|palavrao)\b# */
		$lista_nome_feio_regex = '#\b(' . join('|',
				array_map(function ($palavrao) {
    			return preg_quote($palavrao, '#');
    		},$lista_palavras_feias)) . ')\b#';

		
		preg_match_all($lista_nome_feio_regex, $data , $matches);
		/*retorna full match*/
		return $matches[0];

		

	/*
		echo'<pre>';
        print_r($matches[0]);
        echo "<pre>";
        exit(); 
	*/
	/*
		$lista_palavras_consulta = explode(" ", $data);
		$lista_palavras_feias_encontradas=array();

		foreach ($lista_palavras_consulta as $key => $palavra){
			foreach ($lista_nome_feio as $key => $palavra_feia) {
				if($palavra == $palavra_feia->descricao){
					array_push($lista_palavras_feias_encontradas, $palavra);
					
					
				}
				
			}
			
		}	

		return $lista_palavras_feias_encontradas;
	*/


	}
}
