<?php

	$cod_pedido=$_GET['id_pedido'];
	$monto_cobrar=$_GET['montoCobrar'];
	if(empty($_GET['montoPagado']))
	{
		$monto_pagado=0;
	}
	else
	{
		$monto_pagado=$_GET['montoPagado'];
	}
	$monto_total=$_GET['montoTotal'];
	

	require_once("manejomysql.php");
	conectar_bd();


?> 
<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">
<form action="lista_por_cobrar3.php?id_pedido=<? echo $cod_pedido; ?>&monto=<? echo $monto_total?>&montopagado=<? echo $monto_pagado?>" method="post">
  <div align="center"> 
    <p>&nbsp;</p>
  <table width="27%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td colspan="2" class="title"><div align="center"><font color="#000033">REGISTRAR 
            PAGO</font></div></td>
    </tr>
    <tr> 
      <td width="48%" class="campotablas">Monto Total del Pedido:</td>
      <td width="52%" class="campotablas">&nbsp;<? echo $monto_total; ?></td>
    </tr>
	  <tr> 
      <td width="48%" class="campotablas">Monto Pagado:</td>
        <td width="52%" class="campotablas">&nbsp;<? echo $monto_pagado; ?></td>
    </tr>
    <tr> 
      <td class="campotablas">Monto por Pagar</td>
      <td class="campotablas"><input type="text" name="correo_electronico2" id="correo_electronico2" maxlength="20" tabindex="8" class="Formulario" value=<? echo $monto_cobrar?>  /></td>
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
  
  
  
  
  
  
 
 
 
 
  
  



