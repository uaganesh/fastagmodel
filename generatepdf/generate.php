<?php


/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../tcpdf/tcpdf.php');
include_once '../includes/dbh.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Arun Baby');
$pdf->SetTitle('FASTag ID');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


                 
                 $sql="SELECT fastagid,vehicleregisterno FROM application WHERE vehicleregisterno='" . $_GET['regno'] . "'";
                 $result=mysqli_query($conn, $sql);
                 $resultCheck = mysqli_num_rows($result);

                 if($resultCheck > 0)
                     {
                        while($row = mysqli_fetch_assoc($result))
                           {
                                

              

// Set some content to print
$html = <<<EX




<h1>Here is your <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">FAST</span><span style="color:white;">ag</span>&nbsp;</a></h1></br></br></br>

<p>The FASTag id issued for your vehicle {$row['vehicleregisterno']} is [<b>{$row['fastagid']}</b>]</p>

<p>You can take the printout of the FASTag ID and stick the FasTag on the top middle of the windshield from inside the vehicle or behind the rear view mirror.<p>

<p align="right">Issued By</p>
<p align="right" style="line-height:-1.3;">Arun Baby</p>
<p align="right" style="line-height:-1.1;">(Operations Executive)</p>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<p>---------------------------------------------------------------------------------------------------------</p>


<h1 align="center" style="font-size: 80px; color:green; line-height: 3.5; border: 2px solid red;">{$row['fastagid']}</h1>



EX;

}
}

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 1, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('fastag.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+