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
    <div class="mt-5">
        <h2 class="fw-bold text-center">Sistema de Información para Colegios</h2>
    </div>
    <div class="shadow p-4 m-3">
        <div class="row d-flex justify-content-center gap-2">
            <div class="col-md-4">
                <div class="d-flex justify-content-between shadow p-4 border-3 border border-end-0 border-bottom-0 border-start-0 border-danger">
                    <div>
                        <h4 class="fw-bold">Colegios</h4>
                        <?php
                            include('db.php');
                            $sqlncol = "SELECT COUNT(*) AS '#Colegios' FROM `colegios`;";
                            $resultadocol = $conexion->query($sqlncol);
                            $cantcol = $resultadocol->fetch_assoc();
                            echo "<h5 class='fw-bold'>".$cantcol['#Colegios']."</h5>";
                            $conexion->close();
                        ?>
                    </div>
                    <div>
                        <img width="60px" src="https://cdn-icons-png.flaticon.com/512/2602/2602414.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-between shadow p-4 border-3 border border-end-0 border-bottom-0 border-start-0 border-primary">
                    <div>
                        <h4 class="fw-bold">Estudiantes</h4>
                        <?php
                            include('db.php');
                            $sqlnest = "SELECT COUNT(*) AS '#Estudiantes' FROM `estudiantes`;";
                            $resultadoest = $conexion->query($sqlnest);
                            $cantest = $resultadoest->fetch_assoc();
                            echo "<h5 class='fw-bold'>".$cantest['#Estudiantes']."</h5>";
                            $conexion->close();
                        ?>
                    </div>
                    <div>
                        <img width="60px" src="https://cdn-icons-png.flaticon.com/512/2784/2784403.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex justify-content-between shadow p-4 border-3 border border-end-0 border-bottom-0 border-start-0 border-dark">
                    <div>
                        <h4 class="fw-bold">Usuarios</h4>
                        <?php
                            include('db.php');
                            $sqlnuser = "SELECT COUNT(*) AS '#Usuarios' FROM `usuarios`;";
                            $resultadouser = $conexion->query($sqlnuser);
                            $cantuser = $resultadouser->fetch_assoc();
                            echo "<h5 class='fw-bold'>".$cantuser['#Usuarios']."</h5>";
                            $conexion->close();
                        ?>
                    </div>
                    <div>
                        <img width="60px" src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="">
                    </div>
                </div>
            </div>
        </div>        
        <div class="row d-flex justify-content-center mt-3 gap-2">
            <div class="col-md-6 shadow">
                <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="col-md-5 shadow p-3">
                <div id="top_x_div" class="d-flex justify-content-center" style="width: 100%; height: 500px;"></div>                
            </div>
        </div>   
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Colegio', 'Estudiantes'],
                <?php
                include('db.php');
                $sqlest_col = "SELECT colegios.cnom, COUNT(*) AS est_col FROM estudiantes INNER JOIN colegios ON estudiantes.eidcol= colegios.idcol GROUP BY colegios.cnom;";
                $resulest_col = $conexion->query($sqlest_col);
                while ($lista = $resulest_col->fetch_assoc()) {
                    echo "['".$lista['cnom']."',".$lista['est_col']."],";
                }
                $conexion->close();
                ?>
            ]);

            var options = {
            title: '% de Estudiantes por Colegio',
            is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
            ['Tipo', '# de Colegios'],
            <?php
                    include('db.php');
                    $sqltipo = "SELECT IF(tipo = 'pr', 'privados', 'publicos') AS tipo_col ,COUNT(*) AS total FROM colegios GROUP BY tipo;";
                    $resultipo = $conexion->query($sqltipo);
                    while ($lista = $resultipo->fetch_assoc()) {
                        echo "['".'Colegios '.$lista['tipo_col']."',".$lista['total']."],";                        
                    }
                    $conexion->close();
                ?>
            ]);

            var options = {
                title: '# de colegios privados y publicos',
                width: 350,
                legend: { position: 'none' },
                chart: { title: '# de colegios privados y publicos' },
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'top', label: '# de Colegios'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "100%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>
</body>
</html>