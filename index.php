<?php

session_start();
include("cn.php");
$msg="";
if(isset($_GET['Submit']))
{	$username=$_GET['username'];
	$password=$_GET['password'];
	
	$query1=mysql_query("insert into login(username,password) values('$username','$password')");
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>

<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="3" align="center"><?php include("logo.php"); ?></td>
  </tr>
  <tr>
    <td colspan="3"><?php include("menuh.php"); ?></td>
  </tr>
  
  <tr>
    <td colspan="2" valign="top" ><?php include("demo1.html"); ?></td>
    <td width="222" align="center"><?php include("scrolltool.php");?></td>
  </tr>
  <tr>
    <td width="340"><img src="023442-TUPAUS_SS13_ModMates_MixedPantry.jpg" width="340" height="201" class="img-thumbnail"/></td>
    <td width="340"><img src="025744-freezer-mates.jpg" width="340" height="201" class="img-thumbnail"/></td>
    <td widht="320"><img src="023447-TUPAUS_SS13_CompactCookeware_B.jpg" width="320" height="201" class="img-thumbnail"/></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="bg-danger"><h3>TUPPERWARE LUNCH ME SET</p></td>
  </tr>
  <tr>
    <td colspan="3" align="right"><h5><?php include("footer.php"); ?></h5></td>
  </tr>
</table>
<div class="modal fade" role="dialog" tabindex="-1" id="loginModal" aria-hidden="true" style="font-size:medium">
	<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    	<h3> Registration </h3>	
    </div>
    <div class="modal-body">
    <table width="396" border="0" align="center" cellpadding="0" cellspacing="0">
   	<form>			

  		<tr>
    		<td width="207">Name</td>
    		<td width="189"  align="center"><label>
      			<p><input type="text" name="username" placeholder="enter username" required />
    		</p></label></td>
  		</tr>
  		
        <tr>
    		<td>Password</td>
    		<td align="center"><label>
      		<input type="password" name="password" placeholder="enter password" required/>
		    </label></td>
  		</tr>
        <tr>
    		<td nowrap="nowrap"> Confirm Password</td>
    		<td align="center"><label>
      		<input type="password" name="password"  placeholder="enter password" required/>
		    </label></td>
  		</tr>
  		  
  		<tr>
        <td></td>
    	<td colspan="6" class="pull-right">
      		<label>
      		<input class="btn btn-success" type="Submit" name="Submit" id="Submit" value="Submit" />
      		</label>
    	</td>
    	</tr>
</form></table>
    </div>
    <div class="modal-footer">
    	<button data-dismiss="modal" aria-hidden="true" class="btn">Close </button> 
    </div>
</div></div></div>


</body>
</html>
