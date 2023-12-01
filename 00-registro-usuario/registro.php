<?php

# ============================================================================================================
# =           NOTA: cada texto dentro de #, /* */ o // es un comentario, no será procesado por PHP           =
# ============================================================================================================

/*----------  Primero extraemos los datos en variables para mayor comodidad  ----------*/
/* cada texto dentro de [ ] corresponde con un name="" de un <input /> del
index.php, por ejemplo: */
$nombre   = $_POST['nombre'];   # <- <input name="nombre" />
$correo   = $_POST['correo'];   # <- <input name="correo" />
$clave    = $_POST['clave'];    # ...
$telefono = $_POST['telefono']; # ...
$idRol    = $_POST['id_rol'];   # <- <select name="id_rol">

/*----------  Incluimos el archivo con la función bd() que nos dará el objeto PDO de la conexión  ----------*/
require __DIR__ . '/../conexion.php';

/*----------  Definimos la sentencia SQL para insertar un usuario  ----------*/
$sql = "INSERT INTO usuarios (nombre, correo, clave, telefono, id_rol)
VALUES ('$nombre', '$correo', '$clave', '$telefono', $idRol)";

/*----------  Intenta insertar un usuario  ----------*/
try {
  # ejecuta la consulta de insertar y si no hay error, muestra un mensaje al usuario
  bd()->query($sql);
  exit(<<<HTML
  Usuario registrado exitósamente <a href="../">Volver</a>
  HTML);
} catch (PDOException $error) { # <- captura cualquier error que pudo ocurrir en el try {}
  # busca si el error es por duplicidad de información
  $estaDuplicado = (
    strpos($error->getMessage(), 'UNIQUE') !== false
    || strpos($error->getMessage(), 'Duplicate') !== false
  );

  # si es por duplicidad, informa al usuario
  if ($estaDuplicado) {
    exit(<<<HTML
    Ya existe un usuario con el correo $correo
    <a href="./">Intentar de nuevo</a>
    HTML);
  }

  # si no es por duplicidad, muestro el motivo del error
  exit($error->getMessage());
}
