<?php
    require_once '../../Include/fpdf/fpdf.php';
    require_once '../Control/Produtos.Class.php';

    $pdf = new FPDF();
    $produtos = new Produtos();
    
    if(empty($_POST['filtro1'])){
        $filtro = 'TODOS';
    }else{
        $filtro = $_POST['filtro1'];
    }
    
    $lista = $produtos->Relatorio($filtro);     

    $pdf->addPage();
    $pdf->setFont('times', 'B');
    $pdf->Cell(189, 13, utf8_decode('Relação de produtos cadastrados'), 0, 1, 'C');
    $pdf->Ln(25);

    //Colunas
    $pdf->Cell(50, 10, utf8_decode('Código'), 0, 0, 'L');
    $pdf->Cell(50, 10, utf8_decode('Descrição'), 0, 0, 'L');
    $pdf->Cell(50, 10, utf8_decode('Preço de venda'), 0, 0, 'L');
    $pdf->Cell(30, 10, utf8_decode('Quantidade em estoque'), 0, 1, 'L');
    $pdf->Ln(5);

    //Começo da leitura dos dados do relatório
    $pdf->setFont('times');
    foreach($lista as $item){
         $pdf->Cell(50, 10, utf8_decode($item['id']), 0, 0, 'L');
         $pdf->Cell(50, 10, utf8_decode($item['descricao']), 0, 0, 'L');
         $pdf->Cell(50, 10, utf8_decode($item['preco_venda']), 0, 0, 'L');
         $pdf->Cell(50, 10, utf8_decode($item['qtd_estoque']), 0, 1, 'L');
    }

    ob_start();
    $pdf->Output();
    exit;
?>