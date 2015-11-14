<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">REGISTRAR 
      BOTELLONES</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<?php 
$id_c=$_GET['id'];

echo '<form action="registrar_equipo2B.php?id='.$id_c.'" method="post">';
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

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td ><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N BOTELLON</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
              <td width="25%" class="campotablas">'; 
			   
			  	require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(cod_equipo) as p FROM equipo" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			$cod_cliente=$_GET['id'];
			
						$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];
			
			
			 echo $cod_cliente.' </td>
              <td width="25%" class="campotablas">Fecha:</td>
              <td width="25%" class="campotablas">'.$fecha.'</td>';
			  echo
			  '
            </tr>
            <tr> 
              <td class="campotablas">Numero de Botellones:</td>
              <td class="campotablas"> <input type="text" name="nombres"  maxlength="30" tabindex="10" class="Formulario" value="1"> 
			  
			 </td>
			 <td class="campotablas">Seleccionar Empleado</td><td class="campotablas">';
			 
					
			  echo '<select name="cargo" class="Seleccion">';
				  
		  			require_once("manejomysql.php");
					conectar_bd();			
		  			$usuario_consulta = mysql_query("SELECT nombre_emp, apellido_emp from empleados" );

					if (mysql_num_rows($usuario_consulta) != 0)
					{
															
						for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
						{
							$registro= sacar_registro_bd($usuario_consulta);
							$nombre_producto=$registro['nombre_emp']." ".$registro['apellido_emp'] ;
													
							echo '<option>'.$nombre_producto.'</option>';
						
						
						
						}
					}
			        
					echo '</select>';
			  
		 
			 echo '</td>
			 
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
  <table width="100%" align="center" cellpadding="0" cellspacing="0">
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
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" ></textarea> </td>
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
      <td align="center"> <form action="principal_target.php" method="post"><input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="administrar_equipos.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>';
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

