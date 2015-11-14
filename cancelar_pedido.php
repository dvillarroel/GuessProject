<?php

require_once("manejomysql.php");
conectar_bd();

$codigo_pedido=$_GET['id_pedido'];
$codigo_cliente=$_GET['id_cliente'];

//echo "DELETE FROM detalle_venta where id_venta=".$codigo_pedido;
//echo "delete from venta where id_venta=".$codigo_pedido;
	$usuario_consulta3 = mysql_query("SELECT codigo_detalle, cod_usuario, codigo_producto, id_venta, codigo_cliente, cantidad, precio_unitario, monto_parcial FROM detalle_venta WHERE id_venta=".$codigo_pedido);	

	
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta3); $i++)
	{
		
	    
		$a=sacar_registro_bd($usuario_consulta3);
					
		$codigo_producto=$a['codigo_producto'];
		$codigo_dp=$a['codigo_detalle'];
		$cantidad=$a['cantidad'];
		$monto=$a['monto_parcial'];
		$precio_unitario=$a['precio_unitario'];

				
		$usuario_consulta4 = mysql_query("SELECT nombre_producto, stock, precio_unitario_prod, marca, industria, observaciones_producto FROM producto WHERE codigo_producto='$codigo_producto';" );	
		//echo "SELECT nombre_producto, stock, precio_unitario_prod, marca, industria, observaciones_producto FROM producto WHERE codigo_producto=".$codigo_producto ;
		
		$b=sacar_registro_bd($usuario_consulta4);
		$montostock=$b['stock'];
		$updatestock=$montostock+$cantidad;
		//echo "UPDATE producto SET STOCK=$updatestock WHERE CODIGO_PRODUCTO='$codigo_producto'";
		mysql_query("UPDATE producto SET STOCK=$updatestock WHERE CODIGO_PRODUCTO='$codigo_producto'");
	}


consulta_bd("DELETE FROM detalle_venta where id_venta=".$codigo_pedido );
consulta_bd("delete from venta where id_venta=".$codigo_pedido );


echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
EL PEDIDO FUE CANCELADO

<br>';

echo "<a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$codigo_cliente.">Realizar Nuevo Pedido para el mismo Cliente</a>";
echo '<br> <p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

