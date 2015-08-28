<?php 
include('cn.php');
require('fpdf.php');


$str="select * from agent";
$r=mysql_query($str);

define('FPDF_FONTPATH', 'pdf/fonts/');
$pdf=new FPDF();

$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetFont('Helvetica', 'B', 16);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(100, 5, 'Donor Report', 0, 0, 'L');
//$pdf->Cell(40,10,'Hello World!');

//$pdf->Output('example1.pdf','I');

$y_axis_initial = 25;



$pdf->SetFillColor(0, 0, 0);
$pdf->SetTextColor(255, 255, 255);
/*$pdf->SetText("Test");*/
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->SetY($y_axis_initial);
$pdf->SetX(2);
$pdf->Cell(10, 6, 'aid', 1, 0, 'L', 1);
$pdf->Cell(25, 6, 'adminid', 1, 0, 'L', 1);
$pdf->Cell(25, 6, 'name', 1, 0, 'L', 1);
$pdf->Cell(25, 6, 'address', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'phone', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'username', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'password', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'eid', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'doj', 1, 0, 'R', 1);
$pdf->Cell(30, 6, 'dob', 1, 0, 'R', 1);

$c=0;
$row_height = 6;
$y_axis=0;
$y_axis = $y_axis + $row_height;
$i = 0;
$max = 25;
$y_axis=31;
while($res=mysql_fetch_array($r))
{
	$pdf->SetFillColor(245, 245, 245);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Helvetica', '', 10);
	if ($i == $max)
   {
		$pdf->AddPage();
		
		//print column titles for the current page
		$pdf->SetY($y_axis_initial);
		$pdf->SetX(2);
		$pdf->Cell(10, 6, 'aid', 1, 0, 'L', 1);
		$pdf->Cell(25, 6, 'adminid', 1, 0, 'L', 1);
		$pdf->Cell(25, 6, 'name', 1, 0, 'L', 1);
		$pdf->Cell(25, 6, 'address', 1, 0, 'L', 1);
		$pdf->Cell(30, 6, 'phone', 1, 0, 'L', 1);
		$pdf->Cell(30, 6, 'username', 1, 0, 'L', 1);
		$pdf->Cell(30, 6, 'password', 1, 0, 'R', 1);
		$pdf->Cell(30, 6, 'eid', 1, 0, 'R', 1);
		$pdf->Cell(30, 6, 'doj', 1, 0, 'R', 1);
		$pdf->Cell(30, 6, 'dob', 1, 0, 'R', 1);
				
		//Go to next row
		$y_axis = $y_axis + $row_height;
		
		//Set $i variable to 0 (first row)
		$i = 0;
   }
	
	$c++;
	
	$fn=$res["aid"];
	$bg=$res["adminid"];
	$gn=$res["name"];
	$em=$res["address"];
	$mn=$res["phone"];
	$ct=$res["username"];
	$vt=$res["password"];
	$st=$res["eid"];
	$rd=date("d-M-y", strtotime($res["doj"]));
	$ad=date("d-M-y", strtotime($res["dob"]));
	
	
	
	$pdf->SetY($y_axis);
	$pdf->SetX(2);

	$pdf->Cell(10, 6, $c, 1, 0, 'L', 1);
	$pdf->Cell(25, 6, $fn, 1, 0, 'L', 1);
	$pdf->Cell(25, 6, $bg, 1, 0, 'L', 1);
	$pdf->Cell(25, 6, $gn, 1, 0, 'L', 1);
	$pdf->Cell(30, 6, $mn, 1, 0, 'L', 1);
	$pdf->Cell(30, 6, $em, 1, 0, 'L', 1);
	$pdf->Cell(30, 6, $ct, 1, 0, 'R', 1);
	$pdf->Cell(30, 6, $vt, 1, 0, 'R', 1);
	$pdf->Cell(30, 6, $st, 1, 0, 'R', 1);
	$pdf->Cell(30, 6, $rd, 1, 0, 'R', 1);
	$pdf->Cell(30, 6, $ad, 1, 0, 'R', 1);
	
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
	
}


$filename="test.pdf";
//$pdf->Output($filename,'I');
$pdf->Output($filename,'D');

/*header("Content-disposition: attachment; filename='$filename'");
header("Content-type: application/pdf");
readfile($filename);*/

/*require('fpdf.php');

define('FPDF_FONTPATH', 'font/');

//create a FPDF object
$pdf=new FPDF();

$pdf->SetAuthor('Lana Kovacevic');
$pdf->SetTitle('FPDF tutorial');

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);


//set up a page
$pdf->AddPage('P'); 
//$pdf->SetDisplayMode(real,'default');

//insert an image and make it a link
$pdf->Image('logo.png',10,20,33,0,' ','http://www.fpdf.org/');


//display the title with a border around it
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,'Congratulations! You have generated a PDF.');

//Output the document
$pdf->Output('example1.pdf','I'); */
?>