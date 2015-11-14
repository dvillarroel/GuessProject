<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
 
<br>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="panel-titulo2"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
    <td class="panel-titulo3" align="center">&nbsp;</td>
	<td class="panel-titulo3" width="100%" align="center"><font class="titulo_formulario">REGISTRAR 
      EQUIPO PROPIO DEL CLIENTE</font></td>
    <td class="panel-titulo"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="16"></td>
  </tr>
</table>
<?php 
$id_c=$_GET['id'];

  	require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(cod_equipo) as p FROM equipo" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			$cod_cliente=$_GET['id'];
			echo '<form action="registrar_equipo3.php?id='.$id_c.'" method="post">';
?>


<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
          <tr> 
            <td colspan="4"  class="title">INFORMACI&Oacute;N EQUIPO</td>
          </tr>
          <tr> 
            <td width="25%" class="campotablas">Codigo Equipo:</td>
            <td width="25%" class="campotablas"> <input type="text" name="codigo_cliente" maxlength="15" tabindex="5" class="Formulario" value=<?php echo $nc;?> >
      <a href="ver_codigo.php" target='_blank'><img src="cal.png" width="16" height="16" border="0" alt="Click para ver Codigos Disponibles"  ></a> 
    </td>
            <td width="25%" class="campotablas">Codigo Cliente:</td>
            <td width="25%" class="campotablas"><? echo $cod_cliente;?></td>
          </tr>
          <tr> 
            <td class="campotablas">Propiedad:</td>
            <td class="campotablas"> Equipo Propio del Cliente</td>
            <td class="campotablas">Tipo de Equipo:</td>
            <td class="campotablas">Equipo Completo de Agua</td>
          </tr>
        </table>



<br>
  


<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td width="32%" height="24"  class="title" >OBSERVACIONES</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" ></textarea> </td>
    </tr>
  </table>




  <br>

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center"><input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  
  <p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
