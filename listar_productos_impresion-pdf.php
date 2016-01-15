<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_producto,nombre_producto, nombre_chino, nombre_ingles, stock, stock_minimo, unidad FROM producto order by nombre_producto;" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<body>
<table>
<tr>
	<td>
		<div id="Layer5" style="position:absolute; left:89px; top:26px; width:115px; height:86px; z-index:5"><img src="images/test.jpg" width="119" height="85"></div>
	</td>
	<td>
		<div id="Layer1" style="position:absolute; left:290px; top:48px; width:245px; height:86px; z-index:5"><h2>INVENTARIOS PRODUCTOS</h2></div>
	</td>
<tr>
</table>
<br>
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr>
    <td class="title" >Codigo</td>
    <td class="title" >Nombre</td>
    <td class="title" >Nombre Ingles</td>
    <td class="title" >Nombre Chino</td>
    <td class="title" >QTY</td>
    <td class="title" >UNIT</td>
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['codigo_producto']."</td>
    			<td class='campotablas'>".$registro['nombre_producto']."</td>
				<td class='campotablas'>".$registro['nombre_ingles']."</td>
				<td class='campotablas'>".$registro['nombre_chino']."</td>
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
	</table> <p>&nbsp;</p>';
	
	
	
}
else
{

	echo "No hay registros de productos que cumplan con el requerimiento";

}


?>

