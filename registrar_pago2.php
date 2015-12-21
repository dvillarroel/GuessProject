<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='docs/favicon.ico' />
    <link href="docs/css/metro.css" rel="stylesheet">
    <link href="docs/css/metro-icons.css" rel="stylesheet">
    <link href="docs/css/metro-responsive.css" rel="stylesheet">
	<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

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
</head>
<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Registro de Pedidos</h1>
                    <hr class="thin bg-grayLighter">

<?php
$codigo_pedido=$_GET['id_pedido'];
$codigo_cliente=$_GET['id_cliente'];
$monto=$_POST['monto'];
$fecha=$_POST['correo_electronico'];

require_once("manejomysql.php");
conectar_bd();
	
		$queryuser = mysql_query("SELECT cod_user FROM session");
		$querydatos = sacar_registro_bd($queryuser);
		$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']);
		$querydatosuser = sacar_registro_bd($consultauser);
		$cod_vendedor=$querydatos['cod_user'];
		$name_vendedor=$querydatosuser['nombre'].' '.$querydatosuser['apellidoP'].' '.$querydatosuser['apellidoM'];
		
		//echo '<div align="center"><font color="blue" size="4" class="titl">El cliente tiene un anticipo que se registrara en el pago del Pedido.</font><br></div>';
	
		//echo "SELECT monto_saldo, monto_pagado, estado_pagado FROM venta where id_venta=$codigo_pedido";
		$pedido= consulta_bd("SELECT monto_saldo, monto_pagado, estado_pagado FROM venta where id_venta=$codigo_pedido" );
		
		
		$infoPedido=sacar_registro_bd($pedido);
		$montoSaldoPedido=$infoPedido['monto_saldo'];
		//echo "monto saldo =".$montoSaldoPedido;
		$montoPagadoPedido=$infoPedido['monto_pagado'];
		//echo "monto pagado=".$montoPagadoPedido;
		
  
  
				$fechaReg=$_POST['correo_electronico'];
				//echo "SELECT max(id) as p FROM pago_pedido";
				$pagoid= consulta_bd("SELECT max(id) as p FROM pago_pedido" );
				$pagoA=sacar_registro_bd($pagoid);
				$codPago=$pagoA['p']+1;
				
				$estadoPago = 'No Cancelado';
				if($monto == $montoSaldoPedido)
				{
					$estadoPago = 'Cancelado';
				}
				
				$saldoPago = $montoSaldoPedido - $monto;
				//echo "saldo despues de restar pago".$saldoPago;
				
				//echo "insert into pago_pedido values($codPago,$codigo_pedido, $codigo_cliente, '$fechaReg',$monto,'$estadoPago', $saldoPago, $cod_vendedor,'$name_vendedor' );";
				mysql_query("insert into pago_pedido values($codPago,$codigo_pedido, $codigo_cliente, '$fechaReg',$monto,'$estadoPago', $saldoPago, $cod_vendedor,'$name_vendedor' );" );
				
				
				$montoPagado=$montoPagadoPedido + $monto;
				
				if($saldoPago == 0)
				{
					//echo "UPDATE venta SET estado_pagado='Cancelado', monto_pagado=$montoPagado, monto_saldo=$saldoPago WHERE ID_VENTA=$codigo_pedido";
					mysql_query("UPDATE venta SET estado_pagado='Cancelado', monto_pagado=$montoPagado, monto_saldo=$saldoPago WHERE ID_VENTA=$codigo_pedido");
					
					
					echo '<div align="center"><font color="blue" size="4" class="titl">El Cliente ha cancelado la totalidad del Pedido.</font><br></div>';
					
					
				}
				else
				{
					//echo "UPDATE venta SET estado_pagado='No Cancelado', monto_pagado=$montoanticipo, monto_saldo=$montopago WHERE ID_VENTA=$codigo_pedido";
					//echo "UPDATE venta SET estado_pagado='No Cancelado', monto_pagado=$montoPagado, monto_saldo=$montoPagado WHERE ID_VENTA=$codigo_pedido";
					mysql_query("UPDATE venta SET estado_pagado='No Cancelado', monto_pagado=$montoPagado, monto_saldo=$saldoPago WHERE ID_VENTA=$codigo_pedido");
					
					echo '<br><table>
						<tr> <td><font color="red">El cliente todavia no ha cancelado el pedido por completo, el saldo es:</font> </td>
						<td><font color="red">'.$saldoPago.'</font></td>
						</tr>
						<tr> <td><a href=registrar_pago.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'>Registrar Pago Pedido</a> </td>
						
						</tr>
						</table>
							';
					
					
				}
				
	
				$querypagos = mysql_query("SELECT saldo FROM pago_pedido where id_venta=$codigo_pedido");
  				if (mysql_num_rows($querypagos) != 0)
				{	
					$queryPagos2 = mysql_query("SELECT id, fechapago, monto_pago, saldo, vendedor from pago_pedido where id_venta=$codigo_pedido;" );	
					//echo "SELECT id, fechapago, monto_pago, saldo, vendedor from pago_pedido where id_venta=$codigo_pedido;";

					if (mysql_num_rows($queryPagos2) != 0)
					{
						  echo '<table width="70%" border="1" align="center" cellpding="0" cellspacing="0">
								<tr> 
								<td class="title">Codigo Pago</td>
								<td class="title">Monto Pagado</td>
								<td class="title">Fecha que se realizo Pago</td>
								<td class="title">Saldo</td>
								<td class="title">Vendedor que registro el Pago</td><tr>';
							for ( $i=0; $i< cuantos_registros_bd($queryPagos2); $i++)
							{
								$datos=sacar_registro_bd($queryPagos2);
								
								echo "<tr><td class='campotablas'>".$datos['id']."</td>
									<td class='campotablas'>".$datos['monto_pago']."</td>
									<td class='campotablas'>".$datos['fechapago']."</td>
									<td class='campotablas'>".$datos['saldo']."</td>
									<td class='campotablas'>".$datos['vendedor']."</td><tr>";
								
							}
							echo '</table><br>';
						
						
					}
				}

				
				echo '<br><br>
			<div align="center"><font color="#330000" size="4" class="titl">EL PAGO FUE REGISTRADO CORRECTAMENTE.</font><br>
   
  </div>';
				

?>
                    <hr class="thin bg-grayLighter">
					<div>
						<p align="center"><a href="Administrar_pedidos.php">Volver Administrar Pedidos</a></p>
					</div>
				</div>
            </div>
		</div>
	</div>
</body>
</html>
