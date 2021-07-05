<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frete {
	/*caso for buscar mais de um cep o valor unico dever ser false*/
	public function calcularFrete($data = array(), $unico = true)
	{
		$data = http_build_query($data);
	    $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	    $curl = curl_init($url . '?' .  $data);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    $result = curl_exec($curl);
	    $result = simplexml_load_string($result);

	    if($unico){
	    	return $result->cServico->Valor;
	    }else{
	    	return $result;
	    }
	}
}
