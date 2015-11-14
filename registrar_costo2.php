<? 

$cod_costo=$_POST['codigo_cliente'];
$tipo_costo=$_POST['apellido_paterno'];
$monto=$_POST['nombres'];
$fecha=$_POST['correo_electronico'];

require_once("manejomysql.php");
conectar_bd();

consulta_bd("insert into costos values ($cod_costo, 1, '$tipo_costo',$monto, '$fecha');" );

echo '
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">


<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">DETALLE DE REGISTRO</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="registrar_cliente2.php" method="post" name="ventas">

<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ></td>
      <td ></td>
      <td></td>
    </tr>
  </tbody>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="50%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="2"  class="title">INFORMACI&Oacute;N COSTO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Costo:</td>
              <td width="25%" class="campotablas">'.$cod_costo; 
		
			echo ' 
              </td>
              
            </tr>
            <tr> 
              <td class="campotablas">Tipo de Costo:</td>
              <td class="campotablas">'.$tipo_costo; 
              echo '</td>
              
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Monto:</td>
              <td class="campotablas">'.$monto.' 
              </td>
             
            </tr>
            <tr> 
              <td class="campotablas">Fecha de Registro:</td>
              <td class="campotablas">'.$fecha.'</td>
            
            </tr>
          </table>


</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>

<br>
  

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<center>




</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="border-bleft" width="18"></td>
<td class="border-bmain"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td class="border-bright"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>
<p>&nbsp;</p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>



';




 
?> 

