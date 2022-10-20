<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        die(header("location: index.html"));
    }
?>
<?php
    include('db.php');

    include('fpdf/fpdf.php');

    $nomcol = $_POST['estcol'];

    // CONFIGRACION DE REPORTE PREVIA
    $pdf = new FPDF('L','mm','Letter');
    $pdf->AddPage();
    $pdf->SetMargins(20,20,20);
    $pdf->SetFont('Arial','B',15);
    $pdf->SetTextColor(00,00,00);
    $pdf->SetXY(110,20);
    $pdf->Cell(90,10,utf8_decode('REPORTE DE ESTUDIANTES'),0,0,'R');
    $pdf->Ln(15);

    $pdf->SetFillColor(37,109,133);
    $pdf->SetDrawColor(201, 189, 187);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,'#',1,0,'C',true);
    $pdf->Cell(25,10,'Id',1,0,'C',true);
    $pdf->Cell(50,10,'Estudiante', 1,0,'C',true);
    $pdf->Cell(40,10,utf8_decode('Dirección'),1,0,'C',true);
    $pdf->Cell(40,10,'Telefono',1,0,'C',true);
    $pdf->Cell(80,10,'Correo',1,0,'C',true);    
    $i=1;


    $pdf->SetFillColor(210,205,205);
    $pdf->SetFont('Arial','',10);
    $pdf->SetTextColor(0,0,0);
    // INSERCIÓN DE REGISTROS DE BD AL REPORTE
    $sql = "SELECT idest, enom, epal, edir, ecel, email FROM estudiantes INNER JOIN colegios ON eidcol=colegios.idcol WHERE colegios.cnom = '$nomcol';";
    $resultado = $conexion->query($sql);

    foreach($resultado as $row) {
        $pdf->Ln();
        $pdf->Cell(10,10,$i++,1,0,'C');
        $pdf->Cell(25,10,$row['idest'],1,0,'C');
        $pdf->Cell(50,10,$row[utf8_decode('enom')]. " ".$row[utf8_decode('epal')],1, 0, 'C');
        $pdf->Cell(40,10,$row['edir'],1,0,'C');
        $pdf->Cell(40,10,$row['ecel'],1,0,'C'); 
        $pdf->Cell(80,10,$row['email'],1,0,'C');        
    }
    $conexion->close();

    // PIE DE PAGINA
    $pdf->SetY(185);
    $pdf->SetFont('Arial','I',8);
    $pdf->Cell(0,10,utf8_decode('Página ').$pdf->PageNo().' Impreso el ' . date("m-d-Y") . ' a las ' . date('H:i:s') . ' hora del servidor',0,0,'C');
    
    // SALIDA
    $pdf->Output('Reporte','I');
?>