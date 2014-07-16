<?php
	require_once "functions.php";
	if (isset($_GET['id']))
	{
		$db = conectadb();
		$sql = mysql_query("DELETE FROM quadra where id_quadra = $_GET[id]") or die(mysql_error());
		header("Location:index.php#!/page_Quadra");
	}
	if (isset($_GET['modalidade']))
	{
		$db = conectadb();
		$sql = mysql_query("DELETE FROM modalidade where id_modalidade = $_GET[modalidade]") or die(mysql_error());
		header("Location:index.php#!/page_Modalidade");
	}
?>