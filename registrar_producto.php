<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>
 <SCRIPT language="javascript">
		  function validarFormulario(formulario)
		    {
		     return ((vacio(formulario.ci.value,"NOMBRE PRODUCTO"))&&
		     (vacio(formulario.apellido_paterno.value,"PRECIO DEL PRODUCTO")));
		}	
</SCRIPT>

<body background="body2.jpg">

 

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">FORMULARIO 
      DE REGISTRO DE PRODUCTOS</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="registrar_producto2.php" method="post" name="ventas" enctype="multipart/form-data">

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
              <td colspan="4"  class="title">INFORMACI&Oacute;N PRODUCTO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Producto:</td>
              <td width="25%" class="campotablas"> 
                <input type="text" name="codigo_cliente" maxlength="15" tabindex="1" class="Formulario" >              </td>
              <td width="25%" class="campotablas">Nombre Producto:</td>
              <td width="25%" class="campotablas"><input type="text" name="ci" maxlength="30" tabindex="2" class="Formulario">              </td>
            </tr>
             <tr> 
              <td class="campotablas">Nombre en Chino:</td>
              <td class="campotablas"><input type="text" name="nchino" maxlength="15" tabindex="3" class="Formulario">              </td>
              <td class="campotablas">Nombre en Ingles:</td>
              <td class="campotablas"><input type="text" name="ningles" maxlength="15" tabindex="3" class="Formulario"></td>
            </tr>

            <tr> 
              <td class="campotablas">Marcas:</td>
              <td class="campotablas"><input type="text" name="marca" maxlength="15" tabindex="3" class="Formulario">              </td>
              <td class="campotablas">Industria:</td>
              <td class="campotablas"><input type="text" name="industria" maxlength="15" tabindex="3" class="Formulario"></td>
            </tr>
                        <tr> 
              <td class="campotablas">Precio Unitario:</td>
              <td class="campotablas"><input name="apellido_paterno" type="text" class="Formulario" tabindex="3" value="0" maxlength="15">              </td>
              <td class="campotablas">Stock en Almacen:</td>
              <td class="campotablas"><input name="stock" type="text" class="Formulario" tabindex="3" value="0" maxlength="15"></td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Stock Minimo del Producto:</td>
              <td class="campotablas"> <input name="stock_min" type="text" class="Formulario" tabindex="3" value="0" maxlength="15"></td>
              <td class="campotablas">Unidad</td>
              <td class="campotablas"><input name="Unidad" type="text" class="Formulario" tabindex="3" maxlength="15"></td>
            </tr>
            <tr>
              <td height="27"class="campotablas">Precio Cliente Preferencial:</td>
              <td class="campotablas"><input name="Precio_Pref" type="text" class="Formulario" tabindex="3" value="0" maxlength="15"></td>
              <td class="campotablas">Precio Cliente Regular:</td>
              <td class="campotablas"><input name="Precio_Regular" type="text" class="Formulario" tabindex="3" value="0" maxlength="15"></td>
            </tr>
            <tr>
              <td height="27"class="campotablas">Precio Cliente Irregular:</td>
              <td class="campotablas"><input name="Precio_Irregular" type="text" class="Formulario" tabindex="3" value="0" maxlength="15"></td>
              <td class="campotablas">Cargar Imagen:</td>
              <td class="campotablas"><input type="file" name="uploadField"></td>
            </tr>
          </table>


</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="19" class="border-bleft"></td>
<td class="border-bmain"></td>
<td class="border-bright"></td></tr>
</tbody></table>

<br>
  <table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
        <td height="31" >&nbsp;</td>
      <td ></td>
        <td >&nbsp;</td>
    </tr>
  </tbody>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<center>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
              <td width="32%" height="24"  class="title" >DESCRIPCION DEL PRODUCTO</td>
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
</table>

  <br>

<table width="30%" border="0" align="center">
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  </body>
  
  
  <p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
  
  
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
  