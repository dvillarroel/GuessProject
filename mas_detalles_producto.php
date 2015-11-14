<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>
 <SCRIPT language="javascript">
		  function validarFormulario(formulario)
		    {
		     return ((vacio(formulario.ci.value,"NOMBRE PRODUCTO"))&&
		     (vacio(formulario.apellido_paterno.value,"PRECIO DEL PRODUCTO")));
		}	
</SCRIPT>

 <style type="text/css">
<!--
.Estilo1 {
	color: #000033
}
-->
 </style>
 <body background="body2.jpg">

 <?PHP
 
 	$tipo=$_GET['buscar'];
	require_once("manejomysql.php");
	conectar_bd();
	$consulta="SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria, stock_minimo, observaciones_producto, imagen1, preferencial, regular, irregular from producto where codigo_producto='$tipo'";
	//echo $consulta;
	$usuario_consulta = mysql_query($consulta);
	if (mysql_num_rows($usuario_consulta) != 0)
	{	
		$registro= sacar_registro_bd($usuario_consulta);

	
	}

echo ' 

<br>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="4"  class="title Estilo1">INFORMACI&Oacute;N PRODUCTO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Producto:</td>
              <td width="25%" class="campotablas">'.$registro['codigo_producto'].'</td>
              <td width="25%" class="campotablas">Nombre Producto:</td>
              <td width="25%" class="campotablas">'.$registro['nombre_producto'].'</td>
            </tr>
            <tr> 
              <td class="campotablas">Marca:</td>
              <td class="campotablas">'.$registro['marca'].'</td>
              <td class="campotablas">Industria:</td>
              <td class="campotablas">'.$registro['industria'].'</td>
            </tr>
                        <tr> 
              <td class="campotablas">Precio Unitario:</td>
              <td class="campotablas">'.$registro['precio_unitario_prod'].'</td>
              <td class="campotablas">Stock en Almacen:</td>
              <td class="campotablas">'.$registro['stock'].'</td>
                        </tr>
            <tr> 
              <td height="27"class="campotablas"> Stock Minimo del Producto:</td>
              <td class="campotablas">'.$registro['stock_minimo'].'</td>
              <td class="campotablas"></td>
              <td class="campotablas"></td>
            </tr>';
/*            <tr> 
              <td height="27"class="campotablas">Precio Cliente Regular:</td>
              <td class="campotablas">'.$registro['regular'].'</td>
              <td class="campotablas">Precio Cliente Irregular:</td>
              <td class="campotablas">'.$registro['irregular'].'</td>
            </tr>
	*/		
      echo '  </table>


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
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
              <td width="32%" height="24"  class="title" >DESCRIPCION DEL PRODUCTO</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" >'.$registro['observaciones_producto'].'</textarea> </td>
    </tr>
  </table>



</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<table width="42%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="border-bleft" width="18"></td>
<td class="border-bmain"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"><img src="Img_prod/'.$registro['imagen1'].'" width="400" height="300"></td>
<td class="border-bright"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</table>

  <br>

 </body>
  
  
  <p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
';

?>
  