<?php
  # incluimos la función bd() y buscamos todos los roles disponibles
  require __DIR__ . '/../conexion.php';
  $roles = bd()->query('SELECT * FROM roles')->fetchAll();

  # ==============================================================
  # =           Ignorar el código HTML fuera de <form>           =
  # ==============================================================
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Practicas - Registro de usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
    <style>
      select {
        -moz-appearance: unset;
        appearance: unset;
      }

      input, select {
        width: 100%;
        max-width: 300px;
        box-sizing: border-box;
      }
    </style>
  </head>
  <body>
    <!--============================================
    =            FORMULARIO DE REGISTRO            =
    =============================================-->
    <form method="post" action="registro.php">
      <h1>Registro de usuario <a href="../">Volver</a></h1>
      <input name="nombre" placeholder="Introduce tu nombre" />
      <input name="correo" placeholder="Introduce tu correo" />
      <input name="clave" placeholder="Crea una contraseña" />
      <input name="telefono" placeholder="Introduce tu teléfono (opcional)" />
      <select name="id_rol">
        <!-- Imprimimos un <option> por cada rol -->
        <?php foreach ($roles as $rol) echo <<<HTML
          <option value="{$rol['id']}">
            {$rol['nombre']}
          </option>
        HTML ?>
      </select>
      <!-- Debido a que soy el primer <button> dentro de <form>, seré el botón de envío -->
      <button>Registrar</button>
    </form>
  </body>
</html>
