<?php

session_start();
include("cn.php");
$msg="";
?>
<?php if(isset($_GET['logout']))
		{
			session_destroy();
			header("Location:login.php");
		}
	?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style6 {font-size: 10px}
.style7 {font-size: 12px; }
.style10 {
	color: #660066;
	font-weight: bold;
	font-size: 17px;
}
.style11 {
	font-size: 24px
}
.style13 {color: #FFFFFF; font-family: "Comic Sans MS"; font-weight: bold; }

-->
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>

<body>
<table width="1000" border="0" align="center">
  <tr>
    <td height="35" colspan="2"><?php include("logo.php"); ?></td>
  </tr>
  <tr>
    <td height="30" colspan="2"><?php include("clientmenu.php"); ?></td>
  </tr>
  <tr>
    <td height="22" colspan="2"><ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Feedback<span class="divider">&raquo;</span></li>
</ul></td>
  </tr>
  <tr>
    <th width="754" height="123" align="left" valign="middle">
      <div style="margin-top:20px;" align="center">
        <?php include("feedbackform1.php");?>
    </div></th>
    <td width="236" align="left" valign="top" background="address-bg.jpg" norepeat >
      <address>
  <h2><p class="text-info" class="lead">Kitchen Container Assortment</p></h2><br>
  795 Folsom Ave, Suite 600<br>
  San Francisco, CA 94107<br>
  <abbr title="Phone">P:</abbr> (123) 456-7890
</address></td>
  </tr>
  <tr>
  <td height="25" colspan="2">
  <table width="1007" border="0" align="center">
   
    <tr>
      <td width="203" height="38" align="center" valign="middle"  bgcolor="#F47121" class="style13">Tupper Me Lunch Set</td>
      <td width="196" align="center" valign="middle" bgcolor="#EF4123"><p class="style13">Family Luncher</p>        </td>
      <td width="192" align="center" valign="middle" bgcolor="#FEC20E"><p align="center" class="style13">Clear Bowl Medlum Set</p>        </td>
      <td width="193" valign="middle" bgcolor="#7FA931"><p align="center" class="style13">Modular Mates Oval #2</p></td>
      <td width="201" valign="middle" bgcolor="#F59BC2"><p align="center" class="style13">Round Water Dispenser 9L</p></td>
    </tr>
    <tr>
      <td align="center" valign="top"><img src="3.jpg" width="179" height="80" class="img-thumbnail"/></td>
      <td align="center" valign="top"><img src="4.jpg" width="173" height="80" class="img-thumbnail"/></td>
      <td valign="top"><div align="center"><img src="5.jpg" width="169" height="80" class="img-thumbnail"/></div></td>
      <td valign="top"><div align="center"><img src="6.jpg" width="170" height="80" class="img-thumbnail"/></div></td>
      <td valign="top"><div align="center"><img src="7.jpg" width="169" height="80" class="img-thumbnail"/></div></td>
    </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="2"><div align="right">
      <?php include("footer.php"); ?>
    </div></td>
  </tr>
</table>
</body>
</html>
