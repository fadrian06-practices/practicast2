<?php

# iniciamos una sesión o reabrimos la anterior
session_start();

# destruimos la sesión
session_destroy();

# enviamos algún mensaje al usuario o le redigirimos automáticamente
exit(<<<HTML
Sesión destruida exitósamente,
<a href="../">Volver al inicio</a>
HTML);
