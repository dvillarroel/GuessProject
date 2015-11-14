<? 

$id_cliente=$_GET['id'];

$tipo=$_POST['menu1'];
$descuentos=$_POST['otros'];
$observaciones=$_POST['descuentos'];




			require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(id_descuento) as p FROM descuentos" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			
			$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
			$registro7= sacar_registro_bd($resultado7);
			$fecha=$registro7['date'];


//echo "insert into cargo values ($cod_costo, '$cargo', '$descripcion', $sueldo_basico, $sueldo_ant, $otros, $descuentos, '$observaciones');";
//echo "insert into descuentos values ($nc, $id_cliente, 'Adelanto Sueldo', $descuentos, $observaciones, '$fecha');";
mysql_query("insert into descuentos values ($nc, $id_cliente, '$tipo', $descuentos, '$observaciones', '$fecha');" );

echo '
';



	$usuario_consulta = mysql_query("select id_empleado, id_cargo, nombre_emp, apellido_emp, direccion_emp, telefono_emp, observacion_emp from empleados where id_empleado=".$_GET['id']);
	
	$resultado7=mysql_query("SELECT CURRENT_DATE as date" );
	$registro7= mysql_fetch_array($resultado7);
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
		
		$a=sacar_registro_bd($usuario_consulta);
				
		$usuario_consulta2 = mysql_query("select cargo, sueldo_basico, antiguedad, otros from cargo where id_cargo=".$a['id_cargo']);
		$b=mysql_fetch_array($usuario_consulta2);
		
		

//		echo "select sum(monto_descuento) as p from descuentos where id_empleado=".$a['id_empleado']." and fecha_descuento>='$f1' and fecha_descuento<='$f2' ";
		
		$consulta = mysql_query("select ID_DESCUENTO, ID_EMPLEADO, CONCEPTO_DESCUENTO, MONTO_DESCUENTO, OBSERVACION_DESCUENTO, FECHA_DESCUENTO from descuentos where id_empleado=".$a['id_empleado']." and fecha_descuento>='$f1' and fecha_descuento<='$f2' ");
	
		$consultaa = mysql_query("select sum(monto_descuento) as p from descuentos where id_empleado=".$a['id_empleado']." and fecha_descuento>='$f1' and fecha_descuento<='$f2' ");
		$dba=mysql_fetch_array($consultaa);
		
		$r=$b['sueldo_basico']+$b['antiguedad']+$b['otros'];
		
		if($dba['p']!= null)
		{
		$des=$dba['p'];
		}
		else
		{
		$des=0;
		}		
		
		$saldo=$r-$des;


?>

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<div align="center"><font color="#660000">EL REGISTRO SE REALIZO CORRECTAMENTE<BR>
  DETALLE DE DESCUENTOS </font><br>
</div>
<table width="46%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="2" class="title"><font color="#000033">Informacion Empleado</font></td>
  </tr>
  <tr> 
    <td width="73%" class="campotablas">Empleado:</td>
    <td width="27%" class="campotablas">&nbsp;<? echo $a['nombre_emp']." ".$a['apellido_emp'];?></td>
  </tr>
  <tr> 
    <td class="campotablas">Cargo:</td>
    <td class="campotablas">&nbsp;<? echo $b['cargo'];?></td>
  </tr>
  <tr> 
    <td class="campotablas">Observaciones:</td>
    <td class="campotablas">&nbsp; 
      <? echo $a['observacion_emp'];?>
    </td>
  </tr>
  <tr> 
    <td class="campotablas">Monto Total Ingresos Empleados:</td>
    <td class="campotablas">&nbsp; <? echo $r;?></td>
  </tr>
  <tr> 
    <td class="campotablas">Monto Total Descuentos o adelantos de sueldo</td>
    <td class="campotablas">&nbsp; <? echo $des;?></td>
  </tr>
  <tr>
    <td class="campotablas">Saldo displonible</td>
    <td class="campotablas">&nbsp; <? echo $saldo;?></td>
  </tr>
</table>




<br>
<table width="75%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="5" class="title"><div align="center"><font color="#000033">Informacion 
        Descuentos</font></div></td>
  </tr>
  <tr> 
    <td width="22%" class="title" ><font color="#000033">Numero Descuento</font></td>
    <td width="36%" class="title"><font color="#000033">Tipo de descuento o adelanto 
      de sueldo</font></td>
    <td width="16%" class="title"><font color="#000033">Monto</font></td>
    <td width="8%" class="title"><font color="#000033">Fecha </font></td>
    <td width="18%" class="title"><font color="#000033">Observaciones</font></td>
  </tr>
  <?
  	for ( $i=0; $i< cuantos_registros_bd($consulta); $i++)
	{
	
		$db=mysql_fetch_array($consulta);
		$nu=$i+1;

echo'  <tr> 
    <td class="campotablas">&nbsp;'.$nu.'</td>
    <td class="campotablas">&nbsp;'.$db['CONCEPTO_DESCUENTO'].'</td>
    <td class="campotablas">&nbsp;'.$db['MONTO_DESCUENTO'].'</td>
    <td class="campotablas">&nbsp;'.$db['FECHA_DESCUENTO'].'</td>
	    <td class="campotablas">&nbsp;'.$db['OBSERVACION_DESCUENTO'].'</td>
  </tr>';
  	}


?>
</table>

<?

echo '
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="border-bleft" width="18"></td>
<td class="border-bmain"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td class="border-bright"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>
<p align="center"><a href="ingresos.php">Regresar Administrar Empleados</a></p>
<p align="center"><a href="principal_target.php">Volver a la pagina Principal</a></p>



';




 
?> 
