<?php

function sqlite(): PDO {
	$rutaBD = __DIR__  . '/practicas.db';
	return new PDO("sqlite:$rutaBD");
}

function mysql(): PDO {
	$dsn = 'mysql:host=localhost; dbname=practicas; charset=utf8';

	return new PDO($dsn, 'root', 'root', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
}

function bd(): PDO {
  try {
    mysql(); # <- test de conexíón
    return mysql();
  } catch (PDOException) {
    # mysql falló, probando sqlite
    try {
      sqlite(); # <- test de conexión
    } catch (PDOException) {
      exit('Servidor MySQL no está respondiendo o la extensión PDO_SQLite no está habilitada');
    }
  }
}
