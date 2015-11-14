<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 

</p>
<p><a href="utilidad_diario.php">1. Utilidad Diario</a></p>
<p><a href="utilidad_mensual.php">2. Utilidad Mensual Mensual</a></p>
<p><a href="mostrar_utilidad.php">3. Utilidad por Periodos de Tiempo</a></p>
<p>&nbsp; </p>
<p align="center"><a href="reportes.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
