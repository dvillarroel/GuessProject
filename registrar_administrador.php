<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0


echo '<title> REGISTRAR NUEVO VENDEDOR</title>';
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>
 <SCRIPT language="javascript">

</SCRIPT>

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">FORMULARIO 
    DE REGISTRO DE NUEVO ADMINISTRADOR</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="registrar_administrador2.php" method="post" name="ventas" onSubmit="return validarFormulario(this);">

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

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N PERSONA</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Nombre:</td>
            <td width="25%" class="campotablas"><input type="text" name="nombre" maxlength="15" tabindex="3" class="Formulario"></td>
              <td width="25%" class="campotablas">CI:</td>
            <td width="25%" class="campotablas"><input type="text" name="ci" maxlength="20" tabindex="2" class="Formulario">            </td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
            <td class="campotablas"><input type="text" name="apellido_paterno" maxlength="15" tabindex="3" class="Formulario">            </td>
              <td class="campotablas">Telefono:</td>
            <td class="campotablas"><input name="telefono" type="text" class="Formulario" tabindex="4" maxlength="17"  >            </td>
          </tr>
		  
		  <tr> 
              <td height="113"class="campotablas">Apellido Materno:</td>
            <td class="campotablas"> <input type="text" name="apellido_materno"  maxlength="25" tabindex="5" class="Formulario">            </td>
              <td class="campotablas">Direccion:</td>
            <td class="campotablas"><input type="text" name="direccion" maxlength="255" tabindex="6" class="Formulario">            </td>
          </tr>
          
          <tr> 
              <td class="campotablas">Correo Electronico:</td>
            <td class="campotablas"><input name="email" type="text" class="Formulario" tabindex="7" value="test@hotmail.com"  maxlength="45"></td>
              <td class="campotablas">&nbsp;</td>
           <td class="campotablas">&nbsp;</td>
          </tr>
        </table>


</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
&nbsp;
&nbsp;
&nbsp;
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="2"  class="title">INFORMACI&Oacute;N USUARIO</td>
          </tr>
            <tr> 
              <td width="50%" class="campotablas">Nombre de Usuario:</td>
            <td width="50%" class="campotablas"><input type="text" name="username" maxlength="15" tabindex="3" class="Formulario"></td>
          </tr>
          <tr> 
              <td class="campotablas">Contrase&ntilde;a:</td>
            <td class="campotablas"><input type="password" name="pwd" maxlength="15" tabindex="3" class="Formulario">            </td>
          </tr>
		  
		  <tr> 
              <td height="113"class="campotablas">Repetir Contrase&ntilde;a:</td>
            <td class="campotablas"> <input type="password" name="pwd2"  maxlength="25" tabindex="5" class="Formulario">            </td>
          </tr>
          
          <tr> 
              <td class="campotablas">Estado de la Cuenta</td>
            <td class="campotablas">&nbsp;</td>

          </tr>
        </table>


</td>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
  <tbody><tr>
<td width="18" height="19" class="border-bleft"></td>
<td class="border-bmain"></td>
<td class="border-bright"></td></tr>
</tbody></table>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
<tr>
<td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<center>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td width="32%" height="24"  class="title" >OBSERVACIONES</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" ></textarea> </td>
    </tr>
  </table>



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
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
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
	</table>';


}

					

  
  
  ?>
  
 
<p>
  <script language="JavaScript">
			var cal1 = new calendar1(document.forms['ventas'].elements['correo_electronico']);
			cal1.year_scroll = true;
			cal1.time_comp = false;
			
			
		//-->
		</script>
</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
