<?php 
	require_once("manejomysql.php");
	conectar_bd();


	$codigo_equipo=$_GET['id_equipo'];
	$codigo_cliente=$_POST['menu1'];
	$condicion_entrega=$_POST['select'];
	$tipo_garantia=$_POST['nombres'];
	$precio_equipo=$_POST['direccion'];
	$observaciones_equipo=$_POST['observaciones'];
	$propiedad_equipo=$_POST['propiedad'];
	
	
	$consulta="update equipo set codigo_cliente=$codigo_cliente, condicion_entrega='$condicion_entrega', tipo_garantia='$tipo_garantia', precio_equipo=$precio_equipo, propiedad_equipo='$propiedad_equipo', observaciones_equipo='$observaciones_equipo' where cod_equipo=$codigo_equipo";

	//echo $consulta;

	mysql_query($consulta);

	

echo '
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">EL EQUIPO FUE MODIFICADO CORRECTAMENTE</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>

<form action="modificar_equipo2.php" method="post">';
echo'
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

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N EQUIPO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Equipo:</td>
              <td width="25%" class="campotablas">'; 
			   
			 
					
			 echo $codigo_equipo; 
             echo' </td>
              <td width="25%" class="campotablas">Cliente:</td>
              <td width="25%" class="campotablas">';
			  	$usuario_consulta = mysql_query("SELECT codigo_cliente, tipo_de_equipo, propiedad_equipo, condicion_entrega, tipo_garantia, precio_equipo, observaciones_equipo FROM equipo WHERE cod_equipo=$codigo_equipo" );

			$registro= sacar_registro_bd($usuario_consulta);
			
		if (mysql_num_rows($usuario_consulta) != 0)
		{	
				
			$codigo_cliente=$registro['codigo_cliente'];
			$tipoEquipo=$registro['tipo_de_equipo'];
			$condicionEntrega=$registro['condicion_entrega'];
			$tipoGarantia=$registro['tipo_garantia'];
			$precioEquipo=$registro['precio_equipo'];
			$observaciones=$registro['observaciones_equipo'];
			$propiedad=$registro['propiedad_equipo'];
			
			$usuario_consulta2 = mysql_query("SELECT nombre_cliente, apellido_paterno, apellido_materno FROM cliente WHERE codigo_cliente=$codigo_cliente");
			
					$registro2= sacar_registro_bd($usuario_consulta2);
					
					$name=$registro2['nombre_cliente']." ".$registro2['apellido_paterno']." ".$registro2['apellido_materno'];
					
					
					echo $name;
					echo '</td>';
			  echo
			  '
            </tr>
            <tr> 
              <td class="campotablas">Tipo de Equipo:</td>
              <td class="campotablas">';
			  echo $tipoEquipo;
			  
				echo'</td>
              <td class="campotablas">Condicion de Entrega:</td>
              <td class="campotablas">'.$condicionEntrega; 
					
				
				  
               echo' </select> </td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Tipo de Garantia:</td>
              <td class="campotablas">'; 
			  echo $tipoGarantia;
			  echo'
              </td>
              <td class="campotablas">Precio del Equipo:</td>
              <td class="campotablas">';
			  echo $precioEquipo;
			  echo'
              </td>
            </tr>
			
				<tr> 
              <td height="27"class="campotablas"> Propiedad del Equipo:</td>
              <td class="campotablas">';
			      
					echo $propiedad;
			  			  
			  echo' 
              </td>
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
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
      <td class="campotablas"> '.$observaciones.'</td>
    </tr>
  </table>



</td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="8" width="18"></td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>

<p align="center"><a href="administrar_equipos.php">VOLVER AL MENU DE ADMINISTRAR EQUIPOS</a></p>
  
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
  ';
  
  }
  else
  {
  	header ("Location:buscar_equipo.php?error=1");
	exit;
  
  }
  ?>
  
  
  <?php 
  if( !empty($_GET['error']) )
{

	if($_GET['error'] == 1)
	{
		$respuesta='TIENE QUE SELECCIONAR EL TIPO DE EQUIPO Y LA CONDICION DE ENTREGA';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}

  
  
  ?>
