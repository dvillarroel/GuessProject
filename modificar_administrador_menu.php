<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("select cod_persona, cod_usuario, cod_rol, nombre, apellidop, apellidom, ci, telefono, direccion, email, descripcion from persona where cod_rol=2;" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<script language="JavaScript" type="text/JavaScript">
function uno(src,color_entrada) {
		//src.bgColor=color_entrada;src.style.cursor="hand";
}
function dos(src,color_default) {
		//src.bgColor=color_default;src.style.cursor="default";
}
</script>
MODIFICAR ESTADO DE LOS ADMINISTRADOR:

<br>
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr >
    <td class="title" width="10%">Nombre</td>
    <td class="title" width="10%">Apellidos</td>
    <td class="title" width="15%">Carnet de Identidad</td>
    <td class="title" width="15%">Telefono</td>
    <td class="title" width="15%">direccion </td>
	<td class="title" width="10%">Estado Cliente</td>
    <td class="title" width="15%">Modificar</td>
	 
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
    			<td class='campotablas'><a href=modificar_administrador2.php?id=".$registro['cod_persona']."&estado=Activo >Modificar</a></td>";
	
			
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