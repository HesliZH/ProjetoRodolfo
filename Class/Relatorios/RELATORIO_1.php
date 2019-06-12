<?php
    require_once '../../Include/fpdf/fpdf.php';

    $pdf = new FPDF();

    $pdf->addPage();
    $pdf->setFont('times', 'B');
    $pdf->Cell(189, 13, utf8_decode('Relação de produtos cadastrados'), 0, 1, 'C');
    $pdf->Ln(25);

    //Colunas
    $pdf->Cell(50, 10, utf8_decode('Código'), 0, 0, 'L');
    $pdf->Cell(50, 10, utf8_decode('Descrição'), 0, 0, 'L');
    $pdf->Cell(50, 10, utf8_decode('Preço de venda'), 0, 0, 'L');
    $pdf->Cell(30, 10, utf8_decode('Quantidade em estoque'), 0, 1, 'L');

    //Começo da leitura dos dados do relatório
    $pdf->setFont('times');
    foreach($lista as $item){
        //$pdf->Cell()
    }

    ob_start();
    $pdf->Output();
?>