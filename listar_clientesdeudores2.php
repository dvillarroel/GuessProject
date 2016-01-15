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
                    <h1 class="text-light">Lista de clientes que no cancelaron la totalidad de su pedido realizado :<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
						<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" >
							<thead>
							<tr>
								<td class="sortable-column sort-asc" style="width: 100px">Cliente</td>
								<td class="sortable-column">Telefono</td>
								<td class="sortable-column">Direccion</td>
								<td class="sortable-column">Cantidad a Pagar</td>
								<td class="sortable-column">Cantidad de Pedidos</td>
								<td class="sortable-column">Ver pedidos</td>
											
								
							</tr>
							</thead>
							<tbody>

<?php


	require_once("manejomysql.php");
	conectar_bd();


		
		$usuario_consulta = mysql_query("SELECT codigo_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, observaciones_cliente FROM cliente");
		
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
				{
					echo '<tr>'; 
					$a=sacar_registro_bd($usuario_consulta);
					
					$codigo_cliente=$a['codigo_cliente'];
					$nombre_cliente=$a['nombre_cliente']." ".$a['apellido_paterno'];
					$telefono_cliente=$a['telefono_cliente'];
					$direccion_cliente=$a['direccion_cliente'];
					
					
					$usuario_consulta2 = mysql_query("SELECT sum(monto_saldo) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado';" );	
					$a2=sacar_registro_bd($usuario_consulta2);
					$saldo=$a2['p'];
					$usuario_consulta3 = mysql_query("SELECT count(id_venta) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado'" );	
					$a3=sacar_registro_bd($usuario_consulta3);
					$countPedidos=$a3['p'];
					
					if ($saldo != '')
					{
						if($saldo > 0)
						{
							echo "
								<td class='campotablas'><font color='blue'>".$nombre_cliente."</font></td>
								<td class='campotablas'>".$telefono_cliente."</td>
								<td class='campotablas'>".$direccion_cliente."</td>
								<td class='campotablas'><font color='red'>".$saldo."</font></td>
								<td class='campotablas'><font color='red'>".$countPedidos."</font></td>
								<td class='campotablas'><a href=ver_pedidosSaldo.php?id_cliente=".$codigo_cliente.">Ver pedidos</a></td>";
					
											
								
							echo '</tr>';
						}
					}
				}
			
		}
		else
		{
			echo '<tr><td >No hay registro de usuarios que tienen saldo de pedidos realizados</td></tr>';
		}
		
	
	  
  
?>  
		</tbody></table>
		<hr class="thin bg-grayLighter">
		<p align="center"><a href="listar_ingresos.php">VOLVER ATRAS</a></p>
		</div>
			</div>
		</div>
	</div>
</html>