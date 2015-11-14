<? 
require_once("manejomysql.php");
conectar_bd();

$resultado7=mysql_query("SELECT CURRENT_DATE as date" );
$registro7= mysql_fetch_array($resultado7);
$fecha=$registro7['date'];

list($a3,$m,$d2)=split("-", $fecha);

	
	if($m == 1)
	{
		$f3=$a3."-".$m."-01";
		$a3=$a3-1;
		$f2=$a3."-12-01";
		$f3=$a3."-".$m."-01";
	}
	else
	{
		$f3=$a3."-".$m."-01";
		$m=$m-1;
		if($m<10)
		{
			$m="0".$m;
		}
		$f2=$a3."-".$m."-01";
	}

	$ver_registro = mysql_query("select max(fecha_planilla) as p from planilla");


	if(cuantos_registros_bd($ver_registro) !=0)
	{

	$result_registro=mysql_fetch_array($ver_registro);
	$re_re=$result_registro['p'];
	
//	echo $result_registro['p'];
	list($a3,$m,$d2)=split("-", $fecha);
	list($a4,$m4,$d4)=split("-", $re_re);

//	list($a4,$m4,$d4)=split(".", $f2);

	$iniciar=0;
	
	if($a3==$a4)
	{
		//	echo $m4 ." as" .$m;
		
		while($m > $m4)
		{
		//	echo $m4 ." as" .$m;
			$m=$m-1;
			$iniciar=$iniciar+1;
		}
	}
	else
	{	
			//echo $m4 ." as" .$m;
		$iniciar=$iniciar+1;
	
	}


	if($iniciar > 0)
	{

	$usuario_consulta = mysql_query("select id_empleado, id_cargo, nombre_emp, apellido_emp, direccion_emp, telefono_emp, observacion_emp from empleados");
	for ( $j=0; $j< cuantos_registros_bd($usuario_consulta); $j++)
	{
			$a=sacar_registro_bd($usuario_consulta);
			$name=$a['nombre_emp']." ".$a['nombre_emp'];
			$usuario_consulta2 = mysql_query("select cargo, sueldo_basico, antiguedad, otros from cargo where id_cargo=".$a['id_cargo']);
			$b=mysql_fetch_array($usuario_consulta2);
			
			$r=$b['sueldo_basico']+$b['antiguedad']+$b['otros'];	
	
			$consultaa = mysql_query("select sum(monto_descuento) as p from descuentos where id_empleado=".$a['id_empleado']." and fecha_descuento>='$f2' and fecha_descuento<='$fecha' ");
			$dba=mysql_fetch_array($consultaa);
		
			if($dba['p']!= null)
			{
				$des=$dba['p'];
			}
			else
			{
				$des=0;
			}		
			$saldo=$r-$des;		
			
			$consultaa_id = mysql_query("select max(id_planilla) as p from planilla");
			$dba_id=mysql_fetch_array($consultaa_id);
			$ip=$dba_id['p']+1;
			
			mysql_query("insert into planilla values($ip, '$name', $r, 0, $des, $saldo, 'Ninguno', '$f3')");
		
	
	}

	}
	}

?> 
