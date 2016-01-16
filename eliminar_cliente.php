<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="jquery-ui.css" rel="stylesheet">
	<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='docs/favicon.ico' />
    <link href="docs/css/metro.css" rel="stylesheet">
    <link href="docs/css/metro-icons.css" rel="stylesheet">
    <link href="docs/css/metro-responsive.css" rel="stylesheet">

    <script src="docs/js/jquery-2.1.3.min.js"></script>
    <script src="docs/js/jquery.dataTables.min.js"></script>

    <script src="docs/js/metro.js"></script>


<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, estado_cliente, apellido_materno, direccion_cliente, telefono_cliente FROM cliente order by apellido_paterno;" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<script language="JavaScript" type="text/JavaScript">
function uno(src,color_entrada) {
		//src.bgColor=color_entrada;src.style.cursor="hand";
}
function dos(src,color_default) {
		//src.bgColor=color_default;src.style.cursor="default";
}
</script>
<h1 class="text-light">Modificar Estado De Los Clientes<span class="mif-users place-right"></span></h1>
<hr class="thin bg-grayLighter">
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr >
    <td class="title">Codigo Cliente</td>
    <td class="title">C.I.</td>
    <td class="title">Apellidos</td>
    <td class="title">Nombres</td>
    <td class="title">Direccion </td>
	<td class="title">Estado Vendedor</td>
    <td class="title">Dar de Baja</td>
	 <td class="title">Dar de Alta</td>
	 </tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		echo '<tr onmouseover="'; echo "uno(this,'#000000');";  
           echo'" onmouseout="'; echo "dos(this,'#000060');";echo'">'; 
		echo "
				<td class='campotablas'>".$registro['codigo_cliente']."</td>
    			<td class='campotablas'>".$registro['ci_cliente']."</td>
   				<td class='campotablas'>".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td class='campotablas'>".$registro['nombre_cliente']."</td>
    			<td class='campotablas'>".$registro['direccion_cliente']." </td>
    			<td class='campotablas'>".$registro['estado_cliente']."</td>
    			<td class='campotablas'><a href=eliminar_cliente2.php?id=".$registro['codigo_cliente']."&estado=Activo >Dar de Baja </a></td>	
				<td class='campotablas'><a href=eliminar_cliente2.php?id=".$registro['codigo_cliente']."&estado=Inactivo>Dar de Alta</a></td>	";

	
			
		echo "</tr>";
	}
	
	echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="administrar_clientes.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
	
	
	
}
else
{

}


?>
