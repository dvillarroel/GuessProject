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
                    <h1 class="text-light">Buscar Clientes o Productos<span class="mif-search place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<form method="post" action="buscar_cliente2a.php">
						<table width="35%" border="1" align="center">
						  <tr> 
							<td height="34" colspan="2"><div align="center">BUSCAR PRODUCTO</div></td>
						  </tr>
						  <tr> 
							<td height="44"><select id="select1" name="menu1" class="Seleccion" OnChange="updateAutocomplete()">
								<option>Codigo de producto</option>
								<option selected>Nombre de Producto</option>
								<option>Marca</option>
								<option>Industria</option>
								<option>Observaciones</option>
							  </select></td>
							<td><input id="autocomplete" type="text" name="buscar" class="Formulario" title="Ingrese el criterio de busqueda">
							</td>
						  </tr>
						  <tr> 
							<td colspan="2"><div align="center">
								<input name="image"  type="image" onMouseOver= src="images/bu1.gif" onMouseMove= src="images/bu1.gif" onMouseOut=src="images/bu2.gif" value="" SRC="images/bu2.gif" align="middle">
							  </div></td>
						  </tr>
						</table>
						</form>
						<form method="post" action="buscar_cliente2aaa.php">
						<table width="35%" border="1" align="center">
						  <tr>
							<td height="34" colspan="2"><div align="center">BUSCAR CLIENTE</div></td>
						  </tr>
						  <tr>
							<td height="44"><select id="select2" name="menu2" class="Seleccion" OnChange="updateAutocomplete2()">
								<option>CI o NIT</option>
								<option>Nombre del cliente</option>
								<option selected>Apellido del Cliente</option>
							</select></td>
							<td><input id="autocomplete2" type="text" name="buscar2" class="Formulario"></td>
						  </tr>
						  <tr>
							<td colspan="2"><div align="center">
							  <input name="image2"  type="image" onMouseOver= src="images/bu1.gif" onMouseMove= src="images/bu1.gif" onMouseOut=src="images/bu2.gif" value="" SRC="images/bu2.gif" align="middle">
							</div></td>
						  </tr>
						</table>
						</form>

				</div>
			</div>
		</div>
	</div>




<script src="mysqlwslib.js"></script>
<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.js"></script>

<script>

var availableTags = [];
function updateAutocomplete()
{
availableTags = [];
var e = document.getElementById("select1");
var strUser = e.options[e.selectedIndex].value;
console.log(strUser);

if( strUser == "Codigo de producto")
{
	var arrayResult = mysql_select_query ("select codigo_producto from producto order by codigo_producto");
}
if( strUser == "Nombre de Producto")
{
	var arrayResult = mysql_select_query ("select nombre_producto from producto order by nombre_producto");
}
if( strUser == "Marca")
{
	var arrayResult = mysql_select_query ("select marca from producto order by marca");
}
if( strUser == "Industria")
{
	var arrayResult = mysql_select_query ("select industria from producto order by industria");
}
if( strUser == "Observaciones")
{
	console.log("ingreso");
	var arrayResult = mysql_select_query ("select industria from producto order by industria");
}
console.log(arrayResult);
for (i=0; i< arrayResult.length; i++) {
    availableTags.push(arrayResult[i][0]);
}
console.log(availableTags);
$( "#autocomplete" ).autocomplete({
	source: availableTags
});
 
}

updateAutocomplete();
$( "#autocomplete" ).autocomplete({
	source: availableTags
});




var availableTags2 = [];


function updateAutocomplete2()
{
availableTags2 = [];
var e = document.getElementById("select2");
var strUser = e.options[e.selectedIndex].value;
console.log(strUser);

if( strUser == "CI o NIT")
{
	var arrayResult = mysql_select_query ("select ci_cliente from cliente order by ci_cliente");
}
if( strUser == "Nombre del cliente")
{
	var arrayResult = mysql_select_query ("select nombre_cliente from cliente order by nombre_cliente");
}
if( strUser == "Apellido del Cliente")
{
	var arrayResult = mysql_select_query ("select apellido_paterno from cliente order by apellido_paterno");
}
console.log(arrayResult);
for (i=0; i< arrayResult.length; i++) {
    availableTags2.push(arrayResult[i][0]);
}
console.log(availableTags2);
$( "#autocomplete2" ).autocomplete({
	source: availableTags2
});
 
}
updateAutocomplete2();
console.log(availableTags2);
$( "#autocomplete2" ).autocomplete({
	source: availableTags2
});


</script>

<?php
 if( !empty($_GET['error']) )
{
	
	
	if($_GET['error'] == 1)
	{
		$respuesta='TIENE QUE INGRESAR LA INFORMACION DEL CLIENTE';
	}
	
	if($_GET['error'] == 2)
	{
		$respuesta='CODIGO DE USUARIO INCORRECTO';
	}
	
	if($_GET['error'] == 3)
	{
		$respuesta='CARNET DE IDENTIDAD INCORRECTO';
	}
		if($_GET['error'] == 5)
	{
		$respuesta='LA BUSQUEDA NO GENERO NINGUN RESULTADO';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}
?>
</body>
</html>
