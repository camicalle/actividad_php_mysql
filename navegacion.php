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
    <title>Document</title>
</head>
<body style="background-color: #256D85;">    
    <div class="m-4">
        <h1 class="text-light fw-bold"><i class="fa-solid fa-building-columns"></i> S.I.C</h1>
    </div>
    <div class="mt-3">  
        <nav class=" m-3 d-grid gap-2">
            <a href="inicio.php" type="button" class="btn btn-outline-light border-0 text-decoration-none h6 fw-bold text-start" target="contenido">
                <i class="fa-solid fa-gauge"></i> Inicio
            </a>
            <a href="colegios.php" type="button" class="btn btn-outline-light border-0 text-decoration-none h6 fw-bold text-start" target="contenido">
                <i class="fas fa-school"></i> Colegios
            </a>
            <a href="estudiantes.php" type="button" class="btn btn-outline-light border-0 text-decoration-none h6 fw-bold text-start" target="contenido">
                <i class="fas fa-user-graduate"></i> Estudiantes
            </a>
            <a href="listados.php" type="button" class="btn btn-outline-light border-0 text-decoration-none h6 fw-bold text-start" target="contenido">
                <i class="fas fa-list"></i> Listados
            </a>
            <a href="register.php" class="btn btn-outline-light border-0 h6 fw-bold text-start" target="contenido">
                <i class="fa-solid fa-user"></i> Usuarios
            </a>
            <a type="submit" href="salir.php" class="btn btn-outline-light border-0 h6 fw-bold text-start" target="_parent">
                <i class="fa-solid fa-door-open"></i> Salir
            </a>
        </nav>
    </div>
</body>
</html>