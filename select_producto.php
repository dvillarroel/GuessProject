<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="jquery-ui.css" rel="stylesheet">
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
<body background="body2.jpg">
<p>&nbsp;</p>

<?php
	$cliente=$_GET['id_cliente'];
	$pedido=$_GET['id_pedido'];
	
	echo'<form method="post" action="buscar_cli_pedido.php?id_cliente='.$cliente.'&id_pedido='.$pedido.'">';
	
?>

  <br>
   <div align="center"><font color="#330000" size="4" class="titl">BUSCAR PRODUCTO</font><br>
   
  </div>


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

<?php
	echo'<p align="center"><font color="green"><a href=buscar_cli_pedidoAll.php?id_cliente='.$cliente.'&id_pedido='.$pedido.'">TODOS LOS PRODUCTOS </a></font></p>';
	
?>

<p>&nbsp;</p>
<p align="center">
<?php echo "<a href=buscar_cliente_pedido2.php?menu1=1&buscar=".$cliente." >VOLVER ATRAS</a></p>"; ?>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
<p>&nbsp;</p>

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
</script>

</body>
</html>
