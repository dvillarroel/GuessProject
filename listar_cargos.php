<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SOLICITUD DE PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

</head>

<body>
<div id="Layer5" style="position:absolute; left:13px; top:6px; width:115px; height:86px; z-index:5"><img src="pl%E1stico_tapas.bmp" width="110" height="78"></div>
<div id="Layer2" style="position:absolute; left:182px; top:26px; width:279px; height:36px; z-index:2"><font size="3" class="campotablas"><strong>Cargos 
  registrados en la Empresa</strong></font></div>
<div id="Layer3" style="position:absolute; left:13px; top:110px; width:580px; height:100px; z-index:9">
  <table width="99%" border="1" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="10%" class="campotablasSP2"><div align="center">Nombre Cargo</div></td>
      <td width="24%" class="campotablasSP2"><div align="center">Descripcion</div></td>
      <td width="27%" class="campotablasSP2"><div align="center">Sueldo Basico</div></td>
	  <td width="22%" class="campotablasSP2"><div align="center">Observaciones</div></td>
      <td width="17%" class="campotablasSP2"><div align="center">Mas Detalles 
          Cargo </div></td>
      <td width="22%" class="campotablasSP2"><div align="center">Modificar Cargo</div></td>

    </tr>
    <? 
	require_once("manejomysql.php");
	conectar_bd();
	$usuario_consulta = mysql_query("select cargo, descripcion, sueldo_basico, observaciones, id_cargo from cargo;");
	
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		echo '<tr>'; 
	    
		$a=sacar_registro_bd($usuario_consulta);
					
		echo "
		
		<td class='campotablasSP'>&nbsp;".$a['cargo']."</td>			
		<td class='campotablasSP'>&nbsp;".$a['descripcion']."</td>
		<td class='campotablasSP'>&nbsp;".$a['sueldo_basico']."</td>
		<td class='campotablasSP'>&nbsp;".$a['observaciones']."</td>
		<td class='campotablasSP'><a href='ver_cargo.php?id=".$a['id_cargo']."'>Mas detalles</a></td>
		<td class='campotablasSP'><a href='modificar_cargo.php?id=".$a['id_cargo']."'>Modificar</a></td>

		";
		
		echo '</tr>';	
					
	}



	?>


  </table>
  <br>
  <div id="Layer4"><p align="center"><a href="administrar_emp.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p></div>
</div>

</body>
</html>
