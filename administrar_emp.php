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
<p><a href="registrar_emp.php">1. Registrar Empleado</a></p>
<p><a href="listar_empleados.php">2. Modificar Datos Empleados</a></p>
<p><a href="listar_empleados_adelanto.php">3. Registrar Adelanto sueldo</a><br></p>
<p><a href="listar_empleados_adelanto2.php">4. Registrar otros descuentos</a><br></p>
<p><a href="listar_empleados_planilla.php">5. Ver Resumen Planilla del presente mes</a><br></p>
<p><a href="planillas_registradas.php">6. Ver planillas Registradas</a><br></p>
<p><a href="registrar_cargo.php">7. Registrar Cargo de Empleados</a><br></p>
<p><a href="listar_cargos.php">8. Modificar Cargo de Empleados</a><br></p>



<p align="center"><a href="ingresos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>

