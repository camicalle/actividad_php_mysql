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
    <div class="d-flex justify-content-center shadow m-5 p-4">
        <form action="insertcolegio.php" method="post">
            <div class="row g-3">
                <h2 class="text-center fw-bold mb-3">Colegios</h2>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Id</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fas fa-id-card-alt"></i>
                        </div>
                        <input name="id" type="number" class="form-control" placeholder="Ingrese el id" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nombre</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fas fa-signature"></i>
                        </div>
                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese el nombre" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Dirección</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <input name="direccion" type="text" class="form-control" placeholder="Ingrese la dirección" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Telefono</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <input name="telefono" type="number" class="form-control" placeholder="Ingrese el telefono" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Fecha de Creación</label>
                    <div class="input-group">
                        <div class="input-group-text btn btn-danger">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <input name="fecha_creacion" type="date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="pu">Publico</option>
                        <option value="pr">Privado</option>
                    </select>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary fw-bold">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>