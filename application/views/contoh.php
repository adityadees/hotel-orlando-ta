<?php
	$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetTitle('Contoh');
	$pdf->SetTopMargin(20);
	$pdf->setFooterMargin(20);
	$pdf->SetAutoPageBreak(true);
	$pdf->SetAuthor('Author');
	$pdf->SetDisplayMode('real', 'default');
	$pdf->AddPage();
	$pdf->Write(5, 'Contoh Laporan PDF dengan CodeIgniter + tcpdf');
	$pdf->Output('contoh1.pdf', 'I');
?>