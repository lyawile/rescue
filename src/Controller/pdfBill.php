<?php

namespace App\Controller;

/**
 * Description of pdfBill
 *
 * @author Admin
 */
class pdfBill extends \FPDF{
    
    public function Header() {
        parent::Header();
        $this->SetFont('Arial', 'B', 16);
        $logoLocation = "http://localhost/eservice/img/necta-logo-large.png";
        $rodLocation = "http://localhost/eservice/img/thin-rod.png";
        // Row for images; Logo and vertical rod
        $this->Image($logoLocation, 10, 10);
        $this->Image($rodLocation, 50, 10);

        $this->Cell("", 2, "", "", 1);
        $this->Cell(45);
        $this->Cell(0, 7, "The United Republic of Tanzania", 0, 1);
        $this->Cell(45);
        $this->Cell(0, 7, "The National Examinations Council of Tanzania", 0, 1);
//Row fo$thise NECTA address         
        $this->Cell(45);
        $this->Cell(0, 7, "P.O.Box 2624 Dar es Salaam", 0, 1);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(45);
        $this->Cell(0, 7, "Telephone: +255-22-2700493 - 6/9, Email: esnecta@necta.go.tz", 0, 1);
        $this->Cell(0, 100);

    }
    public function Footer() {
        parent::Footer();
        $this->AliasNbPages('{totalPages}');
        $this->SetY(285);
        $this->Cell(165);
        $this->SetFont('Arial');
        $this->Cell(0, 5, "Page " . $this->PageNo() . "/{totalPages}", 0, 1);
    }
}
