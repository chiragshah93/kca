<?php

session_start();
include("cn.php");
include("common.php");
checklogin();
$msg="";

if (isset($_POST["submit"]))
  {
 $name = $_POST['name'];  
$pass = $_POST['pass'];
$newpass = $_POST['newpass'];
$confirmpass = $_POST['confirmpass'];

$result = mysql_query("SELECT pass FROM admin WHERE name='$name'");

	if(!$result)
	{
		echo "The username entered does not exist!";
	}
	else
		if($pass != mysql_result($result,0 ))
		   {
			echo "Entered an incorrect password";
			}
	
	else 
	 if($newpass == $confirmpass){
		$sql = mysql_query("UPDATE admin SET pass = '$newpass' WHERE name = '$name'");		
	}
	else if(!$sql)
	{
		echo "New password and confirm password must be the same!";
	}

	
	else
	{
		echo "Congratulations, password successfully changd!";
	}
}	
  ?>
  <?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:index.php");
		}
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the KCA ...</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 83%}
-->
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>

<body>

<table width="1000" height="235" border="0" align="center">
<tr>
	<td align="right"><form action="" method="post"><?php echo $_SESSION['name'];?>
	  <input name="logout" type="submit" id="logout" value="logout" /></form>
    </td>
</tr>
  <tr>
    <td colspan="2"><?php include("logo.php"); ?>
 </td>
  </tr>
  <tr>
  <td bgcolor="#FF6666"><?php include_once("agentmenu.php");?>
     </td>
  </tr>
  <tr>
  <td>
  <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Setting<span class="divider">&raquo;</span></li>
<li>Change Password</li>
</ul>
  </td>
  </tr>
  <tr>
    <td colspan="2">
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0"><form action="" method="post">
        <tr align="center" class="bg-danger">
          <td colspan="2"><h1><font color="#660000" size="7">Change Password</font></h1></td>
      </tr>
        <tr>
          <td width="146">User Name</td>
      <td width="154" align="center"><label>
        <input type="text" name="name" placeholder="enter name" required value="<?php echo $_SESSION['name'];?>"  readonly="readonly"/>
        </label></td>
    </tr>
        <tr>
          <td>Password</td>
      <td align="center"><label>
        <input type="password" name="pass" placeholder="enter password" required/>
        </label></td>
    </tr>
        <tr>
          <td>New Password</td>
      <td align="center"><label>
        <input type="password" name="newpass" placeholder="enter password" required/>
        </label></td>
    </tr>
        <tr>
          <td>Confirm Password</td>
      <td align="center"><label>
        <input type="password" name="confirmpass" placeholder="enter password" required/>
        </label></td>
    </tr>
        <tr>
          <td colspan="2"><font color="red"><?php echo $msg; ?></font></td>
    </tr>
        <tr>
          <td colspan="2"><div align="center">
            <label>
              <input type="submit" name="submit" id="submit" value="submit" />
              </label>
            </div></td>
      </tr>
 </form> </table>
        
    </td>
  </tr>
  <tr>
   <td colspan="2" align="right">
      <?php include("footer.php"); ?>
    </td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
