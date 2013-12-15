<?php

/*header("Content-type: application/pdf"); 
echo $content_for_layout;

App::import('Vendor','xtcpdf');  
$tcpdf = new XTCPDF(); 
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans' 

$tcpdf->SetAuthor("KBS Homes & Properties at http://kbs-properties.com"); 
$tcpdf->SetAutoPageBreak( false ); 
$tcpdf->setHeaderFont(array($textfont,'',40)); 
$tcpdf->xheadercolor = array(150,0,0); 
$tcpdf->xheadertext = 'KBS Homes & Properties'; 
$tcpdf->xfootertext = 'Copyright Â© %d KBS Homes & Properties. All rights reserved.'; 

// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage(); 

// Now you position and print your page content 
// example:  
$tcpdf->SetTextColor(0, 0, 0); 
$tcpdf->SetFont($textfont,'B',20); 
$tcpdf->Cell(0,14, "Hello World", 0,1,'L'); 
  

echo $tcpdf->Output('filename.pdf', 'D');*/

Configure::write('CakePdf', array(
        'engine' => 'CakePdf.WkHtmlToPdf',
        'options' => array(
            'print-media-type' => false,
            'outline' => true,
            'dpi' => 96
        ),
        'margin' => array(
            'bottom' => 15,
            'left' => 50,
            'right' => 30,
            'top' => 45
        ),
        'orientation' => 'landscape',
        'download' => true
    ));
?>

<html>
    <head>
        
    </head>
    <body>
	
    </body>
</html>
