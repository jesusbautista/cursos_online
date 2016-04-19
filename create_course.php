<?php require_once("./include/connection_db.php"); ?>
<?php 

	$errores = array( ); # esta variable almacenara errores en la verificacion
	
	validar_campos_obligatorios( array("nombre","posicion","visibilidad"),$erores);


	

	if (!isset($_POST["posicion"]) || empty($_POST["posicion"])) 
	{
		# validacion para no reciber un nombre de curso vacio
		$errores[]="posicion"; # posicion es una variable de html
	}

	if (!isset($_POST["visibilidad"]) || empty($_POST["visibilidad"])) 
	{
		# validacion para no reciber un nombre de curso vacio
		$errores[]="visibilidad"; # posicion es una variable de html
	}


	if (!empty($errores))
	 {
		#si la variable error es vacia regresa
		header("Location: new_course.php");
		exit;
	}
 ?>
<?php require_once("./include/functions.php"); ?>
<?php

$nombre=preparar_consulta($_POST["nombre"]);
$posicion=preparar_consulta($_POST["posicion"]);
$visibilidad=preparar_consulta($_POST["visibilidad"]);

$consulta= "INSERT INTO cursos (
			nombre, posicion, visibilidad
			) VALUES (
			'{$nombre}', '{$posicion}', {$visibilidad}
			)";

if (mysql_query($consulta,$conexion)) 
{
	header("Location: content.php");
	exit();
}
else
{
	echo "compruebe su conexion" .mysql_error();
}

 ?>

 <?php mysql_close($conexion);?>