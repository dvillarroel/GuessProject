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
                    <h1 class="text-light">Ingresos correspondientes al Periodo Seleccionado: <?php echo $_POST['select']; ?><span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">

					
<?php


	$periodo=$_POST['select'];

	require_once("manejomysql.php");
	conectar_bd();
	
	if($periodo == 'Del Dia')
	{
		$today = date('Y-m-d');					  
		
		$usuario_consulta = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE fechaPago='$today'");
		$a=sacar_registro_bd($usuario_consulta);
		$totalIngresos=0;
		if($a['p']== '')
		{
			$totalIngresos=0;
		}
		else
		{
			$totalIngresos=$a['p'];
			
		}
		
		$totalPedidosPeriodo=0;
		$totalPedidosSaldo=0;
		
		$usuario_consulta2 = mysql_query("select id_venta from venta where fecha_venta='$today'");
		$numeroPedidos=cuantos_registros_bd($usuario_consulta2);
		if (mysql_num_rows($usuario_consulta2) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta2); $i++)
			{
				$a2=sacar_registro_bd($usuario_consulta2);
				$id_venta=$a2['id_venta'];
				$usuario_consulta3 = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta3) != 0)
				{
					$a3=sacar_registro_bd($usuario_consulta3);
					$totalPedidosPeriodo=$totalPedidosPeriodo + $a3['p'];

				}
				$usuario_consulta4 = mysql_query("SELECT min(saldo) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta4) != 0)
				{
					$a4=sacar_registro_bd($usuario_consulta4);
					$totalPedidosSaldo=$totalPedidosSaldo + $a4['p'];
				}

				
			}
			
		}
		$totalPedidosanteriores=$totalIngresos - $totalPedidosPeriodo;
		
		
		
	}
	
	if($periodo == 'De la Semana')
	{
		$d = strtotime("today");
		$start_week = strtotime("last sunday midnight",$d);
		$end_week = strtotime("next saturday",$d);
		$start = date("Y-m-d",$start_week); 
		$end = date("Y-m-d",$end_week); 
		echo "Periodo seleccionado entre: ".$start;
		echo " al: ".$end;
		$usuario_consulta = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE fechaPago >='$start' and fechaPago<='$end'");
		$a=sacar_registro_bd($usuario_consulta);
		$totalIngresos=0;
		if($a['p']== '')
		{
			$totalIngresos=0;
		}
		else
		{
			$totalIngresos=$a['p'];
			
		}
		
		$totalPedidosPeriodo=0;
		$totalPedidosSaldo=0;
		
		$usuario_consulta2 = mysql_query("select id_venta from venta where fecha_venta>='$start' and fecha_venta<='$end'");
		$numeroPedidos=cuantos_registros_bd($usuario_consulta2);
		if (mysql_num_rows($usuario_consulta2) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta2); $i++)
			{
				$a2=sacar_registro_bd($usuario_consulta2);
				$id_venta=$a2['id_venta'];
				$usuario_consulta3 = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta3) != 0)
				{
					$a3=sacar_registro_bd($usuario_consulta3);
					$totalPedidosPeriodo=$totalPedidosPeriodo + $a3['p'];

				}
				$usuario_consulta4 = mysql_query("SELECT min(saldo) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta4) != 0)
				{
					$a4=sacar_registro_bd($usuario_consulta4);
					$totalPedidosSaldo=$totalPedidosSaldo + $a4['p'];
				}

				
			}
			
		}
		$totalPedidosanteriores=$totalIngresos - $totalPedidosPeriodo;
			
		
		
	}
	
	if($periodo == 'Del mes actual')
	{
		$d = strtotime("today");
		$start_week = strtotime("first day of this month",$d);
		$end_week = strtotime("last day of this month",$d);
		$start = date("Y-m-d",$start_week); 
		$end = date("Y-m-d",$end_week); 
		echo "Periodo seleccionado entre: ".$start;
		echo " al: ".$end;
						
		$usuario_consulta = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE fechaPago >='$start' and fechaPago<='$end'");
		$a=sacar_registro_bd($usuario_consulta);
		$totalIngresos=0;
		if($a['p']== '')
		{
			$totalIngresos=0;
		}
		else
		{
			$totalIngresos=$a['p'];
			
		}
		
		$totalPedidosPeriodo=0;
		$totalPedidosSaldo=0;
		
		$usuario_consulta2 = mysql_query("select id_venta from venta where fecha_venta>='$start' and fecha_venta<='$end'");
		$numeroPedidos=cuantos_registros_bd($usuario_consulta2);
		if (mysql_num_rows($usuario_consulta2) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta2); $i++)
			{
				$a2=sacar_registro_bd($usuario_consulta2);
				$id_venta=$a2['id_venta'];
				$usuario_consulta3 = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta3) != 0)
				{
					$a3=sacar_registro_bd($usuario_consulta3);
					$totalPedidosPeriodo=$totalPedidosPeriodo + $a3['p'];

				}
				$usuario_consulta4 = mysql_query("SELECT min(saldo) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta4) != 0)
				{
					$a4=sacar_registro_bd($usuario_consulta4);
					$totalPedidosSaldo=$totalPedidosSaldo + $a4['p'];
				}

				
			}
			
		}
		$totalPedidosanteriores=$totalIngresos - $totalPedidosPeriodo;
	}
	
	if($periodo == 'Del mes anterior')
	{
		$d = strtotime("today");
		$start_week = strtotime("first day of previous month",$d);
		$end_week = strtotime("last day of previous month",$d);
		$start = date("Y-m-d",$start_week); 
		$end = date("Y-m-d",$end_week); 
		echo "Periodo seleccionado entre: ".$start;
		echo " al: ".$end;
						
		$usuario_consulta = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE fechaPago >='$start' and fechaPago<='$end'");
		$a=sacar_registro_bd($usuario_consulta);
		$totalIngresos=0;
		if($a['p']== '')
		{
			$totalIngresos=0;
		}
		else
		{
			$totalIngresos=$a['p'];
			
		}
		
		$totalPedidosPeriodo=0;
		$totalPedidosSaldo=0;
		
		$usuario_consulta2 = mysql_query("select id_venta from venta where fecha_venta>='$start' and fecha_venta<='$end'");
		$numeroPedidos=cuantos_registros_bd($usuario_consulta2);
		if (mysql_num_rows($usuario_consulta2) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta2); $i++)
			{
				$a2=sacar_registro_bd($usuario_consulta2);
				$id_venta=$a2['id_venta'];
				$usuario_consulta3 = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta3) != 0)
				{
					$a3=sacar_registro_bd($usuario_consulta3);
					$totalPedidosPeriodo=$totalPedidosPeriodo + $a3['p'];

				}
				$usuario_consulta4 = mysql_query("SELECT min(saldo) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta4) != 0)
				{
					$a4=sacar_registro_bd($usuario_consulta4);
					$totalPedidosSaldo=$totalPedidosSaldo + $a4['p'];
				}

				
			}
			
		}
		$totalPedidosanteriores=$totalIngresos - $totalPedidosPeriodo;
	}

	if($periodo == 'Seleccionar Periodo de Tiempo')
	{
		$start=$_POST['fecha_inicio'];
		$end=$_POST['fecha_fin'];
		echo "Periodo seleccionado entre: ".$start;
		echo " al: ".$end;
						
		//echo "SELECT id_venta, codigo_cliente,  fecha_venta, total, estado_venta, fecha_entrega FROM venta WHERE estado_venta='Ejecutado' and fecha_entrega>='$start' and fecha_entrega<='$end'";
		$usuario_consulta = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE fechaPago >='$start' and fechaPago<='$end'");
		$a=sacar_registro_bd($usuario_consulta);
		$totalIngresos=0;
		if($a['p']== '')
		{
			$totalIngresos=0;
		}
		else
		{
			$totalIngresos=$a['p'];
			
		}
		
		$totalPedidosPeriodo=0;
		$totalPedidosSaldo=0;
		
		$usuario_consulta2 = mysql_query("select id_venta from venta where fecha_venta>='$start' and fecha_venta<='$end'");
		$numeroPedidos=cuantos_registros_bd($usuario_consulta2);
		if (mysql_num_rows($usuario_consulta2) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta2); $i++)
			{
				$a2=sacar_registro_bd($usuario_consulta2);
				$id_venta=$a2['id_venta'];
				$usuario_consulta3 = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta3) != 0)
				{
					$a3=sacar_registro_bd($usuario_consulta3);
					$totalPedidosPeriodo=$totalPedidosPeriodo + $a3['p'];

				}
				$usuario_consulta4 = mysql_query("SELECT min(saldo) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta4) != 0)
				{
					$a4=sacar_registro_bd($usuario_consulta4);
					$totalPedidosSaldo=$totalPedidosSaldo + $a4['p'];
				}

				
			}
			
		}
		$totalPedidosanteriores=$totalIngresos - $totalPedidosPeriodo;
	}
	
	if($periodo == 'Todos los Pedidos')
	{
				
		//echo "SELECT id_venta, codigo_cliente,  fecha_venta, total, estado_venta FROM venta WHERE estado_venta='Ejecutado'";
		$usuario_consulta = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido");
		$a=sacar_registro_bd($usuario_consulta);
		$totalIngresos=0;
		if($a['p']== '')
		{
			$totalIngresos=0;
		}
		else
		{
			$totalIngresos=$a['p'];
			
		}
		
		$totalPedidosPeriodo=0;
		$totalPedidosSaldo=0;
		
		$usuario_consulta2 = mysql_query("select id_venta from venta");
		$numeroPedidos=cuantos_registros_bd($usuario_consulta2);
		if (mysql_num_rows($usuario_consulta2) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta2); $i++)
			{
				$a2=sacar_registro_bd($usuario_consulta2);
				$id_venta=$a2['id_venta'];
				$usuario_consulta3 = mysql_query("SELECT sum(monto_pago) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta3) != 0)
				{
					$a3=sacar_registro_bd($usuario_consulta3);
					$totalPedidosPeriodo=$totalPedidosPeriodo + $a3['p'];

				}
				$usuario_consulta4 = mysql_query("SELECT min(saldo) as p FROM pago_pedido WHERE id_venta=$id_venta");
				if (mysql_num_rows($usuario_consulta4) != 0)
				{
					$a4=sacar_registro_bd($usuario_consulta4);
					$totalPedidosSaldo=$totalPedidosSaldo + $a4['p'];
				}

				
			}
			
		}
		$totalPedidosanteriores=$totalIngresos - $totalPedidosPeriodo;
	}
	  
  
?>  

					
					<table table width="50%" border="1" align="center" cellpding="0" cellspacing="0">
						<tr> 
							<td colspan="2" class="title">INFORMACI&Oacute;N INGRESOS</td>
						</tr>
						<tr> 
							<td class='campotablas'>Total Ingresos:</td>
							<td class='campotablas'><font color="blue"><?php echo $totalIngresos; ?> Bs.</font></td>
						</tr>
						<tr> 
							<td class='campotablas'>Numero de Pedidos Registrados en el periodo seleccionado:</td>
							<td class='campotablas'><?php echo $numeroPedidos; ?></td>
						</tr>
						
						<tr> 
							<td class='campotablas'>Ingresos por pago de Pedidos Registrados en el periodo seleccionado:</td>
							<td class='campotablas'><font color="green"><?php echo $totalPedidosPeriodo; ?> Bs.</font></td>
						</tr>
					
						<tr> 
							<td class='campotablas'>Saldo por Cobrar de Pedidos Registrados en el periodo seleccionado:</td>
							<td class='campotablas'><font color="red"><?php echo $totalPedidosSaldo; ?> Bs.</font></td>
						</tr>
					
						<tr> 
							<td class='campotablas'>Ingresos por Pago de pedidos registrados anteriormente:</td>
							<td class='campotablas'><font color="green"><?php echo $totalPedidosanteriores; ?> Bs.</font></td>
						</tr>
					</table>

		<hr class="thin bg-grayLighter">
		<p align="center"><a href="listar_ingresos.php">VOLVER ATRAS</a></p>
		</div>
			</div>
		</div>
	</div>
</html>