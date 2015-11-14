<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SOLICITUD DE PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

</head>

<body>
<div id="Layer2" style="position:absolute; left:296px; top:28px; width:279px; height:36px; z-index:2"><font size="3" class="campotablas"><strong>Lista 
  de Pedidos por Cobrar</strong></font></div>
<div id="Layer3" style="position:absolute; left:17px; top:86px; width:860px; height:100px; z-index:9">
  <table width="99%" border="1" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="6%" class="campotablasSP2"><div align="center">Codigo Pedido</div></td>
      <td width="15%" class="campotablasSP2"><div align="center">Nombre Completo Cliente</div></td>
	  <td width="15%" class="campotablasSP2"><div align="center">Direccion</div></td>
	  <td width="12%" class="campotablasSP2"><div align="center">Telefono</div></td>
      <td width="10%" class="campotablasSP2"><div align="center">Monto Total del Pedido </div></td>
      <td width="10%" class="campotablasSP2"><div align="center">Monto Pagado</div></td>
      <td width="10%" class="campotablasSP2"><div align="center">Monto por Cobrar</div></td>      
	  <td width="19%" class="campotablasSP2"><div align="center">Empleado que Realizo entrega</div></td>
	  <td width="10%" class="campotablasSP2"><div align="center">Registrar Pago</div></td>
    </tr>
    <? 
	require_once("manejomysql.php");
	conectar_bd();
	$usuario_consulta = mysql_query("select e.cod_pedido, e.monto_total, c.nombre_cliente, c.apellido_paterno, c.apellido_materno, c.direccion_cliente, c.telefono_cliente, c.observaciones_cliente
	from cliente c, pedido e where e.estado='Ejecutado' and e.estado_pago!='si' and e.codigo_cliente=c.codigo_cliente order by cod_pedido;");
	
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
	
		$a=sacar_registro_bd($usuario_consulta);
			
		$consultaPago="select max(monto) as monto from pago_pedidos where cod_pedido=".$a['cod_pedido'];
		$consultaPago2 = mysql_query($consultaPago);
		$a2=sacar_registro_bd($consultaPago2);
		
		$consultaEmp="select nombre_empleado from ped_emp where cod_ped=".$a['cod_pedido'];
		$consultaEmp2 = mysql_query($consultaEmp);
		$a3=sacar_registro_bd($consultaEmp2);
		
		
		$montoPagado=$a2['monto'];
		$montoCobrar=$a['monto_total']-$montoPagado;
		
	
		echo '<tr>'; 
	    
		
					
		echo "
		
		<td class='campotablasSP'>&nbsp;".$a['cod_pedido']."</td>			
		<td class='campotablasSP'>&nbsp;".$a['nombre_cliente']." ".$a['apellido_paterno']." ".$a['apellido_materno']."</td>
		<td class='campotablasSP'>&nbsp;".$a['direccion_cliente']."</td>
		<td class='campotablasSP'>&nbsp;".$a['telefono_cliente']."</td>
		<td class='campotablasSP'>&nbsp;".$a['monto_total']."</td>
		<td class='campotablasSP'>&nbsp;".$montoPagado."</td>
		<td class='campotablasSP'>&nbsp;".$montoCobrar."</td>
		<td class='campotablasSP'>&nbsp;".$a3['nombre_empleado']."</td>
		<td class='campotablas'><a href=lista_por_cobrar2.php?id_pedido=".$a['cod_pedido']."&montoCobrar=".$montoCobrar."&montoTotal=".$a['monto_total']."&montoPagado=".$montoPagado.">Registrar Pago</a></td>";

		
		echo '</tr>';	
					
	}



	?>


  </table>
  <br>
  <div id="Layer4"></div>
</div>

</body>
</html>
