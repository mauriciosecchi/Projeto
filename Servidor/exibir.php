<?php
// --------------------- Funçao Gerar Horários ---------------------------------
session_start();
require_once "functions.php";

	
 $db = conectadb();

	if (isset($_POST['dados']))
	{	
		$quadra = $_POST['dados'];
		$sql = "SELECT TIME_TO_SEC(`horario_base`) as horario_base, TIME_TO_SEC(`horario_ini`) as horario_ini, TIME_TO_SEC(`horario_fim`) as horario_fim FROM `quadra` WHERE `id_quadra` = '" . $quadra . "'";
		$result = query($sql);		
		$rows = mysql_fetch_array($result);
				
		$horabase = $rows['horario_base'];
		$horainicial = $rows['horario_ini'];
		$horafinal = $rows['horario_fim'];
				
		$soma = $horainicial;
		if(isset($_POST['soma'])){
			$num_dias = $_SESSION['num_dias'] + $_POST['soma'];
			$_SESSION['num_dias'] = $_SESSION['num_dias'] + $_POST['soma'];
		}
		else{
			$num_dias = 0;
		}
		
		echo "<table>";
		echo "	<thead> ";
		echo "		<tr> ";
		echo "			<th class='bg'></th> ";
		$data = date('Y/m/d', $_SESSION['dataatual']);
		$temp = strtotime($data . "+$num_dias days");
		$data = date('Y/m/d', $temp);
		
		$timestamp = strtotime($data . "+0 days");
		echo "			<th><strong>Segunda " . date('d/m/Y', $timestamp) . "</strong></th> ";
		$timestamp = strtotime($data . "+1 days");
		echo "			<th class='bg'><strong>Terça " . date('d/m/Y', $timestamp) . "</strong></th> ";
		$timestamp = strtotime($data . "+2 days");
		echo "			<th><strong>Quarta " . date('d/m/Y', $timestamp) . "</strong></th> ";
		$timestamp = strtotime($data . "+3 days");
		echo "			<th class='bg'><strong>Quinta " . date('d/m/Y', $timestamp) . "</strong></th> ";
		$timestamp = strtotime($data . "+4 days");
		echo "			<th><strong>Sexta " . date('d/m/Y', $timestamp) . "</strong></th> ";
		$timestamp = strtotime($data . "+5 days");
		echo "			<th class='bg'><strong>Sábado " . date('d/m/Y', $timestamp) . "</strong></th> ";
		$timestamp = strtotime($data . "+6 days");
		echo "			<th><strong>Domingo " . date('d/m/Y', $timestamp) . "</strong></th> ";
		echo "		</tr> ";
		echo "	</thead> ";
		
		//Insere dados na tabela
		while ($horafinal >= $soma)
		{		 
			echo "<tr>";
			echo "<td class='bg'><strong>". $v = converterHora($soma) ."</strong></td>";
			for($i=0; $i<7; $i++){
				$timestamp = strtotime($data . "+$i days");
				$sql = "select reserva.id_reserva, usuario.apelido, reserva.id_usuario from reserva join usuario on usuario.id_usuario = reserva.id_usuario where reserva.id_quadra = $quadra and reserva.dt_reserva = '" . date("Y.m.d", $timestamp) ."' and TIME_TO_SEC(reserva.horario) = $soma";
				$res = query($sql);
				$qtd = mysql_num_rows($res);
				if ($qtd > 0)
				{
					$linha = mysql_fetch_assoc($res);
					$id_reserva = $linha['id_reserva'];
					$apelido = $linha['apelido'];
					if ($_SESSION['id_usuario'] == $linha['id_usuario'])
					{
						$exibir = "<a href='tmp.php?id_reserva = $id_reserva&id_quadra=$quadra&data=$timestamp&hora=$soma' class='itemreservado'>$apelido</a>";		
					}
					else
					{
						$exibir = "<a class='itemreservado'>$apelido</a>";
					}
				}
				else
				{
					$id_reserva =  0;
					$apelido = 'Disponível';
					$exibir = "<a href='tmp.php?id_reserva = $id_reserva&id_quadra=$quadra&data=$timestamp&hora=$soma' class='itemreserva'>$apelido</a>";		
				}
				
				echo "<td>$exibir</td>";
			}
			echo "</tr>";
			
			$soma = ($horabase + $soma);
			
		}
		echo "	<tbody> ";
		echo "	</tbody> ";
		echo "</table> ";
	}

?>