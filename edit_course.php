<?php require_once("./include/connection_db.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php 
	#intval transforma una variable a entero  
	if(intval($_GET["curso"])==0)
	{
		header("Location: content.php");
		exit;
	}

	if(isset($_POST["nombre"]))
	{
		
		$errores = validar_campos_obligatorios( array("nombre","posicion","visibilidad"));


	if (empty($errores))
	 {
	 	$curso_id=preparar_consulta($_GET["curso"]);
		$nombre=preparar_consulta($_POST["nombre"]);
		$posicion=preparar_consulta($_POST["posicion"]);
		$visibilidad=preparar_consulta($_POST["visibilidad"]);
		

		$consulta="UPDATE cursos SET
		nombre='{$nombre}',
		posicion={$posicion},
		visibilidad={$visibilidad}
		WHERE id = {$curso_id}";

		$resultado=mysql_query($consulta,$conexion);

		if (mysql_affected_rows()==1)
		 {
			$mensaje="se ha actualizado correctamente";
		}
		else
		{
			$mensaje="se ha obtenido un error"."<br>".mysql_error();
		}
		
		}
		else
		{
			$mensaje="Se ha obtenido ". count($errores). "errores";
		}

	}
 ?> 
<?php obtener_pagina();?>
<?php include("./include/header.php"); ?>  
<table id="estructura">
			<tr>
				<td id="menu">
					<?php echo  menu($curso_reg,$capitulo_reg); ?>				
				</td>
				<td id="pagina">
				<h2> Editar un curso ahora: <?php echo $curso_reg["nombre"] ?> </h2>
				<form action="edit_course.php?curso=<?php echo urlencode($curso_reg['id']); ?>" method="post">
					<p>
						Nombre de curso <input name="nombre" value= '<?php echo $curso_reg["nombre"]  ?>'
					</p>
					<p>Posicion:
						<select name="posicion">
							<?php
							$todos_los_cursos=obtenerCursos();
							$num_cursos= mysql_num_rows($todos_los_cursos);
							for ($i=1; $i <=$num_cursos+1; $i++) 
							{ 
								echo "<option value=\"{$i}\"";
								if ($curso_reg["posicion"]==$i)
								{
									echo "selected";
								}
								echo ">{$i}</option>";
							}

							?>		
						</select>
					</p>
						<p>Visible:
							<input type="radio" value="0" name="visibilidad"  
							<?php if($curso_reg['visibilidad']==0) { echo 'checked';}  ?> >No

							<input type="radio" value="1" name="visibilidad" 
							 <?php if($curso_reg['visibilidad']==1) { echo 'checked';}  ?> >Si
						</p>
						<input type="submit" value="Editar Curso">
					</form>
					<br>
					<a href="content.php">Cancelar</a>
					<a href="delete_course.php?curso=<?php echo  urlencode($curso_reg['id']); ?>">Borrar curso</a>
					<p>
						<?php 
							if(isset($mensaje))
							{
								foreach ($errores as $error) 
								{
									echo "<br>". $error;
								}
								
							}
						 ?>
					</p>
				</td>
					</tr>
			</table>
<?php require_once("./include/footer.php"); ?>

