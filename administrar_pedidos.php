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
                    <h1 class="text-light">Administrar Pedidos<span class="mif-calculator place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<li><a href="buscar_cliente_pedido.php" target="mainFrame">
                            <span class="mif-apps icon"></span>
                            <span class="title">Realizar Pedido</span>
                        </a></li><br>
						<li><a href="registrar_anticipo_pedido.php" target="mainFrame">
                            <span class="mif-apps icon"></span>
                            <span class="title">Registrar Anticipo de Pedido</span>
                        </a></li><br>
						<li><a href="listar_pedidos_entregados.php" target="mainFrame">
                            <span class="mif-apps icon"></span>
                            <span class="title">Listar Pedidos Entregados</span>
                        </a></li>
                    <hr class="thin bg-grayLighter">
				</div>
            </div>
		</div>
	</div>
</body>
</html>
