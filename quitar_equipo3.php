<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">SE QUITO EL EQUIPO AL CLIENTE CORRECTAMENTE</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<?php 
$id_c=$_GET['id_equipo'];

require_once("manejomysql.php");
	conectar_bd();

$consulta="delete from equipo where cod_equipo=".$id_c;

			$resultado2= consulta_bd("SELECT base_prestados, botellon_prestados FROM equipos_empresa where codigo_ee=1");
			
			$aa2=sacar_registro_bd($resultado2);


			$ss = $aa2['base_prestados'];
			$cc = $aa2['botellon_prestados'];
			$tb=$ss-1;
			$tbo=$cc-1;
	
			mysql_query("update equipos_empresa set BASE_PRESTADOS=$tb, BOTELLON_PRESTADOS=$tbo where CODIGO_EE=1");



//$consulta="update equipo set codigo_cliente=null, condicion_entrega=null, tipo_garantia=null, observaciones_equipo=null, propiedad_equipo='empresa' where cod_equipo=$id_c";

mysql_query($consulta);
echo '<br><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td  class="campotablas" >El codigo del Equipo estara disponible, cuando quiera asignarlo a otro cliente </td>
    </tr>
  </table>';




echo '<p align="center"><a href="administrar_equipos.php">VOLVER AL MENU DE ADMINISTRAR EQUIPOS</a></p>
  <p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>';
?>
  
