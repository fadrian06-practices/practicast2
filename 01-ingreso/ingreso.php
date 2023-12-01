<?php

/*----------  Extraemos los datos  ----------*/
$correo = $_POST['correo'];
$clave = $_POST['clave'];

/*----------  Incluimos la función bd() para la conexión  ----------*/
require __DIR__ . '/../conexion.php';

/*----------  Definimos la sentencia SQL de búsqueda  ----------*/
$sql = "SELECT id, nombre, correo, clave, telefono, id_rol FROM usuarios
WHERE correo='$correo' AND clave='$clave'";

/*----------  Ejecutamos la consulta SQL y obtenemos el usuario como un array  ----------*/
$usuario = bd()->query($sql)->fetch();

# si el usuario no fue encontrado
if ($usuario === false) {
	exit('Correo o contraseña incorrecta');
}

# si el usuario fue encontrado, creamos una sesión
session_start();

# guardamos en sesión los datos del usuario
$_SESSION = $usuario;

# enviamos una cabecera de redirección de url al navegador
header('Location: inicio.php');
