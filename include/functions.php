<?php 
	function verificarConsulta($consulta)
	{
		if(!$consulta)
		{
		die("No ha podido realizarse la consulta" .mysql_error() );
		}
	}


	function obtenerCursos()
	{
		global $conexion;
		$consulta="SELECT * FROM cursos ORDER BY posicion ASC";
		$cursos=mysql_query($consulta, $conexion);
		verificarConsulta($cursos);
		return $cursos;
	}


	function obtenerCapitulosPorCursos($curso_id)
	{
		global $conexion;
		$consulta= "SELECT *FROM capitulos
		 WHERE curso_id = {$curso_id}
		ORDER BY posicion ASC";
		$capitulos=mysql_query($consulta,$conexion);
		verificarConsulta($capitulos);
		return $capitulos;

	}

	function obtenerCursoPorId($curso_id)
	{
		global $conexion;
		$consulta = "SELECT * FROM cursos WHERE id=" . $curso_id . " LIMIT 1";
		$respuesta= mysql_query($consulta,$conexion);
		$verificarConsulta($respuesta);
		if ($curso=mysql_fetch_array($respuesta)) 
		{
			return $curso;
		}
		else
		{
			return NULL;
		}	

	}


	function obtenerCapituloPorId($capitulo_id)
	{
		global $conexion;
		$consulta = "SELECT * FROM cursos WHERE id=" . $capitulo_id . " LIMIT 1";
		$respuesta= mysql_query($consulta,$conexion);
		$verificarConsulta($respuesta);
		if ($capitulo=mysql_fetch_array($respuesta)) 
		{
			return $capitulo;
		}
		else
		{
			return NULL;
		}	

	}


	function obtener_pagina()
	{
		global $curso_reg;
		global $capitulo_reg;

		if(isset($GET["curso"]))
		{
		
		#funcion que devuelve los cursos
		$curso_reg=obtenerCursoPorId($GET["curso"]);
		#cuando tenga un valor vacio
		$capitulo_reg=NULL;
		}
		elseif(isset($GET["capitulo"]))
		{
		
		$capitulo_reg=obtenerCapituloPorId($GET["capitulo"]);
		$curso_reg=NULL;
		}
		else
		{
		
		$capitulo_reg=NULL;
		$curso_reg=NULL;
		}
	}


	function menu($curso_reg,$capitulo_reg)
	{
		$salida= "<ul class=\"cursos\">";
		 #Realizando la consulta 
		$cursos = obtenerCursos();

		while ($curso=mysql_fetch_array($cursos)) 
		{
		#separando las listas en varias cadena
		$salida.= "<li";
		if($curso["id"]==$curso_reg["id"])
		{
			$salida.= "class=\"selected\"";
		}
						
			$salida.=  "><a href=\"content.php?curso=". urlencode($curso["id"]) .
		"\">". $curso["nombre"]. "</a> </li> <ul class='capitulos'>";
						
		$capitulos=obtenerCapitulosPorCursos($curso["id"]);
					
		//Busquedad de capitulos dentro de la base de datos cursos
		while ($capitulo=mysql_fetch_array($capitulos)) 
		{
			$salida.= "<li";
		if($capitulo["id"]==$capitulo_reg["id"])
		{
			$salida.= "class=\"selected\"";
		}
			
		$salida.=   "><a href=\"content.php?capitulo=". urlencode($capitulo["id"]). 
					"\">". $capitulo["nombre"]. "</a> </li>";
					}
		$salida.= '</ul>';
		}
		$salida.= "</ul>";
		return $salida;
}
 ?>