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
.Estilo1 {color: #330000}
-->
 </style>
 <body background="body2.jpg">

 

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">CARGAR PRODUCTOS A LA BASE DE DATOS</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>


<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ></td>
      <td ></td>
      <td></td>
    </tr>
  </tbody>
</table>

  <br>
  <p align="center"><a href="cargar_producto2.php" onclick="return confirm('Seguro que quieres registrar nuevos productos en el sistema?');">REGISTRAR NUEVOS PRODUCTOS</a></p>
  <br>
  <p align="center"><a href="actualizar_producto2.php" onclick="return confirm('Seguro que quieres actualizar las propiedades de todos los productos?');">ACTUALIZAR PRODUCTOS</a></p>
  <br>
  <p align="center"><a href="actualizar_stock_producto2.php" onclick="return confirm('Seguro que quieres actualizar el Stock de todos los productos?');" >ACTUALIZAR STOCK PRODUCTOS</a></p>
  <br>
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
  