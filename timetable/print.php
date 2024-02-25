<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    function createPDF()
    {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Timetable', 0, 1, 'C');

        $margin = 10; 
        $this->setX($margin);

        $this->Cell(0,10,'IMCA B6',0,1,'C');
        $this->Cell(31, 10, 'Hour 1', 1,0,'C');
        $this->Cell(31, 10, 'Hour 2', 1,0,'C');
        $this->Cell(31, 10, 'Hour 3', 1,0,'C');
        $this->Cell(31, 10, 'Hour 4', 1,0,'C');
        $this->Cell(31, 10, 'Hour 5', 1,0,'C');
        $this->Cell(31, 10, 'Hour 6', 1,0,'C');
        
        $this->Ln(); // Move to the next line after the header row
    }
}
$pdf = new PDF();

//Generate pdf to browser
$pdf->createPDF();
$pdf->Output();
?>
?>
