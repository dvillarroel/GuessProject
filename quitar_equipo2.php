<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">QUITAR 
      EQUIPO</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<?php 
$id_c=$_GET['id_equipo'];

echo '<form action="quitar_equipo3.php?id_equipo='.$id_c.'" method="post">';
echo'
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
<td>';

$nc=$_GET['id_equipo'];
//echo "SELECT cod_equipo, codigo_cliente, tipo_de_equipo, propiedad_equipo, condicion_entrega, tipo_garantia, observaciones_equipo, fecha_registro_equipo, precio_equipo FROM equipo WHERE cod_equipo=".$nc;
require_once("manejomysql.php");
			conectar_bd();
			
			
						
			$resultado= consulta_bd("SELECT cod_equipo, codigo_cliente, tipo_de_equipo, propiedad_equipo, condicion_entrega, tipo_garantia, observaciones_equipo, fecha_registro_equipo, precio_equipo FROM equipo WHERE cod_equipo=".$nc );
			$registro=sacar_registro_bd($resultado);
			$codigo_cliente=$registro['codigo_cliente'];
			$tipo_equipo=$registro['tipo_de_equipo'];
			$propiedad_equipo=$registro['propiedad_equipo'];
			$condicion_entrega=$registro['condicion_entrega'];
			$precio_equipo=$registro['precio_equipo'];
			$tipo_garantia=$registro['tipo_garantia'];
			$observaciones=$registro['observaciones_equipo'];
			$fecha_registro=$registro['fecha_registro_equipo'];
			
			$usuario_consulta2 = mysql_query("SELECT nombre_cliente, apellido_paterno, apellido_materno FROM cliente where codigo_cliente=".$codigo_cliente ) or die(header ("Location:error.php"));
			$registro2= sacar_registro_bd($usuario_consulta2);
			$name=$registro2['nombre_cliente']." ".$registro2['apellido_paterno']." ".$registro2['apellido_materno'];
		//	$cod_cliente=$_GET['id'];


echo '<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N EQUIPO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Equipo:</td>
              <td width="25%" class="campotablas">&nbsp;'; 

			 echo $nc; 
             echo' </td>
              <td width="25%" class="campotablas">Nombre Cliente:</td>
              <td width="25%" class="campotablas">&nbsp;'.$name.'</td>';
			  echo
			  '
            </tr>
			<tr> 
              <td class="campotablas">Propiedad del Equipo:</td>
              <td class="campotablas">&nbsp;'.$propiedad_equipo.'
			  
			  </td>
              <td class="campotablas">Fecha de Registro:</td>
              <td class="campotablas">&nbsp;'.$fecha_registro.'</td>
            </tr>
			
            <tr> 
              <td class="campotablas">Tipo de Equipo:</td>
              <td class="campotablas">&nbsp;'.$tipo_equipo.'
			  
			  </td>
              <td class="campotablas">Condicion de Entrega:</td>
              <td class="campotablas">&nbsp;'.$condicion_entrega.'</td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Tipo de Garantia:</td>
              <td class="campotablas">&nbsp;'.$tipo_garantia.'
              </td>
              <td class="campotablas">Precio del Equipo:</td>
              <td class="campotablas">&nbsp;'.$precio_equipo.' 
              </td>
            </tr>
          </table>


</td>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="18" ></td>
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
      <td  class="campotablas" >&nbsp;'.$observaciones.'</td>
    </tr>
  </table>



</td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center"> <form action="quitar_equipo3.php.php" method="post"><input name="image"  type="image" onMouseOver= src="images/quitar_e1.gif" onMouseMove= src="images/quitar_e1.gif" onMouseOut=src="images/quitar_e2.gif" value="" SRC="images/quitar_e2.gif"> </td></form>
      <form action="quitar_equipo.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>';
  ?>
  
