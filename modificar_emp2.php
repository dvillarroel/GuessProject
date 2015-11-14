<?php

if(!empty($_POST['codigo_cliente']) && !empty($_POST['nombre_empleado']) && !empty($_POST['apellidos']) || !empty($_POST['direccion']) || !empty($_POST['telefono']) || !empty($_POST['direccion']))
{

	require_once("manejomysql.php");
	conectar_bd();
	$codigo_cliente=$_POST['codigo_cliente'];
	$nombre_empleado=$_POST['nombre_empleado'];
	$ap=$_POST['apellidos'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$observa=$_POST['observaciones'];
	$cargo=$_POST['cargo'];
	
	
	$result= consulta_bd("SELECT id_cargo FROM cargo where cargo='$cargo'" );
	$array=sacar_registro_bd($result);
	$id_cargo=$array['id_cargo'];

	
	$consulta="update empleados set id_cargo=$id_cargo, nombre_emp='$nombre_empleado', apellido_emp='$ap',direccion_emp='$direccion',telefono_emp='$telefono',observacion_emp='$observa' where id_empleado=$codigo_cliente;";
//	echo $consulta;

	mysql_query($consulta);

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
LA INFORMACION DEL EMPLEADO SE REGISTRO CORRECTAMENTE:

<br>
<br>
INFORMACION DE REGISTRO:';

echo '<br>


<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>

<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N EMPLEADO</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Empleado:</td>
              <td width="25%" class="campotablas">'.$codigo_cliente.'</td>
              <td width="25%" class="campotablas">Nombre Empleado:</td>
              <td width="25%" class="campotablas">'.$nombre_empleado.'</td>
          </tr>
          <tr> 
              <td class="campotablas">Apellidos Empleados:</td>
              <td class="campotablas">'.$ap.'</td>
              <td class="campotablas">Direccion Empleado:</td>
              <td class="campotablas">'.$direccion.'</td>
          </tr>


		  <tr> 
              <td height="27"class="campotablas"> Telefono:</td>
              <td class="campotablas">'.$telefono.'</td>
              <td class="campotablas">Cargo empleado:</td>
              <td class="campotablas">'.$cargo.'</td>
          </tr>
          

		  
          
         
		  
        </table>


</td>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="18" class="border-bleft"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

<br>
  <table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>

<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<center>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td width="32%" height="24"  class="title" >OBSERVACIONES</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" >'.$observa.'</textarea> </td>
    </tr>
  </table>



</td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
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

';


echo '  <br>
<p align="center"><a href="administrar_emp.php">Regresar Administrar Empleados</a></p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>



';

}

else
{
	header ("Location:registrar_cliente.php?error_registro=1");
	exit;

}


?>



