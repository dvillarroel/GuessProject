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
                    <h1 class="text-light">Registro de Pedidos</h1>
                    <hr class="thin bg-grayLighter">

<?php
$codigo_pedido=$_GET['id_pedido'];
$codigo_cliente=$_GET['id_cliente'];
$codigo_saldo=$_GET['id_saldo'];

require_once("manejomysql.php");
conectar_bd();

$monto_total2 = mysql_query("Select SUM(monto_parcial) as p from detalle_venta where id_venta=$codigo_pedido;");
$mont=sacar_registro_bd($monto_total2);
$total=$mont['p'];
if($total > 0)
{ mysql_query("UPDATE venta SET TOTAL=$total WHERE ID_VENTA=$codigo_pedido");
	if($codigo_pedido > 0)
	{
		mysql_query("UPDATE anticipo SET monto_pedido=$total, estado='Entregado' WHERE cod_saldo=$codigo_saldo");
		
		$resulto= consulta_bd("SELECT max(id_vv) as p FROM ventavendedor" );
		$a=sacar_registro_bd($resulto);
		$nc=$a['p']+1;
		
		$queryuser = mysql_query("SELECT cod_user FROM session");
		$querydatos = sacar_registro_bd($queryuser);
		$consultauser = mysql_query("SELECT nombre, apellidoP, apellidoM FROM persona where cod_usuario=".$querydatos['cod_user']);
		$querydatosuser = sacar_registro_bd($consultauser);
		$cod_vendedor=$querydatos['cod_user'];
		$name_vendedor=$querydatosuser['nombre'].' '.$querydatosuser['apellidoP'].' '.$querydatosuser['apellidoM'];
		
		mysql_query("insert into ventavendedor values($nc, $codigo_pedido,$cod_vendedor,'$name_vendedor',null,null);" );
		
		
		
	}
echo '
			<div align="center"><font color="#330000" size="4" class="titl">EL PEDIDO FUE REGISTRADO CORRECTAMENTE, Para completar el pedido, proceder a la entrega y realizar el Correspondiente registro.</font><br>
   
  </div>';	
}
else
{
		echo '<br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">EL PEDIDO NO TIENE NINGUN PRODUCTO ADICIONADO, REVISAR PEDIDO</font></td></tr>
    		<tr><td><font color="#003366">';
			
echo "<a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$codigo_cliente.">VOLVER AL PEDIDO</a></p>";
echo'	</font></td></tr>

  		</tr>
	</table>';	
}

?>
                    <hr class="thin bg-grayLighter">
					<div>
						<p align="center"><a href="Administrar_pedidos.php">Volver Administrar Pedidos</a></p>
					</div>
				</div>
            </div>
		</div>
	</div>
</body>
</html>
