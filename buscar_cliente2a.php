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
                    <h1 class="text-light">Productos Encontrados<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">


<?php

if(!empty($_POST['buscar']))
{

	$tipo=$_POST['menu1'];
	$var=$_POST['buscar'];
	require_once("manejomysql.php");
	conectar_bd();
	
	if($tipo == 'Codigo de producto')
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by codigo_producto;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Detalles</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['codigo_producto'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto.php?menu1=1&buscar=".$registro['codigo_producto']." TARGET='_blanc'>Mas Detalles</a></td>";
					echo "</tr>";
						
				}	
					
			}
			echo "</table>";

		}
		
	}

	if($tipo == 'Nombre de Producto')
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by nombre_producto;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Detalles</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['nombre_producto'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto.php?menu1=1&buscar=".$registro['codigo_producto'].">Mas Detalles</a></td>";
					echo "</tr>";
						
				}	
					
			}
			echo "</table>";

		}
		
	}


		if($tipo == 'Marca')
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by marca;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Detalles</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['marca'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto.php?menu1=1&buscar=".$registro['codigo_producto'].">Mas Detalles</a></td>";
					echo "</tr>";
						
				}	
					
			}
			echo "</table>";

		}
		
	}

		if($tipo == 'Industria')
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria from producto order by Industria;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >Detalles</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['industria'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td class='campotablas'><a href=mas_detalles_producto.php?menu1=1&buscar=".$registro['codigo_producto'].">Mas Detalles</a></td>";
					echo "</tr>";
						
				}	
					
			}
			echo "</table>";

		}
		
	}


		if($tipo == 'Observaciones')
	{
		$usuario_consulta = mysql_query("SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria, observaciones_producto from producto order by Industria;");
	
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			echo '
					
			<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
			<form action="registrar_cliente2.php" method="post">

			';

			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" >
  			<tr>
			<td class="campotablasSP2" >Codigo Producto</td>
			<td class="campotablasSP2" >Nombre Producto</td>
			<td class="campotablasSP2" >Precio</td>
			<td class="campotablasSP2" >Stock</td>
			<td class="campotablasSP2" >Marca</td>
			<td class="campotablasSP2" >Industria</td>
			<td class="campotablasSP2" >observaciones producto</td>
			<td class="campotablasSP2" >Detalles</td>
			</tr>';
		
			for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				
				$ap=$registro['observaciones_producto'];
	
				if(stristr($ap, $var) === FALSE)
				{

				}
				else
				{
					
					echo "<tr>";
					echo "
					<td  class='campotablasSP'>&nbsp;".$registro['codigo_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['nombre_producto']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['precio_unitario_prod']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['stock']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['marca']." </td>
					<td  class='campotablasSP'>&nbsp;".$registro['industria']."</td>
					<td  class='campotablasSP'>&nbsp;".$registro['observaciones_producto']."</td>
					<td class='campotablas'><a href=mas_detalles_producto.php?menu1=1&buscar=".$registro['codigo_producto'].">Mas Detalles</a></td>";
					echo "</tr>";
						
				}	
					
			}
			echo "</table>";

		}
		
	}

	
	
	if($tipo == 'Codigo Cliente')
	{
		

		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var;" ) or die(header ("Location:error.php"));

		if (mysql_num_rows($usuario_consulta) != 0)
		{	
				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];
	
		}
		else
		{
		
			header ("Location:buscar_cliente.php?error=2");
			exit;
		
		}
		header ("Location:buscar_cliente2.php?menu1=1&buscar=".$var);
		exit;
		
	}
	if($tipo == 'Nr. Carnet de Identidad')
	{	$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE  ci_cliente=$var;" ) or die(header ("Location:error.php"));
		
		if (mysql_num_rows($usuario_consulta) != 0)
		{	
		
		$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];

	
		}
		
		else
		{
				header ("Location:buscar_cliente.php?error=3");
				exit;
		
		}
		header ("Location:buscar_cliente2.php?menu1=2&buscar=".$var);
		exit;
		
	
	}
	
	if($tipo == 'Codigo de Equipo de agua')
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		
		//echo 'SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo='.$var;
		$usuario_consulta = mysql_query("SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;" ) or die(header ("Location:error.php"));	
			
			if (mysql_num_rows($usuario_consulta) != 0)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				$var2=$registro['codigo_cliente'];
			
				$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var2;" ) or die(header ("Location:error.php"));

				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
				$observaciones=null;
					
					
		
		}
		else
		{	
				header ("Location:buscar_cliente_pedido.php?error=4");
				exit;
		}
	
		header ("Location:buscar_cliente2.php?menu1=3&buscar=".$var);
		exit;

	}	
	
	
	if($tipo == 'Apellido del Cliente')
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by apellido_paterno" );
			
		if (mysql_num_rows($usuario_consulta) != 0)
		{
					echo '
					
					<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet"><p>INFORMACION CLIENTE</p>
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
    <td class="campotablasSP2" >Fecha de Suscripcion</td>
	<td class="campotablasSP2" >Detalles</td>
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
					
		echo "<tr>";
		echo "
				<td  class='campotablasSP'>&nbsp;".$registro['codigo_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['ci_cliente']."</td>
   				<td  class='campotablasSP'>&nbsp;".$registro['apellido_paterno']." " .$registro['apellido_materno']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['nombre_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['direccion_cliente']." </td>
    			<td  class='campotablasSP'>&nbsp;".$registro['telefono_cliente']."</td>
    			<td  class='campotablasSP'>&nbsp;".$registro['fecha_sus']."</td>
    			<td class='campotablas'><a href=buscar_cliente2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Mas Detalles</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
			
		}
		else
		{	
				header ("Location:buscar_cliente_pedido.php?error=5");
				exit;
		}	
		
	
	}
	
}
  
  else
  {
  	header ("Location:buscar_cliente.php?error=1");
	exit;
  }
  
  
?>  
		<hr class="thin bg-grayLighter">
		<p align="center"><a href="buscar_cliente.php">VOLVER ATRAS</a></p>
		</div>
			</div>
		</div>
	</div>
</html>