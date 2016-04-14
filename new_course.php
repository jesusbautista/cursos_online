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
					
		</td>
	</tr>
		</table>
<?php require_once("./include/footer.php"); ?>

