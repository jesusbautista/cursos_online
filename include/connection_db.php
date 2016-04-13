<?php

	require_once("constants.php");
	 #Conexion a la base de datos
	$conexion = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
	if (!$conexion) 
	{
		die("Sin conexion a la base de datos".mysql_error());
		
	}

	#Selecionar base de daos
	$db_selecionada = mysql_select_db(DB_NAME,$conexion);
	if (!$db_selecionada)
	 {
		die("No existe tal base de datos".mysql_error());
	}
 ?>
