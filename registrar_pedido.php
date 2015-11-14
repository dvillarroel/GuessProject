<?php
$codigo_pedido=$_GET['id_pedido'];
$codigo_cliente=$_GET['id_cliente'];
$codigo_saldo=$_GET['id_saldo'];

require_once("manejomysql.php");
conectar_bd();

$monto_total2 = mysql_query("Select SUM(monto_parcial) as p from detalle_venta where id_venta=$codigo_pedido;");
$mont=sacar_registro_bd($monto_total2);
$total=$mont['p'];
if($total > 0)
{ mysql_query("UPDATE venta SET TOTAL=$total, estado_venta='Ejecutado' WHERE ID_VENTA=$codigo_pedido");
	if($codigo_pedido > 0)
	{
		mysql_query("UPDATE anticipo SET monto_pedido=$total, estado='Entregado' WHERE cod_saldo=$codigo_saldo");
	}
echo '
			<div align="center"><font color="#330000" size="4" class="titl">EL PEDIDO FUE REGISTRADO CORRECTAMENTE</font><br>
   
  </div>';	
}
else
{
		echo '<br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">EL PEDIDO NO TIENE NINGUN PRODUCTO ADICIONADO, REVISAR PEDIDO</font></td></tr>
    		<tr><td><font color="#003366">';
			
echo "<a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$codigo_cliente.">VOLVER AL PEDIDO</a></p>";
echo'	</font></td></tr>

  		</tr>
	</table>';	
}

?>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<body background="body2.jpg"><BR><BR>

  <p>&nbsp;</p><p>&nbsp;</p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>
<p>&nbsp;</p>