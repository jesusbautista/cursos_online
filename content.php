
<?php require_once("./include/connection_db.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php 
	#Recuperando valores GET
	if(isset($GET["curso"]))
	{
		$curso_select=$GET['curso'];
		#en caso de que no tenga algun valor devuelve un null
		$capitulo="";
	}
	elseif(isset($GET["capitulo"]))
	{
		$capitulo_select=$GET['capitulo'];
		#lo mismo que el anterior
		$curso="";
	}
	else
	{
		$capitulo_select="";
		$curso_select="";
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
						echo "<li><a href=\"content.php?curso=". urlencode($curso["id"]) .
						"\">". $curso["nombre"]. "</a> </li> <ul class='capitulos'>";
						
						$capitulos=obtenerCapitulosPorCursos($curso["id"]);
					
					//Busquedad de capitulos dentro de la base de datos cursos
					while ($capitulo=mysql_fetch_array($capitulos)) 
					{
						echo "<li><a href=\"content.php?capitulos=". urlencode($capitulo["id"]). "\">". $capitulo["nombre"]. "</a> </li>";
					}
					}
					?>
					</ul>
				</td>
				<td id="pagina">Edicion de contenidos
		</td>
	</t
		</table>
<?php require_once("./include/footer.php"); ?>

