<?php
   
  function gerarhorarios()
  {
    $horainicial = 10;
	$horafinal = 20;
    for ($i=$horainicial;$i<$horafinal;$i++)
	{
		echo "<tr>";
		echo "	<td class='bg'><strong>$i:00</strong></td>";
		echo "	<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "	<td class='bg'><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "	<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "	<td class='bg'><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "	<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "		<td class='bg'><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "	<td><a href='index.html' class='itemreserva'>12345678 12345678</a></td>";
		echo "</tr>";
	}
  
  }
?>
