<?php

if(!empty($_POST['cantidad']))
{

	require_once("manejomysql.php");
	conectar_bd();
	$cantidad=$_POST['cantidad'];
	$cod=$_GET['cod'];
	$id_cliente=$_GET['id_cliente'];
	$id_pedido=$_GET['id_pedido'];
	$id_dp=$_GET['id_dp'];
	//echo $id_dp;
	
	$consulta="SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria, stock_minimo, observaciones_producto, imagen1, preferencial, regular, irregular from producto where codigo_producto='$cod'";
	//echo $consulta;
	$usuario_consulta = mysql_query($consulta);
	$registro= sacar_registro_bd($usuario_consulta);


		$consulta2="SELECT codigo_detalle, cod_usuario, codigo_producto, id_venta, codigo_cliente, cantidad, precio_unitario, monto_parcial FROM detalle_venta WHERE codigo_detalle=".$id_dp;
		//echo $consulta2;
		//echo $consulta;
		$usuario_consulta2 = mysql_query($consulta2);
		$registro2= sacar_registro_bd($usuario_consulta2);
		$cantidadDB=$registro2['cantidad'];
		$new_stock=$registro['stock']+$cantidadDB;

	if($cantidad <= $new_stock)
	{
		$update="UPDATE producto SET STOCK=$new_stock WHERE CODIGO_PRODUCTO='$cod'";
		mysql_query($update);

		
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
		
		$consulta="UPDATE detalle_venta SET CANTIDAD=".$cantidad.", PRECIO_UNITARIO= ".$precio.", MONTO_PARCIAL= ".$total." WHERE CODIGO_DETALLE=".$id_dp;
		//echo $consulta;
		mysql_query($consulta);
		
		$new_stock2=$new_stock-$cantidad;
		$consulta="UPDATE producto SET STOCK=$new_stock2 WHERE CODIGO_PRODUCTO='$cod'";
		//echo $consulta;
		mysql_query($consulta);
		
		header ("Location:buscar_cliente_pedido2.php?menu1=1&buscar=".$id_cliente);
		exit;
							
	}
	else
	{
		header ("Location:mod_producto.php?error_registro=2");
		exit;
	}
		
}

else
{
	header ("Location:mod_producto.php?error_registro=1");
	exit;
}

?>



