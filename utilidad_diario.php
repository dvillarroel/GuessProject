<?php

require_once("manejomysql.php");
conectar_bd();


$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
$registro7= sacar_registro_bd($resultado7);
$fechaDay=$registro7['date'];

//echo "SELECT cod_pedido, codigo_cliente, fecha, monto_total, estado FROM pedido WHERE estado='Ejecutado';";
$usuario_consulta = mysql_query("SELECT cod_pedido, monto_amortizacion,  monto, completo FROM pago_pedidos WHERE fecha_pago='$fechaDay';" );
//echo "SELECT cod_pedido, monto_amortizacion,  monto, completo FROM pago_pedidos WHERE fecha_pago='$fechaDay';";	

//echo "SELECT cod_pedido, codigo_cliente,  fecha_cancelado, monto_total, estado FROM pedido WHERE estado='Ejecutado' and fecha_cancelado='$fechaDay';";	
if (mysql_num_rows($usuario_consulta) != 0)
{

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br>
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    		<tr> 
    			<td colspan="8" class="title"><div align="center">INGRESO POR PEDIDOS REALIZADO</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Codigo Pedido</td>
			    <td class="title">Nombre Cliente</td>
				<td class="title">Monto Total</td>
				<td class="title">Monto Cancelado</td>
			    <td class="title">Monto Restante</td>
			    <td class="title">Fecha de Pago</td>
				<td class="title">Estado Pedido</td>
				<td class="title">Detalle Pedido</td>
				</tr>';

				for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
					//$registro= sacar_registro_bd($usuario_consulta);
					$a=sacar_registro_bd($usuario_consulta);
					$cod_pedido=$a['cod_pedido'];
					$monto_cancelado=$a['monto_amortizacion'];
					
					
					$usuario_consultaa = mysql_query("SELECT cod_pedido, codigo_cliente, monto_total, estado_pago FROM pedido WHERE cod_pedido=".$cod_pedido );	

					echo '<tr>'; 
					$a1=sacar_registro_bd($usuario_consultaa);
					
					$cod_pedido=$a1['cod_pedido'];
					$codigo_cliente=$a1['codigo_cliente'];
					$monto=$a1['monto_total'];
					$estado=$a1['estado_pago'];
					$monto_restante=$monto-$a['monto'];
					
					
					$usuario_consulta2 = mysql_query("SELECT nombre_cliente, apellido_paterno, direccion_cliente, observaciones_cliente FROM cliente WHERE codigo_cliente=$codigo_cliente;" );	
					$a2=sacar_registro_bd($usuario_consulta2);
					$nombre_cliente=$a2['nombre_cliente']." ".$a2['apellido_paterno'];
						$direccion=$a2['direccion_cliente'];
							$observaciones=$a2['observaciones_cliente'];
					echo "
						<td class='campotablas'>".$cod_pedido."</td>
		    			<td class='campotablas'>".$nombre_cliente."</td>
						<td class='campotablas'>".$monto."</td>
						<td class='campotablas'>&nbsp;".$monto_cancelado."</td>
		    			<td class='campotablas'>".$monto_restante."</td>
						<td class='campotablas'>".$fechaDay."</td>
						<td class='campotablas'>".$estado."</td>
						<td class='campotablas'><a href=ver_ingreso.php?id_pedido=".$cod_pedido."&id_cliente=".$codigo_cliente.">Ver Detalle Pedido </a></td>";
									
						
					echo '</tr>';

				}
				$usuario_consulta3 = mysql_query("select sum(monto_amortizacion) as d from pago_pedidos where fecha_pago='$fechaDay'" );	
				//	echo "select sum(monto_total) as d from pedido where fecha_cancelado='$fechaDay' and estado='Ejecutado' and estado_pago='si' ";
					
					$a3=sacar_registro_bd($usuario_consulta3);
					$dato=$a3['d'];
				
				
				
				echo "<tr>
						<td class='campotablas'>Monto Total Ingreso</td>
		    			<td class='campotablas'>&nbsp;</td>
						<td class='campotablas'>&nbsp;</td>
						<td class='campotablas'>".$dato."</td>
		    			<td class='campotablas'>&nbsp;</td>
						<td class='campotablas'>&nbsp;</td>
						<td class='campotablas'>&nbsp;</td>
							<td class='campotablas'>&nbsp;</td>
						</tr>";
			
				
				echo "</table>
				
				";
			
				


}
else
{


	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  			<tr>
    			<td><font color="#003366">NO SE REALIZO NINGUNA VENTA</font></td>
  			</tr>
		</table>';
		

}

$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fechaDay=$registro7['date'];

//echo "SELECT cod_pedido, codigo_cliente, fecha, monto_total, estado FROM pedido WHERE estado='Ejecutado';";
$usuario_consulta = mysql_query("SELECT id_costo, tipo_costo, monto_costo, fecha_costo FROM costos WHERE fecha_costo='$fechaDay';" );	
//echo "SELECT id_costo, tipo_costo, monto_costo, fecha_costo FROM costos WHERE fecha_costo='$fechaDay';";
//echo "SELECT cod_pedido, codigo_cliente,  fecha_cancelado, monto_total, estado FROM pedido WHERE estado='Ejecutado' and fecha_cancelado='$fechaDay';";	
if (mysql_num_rows($usuario_consulta) != 0)
{

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br><br><br>
		  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    		<tr> 
    			<td colspan="4" class="title"><div align="center">GASTOR OPERATIVOS</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Numero</td>
			    <td class="title">Detalle</td>
					<td class="title">Monto</td>
					<td class="title">Fecha</td>

				</tr>';

				for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
					//$registro= sacar_registro_bd($usuario_consulta);
				
					echo '<tr>'; 
					$a=sacar_registro_bd($usuario_consulta);
					
					$cod_pedido=$a['id_costo'];
					$codigo_cliente=$a['tipo_costo'];
					$monto=$a['monto_costo'];
					$fecha=$a['fecha_costo'];

					echo "
						<td class='campotablas'>".$cod_pedido."</td>
		    			<td class='campotablas'>".$codigo_cliente."</td>
						<td class='campotablas'>".$monto."</td>
						<td class='campotablas'>&nbsp;".$fecha."</td>
									
						
				</tr>";

				}
				$usuario_consulta3 = mysql_query("select sum(monto_costo) as d from costos where fecha_costo='$fechaDay'" );	
				//	echo "select sum(monto_total) as d from pedido where fecha_cancelado='$fechaDay' and estado='Ejecutado' and estado_pago='si' ";
					
					$a3=sacar_registro_bd($usuario_consulta3);
					$dato=$a3['d'];
				
				
				
				echo "<tr>
						<td class='campotablas'>Monto Total Gasto</td>
		    			<td class='campotablas'>&nbsp;</td>
		    			<td class='campotablas'>".$dato."</td>
						<td class='campotablas'>&nbsp;</td>

						</tr>";
			
				
				echo "</table>
				
				";
			


}
else
{


	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  			<tr>
    			<td><font color="#003366">NO SE REALIZO NINGUN GASTO</font></td>
  			</tr>
		</table>';
		

}


$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
$registro7= sacar_registro_bd($resultado7);
$fechaDay=$registro7['date'];

//echo "SELECT cod_pedido, codigo_cliente, fecha, monto_total, estado FROM pedido WHERE estado='Ejecutado';";
	$usuario_consulta = mysql_query("select sum(monto_costo) as d from costos where fecha_costo='$fechaDay'" );	
//echo "SELECT id_costo, tipo_costo, monto_costo, fecha_costo FROM costos WHERE fecha_costo='$fechaDay';";
//echo "SELECT cod_pedido, codigo_cliente,  fecha_cancelado, monto_total, estado FROM pedido WHERE estado='Ejecutado' and fecha_cancelado='$fechaDay';";


$usuario_consulta3 = mysql_query("select sum(monto_amortizacion) as d from pago_pedidos where fecha_pago='$fechaDay'" );	
//	echo "select sum(monto_total) as d from pedido where fecha_cancelado='$fechaDay' and estado='Ejecutado' and estado_pago='si' ";
					

	
if (mysql_num_rows($usuario_consulta) != 0)
{
	$a3=sacar_registro_bd($usuario_consulta);
	$dato=$a3['d'];

	$a1=sacar_registro_bd($usuario_consulta3);
	$dato1=$a1['d'];
	
	$utilidad=$dato1-$dato;


	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg"><br><br><br>
		  <table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
    		<tr> 
    			<td colspan="3" class="title"><div align="center">RESUMEN</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Ingresos</td>
			    <td class="title">Egresos</td>
					<td class="title">Utilidad</td>
				

				</tr>';

	
					echo '<tr>'; 
					echo "
						<td class='campotablas'>".$dato1."</td>
		    			<td class='campotablas'>".$dato."</td>
						<td class='campotablas'>".$utilidad."</td>
						</tr></table>";

}
								
						
	



?>
				
				
				

	</table> <p>&nbsp;</p>
<p align="center"><a href="utilidad.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>