<?php

if(!empty($_POST['buscar']))
{

	$tipo=$_POST['menu1'];
	$var=$_POST['buscar'];
	require_once("manejomysql.php");
	conectar_bd();
	$flagresult=0;
	
	if($tipo == 'Nombre del cliente')
	{
		

		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by nombre_cliente" ) or die(header ("Location:error.php"));
		
//		echo "SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var;";

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
				
				$ap=$registro['nombre_cliente'];
	
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
    			<td class='campotablas'><a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Realizar Pedido</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
		echo '<p>&nbsp;</p>
<p align="center"><a href="buscar_cliente_pedido.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

		
	
		}
		else
		{
			$flagresult++;
				//header ("Location:buscar_cliente_pedido.php?error=2");
			//exit;
		
		}
	
	
	if($tipo == 'CI o NIT')
	{	$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by ci_cliente" ) or die(header ("Location:error.php"));

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
				
				$ap=$registro['ci_cliente'];
	
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
    			<td class='campotablas'><a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Realizar Pedido</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
		echo '<p>&nbsp;</p>
<p align="center"><a href="buscar_cliente_pedido.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

		
	
		}
		else
		{
			$flagresult++;
		
			//header ("Location:buscar_cliente_pedido.php?error=2");
			//exit;
		
		}
	
	
		
	if($tipo == 'Apellido del Cliente')
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by apellido_paterno" );
			//echo "SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente order by apellido_paterno";
			
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
    			<td class='campotablas'><a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$registro['codigo_cliente'].">Realizar Pedido</a></td>";
		echo "</tr>";
						
				}	
					
			}
		echo "</table>";
		echo '<p>&nbsp;</p>
<p align="center"><a href="buscar_cliente_pedido.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

		
			
		}
		else
		{	
				if($flagresult ==2)
				{
					echo "NO SE ENCONTRO NINGUN RESULTADO";
					}
		}	
		
	
	}
	
}
  
  else
  {
  	header ("Location:buscar_cliente_pedido.php?error=1");
	exit;
  }
  
  
?>  
  
  
  
<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
