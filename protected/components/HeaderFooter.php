<?php

// this class is intended to create header and footer  
// for printing usage
// import TCPDF

Yii::import('application.extensions.tcpdf.tcpdf.*');

class HeaderFooter extends tcpdf {

    //Page header
    public function Header() {

        $pageN = $this->getAliasNumPage();
        if (count($this->pages) === 1) {
            $image_file = K_PATH_IMAGES . 'umn.png';
            //$this->Image($image_file, 10, 10, 15, '', 'JPG', 2, 'T', true, 300, '', false, false, 0, true, false, false);
            // Set font
            $this->Image($image_file, '', '', 10, 15, '', '', 'F', false, 10, '', false, false, 1, false, false, false);
            $x = 115;
            $y = 35;
            $w = 100;
            $h = 100;
           //$this->Rect(20, 20, $w, $h, 'F', array(), array(255, 255, 255));
            
            // uncomment the following line to draw logo
            //$this->Image($image_file, 15, 5, 20, $h, 'JPG', '', '', false, 300, '', false, false, 0, true, false, false);

            $this->SetFont('helvetica', 'B', 10);
           
            $html = <<<EOD
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br />
<br />
<br />
<hr>
EOD;


// Print text using writeHTMLCell()
            $this->writeHTMLCell($w = 0, $h = 300, $x = '', $y = 15, $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = false);
        }
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}

?>
