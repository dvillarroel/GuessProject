<? 

 		$id=$_GET['id'];
		require_once("manejomysql.php");
		conectar_bd();
		$resultado= consulta_bd("SELECT max(cod_equipo) as p FROM equipo" );
		
		$a=sacar_registro_bd($resultado);
		
		$nc=$_POST['codigo_cliente'];
		$te="Equipo Completo de agua";
		$ce="Ninguno";
		$tg=null;
		$pe=null;
		
		$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resultado7);
		$fecha=$registro7['date'];		
 
 		$observaciones=$_POST['observaciones'];
		$propiedad="cliente";
 
 		//echo "insert into equipo values($nc, 1, $id, '$te', '$ce', '$tg', $pe, '$fecha', '$observaciones', '$propiedad'  );";		
 		mysql_query("insert into equipo values($nc, $id, '$te', '$ce', null, null, '$fecha', '$observaciones', '$propiedad'  );") or die(header ("Location:registrar_cliente.php?error_registro=2"));

		echo '
		<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
		
		<body background="body2.jpg"><BR>EL EQUIPO SE REGISTRO CORRECTAMENTE';
		
		echo '<BR>CODIGO CLIENTE :  '.$id;
		
		echo '<BR><font class="titulo_cabecera">INFORMACION EQUIPOS REGISTRADOS</font>';
		
		


  
 // echo "SELECT cod_equipo, tipo_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo FROM equipo where codigo_cliente=".$id.";";
  $usuario_consulta = mysql_query("SELECT cod_equipo, tipo_de_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo, propiedad_equipo FROM equipo where codigo_cliente=".$id.";" ) or die(header ("Location:error.php"));

	
	if (mysql_num_rows($usuario_consulta) != 0)
{
	echo' 
		 <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="title"> 
    <td class="title">Codigo Equipo</td>
    <td class="title">Tipo de Equipo </td>
    <td class="title">Condicion de Entrega</td>
    <td class="title">Tipo de Garantia</td>
    <td class="title">Fecha de Registro</td>
  </tr>';
  for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		
		if($registro['propiedad_equipo']=='empresa')
		{	
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['cod_equipo']."</td>
    			<td class='campotablas'>".$registro['tipo_de_equipo']."</td>
    			<td class='campotablas'>".$registro['condicion_entrega']."</td>
   				<td class='campotablas'>".$registro['tipo_garantia']."</td>
        			<td class='campotablas'>".$registro['fecha_registro_equipo']."</td>";
//    			<td><a href=modificar_cliente.php?id=".$registro['codigo_cliente']."></font> <font color='#FFCC99'>Modificar </a></td>	";
	
			
		echo "</tr>";
		}
	}
	echo'</table>';
 	} 
  
  
    $usuario_consulta = mysql_query("SELECT cod_equipo, tipo_de_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo, propiedad_equipo FROM equipo where codigo_cliente=".$id.";" ) or die(header ("Location:error.php"));

	
	if (mysql_num_rows($usuario_consulta) != 0)
{
	
	$aux=0;
  for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		
		if($registro['propiedad_equipo']!='empresa')
		{	
			if($aux == 0)
			{
				echo' <br>
			 <table width="100%" border="0" cellpadding="0" cellspacing="0">
  				<tr class="title"> 
    <td class="title">Codigo Equipo</td>
    <td class="title">Tipo de Equipo </td>
    <td class="title">Propiedad</td>
	<td class="title">Observaciones</td>
    
  </tr>';
  			$aux=3;
			}
			
		
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['cod_equipo']."</td>
    			<td class='campotablas'>".$registro['tipo_de_equipo']."</td>
    			<td class='campotablas'> Equipo es de Propiedad del Cliente</td>
   				<td class='campotablas'>".$registro['observaciones_equipo']."</td>";
//    			<td><a href=modificar_cliente.php?id=".$registro['codigo_cliente']."></font> <font color='#FFCC99'>Modificar </a></td>	";
	
			
		echo "</tr>";
		}
	}
	echo'</table>';
 	} 


echo '<br><a href=registrar_equipo.php?id='.$id.'>(+)  Registrar Asignacion de Equipo al Cliente </a>';

echo '<br><a href=registrar_equipo_cliente.php?id='.$id.'>(+)  Registrar Equipo Propio del Cliente</a> <br><p>&nbsp;</p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>';	
		

 
?> 



