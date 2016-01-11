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
                    <h1 class="text-light">Clientes Encontrados<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">


<?php

if(!empty($_POST['buscar']))
{

	$tipo=$_POST['menu1'];
	$var=$_POST['buscar'];
	require_once("manejomysql.php");
	conectar_bd();
	$flagresult=0;
	
	if($tipo == 'Nombre del cliente')
	{
		

		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by nombre_cliente" ) or die(header ("Location:error.php"));
		
//		echo "SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var;";

					echo '
					
					<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
				<form action="registrar_cliente2.php" method="post">
				<table width="80%" align="center" cellpadding="0" cellspacing="0">
 			 <tbody>
			 <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  	<tr>
    <td class="campotablasSP2" >Codigo Cliente</td>
    <td class="campotablasSP2" >C.I.</td>
    <td class="campotablasSP2" >Apellidos</td>
    <td class="campotablasSP2" >Nombres</td>
    <td class="campotablasSP2" >Direccion </td>
    <td class="campotablasSP2" >Telefono</td>
    <td class="campotablasSP2" >Deuda Cliente</td>
	<td class="campotablasSP2" >Ver Pedidos Saldo</td>
	<td class="campotablasSP2" >Pedidos adeudados</td>
	<td class="campotablasSP2" >Continuar con Pedido</td>
  	</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['nombre_cliente'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					$codigo_cliente=$registro['codigo_cliente'];
					$usuario_consulta2 = mysql_query("SELECT sum(monto_saldo) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado';" );	
					$a2=sacar_registro_bd($usuario_consulta2);
					$saldo=$a2['p'];
					if($saldo == '')
					{
						$saldo=0;
					}
					
					$usuario_consulta3 = mysql_query("SELECT count(id_venta) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado'" );	
					$a3=sacar_registro_bd($usuario_consulta3);
					$countPedidos=$a3['p'];
					
		echo "<tr>";
		echo "
				<td  class='campotablasSP'>&nbsp;".$registro['codigo_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['ci_cliente']."</td>
   				<td  class='campotablasSP'>&nbsp;".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['nombre_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['direccion_cliente']." </td>
    			<td  class='campotablasSP'>&nbsp;".$registro['telefono_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;<font color='red'>".$saldo." Bs.</font></td>";
				if($saldo > 0)
				{
					echo "				<td class='campotablas'><a href=ver_pedidossaldo2.php?id_cliente=".$registro['codigo_cliente']." target='_blank'>Ver Pedidos saldo</a></td>";
				}
				else
				{
					echo "<td class='campotablas'>Cliente no tiene deudas</td>";
				}
			
				echo "<td  class='campotablasSP'>&nbsp;".$countPedidos."</td>
    			<td class='campotablas'><a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Realizar Pedido</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
		echo '<p>&nbsp;</p>';

		
	
		}
		else
		{
			$flagresult++;
				//header ("Location:buscar_cliente_pedido.php?error=2");
			//exit;
		
		}
	
	
	if($tipo == 'CI o NIT')
	{	$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by ci_cliente" ) or die(header ("Location:error.php"));

					echo '
					
					<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
				<form action="registrar_cliente2.php" method="post">
				<table width="80%" align="center" cellpadding="0" cellspacing="0">
 			 <tbody>
			 <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  	<tr>
    <td class="campotablasSP2" >Codigo Cliente</td>
    <td class="campotablasSP2" >C.I.</td>
    <td class="campotablasSP2" >Apellidos</td>
    <td class="campotablasSP2" >Nombres</td>
    <td class="campotablasSP2" >Direccion </td>
    <td class="campotablasSP2" >Telefono</td>
    <td class="campotablasSP2" >Deuda Cliente</td>
	<td class="campotablasSP2" >Ver Pedidos Saldo</td>
	<td class="campotablasSP2" >Pedidos adeudados</td>
	<td class="campotablasSP2" >Continuar con Pedido</td>
  	</tr>';		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['ci_cliente'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
										$codigo_cliente=$registro['codigo_cliente'];
					$usuario_consulta2 = mysql_query("SELECT sum(monto_saldo) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado';" );	
					$a2=sacar_registro_bd($usuario_consulta2);
					$saldo=$a2['p'];
					if($saldo == '')
					{
						$saldo=0;
					}
					
					$usuario_consulta3 = mysql_query("SELECT count(id_venta) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado'" );	
					$a3=sacar_registro_bd($usuario_consulta3);
					$countPedidos=$a3['p'];
					
		echo "<tr>";
	echo "
				<td  class='campotablasSP'>&nbsp;".$registro['codigo_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['ci_cliente']."</td>
   				<td  class='campotablasSP'>&nbsp;".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['nombre_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['direccion_cliente']." </td>
    			<td  class='campotablasSP'>&nbsp;".$registro['telefono_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;<font color='red'>".$saldo." Bs.</font></td>";
				if($saldo > 0)
				{
					echo "				<td class='campotablas'><a href=ver_pedidossaldo2.php?id_cliente=".$registro['codigo_cliente']." target='_blank'>Ver Pedidos saldo</a></td>";
				}
				else
				{
					echo "<td class='campotablas'>Cliente no tiene deudas</td>";
				}
			
				echo "<td  class='campotablasSP'>&nbsp;".$countPedidos."</td>
    			<td class='campotablas'><a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Realizar Pedido</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
		echo '<p>&nbsp;</p>
';

		
	
		}
		else
		{
			$flagresult++;
		
			//header ("Location:buscar_cliente_pedido.php?error=2");
			//exit;
		
		}
	
	
		
	if($tipo == 'Apellido del Cliente')
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by apellido_paterno" );
			//echo "SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by apellido_paterno";
			
		if (mysql_num_rows($usuario_consulta) != 0)
		{
					echo '
					
					<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
					<form action="registrar_cliente2.php" method="post">
				<table width="80%" align="center" cellpadding="0" cellspacing="0">
 			 <tbody>
			 <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>
';

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  	<tr>
    <td class="campotablasSP2" >Codigo Cliente</td>
    <td class="campotablasSP2" >C.I.</td>
    <td class="campotablasSP2" >Apellidos</td>
    <td class="campotablasSP2" >Nombres</td>
    <td class="campotablasSP2" >Direccion </td>
    <td class="campotablasSP2" >Telefono</td>
    <td class="campotablasSP2" >Deuda Cliente</td>
	<td class="campotablasSP2" >Ver Pedidos Saldo</td>
	<td class="campotablasSP2" >Pedidos adeudados</td>
	<td class="campotablasSP2" >Continuar con Pedido</td>
  	</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['apellido_paterno'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					$codigo_cliente=$registro['codigo_cliente'];
					$usuario_consulta2 = mysql_query("SELECT sum(monto_saldo) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado';" );	
					$a2=sacar_registro_bd($usuario_consulta2);
					$saldo=$a2['p'];
					if($saldo == '')
					{
						$saldo=0;
					}
					
					$usuario_consulta3 = mysql_query("SELECT count(id_venta) as p FROM venta WHERE codigo_cliente=$codigo_cliente and estado_pagado='No Cancelado'" );	
					$a3=sacar_registro_bd($usuario_consulta3);
					$countPedidos=$a3['p'];
		echo "<tr>";
		echo "
				<td  class='campotablasSP'>&nbsp;".$registro['codigo_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['ci_cliente']."</td>
   				<td  class='campotablasSP'>&nbsp;".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['nombre_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['direccion_cliente']." </td>
    			<td  class='campotablasSP'>&nbsp;".$registro['telefono_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;<font color='red'>".$saldo." Bs.</font></td>";
				if($saldo > 0)
				{
					echo "				<td class='campotablas'><a href=ver_pedidossaldo2.php?id_cliente=".$registro['codigo_cliente']." target='_blank'>Ver Pedidos saldo</a></td>";
				}
				else
				{
					echo "<td class='campotablas'>Cliente no tiene deudas</td>";
				}
			
				echo "<td  class='campotablasSP'>&nbsp;".$countPedidos."</td>
    			<td class='campotablas'><a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Realizar Pedido</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
		echo '<p>&nbsp;</p>
';

		
			
		}
		else
		{	
				if($flagresult ==2)
				{
					echo "NO SE ENCONTRO NINGUN RESULTADO";
					}
		}	
		
	
	}
	
}
  
  else
  {
  	header ("Location:buscar_cliente_pedido.php?error=1");
	exit;
  }
  
  
?>  
  

		<hr class="thin bg-grayLighter">
		<p align="center"><a href="buscar_cliente_pedido.php">VOLVER ATRAS</a></p>
		</div>
			</div>
		</div>
	</div>
</html>