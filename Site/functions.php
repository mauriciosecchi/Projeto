<?php
  
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
function query($query, $db){
    //$result conterá um recurso (do tipo mysql result, com linhas e colunas) que pode ser usado para extrair os resultados da query.
    $result = mysql_query($query, $db);
    if(!$result){ //se tiver problemas, retorna falso
      die ("Acesso à base de dados falhou: ".mysql_error() . mysql_errno());      
    }
    return $result;
}    
?>