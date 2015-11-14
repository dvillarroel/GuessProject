<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

</head>

<body>
<div id="Layer5" style="position:absolute; left:13px; top:6px; width:115px; height:86px; z-index:5"><img src="pl%E1stico_tapas.bmp" width="110" height="78"></div>
<div id="Layer2" style="position:absolute; left:182px; top:26px; width:327px; height:36px; z-index:2"><font size="3" class="campotablas"><strong>Lista de empleados</strong></font></div>
<div id="Layer3" style="position:absolute; left:13px; top:110px; width:580px; height:100px; z-index:9">
  <table width="110%" border="1" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="10%" class="campotablasSP2"><div align="center">Numero de Empleado</div></td>
      <td width="24%" class="campotablasSP2"><div align="center">Nombre Completo</div></td>
      <td width="27%" class="campotablasSP2"><div align="center">Cargo</div></td>
	  <td width="22%" class="campotablasSP2"><div align="center">Sueldo Total</div></td>
      <td width="17%" class="campotablasSP2"><div align="center">Total descuentos</div></td>
      <td width="22%" class="campotablasSP2"><div align="center">Saldo Liquido 
          Pagable</div></td>
	  <td width="22%" class="campotablasSP2"><div align="center">Registro</div></td>

    </tr>
    <? 
	require_once("manejomysql.php");
	conectar_bd();
	//echo "select id_empleado, id_cargo, nombre_emp, apellido_emp, direccion_emp, telefono_emp, observaciones_emp from empleados;";
	$usuario_consulta = mysql_query("select id_empleado, id_cargo, nombre_emp, apellido_emp, direccion_emp, telefono_emp, observacion_emp from empleados;");
	
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

	
	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		echo '<tr>'; 
	    
		$a=sacar_registro_bd($usuario_consulta);
		$num=$i+1;
		
		$usuario_consulta2 = mysql_query("select cargo, sueldo_basico, antiguedad, otros from cargo where id_cargo=".$a['id_cargo']);
		$b=mysql_fetch_array($usuario_consulta2);
		
		

//		echo "select sum(monto_descuento) as p from descuentos where id_empleado=".$a['id_empleado']." and fecha_descuento>='$f1' and fecha_descuento<='$f2' ";
		
		$consulta = mysql_query("select sum(monto_descuento) as p from descuentos where id_empleado=".$a['id_empleado']." and fecha_descuento>='$f1' and fecha_descuento<='$f2' ");
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
							
		echo "
		
		<td class='campotablasSP'>&nbsp;".$num."</td>			
		<td class='campotablasSP'>&nbsp;".$a['nombre_emp']." ".$a['apellido_emp']."</td>
		<td class='campotablasSP'>&nbsp;".$b['cargo']."</td>
		<td class='campotablasSP'>&nbsp;".$r."</td>
		<td class='campotablasSP'>&nbsp;".$des."</td>
		<td class='campotablasSP'>&nbsp;".$saldo."</td>
		<td class='campotablasSP'><a href='registrar_adelanto.php?id=".$a['id_empleado']."'>Registrar Adelanto</a></td>

		";
		
		echo '</tr>';	
					
	}

	echo "<tr><td colspan='7' class='campotablasSP'>Nota: La lista es correspondiente de $f1 a $f2 </td>";
	echo '</tr>';

	?>

	

  </table>
  <br>
  <div id="Layer4"><p align="center"><a href="administrar_emp.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p></div>
</div>

</body>
</html>
