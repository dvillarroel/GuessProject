<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0
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
 
  <script language="JavaScript" >
function Validar()
{
	var resp;
  if( document.ventas.correo_electronico.value >= document.ventas.correo_electronico2.value )
 {
   alert("Error: Seleccione las fechas correctamente");
  	resp=false;
  }
  else
  {
  //alert(document.ventas.correo_electronico.value);
  resp=true;
  }
  return resp;
 
}</script>
 	<?php 
			require_once("manejomysql.php");
			conectar_bd();
			$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
			$registro7= sacar_registro_bd($resultado7);
			$fecha=$registro7['date'];
	?>

<br>
<form action="ingreso_periodo.php" method="post" name="ventas" onSubmit="return Validar()">
  <div align="center"><font color="#330000" size="4" class="titl">Ingresos por 
    Pedidos Entregados</font><br>
    <br>
  </div>
  <table width="50%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="2"  class="title"><div align="center">Seleccionar Fechas</div></td>
            </tr>
            <tr> 
              <td width="20%" class="campotablas">Desde:</td>
              <td width="80%" class="campotablas"><input type="text" name="correo_electronico" id="correo_electronico" maxlength="20" tabindex="8" class="Formulario" value=<? echo $fecha ?> readonly="true"/> 
                <a href="javascript:cal1.popup();" > <img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  > 
                </a></td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Hasta:</td>
              <td class="campotablas"> <input type="text" name="correo_electronico2" id="correo_electronico2" maxlength="20" tabindex="8" class="Formulario" value=<? echo $fecha ?>  readonly="true"/> 
                <a href="javascript:cal2.popup();" > <img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  > 
                </a> </td>
            </tr>
            <tr> 
              <td height="60" colspan="2"class="campotablas"><div align="center">
                  <input name="image"  type="image" onMouseOver= src="images/bu1.gif" onMouseMove= src="images/bu1.gif" onMouseOut=src="images/bu2.gif" value="" SRC="images/bu2.gif" align="middle">
                </div></td>
            </tr>
          </table>


</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<tbody><tr>
<td width="18" height="19" class="border-bleft"></td>
<td class="border-bmain"></td>
<td class="border-bright"></td></tr>
</tbody></table>

<br>
  <table width="100%" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr> 
        <td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
      </tr>
    </tbody>
  </table>
  <br>

<table width="30%" border="0" align="center" >
    <tr>
      
    <td align="center">&nbsp; </td>
  </form>
      </tr>
	  </table>
	  <p align="center"><a href="ingresos2.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

<script language="JavaScript">
			var cal1 = new calendar1(document.forms['ventas'].elements['correo_electronico']);
			cal1.year_scroll = true;
			cal1.time_comp = false;
			var cal2 = new calendar1(document.forms['ventas'].elements['correo_electronico2']);
			cal2.year_scroll = true;
			cal2.time_comp = false;
			
			
		//-->
		</script>