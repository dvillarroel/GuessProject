<?php 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0


echo '<title> REGISTRAR CLIENTE</title>';
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="../body2.jpg">
 
<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">MODIFICAR 
      INFORMACION DE CLIENTE</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<?php 



echo '<form action="modificar_cliente2.php?id='.$var=$_GET["id"].'" method="post">';
?>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
      <td ></td>
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
    </tr>
  </tbody>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td ></td>
<td>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
            <td width="25%" class="campotablas">
			<?php 
			require_once("manejomysql.php");
			conectar_bd();
			$var=$_GET['id'];
			
			$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente FROM cliente WHERE codigo_cliente=$var;" ) or die(header ("Location:error.php"));

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
	
					$observaciones=$registro['observaciones_cliente'];
				//$observaciones=$registro['observaciones'];
	
				//<input type="text" name="direccion" maxlength="2555" tabindex="6" class="Formulario" value='.$direccion.'> 
		
			
			echo $codigo_cliente; 
           
		   echo ' </td>
              <td width="25%" class="campotablas">Nro. Carnet de Identidad:</td>
            <td width="25%" class="campotablas"><input type="text" name="ci" maxlength="7" tabindex="2" class="Formulario" value='.$ci.'> 
            </td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
            <td class="campotablas"><input type="text" name="apellido_paterno" maxlength="15" tabindex="3" class="Formulario" value='.$ap.'> 
            </td>
              <td class="campotablas">Apellido Materno:</td>
            <td class="campotablas"><input type="text" name="apellido_materno" maxlength="17" tabindex="4" class="Formulario" value='.$am.'> 
            </td>
          </tr>
		  
		  <tr> 
              <td height="27"class="campotablas"> Nombres:</td>
            <td class="campotablas"> <input type="text" name="nombres"  maxlength="25" tabindex="5" class="Formulario" value='.$nombres.'> 
            </td>
              <td class="campotablas">Direccion:</td>
            <td class="campotablas"><textarea name="direccion" class="interiorArea" style="WIDTH: 80%; HEIGHT: 20px" >'.$direccion.'</textarea> 


            </td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
            <td class="campotablas"><input type="text" name="telefono"  maxlength="45" tabindex="7" class="Formulario" value='.$telefono.'></td>
              <td class="campotablas">Correo Electronico:</td>
            <td class="campotablas"><input type="text" name="correo_electronico" maxlength="20" tabindex="14" class="Formulario" value='.$email.'></td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="54" ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

<br>
  <table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td>
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
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td ></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td ><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/m2.gif" onMouseMove= src="images/m2.gif" onMouseOut=src="images/m1.gif" value="" SRC="images/m1.gif"> </td></form>
 <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  <p align="center"><a href="actualizar_cliente.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
  
  ';
  ?>
  
  
  <?php 
  if( !empty($_GET['error_registro']) )
{

	if($_GET['error_registro'] == 1)
	{
		$respuesta='TIENE QUE LLENAR TODOS LOS CAMPOS QUE SON NECESARIOS';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}

  
  
  ?>
