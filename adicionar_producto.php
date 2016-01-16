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

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>

 <SCRIPT>
	console.log("hola");
	
	function validarFormulario(stock)
	{
		var valor = document.getElementById("cantidadField").value;
		console.log(valor);
		console.log(stock);
		if( valor == null || valor.length == 0)
		{
			console.log("entro");
			window.alert("debe Ingresar un numero mayor a 0");
			return false;
		}

		console.log("second method");
		if( valor > parseInt(stock))
		{
			console.log("entro valor");

			alert("La cantidad no puede ser mayor del stock existente");
			return false;
		}
		else
		{
			var i=0;
			while (i<tel.length)
			{	
				if ((tel.charAt(i)>='0') && (tel.charAt(i)<='9'))
				i=i+1;
				else
				{
					alert("La cantidad debe ser numeral");
					return false;
				}
			}
			
		}


		
	 }
</script>
               <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Adicionar Producto</span></h1>
                    <hr class="thin bg-grayLighter">


 <?PHP
 
 	$tipo=urldecode($_GET['buscar']);
	$id_cliente=$_GET['id_cliente'];
	$id_pedido=$_GET['id_pedido'];
	
	require_once("manejomysql.php");
	conectar_bd();
	$consulta="SELECT codigo_producto, nombre_producto, precio_unitario_prod, stock, marca, industria, stock_minimo, observaciones_producto, imagen1, preferencial, regular, irregular from producto where codigo_producto='$tipo'";
	//echo $consulta;
	$usuario_consulta = mysql_query($consulta);
	if (mysql_num_rows($usuario_consulta) != 0)
	{	
		$registro= sacar_registro_bd($usuario_consulta);

	
	}

	$valueCod = urlencode($registro["codigo_producto"]);
echo '<div><form action="adicionar_producto2.php?cod='.$valueCod.'&id_cliente='.$id_cliente.'&id_pedido='.$id_pedido.'" method="post" name="ventas" onSubmit="return validarFormulario('.$registro['stock'].');">';

echo '<br><table width="80%" align="center">
            <tr> 
              <td colspan="4" align="center" >INFORMACI&Oacute;N PRODUCTO</td>
            </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Producto:</td>
              <td width="25%" class="campotablas">'.$registro['codigo_producto'].'</td>
              <td width="25%" class="campotablas">Nombre Producto:</td>
              <td width="25%" class="campotablas">'.$registro['nombre_producto'].'</td>
            </tr>
            <tr> 
              <td class="campotablas">Marca:</td>
              <td class="campotablas">'.$registro['marca'].'</td>
              <td class="campotablas">Industria:</td>
              <td class="campotablas">'.$registro['industria'].'</td>
            </tr>
                        <tr> 
              <td class="campotablas">Precio Unitario:</td>
              <td class="campotablas">'.$registro['precio_unitario_prod'].'</td>
              <td class="campotablas">Stock en Almacen:</td>
              <td class="campotablas">'.$registro['stock'].'</td>
                        </tr>
            <tr> 
              <td height="27"class="campotablas"> Stock Minimo del Producto:</td>
              <td class="campotablas">'.$registro['stock_minimo'].'</td>
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
			<tr> 
              <td height="27"class="campotablas">Ingresar Cantidad de productos:</td>
              <td class="campotablas"><input id="cantidadField" type="text" name="cantidad" maxlength="20" tabindex="2" class="Formulario" value="0"> </td>
              <td class="campotablas">&nbsp;</td>
              <td class="campotablas">&nbsp;</td>
            </tr>
			
        </table>
	
<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>

<br>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
              <td width="32%" height="24"  class="title" >DESCRIPCION DEL PRODUCTO</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" >'.$registro['observaciones_producto'].'</textarea> </td>
    </tr>
  </table>



<table width="42%" align="center" cellpadding="0" cellspacing="0">
<tr>
<td class="border-bleft" width="18"></td>
<td class="border-bmain"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"><img src="Img_prod/'.$registro['imagen1'].'" width="400" height="300"></td>
<td class="border-bright"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</table>
</div>
  <br>

 </body>
  

';

?>
  
  		</div>
			</div>
		</div>
	</div>
</html>
