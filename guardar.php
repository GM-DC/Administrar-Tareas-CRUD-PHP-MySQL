<?php 

    include("Conexion.php");

    // NOMBRE DEL BOTON EN POST
    if (isset($_POST["btn_guardar"])) {  
        $titulo = $_POST["txt_titulo"];
        $descripcion = $_POST["txt_descripcion"];
        
        //Consulta SQL
        $sql ="INSERT INTO `tareas` (`id`, `titulo`, `descripcion`, `fecha`) VALUES (NULL, '$titulo', '$descripcion', current_timestamp()); ";
        
        //Prepara una sentencia para su ejecución y devuelve un objeto sentencia
        $sql = $conexion -> prepare($sql);
    
        //Usando la instrucción “execute” podemos ejecutar la consulta preparada previamente
        $sql -> execute();

        //Redirecciona al index
        header("Location: index.php");
    }

?>