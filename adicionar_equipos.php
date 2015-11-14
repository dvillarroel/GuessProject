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
      ACTUALIZAR EL NUMERO DE EQUIPOS DE LA EMPRESA</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="resumen_equipos_empresa2.php" method="post">

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

<table width="70%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
            <td colspan="3"  class="title"><font color="#000033">RESUMEN EQUIPOS 
              DE LA EMPRESA</font></td>
          </tr>
          <tr> 
            <td width="40%" class="campotablas">FECHA DE REGISTRO:</td>
            <td width="25%" class="campotablas"> 
              <?php 
			require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT CODIGO_EE, TOTAL_BASE, TOTAL_BOTELLON, BOTELLON_PRESTADOS, BASE_PRESTADOS, BASE_DANADOS, BOTELLONES_DANADOS, OBSERVACION_REGISTRO, EMPLEADO_REGISTRO, FECHA_REGISTRO FROM equipos_empresa ");
			
			$a=sacar_registro_bd($resultado);

			
			
			echo $a['FECHA_REGISTRO']; ?>
            </td>
			 <td class="campotablas">
			 </td>
          </tr>
          <tr> 
            <td class="campotablas">EMPLEADO QUE REALIZO EL REGISTRO:</td>
            <td class="campotablas"><? echo $a['EMPLEADO_REGISTRO'];?> 
            </td>
            <td class="campotablas">&nbsp; </td>
 
          </tr>
          <tr> 
            <td height="27"class="campotablas"> TOTAL DE BOTELLONES:</td>
            <td class="campotablas"> = <? echo $a['TOTAL_BOTELLON'];?> + el Siguiente numero de botellones 
            </td>
			<td class="campotablas"><input name="botellon" type="text" class="Formulario"  tabindex="3" value=0  > 
            </td>
        
          </tr>
          <tr> 
            <td class="campotablas">TOTAL DE BASE PARA LOS BOTELLONES:</td>
            <td class="campotablas">= <? echo $a['TOTAL_BASE'];?>  + el Siguiente numero de botellones </td>
           <td class="campotablas"><input name="base" type="text" class="Formulario"  tabindex="3" value=0  > 
            </td>
  
          </tr>
          <tr>
            <td class="campotablas">OBSERVACIONES</td>
            <td class="campotablas"><? echo $a['OBSERVACION_REGISTRO'];?></td>
            <td class="campotablas"><input name="observacion" type="text" class="Formulario"  tabindex="3" value=<? echo $a['OBSERVACION_REGISTRO'];?>  > 
            </td>
 
          </tr>
        </table> 


<BR>
  <br>

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="equipos_empresa.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  

      </td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<BR></td>
<td >&nbsp;</td>
</tr></tbody>
</table>
<br>
  <BR></td>
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

