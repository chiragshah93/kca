<?php

session_start();
include("cn.php");
$msg="";
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
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
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
</head>

<body>
<table width="1000" height="495" border="0" align="center">
  
  <tr>
    <td><?php include("logo.php"); ?></td>
  </tr>
  <tr>
    <td bgcolor="#FF6666"><?php include("clientmenu.php"); ?></td>
  </tr>
  <tr>
    <th height="258" valign="top"><?php include_once("demo.php");?></th>
    </tr>
  
  <tr>
  <td height="25">
      </td>
  </tr>
  <tr>
    <td><div align="right">
      <?php include("footer.php"); ?>
    </div></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
var Accordion2 = new Spry.Widget.Accordion("Accordion2");
//-->
</script>
</body>
</html>
