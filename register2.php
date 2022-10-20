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
        $user = $_POST['user'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $sqlvalidar = "SELECT user FROM usuarios WHERE user = '$user';";
        $existe = $conexion->query($sqlvalidar);
        $cant = $existe->num_rows;

        if ($cant == 0) {
            if ($password == $password2) {
                $sql = "INSERT INTO usuarios(user, pass) VALUES ('$user','$password');";
                $resultado = mysqli_query($conexion, $sql);
                echo '<script>
                        swal({
                            icon: "success",
                            title: "Enhorabuena !!!",
                            text: "Registro exitoso",
                        }).then(function() {
                            window.location.assign("register.php");
                        });
                    </script>'; 
            } else {
                echo '<script>
                        swal({
                            icon: "error",
                            title: "Error !!!",
                            text: "La contraseñas no coinciden",
                        }).then(function() {
                            window.location.assign("register.php");
                        });
                    </script>'; 
            }
        } else {
            echo '<script>
                        swal({
                            icon: "error",
                            title: "Error !!!",
                            text: "El usuario ya existe",
                        }).then(function() {
                            window.location.assign("register.php");
                        });
                    </script>'; 
        }
        $conexion->close();
    ?>
</body>
</html>