<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
<body background="body2.jpg">
<p>&nbsp;</p>

<form method="post" action="buscar_vendedor.php">
  <br>
   <div align="center"><br>
   
  </div>


<table width="35%" border="1" align="center">
  <tr> 
    <td height="34" colspan="2"><div align="center">BUSCAR VENDEDOR</div></td>
  </tr>
  <tr> 
    <td height="44"><select name="menu1" class="Seleccion" >
        <option>Carnet de Identidad</option>
        <option>Nombre del Vendedor</option>
		<option selected>Apellido Paterno</option>
		</select></td>
    <td><input type="text" name="buscar" class="Formulario"></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center">
        <input name="image"  type="image" onMouseOver= src="images/bu1.gif" onMouseMove= src="images/bu1.gif" onMouseOut=src="images/bu2.gif" value="" SRC="images/bu2.gif" align="middle">
      </div></td>
  </tr>
</table>
</form>
<?php
 if( !empty($_GET['error']) )
{
	
	
	if($_GET['error'] == 1)
	{
		$respuesta='TIENE QUE INGRESAR LA INFORMACION DEL CLIENTE';
	}
	
	if($_GET['error'] == 2)
	{
		$respuesta='CODIGO DE USUARIO INCORRECTO';
	}
	
	if($_GET['error'] == 3)
	{
		$respuesta='CARNET DE IDENTIDAD INCORRECTO';
	}
		if($_GET['error'] == 5)
	{
		$respuesta='LA BUSQUEDA NO GENERO NINGUN RESULTADO';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}
?>
<p>&nbsp;</p><p>&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
<p>&nbsp;</p>
</body>
</html>
