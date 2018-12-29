<?php

namespace App\Controller;

/**
 * Description of pdfBill
 *
 * @author Admin
 */
class pdfBill extends \FPDF {

    var $angle = 0;

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
        // Push the contents down before starting the body by 15mm
        $this->Cell(0, 15, "", 0, 1);
    }

    public function Footer() {
        parent::Footer();
        $this->AliasNbPages('{totalPages}');
        $this->SetY(285);
        $this->Cell(165);
        $this->SetFont('Arial');
        $this->Cell(0, 5, "Page " . $this->PageNo() . "/{totalPages}", 0, 1);
    }

    function Rotate($angle, $x = -1, $y = -1) {
        if ($x == -1)
            $x = $this->x;
        if ($y == -1)
            $y = $this->y;
        if ($this->angle != 0)
            $this->_out('Q');
        $this->angle = $angle;
        if ($angle != 0) {
            $angle *= M_PI / 180;
            $c = cos($angle);
            $s = sin($angle);
            $cx = $x * $this->k;
            $cy = ($this->h - $y) * $this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
        }
    }

    function _endpage() {
        if ($this->angle != 0) {
            $this->angle = 0;
            $this->_out('Q');
        }
        parent::_endpage();
    }

}
