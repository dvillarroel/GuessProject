<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SOLICITUD DE PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body>
<?php 
	$codigo_cliente=$_GET['id_cliente'];
	$codigo_pedido=$_GET['id_pedido'];
	
	require_once("manejomysql.php");
	conectar_bd();

	$usuario_consulta = mysql_query("SELECT ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, observaciones_cliente FROM cliente WHERE codigo_cliente=$codigo_cliente;" );
	$registro= sacar_registro_bd($usuario_consulta);

	$ci=$registro['ci_cliente'];
	$nombre_completo=$registro['nombre_cliente']." ".$registro['apellido_paterno']." ".$registro['apellido_materno'];
	$direccion=$registro['direccion_cliente'];
	$telefono=$registro['telefono_cliente'];
	$observaciones_cliente=$registro['observaciones_cliente'];
	
	
	$usuario_consulta = mysql_query("SELECT cod_pedido, fecha, monto_total, estado FROM pedido WHERE cod_pedido=$codigo_pedido;" );	

	$a=sacar_registro_bd($usuario_consulta);
	$fecha_pedido=$a["fecha"];
	$partirFecha=split("-",$fecha_pedido);
	$monto_total=$a["monto_total"];
	$estado_pedido=$a["estado"];
	

	//echo $codigo_cliente;
	//echo $codigo_pedido;
	

echo'
<div id="Layer5" style="position:absolute; left:13px; top:6px; width:115px; height:86px; z-index:5"><img src="pl%E1stico_tapas.bmp" width="110" height="78"></div>
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
?>

