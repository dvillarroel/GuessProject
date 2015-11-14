<?php

	$cod_pedido=$_GET['id_pedido'];
	$monto=$_GET['monto'];
	$monto_pago=$_POST['correo_electronico2'];
	
	require_once("manejomysql.php");
	conectar_bd();
	
	if($monto== $monto_pago)
	{
		$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resultado7);
		$fecha=$registro7['date'];
		
		mysql_query("UPDATE pedido set estado_pago='si', fecha_cancelado='$fecha' where cod_pedido=".$cod_pedido );
		$mensaje="EL MONTO TOTAL DEL PEDIDO FUE CANCELADO POR COMPLETO";
		
		$resultado7=consulta_bd("SELECT max(id_pago_pedido) as cod from pago_pedidos");
		$registro7= sacar_registro_bd($resultado7);
		$codigo=$registro7['cod']+1;
		
		consulta_bd("INSERT INTO PAGO_PEDIDOS VALUES ($codigo, $cod_pedido, 1, $monto_pago, $monto_pago,'$fecha','si')");
		
	}
	else
	{
		$resultado7=consulta_bd("SELECT max(id_pago_pedido) as cod from pago_pedidos");
		$registro7= sacar_registro_bd($resultado7);
		$codigo=$registro7['cod']+1;
		$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resultado7);
		$fecha=$registro7['date'];
		
		consulta_bd("INSERT INTO PAGO_PEDIDOS VALUES ($codigo, $cod_pedido, 1, $monto_pago, $monto_pago, '$fecha', 'No')");

		$mensaje="EL MONTO TOTAL DEL PEDIDO NO FUE CANCELADO POR COMPLETO, EL PEDIDO PASARA A LA LISTA DE PEDIDOS POR COBRAR";

		
	}
	
?> 
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<form action="registro_pedido_monto.php?id_pedido=<? echo $cod_pedido; ?>" method="post">
<div align="center">
  <p>&nbsp;</p>
    <p><font color="#660000" face="Verdana, Arial, Helvetica, sans-serif">EL PAGO 
      DEL PEDIDO SE REGISTRO CORRECTAMENTE </font></p>
    <p><font color="#660000" face="Verdana, Arial, Helvetica, sans-serif">NOTA: <? echo $mensaje;?>
      </font></p>


  <p>&nbsp; </p>
</div>

</form>
<table width="60%" border="0" align="center" >
    <tr>
       <td align="center"><p align="center">&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p> </td> </form>
    </tr>
  </table>
  
  
  
  
  
  
 
 
 
 
  
  



