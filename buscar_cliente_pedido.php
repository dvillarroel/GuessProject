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

<p>&nbsp;</p>

<form method="post" action="buscar_cliente2aa.php">
  <div align="center"><font color="#330000" size="4" class="titl">REALIZAR PEDIDO :</font><br>
   
  </div>
  <table width="35%" border="1" align="center">
  <tr> 
    <td height="34" colspan="2"><div align="center">BUSCAR CLIENTE</div></td>
  </tr>
  <tr> 
    <td height="44"><select id="select2" name="menu1" class="Seleccion" onChange="updateAutocomplete2()" >
        <option>CI o NIT</option>
	    <option>Nombre del cliente</option>
		<option selected>Apellido del Cliente</option>
      </select></td>
    <td><input id="autocomplete2" type="text" name="buscar" class="Formulario"></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center">
        <input name="image"  type="image" onMouseOver= src="images/bu1.gif" onMouseMove= src="images/bu1.gif" onMouseOut=src="images/bu2.gif" value="" SRC="images/bu2.gif" align="middle">
      </div></td>
  </tr>
</table>
</form>
<p align="center"><a href="registrar_cliente.php">Registrar Nuevo Cliente</a></p>
<p>&nbsp;</p><p>&nbsp;</p>
<p align="center"><a href="administrar_pedidos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
<p>&nbsp;</p>
</body>
</html>
<script src="mysqlwslib.js"></script>
<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.js"></script>

<script>

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
	if($_GET['error'] == 4)
	{
		$respuesta='CODIGO DE EQUIPO INCORRECTO';
	}
		
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
    		<td><font color="#003366">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}
?>
