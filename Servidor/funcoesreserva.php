<?php 
require_once "functions.php";
  
  $db = conectadb();

  	if (isset($_POST['dados'])){
    	$rs = mysql_query("SELECT * FROM quadra WHERE id_modalidade = $_POST[dados]");
		if(mysql_num_rows($rs) > 0)	{
			while ($linha = mysql_fetch_assoc($rs))
			{
			  echo("t<option value='$linha[id_modalidade]' >$linha[desc_quadra]</option>");
			}
		}
		else{
			echo "<option value ='-1'>Nenhuma quadra localizada</option>";
		}
	}
?>