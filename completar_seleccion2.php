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
		$codigo_dp=$a['p']+1;
		$codigo_cliente=$_GET['id_cliente'];
		$codigo_pedido=$_GET['id_pedido'];
		$codigo_producto=$_GET['id_producto'];
		$cantidad_producto=$_POST['nombres'];
		$precio_unitario=$_GET['precio'];
		$monto=$precio_unitario*$cantidad_producto;
		
		
		//echo "insert into detalle_pedido values ($cantidad_producto,$monto,$precio_unitario, $codigo_dp, $codigo_pedido, $codigo_producto, null);";
		mysql_query("insert into detalle_pedido values ($cantidad_producto,$monto,$precio_unitario,$codigo_dp,$codigo_pedido,$codigo_producto,null);");
		
		header ("Location:buscar_cliente_pedido21.php?id_cliente=".$codigo_cliente."&menu1=Codigo_Cliente");
		exit;

		
		
	}
}
else
{

	if(!empty($_POST['menu1']))
	{
		$resultado= consulta_bd("SELECT max(cod_dp) as p FROM detalle_pedido" );
		$a=sacar_registro_bd($resultado);
		$codigo_dp=$a['p']+1;
		$codigo_cliente=$_GET['id_cliente'];
		$codigo_pedido=$_GET['id_pedido'];
		$codigo_producto=$_GET['id_producto'];
		$cantidad_producto=1;
		$precio_unitario=$_GET['precio'];
		$monto=$precio_unitario*$cantidad_producto;
		$codigo_equipo=$_POST['menu1'];
		
		//echo "SELECT cod_dp FROM detalle_pedido where cod_equipo=".$codigo_equipo." and cod_pedido=".$codigo_pedido;
		$usuario_consulta= consulta_bd("SELECT cod_dp FROM detalle_pedido where cod_equipo=".$codigo_equipo." and cod_pedido=".$codigo_pedido);
		
		
		if (mysql_num_rows($usuario_consulta) == 0)
		{
		//	echo "insert into detalle_pedido values ($cantidad_producto,$monto,$precio_unitario,$codigo_dp,$codigo_pedido,$codigo_producto,$codigo_equipo)";
			mysql_query("insert into detalle_pedido values ($cantidad_producto,$monto,$precio_unitario,$codigo_dp,$codigo_pedido,$codigo_producto,$codigo_equipo);");
		}
		
		header ("Location:buscar_cliente_pedido21.php?id_cliente=".$codigo_cliente."&menu1=Codigo_Cliente");
		exit;
		
	}
	else
	{
//	echo "hola";
		header ("Location:buscar_cliente_pedido21.php?id_cliente=".$codigo_cliente."&menu1=Codigo_Cliente");
		exit;
	}
}

