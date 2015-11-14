<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SOLICITUD DE PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

</head>

<body>
<?php 
	require_once("manejomysql.php");
	conectar_bd();

	$usuario_consulta = mysql_query("SELECT cod_equipo FROM equipo" );
	$usuario_consulta2 = mysql_query("SELECT max(cod_equipo) as cod FROM equipo" );
	
	if(cuantos_registros_bd($usuario_consulta) == 0 )
	{
	
	
				echo '				<div id="Layer1">
<table width="300" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td class="title">Lista de Codigos Disponibles</td>
  </tr>
  <tr>
    <td class="campotablas>No Existen codigos registrados</td>
  </tr>
  </table>
  </div>';
			
	}
	else
	{
			
		$registro2= sacar_registro_bd($usuario_consulta2);
		$maximo=$registro2['cod'];
		$maximo2=$maximo+1;
		
		$arreglo=array();
		$indice=0;
		for($i=1; $i<$maximo; $i++)
		{	
			$bandera=false;
			$usuario_consulta = mysql_query("SELECT cod_equipo FROM equipo" );
			for($j=0; $j< cuantos_registros_bd($usuario_consulta); $j++)
			{
				$registro= sacar_registro_bd($usuario_consulta);
				$codigo=$registro['cod_equipo'];
				if($i == $codigo)
				{
					$bandera=true;
				}
			
			}
			if($bandera==false)
			{
				//echo $i;
				$arreglo[$indice]=$i;
				$indice=$indice+1;
			}
						
		
		}
	
	
			$i=1;
			$aux=0;
			
			
			echo '<div id="Layer1">
				  <table width="300" border="0" cellspacing="0" cellpadding="0">
  				  <tr>
    			   <td class="title">Lista de Codigos Disponibles</td>
  </tr>';
  
  
			for($i=0; $i < count($arreglo); $i++ )
			{
				
					echo '  <tr>
    						<td class="campotablas">'.$arreglo[$i].'</td>
  							</tr>';
			}		
			
			echo '  <tr>
    <td class="campotablas">del Codigo '.$maximo2.' para adelante</td>
  </tr>
</table>

</div>';
			
			
	}
	
	
	
	?>

</body>
</html>

