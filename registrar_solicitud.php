<?php

	require_once("manejomysql.php");
	conectar_bd();
	$codigo_cliente=$_GET['id'];
	$monto=$_POST['monto'];
	$fecha=$_POST['correo_electronico'];
	$observaciones=$_POST['observaciones'];
	$estado='vigente';
	
	$resultado7=consulta_bd("SELECT max(cod_saldo) as sal from anticipo" );
	$registro7= sacar_registro_bd($resultado7);
	$cod_saldo=$registro7['sal']+1;
	
	$consulta="insert into anticipo values($cod_saldo, $codigo_cliente, $monto, '$fecha', null, null, 'vigente', '$observaciones')";
	//echo $consulta;
	mysql_query($consulta) or die(header ("Location:buscar_cliente_solicitud.php?error_registro=2"));

	$resultado8=consulta_bd("SELECT id from anticipouser");
	$registro8= sacar_registro_bd($resultado8);
	$id_anticipo_user=$registro8['id']+1;
	
	$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
	$querydatos = sacar_registro_bd($queryuser);
	$cod_vendedor=$querydatos['cod_user'];
	$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
	$querydatosuser = sacar_registro_bd($consultauser);
	$name = $querydatosuser['nombre'].' '.$querydatosuser['apellidoP'].' '.$querydatosuser['apellidoM'];
		
	$consulta="insert into anticipouser values($id_anticipo_user, $cod_vendedor, '$name',$cod_saldo)";
	mysql_query($consulta);
	
	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
EL ANTICIPO SE REGISTRO CORRECTAMENTE:

<br>
<br>
';

?>



