<?php

//devolve a data invertida
function inverteData($date = null, $sep = null) {
    $data = substr($date, 0, 10);
    $restante = substr($date, 10);
    $data = str_replace("-", '/', $data);
    $array = explode("/", $data);
    return $array[2] . $sep . $array[1] . $sep . $array[0] . $restante;
}

//Soma meses a uma data
function monthCalculate($date, $numeroMeses) {
    $date = str_replace("/", '-', $date);
    $arr = explode('-', $date);

    $dia = $arr[2];
    $mes = $arr[1];
    $ano = $arr[0];

    //Verifico se o dia informado é igual a 31, se sim volto para 30. verifico se o mes é fevereiro, se sim volto para 28 e
    //somente depois somo os meses a data
    if ($dia == 31)
        $dia = 30;

    if (($mes + $numeroMeses == 14 or $mes + $numeroMeses == 2) && $dia > 28)
        $dia = 28;


    if($mes == 2 && $dia == 30){
        $dia = 28;
    }

    $date = $ano . "-" . $mes . "-" . $dia;

    $begin = strtotime($date);
    $interval = date('m', $begin) + $numeroMeses;
    return date('Y-m-d', mktime(0, 0, 0, $interval, date('d', $begin), date('Y', $begin)));
}

function Mes($mes) {
    $Mes[1] = 'Janeiro';
    $Mes[2] = 'Fevereiro';
    $Mes[3] = 'Marco';
    $Mes[4] = 'Abril';
    $Mes[5] = 'Maio';
    $Mes[6] = 'Junho';
    $Mes[7] = 'Julho';
    $Mes[8] = 'Agosto';
    $Mes[9] = 'Setembro';
    $Mes[10] = 'Outubro';
    $Mes[11] = 'Novembro';
    $Mes[12] = 'Dezembro';

    return $Mes[(int) $mes];
}

function diaSemana($day) {
    switch ($day) {
        case '0': return 'Domingo';
        case '1': return 'Segunda-Feira';
        case '2': return 'Terça-Feira';
        case '3': return 'Quarta-Feira';
        case '4': return 'Quinta-Feira';
        case '5': return 'Sexta-Feira';
        case '6': return 'Sábado';
    }
}

function diaSemanaNumero($day) {
    switch ($day) {
        case 'Sun': return '0';
        case 'Mon': return '1';
        case 'Tue': return '2';
        case 'Wed': return '3';
        case 'Thu': return '4';
        case 'Fri': return '5';
        case 'Sat': return '6';
    }
}

function intLen($number, $many) {
    if (is_int($number)) {
        $wanted = $many - strlen($number);
        if ($wanted > 0) {
            $zeros = '';
            for ($i = 0; $i < $wanted; $i++)
                $zeros .= '0';
            return $zeros . $number;
        } else
            return $number;
    } else
        return $number;
}

function replace_user_agent($ua) {
    if (preg_match('/Chrome/', $ua) > 0) {
        return 'Google Chrome';
    } else if (preg_match('/Opera/', $ua) > 0) {
        return 'Opera';
    } else if (preg_match('/MSIE/', $ua) > 0) {
        return 'Internet Explorer';
    } else if (preg_match('/Firefox/', $ua) > 0) {
        return 'Mozilla Firefox';
    } else if (preg_match('/Safari/', $ua) > 0) {
        return 'Safari';
    } else
        return $ua;
}

function bissexto($ano) {
    if ((($ano % 4) == 0 && ($ano % 100) != 0) || ($ano % 400) == 0) {
        return true;
    } else
        return false;
}

function formatar($string, $tipo = "") {

    $string = preg_replace("#[^0-9]#", "", $string);

    if (!$tipo) {

        switch (strlen($string)) {

            case 10: $tipo = 'fone';
                break;

            case 8: $tipo = 'cep';
                break;

            case 11: $tipo = 'cpf';
                break;

            case 14: $tipo = 'cnpj';
                break;
        }
    }

    switch ($tipo) {

        case 'fone':

            $string = '(' . substr($string, 0, 2) . ') ' . substr($string, 2, 4) . '-' . substr($string, 6);

            break;

        case 'cep':

            $string = substr($string, 0, 5) . '-' . substr($string, 5, 3);

            break;

        case 'cpf':

            $string = substr($string, 0, 3) . '.' . substr($string, 3, 3) . '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);

            break;

        case 'cnpj':

            $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . '.' . substr($string, 5, 3) . '/' . substr($string, 8, 4) . '-' . substr($string, 12, 2);

            break;

        case 'rg':

            $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . '.' . substr($string, 5, 3);

            break;
    }

    return $string;
}


function select_db(){

$filial = 3;

  if(!empty($filial)){

    // echo 'aqui';
    // exit;

    $CI =& get_instance();
    $CI->load->database();

    $dados = $CI->db->select('*')
        ->from('filiais')
        ->where('id', $filial)
        ->get()->row();



        if($dados){

               $_conexao = $CI->load->database(array(
              'hostname' => $dados->db_host,
              'username' => $dados->db_user,
              'password' => $dados->db_pass,
              'database' => $dados->db_name,
              'dbdriver' => "mysql",
              'dbprefix' =>  "",
              'pconnect' => FALSE,
              'db_debug' => TRUE,
              'cache_on' => FALSE,
              'cachedir' => "",
              'char_set' => "utf8",
              'dbcollat' => "utf8_general_ci",
              'stricton' => FALSE
              ), TRUE);



              if ($_conexao->initialize() === FALSE)
    {
     echo 'problemas ao conectar ao banco de dados';


    }
    else
    {

    return $_conexao;



    }


       }


  }
}




function select_db_externo(){


  if(!empty($_SESSION['filial_externa'])){

    $CI =& get_instance();
    $CI->load->database();

    $dados = $CI->db->select('*')
        ->from('filiais')
        ->where('id', $_SESSION['filial_externa'])
        ->get()->row();



        if($dados){

               $_conexao = $CI->load->database(array(
              'hostname' => $dados->db_host,
              'username' => $dados->db_user,
              'password' => $dados->db_pass,
              'database' => $dados->db_name,
              'dbdriver' => "mysql",
              'dbprefix' =>  "",
              'pconnect' => FALSE,
              'db_debug' => TRUE,
              'cache_on' => FALSE,
              'cachedir' => "",
              'char_set' => "utf8",
              'dbcollat' => "utf8_general_ci",
              'stricton' => FALSE
              ), TRUE);



              if ($_conexao->initialize() === FALSE)
    {
     echo 'problemas ao conectar ao banco de dados';


    }
    else
    {

    return $_conexao;



    }


       }


  }
}




/*SELECIONADO DB DE FILIAL ESPECÍFICA*/

function select_db_filial($filial){


  if(!empty($filial)){

    $CI =& get_instance();
    $CI->load->database();

    $dados = $CI->db->select('*')
        ->from('filiais')
        ->where('id', $filial)
        ->get()->row();



        if($dados){

               $_conexao = $CI->load->database(array(
              'hostname' => $dados->db_host,
              'username' => $dados->db_user,
              'password' => $dados->db_pass,
              'database' => $dados->db_name,
              'dbdriver' => "mysql",
              'dbprefix' =>  "",
              'pconnect' => FALSE,
              'db_debug' => TRUE,
              'cache_on' => FALSE,
              'cachedir' => "",
              'char_set' => "utf8",
              'dbcollat' => "utf8_general_ci",
              'stricton' => FALSE
              ), TRUE);



              if ($_conexao->initialize() === FALSE)
    {
     echo 'problemas ao conectar ao banco de dados';


    }
    else
    {

    return $_conexao;



    }


       }


  }
}


?>