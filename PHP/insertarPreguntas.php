<?php

	include "ParametrosDB.php";

	

	$correo = $_POST["Correo"];
	$Enunciado = $_POST["Enunciado"];
	$respuesta = $_POST["respuesta"];
	$respuesta1 = $_POST["respuesta1"];
	$respuesta2 = $_POST["respuesta2"];
	$respuesta3 = $_POST["respuesta3"];
	$complejidad = $_POST["complejidad"];
	$tema = $_POST["tema"];
	$imagen = $_POST["imagen"];
	$error=false;
	
	
	
	
	if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
		echo("El email introducido no es correocto");
		echo"<br>";
		$error=true;
	}
	if(((empty($correo))==true)||((empty($Enunciado))==true)||((empty($respuesta))==true)||((empty($respuesta1))==true)||((empty($respuesta2))==true)||((empty($respuesta3))==true)||((empty($tema))==true)||((empty($complejidad))==true)){
		echo("No puede haber un campo obligatorio vacio");
		echo"<br>";
		$error=true;
	}
	if((0>$complejidad)||($complejidad>5)){
			echo("El valor de complejidad debe ser un numero comprendido entre 0 y 5.");
			echo"<br>";
			$error=true;
	}
	
	$link = mysqli_connect($server, $user, $pass, $basededatos);
	if($link->connect_error){
		die("La conexion falló:" . $link->connect_error);
	}
	
	$sql = "INSERT INTO preguntas (Correo, Enunciado, Respuesta_correcta, Respuesta_incorrecta1, Respuesta_incorrecta2, Respuesta_incorrecta3, Complejidad, Tema, Imagen) VALUES('$correo', '$Enunciado', '$respuesta', '$respuesta1', '$respuesta2', '$respuesta3', $complejidad, '$tema', '$imagen')";
	
	if(!mysqli_query($link, $sql)){
		die("Ha ocurrido algun error.");
	}
	if($error==False){
		echo "<center>";
			echo "<h2 > La pregunta ha sido introducida con exito </h2><br>";
			echo "<a href='verPreguntas.php'> Ver preguntas </a><br>";
			echo "<img src='Homer.png'><br>";
		echo "</center>";
	}
	else{
		echo("No se ha enviado la pregunta");
	}
	
	

?>