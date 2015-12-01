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
            min-height: 50%;
            height: 50%;
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

    <div class="app-bar fixed-top darcula" data-role="appbar">
        <a class="app-bar-element branding">SISTEMA DE ADMINISTRACION</a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li><a href="principal_target.php" target="mainFrame">Principal</a></li>
            <li>
                <a href="" class="dropdown-toggle">Ayuda</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">Sistema de Administracion</a></li>
                    <li class="divider"></li>
                    <li><a href="">About</a></li>
                </ul>
            </li>
        </ul>
<?php
require_once("manejomysql.php");
conectar_bd();

$queryuser = mysql_query("SELECT cod_user FROM session") or die("no se realizo");
$querydatos = sacar_registro_bd($queryuser);
$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']) or die("no se realizo");
$querydatosuser = sacar_registro_bd($consultauser);

?>
        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-users icon"></span> <?php echo $querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM']; ?></span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
              <ul class="unstyled-list fg-dark">
                    <li><a href="" class="fg-white3 fg-hover-yellow">Salir</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>