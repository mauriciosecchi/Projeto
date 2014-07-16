<?php
	require_once "functions.php";
	if (isset($_POST['dados']))
	{
		$db = conectadb();
		$valor = $_POST['dados'];
		if ($valor != '')
		{
			$sql = mysql_query("SELECT quadra.*, (select count(*) from reserva where reserva.id_quadra = quadra.id_quadra) as qtde FROM quadra where id_modalidade = $valor") or die(mysql_error());   
			if (mysql_num_rows($sql) > 0)
			{
				echo "<div class = 'tabelapadrao' align = 'center'>";
				echo "<table border='2px' class = 'tab' align = 'center'>";
				echo "<tr><th padding = '72px'>Quadra</th>";
				while($resultado = mysql_fetch_array($sql))
				{
						echo "<tr>";
						if ($resultado['qtde'] == 0)
						{
							$alink = "<a href='excluir.php?id=$resultado[id_quadra]'><img src='images/excluir.gif' title='Excluir'/></a>";
						}
						else
						{
							$alink = "     ";
						}
						echo"<td style= 'width: 150px; padding: 10px; border: 2px;'>$resultado[desc_quadra] $alink</td>";
						echo "</tr>";
				}
				echo "<br>";
				echo"</table>";
				echo "</div>";
			}
		}
	}

	?>