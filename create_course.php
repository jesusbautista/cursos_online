<?php require_once("./include/connection_db.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php 

	
	$errores= validar_campos_obligatorios( array("nombre","posicion","visibilidad"));


	if (!empty($errores))
	 {
		#si la variable error es vacia regresa
		header("Location: new_course.php");
		exit;
	}
 ?>

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