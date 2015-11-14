<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>
 <SCRIPT language="javascript">

</SCRIPT>

<script language="JavaScript" src="calendar1.js"></script>
<script language="javascript"> 
 function window_open()
  {
	var newWindow;
	var urlstring = 'calendar.html'
	newWindow = window.open(urlstring,'','height=200,width=280,toolbar=no,minimize=no,status=no,memubar=no,location=no,scrollbars=no')
  }
 </script>


<?php

	$tipo=$_GET['menu1'];
	$var=$_GET['buscar'];
	require_once("manejomysql.php");
	conectar_bd();
	
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente, descuento, tipo_cliente FROM cliente WHERE codigo_cliente=$var;" ) or die(heer ("Location:error.php"));

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
	

echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<html>
<he>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


</he>

<body>

   <div align="center"><font color="#330000" size="4" class="titl">INFORMACION SOLICITUD</font><br>
   
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
<BR>
<br>
';
	//echo "SELECT cod_pedido, fecha, monto_total, esto_pedido FROM pedido WHERE codigo_cliente=$codigo_cliente and esto_pedido='no Ejecuto';";
	
	$usuario_consulta = mysql_query("SELECT cod_saldo, codigo_cliente, monto_favor, fecha_registro, monto_pedido, fecha_entrega, estado, observaciones FROM anticipo WHERE codigo_cliente=$codigo_cliente and estado='vigente';" );
	//echo "SELECT id_venta, fecha_venta, total, total_descuento, estado_venta FROM venta WHERE codigo_cliente=$codigo_cliente and estado_venta='No Ejecuto' and total=0;";	
	
	if (mysql_num_rows($usuario_consulta) != 0)
	{
		$a=sacar_registro_bd($usuario_consulta);
		$codigo_saldo=$a["cod_saldo"];
		$codigo_cliente=$a["codigo_cliente"];
		$monto_favor=$a["monto_favor"];
		$fecha_registro=$a["fecha_registro"];
		$monto_pedido=$a["monto_pedido"];
		$fecha_entrega=$a["fecha_entrega"];
		$estado=$a["estado"];
		$observaciones=$a["observaciones"];
		
		echo '
		<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">EL CLIENTE YA TIENE UN SALDO DE ANTICIPO</td>
  </tr>
  <tr> 
    <td class="campotablas">Monto registrado para pedido:</td>
    <td class="campotablas">'.$monto_favor.'</td>
    <td class="campotablas">Fecha que se realizo la solicitud:</td>
	<td class="campotablas">'.$fecha_registro.'</td>
  <tr> 
    <td class="campotablas">Estado Solicitud:</td>
    <td class="campotablas">'.$estado.'</td>
    <td class="campotablas">Observaciones</td>
	<td class="campotablas">'.$observaciones.'</td>
  </tr>
</table> <BR>';

		echo '
					<form action="registrar_solicitud2.php?id='.$codigo_cliente.'"  method="post" name="ventas" onSubmit="return validarFormulario(this);">

		<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">ACTUALIZAR ANTICIPO CLIENTE</td>
  </tr>
  <tr> 
    <td class="campotablas">Nuevo Monto:</td>
    <td class="campotablas"><input type="text" name="monto" maxlength="15" tabindex="3" class="Formulario" value="'.$monto_favor.'"></td>
    <td class="campotablas">Fecha de Actualizacion:</td>
	<td class="campotablas">';
		    $resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];

	echo '<input type="text" name="correo_electronico" id="correo_electronico" maxlength="20" tabindex="8" class="Formulario" value="'.$fecha.'" readonly /></td>
  <tr> 
    <td class="campotablas">Estado Solicitud:</td>
    <td class="campotablas">'.$estado.'</td>
    <td class="campotablas">Observaciones</td>
	<td class="campotablas"><input type="text" name="observaciones" maxlength="250" tabindex="3" class="Formulario" value="'.$observaciones.'"></td>
  </tr>
</table>';

echo '<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td>
	  </form>
	  
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>';

	
		
	}
	else
	{
	    $resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];
	
			echo '
			<form action="registrar_solicitud.php?id='.$codigo_cliente.'"  method="post" name="ventas" onSubmit="return validarFormulario(this);">
		<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">REGISTRAR SOLICITUD</td>
  </tr>
  <tr> 
    <td class="campotablas">Monto registrado para pedido (Bs):</td>
    <td class="campotablas"><input type="text" name="monto" maxlength="15" tabindex="3" class="Formulario" value="0"></td>
    <td class="campotablas">Fecha que se realizo la solicitud:</td>
	<td class="campotablas"><input type="text" name="correo_electronico" id="correo_electronico" maxlength="20" tabindex="8" class="Formulario" value="'.$fecha.'" readonly />
	</td>
  <tr> 
    <td class="campotablas">Observaciones:</td>
    <td class="campotablas"><input type="text" name="observaciones" maxlength="250" tabindex="3" class="Formulario" value="Productos: "></td>
    <td class="campotablas"></td>
	<td class="campotablas"></td>
  </tr>
</table>
		<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td>
	  </form>
	  
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>';
		
		
		
		
	}
	
	
	