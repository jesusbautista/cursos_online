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
 ?>