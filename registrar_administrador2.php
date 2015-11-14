<?php

if(!empty($_POST['nombre']) && !empty($_POST['ci']) && !empty($_POST['apellido_paterno']) )
{

	require_once("manejomysql.php");
	conectar_bd();
	$nombre=$_POST['nombre'];
	$apellido_paterno=$_POST['apellido_paterno'];
	$apellido_materno=$_POST['apellido_materno'];
	$ci=$_POST['ci'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];
	$email=$_POST['email'];
	$observaciones=$_POST['observaciones'];
	$estado='activo';
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$pwd2=$_POST['pwd2'];
	
	//$estado='activo';

			require_once("manejomysql.php");
			conectar_bd();

			$resultado= consulta_bd("SELECT max(cod_usuario) as p FROM usuario" );
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;


	$consulta="insert into usuario values('$nc', '$username', '$pwd','$estado');";
//	echo $consulta;

	mysql_query($consulta) or die(header ("Location:registrar_producto.php?error_registro=2"));

			$resultado= consulta_bd("SELECT max(cod_persona) as p FROM persona" );
			$a=sacar_registro_bd($resultado);
			$cp=$a['p']+1;

			$resultado2= consulta_bd("SELECT cod_rol as p FROM rol where nombre_rol='Administrador'" );
			$a=sacar_registro_bd($resultado2);
			$cr=$a['p'];


	$consulta2="insert into persona values('$cp', '$nc', '$cr','$nombre','$apellido_paterno','$apellido_materno', $ci, $telefono,'$direccion', '$email', '$observaciones');";
  //  echo $consulta2;


	mysql_query($consulta2) or die(header ("Location:registrar_producto.php?error_registro=2"));
	
	//copy($image, $new) or die("Unable to copy $old to $new.");

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

<div align="center" class="titulo_it2">EL ADMINISTRADOR FUE REGISTRADO CORRECTAMENTE:

  <br>
  <br>
  
  </div>

  <table width="50%" border="0" align="center">
	<tr>
      
    <td align="center"><p align="center"><a href="registrar_administrador.php">REGISTRAR OTRO ADMINISTRADOR</a></p> </td>

</tr>
	<tr>
      

    <td align="center"><p align="center"><a href="principal_target.php">TERMINAR REGISTRO DE ADMINISTRADORES DEL SISTEMA</a></p> </td>
	</tr>

</div>

</body>
</html>


