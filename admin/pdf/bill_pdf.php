<?php
include("../include/config.php"); 
include("../include/session.php");  

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

$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

//set image scale factor
include("include/config.php"); 
include("include/session.php"); 
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
	$pdf->SetFont('helvetica', '', 10);

	
	$pkt11='<html><head><title>Bill Report</title></head><center><h1>Record</h1></center>
	<table border="1"  cellpadding="5"  cellspcing="5" ><tr><th>Sn</th><th>Bill No</th><th>Date</th><th>Type</th><th>Total amount</th><th>Total Tax</th></tr>';
	$id=$_POST['chk_arry'];
	$sn=1;
	foreach($id as $id1)
	{
		$bill_query = mysql_query("SELECT * FROM bill WHERE  id='$id1' order by id desc");
		$bill_result = mysql_fetch_array($bill_query);
		
		$sql_01=mysql_query("SELECT * FROM add_party where id = '".$bill_result['party_id']."'");
		$data_01=mysql_fetch_assoc($sql_01);
	
		$id = $bill_result['id'];

		if($bill_result['type'] == 1)
		{
			$type = "CST";
		} 
		else 
		{
			$type = "GST";
		}
		$dt = date('d-m-Y',strtotime($bill_result['bill_date']));  
		$year_query = mysql_query("SELECT * FROM year_master where id = '".$bill_result['year_id']."'");
		$year_result = mysql_fetch_assoc($year_query);									
									
		$bill_id=$bill_result['id'];
		$sql_03=mysql_query("SELECT sum(amount) as tax_amt  FROM  bill_tax_relation WHERE bill_id='$id' ");
		$data_03=mysql_fetch_assoc($sql_03);
		$tax_amt=$data_03['tax_amt'];
	
		$pkt11.='<tr><td>'.$sn++.'</td>';	
		$pkt11.='<td>'.$bill_result['bill_no'].'</td>';	
		$pkt11.='<td>'.$dt.'</td>';	
		//$pkt11.='<td>'.$data_01['name'].'</td>';	
		$pkt11.='<td>'.$type.'</td>';
		$pkt11.='<td>'.$bill_result['net_amount'].'</td>';	
		$pkt11.='<td>'.$tax_amt.'</td></tr>';	
	}
	$pkt11.= '</table></html>';
	$pdf->writeHTML($pkt11, true, 0, true, 0);
	

	

	$pdf->Ln(5);

	$pdf->SetFont('times', '', 12);


    
	

	
	

	$pdf->Output('bill.pdf', 'I');
	
	
	

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

