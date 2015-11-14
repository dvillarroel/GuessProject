<?php

	$tipo=$_GET['menu1'];
	$var=$_GET['buscar'];
	require_once("manejomysql.php");
	conectar_bd();
	if($tipo == 1)
	{
		
		$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var;" ) or die(header ("Location:error.php"));

		if (mysql_num_rows($usuario_consulta) != 0)
		{	
				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];
	
		}
		else
		{
		
			header ("Location:buscar_cliente.php?error=2");
			exit;
		
		}
	}
	if($tipo == 2)
	{	$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE  ci_cliente=$var;" ) or die(header ("Location:error.php"));
		
		if (mysql_num_rows($usuario_consulta) != 0)
		{	
		
		$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
				//$observaciones=$registro['observaciones'];

	
		}
		
		else
		{
				header ("Location:buscar_cliente.php?error=3");
				exit;
		
		}
	
	}
	
	if($tipo == 3)
	{
		
		//echo "SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;";
		
		$usuario_consulta = mysql_query("SELECT codigo_cliente, tipo_de_equipo, condicion_entrega, tipo_garantia FROM equipo WHERE cod_equipo=$var;" ) or die(header ("Location:error.php"));	
			
			if (mysql_num_rows($usuario_consulta) != 0)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				$var2=$registro['codigo_cliente'];
			
				$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus FROM cliente WHERE codigo_cliente=$var2;" ) or die(header ("Location:error.php"));

				$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=null;
		
		}
		else
		{	
				header ("Location:buscar_cliente_pedido.php?error=4");
				exit;
		}	
		
	
	}


echo'
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>
<p>INFORMACION PEDIDO</p>

<form action="registrar_cliente2.php" method="post">


<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
              <td width="25%" class="campotablas">'.$codigo_cliente.'</td>
              <td width="25%" class="campotablas">Nro. Carnet de Identidad:</td>
              <td width="25%" class="campotablas">'.$ci.'</td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
              <td class="campotablas">'.$ap.'</td>
              <td class="campotablas">Apellido Materno:</td>
              <td class="campotablas">'.$am.'</td>
          </tr>
		  
		  <tr> 
              <td height="27"class="campotablas"> Nombres:</td>
              <td class="campotablas">'.$nombres.'</td>
              <td class="campotablas">Direccion:</td>
              <td class="campotablas">'.$direccion.'</td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
              <td class="campotablas">'.$telefono.'</td>
              <td class="campotablas">Correo Electronico:</td>
              <td class="campotablas">'.$email.'</td>
          </tr>
		  
		  <tr> 
              <td class="campotablas">Fecha de Registro:</td>
              <td class="campotablas">'.$fecha.'</td>
              <td class="campotablas"></td>
              <td class="campotablas"></td>
          </tr>
		  
          
         
		  
        </table>


</td>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="18" ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

<br>
  <table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>

<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<center>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td width="32%" height="24"  class="title" >OBSERVACIONES</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" >'.$observaciones.'</textarea> </td>
    </tr>
  </table>



</td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0" >
<tbody><tr>
<td ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>';
  
 
		echo '<BR><p align="center"><font align="center">INFORMACION EQUIPOS REGISTRADOS</font></p>';
		
		


  
 // echo "SELECT cod_equipo, tipo_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo FROM equipo where codigo_cliente=".$id.";";
  $usuario_consulta = mysql_query("SELECT cod_equipo, tipo_de_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo, propiedad_equipo FROM equipo where codigo_cliente=".$codigo_cliente.";" ) or die(header ("Location:error.php"));

	
	if (mysql_num_rows($usuario_consulta) != 0)
{
	echo' 
		 <table width="80%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr> 
    <td class="title">Codigo Equipo</td>
    <td class="title">Tipo de Equipo </td>
    <td class="title"> Condicion de Entrega</td>
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
  
  
    $usuario_consulta = mysql_query("SELECT cod_equipo, tipo_de_equipo, condicion_entrega, tipo_garantia, fecha_registro_equipo, observaciones_equipo, propiedad_equipo FROM equipo where codigo_cliente=".$codigo_cliente.";" ) or die(header ("Location:error.php"));

	
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
			 <table width="60%" border="0" cellpadding="0" cellspacing="0" align="center">
  				<tr> 
    <td class="title">Codigo Equipo</td>
    <td class="title">Tipo de Equipo </td>
    <td class="title">Propiedad</td>
    
  </tr>';
  			$aux=3;
			}
			
		
		echo "<tr>";
		echo "
				<td class='campotablas'>".$registro['cod_equipo']."</td>
    			<td class='campotablas'>".$registro['tipo_de_equipo']."</td>
    			<td class='campotablas'> Equipo es de Propiedad del Cliente</td>";
   
//    			<td><a href=modificar_cliente.php?id=".$registro['codigo_cliente']."></font> <font color='#FFCC99'>Modificar </a></td>	";
	
			
		echo "</tr>";
		}
	}
	echo'</table> <p>&nbsp;</p>
<p align="center"><a href="buscar_cliente.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>>';
 	
  echo'
  </form>';
  }
  
  else
  {
  echo '<BR>EL CLIENTE NO TIENE REGISTRADO NINGUN TIPO DE EQUIPO <p>&nbsp;</p>
<p align="center"><a href="buscar_cliente.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
  
  }
  

  
?>  
  
  
  
<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
