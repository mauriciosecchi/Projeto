<?php
	session_start();
	$_SESSION['reserva_id'] = $_GET['id_reserva'];
	$_SESSION['reserva_quadra_id'] = $_GET['id_quadra'];
	$_SESSION['reserva_data'] = $_GET['data'];
	$_SESSION['reserva_hora'] = $_GET['hora'];
	header("Location:index.php#!/page_CadReservas");
?>