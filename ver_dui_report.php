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

<body>
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">DUIs Registrados:<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">


<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("SELECT id, duinumber, fecha
FROM dui
WHERE id
IN (
SELECT id
FROM dui
GROUP BY duinumber
HAVING count( duinumber ) >1
)
ORDER BY duinumber" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<br>
';

	echo '
							<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" >
							<thead>

  	<tr>
    <td class="title" width="10%">DUI</td>
    <td class="title" width="10%">Fecha</td>
    <td class="title" width="10%">Cantidad de Productos</td>
    <td class="title" width="10%">Cantidad Total DUI</td>
    <td class="title" width="20%">Ver Detalle</td>
 
   	</tr>							</thead><tbody>
';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		$dui=$registro['duinumber'];

		$usuario_consulta2 = mysql_query("SELECT sum(precio) as p
FROM dui where duinumber='$dui'" );
		$registroPrecio= sacar_registro_bd($usuario_consulta2);
		$total_precio=$registroPrecio['p'];

		$usuario_consulta3 = mysql_query("SELECT count(cod_producto) as p2
FROM dui where duinumber='$dui'" );

		$registrocantida= sacar_registro_bd($usuario_consulta3);
		$totalCantidad=$registrocantida['p2'];
		
				echo '<tr>'; 
		echo "
				<td class='campotablas'><font color='blue'>".$dui."</font></td>
    			<td class='campotablas'>".$registro['fecha']."</td>
				<td class='campotablas'>".$totalCantidad." Productos</td>
				<td class='campotablas'><font color='green'>".$total_precio." Bs.</font></td>
    			<td class='campotablas'><a href=ver_dui2.php?id=".$dui.">Ver detalles</a></td>	";
	
			
		echo "</tr>";
	}
	
	echo '
	<tbody>	</table>
 <p>&nbsp;</p>
';
	
	
	
}
else
{
	echo "No Existen productos Registrados";
}


?>
<script language="JavaScript" type="text/JavaScript">
function uno(src,color_entrada) {
		//src.bgColor=color_entrada;src.style.cursor="hand";
}
function dos(src,color_default) {
		//src.bgColor=color_default;src.style.cursor="default";
}
</script>



<p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

		</div>
			</div>
		</div>
	</div>
</html>