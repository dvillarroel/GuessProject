<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente FROM cliente;" ) or die(header ("Location:error.php"));

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<body background="body2.jpg">
MODIFICAR INFORMACION CLIENTE:

<br>
<br>
';

	echo '<table width="100%" border="1">
  	<tr>
    <td>Codigo Cliente</td>
    <td>Nr. de Carnet de Identidad</td>
    <td>Nombres</td>
    <td>Apellidos</td>
    <td>Direccion </td>
    <td>Telefono</td>
    <td>Modificar Cliente</td>
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		echo "<tr>";
		echo "
				<td>".$registro['codigo_cliente']."</td>
    			<td>".$registro['ci_cliente']."</td>
    			<td>".$registro['nombre_cliente']."</td>
   				<td>".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td>".$registro['direccion_cliente']." </td>
    			<td>".$registro['telefono_cliente']."</td>
    			<td><a href=modificar_cliente.php?id=".$registro['codigo_cliente']."></font> <font color='#FFCC99'>Modificar </a></td>	";
	
			
		echo "</tr>";
	}
	
	echo '</table>';
	
	
	
}
else
{

}


?>