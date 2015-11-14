<?php

	$tipo=$_GET['menu1'];
	$var=$_GET['buscar'];
	require_once("manejomysql.php");
	conectar_bd();
	
	
	if($tipo == 1)
	{
		
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente, descuento, tipo_cliente FROM cliente WHERE codigo_cliente=$var;" ) or die(heer ("Location:error.php"));

		if (mysql_num_rows($usuario_consulta) != 0)
		{	
				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$zona=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
				$observaciones_cliente=$registro['observaciones_cliente'];
				$tipo_cliente=$registro['tipo_cliente'];
	
				$observaciones=null;
				//$observaciones=$registro['observaciones'];
	
		}
		else
		{
		
			heer ("Location:buscar_cliente_pedido.php?error=2");
			exit;
		
		}
	}
/*	if($tipo == 2)
	{	
//		echo 'entro';
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente FROM cliente WHERE  ci_cliente=$var;" ) or die(heer ("Location:error.php"));
		
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
				$observaciones_cliente=$registro['observaciones_cliente'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];

	
		}
		
		else
		{
				heer ("Location:buscar_cliente_pedido.php?error=3");
				exit;
		
		}
	
	}


	if($tipo == 3)
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		
		$usuario_consulta = mysql_query("SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;" ) or die(heer ("Location:error.php"));	
			
			if (mysql_num_rows($usuario_consulta) != 0)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				$var2=$registro['codigo_cliente'];
			
				$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente FROM cliente WHERE codigo_cliente=$var2;" ) or die(heer ("Location:error.php"));

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
				$observaciones_cliente=$registro['observaciones_cliente'];
	
					$observaciones=null;
		
		}
		else
		{	
				heer ("Location:buscar_cliente_pedido.php?error=4");
				exit;
		}	
		
	
	}
	
	*/

echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<html>
<he>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


</he>

<body>

   <div align="center"><font color="#330000" size="4" class="titl">INFORMACION PEDIDO</font><br>
   
  </div>


<table width="80%" align="center" cellpding="0" cellspacing="0">
<tbody>
<tr>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="100%"  border="0" align="center" cellpding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="6"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="16%" class="campotablas">Codigo Cliente:</td>
              <td width="16%" class="campotablas">'.$codigo_cliente.'</td>
              <td width="16%" class="campotablas">CI o NIT:</td>
              <td width="16%" class="campotablas">'.$ci.'</td>
			  <td width="16%" class="campotablas">Apellidos:</td>
              <td width="16%" class="campotablas">'.$ap.'</td>
          </tr>
          <tr> 

              <td class="campotablas">Nombres:</td>
              <td class="campotablas">'.$nombres.'</td>
              <td class="campotablas"> Tipo_Cliente:</td>
              <td class="campotablas">'.$tipo_cliente.'</td>
              <td class="campotablas">Direccion:</td>
              <td class="campotablas">'.$direccion.'</td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
              <td class="campotablas">'.$telefono.'</td>
              <td class="campotablas">Observaciones</td>
              <td class="campotablas">&nbsp;'.$observaciones_cliente.'</td>
			  <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
          </tr>
		  
		
		  
          
         
		  
        </table>


</td>
      
</tr></tbody>
</table>
<BR>';

				$queryuser2 = mysql_query("SELECT cod_saldo, monto_favor, fecha_registro, estado, observaciones FROM anticipo where codigo_cliente=$codigo_cliente and estado='vigente'") or die("no se realizo");
$querydatos2 = sacar_registro_bd($queryuser2);
//echo $querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM'];
			if(mysql_num_rows($queryuser2)!=0)
			{
			
							echo '
							<br><table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
							<tr> 
    <td colspan="4" class="title">INFORMACION ANTICIPO DE PEDIDO CLIENTE
  </tr>
		<tr> <td class="campotablas">Fecha Anticipo:</td>
		<td class="campotablas">'.$querydatos2['fecha_registro'].'</td>
		<td class="campotablas">Monto Dejado:</td>
		<td class="campotablas">'.$querydatos2['monto_favor'].'</td>
		</tr>
		<tr> <td class="campotablas">Estado Solicitud:</td>
		<td class="campotablas">'.$querydatos2['estado'].'</td>
		<td class="campotablas">Observaciones:</td>
		<td class="campotablas">'.$querydatos2['observaciones'].'</td>
		</tr>
		</table><BR>
		';

				
		}
	

	//echo "SELECT cod_pedido, fecha, monto_total, esto_pedido FROM pedido WHERE codigo_cliente=$codigo_cliente and esto_pedido='no Ejecuto';";
	
	$usuario_consulta = mysql_query("SELECT id_venta, fecha_venta, total, total_descuento, estado_venta FROM venta WHERE codigo_cliente=$codigo_cliente and estado_venta='No Ejecuto' and total=0;" );
	//echo "SELECT id_venta, fecha_venta, total, total_descuento, estado_venta FROM venta WHERE codigo_cliente=$codigo_cliente and estado_venta='No Ejecuto' and total=0;";	
	
	if (mysql_num_rows($usuario_consulta) == 0)
	{

		$resulto= consulta_bd("SELECT max(id_venta) as p FROM venta" );
		$a=sacar_registro_bd($resulto);
		$nc=$a['p']+1;
			
		$resulto7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resulto7);
		$fecha=$registro7['date'];
		
		$monto_total=0;
		$observaciones_pedido='Ninguno';
		
		$usuario_consulta = mysql_query("insert into venta values($nc, 0,0,'$fecha','No Ejecuto', $codigo_cliente);" );	
	
		$usuario_consulta = mysql_query("SELECT id_venta, fecha_venta, total, total_descuento, estado_venta FROM venta WHERE codigo_cliente=$codigo_cliente and estado_venta='No Ejecuto' and total=0;");	
		

		$a=sacar_registro_bd($usuario_consulta);
		$codigo_pedido=$a["id_venta"];
		$fecha_pedido=$a["fecha_venta"];
		$monto_total=$a["total"];
		$total_desc=$a["total_descuento"];
		$esto_pedido=$a["estado_venta"];
		
		echo '
		<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">INFORMACION PEDIDO</td>
  </tr>
  <tr> 
    <td class="campotablas">Codigo Pedido:</td>
    <td class="campotablas">'.$codigo_pedido.'</td>
    <td class="campotablas">Fecha de Pedido:</td>
	<form action="modificar_fechaPedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'&id_pagina=buscar_cliente_pedido21.php" method="post" name="ventas">
	<td class="campotablas"><input type="text" name="correo_electronico2" id="correo_electronico2" maxlength="20" tabindex="8" class="Formulario" value='.$fecha_pedido.'  reonly="true"/> 
    <a href="javascript:cal2.popup();" > <img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  ></a><input name="cancelar"  type="image" onMouseOver= src="images/mfp1.gif" onMouseMove= src="images/mfp1.gif" onMouseOut=src="images/mfp2.gif" value="" SRC="images/mfp2.gif">  
     </td></form>  </tr>

  <tr> 
    <td class="campotablas">Monto Total:</td>
    <td class="campotablas">'.$monto_total.'</td>
    <td class="campotablas">Estado Pedido</td>
	<td class="campotablas">'.$esto_pedido.'</td>
  </tr>
    <tr> 
    <td class="campotablas">Total con Descuentos:</td>
    <td class="campotablas">'.$total_desc.'</td>
    <td class="campotablas"></td>
	<td class="campotablas"></td>
  </tr>
</table>';
		
								
		$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
$querydatos = sacar_registro_bd($queryuser);
$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
$querydatosuser = sacar_registro_bd($consultauser);
//echo $querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM'];
				echo '<br><table>
		<tr> <td>Vendedor:</td>
		<td>'.$querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM'].'</td>
		
		</tr>
		</table>
		';

		
		echo '<br><table width="40%" border="0" align="center" >
    <tr></form>
      <td align="center"><a href="select_producto.php?id_cliente='.$codigo_cliente.'&id_pedido='.$codigo_pedido.'" &id_pagina=buscar_cliente_pedido21.php>(+)Añadir Productos</a> </td>
        		<td align="center">
	    <form action="registrar_pedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'&id_saldo='.$querydatos2['cod_saldo'].'" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/rp2.gif" onMouseMove= src="images/rp2.gif" onMouseOut=src="images/rp.gif" value="" SRC="images/rp.gif"> 
		</td> </form>
         <td align="center">
		 <form action="cancelar_pedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
   
  ';
		
	}
	else
	{
	
		$a=sacar_registro_bd($usuario_consulta);
		$codigo_pedido=$a["id_venta"];
		$fecha_pedido=$a["fecha_venta"];
		$monto_total=$a["total"];
		$total_desc=$a["total_descuento"];
		$esto_pedido=$a["estado_venta"];
		$fecha_pedido=$a["fecha_venta"];
		
		$monto_total2 = mysql_query("Select SUM(monto_parcial) as p from detalle_venta where id_venta=$codigo_pedido;");
		$mont=sacar_registro_bd($monto_total2);
		
		
						//$cod_equipo=$a['cod_equipo'];

		
		echo '
<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">INFORMACION PEDIDO</td>
  </tr>
  <tr> 
    <td class="campotablas">Codigo Pedido:</td>
    <td class="campotablas">'.$codigo_pedido.'</td>
    <td class="campotablas">Fecha de Pedido:</td>
	<form action="modificar_fechaPedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'&id_pagina=buscar_cliente_pedido21.php" method="post" name="ventas">
	<td class="campotablas"><input type="text" name="correo_electronico2" id="correo_electronico2" maxlength="20" tabindex="8" class="Formulario" value='.$fecha_pedido.'  reonly="true"/> 
    <a href="javascript:cal2.popup();" > <img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  ></a><input name="cancelar"  type="image" onMouseOver= src="images/mfp1.gif" onMouseMove= src="images/mfp1.gif" onMouseOut=src="images/mfp2.gif" value="" SRC="images/mfp2.gif">  
     </td></form>  </tr>

  <tr> 
    <td class="campotablas">Monto Total:</td>
    <td class="campotablas">'.$mont['p'].'</td>
    <td class="campotablas">Estado Pedido</td>
	<td class="campotablas">'.$esto_pedido.'</td>
  </tr>

</table>';
			
	//echo "SELECT cantid, monto, precio_unitario, cod_dp, cod_producto, cod_equipo FROM detalle_pedido WHERE cod_pedido=".$codigo_pedido;
	//echo 'hola1';
		$usuario_consulta = mysql_query("SELECT codigo_detalle, cod_usuario, codigo_producto, id_venta, codigo_cliente, cantidad, precio_unitario, monto_parcial FROM detalle_venta WHERE id_venta=".$codigo_pedido);	
		
		if (mysql_num_rows($usuario_consulta) != 0)
		{	
		
				echo '<br>
				<table width="100%" border="0" align="center" cellpding="0" cellspacing="0">
  				<tr> 
    			<td colspan="13" class="title"><div align="center">DETALLE DE PEDIDO</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Codigo Producto</td>
			    <td class="title">Nombre Producto</td>
				<td class="title">Marca</td>
				<td class="title">Industria</td>
				<td class="title">Observaciones</td>
			    <td class="title">Cantidad </td>
			    <td class="title">Precio Unitario</td>
			    <td class="title">Precio Cliente</td>
			    <td class="title">Total</td>
			    <td class="title">Stock Restante</td>
			    <td class="title">Detalles</td>
			    <td class="title">Modificar</td>
			    <td class="title">Eliminar</td>
				</tr>';
  			
		  		for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
						//$registro= sacar_registro_bd($usuario_consulta);
				
						echo '<tr>'; 
						$a=sacar_registro_bd($usuario_consulta);
						$codigo_producto=$a['codigo_producto'];
						$codigo_dp=$a['codigo_detalle'];
						$cantid=$a['cantidad'];
						$monto=$a['monto_parcial'];
						$precio_unitario=$a['precio_unitario'];
						//$cod_equipo=$a['cod_equipo'];
						$usuario_consulta2 = mysql_query("SELECT nombre_producto, stock, precio_unitario_prod, marca, industria, observaciones_producto FROM producto WHERE codigo_producto='$codigo_producto';" );	
						$a=sacar_registro_bd($usuario_consulta2);
						$nombre_producto=$a['nombre_producto'];
			
						echo "
						<td class='campotablas'>".$codigo_producto."</td>
		    			<td class='campotablas'>".$nombre_producto."</td>
						<td class='campotablas'>".$a['marca']."</td>
						<td class='campotablas'>".$a['industria']."</td>
						<td class='campotablas'>".$a['observaciones_producto']."</td>
		    			<td class='campotablas'>".$cantid."</td>
						<td class='campotablas'>".$a['precio_unitario_prod']."</td>
						<td class='campotablas'>".$precio_unitario."</td>
						<td class='campotablas'>".$monto."</td>
						<td class='campotablas'>".$a['stock']."</td>
						<td class='campotablas'><a href=mas_detalles_producto.php?menu1=1&buscar=".$codigo_producto." TARGET='_blanc'>Mas Detalles</a></td>
		    			<td class='campotablas'><a href=mod_producto.php?id=".$codigo_dp."&id_pedido=".$codigo_pedido."&id_cliente=".$var."&id_producto=".$codigo_producto."&fecha=".$fecha_pedido.">Modificar </a></td>	";
						echo"<td class='campotablas'><a href=eliminar_dproducto.php?id=".$codigo_dp."&id_pedido=".$codigo_pedido."&id_cliente=".$var.">Eliminar </a></td>	";
						echo '</tr>';	
					
				}
  				
  
  				echo '
				</table>

				';
		}
	
		
		$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
$querydatos = sacar_registro_bd($queryuser);
$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
$querydatosuser = sacar_registro_bd($consultauser);
//echo $querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM'];

		echo '<br><table>
		<tr> <td>Vendedor:</td>
		<td>'.$querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM'].'</td>
		
		</tr>
		</table>
		';
		
		
		
echo '<br><table width="20%" border="0" align="center" >
    <tr>
      <td align="center"><a href="solicitud_pedido-all.php?id_cliente='.$codigo_cliente.'&id_pedido='.$codigo_pedido.'&fecha='.$fecha_pedido.'&cod_saldo='.$querydatos2['cod_saldo'].'" TARGET="_blanc">Generar Solicitud</a> </td>
	  </tr> </table>';


	  

echo '<br><table width="40%" border="0" align="center" >
    <tr></form>
      <td align="center"><a href="select_producto.php?id_cliente='.$codigo_cliente.'&id_pedido='.$codigo_pedido.'" &id_pagina=buscar_cliente_pedido21.php>(+)Añadir Productos</a> </td>
        		<td align="center">
	    <form action="registrar_pedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'&id_saldo='.$querydatos2['cod_saldo'].'" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/rp2.gif" onMouseMove= src="images/rp2.gif" onMouseOut=src="images/rp.gif" value="" SRC="images/rp.gif"> 
		</td> </form>
         <td align="center">
		 <form action="cancelar_pedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>

   
  ';
		
		
		
	
	}
	
	
 
?>  

<?php 
 if( !empty($_GET['error_de_pedido']) )
{
	$respuesta=null;
	if($_GET['error_de_pedido'] == 1)
	{
		$respuesta='EL REGISTRO NO SE REALIZO POR QUE NO TIENE NINGUN PRODUCTO ICIONO AL PEDIDO';
	}
		
	echo '<br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}
 ?> 

  
<p>&nbsp;</p>

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
		<script language="JavaScript" src="calendar1.js"></script>
<script language="javascript"> 
 function window_open()
  {
	var newWindow;
	var urlstring = 'calendar.html'
	newWindow = window.open(urlstring,'','height=200,width=280,toolbar=no,minimize=no,status=no,memubar=no,location=no,scrollbars=no')
  }
 </script>

<script language="JavaScript">
			var cal2 = new calendar1(document.forms['ventas'].elements['correo_electronico2']);
			cal2.year_scroll = true;
			cal2.time_comp = false;
			
			
			
		//-->
		</script>


</body>
</html>
