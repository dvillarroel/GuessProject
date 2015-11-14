<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, estado FROM cliente;" ) or die(header ("Location:error.php"));

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
MODIFICAR ESTADO DEL CLIENTE:

<br>
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr >
    <td class="title" width="10%">Codigo Cliente</td>
    <td class="title" width="10%">C.I.</td>
    <td class="title" width="15%">Nombres</td>
    <td class="title" width="15%">Apellidos</td>
    <td class="title" width="15%">Direccion </td>
    <td class="title" width="10%">Estado Cliente</td>
    <td class="title" width="15%">Dar de Baja</td>
	 <td class="title" width="15%">Dar de Alta</td>
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		echo '<tr onmouseover="'; echo "uno(this,'#000000');";  
           echo'" onmouseout="'; echo "dos(this,'#000060');";echo'">'; 
		echo "
				<td class='campotablas'>".$registro['codigo_cliente']."</td>
    			<td class='campotablas'>".$registro['ci_cliente']."</td>
    			<td class='campotablas'>".$registro['nombre_cliente']."</td>
   				<td class='campotablas'>".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td class='campotablas'>".$registro['direccion_cliente']." </td>
    			<td class='campotablas'>".$registro['estado']."</td>
    			<td class='campotablas'><a href=dar_baja_cliente2.php?id=".$registro['codigo_cliente']."&estado=Activo >Dar de Baja </a></td>	
				<td class='campotablas'><a href=dar_baja_cliente2.php?id=".$registro['codigo_cliente']."&estado=Inactivo>Dar de Alta</a></td>	";
	
			
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
