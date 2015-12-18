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
$codigo_saldo=$_GET['id_saldo'];

require_once("manejomysql.php");
conectar_bd();

$monto_total2 = mysql_query("Select SUM(monto_parcial) as p from detalle_venta where id_venta=$codigo_pedido;");
$mont=sacar_registro_bd($monto_total2);
$total=$mont['p'];
if($total > 0)
{ mysql_query("UPDATE venta SET TOTAL=$total WHERE ID_VENTA=$codigo_pedido");
	if($codigo_pedido > 0)
	{
		mysql_query("UPDATE anticipo SET monto_pedido=$total, estado='Entregado' WHERE cod_saldo=$codigo_saldo");
		
		$resulto= consulta_bd("SELECT max(id_vv) as p FROM ventavendedor" );
		$a=sacar_registro_bd($resulto);
		$nc=$a['p']+1;
		
		$queryuser = mysql_query("SELECT cod_user FROM session");
		$querydatos = sacar_registro_bd($queryuser);
		$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']);
		$querydatosuser = sacar_registro_bd($consultauser);
		$cod_vendedor=$querydatos['cod_user'];
		$name_vendedor=$querydatosuser['nombre'].' '.$querydatosuser['apellidoP'].' '.$querydatosuser['apellidoM'];
		
		$anticipoQuery=mysql_query("select monto_favor from anticipo WHERE cod_saldo=$codigo_saldo");
		
		echo "select monto_favor from anticipo WHERE cod_saldo=$codigo_saldo";
		
		$montopago=0;
		if (mysql_num_rows($anticipoQuery) != 0)
		{ 
			$registroanticipo = sacar_registro_bd($anticipoQuery);
			$montoanticipo=$registroanticipo['monto_favor'];
			$montopago=$total-$registroanticipo['monto_favor'];
			if($montopago >= 0 )
			{
				echo '<div align="center"><font color="blue" size="4" class="titl">El cliente tiene un anticipo que se registrara en el pago del Pedido.</font><br></div>';
  
				$queryfecha=consulta_bd("SELECT CURRENT_DATE as date" );
				$registroFecha= sacar_registro_bd($queryfecha);
				$fechaReg=$registroFecha['date'];
				$pagoid= consulta_bd("SELECT max(id_vv) as p FROM ventavendedor" );
				$pagoA=sacar_registro_bd($pagoid);
				$codPago=$pagoA['p']+1;
				mysql_query("insert into pago_pedido values($codPago,$codigo_pedido, $codigo_cliente, '$fechaReg',$montoanticipo,'No Cancelado', $montopago, $cod_vendedor,'$name_vendedor' );" );
				
			}
			else
			{
				echo '<div align="center"><font color="blue" size="4" class="titl">El cliente tiene un anticipo que se registrara en el pago del Pedido.</font><br></div>';
				$queryfecha=consulta_bd("SELECT CURRENT_DATE as date" );
				$registroFecha= sacar_registro_bd($queryfecha);
				$fechaReg=$registroFecha['date'];
				$pagoid= consulta_bd("SELECT max(id_vv) as p FROM ventavendedor" );
				$pagoA=sacar_registro_bd($pagoid);
				$codPago=$pagoA['p']+1;
				mysql_query("insert into pago_pedido values($codPago,$codigo_pedido, $codigo_cliente, '$fechaReg',$total,'Cancelado', 0, $cod_vendedor,'$name_vendedor');" );

				echo '<div align="center"><font color="blue" size="4" class="titl">Debido a que el anticipo es mayor al monto del pedido, se debe devolver cambio: <font color="red">'.$montopago.'Bs.</font> o registrar un nuevo anticipo por la cantidad especificada </font><br></div>';
				
				echo "<br><br>"; 
				
			}
			
		}
		else
		{
			
			
		}
				
		mysql_query("insert into ventavendedor values($nc, $codigo_pedido,$cod_vendedor,'$name_vendedor',null,null);" );
		
		
		
		
		
		
		
		
		
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
				else
				{
						echo '<br><table>
						<tr> <td><font color="red">El cliente todavia no ha cancelado el pedido por completo, el saldo es:</font> </td>
						<td><font color="red">'.$total.'</font></td>
						</tr>
						<tr> <td><a href=registrar_pago.php?id_pedido='.$codigo_pedido.'&id_cliente='.$codigo_cliente.'>Registrar Pago Pedido</a> </td>
						
						</tr>
						</table>
							';
					
				}
				
				echo '<br><br>
			<div align="center"><font color="#330000" size="4" class="titl">EL PEDIDO FUE REGISTRADO CORRECTAMENTE, Para completar el pedido, proceder a la entrega y realizar el Correspondiente registro.</font><br>
   
  </div>';
				
  
}
else
{
		echo '<br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">EL PEDIDO NO TIENE NINGUN PRODUCTO ADICIONADO, REVISAR PEDIDO</font></td></tr>
    		<tr><td><font color="#003366">';
			
echo "<a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$codigo_cliente.">VOLVER AL PEDIDO</a></p>";
echo'	</font></td></tr>

  		</tr>
	</table>';	
}

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
