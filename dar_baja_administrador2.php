<?php
$estado=$_GET['estado'];
$codigo_cliente=$_GET['id'];

require_once("manejomysql.php");
conectar_bd();

if($estado == 'Activo')
{
	mysql_query("update usuario set estado='Inactivo' WHERE cod_usuario=".$codigo_cliente );
	header ("Location:dar_baja_administrador.php");
	exit;
	
}
else
{
	mysql_query("update usuario set estado='Activo' WHERE cod_usuario=".$codigo_cliente );
	header ("Location:dar_baja_administrador.php");
	exit;
}
?>
