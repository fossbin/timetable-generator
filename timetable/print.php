<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    function createPDF()
    {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Timetable', 0, 1, 'C');

        $this->Cell(30, 10, 'Column 1', 1);
        $this->Cell(30, 10, 'Column 2', 1);
        $this->Cell(30, 10, 'Column 3', 1);
        $this->Ln(); // Move to the next line after the header row
    }
}
$pdf = new PDF();

//Generate pdf to browser
$pdf->createPDF();
$pdf->Output();
?>
?>
