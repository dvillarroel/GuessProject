<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SOLICITUD DE PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

</head>

<body>
<div id="Layer5" style="position:absolute; left:13px; top:6px; width:115px; height:86px; z-index:5"><img src="pl%E1stico_tapas.bmp" width="110" height="78"></div>
<div id="Layer2" style="position:absolute; left:182px; top:26px; width:279px; height:36px; z-index:2"><font size="3" class="campotablas"><strong>Lista 
  de Codigos de Equipos</strong></font></div>
<div id="Layer3" style="position:absolute; left:13px; top:110px; width:580px; height:100px; z-index:9">
  <table width="99%" border="1" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="10%" class="campotablasSP2"><div align="center">Codigo Equipo</div></td>
      <td width="24%" class="campotablasSP2"><div align="center">Nombre Completo</div></td>
      <td width="27%" class="campotablasSP2"><div align="center">Direcci&oacute;n</div></td>
      <td width="17%" class="campotablasSP2"><div align="center">Telefono</div></td>
      <td width="22%" class="campotablasSP2"><div align="center">Observaciones</div></td>
    </tr>
    <? 
	require_once("manejomysql.php");
	conectar_bd();
	$usuario_consulta = mysql_query("select e.cod_equipo, c.nombre_cliente, c.apellido_paterno, c.apellido_materno, c.direccion_cliente, c.telefono_cliente, c.observaciones_cliente
	from cliente c, equipo e where e.codigo_cliente=c.codigo_cliente order by cod_equipo;");
	
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		echo '<tr>'; 
	    
		$a=sacar_registro_bd($usuario_consulta);
					
		echo "
		
		<td class='campotablasSP'>&nbsp;".$a['cod_equipo']."</td>			
		<td class='campotablasSP'>&nbsp;".$a['nombre_cliente']." ".$a['apellido_paterno']." ".$a['apellido_materno']."</td>
		<td class='campotablasSP'>&nbsp;".$a['direccion_cliente']."</td>
		<td class='campotablasSP'>&nbsp;".$a['telefono_cliente']."</td>
		<td class='campotablasSP'><div align='center'>&nbsp;".$a['observaciones_cliente']."</div></td>

		";
		
		echo '</tr>';	
					
	}



	?>


  </table>
  <br>
  <div id="Layer4"></div>
</div>

</body>
</html>
