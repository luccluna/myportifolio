<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagseguro {

	public function sendRequestPag(array $request, $sandbox = false)
	{
	    //Endpoint da API
	    $apiEndpoint  = 'https://ws.' . ($sandbox ? 'sandbox.': null);
	    $apiEndpoint .= 'pagseguro.uol.com.br/v2/checkout/';

	    //Executando a operação
	    $curl = curl_init();

	    curl_setopt($curl, CURLOPT_URL, $apiEndpoint);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($request));

	    $response = urldecode(curl_exec($curl));
	  

	    $error = curl_error($curl);
		$errno = curl_errno($curl);

	    curl_close($curl);

	    $response = simplexml_load_string($response);


	   	$codigo_transaction = (string) $response->code;
	    return $codigo_transaction;
	}

	public function verificarNotificacoes($notificationCode, $sandbox = false, $assinatura = false)
	{
	    //Endpoint da API
	    if($assinatura){
	    	$apiEndpoint  = 'https://ws.' . ($sandbox ? 'sandbox.': null);
		    $apiEndpoint .= 'pagseguro.uol.com.br/v2/pre-approvals/notifications/'.$notificationCode;
	    }else{
		    $apiEndpoint  = 'https://ws.' . ($sandbox ? 'sandbox.': null);
		    $apiEndpoint .= 'pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode;
		}

	    $credenciais = $this->getCredenciais($sandbox, $assinatura);

	    $apiEndpoint .= '?'. http_build_query(array('email' => $credenciais['email'], 'token' => $credenciais['token']));

	    //Executando a operação
	    $curl = curl_init();

	    curl_setopt($curl, CURLOPT_URL, $apiEndpoint);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	    $response = urldecode(curl_exec($curl));

	    $error = curl_error($curl);
		$errno = curl_errno($curl);

	    curl_close($curl);

	    $response = simplexml_load_string($response);

	    return $response;
	}

	public function pagamento_recorrente(array $request, $sandbox = false)
	{
		//Endpoint da API
	    $apiEndpoint  = 'https://ws.' . ($sandbox ? 'sandbox.': null);
	    $apiEndpoint .= 'pagseguro.uol.com.br/v2/pre-approvals/request';
	    //Executando a operação
	    $curl = curl_init();


	    curl_setopt($curl, CURLOPT_URL, $apiEndpoint);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($request));

	    $response = urldecode(curl_exec($curl));

	    $error = curl_error($curl);
		$errno = curl_errno($curl);

	    curl_close($curl);

	    $response = simplexml_load_string($response);

	   	$codigo_transaction = (string) $response->code;

	    return $codigo_transaction;
	}

	public function getCredenciais($sandbox = false, $assinatura = false){

		if ($sandbox) {
			$credenciais = array(
									'email' 		=> 'pagseguro@institutoespiritadoamor.com',
									'token' 		=> '7102BDD33A524AA3A38C24F0D3F395C5',
									'url_request' 	=> 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='
								);
		}else{
			$credenciais = array(
									'email' 		=> 'pagseguro@institutoespiritadoamor.com',
									'token' 		=> 'C3296FB3D572459DBDF9054AE49CFB0A',
									'url_request' 	=> 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='
								);
		}

		if($assinatura){
			$credenciais['url_request'] = 'https://'.($sandbox ? 'sandbox.': null);
			$credenciais['url_request'] .= 'pagseguro.uol.com.br/v2/pre-approvals/request.html?code=';
		}

		return $credenciais;
	}
}

/* End of file paypal.php */
