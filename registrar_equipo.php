<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">REGISTRAR EQUIPO</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<?php 
$id_c=$_GET['id'];

echo '<form action="registrar_equipo2.php?id='.$id_c.'" method="post">';
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
              <td colspan="4"  class="title">INFORMACI&Oacute;N EQUIPO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Equipo:</td>
              <td width="25%" class="campotablas">'; 
			   
			  	require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(cod_equipo) as p FROM equipo" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			$cod_cliente=$_GET['id'];
			
			
			 echo ' <input type="text" name="codigo_cliente" maxlength="15" tabindex="5" class="Formulario" value='.$nc.'>';
			 echo '<a href="ver_codigo.php" target="_blank"><img src="cal.png" width="16" height="16" border="0" alt="Click para Codigos Disponibles"  ></a>'; 
             echo' </td>
              <td width="25%" class="campotablas">Codigo Cliente:</td>
              <td width="25%" class="campotablas">'.$cod_cliente.'</td>';
			  echo
			  '
            </tr>
            <tr> 
              <td class="campotablas">Tipo de Equipo:</td>
              <td class="campotablas">
			  
			  		<select name="menu" class="Seleccion" >
                  <option selected>Seleccionar</option>
                  <option>Equipo Completo de agua</option>
                </select> 
				</td>
              <td class="campotablas">Condicion de Entrega:</td>
              <td class="campotablas"><select name="select" class="Seleccion">
                  <option selected>Seleccionar</option>
                  <option>Prestamo Gratuito</option>
                  <option>Con Garantia</option>
                </select> </td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Tipo de Garantia:</td>
              <td class="campotablas"> <input type="text" name="nombres"  maxlength="30" tabindex="10" class="Formulario"> 
              </td>
              <td class="campotablas">Precio del Equipo:</td>
              <td class="campotablas"><input type="text" name="direccion" maxlength="20" tabindex="14" class="Formulario" value=20> 
              </td>
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
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
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
