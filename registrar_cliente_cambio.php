<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT CODIGO_CBOTELLON, CODIGO_CLIENTE, NUMERO_BOTELLON, OBSERVACION_CAMBIO, EMPLEADO_CAMBIO, FECHA_CAMBIO FROM cambiobotellon;" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">

MODIFICAR INFORMACION CLIENTE:

<br>
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr>
    <td class="title">Numero</td>
    <td class="title">Nombre Completo Cliente</td>
    <td class="title">Equipo que se Cambio</td>
	<td class="title">Empleado que realizo el Cambio</td>
    <td class="title">Fecha de Cambio del Equipo</td>
	<td class="title">Observaciones</td>
   
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro2= sacar_registro_bd($usuario_consulta);
		
		$id=$registro2['CODIGO_CLIENTE'];
		$ii=$i+1;
		
		$usuario_consulta2 = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente FROM cliente where codigo_cliente=$id" );
		$registro= sacar_registro_bd($usuario_consulta2);
		echo "<tr>";
		echo "
				<td class='campotablas'>&nbsp;".$ii."</td>
    			<td class='campotablas'>&nbsp;".$registro['apellido_paterno']." " .$registro['apellido_materno']." " .$registro['nombre_cliente']."</td>
   				<td class='campotablas'>&nbsp;".$registro2['NUMERO_BOTELLON']."</td>    		
    			<td class='campotablas'>&nbsp;".$registro2['EMPLEADO_CAMBIO']."</td>
				<td class='campotablas'>&nbsp;".$registro2['FECHA_CAMBIO']."</td>
				<td class='campotablas'>&nbsp;".$registro2['OBSERVACION_CAMBIO']."</td>";
	
			
		echo "</tr>";    

	}
	
	echo '</table>
	<p>&nbsp;</p>
<p align="center"><a href="administrar_equipos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
	
	
	
}
else
{
echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">

NO EXISTE CAMBIOS REALIZADOS

<br>
<br>
';
	echo '
	<p>&nbsp;</p>
<p align="center"><a href="administrar_equipos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

}


?>