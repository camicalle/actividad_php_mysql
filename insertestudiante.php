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
    
    <!-- JavaScript SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login | Censo Colegios</title>
</head>
<body>
    <?php
        include("db.php");

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $colegio = $_POST['colegio'];

        $sqlvalidar = "SELECT * FROM estudiantes WHERE idest = '$id';";
        $existe = $conexion->query($sqlvalidar);
        $cant = $existe->num_rows;

        if ($cant == 0) {
            $query = "INSERT INTO estudiantes(idest, eidcol, enom, epal, edir, ecel, email) VALUES ('$id','$colegio','$nombre','$apellidos','$direccion','$telefono','$email')";
            $respuesta = $conexion->query($query);
            if ($respuesta) {
                echo '<script>
                            swal({
                                icon: "success",
                                title: "Enhorabuena !!!",
                                text: "Estudiante registrado con exito",
                            }).then(function() {
                                window.location.assign("estudiantes.php");
                            });
                        </script>';
            } else {
                echo "Error";
            }        
        } else {
            echo '<script>
                        swal({
                            icon: "error",
                            title: "Error !!!",
                            text: "El Id ya existe",
                        }).then(function() {
                            window.location.assign("estudiantes.php");
                        });
                    </script>';            
        }
        $conexion->close()
    ?>
</body>
</html>