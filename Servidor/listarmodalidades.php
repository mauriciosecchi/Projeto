<?php
	require_once "functions.php";
	
	function exibirmodalidades()
	{
	  echo"<h2>Modalidades Cadastradas</h2>";			
		$db = conectadb();
		$_BS['PorPagina'] = 5; // Número de registros por página
		$sql = mysql_query("SELECT * FROM modalidade");
		$total = mysql_num_rows($sql);
		$paginas = (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

		if (isset($_GET['pagina'])) {

		$pagina = (int)$_GET['pagina'];

		} else {

		$pagina = 1;

		}

		$pagina = max(min($paginas, $pagina), 1);

		$inicio = ($pagina - 1) * $_BS['PorPagina'];
		$sql = mysql_query("SELECT modalidade.*, (select count(*) from quadra where quadra.id_modalidade = modalidade.id_modalidade) as qtde FROM modalidade LIMIT $inicio, $_BS[PorPagina]") or die(mysql_error());   
		if (mysql_num_rows($sql) > 0)
		{
			echo "<div class = 'tabelapadrao' align = 'center'>";
			echo "<table border='2px' class = 'tab' align = 'center'>";
			echo "<tr><th padding = '72px'></th>";
			while($resultado = mysql_fetch_array($sql))
			{
					echo "<tr>";
					if ($resultado['qtde'] == 0)
					{
						$alink = "<a href='excluir.php?modalidade=$resultado[id_modalidade]'><img src='images/excluir.gif' title='Excluir'/></a>";
					}
					else
					{
						$alink = "     ";
					}
					echo"<td style= 'width: 150px; padding: 10px; border: 2px;'>$resultado[desc_modalidade] $alink</td>";
					echo "</tr>";
			}
			echo "<br>";
			echo"</table>";
			echo "</div>";
		}
		// comeca exibicao dos paginadores
		if ($total > 0) 
		{
			echo "<div id = 'tabela_1' align = 'center'>";
			for($n = 1; $n <= $paginas; $n++) 
			{
				echo "<a href='?pagina=".$n."#!/page_Modalidade'>".$n."</a>&nbsp;&nbsp;";
			}
			echo "</div>";
		}
	}
?>