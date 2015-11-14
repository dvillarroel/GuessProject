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
	$estado=$_POST['1'];
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$pwd2=$_POST['pwd2'];
	
	require_once("manejomysql.php");
	conectar_bd();
	$resultado= consulta_bd("SELECT max(cod_usuario) as p FROM usuario" );
	$a=sacar_registro_bd($resultado);
	$nc=$a['p']+1;
	$codigo_vendedor=$_GET['id_persona'];
	$codigo_user=$_GET['id_user'];


	$consulta="UPDATE `motos`.`usuario` SET `login`='$username', `pass`='$pwd', `ESTADO`='$estado' WHERE `COD_USUARIO`='$codigo_user'";
		
	
//	echo $consulta;

	mysql_query($consulta);

	$consulta2="UPDATE `motos`.`persona` SET `NOMBRE`='$nombre',`APELLIDOP`='$apellido_paterno',`APELLIDOM`='$apellido_materno',`CI`=$ci,`TELEFONO`=$telefono,`DIRECCION`='$direccion',`EMAIL`='$email',`DESCRIPCION`='$observaciones' WHERE `COD_PERSONA`='$codigo_vendedor'";
	
  //  echo $consulta2;


	mysql_query($consulta2);
	
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

<div align="center" class="titulo_it2">LOS DATOS DEL VENDEDOR FUERON ACTUALIZADOS:

  <br>
  <br>
  
  </div>

<p align="center"><a href="administrar_vendedores.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';

</div>

</body>
</html>


