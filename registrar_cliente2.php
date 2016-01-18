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
                    <h1 class="text-light">Registro Cliente<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">

<?php

if(!empty($_POST['codigo_cliente']))
{

	require_once("manejomysql.php");
	conectar_bd();
	$codigo_cliente=$_POST['codigo_cliente'];
	$Nombre=$_POST['ci'];
	$apellidos=$_POST['apellido_paterno'];
	$apellidom=$_POST['apellido_materno'];
	$ci=$_POST['nombres'];
	$direccion=$_POST['direccion'];
	$correo_elec=$_POST['telefono'];
	$fecha_registro=$_POST['correo_electronico'];
	$Zona=$_POST['1'];
	$telefono=$_POST['direccion2'];
	$observaciones=$_POST['observaciones'];
	$tipo_cliente=$_POST['12'];
	//$estado='activo';
	
	$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	
	
	$consultaVerificacion = "select codigo_cliente from cliente where ci_cliente=$ci";
	echo $consultaVerificacion;
	$result = mysql_query($consultaVerificacion);
	
	if (mysql_num_rows($result) == 0)
	{
	
	$consulta="insert into cliente values($codigo_cliente, $ci, '$Nombre','$apellidos','$apellidom', '$direccion','$telefono','$correo_elec', '$fecha_registro', 'Activo', '$observaciones', 0, '$tipo_cliente');";
	mysql_query($consulta);

	echo '<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

	<body background="body2.jpg">';

	echo'
EL CLIENTE SE REGISTRO CORRECTAMENTE, ESTA HABILITADO PARA REALIZAR PEDIDOS.

<br><br>';

echo "<a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$codigo_cliente.">Realizar Pedido</a>";
echo '<br>
';
	echo $zona;
	$consultaquery = "";

	}
	else
	{
		echo "Ya existe un cliente con ese registro";
		
	}
}

else
{
	header ("Location:registrar_cliente.php?error_registro=1");
	exit;

}


?>



				</div>
  			</div>
		</div>
	</div>
</html>