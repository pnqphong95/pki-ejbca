<?php
include('Crypt/RSA.php');
//============================================================+
// File name   : example_008.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 008 for TCPDF class
//               Include external UTF-8 text file
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Include external UTF-8 text file
 * @author Nicola Asuni
 * @since 2008-03-04
 * Nhớ chỉnh username và pass của connection
 */

// Include the main TCPDF library (search for installation path).
//require"Connect/dbconn.inc");
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('NH Thuan');
$pdf->SetTitle('Decision to Crowdsource');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('Decision to crowdsource, crowdsourcing');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 008', PDF_HEADER_STRING);

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

// set font
$pdf->SetFont('freeserif', 'B', 20);

// add a page
$pdf->AddPage();

// get esternal file content
//$utf8text = file_get_contents('tcpdf/cache/utf8test.txt', false);
//$utf8text = "Lời khuyên";

//Write($h, $txt, $link='', $fill=0, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0)

// write the text
$conn=mysql_connect("localhost","root","") or die("cannot connect database");
mysql_select_db("luanvan",$conn) or die("cannot choose database");
mysql_set_charset('utf8',$conn);
$hp = mysql_query("select * from hocphan where hp_id=".$_GET['hp_id'],$conn);
$tthp = mysql_fetch_array($hp);
//echo $inf['PRO_NAME'];
$pdf->SetTextColor(0, 63, 127);
$pdf->SetFont('freeserif', 'B', 14);
$pdf->Write(5, "Học phần: ".$tthp['hp_ma'], '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(5, "     Tên Học phần: ".$tthp['hp_ten'], '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln();
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 0, 0);
$pdf->SetLineWidth(0.3);
$pdf->SetFont('', 'B');
$pdf->Cell(15, 7, 'STT', 1, 0, 'C', 1);
$pdf->Cell(40, 7, 'Mã sinh viên', 1, 0, 'C', 1);
$pdf->Cell(60, 7, 'Họ lót', 1, 0, 'C', 1);
$pdf->Cell(25, 7, 'Tên', 1, 0, 'C', 1);
$pdf->Cell(20, 7, 'Nữ', 1, 0, 'C', 1);
$pdf->Cell(20, 7, 'Điểm', 1, 0, 'C', 1);
$pdf->Ln();
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(0);
$pdf->SetFont('');

$stt = 1;
							
$file = fopen("C:\\xampp\\htdocs\\quanlydiem\\htql\\".$_GET['gv_id'].$_GET['hp_id'].".txt",'r');
$string = '';
while(!feof($file))
{
    $string .= fgets($file);
}
 
fclose($file);
$rsa = new Crypt_RSA();
$rsa->loadKey('-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCqGKukO1De7zhZj6+H0qtjTkVxwTCpvKe4eCZ0
FPqri0cb2JZfXJ/DgYSF6vUpwmJG8wVQZKjeGcjDOL5UlsuusFncCzWBQ7RKNUSesmQRMSGkVb1/
3j+skZ6UtW+5u09lHNsj6tQ51s1SPrCBkedbNf0Tp0GbMJDyR4e9T04ZZwIDAQAB
-----END PUBLIC KEY-----');
$dsdiem = $rsa->decrypt($string);
$dssv = explode("@", $dsdiem);
foreach ($dssv as $sv) {
	$svdiem = explode("-", $sv);
	$pdf->Cell(15, 7, $stt, 1, 0, 'C', 1);
	$pdf->Cell(40, 7, $svdiem[0], 1, 0, 'C', 1);
	$pdf->Cell(60, 7, $svdiem[1], 1, 0, 'L', 1);
	$pdf->Cell(25, 7, $svdiem[2], 1, 0, 'L', 1);
	if($svdiem[3]==1)
		$pdf->Cell(20, 7, 'Nữ', 1, 0, 'C', 1);
	else
		$pdf->Cell(20, 7, '', 1, 0, 'C', 1);
	$pdf->Cell(20, 7, $svdiem[4], 1, 0, 'C', 1);
	$pdf->Ln();
	$stt++;
}


	
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_008.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+