<?php
  # reabrimos cualquier sesión iniciada anteriormente
  session_start()

  # tendremos acceso a los datos de $_SESSION
  /* NOTA: <?php echo "" ?> y <?= "" ?> son equivalentes */
  # echo es un constructor del lenguaje que imprime en stdout cualquier string
?>

<h1>BIENVENIDO <?= $_SESSION['nombre'] ?>!</h1>
<a href="../02-cerrar-sesion">Cerrar sesión</a>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.min.css">
