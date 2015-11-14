<?php

	$var=$_GET['id_cliente'];
	$cod_pedido=$_GET['id_pedido'];

	require_once("manejomysql.php");
	conectar_bd();

		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var;" ) or die(header ("Location:error.php"));

		if (mysql_num_rows($usuario_consulta) != 0)
		{	
				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];
	
		}
		
	

echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>
<p>INFORMACION CLIENTE</p>



<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>

<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
              <td width="25%" class="campotablas">'.$codigo_cliente.'</td>
              <td width="25%" class="campotablas">Nro. Carnet de Identidad:</td>
              <td width="25%" class="campotablas">'.$ci.'</td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
              <td class="campotablas">'.$ap.'</td>
              <td class="campotablas">Apellido Materno:</td>
              <td class="campotablas">'.$am.'</td>
          </tr>
		  
		  <tr> 
              <td height="27"class="campotablas"> Nombres:</td>
              <td class="campotablas">'.$nombres.'</td>
              <td class="campotablas">Direccion:</td>
              <td class="campotablas">'.$direccion.'</td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
              <td class="campotablas">'.$telefono.'</td>
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
          </tr>
		  
		
		  
          
         
		  
        </table>


</td>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="18" ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody>
</table>

<br>
 
<table width="80%" align="center" cellpadding="0" cellspacing="0" >
<tbody><tr>
<td ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody>';
	//echo "SELECT cod_pedido, fecha, monto_total, estado_pedido FROM pedido WHERE codigo_cliente=$codigo_cliente and estado_pedido='no Ejecutado';";
	
	$usuario_consulta = mysql_query("SELECT cod_pedido, fecha, monto_total, estado FROM pedido WHERE cod_pedido=$cod_pedido;" );	

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
	<form action="modificar_fechaPedido.php" method="post" name="ventas">
	<td class="campotablas">'.$fecha_pedido.'</td></form>  </tr>
  <tr> 
    <td class="campotablas">Monto Total:</td>
    <td class="campotablas">'.$monto_total.'</td>
    <td class="campotablas">Estado Pedido</td>
	<td class="campotablas">'.$estado_pedido.'</td>
  </tr>
</table>';


	$usuario_consulta = mysql_query("SELECT cantidad, monto, precio_unitario, cod_dp, cod_producto, cod_equipo FROM detalle_pedido WHERE cod_pedido=".$cod_pedido);	
			
		if (mysql_num_rows($usuario_consulta) != 0)
		{	
		
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
						echo "</td>";
						echo '</tr>';	
					
				}
  				
  
  				echo '
				</table>';
		}
	
		echo '<br><table width="60%" border="0" align="center" >
    <tr></form>
       <td align="center"><p align="center"><a href="listar_pedidos_entregados.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p> </td> </form>
    </tr>
  </table>
  
 
  ';
 
 
  
?>  
