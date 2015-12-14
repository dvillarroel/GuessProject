<?php

	require_once("manejomysql.php");
	conectar_bd();
	$codigo_cliente=$_GET['id'];
	$monto=$_POST['monto'];
	$fecha=$_POST['correo_electronico'];
	$observaciones=$_POST['observaciones'];
	$estado='vigente';
	
	$resultado7=consulta_bd("SELECT max(cod_saldo) as sal from anticipo where codigo_cliente=".$codigo_cliente);
	$registro7= sacar_registro_bd($resultado7);
	$cod_saldo=$registro7['sal'];
	
	$consulta="UPDATE anticipo SET monto_favor=$monto, fecha_registro='$fecha',observaciones='$observaciones' WHERE cod_saldo=$cod_saldo and codigo_cliente=$codigo_cliente";
//	echo $consulta;
	
	mysql_query($consulta) or die(header ("Location:buscar_cliente_solicitud.php?error_registro=2"));

	$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
	$querydatos = sacar_registro_bd($queryuser);
	$cod_vendedor=$querydatos['cod_user'];
	$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
	$querydatosuser = sacar_registro_bd($consultauser);
	$name = $querydatosuser['nombre'].' '.$querydatosuser['apellidoP'].' '.$querydatosuser['apellidoM'];
	
	//echo "update anticipouser set cod_user = $cod_vendedor, nombre_vendedor='$name' where id_anticipo=$cod_saldo";
	mysql_query("update anticipouser set cod_user = $cod_vendedor, nombre_vendedor='$name' where id_anticipo=$cod_saldo");
	
	
	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
EL ANTICIPO SE ACTUALIZO CORRECTAMENTE:

<br>
<br>
';

?>



