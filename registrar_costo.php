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
 

<script language="JavaScript" src="calendar1.js"></script>
<script language="javascript"> 
 function window_open()
  {
	var newWindow;
	var urlstring = 'calendar.html'
	newWindow = window.open(urlstring,'','height=200,width=280,toolbar=no,minimize=no,status=no,memubar=no,location=no,scrollbars=no')
  }
 </script>
 

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">FORMULARIO 
      DE REGISTRO DE COSTOS</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="registrar_costo2.php" method="post" name="ventas">

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
              <td width="25%" class="campotablas"> 
                <?php 
			require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(id_costo) as p FROM costos" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			
			$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];
			
			
			echo ' <input type="text" name="codigo_cliente" maxlength="15" tabindex="1" class="Formulario" value='.$nc.'>'; ?>
              </td>
              
            </tr>
            <tr> 
              <td class="campotablas">Tipo de Costo:</td>
              <td class="campotablas"><input type="text" name="apellido_paterno"  tabindex="3" class="Formulario"> 
              </td>
              
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Monto:</td>
              <td class="campotablas"> <input type="text" name="nombres"  maxlength="25" tabindex="5" class="Formulario" value="0.00"> 
              </td>
             
            </tr>
            <tr> 
              <td class="campotablas">Fecha de Registro:</td>
              <td class="campotablas"> <input type="text" name="correo_electronico" id="correo_electronico" maxlength="20" tabindex="8" class="Formulario" value=<? echo $fecha ?> readonly="true" /> 
                <a href="javascript:cal1.popup();" onclick="desavilitar();"> <img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  > 
                </a> </td>
            
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
	</table> <p>&nbsp;</p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>';


}

  
  
  ?>
  
 <script language="JavaScript">
			var cal1 = new calendar1(document.forms['ventas'].elements['correo_electronico']);
			cal1.year_scroll = true;
			cal1.time_comp = false;
			
			
		//-->
		</script>