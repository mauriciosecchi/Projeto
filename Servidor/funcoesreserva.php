<?php 
  require_once "functions.php";
  $db = conectadb();

  	if (isset($_POST['dados'])){
    	$rs = mysql_query("SELECT * FROM quadra WHERE id_modalidade = $_POST[dados]");
		if(mysql_num_rows($rs) > 0)	{
			echo "<option value='-1' >Selecione</option>";
			while ($linha = mysql_fetch_assoc($rs))
			{
			  echo("<option value='$linha[id_quadra]' >$linha[desc_quadra]</option>");
			}
		}
	}
	
?>