<?php

require_once("manejomysql.php");

$codigo_cliente=$_GET['id_cliente'];
$codigo_pedido=$_GET['id_pedido'];
$dp=$_GET["id"];

conectar_bd();
//echo "delete from detalle_pedido where cod_dp=".$dp;
$usuario_consulta = mysql_query("SELECT codigo_detalle, cod_usuario, codigo_producto, id_venta, codigo_cliente, cantidad, precio_unitario, monto_parcial FROM detalle_venta WHERE codigo_detalle=".$dp);		
$b=sacar_registro_bd($usuario_consulta);

$codigo_producto=$b['codigo_producto'];

$usuario_consulta2 = mysql_query("SELECT nombre_producto, stock, precio_unitario_prod, marca, industria, observaciones_producto FROM producto WHERE codigo_producto='$codigo_producto';" );	
$a=sacar_registro_bd($usuario_consulta2);

$actualizar_stock=$b['cantidad'] + $a['stock'];
$codigo_producto=$b['codigo_producto'];

$usuario_consulta2 = mysql_query("UPDATE producto SET STOCK=".$actualizar_stock." WHERE CODIGO_PRODUCTO='$codigo_producto';" );	
//echo "UPDATE producto SET STOCK=".$actualizar_stock." WHERE CODIGO_PRODUCTO='$codigo_producto';";

mysql_query("delete from detalle_venta where codigo_detalle=".$dp);

header ("Location:buscar_cliente_pedido2.php?menu1=1&buscar=".$codigo_cliente);
?>

