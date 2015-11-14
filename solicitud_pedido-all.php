<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>DETALLE DE PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
</head>
<?php 
	$codigo_cliente=$_GET['id_cliente'];
	$codigo_pedido=$_GET['id_pedido'];
	$fecha_pedido=$_GET['fecha'];
	$cod_saldo=$_GET['cod_saldo'];
	
	
	require_once("manejomysql.php");
	conectar_bd();

	$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente, descuento, tipo_cliente FROM cliente WHERE codigo_cliente=$codigo_cliente;" );
	$registro= sacar_registro_bd($usuario_consulta);
	$partirFecha=split("-",$fecha_pedido);

	if($cod_saldo != null)
	{
	$queryuser2 = mysql_query("SELECT cod_saldo, monto_favor, fecha_registro, estado, observaciones FROM anticipo where cod_saldo=$cod_saldo") or die("no se realizo");
	
	
$querydatos2 = sacar_registro_bd($queryuser2);
$montosaldo=$querydatos2['monto_favor'];
	}
	else
	{
		$montosaldo=0;
		
		}


echo '
<body>

<div id="Layer5" style="position:absolute; left:13px; top:6px; width:115px; height:86px; z-index:5"><img src="images/test.jpg" width="119" height="85"></div>
<div id="Layer1" style="position:absolute; left:456px; top:22px; width:138px; height:41px; z-index:1">
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="35%" class="campotablasSP2"><div align="center">Dia</div></td>
      <td width="25%" class="campotablasSP2"><div align="center">Mes</div></td>
      <td width="40%"  class="campotablasSP2"><div align="center">A&ntilde;o</div></td>
    </tr>
    <tr> 
      <td class="campotablasSP"><div align="center">'.$partirFecha[2].'</div></td>
      <td class="campotablasSP"><div align="center">'.$partirFecha[1].'</div></td>
      <td class="campotablasSP"><div align="center">'.$partirFecha[0].'</div></td>
    </tr>
  </table>
</div>';

echo '<div id="Layer2" style="position:absolute; left:161px; top:41px; width:279px; height:36px; z-index:2"><font size="3" class="campotablas"><strong>DETALLE  
  DE PEDIDO</strong></font></div>
<div id="Layer8" style="position:absolute; left:14px; top:101px; width:580px; height:71px; z-index:8">';

	
	$usuario_consulta2 = mysql_query("SELECT id_venta, fecha_venta, total, total_descuento, estado_venta FROM venta WHERE id_venta=".$codigo_pedido);	
	
	//echo "SELECT id_venta, fecha_venta, total, total_descuento, estado_venta FROM venta WHERE id_venta=".$codigo_pedido;

	$registro2= sacar_registro_bd($usuario_consulta2);

	$ci=$registro['ci_cliente'];
	$nombre_completo=$registro['nombre_cliente']." ".$registro['apellido_paterno'];
	$direccion=$registro['direccion_cliente'];
	$telefono=$registro['telefono_cliente'];
	$observaciones_cliente=$registro['observaciones_cliente'];
	$fecha_pedido2=isset($a["fecha_venta"]) ? $a["fecha_venta"] : '';  
	$partirFech2a=split("-",$fecha_pedido2);
	
	$monto_total=isset($a["total"]) ? $a["total"] : '';
	$estado_pedido2=isset($a["estado_venta"]) ? $a["estado_venta"] : '';
	

	//echo $codigo_cliente;
	//echo $codigo_pedido;
	
	$monto_total2 = mysql_query("Select SUM(monto_parcial) as p from detalle_venta where id_venta=$codigo_pedido;");
	$mont=sacar_registro_bd($monto_total2);
	


	echo '
  <table width="98%" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="14%" class="campotablasSP3">Se&ntilde;or(a): </td>
      <td width="45%" class="campotablasSP3">&nbsp;'.$nombre_completo.'</td>
      <td width="10%" class="campotablasSP3">C.I. Nr.:</td>
      <td width="31%" class="campotablasSP3">&nbsp;'.$ci.'</td>
    </tr>
    <tr> 
      <td class="campotablasSP3">Direcci&oacute;n: </td>
      <td class="campotablasSP3">&nbsp;'.$direccion.'</td>
      <td class="campotablasSP3">Telefono:</td>
      <td class="campotablasSP3">&nbsp;'.$telefono.'</td>
    </tr>
    <tr> 
      <td colspan="4" class="campotablasSP3">De acuerdo a solicitud del cliente, remitimos a Ud. el siguiente 
        pedido:</td>
    </tr>
  </table>';

echo '
  <br>

  <table width="99%" border="1" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="15%" class="campotablasSP2"><div align="center">Codigo Pieza</div></td>
      <td width="15%" class="campotablasSP2"><div align="center">Nombre Pieza</div></td>
      <td width="10%" class="campotablasSP2"><div align="center">Marca</div></td>
      <td width="10%" class="campotablasSP2"><div align="center">Industria</div></td>
      <td width="10%" class="campotablasSP2"><div align="center">Cantidad</div></td>
      <td width="10%" class="campotablasSP2"><div align="center">Precio Unitario</div></td>
      <td width="21%" class="campotablasSP2"><div align="center">Total </div></td>
    </tr>';
    
	$usuario_consulta3 = mysql_query("SELECT codigo_detalle, cod_usuario, codigo_producto, id_venta, codigo_cliente, cantidad, precio_unitario, monto_parcial FROM detalle_venta WHERE id_venta=".$codigo_pedido);	

	
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta3); $i++)
	{
		echo '<tr>'; 
	    
		$a=sacar_registro_bd($usuario_consulta3);
					
		$codigo_producto=$a['codigo_producto'];
		$codigo_dp=$a['codigo_detalle'];
		$cantidad=$a['cantidad'];
		$monto=$a['monto_parcial'];
		$precio_unitario=$a['precio_unitario'];

				
		$usuario_consulta4 = mysql_query("SELECT nombre_producto, stock, precio_unitario_prod, marca, industria, observaciones_producto FROM producto WHERE codigo_producto='$codigo_producto';" );	
		//echo "SELECT nombre_producto, stock, precio_unitario_prod, marca, industria, observaciones_producto FROM producto WHERE codigo_producto=".$codigo_producto ;
		
		$b=sacar_registro_bd($usuario_consulta4);
		$nombre_producto=$b['nombre_producto'];
		$marca=$b['marca'];
		$Industria=$b['industria'];
			
		echo "
		
		<td class='campotablasSP'>".$codigo_producto."</td>";
		
		echo "
		<td class='campotablasSP'>".$nombre_producto."</td>
		<td class='campotablasSP'>".$marca."</td>
		<td class='campotablasSP'>".$Industria."</td>
		<td class='campotablasSP'>".$cantidad."</td>	
		<td class='campotablasSP'>".$precio_unitario."</td>			
		<td class='campotablasSP'><div align='center'>".$monto."</div></td>
		";
		
		echo '</tr>';	
					
	}

$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
$querydatos = sacar_registro_bd($queryuser);
$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
$querydatosuser = sacar_registro_bd($consultauser);



	echo '

    <tr> 
      <td colspan="6" class="campotablasSP">Total Bs.</td>
      <td class="campotablasSP2"><div align="center">&nbsp;'.$mont['p'].'</div></td>
    </tr>
    <tr>
    <td colspan="6" class="campotablasSP">A Cuenta:</td>
    <td class="campotablasSP2"><div align="center">'.$montosaldo.'</td>
    </tr>
    <tr>
    <td colspan="6" class="campotablasSP">Saldo:</td>
    <td class="campotablasSP2" ><div align="center">';
	
	$total_saldo=$montosaldo - $mont['p'];
	echo $total_saldo; 
	echo '</div></td>
    </tr>
        <tr>
    <td colspan="1" class="campotablasSP">Vendido por:</td>
    <td colspan="6" class="campotablasSP">';
	echo $querydatosuser['nombre'].' '.$querydatosuser['apellidoP'].' '.$querydatosuser['apellidoM'];
	echo '</td>
    </tr>

  </table>
  <br>
  <div id="Layer4"></div>
</div>

</body>
</html>';

  

?>


