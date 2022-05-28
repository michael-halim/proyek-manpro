<?php
    include 'connect.php';
    require 'pdf/fpdf.php';
    $pdf=new FPDF();
    $idGroup = $_GET['id'];
    
    $sql = "SELECT * FROM group_alkitab ga where ga.id = ?  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idGroup]);
    $row = $stmt->fetch();
    $output = $row['nama'];

    $pdf->AddPage('L','A4',0);
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(270,10,$output,0,0,'C');

    $sql = "SELECT * FROM detail_event de JOIN event e ON e.id=de.id_event WHERE de.id_group = ? AND e.nama   !='Empty' GROUP BY de.id_event";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idGroup]);
    $count = 1;

    $pdf->Ln();
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(60,15,'EVENTS');
    $pdf->Ln();

    
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(8,8,'#',1,0);
    $pdf->Cell(60,8,"Nama Pertemuan",1,0);
    $pdf->Cell(45,8,'Jenis',1,0);
    $pdf->Cell(45,8,'Tempat',1,0);
    $pdf->Cell(35,8,'Tanggal',1,0);
    $pdf->Cell(80,8,'Link',1,0);
    $pdf->Ln();

    while ($row = $stmt->fetch()) {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(8,8,$count++,1,0);
        $pdf->Cell(60,8,$row['nama'],1,0);
        $pdf->Cell(45,8,$row['jenis'],1,0);
        $pdf->Cell(45,8,$row['tempat'],1,0);
        $tgl=date('d F Y', strtotime($row['createdAt']));
        $pdf->Cell(35,8,$tgl,1,0);
        $pdf->MultiCell(80,8,$row['link'],1,'j');
    }

    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(60,15,'ANGGOTA');
    $pdf->Ln();

    $sql = "SELECT * FROM detail_group d JOIN user u ON d.id_user = u.id WHERE id_group = ? GROUP BY id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idGroup]);

    while ($row = $stmt->fetch()) {
        if($row['ketua'] == 1){
            $pdf->SetFont('Arial','B',12);
            $pdf->MultiCell(270,10,'Nama Ketua: '.$row['nama'],0,'j');
        }
    }
    
    $sql = "SELECT * FROM detail_group d JOIN user u ON d.id_user = u.id WHERE id_group = ? GROUP BY id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idGroup]);

    while ($row = $stmt->fetch()) {
        if($row['ketua'] != 1){
            $pdf->SetFont('Arial','',12);
            $pdf->MultiCell(270,10,'Nama Anggota: '.$row['nama'],0,'j');
            $sql2 = "SELECT * FROM detail_group d JOIN alkitab a ON d.id_alkitab = a.id WHERE id_user = ? AND id_alkitab != 0";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([$row['id_user']]);
            $count = 1;
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(8,8,'#',1,0);
            $pdf->Cell(75,8,"ayat",1,0);
            $pdf->MultiCell(190,8,'Renungan',1,'j');
            if ($stmt2->rowCount() > 0) {
                while ($row2 = $stmt2->fetch()) {
                    $pdf->SetFont('Arial','',11);
                    $pdf->Cell(8,8,$count++,1,0);
                    $pdf->Cell(75,8,$row2['ayat'],1,0);
                    $pdf->MultiCell(190,8,$row2['renungan'],1,'j');
                }
            }
            else {
                $pdf->MultiCell(273,8,"BELUM BACA",1,'C');
            }
        }
        else{

        }
    }
    $pdf->Output();
    
?>