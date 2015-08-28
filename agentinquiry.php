<?php

session_start();
include("cn.php");
include("common.php");
?>
<?php if(isset($_POST['logout']))
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
<script src="admin/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="admin/SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="admin/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color:#000000;
}
body {
	background-image: url();
	background-repeat: repeat;
}
-->
</style>
<link href="admin/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
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
<table width="1000" height="430" border="0" align="center">
  <tr>
    <td><?php include("logo.php"); ?></td>
  </tr>
  <tr>
    <td><?php include("clientmenu.php"); ?></td>
  </tr>
   <tr>
    <td><ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Agent Inquiry<span class="divider">&raquo;</span></li>
</ul></td>
  </tr>
  <tr>
    <th height="192" align="left" valign="top"><div align="left">
      <?php include("agentinquiryform.php");?>
    </div></th>
    </tr>
  <tr>
    <td><div align="right">
      <?php include("footer.php"); ?>
    </div></td>
  </tr>
</table>
</body>
</html>
