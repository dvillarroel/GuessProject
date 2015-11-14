<?php

if( !empty($_POST['ci']) && !empty($_POST['apellido_paterno']) )
{

	require_once("manejomysql.php");
	conectar_bd();
	$id=$_GET['id'];
	$codigo_producto=$_POST['codigo_cliente'];
	$name=$_POST['ci'];
	$nchino=$_POST['nchino'];
	$ningles=$_POST['ningles'];
	$precio=$_POST['apellido_paterno'];
	$stock=$_POST['stock'];
	$marca=$_POST['marca'];
	$industria=$_POST['industria'];
	$stock_minimo=$_POST['stock_min'];
	$unidad=$_POST['Unidad'];
	$observaciones=$_POST['observaciones'];
	$estado='activo';
	$imagen=$name.".jpg";
	$Precio_pref=$_POST['Precio_Pref'];
	$Precio_Reg=$_POST['Precio_Regular'];
	$Precio_Irreg=$_POST['Precio_Irregular'];
	//$estado='activo'

	

	$consulta="update producto set codigo_producto='$codigo_producto', nombre_producto='$name', nombre_chino='$nchino', nombre_ingles='$ningles', Precio_unitario_prod=$precio, stock=$stock, marca='$marca',industria='$industria', stock_minimo=$stock_minimo, unidad='$unidad', observaciones_producto='$observaciones', estado_producto='$estado', preferencial=$Precio_pref, regular=$Precio_Reg, irregular=$Precio_Irreg where codigo_producto='$id';";
	//echo $consulta;
	mysql_query($consulta);

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
LAS MODIFICACIONES SE REALIZARON CORRECTAMENTE:

<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

';












}

else
{
	header ("Location:registrar_producto.php?error_registro=1");
	exit;

}


?>



