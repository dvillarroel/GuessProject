<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 

<p>
</p>
<p><a href="ingreso_diario.php">1. Ingreso Diario</a></p>
<p><a href="ingreso_mensual.php">2. Ingreso Mensual</a></p>
<p><a href="mostrar_ganancias_pedidos.php">3. Ingresos por Periodos de Tiempo</a><br>
</p>
<p align="center"><a href="reportes.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

<script language="JavaScript">
			var cal1 = new calendar1(document.forms['ventas'].elements['correo_electronico']);
			cal1.year_scroll = true;
			cal1.time_comp = false;
			var cal2 = new calendar1(document.forms['ventas'].elements['correo_electronico2']);
			cal2.year_scroll = true;
			cal2.time_comp = false;
			
			
		//-->
		</script>