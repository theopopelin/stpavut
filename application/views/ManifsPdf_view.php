<?php
require_once('assets/tcpdf/tcpdf.php');

$pdf=new TCPDF($infosDocument['orientation'], $infosDocument['unite'], 'A4');


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);




foreach ($tous as $uneManif) {
    $pdf->AddPage();
    $chaine='<h2>'.mb_strtoupper($uneManif->manif_intitule).'</h2>';
    $chaine.='<p>Description : '.$uneManif->manif_description.'</p><br><br>';
    $chaine.='<img src="'.$uneManif->manif_photo.'"><br><br>';
    $pdf->writeHTML($chaine);
    $pdf->Image('assets/photos/'.$uneManif->manif_photo, 40, 80);

}

$pdf->Output('stpavut.pdf');

