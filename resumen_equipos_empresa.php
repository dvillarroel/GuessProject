<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0


echo '<title> REGISTRAR CLIENTE</title>';
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario"> 
      EQUIPOS DE LA EMPRESA</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="modificar_cargo2.php" method="post" name="ventas">

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
            <td colspan="2"  class="title"><font color="#000033">RESUMEN EQUIPOS 
              DE LA EMPRESA</font></td>
          </tr>
          <tr> 
            <td width="25%" class="campotablas">FECHA DE REGISTRO:</td>
            <td width="25%" class="campotablas"> 
              <?php 
			require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT CODIGO_EE, TOTAL_BASE, TOTAL_BOTELLON, BOTELLON_PRESTADOS, BASE_PRESTADOS, BASE_DANADOS, BOTELLONES_DANADOS, OBSERVACION_REGISTRO, EMPLEADO_REGISTRO, FECHA_REGISTRO FROM equipos_empresa ");
			
			$a=sacar_registro_bd($resultado);

			
			
			echo ' <input type="text" name="codigo_cliente" maxlength="15" tabindex="1" readonly="true" class="Formulario" value='.$a['FECHA_REGISTRO'].'>'; ?>
            </td>
          </tr>
          <tr> 
            <td class="campotablas">EMPLEADO QUE REALIZO EL REGISTRO:</td>
            <td class="campotablas"><input name="cargo" type="text" class="Formulario"  tabindex="3" value=<? echo $a['EMPLEADO_REGISTRO'];?> readonly="true" > 
            </td>
          </tr>
          <tr> 
            <td height="27"class="campotablas"> TOTAL DE BOTELLONES:</td>
            <td class="campotablas"> <input type="text" name="descripcion"  maxlength="25" tabindex="5" readonly="true" class="Formulario" value=<? echo $a['TOTAL_BOTELLON'];?>> 
            </td>
          </tr>
          <tr> 
            <td class="campotablas">TOTAL DE BASE PARA LOS BOTELLONES:</td>
            <td class="campotablas"> <input type="text" name="sueldo_basico"  tabindex="3" class="Formulario" readonly="true" value=<? echo $a['TOTAL_BASE'];?>></td>
          </tr>
          <tr>
            <td class="campotablas">OBSERVACIONES</td>
            <td class="campotablas"><input type="text" name="sueldo_basico2"  tabindex="3" class="Formulario" readonly="true" value=<? echo $a['OBSERVACION_REGISTRO'];?>></td>
          </tr>
        </table> 


<BR>

<table width="50%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="2"  class="title"><font color="#000033">RESUMEN EQUIPOS 
                PRESTADOS</font></td>
            </tr>
            <tr> 
              <td width="25%" height="27"class="campotablas"> TOTAL DE BOTELLONES 
                PRESTADOS:</td>
              <td width="25%" class="campotablas"> <input type="text" name="descripcion"  maxlength="25" tabindex="5" readonly="true" class="Formulario" value=<? echo $a['BOTELLON_PRESTADOS'];?>> 
              </td>
            </tr>
            <tr> 
              <td class="campotablas">TOTAL DE BASE PARA LOS BOTELLONES PRESTADOS:</td>
              <td class="campotablas"> <input type="text" name="sueldo_basico"  tabindex="3" class="Formulario" readonly="true" value=<? echo $a['BASE_PRESTADOS'];?>></td>
            </tr>
          </table> 

</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<BR>

<table width="50%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              
      <td colspan="2"  class="title"><font color="#000033">RESUMEN EQUIPOS DANADOS</font></td>
            </tr>
            <tr> 
              
      <td width="25%" height="27"class="campotablas"> TOTAL DE BOTELLONES DANADOS:</td>
              <td width="25%" class="campotablas"> <input type="text" name="descripcion"  maxlength="25" tabindex="5" readonly="true" class="Formulario" value=<? echo $a['BOTELLONES_DANADOS'];?>> 
              </td>
            </tr>
            <tr> 
              
      <td class="campotablas">TOTAL DE BASE PARA LOS BOTELLONES DANADOS:</td>
              <td class="campotablas"> <input type="text" name="sueldo_basico"  tabindex="3" class="Formulario" readonly="true" value=<? echo $a['BASE_DANADOS'];?>></td>
            </tr>
          </table> 

</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<br>
  <BR>

<table width="50%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
  <tr> 
    <td colspan="2"  class="title"><font color="#000033">RESUMEN EQUIPOS QUE DEBEN 
      ESTAR EN EL ALMANCEN DE LA EMPRESA</font></td>
  </tr>
  <tr> 
    <td width="25%" height="27"class="campotablas"> TOTAL DE BOTELLONES:</td>
    <td width="25%" class="campotablas"> <input type="text" name="descripcion"  maxlength="25" tabindex="5" readonly="true" class="Formulario" value=<? $t=$a['TOTAL_BOTELLON']-$a['BOTELLON_PRESTADOS']-$a['BOTELLONES_DANADOS']; echo $t; ?>> 
    </td>
  </tr>
  <tr> 
    <td class="campotablas">TOTAL DE BASE PARA LOS BOTELLONES:</td>
    <td class="campotablas"> <input type="text" name="sueldo_basico"  tabindex="3" class="Formulario" readonly="true" value=<? $t2=$a['TOTAL_BASE']-$a['BASE_PRESTADOS']-$a['BASE_DANADOS']; echo $t2;?>></td>
  </tr>
  <tr> 
    <td colspan="2" class="campotablas">Nota: Este es el numero de equipos que 
      estan disponibles para la entrega y prestamo para nuestros clientes</td>
  </tr>
</table> 

</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>

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

  <br>
<p align="center"><a href="administrar_equipos.php">Regresar Administrar Equipos</a></p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>
