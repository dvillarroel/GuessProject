<?php

require_once("manejomysql.php");
conectar_bd();

//echo "SELECT cod_pedido, codigo_cliente, fecha, monto_total, estado FROM pedido WHERE estado='Ejecutado';";
$usuario_consulta = mysql_query("SELECT cod_pedido, codigo_cliente, fecha, monto_total, estado FROM pedido WHERE estado='No Ejecutado' and monto_total>0;" );	
	
if (mysql_num_rows($usuario_consulta) != 0)
{

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br>
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    		<tr> 
    			<td colspan="9" class="title"><div align="center">LISTA DE PEDIDOS SOLICITADOS POR ENTREGAR</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Codigo Pedido</td>
			    <td class="title">Nombre Cliente</td>
				<td class="title">Direccion</td>
				<td class="title">Observaciones cliente</td>
			    <td class="title">Monto Total</td>
			    <td class="title">Fecha </td>
				 <td class="title">Estado </td>
			    <td class="title">Detalle_Pedido</td>
				<td class="title">Generar Solicitud</td>
				</tr>';

				for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
					//$registro= sacar_registro_bd($usuario_consulta);
				
					echo '<tr>'; 
					$a=sacar_registro_bd($usuario_consulta);
					
					$cod_pedido=$a['cod_pedido'];
					$codigo_cliente=$a['codigo_cliente'];
					$monto=$a['monto_total'];
					$fecha=$a['fecha'];
					$estado=$a['estado'];
					
					$usuario_consulta2 = mysql_query("SELECT nombre_cliente, apellido_paterno, direccion_cliente, observaciones_cliente  FROM cliente WHERE codigo_cliente=$codigo_cliente;" );	
					$a2=sacar_registro_bd($usuario_consulta2);
					$nombre_cliente=$a2['nombre_cliente']." ".$a2['apellido_paterno'];
					$direccion=$a2['direccion_cliente'];
					$observaciones=$a2['observaciones_cliente'];
					echo "
						<td class='campotablas'>".$cod_pedido."</td>
		    			<td class='campotablas'>".$nombre_cliente."</td>
						<td class='campotablas'>".$direccion."</td>
						<td class='campotablas'>&nbsp;".$observaciones."</td>
		    			<td class='campotablas'>".$monto."</td>
						<td class='campotablas'>".$fecha."</td>
						<td class='campotablas'>".$estado."</td>
		    			<td class='campotablas'><a href=ver_pedido2.php?id_pedido=".$cod_pedido."&id_cliente=".$codigo_cliente.">Ver Detalle Pedido </a></td>";
						echo "<td class='campotablas'><a href=solicitud_pedido.php?id_pedido=".$cod_pedido."&id_cliente=".$codigo_cliente." target='_blank'>Generar Solicitud </a></td>";
						
					echo '</tr>';

				}
				echo "</table>
				
				";

	echo '<br><p align="center"><a href="solicitud_pedido.php?id_pedido=1&id_cliente=1'." target='_blank' >Generar Solicitud de Pedidos</a></p>";

				
				echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="administrar_pedidos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

}
else
{


	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg"><br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  			<tr>
    			<td><font color="#003366">NO HAY PEDIDOS REGISTRADOS</font></td>
  			</tr>
		</table>';
		
		echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="administrar_pedido.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
}

?> 