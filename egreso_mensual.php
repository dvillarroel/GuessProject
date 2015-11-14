<?php

require_once("manejomysql.php");
conectar_bd();




$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];
	list($a,$m,$d)=split("-", $fecha);

	switch($m)
	{
	case "01":
		$fecha1=$a.'-01-01';
		$fecha2=$a.'-01-31';
		break;
	case "02":
		$fecha1=$a.'-02-01';
		$fecha2=$a.'-02-28';
		break;
	case "03":
		$fecha1=$a.'-03-01';
		$fecha2=$a.'-03-31';
		break;
	case "04":
		$fecha1=$a.'-04-01';
		$fecha2=$a.'-04-30';
		break;
	case "05":
		$fecha1=$a.'-05-01';
		$fecha2=$a.'-05-31';
		break;
	case "06":
		$fecha1=$a.'-06-01';
		$fecha2=$a.'-06-30';
		break;
	case "07":
		$fecha1=$a.'-07-01';
		$fecha2=$a.'-07-31';
		break;
	case "08":
		$fecha1=$a.'-08-01';
		$fecha2=$a.'-08-31';
		break;
	case "09":
		$fecha1=$a.'-09-01';
		$fecha2=$a.'-09-30';
		break;
	case "10":
		$fecha1=$a.'-10-01';
		$fecha2=$a.'-10-31';
		break;
	case "11":
		$fecha1=$a.'-11-01';
		$fecha2=$a.'-11-30';
		break;
	case "12":
		$fecha1=$a.'-12-01';
		$fecha2=$a.'-12-31';
		break;
	 
	}
//$usuario_consulta = mysql_query("SELECT cod_pedido, monto_amortizacion,  monto, completo, fecha_pago FROM pago_pedidos WHERE fecha_pago>='$fecha1' and fecha_pago<='$fecha2';" );


//echo "SELECT cod_pedido, codigo_cliente, fecha, monto_total, estado FROM pedido WHERE estado='Ejecutado';";
$usuario_consulta = mysql_query("SELECT id_costo, tipo_costo, monto_costo, fecha_costo FROM costos WHERE fecha_costo>='$fecha1' and fecha_costo<='$fecha2';" );	
//echo "SELECT id_costo, tipo_costo, monto_costo, fecha_costo FROM costos WHERE fecha_costo='$fechaDay';";
//echo "SELECT cod_pedido, codigo_cliente,  fecha_cancelado, monto_total, estado FROM pedido WHERE estado='Ejecutado' and fecha_cancelado='$fechaDay';";	
if (mysql_num_rows($usuario_consulta) != 0)
{

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br>
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
				$usuario_consulta3 = mysql_query("select sum(monto_costo) as d from costos where fecha_costo>='$fecha1' and fecha_costo<='$fecha2';" );	
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
			
				
				
				
								
				echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="ingresos2.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

}
else
{


	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  			<tr>
    			<td><font color="#003366">NO SE REALIZO NINGUN GASTO</font></td>
  			</tr>
		</table>';
		
		echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="egreso.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
}

?>