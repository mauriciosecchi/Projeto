<?php
ini_set("display_errors",1);  
  
//--------- Função para conectar com o Banco de Dados ----------------------------------- 
function conectadb(){
    $dbHostname = "localhost";
	$dbDatabase = "aabb";
	$dbUsername = "root";
	$dbPassword = "";
	
	$db_server = mysql_connect($dbHostname, $dbUsername, $dbPassword);
    if(!$db_server){ 
        die("Unable to connect to MySQL: " . mysql_error());
    }
    
    mysql_select_db($dbDatabase, $db_server) or
        die("Unable to select database: " . mysql_error());
    
    return $db_server;
}   

//------------------------------------------------------------------
function query($query){
    //$result conterá um recurso (do tipo mysql result, com linhas e colunas) que pode ser usado para extrair os resultados da query.
    $result = mysql_query($query);
    if(!$result){ //se tiver problemas, retorna falso
      die ("Acesso à base de dados falhou: ".mysql_error() . mysql_errno());      
    }
    return $result;
}

//------------------Função Monta Combo--------------  
function montaCombo($nome, $rs, $valor, $descricao) {
	echo("<select name='$nome' class='combo' id='$nome'>");
	echo("t<option value=''>--Selecione--</option>");
	while ($obj = mysql_fetch_object($rs)) {
		echo("t<option value='" . $obj->$valor . "' > " . $obj->$descricao . " </option>");
	}
	echo("</select>");
}

//----------------Função Inserção Cadastro de Quadra---------------------      
function insereQuadra(){
	$desc_quadra = $_POST['quadra'];
	$horario_ini = $_POST['horario_ini'];
	$horario_fim = $_POST['horario_fim'];
	$horario_base = $_POST['horario_base'];
	$id_modalidade = $_POST['modalidades'];		
	
	$sql = "INSERT INTO quadra(
			id_quadra, id_modalidade, desc_quadra, horario_base, horario_ini, horario_fim ) VALUES( '', 
			'" . $id_modalidade . "','" . $desc_quadra . "', '" . $horario_base . "', '" . $horario_ini . "', '" . $horario_fim . "'
			)" ;
	$result = query($sql);
    
}

//----------------Função Inserção Cadastro de Modalidade---------------------      
function insereModalidade(){
	$desc_modalidade = $_POST['modalidade'];
		
	$sql = "INSERT INTO modalidade(
			id_modalidade, desc_modalidade ) VALUES( '', 
			'" . $desc_modalidade . "')" ;
	$result = query($sql);
    
}        
//---------------Função para gerar o dia da semana de acordo com a data------------
function gerardata()
{
	$_SESSION['dataatual'] = date("d/m/y");
	$dia =  substr($_SESSION['dataatual'],0,2);
	$mes =  substr($_SESSION['dataatual'],3,2);
	$ano =  substr($_SESSION['dataatual'],6,9);
	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
	switch($diasemana){  
			case"0": $_SESSION['dataatual'] = strtotime("-6 days");  break;  
			case"1": break;  
			case"2": $_SESSION['dataatual'] = strtotime("-1 days");  break;  
			case"3": $_SESSION['dataatual'] = strtotime("-2 days");  break;  
			case"4": $_SESSION['dataatual'] = strtotime("-3 days");  break;  
			case"5": $_SESSION['dataatual'] = strtotime("-4 days");  break;  
			case"6": $_SESSION['dataatual'] = strtotime("-5 days");  break;  
		 }
}
//----------Função para conversão de segundos para horas e minuros H:i ------------------
 function converterHora($total_segundos){
			
	$hora = sprintf("%02s",floor($total_segundos / (60*60)));
	$total_segundos = ($total_segundos % (60*60));
	
	$minuto = sprintf("%02s",floor ($total_segundos / 60 ));
	$total_segundos = ($total_segundos % 60);
	
	$hora_minuto = $hora.":".$minuto;
	return $hora_minuto;
}
 
?> 
