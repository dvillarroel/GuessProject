<?php


	$codigo_pedido=$_GET['id_pedido'];
	$var=$_GET['id_cliente'];

	require_once("manejomysql.php");
	conectar_bd();

	$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var;" ) or die(header ("Location:error.php"));

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
	
echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>
<p align="center"><font color="#660033" size="4">MODIFICAR PEDIDO</font></p>
<p align="center"><font color="#660033">INFORMACION CLIENTE:</font></p>
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
	
	$usuario_consulta = mysql_query("SELECT cod_pedido, fecha, monto_total, estado FROM pedido WHERE cod_pedido=$codigo_pedido;" );	
	
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
	<form action="modificar_fechaPedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'&id_pagina=modificar_pedido2.php" method="post" name="ventas">
	<td class="campotablas"><input type="text" name="correo_electronico2" id="correo_electronico2" maxlength="20" tabindex="8" class="Formulario" value='.$fecha_pedido.'  readonly="true"/> 
    <a href="javascript:cal2.popup();" > <img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  ></a><input name="cancelar"  type="image" onMouseOver= src="images/mfp1.gif" onMouseMove= src="images/mfp1.gif" onMouseOut=src="images/mfp2.gif" value="" SRC="images/mfp2.gif">  
     </td></form>  </tr>  <tr> 
    <td class="campotablas">Monto Total:</td>
    <td class="campotablas">'.$monto_total.'</td>
    <td class="campotablas">Estado Pedido</td>
	<td class="campotablas">'.$estado_pedido.'</td>
  </tr>
</table>';
		
	
	//echo "SELECT cantidad, monto, precio_unitario, cod_dp, cod_producto, cod_equipo FROM detalle_pedido WHERE cod_pedido=".$codigo_pedido;
	//echo 'hola1';
		$usuario_consulta = mysql_query("SELECT cantidad, monto, precio_unitario, cod_dp, cod_producto, cod_equipo FROM detalle_pedido WHERE cod_pedido=".$codigo_pedido);	
			
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
			    <td class="title">Modificar</td>
			    <td class="title">Eliminar</td>
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
						echo "</td>
		    			<td class='campotablas'><a href=modificar_detallePedido.php?id=".$codigo_dp."&id_pedido=".$codigo_pedido."&id_cliente=".$codigo_cliente."&id_producto=".$codigo_producto."&id_tipo=Codigo_Cliente&id_pagina=modificar_pedido2.php>Modificar </a></td>	";
						echo"<td class='campotablas'><a href=eliminar_dproducto.php?id=".$codigo_dp."&id_pedido=".$codigo_pedido."&id_cliente=".$codigo_cliente."&id_tipo=Codigo_Cliente&id_pagina=modificar_pedido2.php>Eliminar </a></td>	";
						echo '</tr>';	
					
				}
  				
  
  				echo '
				</table>';
		}
	
		echo '<br><table width="40%" border="0" align="center" >
    <tr></form>
      	<td align="center">
	    <form action="actualizar_pedido.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/mp1.gif" onMouseMove= src="images/mp1.gif" onMouseOut=src="images/mp2.gif" value="" SRC="images/mp2.gif"> 
		</td> </form>
         <td align="center"><form action="modificar_pedido.php?id_pedido='.$codigo_pedido.'" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  
 
  ';


  
 
  
?>  
  
  
  <?php 
 if( !empty($_GET['error_de_pedido']) )
{
	$respuesta=null;
	if($_GET['error_de_pedido'] == 1)
	{
		$respuesta='EL REGISTRO NO SE REALIZO POR QUE NO TIENE NINGUN PRODUCTO AÑADIDO AL PEDIDO';
	}
		
	echo '<br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}
 ?> 
  
<p>&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
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
