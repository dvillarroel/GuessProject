<?php

// Libreria para conectarse, desconectarse y hacer consultas a una BD MySql
// vicholuis@cs.umss.edu.bo - 2004
// Datos de conexion a una BD Mysql

	$servidorBD = "127.0.0.1";
	$usuario = "dvuser";
	$clave = "Control123";
	$BD = "motos4";
    $enlace = 0;
// funcion de conexion a una BD MySql
function conectar_bd()
 {
   global $enlace;
   global $servidorBD;
   global $usuario;
   global $clave;
   global $BD;
$enlace= mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("motos4") or die(mysql_error());  

			//echo "nos conectamos

//$enlace = mysql_connect($servidorBD,$usuario,$clave)
  //      or die("Existio un error al intentar conectarse al servidor de base de datos");
  // mysql_select_db($BD, $enlace)
    //    or die("Existio un error al intentar seleccionar la base de datos");

 }

//     Esta funcion cierra la conexion con una BD

function consulta_bd( $sql )
 {
   global $enlace;

//   $res = pg_exec( $sql, $enlace )
    $res = mysql_query( $sql )   or die( "No se pudo realizar la consulta" );
   return $res;
 }

//     Esta funcion saca cuantos registros es el resultado de una consulta

function cuantos_registros_bd( $res )
 {
   $cuantos = mysql_num_rows($res);
   return $cuantos;
 }

//     Esta funcion saca un registro del resultado de una consulta

function sacar_registro_bd( $res )
 {
   $registro = mysql_fetch_array($res);
   return $registro;
 }


//     Esta funcion cierra la conexion con una BD

function desconectar_bd()
 {
   global $enlace;
   mysql_close($enlace); 
 }
?>