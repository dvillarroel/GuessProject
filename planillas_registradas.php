<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<br>
<table width="26%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="2" class="title"><font color="#000033">PLANILLAS REGISTRADAS</font></td>
  </tr>


<?  

		require_once("manejomysql.php");
		conectar_bd();
		
		$user_query = mysql_query("select distinct fecha_planilla as p from planilla");
		
		if(cuantos_registros_bd($user_query)!=0)
		{

		for ( $i=0; $i< cuantos_registros_bd($user_query); $i++)
		{
			$result_query=mysql_fetch_array($user_query);
		
			echo '<tr><td class="campotablas" aling="center"><a href="ver_planillas.php?fecha='.$result_query["p"].'">'.$result_query["p"].'</a></td></tr>';
  		}
		}
		else
		{
			echo '<tr><td class="campotablas" aling="center">No existe ninguna planilla registrada</td></tr>';
		}
  
  ?>

  
  
</table>




<br>


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
