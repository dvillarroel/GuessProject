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
      DETALLE DE CARGO EN LA EMPRESA</font></td>
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
			$resultado= consulta_bd("SELECT id_cargo, cargo, descripcion, sueldo_basico, antiguedad, otros, descuentos, observaciones FROM cargo where id_cargo=".$_GET['id']);
			
			$a=sacar_registro_bd($resultado);

			
			
			echo ' <input type="text" name="codigo_cliente" maxlength="15" tabindex="1" readonly="true" class="Formulario" value='.$a['id_cargo'].'>'; ?>
              </td>
            </tr>
            <tr> 
              <td class="campotablas">Cargo:</td>
              <td class="campotablas"><input type="text" name="cargo"  tabindex="3" class="Formulario" readonly="true" value=<? echo $a['cargo'];?> > 
              </td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Descripcion:</td>
              <td class="campotablas"> <input type="text" name="descripcion"  maxlength="25" readonly="true" tabindex="5" class="Formulario" value=<? echo $a['descripcion'];?>> 
              </td>
            </tr>
            <tr> 
              <td class="campotablas">Sueldo Basico:</td>
              <td class="campotablas"> <input type="text" name="sueldo_basico"  tabindex="3" readonly="true" class="Formulario" value=<? echo $a['sueldo_basico'];?>></td>
            </tr>
            <tr> 
              <td class="campotablas">Sueldo Antiguedad:</td>
              <td class="campotablas"><input type="text" name="sueldo_ant"  tabindex="3" readonly="true" class="Formulario" value=<? echo $a['antiguedad'];?>></td>
            </tr>
            <tr> 
              <td class="campotablas">Otros:</td>
              <td class="campotablas"><input type="text" name="otros"  tabindex="3" readonly="true" class="Formulario" value=<? echo $a['otros'];?>></td>
            </tr>
            <tr> 
              <td class="campotablas">Descuentos:</td>
              <td class="campotablas"><input type="text" name="descuentos"  tabindex="3" readonly="true" class="Formulario" value=<? echo $a['descuentos'];?>></td>
            </tr>
            <tr>
              <td class="campotablas">Observaciones</td>
              <td class="campotablas"><input type="text" name="observaciones"  tabindex="3" readonly="true" class="Formulario" value=<? echo $a['observaciones'];?>></td>
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


  <br>
  <div id="Layer4"><p align="center"><a href="listar_cargos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p></div>
</div>  
  
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
  
