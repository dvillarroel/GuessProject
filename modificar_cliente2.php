<?php

if(!empty($_POST['ci']) || !empty($_POST['apellido_paterno']) || !empty($_POST['apellido_materno']) || !empty($_POST['nombres']) || !empty($_POST['direccion']))
{

	require_once("manejomysql.php");
	conectar_bd();
	
	$codigo_cliente=$_GET['id'];
	$ci=$_POST['ci'];
	$ap=$_POST['apellido_paterno'];
	$am=$_POST['apellido_materno'];
	$nombres=$_POST['nombres'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$email=$_POST['correo_electronico'];
	
	$observaciones=$_POST['observaciones'];
	//$estado='activo';
	
	//echo "update cliente set ci_cliente=$ci, nombre_cliente='$nombres', apellido_paterno='$ap', apellido_materno='$am', direccion_cliente='$direccion', telefono_cliente=$telefono, e_mail='$email' where codigo_cliente=$codigo_cliente;";
	$consulta="update cliente set ci_cliente=$ci, nombre_cliente='$nombres', apellido_paterno='$ap', apellido_materno='$am', direccion_cliente='$direccion', telefono_cliente='$telefono', e_mail='$email', observaciones_cliente='$observaciones' where codigo_cliente=$codigo_cliente;";
	mysql_query($consulta) or die(header ("Location:registrar_cliente.php?error_registro=2"));

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
 <div align="center"><font color="#330000" size="4" class="titl">EL CLIENTE SE ACTUALIZO CORRECTAMENTE:

<br>
<br>
INFORMACION DE REGISTRO:</font><br>
   
  </div>
';

echo '<br>
<form action="registrar_cliente2.php" method="post">

<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td  width="100%"></td>
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
              <td colspan="4"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
              <td width="25%" class="campotablas">'.$codigo_cliente.'</td>
              <td width="25%" class="campotablas">Nro. Carnet de Identidad:</td>
              <td width="25%" class="campotablas">'.$ci.'</td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
              <td class="campotablas">'.$ap.'</td>
              <td class="campotablas">Apellido Materno:</td>
              <td class="campotablas">'.$am.'</td>
          </tr>
		  
		  <tr> 
              <td height="27"class="campotablas"> Nombres:</td>
              <td class="campotablas">'.$nombres.'</td>
              <td class="campotablas">Direccion:</td>
              <td class="campotablas">'.$direccion.'</td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
              <td class="campotablas">'.$telefono.'</td>
              <td class="campotablas">Correo Electronico:</td>
              <td class="campotablas">'.$email.'</td>
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
      <td  width="100%"></td>
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
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" >'.$observaciones.'</textarea> </td>
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
  
  <p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

';



}

else
{
	header ("Location:registrar_cliente.php?error_registro=1");
	exit;

}


?>



