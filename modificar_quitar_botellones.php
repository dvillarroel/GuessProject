<?php

	require_once("manejomysql.php");
	conectar_bd();
	
//	echo 'SELECT cod_equipo, codigo_cliente, tipo_equipo, propiedad_equipo, condicion_entrega, tipo_garantia, observaciones_equipo FROM equipo';
	
	$usuario_consulta = mysql_query("SELECT codigo_botellon, codigo_cliente, numero_botellon, observacion_entrega, empleado_entrega, fecha_sus FROM botellones");
	if (mysql_num_rows($usuario_consulta) != 0)
	{	
	
	echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>
<p><div align="center">MODIFICAR / QUITAR EQUIPO A UN CLIENTE</div></p>
<p><div align="center">INFORMACION DE BOTELLONES REGISTRADOS</div></p>'


		;
		echo '
		
		<br>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  				<tr> 
    			<td colspan="8" class="title"><div align="center">LISTA DE EQUIPOS REGISTRADOS</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Codigo Registro</td>
			    <td class="title">Nombre Cliente</td>
			    <td class="title">Numero de Botellones</td>
			    <td class="title">Observaciones</td>
				<td class="title">Empleado que Realizo la entrega</td>
			    <td class="title">Fecha de Registro</td>
			    <td class="title">Modificar Registro</td>
			    <td class="title">Quitar Equipo</td>
		</tr>';
		
					for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
						//$registro= sacar_registro_bd($usuario_consulta);
				
					echo '<tr>';
					 
		$registro= sacar_registro_bd($usuario_consulta);
		
		$codigo_equipo=$registro['codigo_botellon'];
		$codigo_cliente=$registro['codigo_cliente'];
		$tipo_equipo=$registro['numero_botellon'];
		$empleado=$registro['empleado_entrega'];
		$propiedad_equipo=$registro['observacion_entrega'];
		$condicion_entrega=$registro['fecha_sus'];
		$usuario_consulta2 = mysql_query("SELECT nombre_cliente, apellido_paterno, apellido_materno FROM cliente where codigo_cliente=".$codigo_cliente ) or die(header ("Location:error.php"));
		$registro2= sacar_registro_bd($usuario_consulta2);
		$name=$registro2['apellido_paterno']." ".$registro2['apellido_materno']." ".$registro2['nombre_cliente'];
		
		echo' <td class="campotablas">&nbsp;'.$codigo_equipo.'</td>
			    <td class="campotablas">&nbsp;'.$name.'</td>
			    <td class="campotablas">&nbsp;'.$tipo_equipo.'</td>
			    <td class="campotablas">&nbsp;'.$propiedad_equipo.'</td>
				<td class="campotablas">&nbsp;'.$empleado.'</td>
			    <td class="campotablas">&nbsp;'.$condicion_entrega.'</td>
			    <td class="campotablas">&nbsp;<a href="registrar_equipo2BModificar.php?id='.$codigo_equipo.'">Modificar</a></td>
			    <td class="campotablas">&nbsp;<a href="quitar_asignacion.php?id='.$codigo_equipo.'">Quitar Botellones</a></td>
		
		</tr>';
		
	

		}
		echo '</table>';
	
	}
	else
	{
		
			echo '<br>
 	 	 	<div align="center"><font color="#330000" size="4" class="titl">NO EXISTEN BOTELLONES REGISTRADOS</font><br>
   			</div>';
		
	}
	

	




 ?> 
  
<p>&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p><p>&nbsp;</p>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">


<p>&nbsp;</p>
</body>
</html>
