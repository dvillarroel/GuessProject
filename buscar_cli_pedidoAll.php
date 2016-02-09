<html>
	<head>
		<meta charset='utf-8'/>
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

<link rel="stylesheet" href="colorbox.css" />
<script src="jquery2.js"></script>
<script src="jquerycolorbox.js"></script>
<style>
			body{font:12px/1.2 Verdana, sans-serif; padding:0 10px;}
			a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}
			h2{font-size:13px; margin:15px 0 0 0;}
</style>

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
	</head>
	<body>

<?php

$id_pedido=$_GET['id_pedido'];
$id_cliente=$_GET['id_cliente'];
require_once("manejomysql.php");
conectar_bd();
		
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
	
					echo "<a class='iframe' href='mas_detalles_producto3.php?cod_producto=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido."' >Mas Detalles</a></td>




					<td class='campotablas'><a href=adicionar_producto.php?menu1=1&buscar=".$valueCod."&id_cliente=".$id_cliente."&id_pedido=".$id_pedido.">Adicionar Producto</a></td>";
					echo "</tr>";
						
					
			}
			echo "</table>";
			
			


		}
		
		echo '<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="buscar_cliente_pedido2.php?menu1=1&buscar='.$id_cliente.'" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>

';
		

   
  
?>  
</body>
</html>
