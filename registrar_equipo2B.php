<? 

  		$id=$_GET['id'];
		require_once("manejomysql.php");
		conectar_bd();
		$resultado= consulta_bd("SELECT max(codigo_botellon) as p FROM botellones" );
		$a=sacar_registro_bd($resultado);
		$nc=$a['p']+1;
		$tg=$_POST["nombres"];
		$empleado=$_POST['cargo'];
		
		$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resultado7);
		$fecha=$registro7['date'];		
 
 		$observaciones=$_POST["observaciones"];
 
 		mysql_query("insert into botellones values($nc,$id, $tg, '$observaciones', '$empleado','$fecha'  );");
		
		$resultado2= consulta_bd("SELECT botellon_prestados FROM equipos_empresa where codigo_ee=1");
			
			$aa2=sacar_registro_bd($resultado2);

			$cc = $aa2['botellon_prestados'];
			$tbo=$tg+$cc;
	
			mysql_query("update equipos_empresa set BOTELLON_PRESTADOS=$tbo where CODIGO_EE=1");

		

		echo '
		<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
		
		<body background="body2.jpg">
		<BR><p align="center">LA ASIGNACION SE REGISTRO CORRECTAMENTE</p>';
		
	
		echo '<p align="center"><a href="administrar_equipos.php">VOLVER ADMINISTRAR EQUIPOS</a></p>';
		echo '<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';	
		

 
?> 



