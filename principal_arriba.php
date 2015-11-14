<? 
  // No almacenar en el cache del navegador esta página.
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             		// Expira en fecha pasada
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");		// Siempre página modificada
		header("Cache-Control: no-cache, must-revalidate");           		// HTTP/1.1
		header("Pragma: no-cache");                                   		// HTTP/1.0 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body background="body2.jpg" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0" onLoad="goforit();">

<div id="Layer1" style="position:absolute; left:33px; top:1px; width:171px; height:98px; z-index:1"></div>
<div id="Layer2" align="center"></div>
<SCRIPT language=JavaScript src="hora.js"></SCRIPT>


<table border="0" cellpadding="0" cellspacing="0"   width="100%">
 <tbody>
 <tr>     
      <td  width="23%" height="20" >&nbsp;</td>
	  <td  width="23%" height="20" >&nbsp;</td>
	  <td  width="30%" height="20">&nbsp;</td>
	  <td  width="24%" height="20" background="men.gif" align="center"><SPAN 
            id=clock></SPAN></td>
  </tr>
  <tr>     
  <td   colspan="4" height="19" background="3c.gif">&nbsp;</td>
  </tr>
  </tbody>
</table>

</body>
</html>
