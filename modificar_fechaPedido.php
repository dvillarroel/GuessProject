<?php

	$codigo_cliente=$_GET['id_cliente'];
	$codigo_pedido=$_GET['id_pedido'];
	$fecha=$_POST['correo_electronico2'];
	$pagina=$_GET['id_pagina'];
	
	require_once("manejomysql.php");
	conectar_bd();
	//echo "UPDATE pedido set fecha=".$fecha." where cod_pedido=".$codigo_pedido.";";
	mysql_query("UPDATE pedido set fecha='$fecha' where cod_pedido=".$codigo_pedido.";" );

	header ("Location:".$pagina."?id_cliente=".$codigo_cliente."&menu1=Codigo_Cliente&id_pedido=".$codigo_pedido);
	exit;
	
?>