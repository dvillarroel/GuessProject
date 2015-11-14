<?php

if(!empty($_POST['codigo_cliente']))
{

	require_once("manejomysql.php");
	conectar_bd();
	$codigo_cliente=$_POST['codigo_cliente'];
	$Nombre=$_POST['ci'];
	$apellidos=$_POST['apellido_paterno'];
	$ci=$_POST['apellido_materno'];
	$telefono=$_POST['nombres'];
	$direccion=$_POST['direccion'];
	$correo_elec=$_POST['telefono'];
	$fecha_registro=$_POST['correo_electronico'];
	$Zona=$_POST['1'];
	$descuento_cliente=$_POST['direccion2'];
	$observaciones=$_POST['observaciones'];
	$tipo_cliente=$_POST['12'];
	//$estado='activo';
	
	$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	
	$consulta="insert into cliente values($codigo_cliente, $ci, '$Nombre','$apellidos','$Zona', '$direccion','$telefono','$correo_elec', '$fecha_registro', 'Activo', '$observaciones', $descuento_cliente, '$tipo_cliente');";
	mysql_query($consulta) or die(header ("Location:registrar_cliente.php?error_registro=2"));

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
EL CLIENTE SE REGISTRO CORRECTAMENTE:

<br>';

echo "<a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$codigo_cliente.">Realizar Pedido</a>";
echo '<br>
';
}

else
{
	header ("Location:registrar_cliente.php?error_registro=1");
	exit;

}


?>



