<?php

if(!empty($_POST['codigo_cliente']) && !empty($_POST['ci']) && !empty($_POST['apellido_paterno']) )
{

	require_once("manejomysql.php");
	conectar_bd();
	$codigo_producto=$_POST['codigo_cliente'];
	$name=$_POST['ci'];
	$nchino=$_POST['nchino'];
	$ningles=$_POST['ningles'];
	$precio=$_POST['apellido_paterno'];
	$stock=$_POST['stock'];
	$marca=$_POST['marca'];
	$industria=$_POST['industria'];
	$stock_minimo=$_POST['stock_min'];
	$unidad=$_POST['Unidad'];
	$observaciones=$_POST['observaciones'];
	$estado='activo';
	$imagen=$name.".jpg";
	$Precio_pref=$_POST['Precio_Pref'];
	$Precio_Reg=$_POST['Precio_Regular'];
	$Precio_Irreg=$_POST['Precio_Irregular'];
	
	//$estado='activo';

	$consulta="insert into producto values('$codigo_producto', '$name', '$nchino','$ningles', $precio,$stock,'$marca','$industria',$stock_minimo, '$unidad','$observaciones', '$estado','$imagen', null, null, null, null,$Precio_pref,$Precio_Reg,$Precio_Irreg);";
	//echo $consulta;
	mysql_query($consulta) or die(header ("Location:registrar_producto.php?error_registro=2"));
	
	//copy($image, $new) or die("Unable to copy $old to $new.");
	move_uploaded_file($_FILES["uploadField"]["tmp_name"], "Img_prod/" . $name.".jpg");

}

else
{
	header ("Location:registrar_producto.php?error_registro=1");
	exit;

}


?>

<html>
<link href="hoja_de_estilo.css" rel="stylesheet" type="text/css" />
<body background="body2.jpg">

<div align="center" class="titulo_it2">EL PRODUCTO SE REGISTRO CORRECTAMENTE:

  <br>
  <br>
  
  </div>

  <table width="50%" border="0" align="center">
	<tr>
      
    <td align="center"><p align="center"><a href="registrar_producto.php">REGISTRAR OTRO PRODUCTO</a></p> </td>

</tr>
	<tr>
      

    <td align="center"><p align="center"><a href="principal_target.php">TERMINAR REGISTRO DE PRODUCTOS</a></p> </td>
	</tr>

</div>

</body>
</html>


