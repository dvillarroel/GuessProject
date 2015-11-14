<? 

$cod_costo=$_POST['codigo_cliente'];

$cargo=$_POST['cargo'];
$descripcion=$_POST['descripcion'];
$sueldo_basico=$_POST['sueldo_basico'];
$sueldo_ant=$_POST['sueldo_ant'];
$otros=$_POST['otros'];
$descuentos=$_POST['descuentos'];
$observaciones=$_POST['observaciones'];



require_once("manejomysql.php");
conectar_bd();

//echo "update cargo set id_cargo=$cod_costo, cargo='$cargo', descripcion='$descripcion', sueldo_basico=$sueldo_basico, antiguedad=$sueldo_ant, otros=$otros, descuentos=$descuentos,  observaciones='$observaciones' where id_cargo=$cod_costo);";
consulta_bd("update cargo set id_cargo=$cod_costo, cargo='$cargo', descripcion='$descripcion', sueldo_basico=$sueldo_basico, antiguedad=$sueldo_ant, otros=$otros, descuentos=$descuentos,  observaciones='$observaciones' where id_cargo=$cod_costo;" );

echo '
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">


<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">LA MODIFICACION DEL REGISTRO SE REALIZO CORRECTAMENTE</font></td>
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
              <td colspan="2"  class="title">INFORMACI&Oacute;N DEL CARGO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cargo:</td>
              <td width="25%" class="campotablas">'.$cod_costo; 
		
			echo ' 
              </td>
              
            </tr>
            <tr> 
              <td class="campotablas">Cargo:</td>
              <td class="campotablas">'.$cargo; 
              echo '</td>
              
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Descripcion:</td>
              <td class="campotablas">'.$descripcion.' 
              </td>
             
            </tr>
            <tr> 
              <td class="campotablas">Salario Basico:</td>
              <td class="campotablas">'.$sueldo_basico.'</td>
            
            </tr>
			            <tr> 
              <td class="campotablas">Antiguedad:</td>
              <td class="campotablas">'.$sueldo_ant.'</td>
           
            </tr>
			
			            <tr> 
              <td height="27"class="campotablas"> Otros :</td>
              <td class="campotablas">'. $otros.' 
              </td>
             
            </tr>
            <tr> 
              <td class="campotablas">Descuentos:</td>
              <td class="campotablas">'.$descuentos.'</td>
            
            </tr>
			            <tr> 
              <td class="campotablas">Observaciones:</td>
              <td class="campotablas">'.$observaciones.'</td>
            
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
<p align="center"><a href="administrar_emp.php">Regresar Administrar Empleados</a></p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>



';




 
?> 

