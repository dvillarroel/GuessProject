<?php

require_once("manejomysql.php");
conectar_bd();
//$cod=$_GET['cu'];

//echo $cod;
//echo $consulta;
$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
$querydatos = sacar_registro_bd($queryuser);
$consultauser = mysql_query("SELECT cod_rol FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
$querydatosuser = sacar_registro_bd($consultauser);

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK 
href="hoja_de_estilo.css" type=text/css 
rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<META content="MSHTML 6.00.2745.2800" name=GENERATOR>
<body  background="body2.jpg">


<table width="175" cellpadding="0" cellspacing="0">
  			<tbody>
    			<tr > 
      				<td height="31" ><img src="1C.gif" alt="" style="display: block;" height="30" width="19"></td>
      				<td width="100%" background="3.gif" class="titl">MENU DE OPCIONES</td>
      				<td ><img src="2C.gif" alt="" style="display: block;" height="30" width="19"></td>
    			</tr>
  			</tbody>
		</table>

<table width="175"  cellpadding="0" cellspacing="0">
<tbody>


<tr  >
      <td  class="campotablas3"><a href="principal_target.php" target="mainFrame">Principal</a> 
      </td>
</tr>

<?php if($querydatosuser['cod_rol'] != 1)
{
echo '	<tr  >
      <td  class="campotablas3"><a href="administrar_cuentas.php" target="mainFrame">Administrar Cuentas</a> 
      </td>
</tr>

	
	
	
	
	<tr>		
		<td  class="campotablas3"><a href="administrar_clientes.php" target="mainFrame" >Administrar Clientes</a> </td>
	</tr>
	<tr >
	
	
	
		</tr>
		
	<tr  >
		
			<td  class="campotablas3"><a href="administrar_productos.php" target="mainFrame">Administrar Productos</a> </td>
		
		</tr>';
		
		}
?>
	<tr  >
		
			<td  class="campotablas3"><a href="administrar_pedidos.php" target="mainFrame">Administrar Pedidos</a> </td>
		
		</tr>
		
	</tr>
		
			<td  class="campotablas3"><a href="buscar_cliente.php" target="mainFrame">Buscar Productos/clientes </a> </td>
		
		</tr>	
	
	<tr >
		
			<td  class="campotablas3"><a href="reportes.php" target="mainFrame">Reportes</a> </td>
		 
		</tr>	
		</tr>	
	
		</tr>
		
			<td  class="campotablas3"><a href="salir.php" target="_parent">Salir</a></td>
		
		</tr>
	

 

</tbody>
</table> 
<table width="175"  cellpadding="0" cellspacing="0">
<tbody><tr>
<td  width="18"><img src="6.gif" alt="" style="display: block;" height="30" width="19"></td>
<td  width="100%" background="5.gif"></td>
<td ><img src="4.gif" alt="" style="display: block;" height="30" width="19"></td></tr>
</tbody></table>





</body>
</html>
