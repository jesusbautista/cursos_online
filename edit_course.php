<?php require_once("./include/connection_db.php"); ?>
<?php require_once("./include/functions.php"); ?>
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
						Nombre de curso <input name="nombre">
					</p>
					<p>Posicion:
						<select name="posicion">
							<?php
							$todos_los_cursos=obtenerCursos();
							$num_cursos= mysql_num_rows($todos_los_cursos);
							for ($i=1; $i <=$num_cursos+1; $i++) 
							{ 
								echo "<option value=\"{$i}\">{$i}</option>";
							}

							?>
							
							
						</select>
						</p>
						<p>Visibilidad:
							<input type="radio" value="0" name="visibilidad"  />0
							<input type="radio" value="1" name="visibilidad"  />1
						</p>
						<input type="submit" value="Añadir Curso">
					</form>
					<br>
					<a href="content.php">Cancelar</a>
				</td>
					</tr>
			</table>
<?php require_once("./include/footer.php"); ?>

<