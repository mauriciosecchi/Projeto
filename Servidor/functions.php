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
	echo("<select name='$nome' class='combo'>");
	echo("t<option value=''>--Selecione--</option>");
	while ($obj = mysql_fetch_object($rs)) {
		echo("t<option value='" . $obj->$valor . "' > " . $obj->$descricao . " </option>");
	}
	echo("</select>");
}

//----------------Função Inserção Cadastro de Modalidades---------------------      
function insereModalidade(){
	$desc_quadra = $_POST['quadra'];
	$horario_ini = $_POST['horario_ini'];
	$horario_fim = $_POST['horario_fim'];
	$horario_base = $_POST['horario_base'];
	$id_modalidade = $_POST['modalidade'];		
	
	$sql = "INSERT INTO quadra(
			id_quadra, id_modalidade, desc_quadra, horario_base, horario_ini, horario_fim ) VALUES( '', 
			'" . $id_modalidade . "','" . $desc_quadra . "', '" . $horario_base . "', '" . $horario_ini . "', '" . $horario_fim . "'
			)" ;
	$result = query($sql);
    
}        
?>