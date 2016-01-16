<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="jquery-ui.css" rel="stylesheet">
	<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='docs/favicon.ico' />
    <link href="docs/css/metro.css" rel="stylesheet">
    <link href="docs/css/metro-icons.css" rel="stylesheet">
    <link href="docs/css/metro-responsive.css" rel="stylesheet">

    <script src="docs/js/jquery-2.1.3.min.js"></script>
    <script src="docs/js/jquery.dataTables.min.js"></script>

    <script src="docs/js/metro.js"></script>

    <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>

    <script>
        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
    </script>
	<style>
	body{
		font: 62.5% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	select {
		width: 200px;
	}
	</style>


</head>
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">

			<div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Modificar Cliente<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
<?php 
echo '<form action="modificar_cliente2.php?id='.$var=$_GET["id"].'" method="post">';
?>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      <td ></td>
<td>

<table align="center">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
            <td width="25%" class="campotablas">
			<?php 
			require_once("manejomysql.php");
			conectar_bd();
			$var=$_GET['id'];
			
			$usuario_consulta = mysql_query("SELECT codigo_cliente, ci_cliente, nombre_cliente, apellido_paterno, apellido_materno, direccion_cliente, telefono_cliente, e_mail, fecha_sus, observaciones_cliente FROM cliente WHERE codigo_cliente=$var;" ) or die(header ("Location:error.php"));

			$registro= sacar_registro_bd($usuario_consulta);
				
				$codigo_cliente=$registro['codigo_cliente'];
				$ci=$registro['ci_cliente'];
				$ap=$registro['apellido_paterno'];
				$am=$registro['apellido_materno'];
				$nombres=$registro['nombre_cliente'];
				$direccion=$registro['direccion_cliente'];
				$telefono=$registro['telefono_cliente'];
				$email=$registro['e_mail'];
				$fecha=$registro['fecha_sus'];
	
					$observaciones=$registro['observaciones_cliente'];
				//$observaciones=$registro['observaciones'];
	
				//<input type="text" name="direccion" maxlength="2555" tabindex="6" class="Formulario" value='.$direccion.'> 
		
			
			echo $codigo_cliente; 
           
		   echo ' </td>
              <td width="25%" class="campotablas">Nro. Carnet de Identidad:</td>
            <td width="25%" class="campotablas"><input type="text" name="ci" maxlength="7" tabindex="2" class="Formulario" value='.$ci.' autofocus> 
            </td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
            <td class="campotablas"><input type="text" name="apellido_paterno" maxlength="15" tabindex="3" class="Formulario" value='.$ap.'> 
            </td>
              <td class="campotablas">Apellido Materno:</td>
            <td class="campotablas"><input type="text" name="apellido_materno" maxlength="17" tabindex="4" class="Formulario" value='.$am.'> 
            </td>
          </tr>
		  
		  <tr> 
              <td height="27"class="campotablas"> Nombres:</td>
            <td class="campotablas"> <input type="text" name="nombres"  maxlength="25" tabindex="5" class="Formulario" value='.$nombres.'> 
            </td>
              <td class="campotablas">Direccion:</td>
            <td class="campotablas"><textarea name="direccion" class="interiorArea" style="WIDTH: 80%; HEIGHT: 20px" >'.$direccion.'</textarea> 


            </td>
          </tr>
          
          <tr> 
              <td class="campotablas">Telefono:</td>
            <td class="campotablas"><input type="text" name="telefono"  maxlength="45" tabindex="7" class="Formulario" value='.$telefono.'></td>
              <td class="campotablas">Correo Electronico:</td>
            <td class="campotablas"><input type="text" name="correo_electronico" maxlength="20" tabindex="14" class="Formulario" value='.$email.'></td>
          </tr>
		   <tr> 
              <td class="campotablas">Fecha de Registro:</td>
            <td class="campotablas">'.$fecha.'</td>
              <td class="campotablas"></td>
            <td class="campotablas"></td>
          </tr>
		  
          
         
		  
        </table>


</td>
</tr></tbody>
</table>

<br>

<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>

<center>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td width="32%" height="24"  class="title" >OBSERVACIONES</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" >'.$observaciones.'</textarea> </td>
    </tr>
  </table>



</td>
</tr></tbody>
</table>

  <br>

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/m2.gif" onMouseMove= src="images/m2.gif" onMouseOut=src="images/m1.gif" value="" SRC="images/m1.gif"> </td></form>
 <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  <p align="center"><a href="actualizar_cliente.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
  
  ';
  ?>
  
  
  <?php 
  if( !empty($_GET['error_registro']) )
{

	if($_GET['error_registro'] == 1)
	{
		$respuesta='TIENE QUE LLENAR TODOS LOS CAMPOS QUE SON NECESARIOS';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}

  
  
  ?>

				</div>
  			</div>
		</div>
	</div>
</html>