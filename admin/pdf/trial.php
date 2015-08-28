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

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetHeaderData($imm, 160);

// set default header data
// set header and footer fonts

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
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


	$pdf->SetFont('helvetica', '', 12);
	$pdf->AddPage();
	$pdf->Ln(5);
	$pdf->SetFont('times', '', 10);

	
	
	$hea = 'Header Information';

	$pdf->writeHTML($hea, true, 0, true, 0);
	
	
	
	
	
	if(isset($_POST['submit']))
{

	$invoice=$_POST['invoice'];
	$date=$_POST['date'];
	$partyname=$_POST['partyname'];
	$subtotal=$_POST['subtotal'];
	$total=$_POST['total'];
	

	$designcode=$_POST['design'];
	$name=$_POST['name'];
	$rate=$_POST['rate'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];

	$count=count($name);
	$pkt = '<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
	
	<title>Editable Invoice</title>
	</head>
	
	
<body>
		

	<div >

		<textarea>INVOICE</textarea>
		
		<div>

            <div id="logo">
              <img id="image" src="images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div>
            <table colspan="2" border="1" width="100%">
				<tr>
                    <td width="50%" align="center">Invoice #</td>
                    <td width="50%" align="center">'.$invoice.'</td>
                </tr>
                <tr>
				<td width="50%" align="center">Date</td>
                <td width="50%" align="center">'.$date.'</td>
                </tr>
                <tr width="50%" align="center">
                    <td width="50%" align="center">Party Name</td>
                    <td width="50%" align="center">'.$partyname.'</td>
                </tr>

            </table>
		
		</div>
		
		<table border="1" width="100%">
		
		  <tr>
		      <th width="20%" align="center">Design Code</th>
		      <th width="20%" align="center">Name</th>
		      <th width="20%" align="center">Rate</th>
		      <th width="20%" align="center">Quantity</th>
		      <th width="20%" align="center">Amount</th>
		  </tr>';
	
			for($j=0;$j<$count;$j++)
			{
		
				$pkt .= ' 
						<tr class="item-row">
						<td  width="20%" align="center">'.$designcode[$j].'</td>
						<td  width="20%" align="center">'.$name[$j].'</td>
						<td  width="20%" align="center">'.$rate[$j].'</td>
						<td  width="20%" align="center">'.$quantity[$j].'</td>
						<td  width="20%" align="center">'.$price[$j].'</td>
					</tr>';
		  
			}
		 
		 $pkt .= '
		  <br>
		  
		  <tr>
		      <td align="center">Total</td>
		      <td align="center">'.$total.'</td>
		  </tr>
		 
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
	
</body>

</html>';

}	


}
		 $pdf->writeHTML($pkt, true, 0, true, 0);
	

		
	// ---------------------------------------------------------


	//Close and output PDF document
	$pdf->Output('bill.pdf', 'I');
	
	//============================================================+

	// END OF FILE                                                

	//============================================================+
