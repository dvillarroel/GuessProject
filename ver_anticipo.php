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
 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>
 <SCRIPT language="javascript">

</SCRIPT>

<script language="JavaScript" src="calendar1.js"></script>
<script language="javascript"> 
 function window_open()
  {
	var newWindow;
	var urlstring = 'calendar.html'
	newWindow = window.open(urlstring,'','height=200,width=280,toolbar=no,minimize=no,status=no,memubar=no,location=no,scrollbars=no')
  }
 </script>


<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Informacion Anticipo</h1>
                    <hr class="thin bg-grayLighter">



<?php

	$tipo=$_GET['id'];
	$var=$_GET['cliente'];
	require_once("manejomysql.php");
	conectar_bd();
	
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente, descuento, tipo_cliente FROM cliente WHERE codigo_cliente=$var;" ) or die(heer ("Location:error.php"));

				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$zona=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
				$observaciones_cliente=$registro['observaciones_cliente'];
				$tipo_cliente=$registro['tipo_cliente'];
	
				$observaciones=null;
				//$observaciones=$registro['observaciones'];
	

echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
<html>
<body>



<table width="80%" align="center" cellpding="0" cellspacing="0">
<tbody>
<tr>
      
<td>

<table width="100%"  border="0" align="center" cellpding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="6"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="16%" class="campotablas">Codigo Cliente:</td>
              <td width="16%" class="campotablas">'.$codigo_cliente.'</td>
              <td width="16%" class="campotablas">CI o NIT:</td>
              <td width="16%" class="campotablas">'.$ci.'</td>
			  <td width="16%" class="campotablas">Apellidos:</td>
              <td width="16%" class="campotablas">'.$ap.'</td>
          </tr>
          <tr> 

              <td class="campotablas">Nombres:</td>
              <td class="campotablas">'.$nombres.'</td>
              <td class="campotablas"> Tipo_Cliente:</td>
              <td class="campotablas">'.$tipo_cliente.'</td>
              <td class="campotablas">Direccion:</td>
              <td class="campotablas">'.$direccion.'</td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
              <td class="campotablas">'.$telefono.'</td>
              <td class="campotablas">Observaciones</td>
              <td class="campotablas">&nbsp;'.$observaciones_cliente.'</td>
			  <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
          </tr>
  
         
		  
        </table>



</td>
      
</tr></tbody>
</table>
<BR>
<br>
';
	//echo "SELECT cod_pedido, fecha, monto_total, esto_pedido FROM pedido WHERE codigo_cliente=$codigo_cliente and esto_pedido='no Ejecuto';";
	
	$usuario_consulta = mysql_query("SELECT cod_saldo, codigo_cliente, monto_favor, fecha_registro, monto_pedido, fecha_entrega, estado, observaciones FROM anticipo WHERE codigo_cliente=$codigo_cliente and cod_saldo=$tipo;" );
	//echo "SELECT id_venta, fecha_venta, total, total_descuento, estado_venta FROM venta WHERE codigo_cliente=$codigo_cliente and estado_venta='No Ejecuto' and total=0;";	
	
	if (mysql_num_rows($usuario_consulta) != 0)
	{
		$a=sacar_registro_bd($usuario_consulta);
		$codigo_saldo=$a["cod_saldo"];
		$codigo_cliente=$a["codigo_cliente"];
		$monto_favor=$a["monto_favor"];
		$fecha_registro=$a["fecha_registro"];
		$monto_pedido=$a["monto_pedido"];
		$fecha_entrega=$a["fecha_entrega"];
		$estado=$a["estado"];
		$observaciones=$a["observaciones"];
		
		echo '
		<table width="70%" border="0" align="center" cellpding="0" cellspacing="0">
		<tr> 
    <td colspan="4" class="title">INFORMACION ANTICIPO</td>
  </tr>
  <tr> 
    <td class="campotablas">Monto registrado para pedido:</td>
    <td class="campotablas">'.$monto_favor.'</td>
    <td class="campotablas">Fecha que se realizo la solicitud:</td>
	<td class="campotablas">'.$fecha_registro.'</td>
  <tr> 
    <td class="campotablas">Estado Solicitud:</td>
    <td class="campotablas">'.$estado.'</td>
    <td class="campotablas">Observaciones</td>
	<td class="campotablas">'.$observaciones.'</td>
  </tr>
</table> <BR>';

				$queryuser = mysql_query("SELECT cod_user, nombre_vendedor FROM anticipouser where id_anticipo=$codigo_saldo") or die("no se realizo");
		$querydatos = sacar_registro_bd($queryuser);
//echo $querydatosuser['nombre']." ".$querydatosuser['apellidoP']." ".$querydatosuser['apellidoM'];

		echo '<br><table>
		<tr> <td>Vendedor que realizo el registro del Anticipo:</td>
		<td>'.$querydatos['nombre_vendedor'].'</td>
		
		</tr>
		</table><br>
		';

		
		
		
	}
	
	
	?>
		<hr class="thin bg-grayLighter">
		<p align="center"><a href="modificar_anticipo.php">VOLVER ATRAS</a></p>

				</div>
			</div>
		</div>
	</div>
</body>
