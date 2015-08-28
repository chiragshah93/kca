<?php
include("cn.php"); 

//============================================================+



// File name   : example_047.php



// Begin       : 2009-03-19



// Last Update : 2010-08-08



//



// Description : Example 047 for TCPDF class



//               Transactions



//



// Author: Nicola Asuni



//



// (c) Copyright:



//               Nicola Asuni



//               Tecnick.com LTD



//               Manor Coach House, Church Hill



//               Aldershot, Hants, GU12 4RQ



//               UK



//               www.tecnick.com



//               info@tecnick.com



//============================================================+







/*



 * Creates an example PDF TEST document using TCPDF



 * @package com.tecnick.tcpdf



 * @abstract TCPDF - Example: Transactions



 * @author Nicola Asuni



 * @since 2009-03-19



 */

//error_reporting(0);



require_once('config/lang/eng.php');

require_once('tcpdf.php');
class MYPDF extends TCPDF {

	// Colored table

}

// create new PDF document

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information



$pdf->SetCreator(PDF_CREATOR);

//$pdf->SetHeaderData($imm, 160);



// set default header data

// set header and footer fonts



$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins

$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks

$pdf->SetAutoPageBreak(FALSE);

$pdf->SetPrintFooter(false);

//set image scale factor

//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings

$pdf->setLanguageArray($l);

// ---------------------------------------------------------



// set font

$count=0;

// add a page

	

	$hea = 'Header Information';



	//$pdf->writeHTML($hea, true, 0, true, 0);

	
$pdf->AddPage();
	/*$sn=1;
	$sql_01=mysql_query("select * from `agent`");
	$data=mysql_fetch_assoc($sql_01);
	$pkt11='<h1>Agent Report</h1>';
$pkt11.='<table border="1" align="center" width="100%">
		<tr><th>Admin Id</th><th>Name</th><th>Address</th><th>Phone</th><th>User Name</th><th>Password</th><th>Agent Id</th><th>Date of Joining</th><th>Date of birth</th></tr>';
	*/
	$pkt11='<table border="1" align="center">
		<tr><th>Sr.No</th><th>Agent Id</th><th>Client Id</th><th>Client Name </th><th>Address</th><th>Phone</th><th>Date Of Birth</th><th>Agent Name</th><th>Admin Id</th></tr>';
		$sn=1;
		$sql1=mysql_query("SELECT * FROM `client`");
		while($data=mysql_fetch_assoc($sql1))
		{
		$pkt11.='<tr><td>'.$sn++.'</td><td>'.$data['eid'].'</td><td>'.$data['cid'].'</td><td>'.$data['clientname'].'</td><td>'.$data['address'].'</td><td>'.$data['phone'].'</td><td>'.$data['dob'].'</td><td>'.$data['aname'].'</td><td>'.$data['adminid'].'</td></tr>';
		
		}
	
	$pkt11.= '</table></html>';
    $pdf->writeHTML($pkt11, true, 0, true, 0);
	
	$pdf->SetFont('helvetica', '', 12);

	

	$pdf->Ln(5);

	$pdf->SetFont('times', '', 12);


    
	

	
	

	$pdf->Output('bill.pdf', 'I');
	
	
	

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

