<?php


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
	$estado='Activo';
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

	mysql_query($consulta);

			$resultado= consulta_bd("SELECT max(cod_persona) as p FROM persona" );
			$a=sacar_registro_bd($resultado);
			$cp=$a['p']+1;

			$resultado2= consulta_bd("SELECT cod_rol as p FROM rol where nombre_rol='Vendedor'" );
			$a=sacar_registro_bd($resultado);
			$cr=$a['p']+1;


	$consulta2="insert into persona values('$cp', '$nc', '$cr','$nombre','$apellido_paterno','$apellido_materno', $ci, $telefono,'$direccion', '$email', '$observaciones');";
//    echo $consulta2;


	mysql_query($consulta2);
	
	//copy($image, $new) or die("Unable to copy $old to $new.");



?>

<html>
<link href="hoja_de_estilo.css" rel="stylesheet" type="text/css" />
<body background="body2.jpg">

<div align="center" class="titulo_it2">EL VENDEDOR FUE REGISTRADO CORRECTAMENTE:

  <br>
  <br>
  
  </div>

  <table width="50%" border="0" align="center">
	<tr>
      
    <td align="center"><p align="center"><a href="registrar_vendedor.php">REGISTRAR OTRO VENDEDOR</a></p> </td>

</tr>
	<tr>
      

    <td align="center"><p align="center"><a href="principal_target.php">TERMINAR REGISTRO DE VENDEDORES</a></p> </td>
	</tr>

</div>

</body>
</html>


