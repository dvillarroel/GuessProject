<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente FROM cliente order by apellido_paterno;" ) or die(header ("Location:error.php"));

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
    <td class="title">Codigo Cliente</td>
    <td class="title">Nr. de Carnet de Identidad</td>
    <td class="title">Apellidos</td>
	<td class="title">Nombre(s)</td>
    <td class="title">Registrar Asignacion de Botellones</td>
   
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['codigo_cliente']."</td>
    			<td class='campotablas'>".$registro['ci_cliente']."</td>
   				<td class='campotablas'>".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>    		
    			<td class='campotablas'>".$registro['nombre_cliente']."</td>
				<td class='campotablas'><a href=registrar_equipoB.php?id=".$registro['codigo_cliente'].">Asignar Botellones</a></td>	";
	
			
		echo "</tr>";    

	}
	
	echo '</table>
	<p>&nbsp;</p>
<p align="center"><a href="administrar_equipos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
	
	
	
}
else
{

}


?>