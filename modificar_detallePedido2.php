<?php

require_once("manejomysql.php");
conectar_bd();

if(!empty($_POST['nombres']))
{
	if($_POST['nombres'] <=0)
	{
		
	}
	else
	{
		$resultado= consulta_bd("SELECT max(cod_dp) as p FROM detalle_pedido" );
		$a=sacar_registro_bd($resultado);
		$codigo_dp=$_GET['id_dp'];
		$codigo_cliente=$_GET['id_cliente'];
		$codigo_pedido=$_GET['id_pedido'];
		$codigo_producto=$_GET['id_producto'];
		$cantidad_producto=$_POST['nombres'];
		$precio_unitario=$_GET['precio'];
		$pagina=$_GET['id_pagina'];
		$monto=$precio_unitario*$cantidad_producto;
		
		
		//echo "insert into detalle_pedido values ($cantidad_producto,$monto,$precio_unitario, $codigo_dp, $codigo_pedido, $codigo_producto, null);";
		//echo "update detalle_pedido set cantidad=$cantidad_producto where cod_dp=$codigo_dp;";
		
		mysql_query("update detalle_pedido set cantidad=$cantidad_producto, monto=$monto where cod_dp=$codigo_dp;");
		
		
		header ("Location:".$pagina."?id_cliente=".$codigo_cliente."&menu1=Codigo_Cliente&id_pedido=".$codigo_pedido);
		exit;

		
		
	}
}
else
{

	if(!empty($_POST['menu1']))
	{
		$resultado= consulta_bd("SELECT max(cod_dp) as p FROM detalle_pedido" );
		$a=sacar_registro_bd($resultado);
		$codigo_dp=$_GET['id_dp'];
		$codigo_cliente=$_GET['id_cliente'];
		$codigo_pedido=$_GET['id_pedido'];
		$codigo_producto=$_GET['id_producto'];
		$cantidad_producto=1;
		$precio_unitario=$_GET['precio'];
		$monto=$precio_unitario*$cantidad_producto;
		$codigo_equipo=$_POST['menu1'];
		$pagina=$_GET['id_pagina'];
		
		$usuario_consulta= consulta_bd("SELECT cod_dp FROM detalle_pedido where cod_equipo=".$codigo_equipo );
		
		
		if (mysql_num_rows($usuario_consulta) == 0)
		{
			//echo "update detalle_pedido set cod_equipo=$codigo_equipo where cod_dp=$codigo_dp;";
			mysql_query("update detalle_pedido set cod_equipo=$codigo_equipo where cod_dp=$codigo_dp;");
		}
		header ("Location:".$pagina."?id_cliente=".$codigo_cliente."&menu1=Codigo_Cliente&id_pedido=".$codigo_pedido);
		exit;
		
	}
	else
	{
		header ("Location:buscar_cliente_pedido21.php?id_cliente=".$codigo_cliente."&menu1=Codigo_Cliente");
		exit;
	}
}

