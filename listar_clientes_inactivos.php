<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<div align="center"><font color="#330000" size="5">Listar del Ultimo Pedido que 
  Realizo cada cliente</font> </div>
  
  <div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0"> 


      <td class="title" width="20%">Nombre Completo</td>
      <td class="title" width="15%">Direccion</td>
      <td class="title" width="10%">Telefono</td>
	  <td class="title" width="15%">Fecha del Ultimo Pedido</td>
	  <td class="title" width="10%">Numero Dias (+) de 15 dias </td>
	  <td class="title" width="30%">Observaciones</td>
	  
	  
    </tr>

	
		
<?php

require_once("manejomysql.php");
conectar_bd();


			$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
			$registro7= sacar_registro_bd($resultado7);
			$fecha2=$registro7['date'];

			list($a,$m,$d)=split("-", $fecha2);
			
			switch($m)
			{
				case "01":
				$num=$d-15;
				if($num<=0)
				{
					$num2=31+$num;
					$a=$a-1;
					$fecha1=$a.'-12-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-01-'.$num;	
				}
				
		break;

				case "02":
			
				$num=$d-15;
				if($num<=0)
				{
					$num2=31+$num;
					//$a=$a-1;
					$fecha1=$a.'-01-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-02-'.$num;	
				}
				
		break;
				case "03":
				$num=$d-15;
				if($num<=0)
				{
					$num2=28+$num;
					//$a=$a-1;
					$fecha1=$a.'-02-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-03-'.$num;	
				}
				
		break;
		
		
				case "04":
				$num=$d-15;
				if($num<=0)
				{
					$num2=30+$num;
					//$a=$a-1;
					$fecha1=$a.'-03-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-04-'.$num;	
				}
				
		break;
		
				case "05":
				$num=$d-15;
				if($num<=0)
				{
					$num2=31+$num;
					//$a=$a-1;
					$fecha1=$a.'-04-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-05-'.$num;	
				}
				
		break;
				case "06":
				$num=$d-15;
				if($num<=0)
				{
					$num2=30+$num;
					//$a=$a-1;
					$fecha1=$a.'-05-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-06-'.$num;	
				}
				
		break;
				case "07":
				$num=$d-15;
				if($num<=0)
				{
					$num2=31+$num;
					//$a=$a-1;
					$fecha1=$a.'-06-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-07-'.$num;	
				}
				
		break;

				case "08":
				$num=$d-15;
				if($num<=0)
				{
					$num2=31+$num;
					//$a=$a-1;
					$fecha1=$a.'-07-'.$num2;
					
				}
				else
				{
				if($num < 10){$num ="0".$num;}
				$fecha1=$a.'-08-'.$num;	
				}
				
				break;
				case "09":
				$num=$d-15;
				if($num<=0)
				{
					$num2=30+$num;
					//$a=$a-1;
					$fecha1=$a.'-08-'.$num2;
					
				}
				else
				{
				  if($num<10){	$num="0".$num; }
				$fecha1=$a.'-09-'.$num;	
				}
				
				break;
				
				
				
				case "10":
				$num=$d-15;
				if($num<=0)
				{
					$num2=31+$num;
					//$a=$a-1;
					$fecha1=$a.'-09-'.$num2;
					
				}
				else
				{
				if($num<10)
				 {	
				 	$num="0".$num; 
				 }
				$fecha1=$a.'-10-'.$num;	
				}
				
				break;
				case "11":
				$num=$d-15;
				if($num<=0)
				{
					$num2=30+$num;
					//$a=$a-1;
					$fecha1=$a.'-10-'.$num2;
					
				}
				else
				{
				if($num<10)
				 {	
				 	$num="0".$num; 
				 }
				$fecha1=$a.'-11-'.$num;	
				}
				
		break;
				case "12":
				$num=$d-15;
				if($num<=0)
				{
					$num2=31+$num;
					//$a=$a-1;
					$fecha1=$a.'-11-'.$num2;
					
				}
				else
				{
				if($num<10){	$num="0".$num; }
				$fecha1=$a.'-12-'.$num;	
				}
				
		break;
		

		
		}
		
		
		
			echo $fecha1;


		






$consulta="select codigo_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, observaciones_cliente from cliente;";
//cho $consulta;

$usuario_consulta = mysql_query($consulta);

//echo mysql_num_rows($usuario_consulta);
if (mysql_num_rows($usuario_consulta) != 0)
{	
	for ( $j=0; $j< cuantos_registros_bd($usuario_consulta); $j++)
	{
			
			$a=sacar_registro_bd($usuario_consulta);
			
			$consulta2="select fecha from pedido where estado='Ejecutado' and codigo_cliente=".$a['codigo_cliente']." order by fecha";
			//echo $consulta2;
			$usuario_consulta2 = mysql_query($consulta2);
			$fecha=null;
			if(mysql_num_rows($usuario_consulta2) != 0)
			{
				for ( $i=0; $i< cuantos_registros_bd($usuario_consulta2); $i++)
				{
						$a2=sacar_registro_bd($usuario_consulta2);
						$i2=$i+1;
						
						if($i2==cuantos_registros_bd($usuario_consulta2))
						{
							$fecha=$a2;
					//		echo $a2['fecha'];
						
							if($a2['fecha'] <= $fecha1)
							{
								$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
								$registro7= sacar_registro_bd($resultado7);
								$fecha2=$registro7['date'];
							
								if($a2['fecha'] != $fecha1){
								
								//===========================================================================================================================

			
			
			
			$numdias=0;
			$fechaC=$a2['fecha'];

			list($a3,$m,$d2)=split("-", $fechaC);
			list($af,$mf,$df)=split("-", $fecha2);
			
			//echo $fecha1."    -  ". $fechaC;
			//$numdias=1;
//echo			$fechaC."   -  ";
//echo $fecha1;
	

			while( $fecha1 != $fechaC )
			{
		//		echo "hola";
										
				switch($m)
				{
					case "01":
												
						if($d2 == 31)
						{
							$numdias=$numdias+1;
							$m="02";
							$d2="01";
						$fechaC=$a3."-".$m."-".$d2;
						break;	
							
						}
						else
						{
							$numdias=$numdias+1;
							$d2=$d2+1;
							$fechaC=$a3."-".$m."-".$d2;
						}
						
						
						if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
						
				
					break;

					case "02":
						
					if($d2 == 29)
					{
							$numdias=$numdias+1;
							$m="03";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;
							
							$fechaC=$a3."-".$m."-".$d2;
					}
					if($d2 < 10)
					{
						$d2="0".$d2;
					}
					$fechaC=$a3."-".$m."-".$d2;												
					break;

						
					case "03":
	
					if($d2 == 31)
					{
							$numdias=$numdias+1;
							$m="04";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;
							
							$fechaC=$a3."-".$m."-".$d2;
					}
										if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					break;
					
					case "04":

					if($d2 == 30)
					{
							$numdias=$numdias+1;
							$m="05";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;
							$fechaC=$a3."-".$m."-".$d2;
					}
											if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					break;

					case "05":
					if($d2 == 31)
					{
							$numdias=$numdias+1;
							$m="06";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;

							$fechaC=$a3."-".$m."-".$d2;
					}
					
											if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;	
					break;					
		
					case "06":

					if($d2 == 30)
					{
							$numdias=$numdias+1;
							$m="07";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;

							$fechaC=$a3."-".$m."-".$d2;
						//	echo $fechaC;
					}
					
											if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					break;
					case "07":

					if($d2 == 31)
					{
							$numdias=$numdias+1;
							$m="08";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;

							$fechaC=$a3."-".$m."-".$d2;
					}
						if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					break;

					case "08":

					if($d2 == 31)
					{
							$numdias=$numdias+1;
							$m="09";
							$d2="01";

							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;
							$fechaC=$a3."-".$m."-".$d2;
					}					
											if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					break;					
		
					case "09":

					if($d2 == 30)
					{
							$numdias=$numdias+1;
							$m="10";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;

							$fechaC=$a3."-".$m."-".$d2;
					}	
											if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					
									break;
					
					case "10":
					
					if($d2 == 31)
					{
							$numdias=$numdias+1;
							$m="11";
							$d2="01";

							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;

							$fechaC=$a3."-".$m."-".$d2;
					}
						if($d2 < 10)
						{
							$d2="0".$d2;
						}
						
						$fechaC=$a3."-".$m."-".$d2;
						
						//echo $fechaC;
						//$fechaC="2007-09-01";
					break;

					case "11":


					if($d2 == 30)
					{
							$numdias=$numdias+1;
							$m="12";
							$d2="01";
							$fechaC=$a3."-".$m."-".$d2;
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;

							$fechaC=$a3."-".$m."-".$d2;
					}
											if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					break;					
		
					case "12":

					if($d2 == 31)
					{
							$numdias=$numdias+1;
							$m="01";
							$d2="01";
							$a3=$a3+1;
							$fechaC=$a3."-".$m."-".$d2;
							
													break;
					}
					else
					{
							$numdias=$numdias+1;
							$d2=$d2+1;

							$fechaC=$a3."-".$m."-".$d2;
					}
									if($d2 < 10)
						{
							$d2="0".$d2;
						}
						$fechaC=$a3."-".$m."-".$d2;
					break;
					
					
				}
				//echo $fechaC."<BR>";
				
			//	break;
				//if($numdias==15){break;}	 

			}
				//$fechaC="2007-09-01";
		//	echo "<br>".$numdias." Dias";
//===========================================================================================================================

								
								
						
								echo "<tr>
								<td class='campotablas'>&nbsp;".$a['nombre_cliente']."  ".$a['apellido_paterno']." ".$a['apellido_materno']."</td>
 					   			<td class='campotablas'>&nbsp;".$a['direccion_cliente']."</td>
 					   			<td class='campotablas'>&nbsp;".$a['telefono_cliente']."</td>
								<td class='campotablas'>&nbsp;".$a2['fecha']."</td>
								<td class='campotablas'>&nbsp;".$numdias."</td>
								<td class='campotablas'>&nbsp;".$a['observaciones_cliente']."</td>";
								
				
		
								echo "</tr>";
								}
							}
							
						}
				}
							
			}

			
	}
			
}
			/*


echo'<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<br>
<br>
';

if (mysql_num_rows($usuario_consulta) == 0)
{	
	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
 	<tr>
    <td class="title" width="10%">Apellido Paterno</td>
    <td class="title" width="10%">Apellido Materno</td>
    <td class="title" width="20%">Nombres</td>
	 <td class="title" width="20%">Detalles del cliente</td></tr>
	<tr>
	<td class="campotablas" colspan="4">No hay Clientes inactivos</td>
	
	</tr>'	
	;
	echo "</table>";


}

else
{

	echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">
  	<tr>
    <td class="title" width="10%">Apellido Paterno</td>
    <td class="title" width="10%">Apellido Materno</td>
    <td class="title" width="20%">Nombres</td>
	 <td class="title" width="20%">Detalles del cliente</td></tr>';

	for ( $i=0; $i< cuantos_registros_bd($usuario_consulta); $i++)
	{
		$registro= sacar_registro_bd($usuario_consulta);
		echo "<tr>";
		echo "
				<td class='campotablas'>&nbsp;".$registro['apellido_paterno']."</td>
    			<td class='campotablas'>&nbsp;".$registro['apellido_materno']."</td>
    			<td class='campotablas'>&nbsp;".$registro['nombre_cliente']."</td>
				<td class='campotablas'>&nbsp;".$registro['codigo_cliente']."</td>";
		
		echo "</tr>";		
	}
	echo "</table>";
				

}



	echo '
	<p>&nbsp;</p>
<p align="center"><a href="reportes.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
	*/
?>

</table>
</div>
<p>&nbsp;</p>
	  <p align="center"><a href="reportes.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>