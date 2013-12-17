<?php
require ("pdf/fpdf.php");
//define((‘FPDF_FONTPATH’),('font/times')) ;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// New - Novo documento PDF com orientação P - Retrato (Picture) que pode ser também L - Paisagem (Landscape)
$pdf= new FPDF('P');
 
$pdf-> Open();
 
// Definindo Fonte
$pdf->SetFont('arial','',10);
 
//posicao vertical no caso -1 e o limite da margem
$pdf->SetY("-2");
 
        //::::::::::::::::::Cabecalho::::::::::::::::::::
        $pdf->Cell(0,5,'Gerando PDFs com PHP e a classe FPDF',0,0,'L');
        $pdf->Cell(0,5,'GUIA DO PHP',0,1,'R');
        $pdf->Cell(0,0,'',1,1,'L');
 
        $pdf->Ln(8);     
 
        $pdf-> SetFont('arial','B',10);
        $pdf->SetFillColor(122,122,122);
 
        $pdf-> SetFont('Times','B',9);
        $pdf-> Cell(30,5,'Twitter: ',0,0);
        $pdf-> SetFont('Times','',9);
        $pdf-> Cell(75,5,'@guiadophp',0,1);
        $pdf-> Ln(3);
 
        $pdf-> SetFont('Times','B',9);
        $pdf-> Cell(30,5,'SOBRE: ',0,1);
        $pdf-> SetFont('Times','',9);
        $pdf-> MultiCell(75,5,'O Guia do PHP nasce com a idéia de facilitar os novos e veteranos programadores da linguagem mais utilizada da internet. Aqui você irá aprender tudo o que precisa para estar sempre atualizado com tudo o que diz respeito ao mundo dos amantes do PHP de uma forma muito mais simples como mágica.
 
Sabemos que fazer um site ou um aplicativo não é tão fácil como parece. São necessários ingredientes importantes e indispensáveis que juntos formam a grande mágica que faz com que a internet cresça cada vez mais em número de usuários. E são esses ingredientes que falaremos aqui. Tutoriais, Video-aulas, Notícias, Colunas especiais com profissionais da área, Downloads e muito mais.',0,1);
 
        $pdf-> Output("demo.pdf");
?>
