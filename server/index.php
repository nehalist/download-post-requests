<?php
require_once 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="foobar.pdf"');
    http_response_code(200);

    $pdfContent = !empty($_POST['content']) ? $_POST['content'] : 'no content specified';

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10, $pdfContent);
    return $pdf->Output(null, 'foobar-' . time() . '.pdf');
}

http_response_code(405);
exit();
