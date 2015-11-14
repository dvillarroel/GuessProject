<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
<body background="body2.jpg">
<div id="Layer1" ><font color="#330000" size="2"><strong>Bienvenido 
  Usuario :
<?php
//session_register('motos');
require_once("manejomysql.php");
conectar_bd();
//$cod=$_GET['cu'];

//echo $cod;
//echo $consulta;
$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
$querydatos = sacar_registro_bd($queryuser);
$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
$querydatosuser = sacar_registro_bd($consultauser);
echo $querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM'];

$usuario_consulta = mysql_query("SELECT nombre_producto, nombre_chino, nombre_ingles, stock, stock_minimo, unidad FROM producto where stock < stock_minimo order by nombre_producto;" );

if (mysql_num_rows($usuario_consulta) > 0)
{	
echo '<br><br>Hay productos que estan debajo del stock minimo:
				<br>
<br>
';

	echo '<table width="40%" border="0" cellpadding="0" cellspacing="0">
  	<tr>
    <td class="title" width="20%">Castellano</td>
    <td class="title" width="20%">Stock actual</td>
    <td class="title" width="20%">Stock Minimo</td>
  	</tr>';

	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		
		
		if($registro['stock'] < $registro['stock_minimo'] || $registro['stock'] == $registro['stock_minimo'])
		{
			
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['nombre_producto']."</td>
    			<td class='campotablasSTOCK'><font color='FF0000'>".$registro['stock']."</font></td>
    			<td class='campotablas'>".$registro['stock_minimo']." </td>";
			
		echo "</tr>";
		}
		
	}	
	echo '</table>';

	
	}

				
?> 
  
  </strong></font></div>
</body>
</html>
