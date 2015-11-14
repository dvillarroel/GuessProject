<?php

	$cod_pedido=$_GET['id_pedido'];
	$name=$_POST['cargo'];
	require_once("manejomysql.php");
	conectar_bd();

	mysql_query("UPDATE pedido set estado='Ejecutado' where cod_pedido=".$cod_pedido );

	mysql_query("insert into ped_emp values($cod_pedido, '$name');");
	
	$resultado7=consulta_bd("SELECT monto_total from PEDIDO where cod_pedido=".$cod_pedido);
	$registro7= sacar_registro_bd($resultado7);
	$monto_pedido=$registro7['monto_total'];

	

?> 
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<form action="registro_pedido_monto.php?id_pedido=<? echo $cod_pedido; ?>&monto=<? echo $monto_pedido?>" method="post">
<div align="center">
  <p>&nbsp;</p>
  <p><font color="#660000" face="Verdana, Arial, Helvetica, sans-serif">LA ENTREGA 
    DEL PEDIDO FUE REGISTRADO CORRECTAMENTE</font></p>


  <table width="27%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td colspan="2" class="title"><div align="center"><font color="#000033">REGISTRAR 
          MONTO DE CANCELACION</font></div></td>
    </tr>
    <tr> 
      <td width="48%" class="campotablas">Monto Total del Pedido:</td>
      <td width="52%" class="campotablas">&nbsp;<? echo $monto_pedido; ?></td>
    </tr>
    <tr> 
      <td class="campotablas">Monto de Cancelaci</td>
      <td class="campotablas"><input type="text" name="correo_electronico2" id="correo_electronico2" maxlength="20" tabindex="8" class="Formulario" value=<? echo $monto_pedido?>  /></td>
    </tr>
    <tr> 
      <td colspan="2" class="campotablas"><div align="center"> 
          <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif">
        </div></td>
    </tr>
  </table>
  
  <p>&nbsp; </p>
</div>

</form>
<table width="60%" border="0" align="center" >
    <tr>
       <td align="center"><p align="center">&nbsp;</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p> </td> </form>
    </tr>
  </table>
  
  
  
  
  
  
 
 
 
 
  
  



