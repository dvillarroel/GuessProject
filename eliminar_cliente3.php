<?php

	require_once("manejomysql.php");
	conectar_bd();
	
	$codigo_cliente=$_GET['id'];

	//$estado='activo';
	
	//echo "update cliente set ci_cliente=$ci, nombre_cliente='$nombres', apellido_paterno='$ap', apellido_materno='$am', direccion_cliente='$direccion', telefono_cliente=$telefono, e_mail='$email' where codigo_cliente=$codigo_cliente;";
	$consulta="DELETE FROM cliente WHERE CODIGO_CLIENTE=$codigo_cliente";
	mysql_query($consulta);

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
 <div align="center"><font color="#330000" size="4" class="titl">EL CLIENTE FUE ELIMINADO CORRECTAMENTE DE LA BASE DE DATOS, LOS CODIGOS DE LOS EQUIPOS DEBEN SER RETIRADOS PARA LA ASIGNACION DE OTRO CLIENTE

<br>
<br>
</font><br>
   
  </div>
';
echo '
<table width="80%" align="center" cellpadding="0" cellspacing="0" >
<tbody><tr>
<td  width="18"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>

<table width="30%" border="0" align="center" >
    <tr>
      
    <td align="center">&nbsp; </td>
  </form>
  
  <p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

';


?>



