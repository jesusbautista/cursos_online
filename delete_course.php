<?php require_once("./include/connection_db.php"); ?>
<?php require_once("./include/functions.php"); ?>
<?php 
	#intval transforma una variable a entero  
	if(intval($_GET["curso"])==0)
	{
		header("Location: content.php");
		exit;
	}

	$consulta = "DELETE FROM cursos WHERE id=" . $_GET["curso"];
	mysql_query($consulta,$conexion);

	if(mysql_affected_rows()==1)
	{
		header("Location: content.php");
		exit;

	}
	else
	{
		echo "<p>Se ha producido un error al tratar de eliminar un curso:". mysql_error(). "</p>";
	}
?>

<?php 
if (isset($conexion))
 {
	mysql_close($conexion);
}
 ?>