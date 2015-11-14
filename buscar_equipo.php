<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
<body background="body2.jpg">
<p>&nbsp;</p>

<form method="post" action="modificar_equipo.php">
  <br>


<table width="37%" border="1" align="center">
  <tr> 
    <td height="34" colspan="2" class="title"><div align="center">BUSCAR EQUIPO</div></td>
  </tr>
  <tr> 
      <td height="44" class="Formulario" >Ingresar Codigo del Equipo</td>
    <td class="Formulario"><input type="text" name="buscar" class="Formulario"></td>
  </tr>
  <tr> 
    <td colspan="2" ><div align="center">
        <input name="image"  type="image" onMouseOver= src="images/bu1.gif" onMouseMove= src="images/bu1.gif" onMouseOut=src="images/bu2.gif" value="" SRC="images/bu2.gif" align="middle">
      </div></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p align="center"><a href="administrar_equipos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

<?php
 if( !empty($_GET['error']) )
{
	
	
	if($_GET['error'] == 1)
	{
		$respuesta='CODIGO DE EQUIPO INCORRECTO';
	}
	
	if($_GET['error'] == 2)
	{
		$respuesta='CODIGO DE USUARIO INCORRECTO';
	}
	
	if($_GET['error'] == 3)
	{
		$respuesta='CARNET DE IDENTIDAD INCORRECTO';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}
?>
<p>&nbsp;</p>
</body>
</html>
