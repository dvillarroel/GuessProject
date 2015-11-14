<?
$codigo_pedido=$_GET['id_pedido'];
$codigo_cliente=$_GET['id_cliente'];

require_once("manejomysql.php");
conectar_bd();


$usuario_consulta = mysql_query("SELECT sum(monto) as p FROM detalle_pedido WHERE cod_pedido=".$codigo_pedido );
$a=sacar_registro_bd($usuario_consulta);
if (!empty($a['p']))
{
	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<body background="body2.jpg"><BR><BR>
			<div align="center"><font color="#330000" size="4" class="titl">EL PEDIDO FUE ACTUALIZADO CORRECTAMENTE</font><br>
   
  </div>
			'
			
			;
		
	mysql_query("update pedido set estado='Ejecutado', monto_total=".$a['p']." WHERE cod_pedido=".$codigo_pedido );

		$usuario_consulta = mysql_query("SELECT cod_pedido, fecha, monto_total, estado FROM pedido WHERE cod_pedido=".$codigo_pedido );	

	$a=sacar_registro_bd($usuario_consulta);
		$codigo_pedido=$a["cod_pedido"];
		$fecha_pedido=$a["fecha"];
		$monto_total=$a["monto_total"];
		$estado_pedido=$a["estado"];
		
		echo '
		<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">INFORMACION PEDIDO</td>
  </tr>
  <tr> 
    <td class="campotablas">Codigo Pedido:</td>
    <td class="campotablas">'.$codigo_pedido.'</td>
    <td class="campotablas">Fecha de Pedido:</td>
	<td class="campotablas">'.$fecha_pedido.'</td>
  </tr>
  <tr> 
    <td class="campotablas">Monto Total:</td>
    <td class="campotablas">'.$monto_total.'</td>
    <td class="campotablas">Estado Pedido</td>
	<td class="campotablas">'.$estado_pedido.'</td>
  </tr>
</table>';
		
	
	//echo "SELECT cantidad, monto, precio_unitario, cod_dp, cod_producto, cod_equipo FROM detalle_pedido WHERE cod_pedido=".$codigo_pedido;
	//echo 'hola1';
		$usuario_consulta = mysql_query("SELECT cantidad, monto, precio_unitario, cod_dp, cod_producto, cod_equipo FROM detalle_pedido WHERE cod_pedido=".$codigo_pedido);	
	
		
				echo '<br>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  				<tr> 
    			<td colspan="8" class="title"><div align="center">DETALLE DE PEDIDO</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Codigo Producto</td>
			    <td class="title">Nombre Producto</td>
			    <td class="title">Cantidad </td>
			    <td class="title">Precio Unitario</td>
			    <td class="title">Total</td>
			    <td class="title">Codigo Equipo</td>
			   
				</tr>';
  			
		  		for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
						//$registro= sacar_registro_bd($usuario_consulta2);
						
						
						echo '<tr>'; 
						 $a=sacar_registro_bd($usuario_consulta);
					
						$codigo_producto=$a['cod_producto'];
						$codigo_dp=$a['cod_dp'];
						$cantidad=$a['cantidad'];
						$monto=$a['monto'];
						$precio_unitario=$a['precio_unitario'];
						$cod_equipo=$a['cod_equipo'];
				
						$usuario_consulta2 = mysql_query("SELECT nombre_producto FROM producto WHERE cod_producto=$codigo_producto;" );	
						$a=sacar_registro_bd($usuario_consulta2);
						$nombre_producto=$a['nombre_producto'];
			
						echo "
						<td class='campotablas'>".$codigo_producto."</td>
		    			<td class='campotablas'>".$nombre_producto."</td>
		    			<td class='campotablas'>".$cantidad."</td>
						<td class='campotablas'>".$precio_unitario."</td>
						<td class='campotablas'>".$monto."</td>
						<td class='campotablas'>";
						if(!empty($cod_equipo))
						{
								echo $cod_equipo;
						}
						else
						{
								echo"Sin equipo";
						}
						echo '</td></tr>';	
					
				}
  				
  
  				echo '
				</table>
				<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
<p>&nbsp;</p>';
		




	

}
else
{
	
	header ("Location:modificar_pedido2.php?error_de_pedido=1&menu1=Codigo_Cliente&id_cliente=".$codigo_cliente);
	exit;
		
}



?>