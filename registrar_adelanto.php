<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0


echo '<title> REGISTRAR CLIENTE</title>';
?> 

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body background="body2.jpg">
 

<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario"> 
      REGISTRAR ADELANTO SUELDO</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<form action="registrar_adelanto2.php?id=<? echo $_GET['id'] ?>" method="post" name="ventas">

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
			$resultado= consulta_bd("SELECT max(id_cargo) as p FROM cargo" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			
			$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];

		list($a3,$m,$d2)=split("-", $fecha);
		
		if($m == 12)
		{
			$f1=$a3."-".$m."-01";
			$a3=$a3+1;
			$f2=$a3."-01-01";
		}
		
		else
		{
			$f1=$a3."-".$m."-01";
			$m=$m+1;
			if($m<10)
			{
				$m="0".$m;
			}
			$f2=$a3."-".$m."-01";
		
		}

			
			$usuario_consulta = mysql_query("select id_empleado, id_cargo, nombre_emp, apellido_emp, direccion_emp, telefono_emp, observacion_emp from empleados where id_empleado=".$_GET['id']);
		
			$a=sacar_registro_bd($usuario_consulta);

		
			$usuario_consulta2 = mysql_query("select cargo, sueldo_basico, antiguedad, otros from cargo where id_cargo=".$a['id_cargo']);
			$b=mysql_fetch_array($usuario_consulta2);
				
			$consulta = mysql_query("select sum(monto_descuento) as p from descuentos where id_empleado=".$a['id_empleado']." and fecha_descuento>='".$f1."' and fecha_descuento<='".$f2."' ");

		$db=mysql_fetch_array($consulta);
		
		$r=$b['sueldo_basico']+$b['antiguedad']+$b['otros'];
		
		if($db['p']!= null)
		{
		$des=$db['p'];
		}
		else
		{
		$des=0;
		}		
		
		$saldo=$r-$des;
		

			
		?>
			<table width="50%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
            <tr> 
              <td colspan="2"  class="title"><font color="#000033">INFORMACI&Oacute;N 
                CARGO</font></td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Fecha de registro:</td>
              <td width="25%" class="campotablas"> <? echo $fecha;?> </td>
            </tr>
            <tr> 
              <td class="campotablas">Concepto:</td>
              <td class="campotablas">Adelanto de Sueldo 
              </td>
            </tr>
            <tr> 
              <td height="27"class="campotablas"> Empleado:</td>
              <td class="campotablas"><? echo $a['nombre_emp']." ".$a['apellido_emp'];?>  
              </td>
            </tr>
            <tr> 
              <td class="campotablas">Total Sueldo:</td>
              <td class="campotablas"> <? echo $r;?></td>
            </tr>
            <tr> 
              <td class="campotablas">Total Descuentos:</td>
              <td class="campotablas"><? echo $des;?></td>
            </tr>
			
			<tr> 
              <td class="campotablas">Saldo Disponible para adelanto de sueldo:</td>
              <td class="campotablas"><? echo $saldo;?></td>
            </tr>
            <tr> 
              <td class="campotablas">Ingresar Monto por concepto de adelanto 
                de sueldo:</td>
              <td class="campotablas"><input type="text" name="otros"  tabindex="3" class="Formulario" value="0.00"></td>
            </tr>
            <tr> 
              <td class="campotablas">Observacion Descuento</td>
              <td class="campotablas"><input type="text" name="descuentos"  tabindex="3" class="Formulario"></td>
            </tr>
          </table> 


</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>

<br>
  

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="border-left"><img src="../news.php_files/blank.gif" alt="" style="display: block;" height="1"></td>
<td>

<center>




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
      <form action="listar_empleados_adelanto.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
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
	</table> <p>&nbsp;</p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>';


}

  
  
  ?>
  
