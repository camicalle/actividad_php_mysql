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

        $sqluser = "SELECT user FROM usuarios WHERE user = '$user';";
        $resultado = $conexion->query($sqluser);
        $filauser = mysqli_num_rows($resultado);

        $sqlpassword = "SELECT user, pass FROM usuarios WHERE user = '$user' AND pass = '$password';";
        $resultadopassword = $conexion->query($sqlpassword);
        $filapassword = mysqli_num_rows($resultadopassword);

        if ($filauser) {
            if ($filapassword) {
                session_start();
                $_SESSION['user'] = $user;
                echo '<script>
                        swal({
                            icon: "success",
                            title: "Enhorabuena !!!",
                            text: "Datos Correctos",
                        }).then(function() {
                            window.location = "sistema.php";
                        });
                    </script>';
            } else {           
                echo '<script>
                        swal({
                            icon: "error",
                            title: "Error !!!",
                            text: "Contraseña Incorrecta",
                        }).then(function() {
                            window.location = "index.html";
                        });
                    </script>';
            } 
        } else {
            echo '<script>
                    swal({
                        icon: "error",
                        title: "Error !!!",
                        text: "Usuario Incorrecto",
                    }).then(function() {
                        window.location = "index.html";
                    });
                </script>';
        }
        $conexion->close();
    ?>
</body>
</html>