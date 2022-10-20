<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        die(header("location: index.html"));
    }
?>
<!DOCTYPE html>
<html lang="en">
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
    <title>Censo Colegios</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-end" style="height: 500px;">
        <div class="col-md-6 shadow p-4">
            <h3 class="text-center fw-bold mb-3">Registrar nuevo usuario</h3>
            <form action="register2.php" method="post">
                <div class="mb-3">
                    <label class="form-label fw-bold">Usuario</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <input name="user" type="text" class="form-control" placeholder="Ingrese la usuario" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Contraseña</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input name="password" type="password" class="form-control" placeholder="Ingrese la contraseña" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Confirmar contraseña</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input name="password2" type="password" class="form-control" placeholder="Ingrese la contraseña" required>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary fw-bold">
                        Registrar <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>