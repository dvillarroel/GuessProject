<? 

  		$id=$_GET['id'];
		require_once("manejomysql.php");
		conectar_bd();
		$resultado= consulta_bd("SELECT max(codigo_botellon) as p FROM botellones" );
		$a=sacar_registro_bd($resultado);
		$nc=$a['p']+1;
		$tg=$_POST["nombres"];
		
		$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resultado7);
		$fecha=$registro7['date'];		
 
 		$observaciones=$_POST["observaciones"];
 
 		
		$result2= consulta_bd("select numero_botellon FROM botellones WHERE CODIGO_BOTELLON=$id;");
		$ab2=sacar_registro_bd($result2);
		
			$resultado2= consulta_bd("SELECT base_prestados, botellon_prestados FROM equipos_empresa where codigo_ee=1");
			
			$aa2=sacar_registro_bd($resultado2);

			$cc = $aa2['botellon_prestados'];
			$tbo=$cc-$ab2['numero_botellon'];
	
			mysql_query("update equipos_empresa set BOTELLON_PRESTADOS=$tbo where CODIGO_EE=1");
 
 
 
 		mysql_query("update botellones set numero_botellon=$tg, observacion_entrega='$observaciones' where codigo_botellon=$id;");


			$tbo=$tg+$tbo;
	
			mysql_query("update equipos_empresa set BOTELLON_PRESTADOS=$tbo where CODIGO_EE=1");



	//	echo "update botellones set numero_botellones=$tg, observacion_entrega='$observaciones' where codigo_botellon=$id;";
		echo '
		<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
		
		<body background="body2.jpg">
		<BR><p align="center">LA ASIGNACION SE MODIFICO CORRECTAMENTE</p>';
		
	
		echo '<p align="center"><a href="administrar_equipos.php">VOLVER ADMINISTRAR EQUIPOS</a></p>';
		echo '<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';	
		

 
?> 



