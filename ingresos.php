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
<p><a href="ingresos2.php">1. Ingresos</a></p>
<p><a href="egresos.php">2. Egresos</a></p>
<p><a href="utilidad.php">3. Utilidad</a><br>
<p><a href="administrar_emp.php">4. Administrar Empleados</a><br>
</p>
<p align="center"><a href="reportes.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

