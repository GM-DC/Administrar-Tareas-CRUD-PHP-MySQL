<?php
include("Conexion.php");

    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        //Sentencia SQL
        $sql="SELECT * FROM tareas WHERE id = $id";

        //Prepara la sentencia SQL
        $sql = $conexion -> prepare($sql);

        //Ejecuta la sentencia sql
        $sql -> execute();

        $resultado = $sql -> fetchAll(PDO::FETCH_OBJ);

        foreach ($resultado as $cabezera) {
            $titulo = $cabezera -> titulo;
            $descripcion = $cabezera -> descripcion;
        }
    }

    if (isset($_POST["actualizar"])) {
        $id = $_GET["id"];
        $titulo = $_POST["titulo"];
        $descripcion = $_POST["description"];

        //Sentencia SQL
        $sql="UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";

        //Prepara la sentencia SQL
        $sql = $conexion -> prepare($sql);

        //Ejecuta la sentencia sql
        $sql -> execute();

        header("Location: index.php");
    }



?>
<?php include("include/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET["id"]?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Update Title">
                    </div>
                    <div>
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"> <?php echo $descripcion; ?> </textarea>
                    </div>
                    <button class="btn btn-susccess" name ="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

<?php include("include/footer.php"); ?>