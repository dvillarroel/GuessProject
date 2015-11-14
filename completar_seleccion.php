<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
<body background="body2.jpg">




<?php

require_once("manejomysql.php");
conectar_bd();

$codigo_cliente=$_GET['id_cliente'];
$codigo_pedido=$_GET['id_pedido'];
$nombre_producto=$_POST['menu1'];


echo '<table width="40%" border="1" align="center">
  <tr> 
    <td colspan="4" class="title">INFORMACION PEDIDO</td>
  </tr>
  <tr> 
    <td class="campotablas3">Codigo Cliente</td>
    <td class="campotablas3">'.$codigo_cliente.'</td>
    <td class="campotablas3">Codigo Pedido</td>
    <td class="campotablas3">'.$codigo_pedido.'</td>
  </tr>
</table>
<p>&nbsp;</p>';

$usuario_consulta = mysql_query("SELECT cod_producto, precio_unitario, n_equipo FROM producto WHERE nombre_producto='$nombre_producto';" ) or die(header ("Location:error.php"));

$registro= sacar_registro_bd($usuario_consulta);

$necesita_equipo=$registro['n_equipo'];
$precio_unitario=$registro['precio_unitario'];
$cod_producto=$registro['cod_producto'];




if($necesita_equipo == "No")
{

	echo'<form action="completar_seleccion2.php?id_cliente='.$codigo_cliente.'&id_pedido='.$codigo_pedido.'&id_producto='.$cod_producto.'&precio='.$precio_unitario.'" method="post"><table width="40%" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="2" class="title"><div align="center">INFORMACION DE PRODUCTO</div></td>
  </tr>
  <tr> 
    <td class="campotablas3" width="50%" >Codigo Producto :</td>
    <td class="campotablas3" width="50%" >'.$cod_producto.'</td>
  </tr>
  <tr> 
    <td class="campotablas3" width="50%" >Nombre Producto :</td>
    <td class="campotablas3" width="50%" >'.$nombre_producto.'</td>
  </tr>
  <tr> 
    <td class="campotablas3" width="50%" >Precio Unitario Producto:</td>
    <td class="campotablas3" width="50%" >'.$precio_unitario.'</td>
  </tr>
  <tr> 
    <td class="campotablas3" width="50%" >Cantidad de Productos:</td>
    <td class="campotablas3" width="50%" ><input type="text" name="nombres"  maxlength="3" tabindex="5" class="Formulario" value="1"></td>
  </tr>
</table>
<br><br>
<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/ap.gif" onMouseMove= src="images/ap.gif" onMouseOut=src="images/ap2.gif" value="" SRC="images/ap2.gif"> </td></form>
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>

';

}
else
{

	$usuario_consulta = mysql_query("SELECT cod_equipo FROM equipo WHERE codigo_cliente=".$codigo_cliente );
	$arregl=array();
	if (mysql_num_rows($usuario_consulta) != 0)
	{
		//echo "SELECT cod_equipo FROM detalle_pedido WHERE codigo_cliente=".$codigo_cliente." and cod_pedido=".$codigo_pedido;
			
			$arregl=array();
			
			
			for ( $j=0; $j< cuantos_registros_bd($usuario_consulta); $j++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				$arregl[]=$registro['cod_equipo'];
			}
						
						
					
		
	
			if(count($arregl) != 0)
			{
						echo'<form action="completar_seleccion2.php?id_cliente='.$codigo_cliente.'&id_pedido='.$codigo_pedido.'&id_producto='.$cod_producto.'&precio='.$precio_unitario.'" method="post"><table width="40%" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr> 
    	<td colspan="2" class="title"><div align="center">INFORMACION DE PRODUCTO</div></td>
  		</tr>
  		<tr> 
    	<td class="campotablas3" width="50%" >Codigo Producto :</td>
    	<td class="campotablas3" width="50%" >'.$cod_producto.'</td>
  		</tr>
  		<tr> 
    	<td class="campotablas3" width="50%" >Nombre Producto :</td>
    	<td class="campotablas3" width="50%" >'.$nombre_producto.'</td>
  		</tr>
  		<tr> 
    	<td class="campotablas3" width="50%" >Precio Unitario Producto:</td>
    	<td class="campotablas3" width="50%" >'.$precio_unitario.'</td>
  		</tr>
  		<tr> 
    	<td class="campotablas3" width="50%" >Seleccionar Codigo de Equipo</td>
    	<td class="campotablas3" width="50%" ><select name="menu1" >';
	 	for ( $k=0; $k< count($arregl); $k++)
		{
	 			
    			echo '<option>'.$arregl[$k].'</option>';
  		}				
	
	
		echo'</select></td>
  		</tr>
		</table>
		<br><br>
		<table width="30%" border="0" align="center" >
    		<tr>
      	<td align="center">
	  	<input name="image"  type="image" onMouseOver= src="images/ap.gif" onMouseMove= src="images/ap.gif" onMouseOut=src="images/ap2.gif" value="" SRC="images/ap2.gif"> </td></form>
      	<form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    	</tr>
  		</table>

		';
			
			}
			
			else
			{
				echo '<p align="center"><font color="#990000" size="4">TODOS SUS EQUIPOS YA ESTAN OCUPADOS</font></p>';
	
			}
		
		
		
	
		

	}
	else
	{
		echo '<p align="center"><font color="#990000" size="4">EL CLIENTE NO TIENE UN EQUIPO REGISTRADO</font></p>';
	}
	
	
}




?>
<form name="form1">
 
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>
<p>&nbsp;</p>
</body>
</html>
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
	if($_GET['error'] == 4)
	{
		$respuesta='CODIGO DE EQUIPO INCORRECTO';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}
?>
