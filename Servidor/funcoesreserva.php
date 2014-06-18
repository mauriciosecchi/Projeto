<?php 
  include_once "functions.php";
	$db = conectadb();
  if (isset($_POST['dados']))
  {
    $rs = mysql_query("SELECT * FROM quadra WHERE id_modalidade = $_POST[dados]");
		if(mysql_num_rows($rs) > 0)	
		{
			while ($linha = mysql_fetch_assoc($rs))
			{
			  echo("t<option value='$linha[id_modalidade]' >$linha[desc_quadra]</option>");
			}
		}
		else
		{
			echo "<option value ='-1'>Nenhuma quadra localizada</option>";
		}
  }
	else
	{
		echo "<option value ='-1'>Nenhuma quadra localizada</option>";
	}
  
  function gerarhorarios()
  {
    $horainicial = 10;
	$horafinal = 20;
    for ($i=$horainicial;$i<$horafinal;$i++)
	{
		echo "<tr>";
		echo "<td class='bg'><strong>$i:00</strong></td>";
		echo "<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "<td class='bg'><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "<td class='bg'><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "<td class='bg'><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "</tr>";
	}
  
  }
?>