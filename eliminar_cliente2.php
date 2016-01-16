<?php
$estado=$_GET['estado'];
$codigo_cliente=$_GET['id'];

require_once("manejomysql.php");
conectar_bd();

if($estado == 'Activo')
{
	mysql_query("update cliente set estado_cliente='Inactivo' WHERE codigo_cliente=".$codigo_cliente );
	header ("Location:eliminar_cliente.php");
	exit;
	
}
else
{
	mysql_query("update cliente set estado_cliente='Activo' WHERE codigo_cliente=".$codigo_cliente );
	header ("Location:eliminar_cliente.php");
	exit;
}
?>
