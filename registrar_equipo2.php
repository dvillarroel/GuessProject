<? 

if( ($_POST["menu"] !="Seleccionar")  &&  ($_POST["select"] != "Seleccionar") )
 {
  		$id=$_GET['id'];
		require_once("manejomysql.php");
		conectar_bd();
		$resultado= consulta_bd("SELECT max(cod_equipo) as p FROM equipo" );
		$a=sacar_registro_bd($resultado);
		$nc=$_POST["codigo_cliente"];
		$te=$_POST["menu"];
		$ce=$_POST["select"];
		$tg=$_POST["nombres"];
		$pe=$_POST["direccion"];
		
		$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
		$registro7= sacar_registro_bd($resultado7);
		$fecha=$registro7['date'];		
 
 		$observaciones=$_POST["observaciones"];
		$propiedad="empresa";
 
 		mysql_query("insert into equipo values($nc,$id, '$te', '$ce', '$tg', $pe, '$fecha', '$observaciones', '$propiedad'  );") or die(header ("Location:registrar_cliente.php?error_registro=2"));

	//		consulta_bd("update equipos_empresa set TOTAL_BASE=$tb, TOTAL_BOTELLON=$tbo, OBSERVACION_REGISTRO='$obser' where CODIGO_EE=1");
			$resultado2= consulta_bd("SELECT base_prestados, botellon_prestados FROM equipos_empresa where codigo_ee=1");
			
			$aa2=sacar_registro_bd($resultado2);


			$ss = $aa2['base_prestados'];
			$cc = $aa2['botellon_prestados'];
			$tb=1+$ss;
			$tbo=1+$cc;
	
			mysql_query("update equipos_empresa set BASE_PRESTADOS=$tb, BOTELLON_PRESTADOS=$tbo where CODIGO_EE=1");



		echo '
		<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
		
		<body background="body2.jpg">
		<BR>EL EQUIPO SE REGISTRO CORRECTAMENTE';
		
		echo '<BR><font > CODIGO CLIENTE :</font>  '.$id;
		
		echo '<BR><font class="titulo_cabecera">INFORMACION EQUIPOS REGISTRADOS <font>';
		
		


  
 // echo "SELECT cod_equipo, tipo_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo FROM equipo where codigo_cliente=".$id.";";
  $usuario_consulta = mysql_query("SELECT cod_equipo, tipo_de_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo, propiedad_equipo FROM equipo where codigo_cliente=".$id.";" ) or die(header ("Location:error.php"));

	
	if (mysql_num_rows($usuario_consulta) != 0)
{
	echo' 
		 <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="title">Codigo Equipo</td>
    <td class="title">Tipo de Equipo </td>
    <td class="title">Condicion de Entrega</td>
    <td class="title">Tipo de Garantia</td>
    <td class="title">Observaciones</td>
  </tr>';
  for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		
		if($registro['propiedad_equipo']=='empresa')
		{	
		echo "<tr>";
		echo "
				<td class='campotablas'>&nbsp;".$registro['cod_equipo']."</td>
    			<td class='campotablas'>&nbsp;".$registro['tipo_de_equipo']."</td>
    			<td class='campotablas'>&nbsp;".$registro['condicion_entrega']."</td>
   				<td class='campotablas'>&nbsp;".$registro['tipo_garantia']."</td>
        			<td class='campotablas'>&nbsp;".$registro['observaciones_equipo']."</td>";
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
			 <table width="100%" border="0" cellpadding="0" cellspacing="0" >
  				<tr> 
    <td class="title">Codigo Equipo</td>
    <td class="title">Tipo de Equipo </td>
    <td class="title">Propiedad</td>
	<td class="title">Observaciones</td>
    
  </tr>';
  			$aux=3;
			}
			
		
		echo "<tr>";
		echo "
				<td class='campotablas'> &nbsp;".$registro['cod_equipo']."</td>
    			<td class='campotablas'>&nbsp;".$registro['tipo_de_equipo']."</td>
    			<td class='campotablas'> Equipo es de Propiedad del Cliente</td>
				<td class='campotablas'>&nbsp;".$registro['observaciones_equipo']."</td>";
   
//    			<td><a href=modificar_cliente.php?id=".$registro['codigo_cliente']."></font> <font color='#FFCC99'>Modificar </a></td>	";
	
			
		echo "</tr>";
		}
	}
	echo'</table>';
 	} 


echo '<br><a href=registrar_equipo.php?id='.$id.'>(+)  Registrar Asignacion de Equipo al Cliente </a>';

echo '<br><a href=registrar_equipo_cliente.php?id='.$id.'>(+)  Registrar Equipo Propio del Cliente</a><br><p>&nbsp;</p>

<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';	
		
 
 	
 
 }
 else
 {
	
	header ("Location:registrar_equipo.php?error=1&id=".$_GET['id']);
	exit;
 
 }
 
?> 



