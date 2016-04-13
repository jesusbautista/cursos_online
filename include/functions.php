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
 ?>