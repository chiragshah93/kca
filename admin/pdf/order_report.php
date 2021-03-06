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

	$pdf->SetFont('times', '', 10);

	
$pdf->AddPage();
	/*$sn=1;
	$sql_01=mysql_query("select * from `agent`");
	$data=mysql_fetch_assoc($sql_01);
	$pkt11='<h1>Agent Report</h1>';
$pkt11.='<table border="1" align="center" width="100%">
		<tr><th>Admin Id</th><th>Name</th><th>Address</th><th>Phone</th><th>User Name</th><th>Password</th><th>Agent Id</th><th>Date of Joining</th><th>Date of birth</th></tr>';
	*/

	$date1=$_REQUEST['rep'];
	$date2=$_REQUEST['rep1'];
	$pkt11='<table border="1" align="center">
	
		<tr><td>Sr.No</td><td>Admin name</td><td>Agent Name</td><td>Client Name</td><td style="width:10%">description</td><td>Date</td><td>Price</td><td>Quantity</td><td>Total</td><td>Commision</td><td>Order Status</td></tr>';
		$sn=1;
		$sql1=mysql_query("SELECT * FROM `transaction` where `date` BETWEEN '$date1' AND '$date2'");
		while($data=mysql_fetch_assoc($sql1))
		{
		$pkt11.='<tr><td>'.$sn++.'</td><td>'.$data['adminname'].'</td><td>'.$data['agentname'].'</td><td>'.$data['clientname'].'</td><td>'.$data['description'].'</td><td>'.$data['date'].'</td><td>'.$data['price'].'</td><td>'.$data['qty'].'</td><td>'.$data['total'].'</td><td>'.$data['com'].'</td><td>'.$data['order_status'].'</td></tr>';
		
		}
	
	$pkt11.= '</table></html>';
    $pdf->writeHTML($pkt11, true, 0, true, 0);
	
	$pdf->SetFont('helvetica', '', 8);

	

	$pdf->Ln(100);

	$pdf->SetFont('times', '', 8);


    
	

	
	

	$pdf->Output('bill.pdf', 'I');
	
	
	

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

