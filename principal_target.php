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
</head>
<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Principal <span class="mif-apps place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Cuentas</button>
                    <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Clientes</button>
                    <button class="button warning" onclick="pushMessage('warning')"><span class="mif-loop2"></span> Pedidos</button>
                    <button class="button alert" onclick="pushMessage('alert')">Reportes</button>
                    <hr class="thin bg-grayLighter">

<?php
require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT nombre_producto, nombre_chino, nombre_ingles, stock, stock_minimo, unidad FROM producto where stock < stock_minimo order by nombre_producto;" );

if (mysql_num_rows($usuario_consulta) > 0)
{	

echo '<br><h1 class="text-light">Hay productos que estan debajo del stock minimo: </h1><br>';

					echo '<table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
                        <thead>
                        <tr>
                            <td class="sortable-column sort-asc">Nombre Producto</td>
                            <td class="sortable-column">Stock Actual</td>
                            <td class="sortable-column">Stock Minimo</td>
                        </tr>
                        </thead>
                        <tbody>';


	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		
		
		if($registro['stock'] < $registro['stock_minimo'] || $registro['stock'] == $registro['stock_minimo'])
		{
		              echo "<tr>
                            <td>".$registro['nombre_producto']."</td>
                            <td>".$registro['stock']."</td>
                            <td>".$registro['stock_minimo']."</td>
                           </tr>";
		}
		
	}	
	echo '                    </tbody>
                    </table>';

	
	}

				
?> 
                    
					

                </div>
            </div>
		</div>
	</div>
</body>
</html>

