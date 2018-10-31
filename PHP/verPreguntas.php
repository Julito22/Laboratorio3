<?php

	include "ParametrosDB.php";
	
	$link = mysqli_connect($server, $user, $pass, $basededatos);
	if($link->connect_error){
		die("La conexion falló:" . $link->connect_error);
	}
	
	$dat = mysqli_query($link, "select * from Preguntas");
	
	echo "<table border=1>";
		echo "<center>";
			echo "<tr>";
				echo "<th> Correo </th>";
				echo "<th> Enunciado </th>";
				echo "<th> Respuesta correcta </th>";
				echo "<th> Respuesta incorrecta 1 </th>";
				echo "<th> Respuesta incorrecta 2 </th>";
				echo "<th> Respuesta incorrecta 3 </th>";
				echo "<th> Complejidad </th>";
				echo "<th> Tema </th>";
				echo "<th> Imagen </th>";
				
			echo "</tr>";
		echo "</center>";
		
	echo "<body bgcolor=rgb(255,255,255)>";
	
	while ($row = mysqli_fetch_array($dat)){
		
			echo "<center>";
				echo "<tr>";
					echo "<td>".$row['Correo']."</td>";
					echo "<td>".$row['Enunciado']."</td>";
					echo "<td>".$row['Respuesta_correcta']."</td>";
					echo "<td>".$row['Respuesta_incorrecta1']."</td>";
					echo "<td>".$row['Respuesta_incorrecta2']."</td>";
					echo "<td>".$row['Respuesta_incorrecta3']."</td>";
					echo "<td>".$row['Complejidad']."</td>";
					echo "<td>".$row['Tema']."</td>";
					echo "<td>".$row['Imagen']."</td>";
				echo "</tr>";
			echo "</center>";
		
	}	
	echo "</body>";
	
	$dat->close();
	mysqli_close($link);
	echo"</table>";
?>