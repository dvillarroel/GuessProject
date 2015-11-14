<?php

require_once("manejopostgres.php");

//*****************************************************************************************
//				FUNCION QUE DEVOLVERA UN ARREGLO CON LOS ROLES QUE TIENE UN USUARIO
//*****************************************************************************************

function numRoles($cod)
{
	conectar_bd();
	$consulta = pg_exec("SELECT r.id_rol, r.cargo FROM rol r, rol_usuario ru WHERE ru.id_usuario='$cod' AND ru.id_rol=r.id_rol;");
	return $consulta;
}

function categorias_tareas($cod)
{
	conectar_bd();
	$consulta = pg_exec("SELECT r.nombre_categoria FROM rol r, rol_usuario ru WHERE ru.id_usuario='$cod' AND ru.id_rol=r.id_rol;");
	return $consulta;
}

function tareas($cod)
{
	conectar_bd();
	$consulta = pg_exec("SELECT r.nombre_tarea, ru.nombre_categoria FROM tarea r, categoria_tarea ru, privilegio p WHERE p.id_usuario='$cod' AND p.id_tarea=r.id_tarea AND r.id_categoria_tarea=ru.id_categoria_tarea;");
	return $consulta;
}


?>