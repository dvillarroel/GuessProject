<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0


echo '<title> REGISTRAR CLIENTE</title>';
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">

 

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">MODIFICAR 
      INFORMACION EMPLEADO</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="modificar_emp2.php" method="post" name="ventas" >

<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ></td>
      <td ></td>
      <td></td>
    </tr>
  </tbody>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>
<?php 
			require_once("manejomysql.php");
			conectar_bd();
	///		echo "select id_empleado, id_cargo, nombre_emp, apellido_emp, direccion_emp, telefono_emp, observacion_emp from empleados where id_empleado=".$_GET['id'];
			$usuario_consulta = mysql_query("select id_empleado, id_cargo, nombre_emp, apellido_emp, direccion_emp, telefono_emp, observacion_emp from empleados where id_empleado=".$_GET['id']);
			$a=sacar_registro_bd($usuario_consulta);
			
?>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N EMPLEADO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Empleado:</td>
              <td width="25%" class="campotablas"> 
                <?php 
		
			echo ' <input type="text" name="codigo_cliente" maxlength="15" readonly="true" tabindex="1" class="Formulario" value='.$a['id_empleado'].'>'; ?>
              </td>
              <td width="25%" class="campotablas">Nombre Empleado:</td>
              <td width="25%" class="campotablas"><input type="text" name="nombre_empleado" maxlength="7" tabindex="2" class="Formulario" value=<? echo $a['nombre_emp'];?> > 
              </td>

            </tr>
            <tr> 
              <td class="campotablas">Apellidos Empleado:</td>
              <td class="campotablas"><input type="text" name="apellidos" maxlength="15" tabindex="3" class="Formulario" value=<? echo $a['apellido_emp'];?>> 
              </td>
              <td class="campotablas">Direccion Empleado:</td>
              <td class="campotablas"><input name="direccion" type="text" class="Formulario" tabindex="4" maxlength="17" value=<? echo $a['direccion_emp'];?> > 
              </td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Telefono:</td>
              <td class="campotablas"> <input type="text" name="telefono"  maxlength="25" tabindex="5" class="Formulario" value=<? echo $a['telefono_emp'];?>> 
              </td>
              <td class="campotablas">Cargo:</td>
              <td class="campotablas">
			  <?  echo '<select name="cargo" class="Seleccion">';
		
		  
		  			require_once("manejomysql.php");
					conectar_bd();			
		  			$usuario_consulta = mysql_query("SELECT id_cargo, cargo from cargo" );

					if (mysql_num_rows($usuario_consulta) != 0)
					{
															
						for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
						{
							$registro= sacar_registro_bd($usuario_consulta);
							$nombre_producto=$registro['cargo'];
							
							if($nombre_producto==$a['id_cargo'])
							{					
							echo '<option selected>'.$nombre_producto.'</option>';
							}
							else
							{
							echo '<option>'.$nombre_producto.'</option>';
							}
						
						
						}
					}
			        
					echo '</select>';
			  ?>
			  
			  </td>
            </tr>
            <tr> 
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
            </tr>
          </table>


</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="19" class="border-bleft"></td>
<td class="border-bmain"></td>
<td class="border-bright"></td></tr>
</tbody></table>

<br>
  <table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
        <td height="31" >&nbsp;</td>
      <td ></td>
        <td >&nbsp;</td>
    </tr>
  </tbody>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<center>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td width="32%" height="24"  class="title" >OBSERVACIONES</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" ><? echo $a['observacion_emp'];?></textarea> </td>
    </tr>
  </table>



</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="border-bleft" width="18"></td>
<td class="border-bmain"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td class="border-bright"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="listar_empleados.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  
  
  <?php 
  if( !empty($_GET['error_registro']) )
{
	$respuesta=null;
	if($_GET['error_registro'] == 1)
	{
		$respuesta='TIENE QUE LLENAR TODOS LOS CAMPOS QUE SON NECESARIOS';
	}
		
	echo '<br><br><table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}

					

  
  
  ?>
  
 
<p>

</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
