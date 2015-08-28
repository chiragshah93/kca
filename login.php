
<?php

session_start();
include("cn.php");
$msg="";
if(isset($_POST['submit']))
{	
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$user=$_POST['user'];
	{
	include_once("common.php");
	$query = mysql_query("select * from $user where username='$name'",$link);
	
		while($row= mysql_fetch_array($query))
	{
	if($name==$row['username'] and $pass==$row['password'])
	{
			$_SESSION['submit']="ok";
			$_SESSION['username']=$name;
 
		if($user == "agent")
		header("Location:agenthome.php");
		else
		header("Location:feedback.php");
		  }
		  else
		  {
		  $msg = "Invalid Username Or Password";
		  }
	}

	


	
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/javascript">
window.onload function(){
<?php
			session_start();
			if($_SESSION['login'] = "")
				header("Location:login.php");
				
?>

}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the KCA ...</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<style type="text/css">
<!--
.style1 {font-size: 83%}
body {
	background-image: url(2560x1600%20(1)
.jpg);
	background-image: url();
}
-->
</style>

</head>

<body>
<table width="50%" height="235" border="0" align="center">
  <tr>
    <td colspan="2" align="right"><?php include("logo.php"); ?>    </td>  </tr>
  <tr><td colspan="2" ><?php include("loginmenu.php"); ?>  </td>
  </tr>
  <tr>
    <td width="314" align="center"><img src="027117-Atelier-Culinaire.jpg" width="676" height="451" class="img-thumbnail"/></td>
    <td width="100%"><form action="" method="post">
     <div class="container" style="width:100%;">
        <div class="row">
            <div class="col-md-10"  class="bg-danger">
                <div class="login-panel panel panel-default" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
      <form role="form">
                            <fieldset>
                            
                            <div class="form-group">
                            		<h4><center>
                                <select name="user">
 						           <option value="agent">AGENT</option>
         						   <option value="login">CLIENT</option>
  	       						 </select></h4></center>
                                    <input class="form-control" placeholder="Enter name" name="name" type="text" autofocus>
                            </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Password" name="pass" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-lg btn-info btn-block" value="Login">
                            </fieldset>
      </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
    </div>
    
       </div>
      
    </form></td>
  </tr>
  <tr>
    <td colspan="2" align="right">   <?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
