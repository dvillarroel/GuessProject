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

$usuario_consulta = mysql_query("select cod_persona, cod_usuario, cod_rol, nombre, apellidop, apellidom, ci, telefono, direccion, email, descripcion from persona where cod_rol=1;" );

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
<h1 class="text-light">Modificar Estado De Los Vendedores<span class="mif-users place-right"></span></h1>
<hr class="thin bg-grayLighter">
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr >
    <td class="title" width="10%">Nombre</td>
    <td class="title" width="10%">Apellidos</td>
    <td class="title" width="15%">Carnet de Identidad</td>
    <td class="title" width="15%">Telefono</td>
    <td class="title" width="15%">direccion </td>
	<td class="title" width="10%">Estado Vendedor</td>
    <td class="title" width="15%">Dar de Baja</td>
	 <td class="title" width="15%">Dar de Alta</td>
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		$usuario_consulta2 = mysql_query("select estado from usuario where cod_usuario=".$registro['cod_usuario']);
		//echo "select estado from usuario where cod_usuario=".$registro['cod_usuario'];
		$registro2= sacar_registro_bd($usuario_consulta2);
				
		echo '<tr onmouseover="'; echo "uno(this,'#000000');";  
        echo'" onmouseout="'; echo "dos(this,'#000060');";echo'">'; 
		echo "
				<td class='campotablas'>".$registro['nombre']."</td>
    			<td class='campotablas'>".$registro['apellidop']." " .$registro['apellidom']."</td>
    			<td class='campotablas'>".$registro['ci']."</td>
   				<td class='campotablas'>".$registro['telefono']."</td>
    			<td class='campotablas'>".$registro['direccion']." </td>
    			<td class='campotablas'>".$registro2['estado']."</td>
    			<td class='campotablas'><a href=dar_baja_vendedor2.php?id=".$registro['cod_usuario']."&estado=Activo >Dar de Baja </a></td>	
				<td class='campotablas'><a href=dar_baja_vendedor2.php?id=".$registro['cod_usuario']."&estado=Inactivo>Dar de Alta</a></td>	";
	
			
		echo "</tr>";
	}
	
	echo '
	</table> <p>&nbsp;</p>
<p align="center"><a href="administrar_vendedores.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
	
	
	
}
else
{

}


?>

</html>
