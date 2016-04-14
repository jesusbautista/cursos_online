
<?php require_once("./include/connection_db.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php obtener_pagina();?>
<?php include("./include/header.php"); ?>
<table id="estructura">
			<tr>
				<td id="menu">
					<?php echo  menu($curso_reg,$capitulo_reg); ?>
					<br>
					<a href="new_course.php">Agregar Curso</a>
				</td>
				<td id="pagina">
					<?php if (!is_null($curso_reg)) {?>
					<h2> <?php	echo $curso_reg["nombre"]; ?> </h2>
					<?php } elseif(!is_null($capitulo_reg)) {?>
					<h2> <?php $capitulo_reg["nombre"]; ?></h2>';
					<div id="pagina_contenido">
					}
					<?php echo $capitulo_reg["contenido"]; ?>
					</div> 
					<?php }  else {?>
					"<h2>Selecciona un curso o capitulo</h2>";
					 <?php  } ?>
		</td>
	</tr>
		</table>
<?php require_once("./include/footer.php"); ?>

