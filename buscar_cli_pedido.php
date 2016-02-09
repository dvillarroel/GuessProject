<script>
function enable(id)
{
	console.log(id);
	
	if(document.getElementById("check"+id.toString()).checked==true){
	document.getElementById("number"+id.toString()).disabled=false;
	document.getElementById("number"+id.toString()).focus();
	}
	else{
	document.getElementById("number"+id.toString()).disabled=true;
	}
		
}

</script>  
  
 <link rel="stylesheet" href="bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap.js"></script>

<link rel="stylesheet" href="colorbox.css" />
<script src="jquery2.js"></script>
<script src="jquery.colorbox.js"></script>
<script>
			$(document).ready(function(){
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>


<?php

$newvar = false;

if(empty($_POST['buscar']))
{
	$newvar = false;
}
else
{
	$tipo=$_POST['menu1'];
	$var=$_POST['buscar'];
	$newvar = true;
	//echo "entro";
}
if(empty($_GET['buscar']))
{
	if($newvar == true)
	{
		
	}
	else
	{
		$newvar = false;
	}
}
else
{
	$tipo=$_GET['menu1'];
	$var=$_GET['buscar'];
	//echo $tipo;
	$newvar = true;
}

if($newvar == true)
{

	$id_pedido=$_GET['id_pedido'];
	$id_cliente=$_GET['id_cliente'];
	require_once("manejomysql.php");
	conectar_bd();
		
	if($tipo == 'Codigo de producto' || $tipo == 1)
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by codigo_producto;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<p>PRODUCTOS ENCONTRATOS</p>
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Detalles</td>
			<td class="campotablasSP2" >Adicionar Producto</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['codigo_producto'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					$valueCod=urlencode($registro['codigo_producto']);
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto2.php?cod_producto=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido."&menu1=1&buscar=".$var.">Mas Detalles</a></td>



					<td class='campotablas'><a href=adicionar_producto.php?menu1=1&buscar=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido.">Adicionar Producto</a></td>";
					echo "</tr>";
						
				}	
					
			}
			echo "</table>";
			

		}
		
	}

	if($tipo == 'Nombre de Producto' || $tipo == 2)
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by nombre_producto;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			$numeroconsulta=mysql_num_rows($usuario_consulta);
			
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<p>PRODUCTOS ENCONTRATOS</p>
			<div>
				<form action="adicionar_multiplesproductos.php?cod='.$numeroconsulta.'&menu1=1&id_cliente='.$id_cliente.'&id_pedido='.$id_pedido.'" method="post">
			';
			
			echo '<div class="container">

  <!-- Trigger the modal with a button -->



';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Seleccionar producto</td>
			<td class="campotablasSP2" >cantidad</td>
			<td class="campotablasSP2" >Detalles</td>
			<td class="campotablasSP2" >Adicionar Producto</td>


			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['nombre_producto'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					$valueCod=urlencode($registro['codigo_producto']);
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td  class='campotablasSP'>"; ?>
					
					<input type='checkbox' name='check<?php echo $i; ?>' value='<?php echo $valueCod;?>' id='check<?php echo $i; ?>' onClick="enable('<?php echo $i; ?>');"> 
					<?php
					echo "Seleccionar</td><td class='campotablasSP'><input type='number' name='number".$i."' min='1' max='".$registro['stock']."' value='0' id='number".$i."' disabled></td>
					
					<td class='campotablas'>";
	
					echo "<a href=mas_detalles_producto3.php?cod_producto=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido."&menu1=1&buscar=".$var." class='iframe'>Mas Detalles</a></td>




					<td class='campotablas'><a href=adicionar_producto.php?menu1=1&buscar=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido.">Adicionar Producto</a></td>";
					echo "</tr>";
						
				}	
					
			}
			echo "</table>";
			
			echo '  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>';
			


		}
		
		echo '<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
</div>
';
		
		
	}


		if($tipo == 'Marca' || $tipo == 3)
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by marca;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<body background="body2.jpg">
			<p>PRODUCTOS ENCONTRATOS</p>
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Detalles</td>
			<td class="campotablasSP2" >Adicionar Producto</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['marca'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					$valueCod=urlencode($registro['codigo_producto']);
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto2.php?cod_producto=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido."&menu1=1&buscar=".$var.">Mas Detalles</a></td>



					<td class='campotablas'><a href=adicionar_producto.php?menu1=1&buscar=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido.">Adicionar Producto</a></td>";
					echo "</tr>";						
				}	
					
			}
			echo "</table>";

		}
		
	}

		if($tipo == 'Industria' || $tipo == 4)
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by Industria;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<body background="body2.jpg">
			<p>PRODUCTOS ENCONTRATOS</p>
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Detalles</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['industria'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					$valueCod=urlencode($registro['codigo_producto']);
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto2.php?cod_producto=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido."&menu1=1&buscar=".$var.">Mas Detalles</a></td>



					<td class='campotablas'><a href=adicionar_producto.php?menu1=1&buscar=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido.">Adicionar Producto</a></td>";
					echo "</tr>";						
				}	
					
			}
			echo "</table>";

		}
		
	}


		if($tipo == 'Observaciones' || $tipo == 5)
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria, observaciones_producto from producto order by Industria;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<body background="body2.jpg">
			<p>PRODUCTOS ENCONTRATOS</p>
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >observaciones producto</td>
			<td class="campotablasSP2" >Detalles</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['observaciones_producto'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					$valueCod=urlencode($registro['codigo_producto']);
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto2.php?cod_producto=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido."&menu1=1&buscar=".$var.">Mas Detalles</a></td>



					<td class='campotablas'><a href=adicionar_producto.php?menu1=1&buscar=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido.">Adicionar Producto</a></td>";
					echo "</tr>";						
				}	
					
			}
			echo "</table>";

		}
		
	}

	
	
	if($tipo == 'Codigo Cliente')
	{
		

		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var;" ) or die(header ("Location:error.php"));

		if (mysql_num_rows($usuario_consulta) != 0)
		{	
				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];
	
		}
		else
		{
		
			header ("Location:buscar_cliente.php?error=2");
			exit;
		
		}
		header ("Location:buscar_cliente2.php?menu1=1&buscar=".$var);
		exit;
		
	}
	if($tipo == 'Nr. Carnet de Identidad')
	{	$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE  ci_cliente=$var;" ) or die(header ("Location:error.php"));
		
		if (mysql_num_rows($usuario_consulta) != 0)
		{	
		
		$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];

	
		}
		
		else
		{
				header ("Location:buscar_cliente.php?error=3");
				exit;
		
		}
		header ("Location:buscar_cliente2.php?menu1=2&buscar=".$var);
		exit;
		
	
	}
	
	if($tipo == 'Codigo de Equipo de agua')
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		
		//echo 'SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo='.$var;
		$usuario_consulta = mysql_query("SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;" ) or die(header ("Location:error.php"));	
			
			if (mysql_num_rows($usuario_consulta) != 0)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				$var2=$registro['codigo_cliente'];
			
				$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var2;" ) or die(header ("Location:error.php"));

				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
				$observaciones=null;
					
					
		
		}
		else
		{	
				header ("Location:buscar_cliente_pedido.php?error=4");
				exit;
		}
	
		header ("Location:buscar_cliente2.php?menu1=3&buscar=".$var);
		exit;

	}	
	
	
	if($tipo == 'Apellido del Cliente')
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by apellido_paterno" );
			
		if (mysql_num_rows($usuario_consulta) != 0)
		{
					echo '
					
					<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet"><p>INFORMACION CLIENTE</p>
				<form action="registrar_cliente2.php" method="post">
				<table width="80%" align="center" cellpadding="0" cellspacing="0">
 			 <tbody>
			 <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  	<tr>
    <td class="campotablasSP2" >Codigo Cliente</td>
    <td class="campotablasSP2" >C.I.</td>
    <td class="campotablasSP2" >Apellidos</td>
    <td class="campotablasSP2" >Nombres</td>
    <td class="campotablasSP2" >Direccion </td>
    <td class="campotablasSP2" >Telefono</td>
    <td class="campotablasSP2" >Fecha de Suscripcion</td>
	<td class="campotablasSP2" >Detalles</td>
  	</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['apellido_paterno'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
		echo "<tr>";
		echo "
				<td  class='campotablasSP'>&nbsp;".$registro['codigo_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['ci_cliente']."</td>
   				<td  class='campotablasSP'>&nbsp;".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['nombre_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['direccion_cliente']." </td>
    			<td  class='campotablasSP'>&nbsp;".$registro['telefono_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['fecha_sus']."</td>
    			<td class='campotablas'><a href=buscar_cliente2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Mas Detalles</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
		echo '<p>&nbsp;</p>
<p align="center"><a href="buscar_cliente.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

		
			
		}
		else
		{	
				header ("Location:buscar_cliente_pedido.php?error=5");
				exit;
		}	
		
	
	}
	
}
   
  
?>  



  
<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
