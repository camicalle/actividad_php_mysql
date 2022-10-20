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
    <title>Censo Colegios</title>
</head>
<frameset cols="180px,*" frameborder="no">
    <frame src="navegacion.php">
    <frame src="inicio.php" name="contenido">
</frameset>
</html>