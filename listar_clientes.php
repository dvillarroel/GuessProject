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

<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, fecha_sus FROM cliente order by apellido_paterno;" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Lista de clientes<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
						<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" >
							<thead>';

	echo '
  	<tr>
    <td>Codigo Cliente</td>
    <td>C.I.</td>
    <td>Apellidos</td>
    <td>Nombres</td>
    <td>Direccion </td>
    <td>Telefono</td>
    <td>Fecha de Suscripcion</td>
  	</tr></thead><tbody>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['codigo_cliente']."</td>
    			<td class='campotablas'>".$registro['ci_cliente']."</td>
   				<td class='campotablas'>".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td class='campotablas'>".$registro['nombre_cliente']."</td>
    			<td class='campotablas'>".$registro['direccion_cliente']." </td>
    			<td class='campotablas'>".$registro['telefono_cliente']."</td>
    			<td class='campotablas'>".$registro['fecha_sus']."</td>	";
	
			
		echo "</tr>";
	}
	

	
	
}


?>

		</tbody></table>
		<hr class="thin bg-grayLighter">
		<p align="center"><a href="reportes.php">VOLVER ATRAS</a></p>
		</div>
			</div>
		</div>
	</div>
</html>
