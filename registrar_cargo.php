<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0


echo '<title> REGISTRAR CLIENTE</title>';
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body background="body2.jpg">
 

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario"> 
      REGISTRAR CARGO</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="registrar_cargo2.php" method="post" name="ventas">

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
              <td colspan="2"  class="title">INFORMACI&Oacute;N CARGO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cargo:</td>
              <td width="25%" class="campotablas"> 
                <?php 
			require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(id_cargo) as p FROM cargo" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			
			$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];
			
			
			echo ' <input type="text" name="codigo_cliente" maxlength="15" tabindex="1" class="Formulario" value='.$nc.'>'; ?>
              </td>
            </tr>
            <tr> 
              <td class="campotablas">Cargo:</td>
              <td class="campotablas"><input type="text" name="cargo"  tabindex="3" class="Formulario"> 
              </td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Descripcion:</td>
              <td class="campotablas"> <input type="text" name="descripcion"  maxlength="25" tabindex="5" class="Formulario" > 
              </td>
            </tr>
            <tr> 
              <td class="campotablas">Sueldo Basico:</td>
              <td class="campotablas"> <input type="text" name="sueldo_basico"  tabindex="3" class="Formulario" value="0.00"></td>
            </tr>
            <tr> 
              <td class="campotablas">Sueldo Antiguedad:</td>
              <td class="campotablas"><input type="text" name="sueldo_ant"  tabindex="3" class="Formulario" value="0.00"></td>
            </tr>
            <tr> 
              <td class="campotablas">Otros:</td>
              <td class="campotablas"><input type="text" name="otros"  tabindex="3" class="Formulario" value="0.00"></td>
            </tr>
            <tr> 
              <td class="campotablas">Descuentos:</td>
              <td class="campotablas"><input type="text" name="descuentos"  tabindex="3" class="Formulario" value="0.00"></td>
            </tr>
            <tr> 
              <td class="campotablas">Observaciones</td>
              <td class="campotablas"><input type="text" name="observaciones"  tabindex="3" class="Formulario"></td>
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

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="ingresos.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  
  
  <?php 
  if( !empty($_GET['error_registro']) )
{
	$respuesta=null;
	if($_GET['error_registro'] == 1)
	{
		$respuesta='TIENE QUE LLENAR TODOS LOS CAMPOS QUE SON NECESARIOS';
	}
		
	echo '<br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table> <p>&nbsp;</p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>';


}

  
  
  ?>
  
