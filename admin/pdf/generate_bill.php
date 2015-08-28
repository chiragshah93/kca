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

	



	$count=count($name);

	

	$dt1 = explode("-",$date);

	$dt = $dt1[2]."-".$dt1[1]."-".$dt1[0];

	

	$pkt11='<html><head><title>Editable Invoice</title></head>';
   
    $pdf->writeHTML($pkt11, true, 0, true, 0);
	
	$pdf->SetFont('helvetica', '', 12);

	$pdf->AddPage();

	$pdf->Ln(5);

	$pdf->SetFont('times', '', 12);

	$bill_id = $_REQUEST['id'];
	
	$bill_query = mysql_query("select * from bill where id = '".$bill_id."'")or die(mysql_error());
	
	$bill_result = mysql_fetch_array($bill_query);
	
	$party_query = mysql_query("SELECT * FROM add_party where id = '".$bill_result['party_id']."'")or die(mysql_error());
	
	$party_result = mysql_fetch_assoc($party_query);
	
	$city_query = mysql_query("select * from city_master where city_id = '".$party_result['city']."'")or die(mysql_error());

    $city_result = mysql_fetch_array($city_query);
	
	$year_query = mysql_query("SELECT * FROM year_master where id = '".$bill_result['year_id']."'");
	
	$year_result = mysql_fetch_assoc($year_query);
	
		
	if($bill_result['type'] == 1)
	{
	  $type = 'CST Tin No.';
	  $tno = $party_result['cst_tin'];
	} else {
	  $type = 'GST Tin No.';
	  $tno = $party_result['gst_tin'];
	}  
    
	//CONVERT NUMBER INTO WORDS FUNCTION
	
	function convert_number_to_words($number) {
	
		$hyphen      = '-';
		$conjunction = ' and ';
		$separator   = ', ';
		$negative    = 'negative ';
		$decimal     = ' point ';
		$dictionary  = array(
			0                   => 'zero',
			1                   => 'one',
			2                   => 'two',
			3                   => 'three',
			4                   => 'four',
			5                   => 'five',
			6                   => 'six',
			7                   => 'seven',
			8                   => 'eight',
			9                   => 'nine',
			10                  => 'ten',
			11                  => 'eleven',
			12                  => 'twelve',
			13                  => 'thirteen',
			14                  => 'fourteen',
			15                  => 'fifteen',
			16                  => 'sixteen',
			17                  => 'seventeen',
			18                  => 'eighteen',
			19                  => 'nineteen',
			20                  => 'twenty',
			30                  => 'thirty',
			40                  => 'fourty',
			50                  => 'fifty',
			60                  => 'sixty',
			70                  => 'seventy',
			80                  => 'eighty',
			90                  => 'ninety',
			100                 => 'hundred',
			1000                => 'thousand',
			1000000             => 'million',
			1000000000          => 'billion',
			1000000000000       => 'trillion',
			1000000000000000    => 'quadrillion',
			1000000000000000000 => 'quintillion'
		);
	
		if (!is_numeric($number)) {
			return false;
		}
	
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
				'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		}
	
		if ($number < 0) {
			return $negative . convert_number_to_words(abs($number));
		}
	
		$string = $fraction = null;
	
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
	
		switch (true) {
			case $number < 21:
				$string = $dictionary[$number];
				break;
			case $number < 100:
				$tens   = ((int) ($number / 10)) * 10;
				$units  = $number % 10;
				$string = $dictionary[$tens];
				if ($units) {
					$string .= $hyphen . $dictionary[$units];
				}
				break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= $conjunction . convert_number_to_words($remainder);
				}
				break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= convert_number_to_words($remainder);
				}
				break;
		}
	
		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
				$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
		}
	
		return $string;
	 }
	 
	 //cOMPLETE FUNCTION
	 
	 //======================================== ORIGINAL COPY ===================================================//

    $pkt = '<img src="images/logo.png"/><br/><br/>';
	
	$pkt .= '<title><strong><font size="20px">Original Invoice</strong></fonr></title><br/><br/>';
	
	$pkt .= '<table width="100%"><tr><td><table width="100%" border="1" style="float:left;" cellpadding="4"><tr><td width="40%"><strong>Party Name : </strong></td><td width="60%">'.$party_result['name'].'</td></tr><tr><td><strong>Address : </strong></td><td>'.$party_result['address'].'</td></tr><tr><td><strong>City : </strong></td><td>'.$city_result['city_name'].'</td></tr><tr><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['date'])).'</td></tr><tr><td width="40%"><strong>VAT Tin No. : </strong></td><td width="60%">'.$party_result['vat_tin'].'</td></tr><tr><td><strong>'.$type.' :</strong></td><td>'.$tno.'</td></tr><tr><td width="40%"><strong>Good Dispatched From : </strong></td><td width="60%"  colspan="3">Ankleshwar To '.$city_result['city_name'].'</td></tr></table></td><td>';
	
	$pkt .= '<table width="100%" border="1" cellpadding="4"><tr><td width="35%"><strong>Bill Book No. : </strong></td><td colspan="3">'.$year_result['year'].'</td></tr><tr><td><strong>Bill No. : </strong></td><td width="12%">'.$bill_result['bill_no'].'</td><td width="25%"><strong>Date : </strong></td><td width="38%">'.date('d-m-Y',strtotime($bill_result['bill_date'])).'</td></tr><tr><td><strong>Challan No. : </strong></td><td>'.$bill_result['challan_no'].'</td><td><strong>Date. : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['chalan_date'])).'</td></tr><tr><td><strong>Order No. : </strong></td><td>'.$bill_result['order_no'].'</td><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['order_date'])).'</td></tr><tr><td width="35%" style="text-align:left;"><strong>Against Form : </strong></td><td width="75%">"C"</td></tr><tr><td width="35%"><strong>Under L.R.No. : </strong></td><td width="75%">'.$bill_result['LRNO'].'</td></tr><tr><td width="35%"><strong>Date : </strong></td><td width="75%">'.date('d-m-Y',strtotime($bill_result['LRNO_date'])).'</td></tr><tr><td><strong>Through :</strong></td><td>-</td></tr>';
	
	$pkt .= '</table></td></tr></table>';
	
	$pkt .= '<table border="1" width="100%" cellpadding="5"><tr><th width="10%" style="text-align:center;"><strong>Sr. No.</strong></th><th width="12%" style="text-align:center;"><strong>HSN No.</strong></th><th width="15%" style="text-align:center;"><strong>Product</strong></th><th width="23%" style="text-align:center;"><strong>Packing In Kg.</strong></th><th width="15%" style="text-align:center;"><strong>No. Of Bags</strong></th><th width="10%" style="text-align:center;"><strong>Qty.</strong></th><th width="9%" style="text-align:center;"><strong>Rate</strong></th><th width="11%" style="text-align:center;"><strong>Amount</strong></th></tr>';
	
	$bill_content = mysql_query("select * from bill_content where bill_id = '".$bill_id."'")or die(mysql_error());
	
	$i=1;
	$total_amt = 0;
	while($bill_content_res = mysql_fetch_array($bill_content))
	{
	   $total_amt = $total_amt + $bill_content_res['amount'];
	   
	   $product_query = mysql_query("select * from product_master where id = '".$bill_content_res['product_id']."'")or die(mysql_error());
	   
	   $product_result = mysql_fetch_array($product_query);
	   
	   $product_pack_rel_query = mysql_query("select * from product_packing_relation where id = '".$bill_content_res['product_pack_rel_id']."'")or die(mysql_error());
	   
	   $product_pack_rel_result = mysql_fetch_array($product_pack_rel_query);
	
	$pkt .= '<tr><td style="text-align:center;">'.$i.'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['hsn_no'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['name'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_pack_rel_result['packing_kg'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['no_of_bags'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['quantity'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['rate'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['amount'].'</td></tr>';
	
	$i++;
	
	}
	
	 $rupees = convert_number_to_words($bill_result['net_amount']);
	
	$pkt .= '<tr><td colspan="6"><strong>Payment Within : '.$bill_result['payment_duration_period'].' Days</strong></td><td style="text-align:center;"><strong>Total </strong></td><td style="text-align:center;">'.$total_amt.'</td></tr>';
	
	$pkt .= '<tr><td colspan="6"><strong>RUPEES : '.strtoupper($rupees).'</strong></td><td colspan="2"><table border="1">';
	
	$bill_tax_query = mysql_query("select * from bill_tax_relation where  bill_id = '".$bill_id."'")or die(mysql_error());
	
	while($bill_tax_result = mysql_fetch_array($bill_tax_query))
	{
	   $tax_query = mysql_query("select * from tax_master where  id = '".$bill_tax_result['tax_id']."'")or die(mysql_error());
	   
	   $tax_result = mysql_fetch_array($tax_query);
	
	  $pkt .= '<tr><td style="text-align:center;"><strong>Rate of Tax ('.strtoupper($tax_result['name']).') '.$tax_result['rate'].'%</strong></td><td style="text-align:center;">'.$bill_tax_result['amount'].'</td></tr>';
	
	}
	
	$pkt .= '</table></td></tr>';
	
	$pkt .= '<tr><td colspan="6" style="text-align:left;"><strong>GST TIN No.: '.$party_result['gst_tin'].'</strong><br/><strong>CST TIN No.: '.$party_result['cst_tin'].' </strong></td><td style="text-align:center;"><strong>Grand Total</strong></td><td style="text-align:center;">'.$bill_result['net_amount'].'</td></tr>';
	
	$pkt .= '<tr><td colspan="8"><u><strong>TERMS & CONDITIONS :</strong></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>For, MUGAT DYE CHEM</strong><br/>';
	
	$pkt .= '1. All dispute to be setteled subject to Ankleshwar Jurisdiction<br/>';
	$pkt .= '2. Interner @18% ps. will be charged if payment again this invoice<br/>';
	$pkt .= '3. Payment by Crossed Demand Draft in our Favour<br/>';
	$pkt .= '4. No Amount should be deducted from the bill without our confirmation.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorised Signatory';
	$pkt .= '</td></tr>';
	
	$pkt .= '</table></html>';
	
	$pdf->writeHTML($pkt, true, 0, true, 0);
	
	$pdf->AddPage();
	
	
	//======================================== DUPLICATE COPY ===================================================//

    $pkt = '<br/><br/><img src="images/logo.png"/><br/><br/>';
	
	$pkt .= '<title><strong><font size="20px">Duplicate Invoice</strong></fonr></title><br/><br/>';
	
	$pkt .= '<table width="100%"><tr><td><table width="100%" border="1" style="float:left;" cellpadding="4"><tr><td width="40%"><strong>Party Name : </strong></td><td width="60%">'.$party_result['name'].'</td></tr><tr><td><strong>Address : </strong></td><td>'.$party_result['address'].'</td></tr><tr><td><strong>City : </strong></td><td>'.$city_result['city_name'].'</td></tr><tr><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['date'])).'</td></tr><tr><td width="40%"><strong>VAT Tin No. : </strong></td><td width="60%">'.$party_result['vat_tin'].'</td></tr><tr><td><strong>'.$type.' :</strong></td><td>'.$tno.'</td></tr><tr><td width="40%"><strong>Good Dispatched From : </strong></td><td width="60%"  colspan="3">Ankleshwar To '.$city_result['city_name'].'</td></tr></table></td><td>';
	
	$pkt .= '<table width="100%" border="1" cellpadding="4"><tr><td width="35%"><strong>Bill Book No. : </strong></td><td colspan="3">'.$year_result['year'].'</td></tr><tr><td><strong>Bill No. : </strong></td><td width="12%">'.$bill_result['bill_no'].'</td><td width="25%"><strong>Date : </strong></td><td width="38%">'.date('d-m-Y',strtotime($bill_result['bill_date'])).'</td></tr><tr><td><strong>Challan No. : </strong></td><td>'.$bill_result['challan_no'].'</td><td><strong>Date. : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['chalan_date'])).'</td></tr><tr><td><strong>Order No. : </strong></td><td>'.$bill_result['order_no'].'</td><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['order_date'])).'</td></tr><tr><td width="35%" style="text-align:left;"><strong>Against Form : </strong></td><td width="75%">"C"</td></tr><tr><td width="35%"><strong>Under L.R.No. : </strong></td><td width="75%">'.$bill_result['LRNO'].'</td></tr><tr><td width="35%"><strong>Date : </strong></td><td width="75%">'.date('d-m-Y',strtotime($bill_result['LRNO_date'])).'</td></tr><tr><td><strong>Through :</strong></td><td>-</td></tr>';
	
	$pkt .= '</table></td></tr></table>';
	
	$pkt .= '<table border="1" width="100%" cellpadding="5"><tr><th width="10%" style="text-align:center;"><strong>Sr. No.</strong></th><th width="12%" style="text-align:center;"><strong>HSN No.</strong></th><th width="15%" style="text-align:center;"><strong>Product</strong></th><th width="23%" style="text-align:center;"><strong>Packing In Kg.</strong></th><th width="15%" style="text-align:center;"><strong>No. Of Bags</strong></th><th width="10%" style="text-align:center;"><strong>Qty.</strong></th><th width="9%" style="text-align:center;"><strong>Rate</strong></th><th width="11%" style="text-align:center;"><strong>Amount</strong></th></tr>';
	
	$bill_content = mysql_query("select * from bill_content where bill_id = '".$bill_id."'")or die(mysql_error());
	
	$i=1;
	$total_amt = 0;
	while($bill_content_res = mysql_fetch_array($bill_content))
	{
	   $total_amt = $total_amt + $bill_content_res['amount'];
	   
	   $product_query = mysql_query("select * from product_master where id = '".$bill_content_res['product_id']."'")or die(mysql_error());
	   
	   $product_result = mysql_fetch_array($product_query);
	   
	   $product_pack_rel_query = mysql_query("select * from product_packing_relation where id = '".$bill_content_res['product_pack_rel_id']."'")or die(mysql_error());
	   
	   $product_pack_rel_result = mysql_fetch_array($product_pack_rel_query);
	
	$pkt .= '<tr><td style="text-align:center;">'.$i.'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['hsn_no'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['name'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_pack_rel_result['packing_kg'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['no_of_bags'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['quantity'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['rate'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['amount'].'</td></tr>';
	
	$i++;
	
	}
	
	 $rupees = convert_number_to_words($bill_result['net_amount']);
	
	$pkt .= '<tr><td colspan="6"><strong>Payment Within : '.$bill_result['payment_duration_period'].' Days</strong></td><td style="text-align:center;"><strong>Total </strong></td><td style="text-align:center;">'.$total_amt.'</td></tr>';
	
	$pkt .= '<tr><td colspan="6"><strong>RUPEES : '.strtoupper($rupees).'</strong></td><td colspan="2"><table border="1">';
	
	$bill_tax_query = mysql_query("select * from bill_tax_relation where  bill_id = '".$bill_id."'")or die(mysql_error());
	
	while($bill_tax_result = mysql_fetch_array($bill_tax_query))
	{
	   $tax_query = mysql_query("select * from tax_master where  id = '".$bill_tax_result['tax_id']."'")or die(mysql_error());
	   
	   $tax_result = mysql_fetch_array($tax_query);
	
	  $pkt .= '<tr><td style="text-align:center;"><strong>Rate of Tax ('.strtoupper($tax_result['name']).') '.$tax_result['rate'].'%</strong></td><td style="text-align:center;">'.$bill_tax_result['amount'].'</td></tr>';
	
	}
	
	$pkt .= '</table></td></tr>';
	
	$pkt .= '<tr><td colspan="6" style="text-align:left;"><strong>GST TIN No.: '.$party_result['gst_tin'].'</strong><br/><strong>CST TIN No.: '.$party_result['cst_tin'].' </strong></td><td style="text-align:center;"><strong>Grand Total</strong></td><td style="text-align:center;">'.$bill_result['net_amount'].'</td></tr>';
	
	$pkt .= '<tr><td colspan="8"><u><strong>TERMS & CONDITIONS :</strong></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>For, MUGAT DYE CHEM</strong><br/>';
	
	$pkt .= '1. All dispute to be setteled subject to Ankleshwar Jurisdiction<br/>';
	$pkt .= '2. Interner @18% ps. will be charged if payment again this invoice<br/>';
	$pkt .= '3. Payment by Crossed Demand Draft in our Favour<br/>';
	$pkt .= '4. No Amount should be deducted from the bill without our confirmation.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorised Signatory';
	$pkt .= '</td></tr>';
	
	$pkt .= '</table></html>';
	
	$pdf->writeHTML($pkt, true, 0, true, 0);
	
	
	$pdf->AddPage();
	
	
	//======================================== TRIPLICATE COPY ===================================================//

    $pkt = '<br/><br/><img src="images/logo.png"/><br/><br/>';
	
	$pkt .= '<title><strong><font size="20px">Duplicate Invoice</strong></fonr></title><br/><br/>';
	
	$pkt .= '<table width="100%"><tr><td><table width="100%" border="1" style="float:left;" cellpadding="4"><tr><td width="40%"><strong>Party Name : </strong></td><td width="60%">'.$party_result['name'].'</td></tr><tr><td><strong>Address : </strong></td><td>'.$party_result['address'].'</td></tr><tr><td><strong>City : </strong></td><td>'.$city_result['city_name'].'</td></tr><tr><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['date'])).'</td></tr><tr><td width="40%"><strong>VAT Tin No. : </strong></td><td width="60%">'.$party_result['vat_tin'].'</td></tr><tr><td><strong>'.$type.' :</strong></td><td>'.$tno.'</td></tr><tr><td width="40%"><strong>Good Dispatched From : </strong></td><td width="60%"  colspan="3">Ankleshwar To '.$city_result['city_name'].'</td></tr></table></td><td>';
	
	$pkt .= '<table width="100%" border="1" cellpadding="4"><tr><td width="35%"><strong>Bill Book No. : </strong></td><td colspan="3">'.$year_result['year'].'</td></tr><tr><td><strong>Bill No. : </strong></td><td width="12%">'.$bill_result['bill_no'].'</td><td width="25%"><strong>Date : </strong></td><td width="38%">'.date('d-m-Y',strtotime($bill_result['bill_date'])).'</td></tr><tr><td><strong>Challan No. : </strong></td><td>'.$bill_result['challan_no'].'</td><td><strong>Date. : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['chalan_date'])).'</td></tr><tr><td><strong>Order No. : </strong></td><td>'.$bill_result['order_no'].'</td><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['order_date'])).'</td></tr><tr><td width="35%" style="text-align:left;"><strong>Against Form : </strong></td><td width="75%">"C"</td></tr><tr><td width="35%"><strong>Under L.R.No. : </strong></td><td width="75%">'.$bill_result['LRNO'].'</td></tr><tr><td width="35%"><strong>Date : </strong></td><td width="75%">'.date('d-m-Y',strtotime($bill_result['LRNO_date'])).'</td></tr><tr><td><strong>Through :</strong></td><td>-</td></tr>';
	
	$pkt .= '</table></td></tr></table>';
	
	$pkt .= '<table border="1" width="100%" cellpadding="5"><tr><th width="10%" style="text-align:center;"><strong>Sr. No.</strong></th><th width="12%" style="text-align:center;"><strong>HSN No.</strong></th><th width="15%" style="text-align:center;"><strong>Product</strong></th><th width="23%" style="text-align:center;"><strong>Packing In Kg.</strong></th><th width="15%" style="text-align:center;"><strong>No. Of Bags</strong></th><th width="10%" style="text-align:center;"><strong>Qty.</strong></th><th width="9%" style="text-align:center;"><strong>Rate</strong></th><th width="11%" style="text-align:center;"><strong>Amount</strong></th></tr>';
	
	$bill_content = mysql_query("select * from bill_content where bill_id = '".$bill_id."'")or die(mysql_error());
	
	$i=1;
	$total_amt = 0;
	while($bill_content_res = mysql_fetch_array($bill_content))
	{
	   $total_amt = $total_amt + $bill_content_res['amount'];
	   
	   $product_query = mysql_query("select * from product_master where id = '".$bill_content_res['product_id']."'")or die(mysql_error());
	   
	   $product_result = mysql_fetch_array($product_query);
	   
	   $product_pack_rel_query = mysql_query("select * from product_packing_relation where id = '".$bill_content_res['product_pack_rel_id']."'")or die(mysql_error());
	   
	   $product_pack_rel_result = mysql_fetch_array($product_pack_rel_query);
	
	$pkt .= '<tr><td style="text-align:center;">'.$i.'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['hsn_no'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['name'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_pack_rel_result['packing_kg'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['no_of_bags'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['quantity'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['rate'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['amount'].'</td></tr>';
	
	$i++;
	
	}
	
	 $rupees = convert_number_to_words($bill_result['net_amount']);
	
	$pkt .= '<tr><td colspan="6"><strong>Payment Within : '.$bill_result['payment_duration_period'].' Days</strong></td><td style="text-align:center;"><strong>Total </strong></td><td style="text-align:center;">'.$total_amt.'</td></tr>';
	
	$pkt .= '<tr><td colspan="6"><strong>RUPEES : '.strtoupper($rupees).'</strong></td><td colspan="2"><table border="1">';
	
	$bill_tax_query = mysql_query("select * from bill_tax_relation where  bill_id = '".$bill_id."'")or die(mysql_error());
	
	while($bill_tax_result = mysql_fetch_array($bill_tax_query))
	{
	   $tax_query = mysql_query("select * from tax_master where  id = '".$bill_tax_result['tax_id']."'")or die(mysql_error());
	   
	   $tax_result = mysql_fetch_array($tax_query);
	
	  $pkt .= '<tr><td style="text-align:center;"><strong>Rate of Tax ('.strtoupper($tax_result['name']).') '.$tax_result['rate'].'%</strong></td><td style="text-align:center;">'.$bill_tax_result['amount'].'</td></tr>';
	
	}
	
	$pkt .= '</table></td></tr>';
	
	$pkt .= '<tr><td colspan="6" style="text-align:left;"><strong>GST TIN No.: '.$party_result['gst_tin'].'</strong><br/><strong>CST TIN No.: '.$party_result['cst_tin'].' </strong></td><td style="text-align:center;"><strong>Grand Total</strong></td><td style="text-align:center;">'.$bill_result['net_amount'].'</td></tr>';
	
	$pkt .= '<tr><td colspan="8"><u><strong>TERMS & CONDITIONS :</strong></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>For, MUGAT DYE CHEM</strong><br/>';
	
	$pkt .= '1. All dispute to be setteled subject to Ankleshwar Jurisdiction<br/>';
	$pkt .= '2. Interner @18% ps. will be charged if payment again this invoice<br/>';
	$pkt .= '3. Payment by Crossed Demand Draft in our Favour<br/>';
	$pkt .= '4. No Amount should be deducted from the bill without our confirmation.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorised Signatory';
	$pkt .= '</td></tr>';
	
	$pkt .= '</table></html>';
	
	$pdf->writeHTML($pkt, true, 0, true, 0);
	
	
	$pdf->AddPage();
	
	
	//======================================== CHALLAN ORIGINAL COPY ===================================================//

    $pkt = '<br/><br/><img src="images/logo.png"/><br/><br/>';
	
	$pkt .= '<title><strong><font size="20px">Original Challan</strong></fonr></title><br/><br/>';
	
	$pkt .= '<table width="100%"><tr><td><table width="100%" border="1" style="float:left;" cellpadding="4"><tr><td width="40%"><strong>Party Name : </strong></td><td width="60%">'.$party_result['name'].'</td></tr><tr><td><strong>Address : </strong></td><td>'.$party_result['address'].'</td></tr><tr><td><strong>City : </strong></td><td>'.$city_result['city_name'].'</td></tr><tr><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['date'])).'</td></tr><tr><td width="40%"><strong>VAT Tin No. : </strong></td><td width="60%">'.$party_result['vat_tin'].'</td></tr><tr><td><strong>'.$type.' :</strong></td><td>'.$tno.'</td></tr></table></td><td>';
	
	$pkt .= '<table width="100%" border="1" cellpadding="4"><tr><td><strong>Challan No. : </strong></td><td>'.$bill_result['challan_no'].'</td><td><strong>Date. : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['chalan_date'])).'</td></tr><tr><td><strong>Order No. : </strong></td><td>'.$bill_result['order_no'].'</td><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['order_date'])).'</td></tr><tr rowspan="4"><td><strong>Through :</strong></td><td colspan="3">-</td></tr>';
	
	$pkt .= '</table></td></tr></table>';
	
	$pkt .= '<table border="1" width="100%" cellpadding="5"><tr><th width="10%" style="text-align:center;"><strong>Sr. No.</strong></th><th width="12%" style="text-align:center;"><strong>HSN No.</strong></th><th width="15%" style="text-align:center;"><strong>Product</strong></th><th width="23%" style="text-align:center;"><strong>Packing In Kg.</strong></th><th width="15%" style="text-align:center;"><strong>No. Of Bags</strong></th><th width="10%" style="text-align:center;"><strong>Qty.</strong></th><th width="9%" style="text-align:center;"><strong>Rate</strong></th><th width="11%" style="text-align:center;"><strong>Amount</strong></th></tr>';
	
	$bill_content = mysql_query("select * from bill_content where bill_id = '".$bill_id."'")or die(mysql_error());
	
	$i=1;
	$total_amt = 0;
	while($bill_content_res = mysql_fetch_array($bill_content))
	{
	   $total_amt = $total_amt + $bill_content_res['amount'];
	   
	   $product_query = mysql_query("select * from product_master where id = '".$bill_content_res['product_id']."'")or die(mysql_error());
	   
	   $product_result = mysql_fetch_array($product_query);
	   
	   $product_pack_rel_query = mysql_query("select * from product_packing_relation where id = '".$bill_content_res['product_pack_rel_id']."'")or die(mysql_error());
	   
	   $product_pack_rel_result = mysql_fetch_array($product_pack_rel_query);
	
	$pkt .= '<tr><td style="text-align:center;">'.$i.'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['hsn_no'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['name'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_pack_rel_result['packing_kg'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['no_of_bags'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['quantity'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['rate'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['amount'].'</td></tr>';
	
	$i++;
	
	}
	
	 $rupees = convert_number_to_words($bill_result['net_amount']);
	
	
	
	$pkt .= '<tr><td colspan="8" style="text-align:left;"><strong>GST TIN No.: '.$party_result['gst_tin'].'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. & O.E.<br/><strong>CST TIN No.: '.$party_result['cst_tin'].' </strong><br/>Goods once sold will not be taken back.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>For, MUGAT DYE CHEM</strong><br/><br/><br/><u></u><br/>Authorised Signatory</td></tr>';
	
	$pkt .= '<tr><td colspan="8">';
	$pkt .= '</td></tr>';
	
	$pkt .= '</table></html>';
	
	$pdf->writeHTML($pkt, true, 0, true, 0);
	
	
	$pdf->AddPage();
	
	
	//======================================== CHALLAN DUPLICATE COPY ===================================================//

    $pkt = '<br/><br/><img src="images/logo.png"/><br/><br/>';
	
	$pkt .= '<title><strong><font size="20px">Duplicate Challan</strong></fonr></title><br/><br/>';
	
	$pkt .= '<table width="100%"><tr><td><table width="100%" border="1" style="float:left;" cellpadding="4"><tr><td width="40%"><strong>Party Name : </strong></td><td width="60%">'.$party_result['name'].'</td></tr><tr><td><strong>Address : </strong></td><td>'.$party_result['address'].'</td></tr><tr><td><strong>City : </strong></td><td>'.$city_result['city_name'].'</td></tr><tr><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['date'])).'</td></tr><tr><td width="40%"><strong>VAT Tin No. : </strong></td><td width="60%">'.$party_result['vat_tin'].'</td></tr><tr><td><strong>'.$type.' :</strong></td><td>'.$tno.'</td></tr></table></td><td>';
	
	$pkt .= '<table width="100%" border="1" cellpadding="4"><tr><td><strong>Challan No. : </strong></td><td>'.$bill_result['challan_no'].'</td><td><strong>Date. : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['chalan_date'])).'</td></tr><tr><td><strong>Order No. : </strong></td><td>'.$bill_result['order_no'].'</td><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['order_date'])).'</td></tr><tr rowspan="4"><td><strong>Through :</strong></td><td colspan="3">-</td></tr>';
	
	$pkt .= '</table></td></tr></table>';
	
	$pkt .= '<table border="1" width="100%" cellpadding="5"><tr><th width="10%" style="text-align:center;"><strong>Sr. No.</strong></th><th width="12%" style="text-align:center;"><strong>HSN No.</strong></th><th width="15%" style="text-align:center;"><strong>Product</strong></th><th width="23%" style="text-align:center;"><strong>Packing In Kg.</strong></th><th width="15%" style="text-align:center;"><strong>No. Of Bags</strong></th><th width="10%" style="text-align:center;"><strong>Qty.</strong></th><th width="9%" style="text-align:center;"><strong>Rate</strong></th><th width="11%" style="text-align:center;"><strong>Amount</strong></th></tr>';
	
	$bill_content = mysql_query("select * from bill_content where bill_id = '".$bill_id."'")or die(mysql_error());
	
	$i=1;
	$total_amt = 0;
	while($bill_content_res = mysql_fetch_array($bill_content))
	{
	   $total_amt = $total_amt + $bill_content_res['amount'];
	   
	   $product_query = mysql_query("select * from product_master where id = '".$bill_content_res['product_id']."'")or die(mysql_error());
	   
	   $product_result = mysql_fetch_array($product_query);
	   
	   $product_pack_rel_query = mysql_query("select * from product_packing_relation where id = '".$bill_content_res['product_pack_rel_id']."'")or die(mysql_error());
	   
	   $product_pack_rel_result = mysql_fetch_array($product_pack_rel_query);
	
	$pkt .= '<tr><td style="text-align:center;">'.$i.'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['hsn_no'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['name'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_pack_rel_result['packing_kg'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['no_of_bags'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['quantity'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['rate'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['amount'].'</td></tr>';
	
	$i++;
	
	}
	
	 $rupees = convert_number_to_words($bill_result['net_amount']);
	
	
	
	$pkt .= '<tr><td colspan="8" style="text-align:left;"><strong>GST TIN No.: '.$party_result['gst_tin'].'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. & O.E.<br/><strong>CST TIN No.: '.$party_result['cst_tin'].' </strong><br/>Goods once sold will not be taken back.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>For, MUGAT DYE CHEM</strong><br/><br/><br/><u></u><br/>Authorised Signatory</td></tr>';
	
	$pkt .= '<tr><td colspan="8">';
	$pkt .= '</td></tr>';
	
	$pkt .= '</table></html>';
	
	$pdf->writeHTML($pkt, true, 0, true, 0);
	
	
	
	$pdf->AddPage();
	
	
	//======================================== CHALLAN DUPLICATE COPY ===================================================//

    $pkt = '<br/><br/><img src="images/logo.png"/><br/><br/>';
	
	$pkt .= '<title><strong><font size="20px">Duplicate Challan</strong></fonr></title><br/><br/>';
	
	$pkt .= '<table width="100%"><tr><td><table width="100%" border="1" style="float:left;" cellpadding="4"><tr><td width="40%"><strong>Party Name : </strong></td><td width="60%">'.$party_result['name'].'</td></tr><tr><td><strong>Address : </strong></td><td>'.$party_result['address'].'</td></tr><tr><td><strong>City : </strong></td><td>'.$city_result['city_name'].'</td></tr><tr><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['date'])).'</td></tr><tr><td width="40%"><strong>VAT Tin No. : </strong></td><td width="60%">'.$party_result['vat_tin'].'</td></tr><tr><td><strong>'.$type.' :</strong></td><td>'.$tno.'</td></tr></table></td><td>';
	
	$pkt .= '<table width="100%" border="1" cellpadding="4"><tr><td><strong>Challan No. : </strong></td><td>'.$bill_result['challan_no'].'</td><td><strong>Date. : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['chalan_date'])).'</td></tr><tr><td><strong>Order No. : </strong></td><td>'.$bill_result['order_no'].'</td><td><strong>Date : </strong></td><td>'.date('d-m-Y',strtotime($bill_result['order_date'])).'</td></tr><tr rowspan="4"><td><strong>Through :</strong></td><td colspan="3">-</td></tr>';
	
	$pkt .= '</table></td></tr></table>';
	
	$pkt .= '<table border="1" width="100%" cellpadding="5"><tr><th width="10%" style="text-align:center;"><strong>Sr. No.</strong></th><th width="12%" style="text-align:center;"><strong>HSN No.</strong></th><th width="15%" style="text-align:center;"><strong>Product</strong></th><th width="23%" style="text-align:center;"><strong>Packing In Kg.</strong></th><th width="15%" style="text-align:center;"><strong>No. Of Bags</strong></th><th width="10%" style="text-align:center;"><strong>Qty.</strong></th><th width="9%" style="text-align:center;"><strong>Rate</strong></th><th width="11%" style="text-align:center;"><strong>Amount</strong></th></tr>';
	
	$bill_content = mysql_query("select * from bill_content where bill_id = '".$bill_id."'")or die(mysql_error());
	
	$i=1;
	$total_amt = 0;
	while($bill_content_res = mysql_fetch_array($bill_content))
	{
	   $total_amt = $total_amt + $bill_content_res['amount'];
	   
	   $product_query = mysql_query("select * from product_master where id = '".$bill_content_res['product_id']."'")or die(mysql_error());
	   
	   $product_result = mysql_fetch_array($product_query);
	   
	   $product_pack_rel_query = mysql_query("select * from product_packing_relation where id = '".$bill_content_res['product_pack_rel_id']."'")or die(mysql_error());
	   
	   $product_pack_rel_result = mysql_fetch_array($product_pack_rel_query);
	
	$pkt .= '<tr><td style="text-align:center;">'.$i.'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['hsn_no'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_result['name'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$product_pack_rel_result['packing_kg'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['no_of_bags'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['quantity'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['rate'].'</td>';
	$pkt .= '<td style="text-align:center;">'.$bill_content_res['amount'].'</td></tr>';
	
	$i++;
	
	}
	
	 $rupees = convert_number_to_words($bill_result['net_amount']);
	
	
	
	$pkt .= '<tr><td colspan="8" style="text-align:left;"><strong>GST TIN No.: '.$party_result['gst_tin'].'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. & O.E.<br/><strong>CST TIN No.: '.$party_result['cst_tin'].' </strong><br/>Goods once sold will not be taken back.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>For, MUGAT DYE CHEM</strong><br/><br/><br/><u></u><br/>Authorised Signatory</td></tr>';
	
	$pkt .= '<tr><td colspan="8">';
	$pkt .= '</td></tr>';
	
	$pkt .= '</table></html>';
	
	$pdf->writeHTML($pkt, true, 0, true, 0);
	

	$pdf->Output('bill.pdf', 'I');
	
	
	

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

