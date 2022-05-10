<?php
include("Conexion.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Sentencia SQL
    $sql = "DELETE FROM tareas WHERE id=$id";
    //Prepara la Sentencia a script SQL
    $sql = $conexion -> prepare($sql);
    //Ejecuta el script SQL
    $sql -> execute();

    //Redirecciona a index
    header("Location: index.php");
}
?>


