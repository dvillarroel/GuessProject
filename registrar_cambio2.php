<? 

  		$id=$_GET['id'];
		require_once("manejomysql.php");
		conectar_bd();
		$resultado= consulta_bd("SELECT max(codigo_cbotellon) as p FROM cambiobotellon" );
		$a=sacar_registro_bd($resultado);
		$nc=$a['p']+1;
		$tg=$_POST["nombres"];
		$empleado=$_POST['cargo'];
		
		$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resultado7);
		$fecha=$registro7['date'];		
 
 		$observaciones=$_POST["observaciones"];
 
 		mysql_query("insert into cambiobotellon values($nc,$id, '$tg', '$observaciones', '$empleado','$fecha'  );");

		if($tg == "Botellon de Agua")
		{
			$resultado2= consulta_bd("SELECT botellones_danados FROM equipos_empresa where codigo_ee=1");
			
			$aa2=sacar_registro_bd($resultado2);

			$cc = $aa2['botellones_danados'];
			$tbo=$cc+1;
	
			mysql_query("update equipos_empresa set botellones_danados=$tbo where CODIGO_EE=1");		
		
		
		}
		
		if($tg == "Base de equipo de agua")
		{
			$resultado2= consulta_bd("SELECT base_danados FROM equipos_empresa where codigo_ee=1");
			
			$aa2=sacar_registro_bd($resultado2);

			$cc = $aa2['base_danados'];
			$tbo=$cc+1;
	
			mysql_query("update equipos_empresa set base_danados=$tbo where CODIGO_EE=1");		
		
		
		}
		
		if($tg == "Equipo Completo de Agua")
		{
			$resultado2= consulta_bd("SELECT base_danados, botellones_danados FROM equipos_empresa where codigo_ee=1");
			
			$aa2=sacar_registro_bd($resultado2);

			$cc = $aa2['base_danados'];
			$tbo=$cc+1;
			
			$cc2 = $aa2['botellones_danados'];
			$tbo2=$cc2+1;
	
			mysql_query("update equipos_empresa set base_danados=$tbo, botellones_danados=$tbo2 where CODIGO_EE=1");		
		
		
		}		
		
		
		
		
		
		


		echo '
		<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
		
		<body background="body2.jpg">
		<BR><p align="center">EL CAMBIO DE EQUIPO SE REGISTRO CORRECTAMENTE</p>';
		
	
		echo '<p align="center"><a href="administrar_equipos.php">VOLVER ADMINISTRAR EQUIPOS</a></p>';
		echo '<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';	
		

 
?> 



