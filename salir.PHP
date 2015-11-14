<?php 
// Cargamos variables
$usuarios_sesion="conector";
$url='index.php';
$pag_referida=$url;
$redir=$pag_referida;



Header ("Location: $redir");
// le damos un mobre a la sesion (por si quisieramos identificarla)
// destruimos la session de usuarios.	
session_name($usuarios_sesion);
session_start();
session_unset();
session_destroy();
?>


