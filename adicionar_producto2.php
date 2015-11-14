<?php

if(!empty($_POST['cantidad']))
{

	require_once("manejomysql.php");
	conectar_bd();
	$cantidad=$_POST['cantidad'];
	$cod=$_GET['cod'];
	$id_cliente=$_GET['id_cliente'];
	$id_pedido=$_GET['id_pedido'];
	
	$consulta="SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria, stock_minimo, observaciones_producto, imagen1, preferencial, regular, irregular from producto where codigo_producto='$cod'";
	//echo $consulta;
	$usuario_consulta = mysql_query($consulta);
	$registro= sacar_registro_bd($usuario_consulta);

	if($cantidad <= $registro['stock'])
	{
		$resulto= consulta_bd("SELECT max(codigo_detalle) as p FROM detalle_venta" );
		$a=sacar_registro_bd($resulto);
		$nc=$a['p']+1;

		
		$consulta_cliente="SELECT tipo_cliente FROM cliente WHERE codigo_cliente=$id_cliente;";
	//echo $consulta;
		$consult_cliente = mysql_query($consulta_cliente);
		$registro2= sacar_registro_bd($consult_cliente);
		
		if($registro2['tipo_cliente'] == "Preferencial")
		{
			$total=$cantidad*$registro['preferencial'];
			$precio=$registro['preferencial'];
		}
		if($registro2['tipo_cliente'] == "Regular")
		{
			$total=$cantidad*$registro['regular'];
			$precio=$registro['regular'];
		}
		if($registro2['tipo_cliente'] == "Irregular")
		{
			$total=$cantidad*$registro['irregular'];
			$precio=$registro['irregular'];
		}
		if($registro2['tipo_cliente'] == "Nuevo S/T")
		{
			$total=$cantidad*$registro['precio_unitario_prod'];
			$precio=$registro['precio_unitario_prod'];
		}		
		
		$consulta="INSERT INTO detalle_venta (CODIGO_DETALLE, COD_USUARIO, CODIGO_PRODUCTO, ID_VENTA, CODIGO_CLIENTE, CANTIDAD, PRECIO_UNITARIO, MONTO_PARCIAL) VALUES ($nc, 1, '$cod', $id_pedido, $id_cliente, $cantidad, $precio,$total)";
		$usuario_consulta = mysql_query($consulta);
		
		$new_stock=$registro['stock']-$cantidad;
		$consulta="UPDATE producto SET STOCK=$new_stock WHERE CODIGO_PRODUCTO='$cod'";
		$usuario_consulta = mysql_query($consulta);
		
		header ("Location:buscar_cliente_pedido2.php?menu1=1&buscar=".$id_cliente);
		exit;
							
	}
	else
	{
		header ("Location:adicionar_producto.php?error_registro=2");
		exit;
	}
		
}

else
{
	header ("Location:adicionar_producto.php?error_registro=1");
	exit;
}

?>



