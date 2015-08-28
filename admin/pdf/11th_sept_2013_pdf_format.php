<?php

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







/**



 * Creates an example PDF TEST document using TCPDF



 * @package com.tecnick.tcpdf



 * @abstract TCPDF - Example: Transactions



 * @author Nicola Asuni



 * @since 2009-03-19



 */

//error_reporting(0);



require_once('config/lang/eng.php');

require_once('tcpdf.php');


class MYPDF extends TCPDF 

{

	// Colored table

}

// create new PDF document

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$pdf->SetPrintHeader(false);

$pdf->SetPrintFooter(false);

$pdf->SetCreator(PDF_CREATOR);

//$pdf->SetHeaderData($imm, 160);



// set default header data

// set header and footer fonts



$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins

$pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER, false);

$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings

$pdf->setLanguageArray($l);

// ---------------------------------------------------------



// set font

$count=0;

// add a page

	

	$hea = 'Header Information';



	//$pdf->writeHTML($hea, true, 0, true, 0);

	

	

	if(isset($_POST['submit']))

    {



	$invoice=ucwords($_POST['invoice']);

	$date=$_POST['date'];

	$partyname=ucwords($_POST['partyname']);

	$subtotal=$_POST['subtotal'];

	$total=$_POST['total'];

	$discount=$_POST['discount'];

	$vat=$_POST['vat'];

	$tax=$_POST['tax'];

	$net_amt=number_format($_POST['net_amt'],2);

	



	$designcode=$_POST['design'];

	$name=$_POST['name'];

	$address=$_POST['address'];

	$mobile=$_POST['mobile'];

	$rate=$_POST['rate'];

	$quantity=$_POST['quantity'];

	$price=$_POST['price'];



	$count=count($name);

	

	$dt1 = explode("-",$date);

	$dt = $dt1[2]."-".$dt1[1]."-".$dt1[0];

	

	$pkt='<head><title>Editable Invoice</title></head>';

	for($i=0;$i<2;$i++)

	{

	$pdf->SetFont('helvetica', '', 12);



	$pdf->AddPage();

	$pdf->Ln(5);

	$pdf->SetFont('times', '', 12);

	

			{

				$pkt.= '

				<body>


            <table style="width:100%;" border="0" cellpadding="3">
             <tr>

			   <td  style="background-color:#000; color:#FFF; text-align:center; ">INVOICE</td>

			</tr>
			
			<tr>

			   <td  colspan="2"></td>

			</tr>

			<tr>

			   <td colspan="2">Original Copy</td>

			</tr>

			

			<tr>

			<td width="15%"><strong>Invoice:-</strong></td>

			<td align="left"><strong>'.$invoice.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Date:-</strong></td>

			<td align="left" ><strong>'.$dt.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Party Name:-</strong></td>

			<td align="left" ><strong>'.$partyname.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Address:-</strong></td>

			<td align="left" ><strong>'.$address.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Mobile:-</strong></td>

			<td align="left" ><strong>'.$mobile.'</strong></td>

			</tr>

           <tr>

			   <td  colspan="2"></td>

			</tr>

			</table>


		<table border="1" width="100%" cellpadding="7">

		  <tr style="background-color:#eee">

		      <th width="8%" align="center"><b>Sr. No</b></th>

		      <th width="16%" align="center"><b>Design Code</b></th>

		      <th width="18%" align="center"><b>Name</b></th>

		      <th width="18%" align="center"><b>Quantity</b></th>

		      <th width="20%" align="center"><b>Rate</b></th>

		      <th width="18%" align="center"><b>Amount</b></th>

		  </tr>';

	        $m=1;

			for($j=0;$j<$count;$j++)

			{

				$pkt .= ' 

						<tr>

						<td  width="8%" align="center"><strong>'.$m.'</strong></td> 

						<td  width="16%" align="center"><strong>'.$designcode[$j].'</strong></td>

						<td  width="18%" align="center"><strong>'.$name[$j].'</strong></td>

						<td  width="18%" align="center"><strong>'.$quantity[$j].'</strong></td>

						<td  width="20%" align="center"><strong>'.$rate[$j].'</strong></td>

						<td  width="18%" align="center"><strong>'.number_format($price[$j], 2).'</strong></td>

					</tr>
					
					';

		  

			$m++; }
			
		if($count<20)
		 {
         
         for($m=$count+1;$m<=20;$m++)
		 {
			
			$pkt .= '
			
			 <tr>
					   <td  width="8%" align="center"><strong>'.$m.'</strong></td> 

						<td  width="18%" align="center"><strong></strong></td>

						<td  width="18%" align="center"><strong></strong></td>

						<td  width="18%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="18%" align="center"><strong></strong></td>
			</tr>';

		 }
		 }

		 $pkt .= '

		 <tr>

		 <td colspan="5" align="center"><strong>Total</strong></td>

		 <td align="center"><b>'.number_format($total, 2).'</b></td>

		 </tr>'; if($discount != 0) {

		 $pkt .= '<tr>

		 <td colspan="5" align="center"><strong>Discount</strong></td>

		 <td align="center"><b>'.$discount.'</b></td>

		 </tr>'; } if($vat != 0) { 

		 $pkt .= '<tr>

		 <td colspan="5" align="center"><strong>VAT</strong></td>

		 <td align="center"><b>'.$vat.'</b></td>

		 </tr>'; } if($tax != 0) { 

		 $pkt .= '<tr>

		 <td colspan="5" align="center"><strong>TAX</strong></td>

		 <td align="center"><b>'.$tax.'</b></td>

		 </tr>'; } 

		 $pkt .='<tr>

		 <td colspan="5" align="center"><strong>Net Amount</strong></td>

		 <td align="center"><b>'.$net_amt.'</b></td>

		 </tr>

		 </table>

			

	



	

';

 $pdf->writeHTML($pkt, true, 0, true, 0);

			

			}

			else

			{

				$pkt1.= '


		<table align="left" width="100%"><tr><th></th></tr></table>

            <table style="width:100%;" border="0" cellpadding="3">
			
			<tr>

			   <td style="background-color:#000; color:#FFF; text-align:center; ">INVOICE</td>

			</tr>
			
			<tr>

			   <td colspan="2"></td>

			</tr>

			<tr>

			   <td colspan="2">Duplicate Copy</td>

			</tr>

			

			<tr>

			<td width="15%"><strong>Invoice:-</strong></td>

			<td align="left" ><strong>'.$invoice.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Date:-</strong></td>

			<td align="left" ><strong>'.$dt.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>PartyName:-</strong></td>

			<td align="left" ><strong>'.$partyname.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Address:-</strong></td>

			<td align="left" ><strong>'.$address.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Mobile:-</strong></td>

			<td align="left" ><strong>'.$mobile.'</strong></td>

			</tr>

            <tr>

			   <td colspan="2"></td>

			</tr>

			</table>

	

		

		<table border="1" width="100%" cellpadding="7">

		

		  <tr style="background-color:#eee">

		       <th width="10%" align="center"><b>Sr. No</b></th>

		      <th width="16%" align="center"><b>Design Code</b></th>

		      <th width="18%" align="center"><b>Name</b></th>

		      <th width="18%" align="center"><b>Quantity</b></th>

		      <th width="20%" align="center"><b>Rate</b></th>

		      <th width="18%" align="center"><b>Amount</b></th>

		  </tr>';

	        $n=1; 

			for($j=0;$j<$count;$j++)

			{

		

				$pkt1 .= ' 

						<tr>

						<td  width="10%" align="center"><strong>'.$n.'</strong></td> 

						<td  width="16%" align="center"><strong>'.$designcode[$j].'</strong></td>

						<td  width="18%" align="center"><strong>'.$name[$j].'</strong></td>

						<td  width="18%" align="center"><strong>'.$quantity[$j].'</strong></td>

						<td  width="20%" align="center"><strong>'.$rate[$j].'</strong></td>

						<td  width="18%" align="center"><strong>'.number_format($price[$j], 2).'</strong></td>

					</tr>';

		  

			$n++; }
			
		if($count<20)
		 {
         
         for($m=$count+1;$m<=20;$m++)
		 {
			
			$pkt1 .= '
			
			 <tr>
					   <td  width="10%" align="center"><strong>'.$m.'</strong></td> 

						<td  width="16%" align="center"><strong></strong></td>

						<td  width="18%" align="center"><strong></strong></td>

						<td  width="18%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="18%" align="center"><strong></strong></td>
			</tr>';

		 }
		 }

		 

		 $pkt1 .= ' <tr>



		 <td colspan="5" align="center"><strong>Total</strong></td>

		 <td align="center"><b>'.number_format($total, 2).'</b></td>

		 </tr>';  if($discount != 0) {

		 $pkt1 .='<tr>

		 <td colspan="5" align="center"><strong>Discount</strong></td>

		 <td align="center"><b>'.$discount.'</b></td>

		 </tr>'; } if($vat != 0) {

		 $pkt1 .='<tr>

		 <td colspan="5" align="center"><strong>VAT</strong></td>

		 <td align="center"><b>'.$vat.'</b></td>

		 </tr>'; } if($tax != 0) {

		 $pkt1 .='<tr>

		 <td colspan="5" align="center"><strong>TAX</strong></td>

		 <td align="center"><b>'.$tax.'</b></td>

		 </tr>'; }

		 $pkt1 .='<tr>

		 <td colspan="5" align="center"><strong>Net Amount</strong></td>

		 <td align="center"><b>'.$net_amt.'</b></td>

		 </tr>

		 </table>
	

';

 $pdf->writeHTML($pkt1, true, 0, true, 0);

				

			}	

	}

$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();

$pdf->Ln(5);

$pdf->SetFont('times', '', 12);

$page1 = '


		<table align="left" width="100%"><tr><th></th></tr></table>

	

            <table style="width:100%;" border="0" cellpadding="4">
			
			<tr>

			   <td style="background-color:#000; color:#FFF; text-align:center; ">PACKING SLIP</td>

			</tr>
			
			<tr>

			   <td colspan="2"></td>

			</tr>

			<tr>

			   <td>Original Copy</td>

			</tr>
			<tr>

			<td width="15%"><strong>Invoice:-</strong></td>

			<td align="left" ><strong>'.$invoice.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>Date:-</strong></td>

			<td align="left" ><strong>'.$dt.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>PartyName:-</strong></td>

			<td align="left" ><strong>'.$partyname.'</strong></td>

			</tr>

            <tr>

			   <td colspan="2"></td>

			</tr>

			</table>

		

		<table border="1" width="100%" cellpadding="8">

		

		  <tr style="background-color:#eee">

		      <th width="10%" align="center"><b>Sr. No</b></th>

		      <th width="20%" align="center"><b>Design Code</b></th>

		      <th width="20%" align="center"><b>Name</b></th>

		      <th width="20%" align="center"><b>Quantity</b></th>

			  <th width="20%" align="center"><b>Rate</b></th>

		  </tr>';

	        $x=1; 

			for($k=0;$k<$count;$k++)

			{

		

				$page1 .= ' 

						<tr class="item-row">

						<td  width="10%" align="center"><strong>'.$x.'</strong></td>

						<td  width="20%" align="center"><strong>'.$designcode[$k].'</strong></td>

						<td  width="20%" align="center"><strong>'.$name[$k].'</strong></td>

						<td  width="20%" align="center"><strong>'.$quantity[$k].'</strong></td>

						<td  width="20%" align="center"><strong>'.$rate[$k].'</strong></td>

					</tr>';

		  

			$x++; }

		 if($count<20)
		 {
         
         for($m=$count+1;$m<=20;$m++)
		 {
			
			$page1 .= '
			
			 <tr>
					   <td  width="10%" align="center"><strong>'.$m.'</strong></td> 

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>

			</tr>';

		 }
		 }

		 $page1 .= '

		 </table>
	

</body>



</html>';

 $pdf->writeHTML($page1, true, 0, true, 0);

 

$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();

$pdf->Ln(5);

$pdf->SetFont('times', '', 12);

$page2 = '


		<table align="left" width="100%"><tr><th></th></tr></table>

		<div >

            <table style="width:100%;" border="0" cellpadding="4">
			
			<tr><td style="background-color:#000; color:#FFF; text-align:center; ">PACKING SLIP</td></tr>
			
			<tr>

			   <td colspan="2"></td>

			</tr>

			<tr>

			   <td>Duplicate Copy</td>

			</tr>

			<tr>

			<td width="15%"><strong>Invoice:-</strong></td>

			<td align="left" ><strong>'.$invoice.'</strong></td>

			</tr>

			<tr >

			<td width="15%"><strong>Date:-</strong></td>

			<td align="left" ><strong>'.$dt.'</strong></td>

			</tr>

			

			<tr >

			<td width="15%"><strong>PartyName:-</strong></td>

			<td align="left" ><strong>'.$partyname.'</strong></td>

			</tr>

            <tr>

			   <td colspan="2"></td>

			</tr>

			</table>

	

		

		<table border="1" width="100%" cellpadding="8">

		

		  <tr style="background-color:#eee;">

		      <th width="10%" align="center"><b>Sr. No</b></th>

		      <th width="20%" align="center"><b>Design Code</b></th>

		      <th width="20%" align="center"><b>Name</b></th>

		      <th width="20%" align="center"><b>Quantity</b></th>

			  <th width="20%" align="center"><b>Rate</b></th>

		  </tr>';

	         $y=1;

			for($k=0;$k<$count;$k++)

			{

		

				$page2 .= ' 

						<tr class="item-row">

						<td  width="10%" align="center"><strong>'.$y.'</strong></td>

						<td  width="20%" align="center"><strong>'.$designcode[$k].'</strong></td>

						<td  width="20%" align="center"><strong>'.$name[$k].'</strong></td>

						<td  width="20%" align="center"><strong>'.$quantity[$k].'</strong></td>

						<td  width="20%" align="center"><strong>'.$rate[$k].'</strong></td>

					</tr>';

		  

			$y++; }
			
			if($count<20)
		 {
         
         for($m=$count+1;$m<=20;$m++)
		 {
			
			$page2 .= '
			
			 <tr>
					  <td  width="10%" align="center"><strong>'.$m.'</strong></td> 

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>

						<td  width="20%" align="center"><strong></strong></td>
			</tr>';

		 }
		 }

		 

		 $page2 .= '

		 </table>

		

</body>



</html>';

 $pdf->writeHTML($page2, true, 0, true, 0);



}



		

	



		

	// ---------------------------------------------------------





	//Close and output PDF document

	$pdf->Output('bill.pdf', 'I');

	

	//============================================================+



	// END OF FILE                                                



	//============================================================+

