<?php

	require_once("manejomysql.php");
	conectar_bd();
	
//	echo 'SELECT cod_equipo, codigo_cliente, tipo_equipo, propiedad_equipo, condicion_entrega, tipo_garantia, observaciones_equipo FROM equipo';
	
	$usuario_consulta = mysql_query("SELECT cod_equipo, codigo_cliente, tipo_de_equipo, propiedad_equipo, condicion_entrega, tipo_garantia, observaciones_equipo FROM equipo");
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
<p><div align="center">QUITAR EQUIPO A UN CLIENTE</div></p>
<p><div align="center">INFORMACION DE EQUIPOS REGISTRADOS</div></p>'


		;
		echo '
		
		<br>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  				<tr> 
    			<td colspan="8" class="title"><div align="center">LISTA DE EQUIPOS REGISTRADOS</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Codigo Equipo</td>
			    <td class="title">Nombre Cliente</td>
			    <td class="title">Tipo de Equipo</td>
			    <td class="title">Propiedad Equipo</td>
			    <td class="title">Condicion Entrega</td>
			    <td class="title">Tipo de Garantia</td>
				<td class="title">Observaciones</td>
			    <td class="title">Quitar Equipo</td>
		</tr>';
		
					for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
						//$registro= sacar_registro_bd($usuario_consulta);
				
					echo '<tr>';
					 
		$registro= sacar_registro_bd($usuario_consulta);
		
		$codigo_equipo=$registro['cod_equipo'];
		$codigo_cliente=$registro['codigo_cliente'];
		$tipo_equipo=$registro['tipo_de_equipo'];
		$propiedad_equipo=$registro['propiedad_equipo'];
		$condicion_entrega=$registro['condicion_entrega'];
		$tipo_garantia=$registro['tipo_garantia'];
		$observaciones=$registro['observaciones_equipo'];
		$usuario_consulta2 = mysql_query("SELECT nombre_cliente, apellido_paterno, apellido_materno FROM cliente where codigo_cliente=".$codigo_cliente ) or die(header ("Location:error.php"));
		$registro2= sacar_registro_bd($usuario_consulta2);
		$name=$registro2['nombre_cliente']." ".$registro2['apellido_paterno']." ".$registro2['apellido_materno'];
		
		echo' <td class="campotablas">&nbsp;'.$codigo_equipo.'</td>
			    <td class="campotablas">&nbsp;'.$name.'</td>
			    <td class="campotablas">&nbsp;'.$tipo_equipo.'</td>
			    <td class="campotablas">&nbsp;'.$propiedad_equipo.'</td>
			    <td class="campotablas">&nbsp;'.$condicion_entrega.'</td>
			    <td class="campotablas">&nbsp;'.$tipo_garantia.'</td>
				<td class="campotablas">&nbsp;'.$observaciones.'</td>
			    <td class="campotablas">&nbsp;<a href="quitar_equipo2.php?id_equipo='.$codigo_equipo.'">Quitar Equipo</a></td>
		
		</tr>';
		
	

		}
		echo '</table>';
	
	}
	else
	{
		
			echo '<br>
 	 	 	<div align="center"><font color="#330000" size="4" class="titl">NO EXISTEN EQUIPOS REGISTRADOS</font><br>
   			</div>';
		
	}
	

	




 ?> 
  
<p>&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p><p>&nbsp;</p>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">


<p>&nbsp;</p>
</body>
</html>
