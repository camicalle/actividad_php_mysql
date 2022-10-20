<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        die(header("location: index.html"));
    }
    session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Censo Colegios</title>
</head>
<body>
    <?php
        echo '<script>
                swal({
                    icon: "error",
                    title: "Sin acceso al sistema !!!",
                    text: "Presione OK para volver al inicio",
                }).then(function() {
                    window.location.assign("index.html");
                });
            </script>';
    ?>
</body>
</html>
