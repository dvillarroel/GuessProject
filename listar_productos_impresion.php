<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_producto,nombre_producto, nombre_chino, nombre_ingles, stock, stock_minimo, unidad FROM producto order by nombre_producto;" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
INVENTARIOS PRODUCTOS:

<br>
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr>
    <td class="title" width="25%">Codigo</td>
    <td class="title" width="30%">Detalle</td>
    <td class="title" width="25%">QTY</td>
    <td class="title" width="20%">UNIT</td>
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['codigo_producto']."</td>
    			<td class='campotablas'>".$registro['nombre_producto']."</td>
    			<td class='campotablas'>";
				
				if($registro['stock'] < $registro['stock_minimo'] || $registro['stock'] == $registro['stock_minimo'])
				{
					echo "<font color='#FF0000'>".$registro['stock']."</font>";
				}
				else
				{
					echo $registro['stock'];
				}
				echo "</td>
				
    			<td class='campotablas'>".$registro['unidad']." </td>";
			
		echo "</tr>";
		
	}
	
	echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="reportes.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
	
	
	
}
else
{

	echo "No hay registros de productos que cumplan con el requerimiento";

}


?>

