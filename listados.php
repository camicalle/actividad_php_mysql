<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        die(header("location: index.html"));
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- JavaScript Fontawesome-->
    <script src="https://kit.fontawesome.com/1b0d4fcd0a.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>
<body>
    <div class="shadow m-5 p-4 row">
        <h2 class="text-center fw-bold mb-3">Listado</h2>
        <div class="d-flex justify-content-start">
            <div class="col-md-5">
                <form action="#" method="post">
                    <label for="inputState" class="form-label fw-bold">Seleccione el colegio</label>
                    <div class="d-flex gap-2">
                        <select name="colegio" class="form-select">
                        <?php
                                include("db.php");
                                $sqlcol = "SELECT idcol, cnom FROM colegios;";
                                $resultadocol = $conexion->query($sqlcol);
                                while ($lista = $resultadocol->fetch_assoc()) :
                            ?>
                                <option value="<?php echo $lista['cnom']; ?>"><?php echo $lista['cnom']; ?></option>                    
                            <?php
                                endwhile;
                                $conexion->close();
                            ?>
                        </select>
                        <div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>            
        </div>
        <div class="col-md-12 mt-3">
        <?php
            if (isset($_POST['colegio'])) :
        ?>
            <table class="table table-hover table table-bordered shadow text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Estudiante</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo electronico</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($_POST['colegio'])) {
                            include("db.php");
                            $nomcol = $_POST['colegio'];
                            $i=1;
                            $sqlest = "SELECT idest, eidcol, enom, epal, edir, ecel, email FROM estudiantes INNER JOIN colegios ON eidcol=colegios.idcol WHERE colegios.cnom = '$nomcol';";
                            $respuestaest = $conexion->query($sqlest);
                            while ($lista = $respuestaest->fetch_assoc()) {
                                echo "<tr>
                                        <td>".$i++."</td>
                                        <td>".$lista['idest']."</td>
                                        <td>".$lista['enom']." ".$lista['epal']."</td>
                                        <td>".$lista['edir']."</td>
                                        <td>".$lista['ecel']."</td>
                                        <td>".$lista['email']."</td>
                                    </tr>";
                            }
                            $conexion->close();
                        }
                    ?>                    
                </tbody>
            </table>
        <?php                
            endif;
        ?>
        </div>
        <div class="d-flex justify-content-end">
            <?php
                if (isset($_POST['colegio'])) :
                    include("db.php");
                    $nomcol = $_POST['colegio'];
                    $sqlest = "SELECT idest, eidcol, enom, epal, edir, ecel, email FROM estudiantes INNER JOIN colegios ON eidcol=colegios.idcol WHERE colegios.cnom = '$nomcol';";
                    $respuestaest = $conexion->query($sqlest);
                    $cant = $respuestaest->num_rows;
                    if ($cant > 0 ) :
            ?>
                <form action="reporte.php" method="POST">
                    <input type="hidden" name="estcol" value="<?= $nomcol ?>">
                    <button class="btn btn-danger fw-bold">
                        <i class="fas fa-file-pdf"></i> Pdf
                    </button>
                </form>
            <?php
                    endif;
                    $conexion->close();
                endif;
            ?>
        </div>
    <div>    
</body>
</html>