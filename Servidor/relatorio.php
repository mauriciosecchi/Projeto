<?php
// --------------------- Funçao Gerar Horários ---------------------------------
//session_start();
require('fpdf/fpdf.php');
require_once "functions.php";

	
 $db = conectadb();

 	if(isset($_POST['submit_relatorio'])){
 		$pdf= new FPDF("L","pt","A4");
		$pdf->AddPage();
 
		$pdf->SetFont('arial','B',14);
		$pdf->Cell(0,5,"Reservas de Quadras",0,1,'C');
		$pdf->Cell(0,5,"","B",1,'C');
		$pdf->Ln(50);

		$pdf->SetFont('arial','B',12);	

		$quadra = $_POST['quadra'];
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
		
		$data = date('Y/m/d', $_SESSION['dataatual']);
		$temp = strtotime($data . "+$num_dias days");
		$data = date('Y/m/d', $temp);
		
		$pdf->Cell(45,30, "", 1,0, "L");
		$timestamp = strtotime($data . "+0 days");
		$pdf->Cell(100,30, "SEG " .date('d/m/Y', $timestamp), 1,0, "L");
		$timestamp = strtotime($data . "+1 days");
		$pdf->Cell(100,30, "TER " .date('d/m/Y', $timestamp), 1,0, "L");
		$timestamp = strtotime($data . "+2 days");
		$pdf->Cell(100,30, "QUA " .date('d/m/Y', $timestamp), 1,0, "L");
		$timestamp = strtotime($data . "+3 days");
		$pdf->Cell(100,30, "QUI " .date('d/m/Y', $timestamp), 1,0, "L");
		$timestamp = strtotime($data . "+4 days");
		$pdf->Cell(100,30, "SEX " .date('d/m/Y', $timestamp), 1,0, "L");
		$timestamp = strtotime($data . "+5 days");
		$pdf->Cell(100,30, "SAB " .date('d/m/Y', $timestamp), 1,0, "L");
		$timestamp = strtotime($data . "+6 days");
		$pdf->Cell(100,30, "DOM " .date('d/m/Y', $timestamp), 1,1, "L");
		
		
		//Insere dados na tabela
		while ($horafinal >= $soma){		 
			$v = converterHora($soma);
			$pdf->Cell(45,30,$v, 1, 0,"L");
			for($i=0; $i<7; $i++){
				$timestamp = strtotime($data . "+$i days");
				$sql = "select reserva.id_reserva, usuario.apelido, reserva.id_usuario from reserva join usuario on usuario.id_usuario = reserva.id_usuario where reserva.id_quadra = $quadra and reserva.dt_reserva = '" . date("Y.m.d", $timestamp) ."' and TIME_TO_SEC(reserva.horario) = $soma";
				$res = query($sql);
				$qtd = mysql_num_rows($res);
				if ($qtd > 0){
					$linha = mysql_fetch_assoc($res);
					$id_reserva = $linha['id_reserva'];
					$apelido = $linha['apelido'];
					if ($_SESSION['id_usuario'] == $linha['id_usuario']){
						$exibir = "<a href='tmp.php?id_reserva = $id_reserva&id_quadra=$quadra&data=$timestamp&hora=$soma' class='itemreservado'>$apelido</a>";	
						if($apelido == "Disponível"){	
							$pdf->Cell(100,30,"", 1, 0,"L");
						}else{
							$pdf->Cell(100,30,$apelido, 1, 0,"L");
						}

					}else{
						$exibir = "<a class='itemreservado'>$apelido</a>";
						if($apelido == "Disponível"){	
							$pdf->Cell(100,30,"", 1, 0,"L");
						}else{
							$pdf->Cell(100,30,$apelido, 1, 0,"L");
						}
						
					}
				}else{
					$id_reserva =  0;
					$apelido = 'Disponível';
					$exibir = "<a href='tmp.php?id_reserva = $id_reserva&id_quadra=$quadra&data=$timestamp&hora=$soma' class='itemreserva'>$apelido</a>";
					if($apelido == "Disponível"){	
						$pdf->Cell(100,30,"", 1, 0,"L");
					}else{
						$pdf->Cell(100,30,$apelido, 1, 0,"L");
					}			
				}
			}
			$pdf->Ln();
				
			$soma = ($horabase + $soma);
			
		}
		
		$pdf->Output("arquivo.pdf","D");
	}


?>