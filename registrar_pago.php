<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="jquery-ui.css" rel="stylesheet">
	<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='docs/favicon.ico' />
    <link href="docs/css/metro.css" rel="stylesheet">
    <link href="docs/css/metro-icons.css" rel="stylesheet">
    <link href="docs/css/metro-responsive.css" rel="stylesheet">

    <script src="docs/js/jquery-2.1.3.min.js"></script>
    <script src="docs/js/jquery.dataTables.min.js"></script>

    <script src="docs/js/metro.js"></script>

    <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>

    <script>
        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
    </script>
	<style>
	body{
		font: 62.5% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	select {
		width: 200px;
	}
	</style>


</head>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Registrar Pago de Pedido<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
<?php

	$var=$_GET['id_cliente'];
	$cod_pedido=$_GET['id_pedido'];

	require_once("manejomysql.php");
	conectar_bd();

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
		
	echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">';


							$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
						$registro7= sacar_registro_bd($resultado7);
						$fecha=$registro7['date'];
	
							echo '
						<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
						<tr> 
					<td colspan="4" class="title">Registrar Pago</td>
				  </tr>
				  <tr> 
					<td class="campotablas">Monto a Pagar (Bs):</td>
					<td class="campotablas"><input type="text" name="monto" maxlength="15" tabindex="1" class="Formulario" value="0" autofocus></td>
					<td class="campotablas">Fecha que se realizo la solicitud:</td>
					<td class="campotablas"><input type="text" name="correo_electronico" id="correo_electronico" maxlength="20" tabindex="2" class="Formulario" value="'.$fecha.'" readonly />
					</td>
				</table><br>';
				
	$queryPagos = mysql_query("SELECT id, fechapago, monto_pago, saldo, vendedor from pago_pedido where id_venta=$cod_pedido;" );	
	//echo "SELECT id, fecha_pago, monto_pago, saldo, vendedor from pago_pedido where id_venta=$cod_pedido;" ;
		//echo "SELECT id_venta, fecha_venta, total, estado_venta FROM venta WHERE id_venta=$cod_pedido;";
		if (mysql_num_rows($queryPagos) != 0)
		{
			  echo '<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
					<tr> 
					<td class="title">Codigo Pago</td>
					<td class="title">Monto Pagado</td>
					<td class="title">Fecha que se realizo Pago</td>
					<td class="title">Saldo</td>
					<td class="title">Vendedor que registro el Pago</td>';
				for ( $i=0; $i< cuantos_registros_bd($queryPagos); $i++)
				{
					$datos=sacar_registro_bd($queryPagos);
					
					echo "<td class='campotablas'>".$datos['id']."</td>
		    			<td class='campotablas'>".$datos['monto_pago']."</td>
						<td class='campotablas'>".$datos['fechapago']."</td>
						<td class='campotablas'>".$datos['saldo']."</td>
						<td class='campotablas'>".$datos['vendedor']."</td>";
					
				}
				echo '</table><br>';
			
			
		}
		else
		{
			echo '<table width="60%" border="0" align="center" cellpding="0" cellspacing="0">
						<tr> 
							<td><font color="red">hay registro de ningun pago realizado</font></td>
						</tr>
				  	</table><br>';
			
		}
	
		
		$a=sacar_registro_bd($usuario_consulta);
		$codigo_pedido=$a["id_venta"];
		$fecha_pedido=$a["fecha_venta"];
		$monto_total=$a["total"];
		$estado_pedido=$a["estado_venta"];
	
	$usuario_consulta = mysql_query("SELECT id_venta, fecha_venta, total, estado_venta FROM venta WHERE id_venta=$cod_pedido;" );	
		//echo "SELECT id_venta, fecha_venta, total, estado_venta FROM venta WHERE id_venta=$cod_pedido;";
		
		$a=sacar_registro_bd($usuario_consulta);
		$codigo_pedido=$a["id_venta"];
		$fecha_pedido=$a["fecha_venta"];
		$monto_total=$a["total"];
		$estado_pedido=$a["estado_venta"];
		
		echo '
		<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">INFORMACION PEDIDO</td>
  </tr>
  <tr> 
    <td class="campotablas">Codigo Pedido:</td>
    <td class="campotablas">'.$codigo_pedido.'</td>
    <td class="campotablas">Fecha de Pedido:</td>
	<form action="modificar_fechaPedido.php" method="post" name="ventas">
	<td class="campotablas">'.$fecha_pedido.'</td></form>  </tr>
  <tr> 
    <td class="campotablas"><font color="red">Monto Total:</font></td>
    <td class="campotablas"><font color="red">'.$monto_total.'</font></td>
    <td class="campotablas">Estado Pedido</td>
	<td class="campotablas">'.$estado_pedido.'</td>
  </tr>
</table> <br>';





echo'




<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
              <td width="25%" class="campotablas">'.$codigo_cliente.'</td>
              <td width="25%" class="campotablas">Nro. Carnet de Identidad:</td>
              <td width="25%" class="campotablas">'.$ci.'</td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
              <td class="campotablas">'.$ap.'</td>
              <td class="campotablas">Apellido Materno:</td>
              <td class="campotablas">'.$am.'</td>
          </tr>
		  
		  <tr> 
              <td height="27"class="campotablas"> Nombres:</td>
              <td class="campotablas">'.$nombres.'</td>
              <td class="campotablas">Direccion:</td>
              <td class="campotablas">'.$direccion.'</td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
              <td class="campotablas">'.$telefono.'</td>
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
          </tr>
		  
		
		  
          
         
		  
        </table>

    


<br>';


	//echo "SELECT codigo_detalle, cod_usuario, codigo_producto, id_venta, codigo_cliente, cantidad, precio_unitario, monto_parcial FROM detalle_venta WHERE id_venta=".$codigo_pedido;
	$usuario_consulta = mysql_query("SELECT codigo_detalle, cod_usuario, codigo_producto, id_venta, codigo_cliente, cantidad, precio_unitario, monto_parcial FROM detalle_venta WHERE id_venta=".$codigo_pedido);	
			
		if (mysql_num_rows($usuario_consulta) != 0)
		{	
		
					echo '<br>
				<table width="100%" border="0" align="center" cellpding="0" cellspacing="0">
  				<tr> 
    			<td colspan="11" class="title"><div align="center">DETALLE DE PEDIDO</div></td>
  				</tr>
  				<tr > 
			    <td class="title">Codigo Producto</td>
			    <td class="title">Nombre Producto</td>
				<td class="title">Marca</td>
				<td class="title">Industria</td>
				<td class="title">Observaciones</td>
			    <td class="title">Cantidad </td>
			    <td class="title">Precio Unitario</td>
			    <td class="title">Precio Cliente</td>
			    <td class="title">Total</td>
			    <td class="title">Stock Restante</td>
			    <td class="title">Imagen</td>
				</tr>';
  			
		  		for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
						//$registro= sacar_registro_bd($usuario_consulta);
				
						echo '<tr>'; 
						$a=sacar_registro_bd($usuario_consulta);
						$codigo_producto=$a['codigo_producto'];
						$codigo_dp=$a['codigo_detalle'];
						$cantid=$a['cantidad'];
						$monto=$a['monto_parcial'];
						$precio_unitario=$a['precio_unitario'];
						//$cod_equipo=$a['cod_equipo'];
						$usuario_consulta2 = mysql_query("SELECT nombre_producto, stock, precio_unitario_prod, marca, industria, imagen1, observaciones_producto FROM producto WHERE codigo_producto='$codigo_producto';" );	
						$a=sacar_registro_bd($usuario_consulta2);
						$nombre_producto=$a['nombre_producto'];
						$imagen="Img_prod/".$a['imagen1'];
						//echo $imagen;
			
						echo "
						<td class='campotablas'>".$codigo_producto."</td>
		    			<td class='campotablas'>".$nombre_producto."</td>
						<td class='campotablas'>".$a['marca']."</td>
						<td class='campotablas'>".$a['industria']."</td>
						<td class='campotablas'>".$a['observaciones_producto']."</td>
		    			<td class='campotablas'>".$cantid."</td>
						<td class='campotablas'>".$a['precio_unitario_prod']."</td>
						<td class='campotablas'>".$precio_unitario."</td>
						<td class='campotablas'>".$monto."</td>
						<td class='campotablas'>".$a['stock']."</td>
						<td class='campotablas'><img src='".$imagen."' style='width:100px;height:100px;'></td>";
						echo '</tr>';	
					
				}
  				

				
  
  				echo '
				</table>';
				
				//recover vendedor
					$usuario_consultaV = mysql_query("SELECT nombrevendedor FROM ventavendedor WHERE id_venta=$cod_pedido;" );	
					$aV=sacar_registro_bd($usuario_consultaV);
					$nombre_vendedor=$aV['nombrevendedor'];
				
				echo '<br><table>
		<tr> <td>Vendedor:</td>
		<td>'.$nombre_vendedor.'</td>
		
		</tr>
		</table>
		';
				
		}
			echo '<br><table width="40%" border="0" align="center" >
    <tr></form>
      <td align="center"></td>
       <td align="center">
	    <form action="registrar_entregaPedido.php?id_pedido='.$codigo_pedido.'" method="post"><td align="center">            <div class="form-actions"><button type="submit" class="button primary">Registrar entrega</button></div> 
		</td> </form>
         <td align="center">
	    <form action="administrar_pedidos.php" method="post"><td align="center"><button type="submit" class="button primary">Cancelar</button> 
		</td> </form>
    </tr>
  </table>';
	
	
		echo '<br><table width="60%" border="0" align="center" >
    <tr></form>
       <td align="center"><p align="center"><a href="administrar_pedidos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p> </td> </form>
    </tr>
  </table>
  
 
  ';
 
 
  
?>  

				</div>
			</div>
		</div>
	</div>
	</body>
</html>
