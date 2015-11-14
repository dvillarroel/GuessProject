<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Sistema de Administracion Clientes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK 
href="hoja_de_estilo.css" type=text/css 
rel=stylesheet>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body background="body2.jpg">
<div id="Layer3" style="position:absolute; left:367px; top:44px; width:405px; height:93px; z-index:3">
  <div align="center"><font color="#330000" size="6" face="Times New Roman, Times, serif"><strong>Poseidon</strong></font></div>
</div>

<div align="center"  id="Layer1" > </div>

<div id="Layer1" style="position:absolute; left:446px; top:179px; width:275px; height:251px; z-index:1" align="center">
  <form action="validar2.php" method="post">
    <table width="280" border="0" cellpadding="0" cellspacing="0" bordercolor="#0066FF" align="center">
      <tr> 
        <td background="images\arriba.gif">&nbsp;</td>
      </tr>
      <tr> 
        <td height="120" width="280" background="images\cuerpo2.jpg" ><table width="247" border="0" align="center">
            <tr> 
              <td colspan="2" height="35" class="titulo_it2">IDENTIFICARSE</td>
            </tr>
            <tr> 
              <td class="titulo_it3" >Nombre Usuario</td>
              <td ><input class="Formulario"  type="text" name="text1" > </td>
            </tr>
            <tr> 
              <td><font  class="titulo_it3">Constrase&ntilde;a</font></td>
              <td> <input class="Formulario" type="password" name="text2" > </td>
            </tr>
            <tr> 
              <td  height="45" colspan="2"><div align="center"> 
                  <input name="image"  type="image" onMouseOver= src="images/I1.gif" onMouseMove= src="images/I1.gif" onMouseOut=src="images/I2.gif" value="" SRC="images/I2.gif">
                </div></td>
            </tr>
          </table></td>
      </tr>
      <tr> 
        <td height="30" background="images\abajo.jpg">&nbsp;</td>
      </tr>
    </table>
    <div align="center"><BR>
      <BR>
    </div>
  </form>
</div>
<div id="Layer4" style="position:absolute; left:394px; top:425px; width:366px; height:96px; z-index:4">
<?php
if( !empty($_GET['error_login']) )
{

	if($_GET['error_login'] == 1)
	{
		$respuesta='EL NOMBRE DE USUARIO NO PUEDE ESTAR VACIO';
	}
	if($_GET['error_login'] == 2)
	{
		$respuesta='LA CONTRASENA NO PUEDE ESTAR VACIO';
	}
	
	if($_GET['error_login'] == 3)
	{
		$respuesta='EL NOMBRE DE USUARIO ES INCORRECTO';
	}
	
	if($_GET['error_login'] == 4)
	{
		$respuesta='LA CONTRASENA ES INCORRECTA';
	}
	
	echo '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}

?></div>
</body>
</html>
