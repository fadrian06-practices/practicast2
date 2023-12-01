CREATE TABLE roles (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nombre VARCHAR(20) NOT NULL UNIQUE,
);

CREATE TABLE usuarios (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  nombre VARCHAR(20) NOT NULL,
  correo VARCHAR(50) NOT NULL UNIQUE,
  clave TEXT NOT NULL,
  telefono VARCHAR(11) UNIQUE,
  id_rol INTEGER NOT NULL,
  FOREIGN KEY(id_rol) REFERENCES roles(id)
);

INSERT INTO roles (nombre) VALUES ('Administrador');
INSERT INTO roles (nombre) VALUES ('Visitante');
INSERT INTO roles (nombre) VALUES ('Director');
INSERT INTO roles (nombre) VALUES ('Secretario');
INSERT INTO roles (nombre) VALUES ('Estudiante');
