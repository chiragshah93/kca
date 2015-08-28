<?php
include("cn.php");
$msg="";
if(isset($_POST['Submit']))
{
	$name=$_POST['username'];
	$pass=$_POST['password'];
	mysql_query("insert into login(username,password) values('$name','$pass')");
	
	
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
<table width="200" border="0" cellspacing="0" cellpadding="0">
   <tr>
    <td width="54">Name</td>
    <td width="146"><form id="form1" name="form1" method="post" action="">
      <label>
        <input type="text" name="username" id="username" />
        </label>
    </form>
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="password" id="password" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <label>
        <input type="submit" name="Submit" id="Submit" value="Submit" />
        </label>
    
    </td>
  </tr>
</table>

</body>
</html> 
