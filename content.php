
<?php require_once("./include/connection_db.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php 
	#Recuperando valores GET
	if(isset($GET["curso"]))
	{
		$curso_select=$GET['curso'];
		#en caso de que no tenga algun valor devuelve un null
		$capitulo="";
		#funcion que devuelve los cursos
		$curso_reg=obtenerCursoPorId($curso_select);
		#cuando tenga un valor vacio
		$capitulo_reg=NULL;
	}
	elseif(isset($GET["capitulo"]))
	{
		$capitulo_select=$GET['capitulo'];
		#lo mismo que el anterior
		$curso="";
		$capitulo_reg=obtenerCapituloPorId($capitulo_select);
		$curso_reg=NULL;
	}
	else
	{
		$capitulo_select="";
		$curso_select="";
		$capitulo_reg=NULL;
		$curso_reg=NULL;
	}

 ?>
<?php include("./include/header.php"); ?>
<table id="estructura">
			<tr>
				<td id="menu">
					<ul class="cursos"> 
					<?php #Realizando la consulta 
					$cursos =obtenerCursos();

					while ($curso=mysql_fetch_array($cursos)) 
					{
						#separando las listas en varias cadena
						echo "<li";
						if($curso["id"]==$curso_select)
						{
							echo "class=\"selected\"";
						}
						
						echo  "><a href=\"content.php?curso=". urlencode($curso["id"]) .
						"\">". $curso["nombre"]. "</a> </li> <ul class='capitulos'>";
						
						$capitulos=obtenerCapitulosPorCursos($curso["id"]);
					
					//Busquedad de capitulos dentro de la base de datos cursos
					while ($capitulo=mysql_fetch_array($capitulos)) 
					{
						echo "<li";
						if($curso["id"]==$curso_select)
						{
							echo "class=\"selected\"";
						}
						echo   "><a href=\"content.php?capitulos=". urlencode($capitulo["id"]). 
						"\">". $capitulo["nombre"]. "</a> </li>";
					}
					}
					?>
					</ul>
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

