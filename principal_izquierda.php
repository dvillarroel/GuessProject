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
            $('.sidebar2').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar2 li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
    </script>
</head>
<?php 
require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("select cod_user from session" );
$registro= sacar_registro_bd($usuario_consulta);

?>
<body class="bg-steel">
 
    <div class="page-content2">
            <div class="row" style="height: 100%">
                <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
                    <ul class="sidebar2">
						<?php 
                        
						if($registro['cod_user'] == 1)
						{
							echo '
						<li><a href="administrar_cuentas.php" target="mainFrame">
                            <span class="mif-users icon"></span>
                            <span class="title">Cuentas</span>
                        </a></li>
						<li><a href="administrar_clientes.php" target="mainFrame">
                            <span class="mif-user-check icon"></span>
                            <span class="title">Clientes</span>
                        </a></li>
                        <li class="active"><a href="administrar_productos.php" target="mainFrame">
                            <span class="mif-apps icon"></span>
                            <span class="title">Productos</span>
                        </a></li>
						<li><a href="administrar_pedidos.php" target="mainFrame">
                            <span class="mif-calculator icon"></span>
                            <span class="title">Pedidos</span>
							</a></li>	
                        <li><a href="buscar_cliente.php" target="mainFrame">
                            <span class="mif-search icon"></span>
                            <span class="title">Buscar</span>
                        </a></li>
                        <li><a href="reportes.php" target="mainFrame">
                            <span class="mif-libreoffice icon"></span>
                            <span class="title">Reportes</span>
                        </a></li>
                        <li><a href="salir.php" target="_parent">
                            <span class="mif-apps icon"></span>
                            <span class="title">Salir</span>
                        </a></li>';
							
						}
						else
						{
							echo '
							<li><a href="administrar_pedidos.php" target="mainFrame">
                            <span class="mif-calculator icon"></span>
                            <span class="title">Pedidos</span>
							</a></li>
							<li><a href="buscar_cliente.php" target="mainFrame">
                            <span class="mif-search icon"></span>
                            <span class="title">Buscar</span>
							</a></li>
							<li><a href="salir.php" target="_parent">
                            <span class="mif-apps icon"></span>
                            <span class="title">Salir</span>
							</a></li>
							';
						}
						?>
                    </ul>
                </div>
        </div>
    </div>
</body>
</html>