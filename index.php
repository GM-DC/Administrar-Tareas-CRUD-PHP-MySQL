<?php include("Conexion.php") ?>

<?php include("include/header.php")?>
    <?php include("include/nav.php") ?>

<!-- CUERPO -->
<div class="container p-4">
    <div class="row">

        <div class="col-md-4">
            <div class="card card-body">
                <form action="guardar.php" method="POST"> 
                    <div class="form-group">
                        <input type="text" name="txt_titulo" class="form-control" placeholder="Titulo" autofocus>
                    </div>
                    <div>
                        <textarea name="txt_descripcion" rows="2" class="form-control" placeholder="Descripcion" autofocus></textarea>
                    </div>
                    <input type="submit" value="Guardar" class="btn btn-success btn-block" name="btn_guardar">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>FECHA</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Sentencia SQL
                        $sql="SELECT * FROM tareas";

                        //Prepara la sentencia SQL
                        $sql = $conexion -> prepare($sql);

                        //Ejecuta la sentencia sql
                        $sql -> execute();

                        //fetchAll- Devuelve un conjunto que contiene todas las filas del conjunto de resultados
                        //PDO::FETCH_OBJ.– El parámetro que devuelve los datos capturados como un objeto.
                        $resultado = $sql -> fetchAll(PDO::FETCH_OBJ);

                        //Usaremos el bucle para mostrar resultados
                        foreach ($resultado as $cabezera) { ?>
                            <tr>
                                <td> <?php echo $cabezera -> id ?> </td>
                                <td> <?php echo $cabezera -> titulo ?> </td>
                                <td> <?php echo $cabezera -> descripcion ?> </td>
                                <td> <?php echo $cabezera -> fecha ?> </td>
                                <td>  
                                    <a href="edit.php?id=<?php echo $cabezera -> id?>" class="btn_edit">Editar</a>
                                    <a href="eliminar.php?id=<?php echo $cabezera -> id?>" class="btn_eliminar">Eliminar</a>
                                </td>
                            </tr>

                            <?php
                        }
                    ?>

                    

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("include/footer.php")?>


