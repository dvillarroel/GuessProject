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
                    <h1 class="text-light">Modificar o Cancelar Anticipo (Vigentes)<span class="mif-users place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
<?php

require_once("manejomysql.php");
conectar_bd();

$usuario_consulta = mysql_query("select cod_saldo, codigo_cliente, monto_favor, fecha_registro, estado from anticipo where estado = 'vigente'" );

if (mysql_num_rows($usuario_consulta) != 0)
{	

echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">


<script language="JavaScript" type="text/JavaScript">
function uno(src,color_entrada) {
		//src.bgColor=color_entrada;src.style.cursor="hand";
}
function dos(src,color_default) {
		//src.bgColor=color_default;src.style.cursor="default";
}
</script>
<br>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr >
    <td class="title" width="10%">Codigo Saldo</td>
    <td class="title" width="10%">Cliente</td>
    <td class="title" width="15%">Monto</td>
    <td class="title" width="15%">Estado</td>
    <td class="title" width="15%">Ver Detalles</td>
	<td class="title" width="10%">Modificar Anticipo</td>
    <td class="title" width="15%">Eliminar Anticipo</td>
	 
  	</tr>';
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		$usuario_consulta2 = mysql_query("select nombre_cliente, apellido_paterno, apellido_materno from cliente where codigo_cliente=".$registro['codigo_cliente']);
		//echo "select estado from usuario where cod_usuario=".$registro['cod_usuario'];
		$registro2= sacar_registro_bd($usuario_consulta2);
				
		echo '<tr onmouseover="'; echo "uno(this,'#000000');";  
        echo'" onmouseout="'; echo "dos(this,'#000060');";echo'">'; 
		echo "
				<td class='campotablas'>".$registro['cod_saldo']."</td>
    			<td class='campotablas'>".$registro2['nombre_cliente']." " .$registro2['apellido_paterno']." " .$registro2['apellido_materno']."</td>
    			<td class='campotablas'>".$registro['monto_favor']."</td>
   				<td class='campotablas'>".$registro['estado']."</td>
    			<td class='campotablas'><a href=ver_anticipo.php?id=".$registro['cod_saldo']."&cliente=".$registro['codigo_cliente']." >Ver Detalle</a></td>
    			<td class='campotablas'><a href=modificar_anticipo2.php?menu1=".$registro['cod_saldo']."&buscar=".$registro['codigo_cliente']." >Modificar</a></td>
    			<td class='campotablas'><a href=eliminar_anticipo.php?menu1=".$registro['cod_saldo']."&buscar=".$registro['codigo_cliente']."  >Eliminar</a></td>";
	
			
		echo "</tr>";
	}
	
	echo '
	</table> <p>&nbsp;</p>';
	
	
	
}
else
{
		echo '<h3 class="text-light">No existen anticipos registrados</h3>';
                   
}


?>
		<hr class="thin bg-grayLighter">
		<p align="center"><a href="administrar_pedidos.php">VOLVER ATRAS</a></p>


				</div>
			</div>
		</div>
	</div>
</body>
