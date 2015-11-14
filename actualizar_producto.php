<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, nombre_chino, nombre_ingles,precio_unitario_prod FROM producto;" ) or die(header ("Location:error.php"));

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
MODIFICAR INFORMACION PRODUCTOS:

<br>
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr>
    <td class="title" width="10%">Codigo Producto</td>
    <td class="title" width="10%">Nombre Producto</td>
    <td class="title" width="10%">Nombre Producto Chino</td>
    <td class="title" width="10%">Nombre Producto Ingles</td>
    <td class="title" width="20%">Precio Unitario</td>
    <td class="title" width="20%">Modificar Producto</td>
   	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		echo '<tr>'; 
		echo "
				<td class='campotablas'>".$registro['codigo_producto']."</td>
    			<td class='campotablas'>".$registro['nombre_producto']."</td>
				<td class='campotablas'>".$registro['nombre_chino']."</td>
				<td class='campotablas'>".$registro['nombre_ingles']."</td>
    			<td class='campotablas'>".$registro['precio_unitario_prod']."</td>
    			<td class='campotablas'><a href=modificar_producto.php?id=".$registro['codigo_producto'].">Modificar </a></td>	";
	
			
		echo "</tr>";
	}
	
	echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
	
	
	
}
else
{

}


?>
<script language="JavaScript" type="text/JavaScript">
function uno(src,color_entrada) {
		//src.bgColor=color_entrada;src.style.cursor="hand";
}
function dos(src,color_default) {
		//src.bgColor=color_default;src.style.cursor="default";
}
</script>