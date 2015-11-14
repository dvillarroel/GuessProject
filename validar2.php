<?php

require_once("manejomysql.php");
$redir="index2.php";
$redir2="ingresos.php";
if (!empty($_POST['text1']) )
{
	if( !empty($_POST['text2'])) 
	{
		conectar_bd();
		$usuario_consulta = mysql_query("SELECT * FROM usuario");
		
		$usuario_datos=null;
		if (mysql_num_rows($usuario_consulta) != 0)
		{
			$usuario_datos = mysql_fetch_array($usuario_consulta);
		}
		
							
			if( $_POST['text1'] =="reporte"  )	
			{
				 if($_POST['text2'] == "reporte"  )
		 		{
				
					header ("Location:$redir2");
					exit;
				
			 	}
		 		else
		 		{
				header ("Location:$redir?error_login=4");
				exit;
		 
			 	}	
	
			}	
			else
			{
	
				header ("Location:$redir?error_login=3");
				exit;
		
			}
		}
	else
	{

		header ("Location:$redir?error_login=2");
		exit;
	}
}
	
else
{
		header ("Location:$redir?error_login=1");
		exit;
}		
	
?>