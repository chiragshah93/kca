<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><?php include_once("logo.php");?></td>
  </tr>
  <tr>
    <td><?php include_once("agentmenu1.php");?></td>
  </tr>
  <tr>
    <td><ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Agent Offer<span class="divider">&raquo;</span></li>
</ul></td>
  </tr>
  <tr>
    <td><?php include("level.htm");?></td>
  </tr>
  <tr>
    <td align="right"><?php include_once("footer.php");?></td>
  </tr>
</table>
</body>
</html>