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

<body >
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Lista de Pedidos por Entregar:<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
						<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" >
							<thead>
							<tr>
								<td class="sortable-column sort-asc" style="width: 100px">Codigo Pedido</td>
								<td class="sortable-column">Cliente</td>
								<td class="sortable-column">Total</td>
								<td class="sortable-column">Fecha Pedido </td>
								<td class="sortable-column">Estado </td>
								<td class="sortable-column">Detalle</td>
								<td class="sortable-column">Pedido Registrado Por</td>
								<td class="sortable-column">Estado Pago</td>
								<td class="sortable-column">Monto Saldo</td>
								<td class="sortable-column">Registrar Entrega</td>
								
							</tr>
							</thead>
							<tbody>

<?php


	require_once("manejomysql.php");
	conectar_bd();

		$today = date('Y-m-d');					  
		//echo "SELECT id_venta, codigo_cliente,  fecha_venta, total, estado_venta FROM venta WHERE estado_venta='No Ejecuto' and total > 0";
		$usuario_consulta = mysql_query("SELECT id_venta, codigo_cliente,  fecha_venta, total, estado_venta, estado_pagado, monto_saldo FROM venta WHERE estado_venta='No Ejecuto' and total > 0");
		
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
					echo '<tr>'; 
					$a=sacar_registro_bd($usuario_consulta);
					
					$cod_pedido=$a['id_venta'];
					$codigo_cliente=$a['codigo_cliente'];
					$monto=$a['total'];
					$fecha=$a['fecha_venta'];
					$estado=$a['estado_venta'];
					
					$usuario_consulta2 = mysql_query("SELECT nombre_cliente, apellido_paterno, direccion_cliente, observaciones_cliente FROM cliente WHERE codigo_cliente=$codigo_cliente;" );	
					$a2=sacar_registro_bd($usuario_consulta2);
					$nombre_cliente=$a2['nombre_cliente']." ".$a2['apellido_paterno'];
					$direccion=$a2['direccion_cliente'];
					$observaciones=$a2['observaciones_cliente'];
					
					//recover vendedor
					$usuario_consultaV = mysql_query("SELECT nombrevendedor FROM ventavendedor WHERE id_venta=$cod_pedido;" );	
					$aV=sacar_registro_bd($usuario_consultaV);
					$nombre_vendedor=$aV['nombrevendedor'];
					$estado_pagado=$a['estado_pagado'];
					$monto_saldo=$a['monto_saldo'];
							
							
					echo "
						<td class='campotablas'>".$cod_pedido."</td>
		    			<td class='campotablas'>".$nombre_cliente."</td>
						<td class='campotablas'>".$monto."</td>
						<td class='campotablas'>".$fecha."</td>
						<td class='campotablas'>".$estado."</td>
		    			<td class='campotablas'><a href=ver_pedido3.php?id_pedido=".$cod_pedido."&id_cliente=".$codigo_cliente.">Ver Detalle Pedido </a></td>
						<td class='campotablas'>".$nombre_vendedor."</td>";
						
						if ($estado_pagado == 'Cancelado')
						{
							echo "<td class='campotablas'><font color='green'>".$estado_pagado."</font></td>
								<td class='campotablas'><font color='green'>".$monto_saldo."</font></td>";

						}
						else
						{
							echo "<td class='campotablas'><font color='red'>".$estado_pagado."</font></td>
							<td class='campotablas'><font color='red'>".$monto_saldo."</font></td>";
						}

						echo "<td class='campotablas'><a href=ver_pedido5.php?id_pedido=".$cod_pedido."&id_cliente=".$codigo_cliente.">Registrar Entrega</a></td>
						";
									
						
					echo '</tr>';
				}
			
		}
		else
		{
			echo '<tr><td >No hay registro de pedidos para realizar entrega</td></tr>';
		}
		
	
	  
  
?>  
		</tbody></table>
		<hr class="thin bg-grayLighter">
		<p align="center"><a href="administrar_pedidos.php">VOLVER ATRAS</a></p>
		</div>
			</div>
		</div>
	</div>
</html>