
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
					<?php 
					#salida, regresa la matriz fetch array de php el nombre del curso
						echo $curso_reg["nombre"];
						echo $capitulo_select;
					 ?>
		</td>
	</tr>
		</table>
<?php require_once("./include/footer.php"); ?>

