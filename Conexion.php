<?php
/* Conectar a una base de datos de MySQL invocando al controlador */
$usuario = "root";
$contraseña = "";
$BaseDato = "db_tareas";
$dsn = "mysql:dbname=$BaseDato;host=127.0.0.1";

try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
    echo 'Conectado';
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>