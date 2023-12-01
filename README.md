# Practicas T2

- [Requisitos](#requisitos)
- [Registro de usuario](#registro-de-usuario)
- [Inicio de sesión](#inicio-de-sesion)
- [Cierre de sesión](#cierre-de-sesion)
- [Dudas](#dudas)
- [Problemas técnicos](#problemas-tecnicos)
    - [Habilitar PDO SQLite](#habilitar-pdo-sqlite)
    - [Habilitar PDO MySQL](#habilitar-pdo-mysql)

## Requisitos

- PHP
- Extensión de PHP (PDO_SQLite) [...ver como habilitar](#habilitar-pdo-sqlite)
- Extensión de PHP (PDO_MySQL) [...ver como habilitar](#habilitar-pdo-mysql)

## Registro de usuario

Registrar un usuario involucra:

1. Una tabla donde guardar los usuarios, por ejemplo:

```sql
CREATE TABLE usuarios (
  id INT,
  correo VARCHAR(50),
  clave TEXT
);
```

2. Un formulario para ingresar los datos de un usuario:

> _Nota:_ dicho formulario debería tener 2 atributos fundamentales,
un `action=""` que indica a qué URL se enviará el formulario y un
`method=""` que indica el método de envío (Recomendado: **POST**)

```html
<form action="/usuarios/registrar" method="post">
  Correo: <input type="email" name="correo" />
  Contraseña: <input type="password" name="clave" />
</form>
```

> **NOTA: cada `<input />` debe tener un `name=""` identificativo para
ese input, dicho `name` será necesario para recuperar la información
enviada por el formulario usando la superglobal de PHP
`$_GET` o `$_POST`**

> En el ejemplo anterior los `name` son `correo` y `clave`, por lo que para recuperarlos
con PHP se debe acceder de la siguiente manera `$_POST['correo']` y `$_POST['clave']`

3. Un controlador para registrar al usuario.

> _Ver el archivo_ `00-registro-usuario/registro.php` para descubrir cómo registrar un usuario.

---
## Inicio de sesion

Iniciar sesión involucra:

1. Una tabla con usuarios registrados

2. Un formulario para ingresar las credenciales:

```html
<form action="/ingresar" method="post">
  Correo: <input type="email" name="correo" />
  Contraseña: <input type="password" name="clave" />
</form>
```

3. Un controlador que verifique si existe un usuario con esas
credenciales y de ser correctas, iniciar una sesión.

> _Ver el archivo_ `01-ingreso/ingreso.php` para descubrir cómo realizar la verificación de credenciales.

---
## Cierre de sesion

Cerrar una sesión involucra:

1. Iniciar una sesión previamente _(opcional)_

2. Destruir cualquier sesión iniciada.

3. Enviar algún mensaje al usuario _(opcional)_, o redirigir a otra url _(requerido)_.

> _Ver el archivo_ `02-cerrar-sesion/index.php` para descubrir cómo realizar el cierre de sesión.

## Dudas

> Las dudas irán apareciendo en esta sección.

## Problemas Tecnicos

> Sección dedicada a resolver cualquier problema técnico que se presente.

> Esta lista irá creciendo con el tiempo.

### Habilitar PDO SQLite

<details>
  <summary>Con XAMPP</summary>
  <ul>
    <li>
      Primero ir al directorio donde se encuentre el <code>php.exe</code>
      (normalmente <code>C:/xampp/php/</code>)
    </li>
    <li>
      Abrir el <code>php.ini</code> con cualquier editor de texto y buscar por el texto
      <code>extension=pdo_sqlite</code>, esta normalmente es la linea 947
    </li>
    <li>Si <code>extension=pdo_sqlite</code> tiene un <code>;</code> al principio, quitarlo</li>
    <li>Guardar el archivo y reinicia el servidor Apache desde el panel de control de XAMPP</li>
    <li>Probar...</li>
  </ul>
</details>
<details>
  <summary>Con Laragon</summary>
  <ul>
    <li>Abrir el panel de control de Laragon</li>
    <li>
      Hacer click derecho en cualquier lugar del panel y buscar el menú
      <code>PHP > Extensiones > pdo_sqlite</code>
    </li>
    <li>Clickear para habilitarla</li>
    <li>Recargar el servidor Apache y probar...</li>
  </ul>
</details>
<details>
  <summary>Sólo con PHP, sin Apache</summary>
  <ul>
    <li>Primero ir al directorio donde se encuentre el <code>php.exe</code></li>
    <li>
      Si el archivo <code>php.ini</code> no existe, crearlo a partir de un clon del
      <code>php.ini-development</code>
    </li>
    <li>
      Abrir el <code>php.ini</code> con cualquier editor de texto y buscar por el texto
      <code>extension=pdo_sqlite</code>, esta normalmente es la linea 947
    </li>
    <li>Si <code>extension=pdo_sqlite</code> tiene un <code>;</code> al principio, quitarlo</li>
    <li>Guardar el archivo y probar...</li>
  </ul>
</details>

### Habilitar PDO MySQL

<details>
  <summary>Con XAMPP</summary>
  <ul>
    <li>
      Primero ir al directorio donde se encuentre el <code>php.exe</code>
      (normalmente <code>C:/xampp/php/</code>)
    </li>
    <li>
      Abrir el <code>php.ini</code> con cualquier editor de texto y buscar por el texto
      <code>extension=pdo_mysql</code>, esta normalmente es la linea 947
    </li>
    <li>Si <code>extension=pdo_mysql</code> tiene un <code>;</code> al principio, quitarlo</li>
    <li>Guardar el archivo y reinicia el servidor Apache y MySQL desde el panel de control de XAMPP</li>
    <li>Probar...</li>
  </ul>
</details>
<details>
  <summary>Con Laragon</summary>
  <ul>
    <li>Abrir el panel de control de Laragon</li>
    <li>
      Hacer click derecho en cualquier lugar del panel y buscar el menú
      <code>PHP > Extensiones > pdo_mysql</code>
    </li>
    <li>Clickear para habilitarla</li>
    <li>Recargar el servidor Apache y MySQL y probar...</li>
  </ul>
</details>
