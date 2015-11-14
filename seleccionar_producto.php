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
<p>&nbsp;</p>


  <div align="center"><font color="#330000" size="4">ADICIONAR PRODUCTO</font><br>
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
		
		<?php
	
	
	
	
	$codigo_cliente=$_GET['id_cliente'];
	$codigo_pedido=$_GET['id_pedido'];

	echo '<form method="post" action="completar_seleccion.php?id_cliente='.$codigo_cliente.'&id_pedido='.$codigo_pedido.'">';



 echo' </div>

  <table width="37%" border="1" align="center">
  <tr> 
    <td height="34" colspan="2" class="title"><div align="center">Productos</div></td>
  </tr>
  <tr> 
      <td height="44" class="Formulario" >Seleccionar Producto</td>
      <td class="Formulario"><select name="menu1" class="Seleccion">';
		
		  
		  			require_once("manejomysql.php");
					conectar_bd();			
		  			$usuario_consulta = mysql_query("SELECT cod_producto, nombre_producto from producto where estado_producto='Activo';" ) or die(header ("Location:error.php"));

					if (mysql_num_rows($usuario_consulta) != 0)
					{
															
						for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
						{
							$registro= sacar_registro_bd($usuario_consulta);
							$nombre_producto=$registro['nombre_producto'];
													
							echo '<option>'.$nombre_producto.'</option>';
						
						
						
						}
					}
			        
		echo '</select></td>
  </tr>
  <tr> 
    <td colspan="2" ><div align="center">
        <input name="image"  type="image" onMouseOver= src="images/bu1.gif" onMouseMove= src="images/bu1.gif" onMouseOut=src="images/bu2.gif" value="" SRC="images/bu2.gif" align="middle">
      </div></td>
  </tr>
</table>
</form>';?>
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
<p>&nbsp;</p>
</body>
</html>
